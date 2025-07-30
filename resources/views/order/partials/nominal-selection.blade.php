<div class="card shadow mb-3 border-0" style="background-color: #343a40;">
    <div class="card-header bg-dark">
        <h5 class="card-title text-light mb-0">Pilih Nominal</h5>
    </div>
    <div class="card-body p-3">
        <div id="tempatNominal">
            <div class="row row-cols-2 row-cols-md-3 g-3 text-center">
                @foreach($product->variants as $variant)
                <div class="col-lg-4 mt-3">
                    <div class="nominal-option">
                        <input type="radio" name="variant_id" id="variant-{{ $variant->id }}" value="{{ $variant->id }}" class="d-none" required>
                        <label for="variant-{{ $variant->id }}" class="d-block p-2">
                            <div class="nominal-name fw-bold mb-1">{{ $variant->name }}</div>
                            <div class="nominal-price text-warning">{{ number_format($variant->price, 0, ',', '.') }} IDR</div>
                        </label>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

<link href="{{ asset('css/nominal.css') }}" rel="stylesheet">