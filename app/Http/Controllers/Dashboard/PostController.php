<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Carbon\Carbon;

use Intervention\Image\ImageManagerStatic as Image;

use App\Model\Post;
use App\Model\Category;
use App\Model\Tag;

class PostController extends Controller
{
    private function canWriteAll() 
    {
        $allowed = [
            'system',
            'admin',
            'user',
        ];
        return in_array(Auth::user()->role, $allowed);
    }

    private function uploadThumbnail($image) {
        $path = public_path().'/img/posts';
        $fileName = uniqid().'.jpg';
        $image = Image::make($image)
            ->fit(780, 520)
            ->save($path.'/'.$fileName, 70);
        return $fileName;
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
        return view('dashboard.posts.create', ['categories' => $categories, 'canWriteAll' => $this->canWriteAll()]);
    }

    public function store(Request $request)
    {
        $inputs = $request->all();
        $inputs['user_id'] = $request->user()->id;
        
        if (isset($inputs['thumbnail'])) {
            $inputs['thumbnail'] = $this->uploadThumbnail(Input::file('thumbnail'));
        }

        Post::create($inputs);
        return redirect()->route('dashboard.posts.index')
            ->with('flash', 'Nice! You completed creating new post successfully.');
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
        $inputs = $request->all();

        if (isset($inputs['thumbnail'])) {
            $inputs['thumbnail'] = $this->uploadThumbnail($inputs['thumbnail']);
        }

        if (isset($inputs['tag'])) {
            $tagNames = array_unique(explode(',', $inputs['tag']));
            $tagIds = [];
            foreach ($tagNames as $tagName) {
                $tag = Tag::where('name', $tagName)->first();
                // tagがなければ追加する
                if ($tag === null) {
                    $tag = Tag::create([
                        'name' => $tagName,
                        'slug' => $tagName,
                    ]);
                }
                array_push($tagIds, $tag->id);
            }
            $post->tags()->sync($tagIds);
        }

        $post->fill($inputs)->save();
        return redirect()->route('dashboard.posts.index')
            ->with('flash', 'Nice! You completed updating new post successfully.');
    }

    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $title = $post->title;
        $post->delete();
        return redirect()->route('dashboard.posts.index')
            ->with('flash', 'Post "'.$title.'" was deleted.');
    }
}
