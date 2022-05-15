<?php

namespace App\Http\Controllers;

use App\Http\Middleware\CheckPermission;
use App\Http\Requests\NewPostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __construct()
    {
//        $this->middleware(CheckPermission::class . ":read_post")
//            ->only('index');

//        $this->middleware(CheckPermission::class .":create_post")
//            ->only(['create','store']);

//        $this->middleware(CheckPermission::class . ":update_post")
//            ->only(['edit','update']);
//
//        $this->middleware(CheckPermission::class . ":delete_post")
//            ->only('destroy');
    }

    public function index()
    {
        $posts=Post::all();
        $categories = Category::all();
        return view('posts.index',[
            'posts'=>$posts,
            'categories'=>$categories
        ]);
    }
    public function create()
    {

        return view('posts.create',[
            'categories'=>Category::all()
        ]);
    }
    public function show(Post $post)
    {
      // $post=Post::query()->where('slug',$slug)->firstOrFail();
        return view('posts.show',[
           'post'=>$post
        ]);

    }

    public function store(NewPostRequest $request)
    {

        Post::query()->create([
        'slug'=>$request->get('slug'),
        'category_id'=>$request->get('category_id'),
        'title'=>$request->get('title'),
        'body'=>$request->get('body')
        ]);
        return redirect('/');
    }

    public function edit(Post $post)
    {
        return view('posts.edit',[
           'post'=>$post,
            'categories'=>Category::all()
        ]);

    }

    public function update(UpdatePostRequest $request, Post $post)
    {
        $slugExists=Post::query()->where('slug',$request->get('slug'))
            ->where('id','!=',$post->id)
            ->exists();
        if ($slugExists){
            return redirect()->back()->withErrors(['slug'=>'slug already been used']);
        }
        $post->update([
            'slug'=>$request->get('slug'),
            'title'=>$request->get('title'),
            'body'=>$request->get('body'),
            'category_id'=>$request->get('category_id')

        ]);
        return redirect('/');

    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect('/');
    }
}
