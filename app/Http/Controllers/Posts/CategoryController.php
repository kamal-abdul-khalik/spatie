<?php

namespace App\Http\Controllers\Posts;

use App\Authorizable;
use App\Models\Category;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    use Authorizable;

    public function index()
    {
        return view('admin.category.index', [
            'categories'    => Category::latest()->get(),
            'category'      => new Category,
            'submit'        => 'Create'
        ]);
    }

    public function store()
    {
        request()->validate([
            'name' => 'required',
        ]);

        Category::create([
            'name' => request('name'),
            'slug' => Str::slug(request('name'))
        ]);

        return redirect()->back()
            ->with('success', 'Category with name ' . request('name') . ' was created');
    }

    public function edit(Category $category)
    {
        return view('admin.category.edit', [
            'submit' => 'Update',
            'category' => $category,
        ]);
    }

    public function update(Category $category)
    {
        request()->validate([
            'name' => 'required',
        ]);

        $category->update([
            'name' => request('name'),
            'slug' => Str::slug(request('name'))
        ]);

        return redirect()->route('categories.index')
            ->with('info', 'Category with name ' . $category->name . ' was updated');
    }

    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->back()
            ->with('success', 'Success deleted');
    }
}
