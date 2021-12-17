@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="shadow-sm p-4 bg-white">
        <div class="fs-2 d-flex justify-content-between">
            {{ __('Categories') }} {{ __('Dashboard') }}
            <a href="{{ route('categorias.create') }}" class="btn btn-sm btn-primary text-white">Crear</a>
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
                    <th>Categoria</th>
                    <th colspan="2">&nbsp;</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categorias as $categoria)
                <tr>
                    <td>{{ $categoria->id }}</td>
                    <td>{{ $categoria->categoria }}</td>
                    <td>
                        <a href="{{ route('categorias.edit', $categoria) }}" class="btn btn-primary btn-sm text-white">
                            Editar
                        </a>
                    </td>
                    <td>
                        <form action="{{ route('categorias.destroy', $categoria) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <input type="submit" value="Eliminar" class="btn btn-danger btn-sm text-white" onclick="return confirm('¿Desea eliminar?')">
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $categorias->links() }}
    </div>
</div>
@endsection
