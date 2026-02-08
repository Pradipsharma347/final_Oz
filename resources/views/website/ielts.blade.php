@extends('layouts.master')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/ielts.css') }}">
@endpush

@section('content')

<!-- IELTS HERO -->
<section class="ielts-hero">
    <img
        src="{{ asset('image/ielts.webp') }}"
        alt="IELTS Preparation and Band Score Guide"
        width="1920"
        height="600"
        loading="eager"
    >
    <div class="ielts-hero-overlay">
        <div class="ielts-hero-content">
            <h1>IELTS Band Scores</h1>
            <p>Your guide to understanding the 0–9 scoring system</p>
        </div>
    </div>
</section>

<!-- IELTS CONTENT -->
<section class="ielts-section">
    <div class="ielts-container">

        <header class="section-header">
            <h2>How IELTS Scoring Works</h2>
            <p class="intro">
                IELTS uses a 9-band scale to measure English proficiency,
                from non-user (Band 1) to expert (Band 9).
            </p>
        </header>

        <div class="ielts-grid">

            <article class="ielts-card" tabindex="0">
                <h3>Overview</h3>
                <p>
                    IELTS scores are reported on a scale from Band 1 (lowest)
                    to Band 9 (highest). Candidates may receive whole bands
                    (6.0) or half bands (6.5).
                </p>
            </article>

            <article class="ielts-card" tabindex="0">
                <h3>Listening</h3>
                <p>
                    The Listening test contains 40 questions.
                    Each correct answer equals one mark.
                </p>
                <table class="ielts-table">
                    <thead>
                        <tr><th scope="col">Score / 40</th><th scope="col">Band</th></tr>
                    </thead>
                    <tbody>
                        <tr><td>39–40</td><td>9.0</td></tr>
                        <tr><td>35–36</td><td>8.0</td></tr>
                        <tr><td>30–31</td><td>7.0</td></tr>
                        <tr><td>23–25</td><td>6.0</td></tr>
                    </tbody>
                </table>
            </article>

            <article class="ielts-card" tabindex="0">
                <h3>Academic Reading</h3>
                <p>
                    Academic Reading includes texts from books,
                    journals, magazines, and newspapers.
                </p>
                <table class="ielts-table">
                    <thead>
                        <tr><th scope="col">Score / 40</th><th scope="col">Band</th></tr>
                    </thead>
                    <tbody>
                        <tr><td>39–40</td><td>9.0</td></tr>
                        <tr><td>35–36</td><td>8.0</td></tr>
                        <tr><td>30–32</td><td>7.0</td></tr>
                        <tr><td>23–26</td><td>6.0</td></tr>
                    </tbody>
                </table>
            </article>

            <article class="ielts-card" tabindex="0">
                <h3>General Training Reading</h3>
                <p>
                    General Reading focuses on practical texts
                    such as advertisements, notices, and manuals.
                </p>
                <table class="ielts-table">
                    <thead>
                        <tr><th scope="col">Score / 40</th><th scope="col">Band</th></tr>
                    </thead>
                    <tbody>
                        <tr><td>40</td><td>9.0</td></tr>
                        <tr><td>37–38</td><td>8.5</td></tr>
                        <tr><td>34–35</td><td>7.5</td></tr>
                        <tr><td>30–31</td><td>6.5</td></tr>
                    </tbody>
                </table>
            </article>

        </div>
    </div>
</section>

@endsection
