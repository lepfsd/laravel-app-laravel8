@extends('layouts.app')

@section('title')
  portfolio
@endsection

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="d-flex justify-content-between align-items-center">
          <h1>portfolio</h1>
          <a class="btn btn-info" href="{{ route('portfolio.create') }}">crear</a><br>
        </div>
        <hr>
        
        <div class="d-flex flex-wrap justify-content-between align-items-start">
          @forelse($projects as $project)
            <div class="card" style="width: 18rem;">
              @if($project->image)
                <img class="card-img-top" src="/storage/{{ $project->image }}" alt="{{ $project->title }}">
              @endif
              <div class="card-body">
                <h5 class="card-title">{{ $project->title }}</h5>
                <h6 class="card-subtitle">{{ $project->created_at->format('d-m-Y') }}</h6>
                <p class="card-text text-truncate">{{ $project->description }}</p>
                <a href="{{ route('portfolio.show', $project) }}" class="btn btn-primary">portfolio detail</a>
              </div>
            </div>
          @empty
            <li class="list-group-item border-0">no hay proyectos para mostrar</li>
          @endforelse
          {{ $projects->links() }}
        </div>
      </div>
    </div>
  </div>

@endsection