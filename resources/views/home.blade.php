@extends('layouts.main')

@section('content')
  <h1>Estos son nuestros Posts</h1>
  <ul>
    @foreach($posts as $post)
      <li>
        <a href="{{ route('post_show_path', $post->id) }}">{{ $post->title }}</a>
        Hecho por {{ $post->user->name }}
      </li>
    @endforeach
  </ul>
@stop
