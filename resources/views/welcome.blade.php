@extends('layouts.app')

@section('content')
    <div class="jumbotron mb-6">
        <div class="container">
            <h3 class="font-weight-bold">Edwin Francisco Olivo Garcia</h3>
            <h4>Universidad Autónoma de Nayarit</h4>
            <p>Programación Distribuida del Lado del Servidor</p>
            <a class="btn btn-lg btn-primary" href="{{ route('login') }}">{{ __('Login') }}</a>
        </div>
    </div>
    <div class="container">
        <div class="mb-4 d-flex justify-content-center">
            {{ $bromas->links() }}
        </div>
        <div class="">
            <div class="d-flex flex-row flex-wrap justify-content-center">
                @foreach ($bromas as $broma) 
                    <div class="card shadow m-2" style="max-width: 300px">
                        <div class="card-body">
                            <h5 class="card-title">Broma</h5>
                            <p class="card-text">
                                {{ $broma->broma }}
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="my-4 d-flex justify-content-center">
            {{ $bromas->links() }}
        </div>
    </div>
@endsection