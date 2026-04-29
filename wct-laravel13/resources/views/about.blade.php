@extends('layouts.app')

@section('title', 'About Us - Furnish Premium Furniture Store')

@section('content')

  <!-- ===== PAGE HERO ===== -->
  <section class="page-hero">
    <div class="container">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-2">
          <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
          <li class="breadcrumb-item active">About Us</li>
        </ol>
      </nav>
      <h1>About Our Store</h1>
    </div>
  </section>

  <!-- ===== OUR STORY ===== -->
  <section class="py-5 py-lg-6" style="padding-top:5rem!important;padding-bottom:5rem!important;">
    <div class="container">
      <div class="row align-items-center g-5">
        <div class="col-lg-6">
          <div style="position:relative;">
            <img src="https://images.unsplash.com/photo-1555041469-a586c61ea9bc?w=800&q=80" alt="About Furnish" style="width:100%;height:480px;object-fit:cover;">
            <div style="position:absolute;bottom:-30px;right:-30px;background:var(--furnish-accent);padding:2rem;color:#fff;width:200px;display:none;" class="d-md-block">
              <p style="font-size:2.5rem;font-weight:700;margin:0;font-family:'Playfair Display',serif;line-height:1;">15+</p>
              <p style="font-size:0.85rem;margin:0;opacity:0.9;">Years of Experience</p>
            </div>
          </div>
        </div>
        <div class="col-lg-6">
          <p class="subtitle" style="font-size:0.8rem;text-transform:uppercase;letter-spacing:0.3rem;color:var(--furnish-accent);font-weight:600;">Our Story</p>
          <h2 class="mb-4">Crafting Spaces, Creating Memories</h2>
          <div style="width:50px;height:2px;background:var(--furnish-accent);margin-bottom:1.5rem;"></div>
          <p class="text-muted mb-3" style="line-height:1.9;">
            Founded in 2010, Furnish has been at the forefront of modern interior design, bringing premium quality furniture to homes and offices around the world. We believe that great furniture is not just about aesthetics — it's about creating an environment where life unfolds beautifully.
          </p>
          <p class="text-muted mb-4" style="line-height:1.9;">
            Every piece in our collection is carefully curated by our expert design team, ensuring that quality, comfort, and style go hand in hand. From the finest materials to meticulous craftsmanship, we believe in furniture that stands the test of time.
          </p>
          <div class="row g-3 mb-4">
            <div class="col-6">
              <div style="border-left:3px solid var(--furnish-accent);padding-left:1rem;">
                <h4 style="font-family:'Playfair Display',serif;margin:0;">5000+</h4>
                <p style="font-size:0.85rem;color:var(--furnish-muted);margin:0;">Happy Customers</p>
              </div>
            </div>
            <div class="col-6">
              <div style="border-left:3px solid var(--furnish-accent);padding-left:1rem;">
                <h4 style="font-family:'Playfair Display',serif;margin:0;">200+</h4>
                <p style="font-size:0.85rem;color:var(--furnish-muted);margin:0;">Products Available</p>
              </div>
            </div>
          </div>
          <a href="{{ route('products.index') }}" class="btn-furnish-primary">Explore Our Products</a>
        </div>
      </div>
    </div>
  </section>

  <!-- ===== OUR MISSION ===== -->
  <section class="py-5" style="background:var(--furnish-light);">
    <div class="container">
      <div class="section-header">
        <p class="subtitle">What Drives Us</p>
        <h2>Our Mission</h2>
        <div class="divider"></div>
        <p class="mt-2">We are committed to making quality furniture accessible while preserving the planet for future generations.</p>
      </div>
      <div class="row g-4">
        <div class="col-lg-6">
          <div style="height:100%;">
            <img src="https://images.unsplash.com/photo-1616486338812-3dadae4b4ace?w=800&q=80" alt="Our mission" style="width:100%;height:380px;object-fit:cover;">
          </div>
        </div>
        <div class="col-lg-6">
          <div class="d-flex flex-column gap-4 h-100 justify-content-center">
            @foreach([
              ['bi-leaf', 'Sustainability', 'We source materials responsibly, prioritizing eco-friendly suppliers and sustainable manufacturing processes that minimize our environmental impact.'],
              ['bi-gem', 'Quality First', 'Every piece undergoes rigorous quality testing before reaching our showroom. We never compromise on the standards that define our brand.'],
              ['bi-palette', 'Design Excellence', 'Our design philosophy blends timeless aesthetics with modern functionality, creating furniture that is both beautiful and practical.'],
            ] as $item)
            <div class="d-flex gap-4">
              <div style="width:56px;height:56px;min-width:56px;background:var(--furnish-accent);display:flex;align-items:center;justify-content:center;">
                <i class="bi {{ $item[0] }}" style="font-size:1.4rem;color:#fff;"></i>
              </div>
              <div>
                <h5 class="mb-1">{{ $item[1] }}</h5>
                <p style="font-size:0.9rem;color:var(--furnish-muted);margin:0;line-height:1.7;">{{ $item[2] }}</p>
              </div>
            </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ===== CORE VALUES ===== -->
  <section class="py-5 py-lg-6" style="padding-top:5rem!important;padding-bottom:5rem!important;">
    <div class="container">
      <div class="section-header">
        <p class="subtitle">Our Values</p>
        <h2>Core Values</h2>
        <div class="divider"></div>
      </div>
      <div class="row g-4">
        @foreach([
          ['bi-heart', 'Customer First', 'We put our customers at the heart of everything we do, ensuring every interaction exceeds expectations.'],
          ['bi-tools', 'Craftsmanship', 'Each piece is crafted with precision and attention to detail by skilled artisans with decades of experience.'],
          ['bi-globe', 'Global Vision', 'We bring the best furniture designs from around the world to make your home a global showcase.'],
          ['bi-lightbulb', 'Innovation', 'Continuously pushing design boundaries, we blend tradition with modern technologies for better living.'],
        ] as $v)
        <div class="col-md-6 col-lg-3">
          <div class="text-center p-4" style="border:1px solid var(--furnish-border);transition:all 0.3s;" onmouseover="this.style.borderColor='var(--furnish-accent)';this.style.boxShadow='0 10px 30px rgba(0,0,0,0.08)'" onmouseout="this.style.borderColor='var(--furnish-border)';this.style.boxShadow='none'">
            <div style="width:70px;height:70px;background:var(--furnish-light);border-radius:50%;display:flex;align-items:center;justify-content:center;margin:0 auto 1.25rem;">
              <i class="bi {{ $v[0] }}" style="font-size:1.75rem;color:var(--furnish-accent);"></i>
            </div>
            <h5 class="mb-2">{{ $v[1] }}</h5>
            <p style="font-size:0.875rem;color:var(--furnish-muted);line-height:1.7;margin:0;">{{ $v[2] }}</p>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </section>

  <!-- ===== TEAM ===== -->
  <section class="py-5" style="background:var(--furnish-light);">
    <div class="container">
      <div class="section-header">
        <p class="subtitle">The People</p>
        <h2>Meet Our Team</h2>
        <div class="divider"></div>
      </div>
      <div class="row g-4 justify-content-center">
        @foreach([
          ['Emma Thompson', 'Creative Director', 'https://images.unsplash.com/photo-1494790108377-be9c29b29330?w=400&q=80'],
          ['James Wilson', 'Head of Design', 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=400&q=80'],
          ['Sofia Martinez', 'Product Curator', 'https://images.unsplash.com/photo-1438761681033-6461ffad8d80?w=400&q=80'],
          ['David Lee', 'Customer Experience', 'https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?w=400&q=80'],
        ] as $member)
        <div class="col-md-6 col-lg-3">
          <div class="text-center">
            <div style="overflow:hidden;height:280px;margin-bottom:1rem;">
              <img src="{{ $member[2] }}" alt="{{ $member[0] }}" style="width:100%;height:100%;object-fit:cover;transition:transform 0.4s;" onmouseover="this.style.transform='scale(1.07)'" onmouseout="this.style.transform='scale(1)'">
            </div>
            <h5 class="mb-0" style="font-family:'Playfair Display',serif;">{{ $member[0] }}</h5>
            <p style="font-size:0.8rem;text-transform:uppercase;letter-spacing:0.1rem;color:var(--furnish-accent);font-weight:600;">{{ $member[1] }}</p>
            <div class="d-flex justify-content-center gap-2">
              <a href="#" style="color:var(--furnish-muted);font-size:0.95rem;"><i class="bi bi-linkedin"></i></a>
              <a href="#" style="color:var(--furnish-muted);font-size:0.95rem;"><i class="bi bi-instagram"></i></a>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </section>

@endsection
