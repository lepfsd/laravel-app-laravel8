@extends('layouts.app')

@section('title')
  messages
@endsection

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="d-flex justify-content-between align-items-center">
          <h1>messages</h1>
          <a class="btn btn-info" href="{{ route('contact') }}">crear</a><br>
        </div>
        <hr>
        <div class="d-flex flex-wrap justify-content-between align-items-start">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th scope="col">name</th>
                  <th scope="col">email</th>
                  <th scope="col">created_at</th>
                  <th scope="col">message</th>
                </tr>
              </thead>
              <tbody>
              @forelse($messages as $msj)
                <tr>
                  <td>{{ $msj->nombre }}</td>
                  <td>{{ $msj->email }}</td>
                  <td>{{ $msj->created_at->format('d-m-Y') }}</td>
                  <td>{{ $msj->mensaje }}</td>
                  <td>
                  <a href="#" onclick="document.getElementById('delete-project')" class="btn btn-danger">eliminar</a>
                    <form 
                      id="delete-project"
                      method="DELETE" 
                      action="{{ route('contact.destroy', ['id' => $msj->id]) }}" 
                      class="d-none">
                        @csrf @method('DELETE')
                    </form>
                  </td>
                </tr>
              @empty
                <li class="list-group-item border-0">no hay mensajes para mostrar</li>
              @endforelse
              </tbody>
            </table>
        </div>
        <nav>{{ $messages->links() }}</nav>
      </div>
    </div>
  </div>

@endsection