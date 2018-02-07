<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\Tag;
use Session;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        return view('posts.index')->withPosts($posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('posts.create')->withCategories($categories)->withTags($tags);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validate the data
        $this->validate($request, [
            'title' => 'required | max:255',
            'slug' => 'required | alpha_dash | min:5 | max:255',
            'category_id' => 'required | integer',
            'body' => 'required'
        ]);

        
        $post = new Post;

        $post->title = $request->title;
        $post->slug = $request->slug;
        $post->category_id = $request->category_id;
        $post->body = $request->body;

        $post->save();

        //Sync association of post and tags
        $post->tags()->sync($request->tags, false);

        //Flash Message
        
        Session::flash('success', 'Congrats!! The Post was successfully created.');

        //Redirect

        return redirect()->route('posts.show', $post->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        return view('posts.show')->withPost($post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        $categories = Category::all();
        $tags = Tag::all();

        $cats = [];
        foreach($categories as $category)
        {
            $cats[$category->id] = $category->name;
        } 

        // $tags2 = [];

        // foreach($tags as $tag) {
        //     $tags2[$tag->id] = $tag->name;
        // }
        return view('posts.edit')->withPost($post)->withCategories($cats)->withTags($tags);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = Post::find($id);

        if($request->input('slug') == $post->slug) {
            $this->validate($request, [
                'title' => 'required | max: 255',
                'category_id' => 'required | integer',
                'body' => 'required'
            ]);
        } else {
            $this->validate($request, [
                'title' => 'required | max: 255',
                'slug' => 'required | alpha_dash | min: 5 | max: 255',
                'category_id' => 'required | integer',
                'body' => 'required'
            ]);
        }

        //Save the data
        $post->title = $request->input('title');
        $post->slug = $request->input('slug');
        $post->category_id = $request->category_id;
        $post->body = $request->input('body');

        $post->save();

        $post->tags()->sync($request->tags, true);

        //Flash message
        Session::flash('success', 'The Post was successfully updated');

        //Redirect
        return redirect()->route('posts.show', $post->id);


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->tags()->detach();

        $post->delete();

        Session::flash('success', 'The Post was successfully deleted.');

        return redirect()->route('posts.index');
    }
}
