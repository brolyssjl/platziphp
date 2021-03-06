@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                  Listado de Posts
                  <a href="{{ route('post_create_path') }}" class="btn btn-primary">Crear Post</a>
                </div>

                <div class="panel-body">
                    <ul>
                      @foreach($posts as $post)
                        <li>{{ $post->title }} - {{ $post->user->name }}</li>
                      @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
