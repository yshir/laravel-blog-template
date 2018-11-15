<?php

namespace App\Http\Controllers;

use App\Model\Category;
use App\Model\Post;
use App\Model\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use SebastianBergmann\Environment\Console;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::published()->get();
        return view('posts.index', ['posts' => $posts]);
    }

    public function category($slug) {
        $posts = Category::where('slug', $slug)
            ->firstOrFail()
            ->posts()
            ->published()
            ->get();
        return view('posts.category', ['posts' => $posts]);
    }

    public function tag($slug) {
        $posts = Tag::where('slug', $slug)
            ->firstOrFail()
            ->posts()
            ->published()
            ->get();
        return view('posts.tag', ['posts' => $posts]);
    }

    public function create()
    {
        $categories = Category::all();
        return view('posts.create', ['categories' => $categories]);
    }


    public function store(Request $request)
    {
        $inputs = $request->all();
        $inputs['user_id'] = Auth::id();
        Post::create($inputs);
        return redirect('/');
    }

    public function show($slug)
    {
        $post = Post::published()->where('slug', $slug)->firstOrFail();
        return view('posts.show', ['post' => $post]);
    }


    public function edit($id)
    {
        $post = Post::where('slug', $slug)->firstOrFail();
        return view('posts.edit', ['post' => $post]);
    }


    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
