<div class="col">
    <div class="card shadow-sm h-100">
        <div class="card-body">
            <p class="card-text">{{ $broma->broma }}</p>
            <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                    @forelse ($broma->categorias as $elemento)
                    <button type="button" class="btn btn-sm btn-outline-secondary">{{ $elemento->categoria }}</button>
                    @empty
                    <div>No category</div>
                    @endforelse
                </div>
                <small class="text-muted">{{ $broma->fecha }}</small>
            </div>
        </div>
    </div>
</div>
