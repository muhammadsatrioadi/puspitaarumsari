<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title', 'Karang Taruna Puspita Arum Sari Website')</title>

        <!-- Google Fonts (Poppins) -->
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">

        <!-- Bootstrap CSS from CDN -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <!-- Font Awesome CSS from CDN -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

        @stack('styles')

        <style>
            :root {
                --bs-primary: #C0392B; /* Elegant Red for primary color */
                --bs-primary-rgb: 192, 57, 43; /* RGB equivalent */
                --bs-dark: #343a40; /* Keep dark as is */
                --bs-body-font-family: 'Poppins', sans-serif;
                --bs-heading-font-family: 'Poppins', sans-serif;
            }

            body {
                font-family: var(--bs-body-font-family);
            }

            h1, h2, h3, h4, h5, h6 {
                font-family: var(--bs-heading-font-family);
                font-weight: 600;
            }

            .fade-in-section {
                opacity: 0;
                transform: translateY(20px);
                transition: opacity 0.6s ease-out, transform 0.6s ease-out;
            }
            .fade-in-section.is-visible {
                opacity: 1;
                transform: translateY(0);
            }

            /* Custom Card Shadow and Hover Effects */
            .card.shadow-sm {
                box-shadow: 0 .125rem .25rem rgba(0,0,0,.075)!important;
                transition: transform 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
            }
            .card.shadow-sm:hover {
                transform: translateY(-5px);
                box-shadow: 0 .5rem 1rem rgba(0,0,0,.15)!important;
            }

            /* Navbar Link Hover Effect */
            .navbar-nav .nav-link {
                position: relative;
                transition: color 0.3s ease-in-out;
            }
            .navbar-nav .nav-link::after {
                content: '';
                position: absolute;
                bottom: -5px;
                left: 0;
                width: 0;
                height: 2px;
                background-color: var(--bs-primary);
                transition: width 0.3s ease-in-out;
            }
            .navbar-nav .nav-link:hover::after,
            .navbar-nav .nav-link.active::after {
                width: 100%;
            }
            .navbar-nav .nav-link:hover {
                color: var(--bs-primary) !important; /* Ensure primary color on hover */
            }
            /* Adjustments for dark background navbar */
            .navbar-dark .nav-link:hover {
                color: #ffffff !important; /* Lighter color for dark background hover */
            }
            .navbar-dark .nav-link.active {
                color: #ffffff !important;
            }
        </style>
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navbar')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                @yield('content')
            </main>
        </div>

        <!-- Bootstrap JS Bundle with Popper from CDN -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        @stack('scripts')

        <!-- Footer -->
        <footer class="bg-dark text-white text-center py-4 mt-5">
            <div class="container">
                <p>&copy; {{ date('Y') }} Karang Taruna Puspita Arum Sari Website. All rights reserved.</p>
            </div>
        </footer>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const observerOptions = {
                    root: null,
                    rootMargin: '0px',
                    threshold: 0.1
                };

                const observer = new IntersectionObserver((entries, observer) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            entry.target.classList.add('is-visible');
                            observer.unobserve(entry.target);
                        }
                    });
                }, observerOptions);

                document.querySelectorAll('.fade-in-section').forEach(section => {
                    observer.observe(section);
                });
            });
        </script>
    </body>
</html>
