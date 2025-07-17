@extends('layouts.app')

@section('title', 'Manajemen Galeri')

@section('content')
<div class="container my-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Manajemen Galeri</h1>
        <a href="{{ route('admin.gallery.create') }}" class="btn btn-primary">Tambah Gambar Baru</a>
    </div>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="row">
        @forelse ($galleries as $item)
            <div class="col-md-3 mb-4">
                <div class="card h-100 shadow-sm">
                    <img src="{{ asset('storage/' . $item->image_path) }}" class="card-img-top" alt="{{ $item->caption }}">
                    <div class="card-body d-flex flex-column">
                        <p class="card-text">{{ $item->caption }}</p>
                        <form action="{{ route('admin.gallery.destroy', $item->id) }}" method="POST" class="mt-auto d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus gambar ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm w-100">Hapus</button>
                        </form>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <p class="text-center">Belum ada gambar di galeri.</p>
            </div>
        @endforelse
    </div>

    <div class="d-flex justify-content-center mt-4">
        {{ $galleries->links('pagination::bootstrap-5') }}
    </div>
</div>
@endsection 