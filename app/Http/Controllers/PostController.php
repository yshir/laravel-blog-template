<?php

namespace App\Http\Controllers;

use App\Model\Category;
use App\Model\Post;
use App\Model\Tag;
use Illuminate\Http\Request;
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
        //
    }


    public function store(Request $request)
    {
        //
    }

    public function show($slug)
    {
        $post = Post::published()->where('slug', $slug)->firstOrFail();
        return view('posts.show', ['post' => $post]);
    }


    public function edit($id)
    {
        //
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
