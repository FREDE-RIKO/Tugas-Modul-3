@extends('layout')

@section('content')
<div class="page-head">
    <div>
        <h2>Add Transaction</h2>
        <p>Tambah transaksi baru</p>
    </div>
    <a href="{{ route('transactions.index') }}" class="btn btn-primary">Kembali</a>
</div>

<form action="{{ route('transactions.store') }}" method="POST">
    @csrf

    <label for="id_products">Product</label>
    <select name="id_products" id="id_products" required>
        <option value="">-- Pilih Product --</option>
        @foreach($products as $product)
            <option value="{{ $product->id }}">{{ $product->name }}</option>
        @endforeach
    </select>

    <label for="quantity">Quantity</label>
    <input type="number" name="quantity" id="quantity" placeholder="Contoh: 10" required>

    <label for="status">Status</label>
    <select name="status" id="status" required>
        <option value="">-- Pilih Status --</option>
        <option value="1">Berhasil</option>
        <option value="0">Pending / Gagal</option>
    </select>

    <button type="submit" class="btn btn-success">Save</button>
</form>
@endsection