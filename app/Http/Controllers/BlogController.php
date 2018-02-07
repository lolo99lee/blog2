<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Session;

class BlogController extends Controller
{
    public function getIndex()
    {
    	$posts = Post::paginate(5);

    	return view('blogs.index')->withPosts($posts);
    }

    public function getSingle($slug)
    {
    	$post = Post::where('slug', '=', $slug)->first();

    	return view('blogs.single')->withPost($post);
    }
}
