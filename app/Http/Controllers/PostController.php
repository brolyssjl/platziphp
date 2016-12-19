<?php

namespace PlatziPHP\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use PlatziPHP\Post;

class PostController extends Controller
{
  public function show($id){
    $post = Post::findOrFail($id);
    return view('post', ['post' => $post]);
  }

  public function create(){
    return view('posts.create');
  }

  public function store(Request $request){
    $validator = Validator::make($request->all(), [
      'title' => 'required',
      'body' => 'required'
    ]);

    if($validator->fails()){
      return redirect()
        ->route('post_create_path')
        ->withInput()
        ->withErrors($validator);
    }

    //$post = Post::create($request->only(['title', 'body']));
    $post = new Post;
    $post->title = $request->get('title');
    $post->body = $request->get('body');
    $post->user_id = Auth::id();
    $post->save();

    return redirect()->route('post_show_path', $post->id);
  }
}
