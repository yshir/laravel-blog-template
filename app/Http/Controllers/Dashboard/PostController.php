<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;

use App\Model\Post;
use App\Model\Category;
use Carbon\Carbon;

class PostController extends Controller
{
    public function canWriteAll() 
    {
        $allowed = [
            'system',
            'admin',
            'user',
        ];
        return in_array(Auth::user()->role, $allowed);
    }

    public function index()
    {
        $posts = Post::orderBy('published_at', 'desc')->get();
        return view('dashboard.posts.index', ['posts' => $posts]);
    }

    public function show($slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();
        return view('posts.show', ['post' => $post]);
    }

    public function create()
    {
        $categories = Category::all();
        return view('dashboard.posts.create', ['categories' => $categories, 'canWriteAll' => $this->canWriteAll()])
            ->with('flash', 'Nice! You completed creating new post successfully.');
    }

    public function store(Request $request)
    {
        $inputs = $request->all();
        $inputs['user_id'] = $request->user()->id;
        Post::create($inputs);
        return redirect()->route('dashboard.posts.index');
    }

    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $categories = isset($post->category) ? 
            Category::where('id', '<>', $post->category->id)->orderBy('name', 'desc')->get() : 
            Category::orderBy('name', 'desc')->get();
        return view('dashboard.posts.edit', ['post' => $post, 'categories' => $categories, 'canWriteAll' => $this->canWriteAll()]);
        
    }

    public function update(Request $request, $id)
    {
        $post = Post::findOrFail($id);
        $post->fill($request->all())->save();
        return redirect()->route('dashboard.posts.index')
        ->with('flash', 'Nice! You completed updating new post successfully.');
    }

    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        return redirect()->route('dashboard.posts.index');
    }
}
