@extends('layouts.master')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/australia.css') }}">
@endpush

@section('content')

<main>

    <!-- ================= HERO SECTION ================= -->
    <section class="australia-hero" role="banner" aria-labelledby="australia-heading">
        <!-- Hero Image -->
        <img
            src="{{asset('image/study .webp')}}"
            alt="Students studying in Australia at a university campus"
            width="1920"
            height="500"
            loading="eager"
            class="hero-img"
        >

        <!-- Overlay content -->
        <div class="hero-overlay">
            <div class="hero-content">
                <h1 id="australia-heading">Study in Australia</h1>
                <p>Unlock your potential with world-class education in the land of opportunity.</p>
            </div>
        </div>
    </section>

    <!-- ================= INFO SECTION ================= -->
    <section class="info-section" role="region" aria-label="Australia Study Information">
        <div class="info-container">
            <div class="info-grid">

                <!-- CARD 1 -->
                <article class="card-box" tabindex="0">
                    <div class="icon-wrapper">
                        <i class="fas fa-globe-asia" aria-hidden="true"></i>
                    </div>
                    <h2>Why Australia?</h2>
                    <p>Australia is renowned for high-quality education, a vibrant multicultural environment, and immense global career opportunities.</p>
                    <a href="#" class="btn-link" aria-label="Read more about why study in Australia">
                        Read More <i class="fas fa-arrow-right" aria-hidden="true"></i>
                    </a>
                </article>

                <!-- CARD 2 -->
                <article class="card-box" tabindex="0">
                    <div class="icon-wrapper">
                        <i class="fas fa-hand-holding-heart" aria-hidden="true"></i>
                    </div>
                    <h2>Key Benefits</h2>
                    <p>International students enjoy unlimited work rights, cutting-edge research facilities, and a safe, welcoming community.</p>
                    <a href="#" class="btn-link" aria-label="Read more about key benefits of studying in Australia">
                        Read More <i class="fas fa-arrow-right" aria-hidden="true"></i>
                    </a>
                </article>

                <!-- CARD 3 -->
                <article class="card-box" tabindex="0">
                    <div class="icon-wrapper">
                        <i class="fas fa-university" aria-hidden="true"></i>
                    </div>
                    <h2>Top Universities</h2>
                    <p>Home to the University of Sydney, Melbourne Uni, and ANU. Experience world-class campuses and innovative learning.</p>
                    <a href="#" class="btn-link" aria-label="Read more about top universities in Australia">
                        Read More <i class="fas fa-arrow-right" aria-hidden="true"></i>
                    </a>
                </article>

                <!-- CARD 4 -->
                <article class="card-box" tabindex="0">
                    <div class="icon-wrapper">
                        <i class="fas fa-graduation-cap" aria-hidden="true"></i>
                    </div>
                    <h2>Our Programs</h2>
                    <p>We offer diverse streams including Business, IT, Engineering, Medicine, and Arts tailored for international success.</p>
                    <a href="#" class="btn-link" aria-label="Read more about programs offered in Australia">
                        Read More <i class="fas fa-arrow-right" aria-hidden="true"></i>
                    </a>
                </article>

            </div>
        </div>
    </section>

</main>

@endsection
