@extends('layouts.app')

@section('content')
  <div class="container py-4">
    <div class="shadow p-4 bg-white">
      <div class="fs-2 d-flex justify-content-between">
        {{ __('Authors') }} {{ __('Dashboard') }}
        <a href="{{ route('autores.create') }}" class="btn btn-primary text-white">Crear</a>
      </div>

      @if (session('status'))
        <div class="alert alert-success" role="alert">
          {{ session('status') }}
        </div>
      @endif

      <table class="table">
        <thead>
          <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Email</th>
            <th>&nbsp;</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($autores as $autor)
            <tr>
              <td>{{ $autor->id }}</td>
              <td>{{ $autor->nombre }}</td>
              <td>{{ $autor->email }}</td>
              <td class="d-flex justify-content-end">
                <form action="{{ route('autores.destroy', $autor) }}" method="POST">
                  @csrf
                  @method('DELETE')
                  <div class="btn-group">
                    <a href="{{ route('autores.edit', $autor) }}" class="btn btn-primary btn-sm text-white"
                      type="button" role="button">
                      Editar
                    </a>
                    <input type="submit" value="Eliminar" class="btn btn-danger btn-sm text-white"
                      onclick="return confirm('¿Desea eliminar?')">
                  </div>
                </form>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
      {{ $autores->links() }}
    </div>
  </div>
@endsection
