<div>
    <div class="card shadow m-2" style="max-width: 300px">
        <div class="card-body">
            <h5 class="card-title">Broma</h5>
            <p class="card-text">
                {{ $broma->broma }}
            </p>
        </div>
        <div class="card-footer pt-2 bg-secondary">
            @forelse ($broma->categorias as $elemento)
                <div class="text-white">{{ $elemento->categoria }}</div>
            @empty
                <div class="text-white">Sin categoría</div>
            @endforelse
        </div>
    </div>
</div>