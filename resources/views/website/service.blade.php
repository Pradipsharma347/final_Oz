@extends('layouts.master')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/service.css') }}">
@endpush

@section('content')

<!-- HERO -->
<section class="services-hero">
    <!-- Updated: Use <img> for background for better SEO & performance -->
    <img src="{{ asset('image/services.webp') }}" alt="Our Services - Oz Connect" loading="eager">
    <div class="hero-overlay">
        <h1>Our Services</h1>
        <p>Expert guidance for your education and study-abroad journey</p>
    </div>
</section>

<!-- SERVICES -->
<section class="services-section">
    <div class="container">

        <h2>What We Offer</h2>

        <div class="services-grid">

            @foreach ([
                ['icon'=>'graduation-cap','title'=>'Education Counseling','text'=>'Personalized guidance to help you choose the right course and university.','color'=>'blue'],
                ['icon'=>'university','title'=>'University Admissions','text'=>'End-to-end application support with error-free submissions.','color'=>'gold'],
                ['icon'=>'book-open','title'=>'Study Support','text'=>'Academic planning and resource support to help you excel.','color'=>'blue'],
                ['icon'=>'globe-asia','title'=>'Career Guidance','text'=>'Strategic career mapping aligned with long-term goals.','color'=>'gold'],
                ['icon'=>'handshake','title'=>'Extended Support','text'=>'Pre-departure briefings and settlement guidance.','color'=>'blue'],
                ['icon'=>'pen-nib','title'=>'Academic Guidance','text'=>'Expert advice on courses, scholarships, and requirements.','color'=>'gold'],
            ] as $service)

                <article class="service-card" tabindex="0">
                    <i class="fas fa-{{ $service['icon'] }} icon {{ $service['color'] }}"></i>
                    <h3 class="{{ $service['color'] === 'gold' ? 'gold-text' : '' }}">
                        {{ $service['title'] }}
                    </h3>
                    <p>{{ $service['text'] }}</p>
                </article>

            @endforeach

        </div>
    </div>
</section>

@endsection
