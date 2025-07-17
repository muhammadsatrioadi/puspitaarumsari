@extends('layouts.app')

@section('title', 'Edit Berita')

@section('content')
<div class="container my-5">
    <h1>Edit Berita</h1>
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

    <form action="{{ route('admin.news.update', $news->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="title" class="form-label">Judul Berita</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $news->title) }}" required>
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">Isi Berita</label>
            <textarea class="form-control" id="content" name="content" rows="8" required>{{ old('content', $news->content) }}</textarea>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Gambar Berita</label>
            <input type="file" class="form-control" id="image" name="image" accept="image/*">
            @if ($news->image_path)
                <div class="mt-2">
                    <p>Gambar saat ini:</p>
                    <img src="{{ asset('storage/' . $news->image_path) }}" alt="{{ $news->title }}" class="img-thumbnail" width="200">
                </div>
            @else
                <small class="form-text text-muted">Tidak ada gambar saat ini.</small>
            @endif
        </div>
        <button type="submit" class="btn btn-primary">Update Berita</button>
        <a href="{{ route('admin.news.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection 