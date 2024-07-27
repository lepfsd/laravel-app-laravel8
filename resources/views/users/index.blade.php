@extends('layouts.app')

@section('title')
  users
@endsection

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="d-flex justify-content-between align-items-center">
          <h1>users</h1>
          <a class="btn btn-info" href="#">crear</a><br>
        </div>
        <hr>
        <div class="d-flex flex-wrap justify-content-between align-items-start">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th scope="col">name</th>
                  <th scope="col">email</th>
                  <th scope="col">created_at</th>
                  <th scope="col">role</th>
                </tr>
              </thead>
              <tbody>
              @forelse($users as $user)
                <tr>
                  <td>{{ $user->name }}</td>
                  <td>{{ $user->email }}</td>
                  <td>{{ $user->created_at->format('d-m-Y') }}</td>
                  <td>{{ $user->role }}</td>
                </tr>
              @empty
                <li class="list-group-item border-0">no hay usuarios para mostrar</li>
              @endforelse
              </tbody>
            </table>
          
          {{ $users->links() }}
        </div>
      </div>
    </div>
  </div>

@endsection