@extends('layouts.master')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/contactus.css') }}">
@endpush

@section('content')

<section class="contact-section">
    <div class="contact-container">
        <h2>Contact Us</h2>

        @if(session('success'))
            <div class="success-msg">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('contact.submit') }}" method="POST" class="contact-form">
            @csrf

            <label for="name">Name</label>
            <input type="text" id="name" name="name" placeholder="Enter your name" required>

            <label for="email">Email</label>
            <input type="email" id="email" name="email" placeholder="Enter your email" required>

            <label for="whatsapp">WhatsApp Number</label>
            <input type="text" id="whatsapp" name="whatsapp" placeholder="+61 XXXXXXXX" required>

            <label for="subject">Subject</label>
            <select id="subject" name="subject" required>
                <option value="">-- Select Subject --</option>
                <option value="Enquiry">Enquiry</option>
                <option value="Appointment">Appointment</option>
                <option value="Other">Other</option>
            </select>

            <label for="message">Message</label>
            <textarea id="message" name="message" placeholder="Write your message..." required></textarea>

            <button type="submit">Send Message</button>
        </form>
    </div>
</section>

@endsection
