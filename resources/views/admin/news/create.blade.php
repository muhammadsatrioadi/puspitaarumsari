@extends('layouts.app')

@section('title', 'Tambah Berita Baru')

@section('content')
<div class="container my-5">
    <h1>Tambah Berita Baru</h1>
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

    <form action="{{ route('admin.news.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Judul Berita</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" required>
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">Isi Berita</label>
            <textarea class="form-control" id="content" name="content" rows="8" required>{{ old('content') }}</textarea>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Gambar Berita</label>
            <input type="file" class="form-control" id="image" name="image" accept="image/*">
            @if (old('image_path'))
                <small class="form-text text-muted">Gambar yang sudah diunggah: {{ old('image_path') }}</small>
            @endif
        </div>
        <button type="submit" class="btn btn-primary">Simpan Berita</button>
        <a href="{{ route('admin.news.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection 