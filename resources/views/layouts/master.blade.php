<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Oz Connect Consultancy | Study Abroad & Visa Experts</title>

<meta name="description" content="Oz Connect Consultancy helps students study abroad in Australia with expert visa guidance, admissions support, and test preparation.">

<!-- Bootstrap (deferred load) -->
<link rel="preload"
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
      as="style"
      onload="this.rel='stylesheet'">

<noscript>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
</noscript>

<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" loading="lazy">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

<!-- GLOBAL CSS -->
<link rel="stylesheet" href="{{ asset('css/main.css') }}">

@stack('styles')
</head>

<body>
    @include('partials.nav')

    @if(Route::currentRouteName() === 'home')
        @include('partials.carousal')
    @endif

    <main id="main-content">
        <div class="container-fluid">
            @yield('content')
        </div>
    </main>

    @include('partials.footer')

    <!-- Floating WhatsApp Button -->
    <a href="https://wa.me/+61433292585"
       class="whatsapp-float"
       target="_blank"
       rel="noopener noreferrer"
       aria-label="Chat with us on WhatsApp">
        <img src="{{ asset('image/whatsapp.webp') }}" alt="WhatsApp Icon" width="50" height="50" loading="lazy" decoding="async">
    </a>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" defer></script>

    <!-- MOBILE NAVBAR JS -->
    <script>
    document.addEventListener('DOMContentLoaded', function () {
        const hamburger = document.getElementById('hamburger');
        const navLinks = document.getElementById('nav-links');
        const dropdowns = document.querySelectorAll('.dropdown');

        // Toggle main nav
        hamburger.addEventListener('click', function () {
            navLinks.classList.toggle('active');
            hamburger.classList.toggle('active'); // animate bars
            document.body.classList.toggle('no-scroll'); // optional: prevent background scroll
        });

        // Toggle dropdowns on mobile
        dropdowns.forEach(drop => {
            const toggle = drop.querySelector('.dropdown-toggle');
            toggle.addEventListener('click', function(e) {
                e.preventDefault();
                drop.classList.toggle('active');
            });
        });
    });
    </script>
</body>
</html>
