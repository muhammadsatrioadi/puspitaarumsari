@extends('layouts.app')

@section('title', 'Tambah Gambar Galeri')

@section('content')
<div class="container my-5">
    <h1>Tambah Gambar Galeri</h1>
    <hr>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.gallery.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="image" class="form-label">Pilih Gambar</label>
            <input type="file" class="form-control" id="image" name="image" accept="image/*" required>
        </div>
        <div class="mb-3">
            <label for="caption" class="form-label">Keterangan (Opsional)</label>
            <input type="text" class="form-control" id="caption" name="caption" value="{{ old('caption') }}">
        </div>
        <button type="submit" class="btn btn-primary">Unggah Gambar</button>
        <a href="{{ route('admin.gallery.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection 