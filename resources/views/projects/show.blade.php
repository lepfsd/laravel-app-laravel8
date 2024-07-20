@extends('layouts.app')

@section('title')
  portfolio
@endsection

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-12 col-sm-10 col-lg-6 mx-auto">
        @if($project->image)
          <img class="card-img-top" src="/storage/{{ $project->image }}" alt="{{ $project->title }}">
        @endif
        <div class="bg-white p-5 shadow-rounded">
          <h3>{{ $project->title }}</h3>
          <br>
          <p>{{ $project->description }}</p>
          <p>{{ $project->created_at->diffForHumans() }}</p>
          <div class="d-flex justify-content-between align-items-center">
            <div class="btn-group">
              <a href="{{ route('portfolio.index') }}" class="btn btn-link">atras</a>
              <a href="{{ route('portfolio.edit', $project) }}" class="btn btn-warning">editar</a>
              <a href="#" onclick="documment.getElementById('delete-project')" class="btn btn-danger">eliminar</a>
              <form 
                id="delete-project"
                method="POST" 
                action="{{ route('portfolio.destroy', $project) }}" 
                class="d-none">
                  @csrf @method('DELETE')
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection