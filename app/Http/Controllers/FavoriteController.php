<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Facades\Auth;
use Brian2694\Toastr\Facades\Toastr;

class FavoriteController extends Controller
{
    public function add($post)
    {
    	//return $post;
    	$user=Auth::user();
    	$isFavorite=$user->favorite_posts()->where('post_id',$post)->count();
    	if($isFavorite==0)
    	{
    		$user->favorite_posts()->attach($post);
    		Toastr::success('Post successfully added to your favorite post :)','Success');
    		return redirect()->back();
    	}
    	else
    	{
    		$user->favorite_posts()->detach($post);
    		Toastr::success('Post successfully remove to your favorite post :)','Success');
    		return redirect()->back();
    	}
    }
}
