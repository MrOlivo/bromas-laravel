@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Formulario de Categorías</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if($errors->any())
                        <div class="alert alert-danger">
                            @foreach($errors->all() as $error)
                            -{{ $error }} <br>
                            @endforeach
                        </div>
                    @endif
                    
                    @if (isset($categoria))
                        <form action="{{ route('categorias.update', $categoria) }}" method="post">
                    @else
                        <form action="{{ route('categorias.store') }}" method="post">
                    @endif
                        <div class="form-group">
                            <label for="categoria">Escribe la categoría:</label>
                            <input type="text" class="form-control" name="categoria" required id="categoria" value="{{ old('categoria', $categoria->categoria ?? '') }}">
                        </div>
                        <div class="form-group">
                            @csrf
                            @if (isset($categoria))
                                @method('PUT')
                            @endif
                            <input type="submit" value="Enviar" class="btn btn-primary">
                            <a href="{{ route('categorias.index') }}" class="btn btn-secondary">Regresar</a>
                        </div>
                        <div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
