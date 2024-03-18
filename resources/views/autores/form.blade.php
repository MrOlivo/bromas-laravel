@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Formulario de Autores</div>

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
                    
                    @if (isset($autor))
                        <form action="{{ route('autores.update', $autor) }}" method="post">
                    @else
                        <form action="{{ route('autores.store') }}" method="post">
                    @endif
                        <div class="form-group">
                            <label for="nombre">Escribe tu nombre:</label>
                            <input type="text" class="form-control" name="nombre" minlength="1" required id="nombre" value="{{ old('nombre', $autor->nombre ?? '') }}">
                        </div>
                        <div class="form-group pt-4">
                            <label for="email">Escribe tu email:</label>
                            <input type="email" class="form-control" name="email" required id="email" value="{{ old('email', $autor->email ?? '') }}">
                        </div>
                        <div class="form-group pt-4">
                            @csrf
                            @if (isset($autor))
                                @method('PUT')
                            @endif
                            <input type="submit" value="Enviar" class="btn btn-primary">
                            <a href="{{ route('autores.index') }}" class="btn btn-secondary">Regresar</a>
                        </div>
                        <div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
