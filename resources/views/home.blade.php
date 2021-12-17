@extends('layouts.app')

@section('content')
<div class="container">
    <div class="my-4">
        <div class="mx-auto">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <p>¡Usted está conectado!'</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
