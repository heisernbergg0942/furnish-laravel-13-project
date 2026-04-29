@extends('layouts.app')

@section('title', 'Testimonials - Furnish Premium Furniture Store')

@section('content')

  <!-- ===== PAGE HERO ===== -->
  <section class="page-hero">
    <div class="container">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-2">
          <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
          <li class="breadcrumb-item active">Testimonials</li>
        </ol>
      </nav>
      <h1>Customer Testimonials</h1>
    </div>
  </section>

  <!-- ===== STATS ===== -->
  <section class="py-4" style="background:var(--furnish-primary);">
    <div class="container">
      <div class="row g-3 text-center text-white">
        @foreach([
          ['5000+', 'Happy Customers'],
          ['4.9', 'Average Rating'],
          ['98%', 'Satisfaction Rate'],
          ['200+', 'Reviews'],
        ] as $stat)
        <div class="col-6 col-md-3">
          <h3 style="font-family:'Playfair Display',serif;color:var(--furnish-accent);margin:0;">{{ $stat[0] }}</h3>
          <p style="font-size:0.8rem;color:#aaa;margin:0;text-transform:uppercase;letter-spacing:0.1rem;">{{ $stat[1] }}</p>
        </div>
        @endforeach
      </div>
    </div>
  </section>

  <!-- ===== ALL TESTIMONIALS ===== -->
  <section class="py-5 py-lg-6" style="padding-top:5rem!important;padding-bottom:5rem!important;">
    <div class="container">
      <div class="section-header">
        <p class="subtitle">Real People, Real Stories</p>
        <h2>What Our Customers Say</h2>
        <div class="divider"></div>
        <p class="mt-2">We take pride in every piece of furniture we deliver. Here's what our happy customers have to say.</p>
      </div>

      <div class="row g-4">
        @foreach([
          ['John Doe', 'Interior Designer, New York', 5, 'The quality of furniture from Furnish is absolutely exceptional. My living room has been completely transformed and I couldn\'t be happier with the results. The delivery team was professional and extremely careful with every piece. I will definitely be ordering more items for my other projects.'],
          ['Sarah Williams', 'Homemaker, Los Angeles', 5, 'I ordered a complete bedroom set and the craftsmanship is truly outstanding. Every detail is perfectly finished and the wood quality is superb. The prices are very competitive for the quality you receive, and the customer service team was incredibly helpful throughout the entire process.'],
          ['Michael Chen', 'Architect, Chicago', 5, 'As someone who appreciates good design, I\'m very impressed with Furnish\'s collection. Clean lines, quality materials, and excellent value for money. The pieces I ordered arrived well-packaged and in perfect condition. Will definitely be ordering again for my next project.'],
          ['Emily Rodriguez', 'Entrepreneur, Miami', 4, 'I refurnished my entire home office with items from Furnish and it looks incredible. The ergonomic chair is beyond comfortable — I can work long hours without any back pain. The desk is sturdy and looks exactly like the photos. Very happy with my purchase!'],
          ['David Park', 'Doctor, Seattle', 5, 'Exceptional quality and service. The sofa I ordered is absolutely stunning and incredibly comfortable. It was delivered on time and the assembly instructions were clear. This is the third time I\'ve ordered from Furnish and they never disappoint.'],
          ['Lisa Turner', 'Teacher, Boston', 4, 'Beautiful furniture at very reasonable prices. The dining table set I ordered is gorgeous and has become the centerpiece of our home. The wood has a lovely finish and the chairs are comfortable. Customer service was prompt and helpful when I had questions.'],
        ] as $i => $t)
        <div class="col-md-6 col-lg-4">
          <div class="testimonial-card h-100" style="position:relative;">
            <!-- Stars -->
            <div class="mb-3">
              @for($s = 0; $s < $t[2]; $s++)
                <i class="bi bi-star-fill text-accent" style="font-size:0.875rem;"></i>
              @endfor
              @for($s = $t[2]; $s < 5; $s++)
                <i class="bi bi-star" style="font-size:0.875rem;color:var(--furnish-border);"></i>
              @endfor
            </div>
            <div class="quote-icon mb-2" style="font-size:2.5rem;line-height:1;">&#8220;</div>
            <p style="font-size:0.9rem;line-height:1.8;color:var(--furnish-text);font-style:italic;flex-grow:1;">{{ $t[3] }}</p>
            <div class="d-flex align-items-center gap-3 mt-4 pt-3" style="border-top:1px solid var(--furnish-border);">
              <div style="width:46px;height:46px;min-width:46px;border-radius:50%;background:var(--furnish-accent);display:flex;align-items:center;justify-content:center;color:#fff;font-weight:700;">
                {{ strtoupper(substr($t[0], 0, 1)) }}
              </div>
              <div>
                <strong style="font-family:'Playfair Display',serif;font-size:0.95rem;color:var(--furnish-primary);">{{ $t[0] }}</strong>
                <p style="font-size:0.75rem;color:var(--furnish-muted);margin:0;">{{ $t[1] }}</p>
              </div>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </section>

  <!-- ===== CTA ===== -->
  <section class="py-5" style="background:var(--furnish-light);border-top:1px solid var(--furnish-border);">
    <div class="container text-center">
      <h2 class="mb-2">Ready to Transform Your Space?</h2>
      <p class="text-muted mb-4">Join thousands of happy customers who trust Furnish for their home needs.</p>
      <a href="{{ route('products.index') }}" class="btn-furnish-primary me-3">Shop Now</a>
      <a href="{{ route('contact') }}" class="btn-furnish-outline">Contact Us</a>
    </div>
  </section>

@endsection
