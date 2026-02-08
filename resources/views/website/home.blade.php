@extends('layouts.master')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/home.css') }}">
@endpush

@section('content')

@php
    $ceo = \App\Models\CEO::first();
@endphp

<!-- CEO MESSAGE SECTION -->
<section class="home-ceo" aria-labelledby="ceo-heading">
    <div class="container ceo-container">

        <!-- Text Content -->
        <article class="ceo-content">
            <header>
                <h2 id="ceo-heading">Message from the CEO & Founder</h2>
                <p class="dear-students">Dear Students,</p>
            </header>

            <p>
                {!! nl2br(e($ceo->message ?? 'Welcome to <strong>Oz Connect</strong>, where we open doors to international education and help students achieve their global ambitions. As the CEO and Founder, I am proud to guide students toward academic success across Australia, the UK, Canada, the USA, Japan, Denmark, and more.')) !!}
            </p>

            <a href="/aboutus"
               class="read-more-btn"
               aria-label="Read more about Oz Connect vision and leadership">
                Read More About Our Vision
            </a>
        </article>

        <!-- Image -->
        <!-- Image -->
<aside class="ceo-image-wrapper" aria-label="CEO profile image">
    <figure class="image-placeholder">
        @if(file_exists(public_path('ceo/ceo.jpg')))
            <img
                src="{{ asset('ceo/ceo.jpg') }}"
                alt="{{ $ceo->name ?? 'CEO' }}, CEO and Founder of Oz Connect Education Consultancy"
                width="360"
                height="460"
                loading="lazy"
                decoding="async"
            >
            <figcaption class="ceo-name-label">
                {{ $ceo->name ?? 'Mr. Name Surname' }} — CEO & Founder
            </figcaption>
        @else
            <!-- Fallback image if no CEO photo -->
            <img
                src="{{ asset('image/bullet.webp') }}"
                alt="CEO and Founder of Oz Connect Education Consultancy"
                width="360"
                height="460"
                loading="lazy"
                decoding="async"
            >
            <figcaption class="ceo-name-label">
                Mr. Name Surname — CEO & Founder
            </figcaption>
        @endif
    </figure>
</aside>


    </div>
</section>


<!-- CONTACT CTA -->
<section class="contact-cta" aria-labelledby="cta-heading">

    <!-- REAL IMAGE FOR SEO + LCP -->
    <img
        src="{{ asset('image/bookquery.webp') }}"
        alt="Students consulting Oz Connect for study abroad guidance"
        class="cta-bg"
        width="1920"
        height="1080"
        loading="lazy"
        decoding="async"
    >

    <div class="contact-cta-overlay">
        <div class="contact-cta-content">
            <h2 id="cta-heading">Got Any Queries?</h2>
            <p>
                Book an appointment by filling out our inquiry form.
                Our team will get back to you as soon as possible.
            </p>
            <a href="/contactus" class="cta-btn">
                Book An Appointment
            </a>
        </div>
    </div>

</section>

@endsection
