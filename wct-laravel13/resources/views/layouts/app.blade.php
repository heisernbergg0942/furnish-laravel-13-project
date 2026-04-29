<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="Furnish - Premium Furniture eCommerce Store. Find the perfect furniture for your home.">
    <title>@yield('title', 'Furnish - Premium Furniture Store')</title>

    <!-- Bootstrap 5 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Playfair+Display:wght@400;600;700&display=swap" rel="stylesheet">

    <style>
      :root {
        --furnish-primary: #1a1a1a;
        --furnish-accent: #c8a97e;
        --furnish-accent-dark: #a88456;
        --furnish-light: #f8f5f0;
        --furnish-border: #e8e0d5;
        --furnish-text: #4a4a4a;
        --furnish-muted: #888;
      }

      body {
        font-family: 'Inter', sans-serif;
        color: var(--furnish-text);
        background: #fff;
      }

      h1, h2, h3, h4, h5, h6 {
        font-family: 'Playfair Display', serif;
        color: var(--furnish-primary);
      }

      /* ===== NAVBAR ===== */
      .navbar-custom {
        border-bottom: 1px solid var(--furnish-border);
        position: sticky;
        top: 0;
        z-index: 9999;
        transition: all 0.3s ease;
      }

      .navbar-brand-text {
        font-family: 'Playfair Display', serif;
        font-weight: 700;
        font-size: 1.4rem;
        color: var(--furnish-primary) !important;
        letter-spacing: 0.05rem;
        text-decoration: none;
      }

      .navbar-brand-text span {
        display: block;
        font-size: 0.6rem;
        font-family: 'Inter', sans-serif;
        letter-spacing: 0.3rem;
        font-weight: 500;
        text-transform: uppercase;
        color: var(--furnish-muted);
      }

      .navbar .nav-link {
        font-size: 0.875rem;
        font-weight: 500;
        color: var(--furnish-text) !important;
        padding: 0.5rem 1rem !important;
        transition: color 0.2s;
        text-transform: uppercase;
        letter-spacing: 0.05rem;
      }

      .navbar .nav-link:hover,
      .navbar .nav-link.active {
        color: var(--furnish-accent) !important;
      }

      .nav-link.active {
        border-bottom: 2px solid var(--furnish-accent);
      }

      /* ===== BUTTONS ===== */
      .btn-furnish-primary {
        background-color: var(--furnish-primary);
        color: #fff;
        border: 2px solid var(--furnish-primary);
        border-radius: 0;
        padding: 0.6rem 1.8rem;
        font-size: 0.85rem;
        font-weight: 600;
        letter-spacing: 0.1rem;
        text-transform: uppercase;
        transition: all 0.3s ease;
      }

      .btn-furnish-primary:hover {
        background-color: var(--furnish-accent);
        border-color: var(--furnish-accent);
        color: #fff;
      }

      .btn-furnish-outline {
        background-color: transparent;
        color: var(--furnish-primary);
        border: 2px solid var(--furnish-primary);
        border-radius: 0;
        padding: 0.6rem 1.8rem;
        font-size: 0.85rem;
        font-weight: 600;
        letter-spacing: 0.1rem;
        text-transform: uppercase;
        transition: all 0.3s ease;
      }

      .btn-furnish-outline:hover {
        background-color: var(--furnish-primary);
        color: #fff;
      }

      .btn-furnish-accent {
        background-color: var(--furnish-accent);
        color: #fff;
        border: 2px solid var(--furnish-accent);
        border-radius: 0;
        padding: 0.6rem 1.8rem;
        font-size: 0.85rem;
        font-weight: 600;
        letter-spacing: 0.1rem;
        text-transform: uppercase;
        transition: all 0.3s ease;
      }

      .btn-furnish-accent:hover {
        background-color: var(--furnish-accent-dark);
        border-color: var(--furnish-accent-dark);
        color: #fff;
      }

      /* ===== PRODUCT CARD ===== */
      .product-card {
        border: 1px solid var(--furnish-border);
        border-radius: 0;
        overflow: hidden;
        transition: all 0.3s ease;
        background: #fff;
      }

      .product-card:hover {
        box-shadow: 0 10px 40px rgba(0,0,0,0.1);
        transform: translateY(-4px);
      }

      .product-card .card-img-top {
        height: 260px;
        object-fit: cover;
        transition: transform 0.4s ease;
      }

      .product-card:hover .card-img-top {
        transform: scale(1.05);
      }

      .product-card .card-img-wrapper {
        overflow: hidden;
        position: relative;
      }

      .product-card .card-overlay {
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        background: rgba(26,26,26,0.85);
        padding: 1rem;
        transform: translateY(100%);
        transition: transform 0.3s ease;
      }

      .product-card:hover .card-overlay {
        transform: translateY(0);
      }

      .product-card .card-body {
        padding: 1.25rem;
      }

      .product-card .product-category {
        font-size: 0.7rem;
        text-transform: uppercase;
        letter-spacing: 0.15rem;
        color: var(--furnish-accent);
        font-weight: 600;
      }

      .product-card .product-name {
        font-family: 'Playfair Display', serif;
        font-size: 1.05rem;
        font-weight: 600;
        color: var(--furnish-primary);
        margin: 0.25rem 0;
      }

      .product-card .product-price {
        font-size: 1.1rem;
        font-weight: 700;
        color: var(--furnish-accent);
      }

      /* ===== SECTION HEADERS ===== */
      .section-header {
        text-align: center;
        margin-bottom: 3rem;
      }

      .section-header .subtitle {
        font-size: 0.8rem;
        text-transform: uppercase;
        letter-spacing: 0.3rem;
        color: var(--furnish-accent);
        font-weight: 600;
      }

      .section-header h2 {
        font-size: 2.5rem;
        font-weight: 700;
        margin: 0.5rem 0;
      }

      .section-header p {
        color: var(--furnish-muted);
        max-width: 600px;
        margin: 0 auto;
      }

      /* ===== FOOTER ===== */
      .footer-custom {
        background-color: var(--furnish-primary);
        color: #ccc;
        padding: 4rem 0 0;
      }

      .footer-custom h5 {
        color: #fff;
        font-family: 'Playfair Display', serif;
        margin-bottom: 1.5rem;
        font-size: 1.1rem;
      }

      .footer-custom .footer-link {
        color: #aaa;
        text-decoration: none;
        font-size: 0.875rem;
        display: block;
        margin-bottom: 0.6rem;
        transition: color 0.2s;
      }

      .footer-custom .footer-link:hover {
        color: var(--furnish-accent);
      }

      .footer-custom .footer-bottom {
        border-top: 1px solid #333;
        padding: 1.5rem 0;
        margin-top: 3rem;
        font-size: 0.8rem;
        color: #888;
      }

      .footer-social a {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 38px;
        height: 38px;
        border: 1px solid #444;
        color: #aaa;
        margin-right: 0.5rem;
        transition: all 0.2s;
        text-decoration: none;
      }

      .footer-social a:hover {
        background: var(--furnish-accent);
        border-color: var(--furnish-accent);
        color: #fff;
      }

      /* ===== PAGE HERO ===== */
      .page-hero {
        background: var(--furnish-light);
        padding: 3rem 0;
        border-bottom: 1px solid var(--furnish-border);
      }

      .page-hero h1 {
        font-size: 2.5rem;
        font-weight: 700;
      }

      /* ===== BREADCRUMB ===== */
      .breadcrumb-item a {
        color: var(--furnish-accent);
        text-decoration: none;
      }

      .breadcrumb-item.active {
        color: var(--furnish-muted);
      }

      /* ===== NEWSLETTER ===== */
      .newsletter-section {
        background: var(--furnish-light);
        padding: 4rem 0;
        border-top: 1px solid var(--furnish-border);
        border-bottom: 1px solid var(--furnish-border);
      }

      /* ===== FORMS ===== */
      .form-control, .form-select {
        border-radius: 0;
        border: 1px solid var(--furnish-border);
        padding: 0.75rem 1rem;
        font-size: 0.9rem;
      }

      .form-control:focus, .form-select:focus {
        border-color: var(--furnish-accent);
        box-shadow: 0 0 0 0.2rem rgba(200, 169, 126, 0.2);
      }

      /* ===== ALERTS ===== */
      .alert-success {
        background: #e8f5e9;
        border: 1px solid #a5d6a7;
        border-radius: 0;
        color: #2e7d32;
      }

      .alert-danger {
        background: #ffebee;
        border: 1px solid #ef9a9a;
        border-radius: 0;
        color: #c62828;
      }

      /* ===== SIDEBAR FILTER ===== */
      .sidebar-filter {
        border: 1px solid var(--furnish-border);
        padding: 1.5rem;
      }

      .sidebar-filter h6 {
        font-family: 'Inter', sans-serif;
        font-size: 0.75rem;
        text-transform: uppercase;
        letter-spacing: 0.15rem;
        color: var(--furnish-primary);
        font-weight: 700;
        border-bottom: 1px solid var(--furnish-border);
        padding-bottom: 0.75rem;
        margin-bottom: 1rem;
      }

      /* ===== TESTIMONIAL ===== */
      .testimonial-card {
        background: var(--furnish-light);
        border: 1px solid var(--furnish-border);
        padding: 2rem;
      }

      .testimonial-card .quote-icon {
        font-size: 3rem;
        color: var(--furnish-accent);
        line-height: 1;
        font-family: Georgia, serif;
      }

      /* ===== OFFCANVAS (MOBILE MENU) ===== */
      .offcanvas-header {
        border-bottom: 1px solid var(--furnish-border);
      }

      .badge-category {
        background: var(--furnish-light);
        color: var(--furnish-primary);
        font-size: 0.75rem;
        font-weight: 500;
        border: 1px solid var(--furnish-border);
        padding: 0.3rem 0.8rem;
      }

      /* ===== ANIMATIONS ===== */
      .fade-up {
        animation: fadeUp 0.6s ease forwards;
      }

      @keyframes fadeUp {
        from { opacity: 0; transform: translateY(20px); }
        to   { opacity: 1; transform: translateY(0); }
      }

      /* ===== MISC ===== */
      .text-accent { color: var(--furnish-accent) !important; }
      .bg-furnish-light { background-color: var(--furnish-light) !important; }
      .border-furnish { border-color: var(--furnish-border) !important; }
      .divider { height: 2px; background: var(--furnish-accent); width: 50px; margin: 1rem auto; }
    </style>

    @stack('styles')
  </head>
  <body>

    <!-- ===== NAVBAR ===== -->
    <nav class="navbar navbar-expand-lg bg-white shadow-sm px-4 py-3 navbar-custom" id="mainNav">
      <div class="container-fluid px-0">
        <!-- Brand -->
        <a class="navbar-brand-text" href="{{ route('home') }}">
          Furnish<span>Template</span>
        </a>

        <!-- Desktop Nav -->
        <div class="mx-auto d-lg-flex d-none">
          <ul class="navbar-nav gap-1">
            <li class="nav-item">
              <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}" href="{{ route('about') }}">About Us</a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{ request()->routeIs('products*') ? 'active' : '' }}" href="{{ route('products.index') }}">Products</a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{ request()->routeIs('testimonials') ? 'active' : '' }}" href="{{ route('testimonials') }}">Testimonials</a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{ request()->routeIs('contact') ? 'active' : '' }}" href="{{ route('contact') }}">Contact</a>
            </li>
          </ul>
        </div>

        <!-- Right Side -->
        <div class="d-flex align-items-center gap-3">
          <span class="d-none d-lg-flex align-items-center gap-2 fw-medium" style="font-size:0.85rem;">
            <i class="bi bi-telephone text-accent"></i>
            <span>+90 123 456 789</span>
          </span>
          <!-- Mobile Toggle -->
          <button class="navbar-toggler border-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#mobileMenu" aria-label="Toggle navigation">
            <i class="bi bi-list" style="font-size:1.5rem;"></i>
          </button>
        </div>
      </div>
    </nav>

    <!-- ===== MOBILE OFFCANVAS MENU ===== -->
    <div class="offcanvas offcanvas-end" tabindex="-1" id="mobileMenu">
      <div class="offcanvas-header">
        <h5 class="offcanvas-title" style="font-family:'Playfair Display',serif;">Furnish</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body">
        <ul class="navbar-nav gap-2">
          <li class="nav-item">
            <a class="nav-link fs-5 {{ request()->routeIs('home') ? 'text-accent fw-bold' : '' }}" href="{{ route('home') }}">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link fs-5 {{ request()->routeIs('about') ? 'text-accent fw-bold' : '' }}" href="{{ route('about') }}">About Us</a>
          </li>
          <li class="nav-item">
            <a class="nav-link fs-5 {{ request()->routeIs('products*') ? 'text-accent fw-bold' : '' }}" href="{{ route('products.index') }}">Products</a>
          </li>
          <li class="nav-item">
            <a class="nav-link fs-5 {{ request()->routeIs('testimonials') ? 'text-accent fw-bold' : '' }}" href="{{ route('testimonials') }}">Testimonials</a>
          </li>
          <li class="nav-item">
            <a class="nav-link fs-5 {{ request()->routeIs('contact') ? 'text-accent fw-bold' : '' }}" href="{{ route('contact') }}">Contact</a>
          </li>
        </ul>
        <hr>
        <div class="d-flex align-items-center gap-2 text-muted">
          <i class="bi bi-telephone text-accent"></i>
          <span>+90 123 456 789</span>
        </div>
      </div>
    </div>

    <!-- ===== FLASH MESSAGES ===== -->
    @if(session('success'))
      <div class="alert alert-success alert-dismissible fade show m-0 rounded-0" role="alert">
        <div class="container">
          <i class="bi bi-check-circle me-2"></i>{{ session('success') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      </div>
    @endif
    @if(session('error'))
      <div class="alert alert-danger alert-dismissible fade show m-0 rounded-0" role="alert">
        <div class="container">
          <i class="bi bi-exclamation-circle me-2"></i>{{ session('error') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      </div>
    @endif

    <!-- ===== MAIN CONTENT ===== -->
    @yield('content')

    <!-- ===== NEWSLETTER ===== -->
    @hasSection('no-newsletter')
    @else
    <section class="newsletter-section">
      <div class="container">
        <div class="row justify-content-center text-center">
          <div class="col-lg-6">
            <p class="subtitle mb-2" style="font-size:0.8rem;text-transform:uppercase;letter-spacing:0.3rem;color:var(--furnish-accent);font-weight:600;">Stay Updated</p>
            <h2 class="mb-2">Subscribe to our Newsletter</h2>
            <p class="text-muted mb-4" style="font-size:0.9rem;">Get the latest designs, offers and ideas delivered to your inbox.</p>
            <form class="d-flex gap-0" onsubmit="return false;">
              <input type="email" class="form-control" placeholder="Enter your email address" style="border-right:0;">
              <button class="btn-furnish-primary" style="white-space:nowrap;">Subscribe</button>
            </form>
          </div>
        </div>
      </div>
    </section>
    @endif

    <!-- ===== FOOTER ===== -->
    <footer class="footer-custom">
      <div class="container">
        <div class="row g-4">
          <div class="col-lg-4 col-md-6">
            <h5>Furnish Template</h5>
            <p style="font-size:0.875rem;color:#aaa;line-height:1.8;">We are inspired by the realities of life today, creating spaces that bridge personal and professional living.</p>
            <div class="footer-social mt-3">
              <a href="#"><i class="bi bi-facebook"></i></a>
              <a href="#"><i class="bi bi-instagram"></i></a>
              <a href="#"><i class="bi bi-twitter-x"></i></a>
              <a href="#"><i class="bi bi-pinterest"></i></a>
            </div>
          </div>
          <div class="col-lg-2 col-md-3 col-6">
            <h5>Quick Links</h5>
            <a href="{{ route('home') }}" class="footer-link">Home</a>
            <a href="{{ route('about') }}" class="footer-link">About Us</a>
            <a href="{{ route('products.index') }}" class="footer-link">Products</a>
            <a href="{{ route('testimonials') }}" class="footer-link">Testimonials</a>
            <a href="{{ route('contact') }}" class="footer-link">Contact</a>
          </div>
          <div class="col-lg-2 col-md-3 col-6">
            <h5>Categories</h5>
            <a href="{{ route('products.index', ['category' => 'Living Room']) }}" class="footer-link">Living Room</a>
            <a href="{{ route('products.index', ['category' => 'Bedroom']) }}" class="footer-link">Bedroom</a>
            <a href="{{ route('products.index', ['category' => 'Kitchen']) }}" class="footer-link">Kitchen</a>
            <a href="{{ route('products.index', ['category' => 'Office']) }}" class="footer-link">Office</a>
            <a href="{{ route('products.index', ['category' => 'Outdoor']) }}" class="footer-link">Outdoor</a>
          </div>
          <div class="col-lg-4 col-md-6">
            <h5>We Design All Over the World</h5>
            <div class="d-flex align-items-start gap-3 mb-3">
              <i class="bi bi-geo-alt text-accent" style="font-size:1.2rem;margin-top:2px;"></i>
              <span style="font-size:0.875rem;color:#aaa;">123 Furniture Street, Design District, NY 10001</span>
            </div>
            <div class="d-flex align-items-center gap-3 mb-3">
              <i class="bi bi-telephone text-accent" style="font-size:1.2rem;"></i>
              <span style="font-size:0.875rem;color:#aaa;">+90 123 456 789</span>
            </div>
            <div class="d-flex align-items-center gap-3">
              <i class="bi bi-envelope text-accent" style="font-size:1.2rem;"></i>
              <span style="font-size:0.875rem;color:#aaa;">hello@furnish.com</span>
            </div>
          </div>
        </div>
        <div class="footer-bottom text-center">
          <p class="mb-0">© {{ date('Y') }} Furnish Template. All rights reserved. | Integrated with Laravel {{ app()->version() }}</p>
        </div>
      </div>
    </footer>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <script>
      // Sticky nav shadow on scroll
      window.addEventListener('scroll', function() {
        const nav = document.getElementById('mainNav');
        if (window.scrollY > 50) {
          nav.classList.add('shadow');
        } else {
          nav.classList.remove('shadow');
        }
      });
    </script>

    @stack('scripts')
  </body>
</html>
