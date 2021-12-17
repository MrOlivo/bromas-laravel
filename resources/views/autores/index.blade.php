@extends('layouts.app')

@section('content')
<div class="container">
    <div class="shadow-sm p-4">
        <div class="fs-2 d-flex justify-content-between">
            {{ __('Dashboard') }}
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
                    <th colspan="2">&nbsp;</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($autores as $autor)
                <tr>
                    <td>{{ $autor->id }}</td>
                    <td>{{ $autor->nombre }}</td>
                    <td>{{ $autor->email }}</td>
                    <td>
                        <a href="{{ route('autores.edit', $autor) }}" class="btn btn-primary text-white btn-sm">
                            Editar
                        </a>
                    </td>
                    <td>
                        <form action="{{ route('autores.destroy', $autor) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <input type="submit" value="Eliminar" class="btn btn-danger text-white btn-sm" onclick="return confirm('¿Desea eliminar?')">
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
