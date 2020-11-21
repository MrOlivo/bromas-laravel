@extends('layouts.app')

@section('content')
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card border-0">
                        @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                        @endif
                    </div>
                    @foreach ($bromas as $broma) 
                        <div class="card my-4 border-0 shadow">
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
    </body>
</html>
@endsection