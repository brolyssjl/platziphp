@extends('layouts.app')

@section('content')

  <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <h1>Editar Post</h1>

        @include('partials.errors')

        <form action="{{ route('post_put_path', $post->id) }}" method="post">
          {{ csrf_field() }}
          <input type="hidden" name="_method" value="put">
          <fieldset class="form-group">
            <label for="title">Título</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="Título" value="{{ $post->title }}">
          </fieldset>

          <fieldset class="form-group">
            <label for="body">Contenido</label>
            <textarea class="form-control" id="body" rows="3" name="body">{{ $post->body }}</textarea>
          </fieldset>

          <button type="submit" class="btn btn-primary">Guardar</button>
        </form>

      </div>
    </div>

@stop
