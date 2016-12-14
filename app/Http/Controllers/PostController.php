<?php

namespace PlatziPHP\Http\Controllers;

use Illuminate\Http\Request;
use PlatziPHP\Post;

class PostController extends Controller
{
  public function show($id){
    $post = Post::findOrFail($id);
    return view('post', ['post' => $post]);
  }
}
