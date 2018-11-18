<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('updated_at', 'desc')->get();
        return view('dashboard.categories.index', ['categories' => $categories]);
    }

    public function create()
    {
        return view('dashboard.categories.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'slug' => 'required|max:255|unique:categories,slug',
        ]);
        Category::create($request->all());
        return redirect()->route('dashboard.categories.index')
            ->with('flash', 'Nice! You completed creating new category.');
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('dashboard.categories.edit', ['category' => $category]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'slug' => 'required|max:255|unique:categories,slug,'.$id,
        ]);
        $category = Category::findOrFail($id);
        $category->fill($request->all())->save();
        return redirect()->route('dashboard.categories.index')
            ->with('flash', 'Nice! You completed updating category.');
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $name = $category->name;
        $category->delete();
        return redirect()->route('dashboard.categories.index')
            ->with('flash', 'You completed delete category "'.$name.'"');
    }
}
