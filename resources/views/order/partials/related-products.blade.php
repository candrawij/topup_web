<div class="card shadow d-sm-none d-md-block d-none d-sm-block border-0" style="background-color: #343a40;">
    <div class="card-header bg-dark">
        <h5 class="card-title text-light mb-0">Produk Lainnya</h5>
    </div>
    <div class="card-body p-2">
        @foreach($relatedProducts as $related)
        <div class="col mb-2">
            <div class="card flex-row flex-wrap bg-secondary p-1 border-0">
                <div class="card-header border-0 p-1">
                    <a href="{{ route('order.show', $related->slug) }}" class="stretched-link">
                        <img src="{{ asset('storage/'.$related->image) }}" height="40px" alt="{{ $related->name }}">
                    </a>
                </div>
                <div class="card-body p-1">
                    <b class="text-white" style="font-size:0.9rem;">{{ $related->name }}</b>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>