@extends('layouts.main')

@section('content')
  <h1>Estos son nuestros Posts</h1>
  <ul class="list-unstyled">
    @foreach($posts as $post)
      <li>
        <p class="lead">
          <a href="{{ route('post_show_path', $post->id) }}">{{ $post->title }}</a>
        </p>
        <br>
        Hecho por {{ $post->user->name }}
      </li>
      <hr>
    @endforeach
  </ul>
@stop
