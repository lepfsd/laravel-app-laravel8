@extends('layouts.app')

@section('title')
  portfolio
@endsection

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="d-flex justify-content-between align-items-center">
          @isset($category)
            <h1>{{ $category->name }}</h1>
          @else
            <h1>portfolio</h1>
          @endisset
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
                <div class="d-flex justify-content-between align-items-center">
                  <a href="{{ route('portfolio.show', $project) }}" class="btn btn-primary">portfolio detail</a>
                  @if($project->category_id)
                    <a href="{{ route('categories.show', $project->category) }}" class="badge badge-secondary">{{ $project->category->name }}</a>
                  @endif
                </div>
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