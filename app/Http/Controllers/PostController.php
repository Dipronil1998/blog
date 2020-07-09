<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\tag;
use App\Category;
use Illuminate\Support\Facades\Session;

class PostController extends Controller
{
	public function index()
	{
		$posts=Post::latest()->approved()->published()->paginate(12);
		return view('posts',compact('posts'));
	}
    public function details($slug)
    {
    	$post=Post::where('slug',$slug)->approved()->published()->first();
    	$blogkey='blog-'.$post->id;
    	if(!Session::has($blogkey))
    	{
    		$post->increment('view_count');
    		Session::put($blogkey,0);
    	}
    	$randomposts=Post::approved()->published()->take(3)->inRandomOrder()->get();
        //$randomposts=Post::all()->random(3);
    	return view('post',compact('post','randomposts'));
    }

    public function postByCategory($slug)
    {
        $category=Category::where('slug',$slug)->first();
        $posts=$category->posts()->approved()->published()->get();
        return view('category',compact('category','posts'));

    }

    public function postByTag($slug)
    {
        $tag=tag::where('slug',$slug)->first();
        $posts=$tag->posts()->approved()->published()->get();
        return view('tag',compact('tag','posts'));
    }

}
