@extends('layouts.master')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/blog.css') }}">
@endpush

@section('content')

<!-- ================= BLOG HERO ================= -->
<section class="blog-hero" aria-labelledby="blog-heading">
    <div class="blog-hero-content">
        <h1 id="blog-heading">Our Blogs</h1>
        <p>
            Stay updated with insights on study abroad, IELTS, PTE, and career guidance
        </p>
    </div>
</section>

<!-- ================= BLOG LIST ================= -->
<section class="blog-section" aria-label="Latest blog posts">
    <div class="blog-container">
        <div class="blog-grid">
            @foreach($blogs as $blog)
                <article class="blog-card" tabindex="0">

                    <!-- Blog Image -->
                    <a href="{{ route('blog.show', $blog->id) }}" aria-label="Read {{ $blog->title }}">
                        <img
                            src="{{ asset('uploads/blogs/'.$blog->image) }}"
                            alt="{{ $blog->title }}"
                            width="1200"
                            height="675"
                            loading="lazy"
                            decoding="async"
                        >
                    </a>

                    <!-- Blog Content -->
                    <div class="blog-content">
                        <time class="date" datetime="{{ $blog->created_at->toDateString() }}">
                            {{ $blog->created_at->format('M d, Y') }}
                        </time>

                        <h2>
                           
                        </h2>

                        <p>{{ Str::limit(strip_tags($blog->content), 120) }}</p>

                        
                    </div>

                </article>
            @endforeach
        </div>
    </div>
</section>

@endsection
