@extends('layout')

@section('content')
<div class="page-head">
    <h2>Edit Stock</h2>
    <a href="/stocks" class="btn btn-primary">Kembali</a>
</div>

<form action="/stocks/{{ $stock->id }}" method="POST">
    @csrf
    @method('PUT')

    <label for="id_products">Product</label>
    <select name="id_products" id="id_products" required>
        @foreach($products as $product)
            <option value="{{ $product->id }}" {{ $stock->id_products == $product->id ? 'selected' : '' }}>
                {{ $product->name }}
            </option>
        @endforeach
    </select>

    <label for="type">Type</label>
    <select name="type" id="type" required>
        <option value="masuk" {{ $stock->type == 'masuk' ? 'selected' : '' }}>Masuk</option>
        <option value="keluar" {{ $stock->type == 'keluar' ? 'selected' : '' }}>Keluar</option>
    </select>

    <label for="quantity">Quantity</label>
    <input type="number" name="quantity" id="quantity" value="{{ $stock->quantity }}" required>

    <button type="submit" class="btn btn-success">Update</button>
</form>
@endsection