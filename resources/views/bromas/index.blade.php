@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="shadow-sm p-4 bg-white">
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
                    <th colspan="2">&nbsp;</th>
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
                    <td>
                        <a href="{{ route('bromas.edit', $broma) }}" class="btn btn-primary btn-sm text-white">
                            Editar
                        </a>
                    </td>
                    <td>
                        <form action="{{ route('bromas.destroy', $broma) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <input type="submit" value="Eliminar" class="btn btn-danger btn-sm text-white" onclick="return confirm('¿Desea eliminar?')">
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
