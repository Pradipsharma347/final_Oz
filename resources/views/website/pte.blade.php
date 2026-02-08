@extends('layouts.master')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/pte.css') }}">
@endpush

@section('content')

<!-- PTE HERO -->
<section class="pte-hero">
    <img
        src="{{ asset('image/pte.webp') }}"
        alt="PTE Academic Score Guide"
        width="1920"
        height="600"
        loading="eager"
    >
    <div class="pte-hero-overlay">
        <div class="pte-hero-content">
            <h1>PTE Academic Scores</h1>
            <p>Your comprehensive guide to PTE scoring and IELTS comparison</p>
        </div>
    </div>
</section>

<!-- PTE CONTENT -->
<section class="pte-section">
    <div class="pte-container">

        <header class="section-header">
            <h2>PTE Score System</h2>
            <p class="pte-intro">
                PTE Academic is scored on a scale from 10 to 90, measuring your
                overall English proficiency across Listening, Reading,
                Speaking, and Writing.
            </p>
        </header>

        <div class="pte-grid">
            <article class="pte-card" tabindex="0">
                <h3>What is PTE Academic?</h3>
                <p>
                    PTE Academic is a computer-based English language test
                    accepted by thousands of institutions worldwide. It uses
                    AI-driven scoring to evaluate real-life English skills.
                </p>
            </article>

            <article class="pte-card" tabindex="0">
                <h3>How PTE is Scored</h3>
                <p>
                    Your responses are assessed by an automated scoring system.
                    Scores reflect accuracy, oral fluency, pronunciation, and
                    the quality of written responses.
                </p>
            </article>
        </div>

        <div class="pte-grid">
            <article class="pte-card" tabindex="0">
                <h3>PTE Score Guide</h3>
                <p>
                    Understand what your PTE score represents in terms of
                    English proficiency.
                </p>

                <div class="table-wrapper">
                    <table class="pte-table">
                        <thead>
                            <tr><th scope="col">Score Range</th><th scope="col">Proficiency Level</th></tr>
                        </thead>
                        <tbody>
                            <tr><td>85 – 90</td><td>Expert</td></tr>
                            <tr><td>76 – 84</td><td>Very Good</td></tr>
                            <tr><td>59 – 75</td><td>Good / Competent</td></tr>
                            <tr><td>43 – 58</td><td>Modest</td></tr>
                            <tr><td>30 – 42</td><td>Limited</td></tr>
                        </tbody>
                    </table>
                </div>
            </article>

            <article class="pte-card" tabindex="0">
                <h3>PTE vs IELTS Comparison</h3>
                <p>
                    Compare PTE Academic scores with IELTS band equivalents.
                </p>

                <div class="table-wrapper">
                    <table class="pte-table">
                        <thead>
                            <tr>
                                <th scope="col">IELTS</th>
                                <th scope="col">PTE Overall</th>
                                <th scope="col">Writing</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr><td>4.5</td><td>30</td><td>-</td></tr>
                            <tr><td>5.0</td><td>36</td><td>36</td></tr>
                            <tr><td>5.5</td><td>42</td><td>42</td></tr>
                            <tr><td>6.0</td><td>50</td><td>50</td></tr>
                            <tr><td>6.5</td><td>58</td><td>58</td></tr>
                            <tr><td>7.0</td><td>65</td><td>65</td></tr>
                            <tr><td>7.5</td><td>73</td><td>73</td></tr>
                            <tr><td>8.0</td><td>79</td><td>79</td></tr>
                        </tbody>
                    </table>
                </div>
            </article>
        </div>

    </div>
</section>

@endsection
