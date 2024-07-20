@extends('layouts.app')

@section('title')
  portfolio
@endsection

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-12 col-sm-10 col-lg-6 mx-auto">
        <h1>crear </h1>
        <hr>
        @include('partials.validation-errors')
        <form 
          method="POST" 
          enctype="multipart/form-data" 
          action="{{ route('portfolio.store') }}" 
          class="bg-white shadow rounded py-3 px-4"> 
            @include('projects._form', ['btn' => 'enviar'])
        </form>
      </div>
    </div>
  </div>
@endsection