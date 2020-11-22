@extends('layouts.app')

@section('content')
    <div class="jumbotron mb-4">
        <div class="container">
            <h3 class="font-weight-bold">Edwin Francisco Olivo Garcia</h3>
            <h4>Universidad Autónoma de Nayarit</h4>
            <p>Programación Distribuida del Lado del Servidor</p>
            <a class="btn btn-lg btn-primary" href="{{ route('login') }}">{{ __('Login') }}</a>
        </div>
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-12 col-md-12">
                <div class="card border-0">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                </div>
                @foreach ($bromas as $broma) 
                    <div class="card mb-4 border-0 shadow">
                        <div class="card-body">
                            <h5 class="card-title">Broma</h5>
                            <p class="card-text">
                                {{ $broma->broma }}
                            </p>
                        </div>
                    </div>
                @endforeach
                {{ $bromas->links() }}
            </div>
        </div>
    </div>
@endsection