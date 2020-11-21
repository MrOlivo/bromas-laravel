@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card ">
                <div class="card-header">
                    {{ __('Dashboard') }}
                    <a href="{{ route('autores.create') }}" class="btn btn-sm btn-primary">Crear</a>
                </div>

                <div class="card-body ">
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
                                        <a href="{{ route('autores.edit', $autor) }}" class="btn btn-primary btn-sm">
                                            Editar
                                        </a>  
                                    </td>
                                    <td>
                                        <form action="{{ route('autores.destroy', $autor) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <input type="submit" value="Eliminar" class="btn btn-danger btn-sm" onclick="return confirm('¿Desea eliminar?')">
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
