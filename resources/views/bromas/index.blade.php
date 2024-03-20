@extends('layouts.app')

@section('content')
  <div class="container py-4">
    <div class="shadow p-4 bg-white">
      <div class="fs-2 d-flex justify-content-between">
        {{ __('Jokes') }} {{ __('Dashboard') }}
        <a href="{{ route('bromas.create') }}" class="btn btn-sm btn-primary text-white">Crear</a>
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
            <th>Broma</th>
            <th>Categorías</th>
            <th>&nbsp;</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($bromas as $broma)
            <tr>
              <td>{{ $broma->id }}</td>
              <td>{{ $broma->broma }}</td>
              <td>
                @foreach ($broma->categorias as $categoria)
                  {{ $categoria->pivot->categoria_id }}
                @endforeach
              </td>
              <td class="d-flex justify-content-end">
                <form action="{{ route('bromas.destroy', $broma) }}" method="POST">
                  @csrf
                  @method('DELETE')
                  <div class="btn-group">
                    <a href="{{ route('bromas.edit', $broma) }}" class="btn btn-primary btn-sm text-white" type="button"
                      role="button">
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
      {{ $bromas->links() }}
    </div>
  </div>
@endsection
