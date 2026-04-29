@extends('layouts.app')

@section('title', 'Home - Furnish Premium Furniture Store')

@push('styles')
<style>
  /* ===== HERO SLIDER ===== */
  .hero-swiper {
    height: 600px;
    position: relative;
  }

  .hero-slide {
    height: 600px;
    display: flex;
    align-items: center;
    position: relative;
    overflow: hidden;
  }

  .hero-slide::before {
    content: '';
    position: absolute;
    inset: 0;
    background: linear-gradient(to right, rgba(248,245,240,0.95) 40%, rgba(248,245,240,0.2) 100%);
    z-index: 1;
  }

  .hero-slide img {
    position: absolute;
    inset: 0;
    width: 100%;
    height: 100%;
    object-fit: cover;
  }

  .hero-content {
    position: relative;
    z-index: 2;
  }

  .hero-tag {
    display: inline-block;
    font-size: 0.75rem;
    text-transform: uppercase;
    letter-spacing: 0.3rem;
    color: var(--furnish-accent);
    font-weight: 600;
    margin-bottom: 1rem;
  }

  .hero-title {
    font-size: clamp(2.2rem, 5vw, 3.5rem);
    font-weight: 700;
    line-height: 1.2;
    color: var(--furnish-primary);
    margin-bottom: 1.25rem;
  }

  .hero-desc {
    font-size: 1rem;
    color: var(--furnish-text);
    margin-bottom: 2rem;
    max-width: 420px;
    line-height: 1.7;
  }

  .hero-swiper .swiper-pagination-bullet {
    background: var(--furnish-primary);
    opacity: 0.3;
    width: 8px;
    height: 8px;
  }

  .hero-swiper .swiper-pagination-bullet-active {
    background: var(--furnish-accent);
    opacity: 1;
    width: 30px;
    border-radius: 4px;
  }

  .hero-swiper .swiper-button-next,
  .hero-swiper .swiper-button-prev {
    color: var(--furnish-primary);
    background: rgba(255,255,255,0.8);
    width: 44px;
    height: 44px;
    border-radius: 0;
  }

  .hero-swiper .swiper-button-next::after,
  .hero-swiper .swiper-button-prev::after {
    font-size: 16px;
    font-weight: 900;
  }

  /* ===== COLLECTION SWIPER ===== */
  .collection-swiper .swiper-button-next,
  .collection-swiper .swiper-button-prev {
    color: var(--furnish-primary);
    background: #fff;
    width: 44px;
    height: 44px;
    border: 1px solid var(--furnish-border);
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
  }

  .collection-swiper .swiper-button-next::after,
  .collection-swiper .swiper-button-prev::after {
    font-size: 14px;
    font-weight: 900;
  }
</style>
@endpush

@section('content')

  <!-- ===== HERO SLIDER ===== -->
  <section>
    <div class="swiper hero-swiper" id="heroSwiper">
      <div class="swiper-wrapper">

        <!-- Slide 1 -->
        <div class="swiper-slide hero-slide">
          <img src="https://images.unsplash.com/photo-1555041469-a586c61ea9bc?w=1600&q=80" alt="Comfortable sofa">
          <div class="container hero-content">
            <div class="row">
              <div class="col-lg-6">
                <span class="hero-tag">New Collection 2025</span>
                <h1 class="hero-title">Comfortable &amp; Stylish Sofa for Your Home</h1>
                <p class="hero-desc">Experience the elegance of timeless craftsmanship. Designed for comfort, built to last.</p>
                <a href="{{ route('products.index') }}" class="btn-furnish-primary">View Details</a>
              </div>
            </div>
          </div>
        </div>

        <!-- Slide 2 -->
        <div class="swiper-slide hero-slide">
          <img src="https://images.unsplash.com/photo-1616486338812-3dadae4b4ace?w=1600&q=80" alt="Home office furniture">
          <div class="container hero-content">
            <div class="row">
              <div class="col-lg-6">
                <span class="hero-tag">Special Offer</span>
                <h1 class="hero-title">Save up to $50 for Your Home Office</h1>
                <p class="hero-desc">Create your perfect workspace with our premium ergonomic furniture collection.</p>
                <a href="{{ route('products.index', ['category' => 'Office']) }}" class="btn-furnish-primary">Shop Now</a>
              </div>
            </div>
          </div>
        </div>

        <!-- Slide 3 -->
        <div class="swiper-slide hero-slide">
          <img src="https://images.unsplash.com/photo-1586023492125-27b2c045efd7?w=1600&q=80" alt="Royal comfort sofa">
          <div class="container hero-content">
            <div class="row">
              <div class="col-lg-6">
                <span class="hero-tag">Bestseller</span>
                <h1 class="hero-title">Crafted Royal Comfort Sofa</h1>
                <p class="hero-desc">Experience the elegance of timeless craftsmanship with our luxurious sofa collection.</p>
                <a href="{{ route('products.index', ['category' => 'Living Room']) }}" class="btn-furnish-primary">Explore Now</a>
              </div>
            </div>
          </div>
        </div>

      </div>
      <div class="swiper-pagination" style="bottom:2rem;"></div>
      <div class="swiper-button-prev ms-3"></div>
      <div class="swiper-button-next me-3"></div>
    </div>
  </section>

  <!-- ===== CATEGORY HIGHLIGHTS ===== -->
  <section class="py-5" style="background:var(--furnish-light);">
    <div class="container">
      <div class="row g-3">
        @foreach([
          ['Living Room', 'https://images.unsplash.com/photo-1567538096630-e0c55bd6374c?w=600&q=80'],
          ['Bedroom', 'https://images.unsplash.com/photo-1522771739844-6a9f6d5f14af?w=600&q=80'],
          ['Kitchen', 'https://images.unsplash.com/photo-1556909114-f6e7ad7d3136?w=600&q=80'],
          ['Office', 'https://images.unsplash.com/photo-1593642632559-0c6d3fc62b89?w=600&q=80'],
        ] as $cat)
        <div class="col-md-3 col-6">
          <a href="{{ route('products.index', ['category' => $cat[0]]) }}" class="text-decoration-none">
            <div style="position:relative;overflow:hidden;height:220px;cursor:pointer;">
              <img src="{{ $cat[1] }}" alt="{{ $cat[0] }}" style="width:100%;height:100%;object-fit:cover;transition:transform 0.4s;">
              <div style="position:absolute;inset:0;background:rgba(26,26,26,0.4);display:flex;align-items:flex-end;padding:1.25rem;">
                <div>
                  <p style="color:#fff;font-size:0.7rem;text-transform:uppercase;letter-spacing:0.2rem;margin:0;opacity:0.8;">Category</p>
                  <h5 style="color:#fff;margin:0;font-family:'Playfair Display',serif;">{{ $cat[0] }}</h5>
                </div>
              </div>
            </div>
          </a>
        </div>
        @endforeach
      </div>
    </div>
  </section>

  <!-- ===== FAVOURITE COLLECTION ===== -->
  <section class="py-5 py-lg-6" style="padding-top:5rem!important;padding-bottom:5rem!important;">
    <div class="container">
      <div class="section-header">
        <p class="subtitle">Hand Picked</p>
        <h2>Our Favourite Collection</h2>
        <div class="divider"></div>
        <p class="mt-2">We are inspired by the realities of life today, in which traditional divides between personal and professional space are more fluid.</p>
      </div>

      @if($featuredProducts->count() > 0)
        <!-- Dynamic Products from DB -->
        <div class="swiper collection-swiper" style="padding:0 2.5rem;">
          <div class="swiper-wrapper">
            @foreach($featuredProducts as $product)
            <div class="swiper-slide">
              <div class="product-card">
                <div class="card-img-wrapper">
                  @if($product->image)
                    <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top" alt="{{ $product->name }}">
                  @else
                    <img src="https://images.unsplash.com/photo-1555041469-a586c61ea9bc?w=600&q=80" class="card-img-top" alt="{{ $product->name }}">
                  @endif
                  <div class="card-overlay">
                    <a href="{{ route('products.index') }}" class="btn-furnish-accent w-100 text-center d-block" style="padding:0.5rem;">View Product</a>
                  </div>
                </div>
                <div class="card-body">
                  <p class="product-category">{{ $product->category }}</p>
                  <h5 class="product-name">{{ $product->name }}</h5>
                  <p class="product-price">${{ number_format($product->price, 2) }}</p>
                </div>
              </div>
            </div>
            @endforeach
          </div>
          <div class="swiper-button-prev"></div>
          <div class="swiper-button-next"></div>
        </div>
      @else
        <!-- Static Fallback Products -->
        <div class="swiper collection-swiper" style="padding:0 2.5rem;">
          <div class="swiper-wrapper">
            @foreach([
              ['Modern Chair', 'Living Room', '299.00', 'https://images.unsplash.com/photo-1567538096630-e0c55bd6374c?w=600&q=80'],
              ['Floor Lamp', 'Bedroom', '149.00', 'https://images.unsplash.com/photo-1507473885765-e6ed057f782c?w=600&q=80'],
              ['Boss Chair', 'Office', '499.00', 'https://images.unsplash.com/photo-1593642632559-0c6d3fc62b89?w=600&q=80'],
              ['Fancy Clock', 'Living Room', '89.00', 'https://images.unsplash.com/photo-1563861826100-9cb868fdbe1c?w=600&q=80'],
              ['Comfort Sofa', 'Living Room', '899.00', 'https://images.unsplash.com/photo-1555041469-a586c61ea9bc?w=600&q=80'],
            ] as $p)
            <div class="swiper-slide">
              <div class="product-card">
                <div class="card-img-wrapper">
                  <img src="{{ $p[3] }}" class="card-img-top" alt="{{ $p[0] }}">
                  <div class="card-overlay">
                    <a href="{{ route('products.index') }}" class="btn-furnish-accent w-100 text-center d-block" style="padding:0.5rem;">View Product</a>
                  </div>
                </div>
                <div class="card-body">
                  <p class="product-category">{{ $p[1] }}</p>
                  <h5 class="product-name">{{ $p[0] }}</h5>
                  <p class="product-price">${{ $p[2] }}</p>
                </div>
              </div>
            </div>
            @endforeach
          </div>
          <div class="swiper-button-prev"></div>
          <div class="swiper-button-next"></div>
        </div>
      @endif

      <div class="text-center mt-5">
        <a href="{{ route('products.index') }}" class="btn-furnish-outline">View All Products</a>
      </div>
    </div>
  </section>

  <!-- ===== WHY CHOOSE US ===== -->
  <section class="py-5" style="background:var(--furnish-primary);">
    <div class="container">
      <div class="row g-4 text-center text-white">
        @foreach([
          ['bi-truck', 'Free Shipping', 'On all orders over $199'],
          ['bi-shield-check', 'Quality Guarantee', '2 year warranty on all furniture'],
          ['bi-arrow-counterclockwise', 'Easy Returns', '30-day hassle-free returns'],
          ['bi-headset', '24/7 Support', 'Dedicated customer service'],
        ] as $feat)
        <div class="col-md-3 col-6">
          <i class="bi {{ $feat[0] }} mb-3" style="font-size:2rem;color:var(--furnish-accent);"></i>
          <h6 style="font-family:'Inter',sans-serif;font-weight:700;color:#fff;">{{ $feat[1] }}</h6>
          <p style="font-size:0.8rem;color:#aaa;margin:0;">{{ $feat[2] }}</p>
        </div>
        @endforeach
      </div>
    </div>
  </section>

  <!-- ===== TESTIMONIALS ===== -->
  <section class="py-5 py-lg-6" style="padding-top:5rem!important;padding-bottom:5rem!important;">
    <div class="container">
      <div class="section-header">
        <p class="subtitle">Customer Stories</p>
        <h2>What Our Customers Say</h2>
        <div class="divider"></div>
      </div>
      <div class="row justify-content-center">
        <div class="col-lg-8">
          <div class="swiper testimonial-swiper">
            <div class="swiper-wrapper">
              @foreach([
                ['John Doe', 'Interior Designer', 'The quality of furniture from Furnish is exceptional. My living room has been completely transformed and I couldn\'t be happier. The team was professional and delivery was on time.'],
                ['Sarah Williams', 'Homemaker', 'I ordered a complete bedroom set and the craftsmanship is outstanding. The prices are very competitive and the customer service team was incredibly helpful throughout the process.'],
                ['Michael Chen', 'Architect', 'As someone who appreciates good design, I\'m very impressed with Furnish\'s collection. Clean lines, quality materials, and excellent value. Will definitely be ordering again.'],
              ] as $t)
              <div class="swiper-slide">
                <div class="testimonial-card text-center">
                  <div class="quote-icon mb-3">"</div>
                  <p class="mb-4" style="font-size:1rem;line-height:1.8;color:var(--furnish-text);font-style:italic;">{{ $t[2] }}</p>
                  <div class="d-flex align-items-center justify-content-center gap-3">
                    <div style="width:50px;height:50px;border-radius:50%;background:var(--furnish-accent);display:flex;align-items:center;justify-content:center;color:#fff;font-weight:700;font-size:1.2rem;">
                      {{ strtoupper(substr($t[0], 0, 1)) }}
                    </div>
                    <div class="text-start">
                      <strong style="font-family:'Playfair Display',serif;color:var(--furnish-primary);">{{ $t[0] }}</strong>
                      <p style="font-size:0.8rem;color:var(--furnish-muted);margin:0;">{{ $t[1] }}</p>
                    </div>
                  </div>
                  <div class="text-accent mt-3">
                    <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                  </div>
                </div>
              </div>
              @endforeach
            </div>
            <div class="swiper-pagination mt-4" style="position:relative;bottom:0;margin-top:2rem;"></div>
          </div>
        </div>
      </div>
    </div>
  </section>

@endsection

@push('scripts')
<script>
  // Hero Swiper
  new Swiper('#heroSwiper', {
    loop: true,
    autoplay: { delay: 5000, disableOnInteraction: false },
    pagination: { el: '.hero-swiper .swiper-pagination', clickable: true },
    navigation: {
      nextEl: '.hero-swiper .swiper-button-next',
      prevEl: '.hero-swiper .swiper-button-prev',
    },
    effect: 'fade',
    fadeEffect: { crossFade: true },
  });

  // Collection Swiper
  new Swiper('.collection-swiper', {
    slidesPerView: 1,
    spaceBetween: 24,
    navigation: {
      nextEl: '.collection-swiper .swiper-button-next',
      prevEl: '.collection-swiper .swiper-button-prev',
    },
    breakpoints: {
      576: { slidesPerView: 2 },
      768: { slidesPerView: 3 },
      992: { slidesPerView: 4 },
    },
  });

  // Testimonial Swiper
  new Swiper('.testimonial-swiper', {
    loop: true,
    autoplay: { delay: 4000 },
    pagination: { el: '.testimonial-swiper .swiper-pagination', clickable: true },
  });
</script>
@endpush
