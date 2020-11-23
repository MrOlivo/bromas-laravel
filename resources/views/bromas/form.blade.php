@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Formulario de Bromas</div>

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
                    
                    @if (isset($broma))
                        <form action="{{ route('bromas.update', $broma) }}" method="post">
                    @else
                        <form action="{{ route('bromas.store') }}" method="post">
                    @endif
                        <div class="form-group">
                            <label for="broma">Escribe tu broma</label>
                            <textarea name="broma" class="form-control" id="broma" cols="40" rows="3">{{ old('broma', $broma->broma ?? '') }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="autor_id">Autor</label>
                            <select name="Autor" id="autor_id">
                                <option value="">Seleccione uno...</option>
                                @foreach ($autores as $autor)
                                <option value="{{ old('id', $autor->id) }}" 
                                    @php
                                        if (isset($broma)) {
                                            echo ($autor->id === $broma->autor_id ? ' selected ' : '');
                                        }
                                    @endphp>
                                    {{ old('nombre', $autor->nombre) }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <fieldset>
                                <legend>Categorías</legend>
                                @foreach ($categorias as $categoria)
                                    <div>
                                        <label for="categoria">
                                            <input type="checkbox" name="categorias[]" value="{{ old('id', $categoria->id) }}" 
                                            @php
                                                echo ($categoria->selected ? ' checked ' : '');
                                            @endphp>
                                        </label>
                                        {{ old('categoria', $categoria->categoria) }}
                                    </div>
                                @endforeach
                            </fieldset>
                        </div>
                        <div class="form-group">
                            @csrf
                            @if (isset($broma))
                                @method('PUT')
                            @endif
                            <input type="submit" class="btn btn-primary" value="Enviar" name="Action">
                            <a href="{{ route('bromas.index') }}" class="btn btn-secondary">Regresar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
