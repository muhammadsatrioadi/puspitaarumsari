@extends('layouts.app')

@section('title', 'Beranda Karang Taruna Puspita Arum Sari')

@section('content')
    <!-- Header/Banner Section -->
    <header class="jumbotron jumbotron-fluid text-white bg-primary text-center py-5 fade-in-section" style="background-image: url('https://source.unsplash.com/random/1500x500/?village,indonesia'); background-size: cover; background-position: center;">
        <div class="container">
            <h1 class="display-4">Selamat Datang di Puspita Arum Sari</h1>
            <p class="lead">Membangun Karang Taruna Puspita Arum Sari yang Maju dan Sejahtera</p>
        </div>
    </header>

    <!-- About Section -->
    <section id="about" class="py-5 fade-in-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto text-center">
                    <h2 class="mb-4">Sekilas Tentang Karang Taruna Puspita Arum Sari Kami</h2>
                    <p class="lead mb-4">
                        Karang Taruna Puspita Arum Sari merupakan wadah generasi muda untuk berkarya, berorganisasi, dan berkontribusi dalam pembangunan sosial di lingkungan kami. Melalui berbagai kegiatan kepemudaan, sosial, dan pemberdayaan masyarakat, kami berupaya menciptakan pemuda yang kreatif, peduli, dan bertanggung jawab. Bersama, kita wujudkan Karang Taruna yang solid, inovatif, dan bermanfaat bagi masyarakat sekitar.
                    </p>
                    <a href="{{ url('/profil') }}" class="btn btn-primary btn-lg">Baca Selengkapnya tentang Profil Karang Taruna Puspita Arum Sari</a>
                </div>
            </div>
        </div>
    </section>
@endsection 