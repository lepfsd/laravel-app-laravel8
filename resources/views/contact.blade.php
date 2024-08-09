@extends('layouts.app')

@section('title')
  contact
@endsection

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-12 col-sm-10 col-lg-6 mx-auto">
        <h1>contact</h1>
        <hr>  
        <form method="POST" action="{{ route('contact') }}" class="bg-white shadow rounded py-3 px-4">
          @csrf
          <div class="form-group">
            <input type="text" class="form-control @error('nombre') is-invalid @enderror" name="nombre" placeholder="Nombre..." value="{{ old('nombre') }}">
            @error('nombre')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
          </div>
          <div class="form-group">
            <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Email..." value="{{ old('email') }}">
            @error('email')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
          </div>
          <div class="form-group">
            <input type="text" name="subject" class="form-control @error('subject') is-invalid @enderror" placeholder="Asunto..." value="{{ old('subject') }}">
            @error('subject')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
          </div>
          <div class="form-group">
            <textarea name="mensaje" class="form-control @error('mensaje') is-invalid @enderror" placeholder="mensaje...">{{ old('mensaje') }}</textarea><br>
            @error('mensaje')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
          </div> 
          <button class="btn btn-primary btn-block">enviar</button>
        </form> 
      </div>
    </div>
  </div> 
@endsection