@extends('layout')

@section('content')
<div class="page-head">
    <div>
        <h2>Transactions</h2>
        <p>Daftar transaksi keluar masuk barang</p>
    </div>
    <a href="{{ route('transactions.create') }}" class="btn btn-primary">+ Add Transaction</a>
</div>

@if(session('success'))
    <div class="alert">{{ session('success') }}</div>
@endif

<table>
    <thead>
        <tr>
            <th>Product</th>
            <th>Qty</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse($transactions as $t)
        <tr>
            <td><strong>{{ $t->product->name ?? 'Product dihapus' }}</strong></td>
            <td>{{ $t->quantity }} pcs</td>
            <td>
                @if($t->status == 1)
                    <span class="badge badge-success">● Berhasil</span>
                @else
                    <span class="badge badge-danger">● Pending / Gagal</span>
                @endif
            </td>
            <td>
                <div class="aksi">
                    <a href="{{ route('transactions.edit', $t->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('transactions.destroy', $t->id) }}" method="POST" onsubmit="return confirm('Yakin hapus transaksi ini?')">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </div>
            </td>
        </tr>
        @empty
        <tr><td colspan="4" class="empty">Belum ada transaksi</td></tr>
        @endforelse
    </tbody>
</table>
@endsection