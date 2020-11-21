@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card ">
                <div class="card-header">
                    {{ __('Dashboard') }}
                    <a href="{{ route('bromas.create') }}" class="btn btn-sm btn-primary">Crear</a>
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
                                        <a href="{{ route('bromas.edit', $broma) }}" class="btn btn-primary btn-sm">
                                            Editar
                                        </a>  
                                    </td>
                                    <td>
                                        <form action="{{ route('bromas.destroy', $broma) }}" method="POST">
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
