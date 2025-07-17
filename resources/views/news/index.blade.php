@extends('layouts.app')

@section('title', 'Berita Karang Taruna Puspita Arum Sari')

@section('content')
<div class="container my-5">
    <h1 class="text-center mb-5">Berita Terbaru Karang Taruna Puspita Arum Sari</h1>

    @if ($news->isEmpty())
        <p class="text-center">Belum ada berita terbaru.</p>
    @else
        <div class="row fade-in-section">
            @foreach ($news as $item)
                <div class="col-md-4 mb-4">
                    <div class="card h-100 shadow-sm">
                        @if ($item->image_path)
                            <img src="{{ asset('storage/' . $item->image_path) }}" class="card-img-top" alt="{{ $item->title }}">
                        @else
                            <img src="https://source.unsplash.com/random/400x250/?news,indonesia" class="card-img-top" alt="No Image">
                        @endif
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">{{ $item->title }}</h5>
                            <p class="card-text text-muted mb-2"><small>{{ $item->created_at->format('d M Y') }}</small></p>
                            <p class="card-text">{{ Str::limit($item->content, 100) }}</p>
                            <a href="{{ route('news.show', $item->id) }}" class="btn btn-primary mt-auto">Baca Selengkapnya</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="d-flex justify-content-center mt-4">
            {{ $news->links('pagination::bootstrap-5') }}
        </div>
    @endif
</div>
@endsection 