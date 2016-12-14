<?php

namespace PlatziPHP\Http\Controllers;

use Illuminate\Http\Request;
use PlatziPHP\Post;

class HomeController extends Controller
{
    public function index(){
      //Con el with() nos permite traer de una vez
      //en una sola consulta los usuarios (en este caso)
      $posts = Post::with(['user'])->get();
      return view('home', ['posts' => $posts]);
    }
}
