@extends('layouts.app')

@section('title', 'Galeri Karang Taruna Puspita Arum Sari')

@section('content')
<div class="container my-5">
    <h1 class="text-center mb-5">Galeri Foto Karang Taruna Puspita Arum Sari</h1>

    @if ($galleries->isEmpty())
        <p class="text-center">Belum ada gambar di galeri.</p>
    @else
        <div class="row fade-in-section">
            @foreach ($galleries as $item)
                <div class="col-md-4 col-lg-3 mb-4">
                    <div class="card h-100 shadow-sm">
                        @if ($item->image_path)
                            <a href="{{ asset('storage/' . $item->image_path) }}" download="{{ basename($item->image_path) }}" target="_blank">
                                <img src="{{ asset('storage/' . $item->image_path) }}" class="card-img-top" alt="{{ $item->caption }}" style="height: 200px; object-fit: cover;">
                            </a>
                        @else
                            <a href="https://source.unsplash.com/random/400x200/?village,landscape,nature" download="no_image.jpg" target="_blank">
                                <img src="https://source.unsplash.com/random/400x200/?village,landscape,nature" class="card-img-top" alt="No Image" style="height: 200px; object-fit: cover;">
                            </a>
                        @endif
                        <div class="card-body d-flex flex-column">
                            <p class="card-text">{{ $item->caption }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="d-flex justify-content-center mt-4">
            {{ $galleries->links('pagination::bootstrap-5') }}
        </div>
    @endif
</div>
@endsection 