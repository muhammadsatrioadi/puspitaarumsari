@extends('layouts.app')

@section('title', 'Dashboard Admin')

@section('content')
<div class="container my-5">
    <div class="row">
        <div class="col-md-3">
            <div class="card shadow-sm">
                <div class="card-header bg-dark text-white">
                    Navigasi Admin
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <a href="{{ route('admin.dashboard') }}" class="text-decoration-none"><i class="fas fa-tachometer-alt me-2"></i> Dashboard</a>
                    </li>
                    <li class="list-group-item">
                        <a href="{{ route('admin.news.index') }}" class="text-decoration-none"><i class="fas fa-newspaper me-2"></i> Manajemen Berita</a>
                    </li>
                    <li class="list-group-item">
                        <a href="{{ route('admin.gallery.index') }}" class="text-decoration-none"><i class="fas fa-images me-2"></i> Manajemen Galeri</a>
                    </li>
                    {{-- Tambahkan tautan lain untuk manajemen profil, pesan kontak, dll. --}}
                    <li class="list-group-item">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <a href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();" class="text-decoration-none text-danger"><i class="fas fa-sign-out-alt me-2"></i> Logout</a>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-md-9">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h2 class="mb-4">Selamat Datang, Admin!</h2>
                    <p>Gunakan menu di samping untuk mengelola konten website desa Anda.</p>
                    
                    <div class="row mt-4">
                        <div class="col-md-4 mb-3">
                            <div class="card text-white bg-info h-100">
                                <div class="card-body">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <i class="fas fa-newspaper fa-3x"></i>
                                        <h5 class="card-title text-end">Total Berita: {{ App\Models\News::count() }}</h5>
                                    </div>
                                    <a href="{{ route('admin.news.index') }}" class="text-white stretched-link text-decoration-none">Lihat Berita <i class="fas fa-arrow-circle-right ms-2"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="card text-white bg-success h-100">
                                <div class="card-body">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <i class="fas fa-images fa-3x"></i>
                                        <h5 class="card-title text-end">Total Gambar Galeri: {{ App\Models\Gallery::count() }}</h5>
                                    </div>
                                    <a href="{{ route('admin.gallery.index') }}" class="text-white stretched-link text-decoration-none">Lihat Galeri <i class="fas fa-arrow-circle-right ms-2"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="card text-white bg-warning h-100">
                                <div class="card-body">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <i class="fas fa-envelope fa-3x"></i>
                                        <h5 class="card-title text-end">Pesan Kontak Baru: {{ App\Models\ContactMessage::where('read', false)->count() }}</h5> {{-- Assume 'read' column later --}}
                                    </div>
                                    <a href="#" class="text-white stretched-link text-decoration-none">Lihat Pesan <i class="fas fa-arrow-circle-right ms-2"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 