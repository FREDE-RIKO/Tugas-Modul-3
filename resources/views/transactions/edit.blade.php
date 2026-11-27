@extends('layout')

@section('content')
<div class="page-head">
    <div>
        <h2>Edit Transaction</h2>
        <p>Ubah data transaksi</p>
    </div>
    <a href="{{ route('transactions.index') }}" class="btn btn-primary">Kembali</a>
</div>

<form action="{{ route('transactions.update', $transaction->id) }}" method="POST">
    @csrf
    @method('PUT')

    <label for="id_products">Product</label>
    <select name="id_products" id="id_products" required>
        @foreach($products as $product)
            <option value="{{ $product->id }}" {{ $transaction->id_products == $product->id ? 'selected' : '' }}>
                {{ $product->name }}
            </option>
        @endforeach
    </select>

    <label for="quantity">Quantity</label>
    <input type="number" name="quantity" id="quantity" value="{{ $transaction->quantity }}" required>

    <label for="status">Status</label>
    <select name="status" id="status" required>
        <option value="1" {{ $transaction->status == 1 ? 'selected' : '' }}>Berhasil</option>
        <option value="0" {{ $transaction->status == 0 ? 'selected' : '' }}>Pending / Gagal</option>
    </select>

    <button type="submit" class="btn btn-success">Update</button>
</form>
@endsection