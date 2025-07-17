@extends('layouts.app')

@section('title', $news->title)

@section('content')
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <h1 class="mb-4">{{ $news->title }}</h1>
            <p class="text-muted mb-4"><small>Dipublikasikan pada: {{ $news->created_at->format('d M Y H:i') }}</small></p>

            @if ($news->image_path)
                <img src="{{ asset('storage/' . $news->image_path) }}" class="img-fluid rounded mb-4" alt="{{ $news->title }}">
            @else
                <img src="https://source.unsplash.com/random/800x600/?article,indonesia" class="img-fluid rounded mb-4" alt="No Image">
            @endif

            <div class="card mb-4">
                <div class="card-body">
                    <p class="card-text">{!! nl2br(e($news->content)) !!}</p>
                </div>
            </div>

            <a href="{{ route('news.index') }}" class="btn btn-primary"><i class="fas fa-arrow-left me-2"></i> Kembali ke Berita</a>
        </div>
    </div>
</div>
@endsection 