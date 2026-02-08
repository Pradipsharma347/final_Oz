@extends('layouts.master')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/testimonial.css') }}">
@endpush

@section('content')

<section class="testimonial-section">
    <div class="testimonial-container">
        <h2 class="testimonial-title">What Our Clients Say</h2>

        <div class="testimonial-grid">
            @foreach($testimonials as $t)
                <article class="testimonial-card">
                    <img src="{{ asset('uploads/testimonials/'.$t->image) }}"
                         alt="{{ $t->name }}" width="95" height="95" loading="lazy">

                    <h4>{{ $t->name }}</h4>
                    <p>“{{ $t->message }}”</p>
                </article>
            @endforeach
        </div>
    </div>
</section>

@endsection
