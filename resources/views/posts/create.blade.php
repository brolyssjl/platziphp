@extends('layouts.app')

@section('content')

  <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <h1>Crear Post</h1>

        @include('partials.errors')

        <form action="{{ route('post_create_path') }}" method="post">
          {{ csrf_field() }}
          <fieldset class="form-group">
            <label for="title">Título</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="Título" value="{{ old('title') }}">
          </fieldset>

          <fieldset class="form-group">
            <label for="body">Contenido</label>
            <textarea class="form-control" id="body" rows="3" name="body">{{ old('body') }}</textarea>
          </fieldset>

          <button type="submit" class="btn btn-primary">Crear</button>
        </form>

      </div>
    </div>

@stop
