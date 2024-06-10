<?php

namespace App\Http\Controllers\Posts;

use App\Authorizable;
use Illuminate\Support\Str;
use App\Http\Requests\PostRequest;
use App\Http\Controllers\Controller;
use App\Models\{Post, Category, Tag};
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    use Authorizable;

    public function index()
    {
        return view('admin.post.index', [
            'posts'     => Post::with('user', 'category')->latest()->paginate(5),
        ]);
    }

    public function create()
    {
        return view('admin.post.create', [
            'categories'    => Category::get(),
            'tags'          => Tag::get(),
            'post'          => new Post(),
        ]);
    }

    public function store(PostRequest $request)
    {
        $data = $request->all();
        $data['slug'] = Str::slug(request('title'));
        $data['thumbnail'] = request('thumbnail') ? request()->file('thumbnail')->store('img/post') : null;

        $post = auth()->user()->posts()->create($data);
        $post->tags()->sync(request('tags'));

        return redirect()->route('posts.index')
            ->with('success', 'Post with title ' . $data['title'] . ' was created');
    }

    public function edit(Post $post)
    {
        return view('admin.post.edit', [
            'post'          => $post,
            'button'        => 'Update',
            'categories'    => Category::get(),
            'tags'          => Tag::get(),
        ]);
    }

    public function update(PostRequest $request, Post $post)
    {

        $this->authorize('update', $post);

        $data = $request->all();

        if (request('thumbnail')) {
            Storage::delete($post->thumbnail);
            $thumbnail = request()->file('thumbnail')->store('img/post');
        } elseif ($post->thumbnail) {
            $thumbnail = $post->thumbnail;
        } else {
            $thumbnail = null;
        }

        $data['thumbnail'] = $thumbnail;

        $post->update($data);
        $post->tags()->sync(request('tags'));

        return redirect()->route('posts.index')
            ->with('info', 'Post with title ' . $data['title'] . ' was updated');
    }

    public function destroy(Post $post)
    {
        $this->authorize('delete', $post);

        Storage::delete($post->thumbnail);
        $post->tags()->detach();
        $post->delete();
        return redirect()->route('posts.index')
            ->with('info', 'Post was deleted');
    }
}
