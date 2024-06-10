<?php

namespace App\Http\Controllers\Posts;

use App\Models\Tag;
use App\Authorizable;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;

class TagController extends Controller
{
    use Authorizable;

    public function index()
    {
        return view('admin.tag.index', [
            'tags'    => Tag::latest()->get(),
            'tag'      => new Tag,
            'submit'        => 'Create'
        ]);
    }

    public function store()
    {
        request()->validate([
            'name' => 'required',
        ]);

        Tag::create([
            'name' => request('name'),
            'slug' => Str::slug(request('name'))
        ]);

        return redirect()->back()
            ->with('success', 'Tag with name ' . request('name') . ' was created');
    }

    public function edit(Tag $tag)
    {
        return view('admin.tag.edit', [
            'submit' => 'Update',
            'tag' => $tag,
        ]);
    }

    public function update(Tag $tag)
    {
        request()->validate([
            'name' => 'required',
        ]);

        $tag->update([
            'name' => request('name'),
            'slug' => Str::slug(request('name'))
        ]);

        return redirect()->route('tags.index')
            ->with('info', 'Tag with name ' . $tag->name . ' was updated');
    }

    public function destroy(Tag $tag)
    {
        $tag->delete();

        return redirect()->back()
            ->with('success', 'Success deleted');
    }
}
