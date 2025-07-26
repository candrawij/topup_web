@extends('layouts.app')

@section('content')
<div class="form-group">
    <label for="category">Kategori</label>
    <select name="category" id="category" class="form-control" required>
        @foreach(App\Models\Product::CATEGORIES as $key => $label)
            <option value="{{ $key }}" {{ old('category') == $key ? 'selected' : '' }}>
                {{ $label }}
            </option>
        @endforeach
    </select>
</div>
@endsection
