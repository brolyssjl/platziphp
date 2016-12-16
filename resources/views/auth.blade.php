@extends('layouts.main')

@section('content')
  @if($errors->any())
    <div class="alert alert-danger">
      <ul class="list-unstyled">
        @foreach($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif
  <form class="form" action="{{ route('auth_store_path') }}" method="post">
    {{ csrf_field() }}
    <div class="form-group">
      <label for="email">Email</label>
      <input type="text" name="email" class="form-control">
    </div>
    <div class="form-group">
      <label for="password">Password</label>
      <input type="password" name="password" class="form-control">
    </div>
    <div class="form-group">
      <button type="submit" class="btn btn-primary">Iniciar Sesión</button>
    </div>
  </form>
@stop
