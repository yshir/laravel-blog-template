<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Tag;

class TagController extends Controller
{
    public function index()
    {
        $tags = Tag::orderBy('updated_at', 'desc')->get();
        return view('dashboard.tags.index', ['tags' => $tags]);
    }

    public function create()
    {
        return view('dashboard.tags.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'slug' => 'required|max:255|unique:tags,slug',
        ]);
        Tag::create($request->all());
        return redirect()->route('dashboard.tags.index')
            ->with('flash', 'Nice! You completed creating new tag.');
    }

    public function edit($id)
    {
        $tag = Tag::findOrFail($id);
        return view('dashboard.tags.edit', ['tag' => $tag]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'slug' => 'required|max:255|unique:tags,slug,'.$id,
        ]);
        $tag = Tag::findOrFail($id);
        $tag->fill($request->all())->save();
        return redirect()->route('dashboard.tags.index')
            ->with('flash', 'Nice! You completed updating tag.');
    }

    public function destroy($id)
    {
        $tag = Tag::findOrFail($id);
        $name = $tag->name;
        $tag->delete();
        return redirect()->route('dashboard.tags.index')
            ->with('flash', 'You completed delete tag "'.$name.'"');
    }
}
