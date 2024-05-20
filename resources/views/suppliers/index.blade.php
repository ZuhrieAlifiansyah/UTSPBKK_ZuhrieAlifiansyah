{{-- resources/views/suppliers/index.blade.php --}}
@extends('layouts.app')

@section('title', 'Daftar Supplier')

@section('content')
<div class="container">
    <h1 class="mt-5 mb-4 text-center">Daftar Nama Suppliers Bengkel</h1>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Supplier</th>
                    <th>Alamat</th>
                    <th>No HP</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($suppliers as $supplier)
                <tr>
                    <td>{{ $supplier->id_supplier }}</td>
                    <td>{{ $supplier->nama_supplier }}</td>
                    <td>{{ $supplier->alamat }}</td>
                    <td>{{ $supplier->no_hp }}</td>
                    <td>
                        <div class="btn-group" role="group">
                            <a href="{{ route('suppliers.edit', $supplier->id_supplier) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('suppliers.destroy', $supplier->id_supplier) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                            <a href="{{ route('suppliers.show', $supplier->id_supplier) }}" class="btn btn-info">Show</a>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <a href="{{ route('suppliers.create') }}" class="btn btn-primary mb-4">Tambah Supplier</a>
</div>
@endsection
