@extends('layouts.app')

@section('title')
  portfolio
@endsection

@section('content')
 

  <div class="container">
    <div class="row">
      <div class="col-12 col-sm-10 col-lg-6 mx-auto">
      <h1>editar </h1>
      <hr>
      @include('partials.validation-errors')
      <form method="POST" action="{{ route('portfolio.update', $project) }}" class="bg-white shadow rounded py-3 px-4"> 
        @method('PUT')
        @include('projects._form', ['btn' => 'actualizar'])
      </form>
      </div>
    </div>
  </div>
@endsection