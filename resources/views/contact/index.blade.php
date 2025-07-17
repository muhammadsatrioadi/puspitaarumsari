@extends('layouts.app')

@section('title', 'Kontak Kami')

@section('content')
<div class="container my-5">
    <h1 class="text-center mb-5">Kontak Kami & Lokasi Karang Taruna Puspita Arum Sari</h1>

    <div class="row">
        <div class="col-md-6 mb-4">
            <div class="card h-100 shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h3>Kirim Pesan kepada Kami</h3>
                </div>
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('contact.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama Anda</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email Anda</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="message" class="form-label">Pesan Anda</label>
                            <textarea class="form-control" id="message" name="message" rows="5" required>{{ old('message') }}</textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Kirim Pesan</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-6 mb-4">
            <div class="card h-100 shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h3>Lokasi Kami</h3>
                </div>
                <div class="card-body">
                    <div class="ratio ratio-16x9">
                        {{-- Replace with your actual Google Maps embed iframe --}}
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.9161726002613!2d107.0000!3d-6.9000!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zM0bEMjcwMzUxMjM0NTY3ODkwMTIzNDU2Nzg5MDEyMzQ1Njc4OTAxMjM0NTY3ODkw!5e0!3m2!1sen!2sid!4v1678901234567!5m2!1sen!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                    <p class="mt-3">Alamat: [Alamat Lengkap Karang Taruna Puspita Arum Sari Anda]</p>
                    <p>Telepon: [Nomor Telepon Karang Taruna Puspita Arum Sari Anda]</p>
                    <p>Email: [Email Karang Taruna Puspita Arum Sari Anda]</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 