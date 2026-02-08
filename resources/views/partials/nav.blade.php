<header>
<nav class="navbar" role="navigation" aria-label="Main navigation">
    <div class="logo">
        <a href="/" aria-label="Oz Connect Home">
            <img src="{{ asset('image/oz.webp') }}"
                 alt="Oz Connect Education Consultancy Logo"
                 width="70" height="70"
                 loading="eager"
                 decoding="async">
            <span>OZ_Connect</span>
        </a>
    </div>

    <button class="hamburger" id="hamburger" aria-label="Toggle navigation" aria-expanded="false">
        <span class="bar"></span>
        <span class="bar"></span>
        <span class="bar"></span>
    </button>

    <ul class="nav-links" id="nav-links">
        <li><a href="/">Home</a></li>
        <li><a href="/aboutus">About Us</a></li>
        <li><a href="/service">Services</a></li>
        <li><a href="/contactus">Contact Us</a></li>
        <li><a href="/blog">Blog</a></li>

        <li class="dropdown">
            <a href="#" class="dropdown-toggle" aria-haspopup="true">Test Preparation</a>
            <ul class="dropdown-menu">
                <li><a href="/ielts">IELTS Preparation</a></li>
                <li><a href="/pte">PTE Preparation</a></li>
            </ul>
        </li>

        <li><a href="{{ route('website.testimonial') }}">Testimonials</a></li>

        <li class="dropdown">
            <a href="#" class="dropdown-toggle" aria-haspopup="true">Study Abroad</a>
            <ul class="dropdown-menu">
                <li><a href="/australia">Study in Australia</a></li>
            </ul>
        </li>

        <li>
            <a href="{{ route('admin.login') }}" class="login-btn">Login</a>
        </li>
    </ul>
</nav>
</header>
