@extends('layouts.app')

@section('title', 'Contact Us - Furnish Premium Furniture Store')

@section('content')

  <!-- ===== PAGE HERO ===== -->
  <section class="page-hero">
    <div class="container">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-2">
          <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
          <li class="breadcrumb-item active">Contact</li>
        </ol>
      </nav>
      <h1>Contact Us</h1>
    </div>
  </section>

  <!-- ===== CONTACT MAIN ===== -->
  <section class="py-5 py-lg-6" style="padding-top:5rem!important;padding-bottom:5rem!important;">
    <div class="container">
      <div class="row g-5">

        <!-- Contact Info -->
        <div class="col-lg-4">
          <p class="subtitle" style="font-size:0.8rem;text-transform:uppercase;letter-spacing:0.3rem;color:var(--furnish-accent);font-weight:600;">Get In Touch</p>
          <h2 class="mb-4">We'd Love to Hear From You</h2>
          <div style="width:50px;height:2px;background:var(--furnish-accent);margin-bottom:2rem;"></div>
          <p class="text-muted mb-4" style="line-height:1.8;">
            Whether you have a question about our products, want to discuss a custom order, or just want to say hello — we're here for you.
          </p>

          <div class="d-flex flex-column gap-4">
            @foreach([
              ['bi-geo-alt', 'Our Location', '123 Furniture Street, Design District', 'New York, NY 10001'],
              ['bi-telephone', 'Phone Number', '+90 123 456 789', 'Mon - Sat, 9am - 6pm'],
              ['bi-envelope', 'Email Address', 'hello@furnish.com', 'We reply within 24 hours'],
              ['bi-clock', 'Working Hours', 'Monday - Saturday', '9:00 AM – 6:00 PM EST'],
            ] as $info)
            <div class="d-flex gap-4">
              <div style="width:50px;height:50px;min-width:50px;background:var(--furnish-light);border:1px solid var(--furnish-border);display:flex;align-items:center;justify-content:center;">
                <i class="bi {{ $info[0] }}" style="font-size:1.25rem;color:var(--furnish-accent);"></i>
              </div>
              <div>
                <strong style="font-size:0.85rem;text-transform:uppercase;letter-spacing:0.05rem;color:var(--furnish-primary);">{{ $info[1] }}</strong>
                <p style="font-size:0.9rem;margin:0.1rem 0 0;color:var(--furnish-text);">{{ $info[2] }}</p>
                <p style="font-size:0.8rem;margin:0;color:var(--furnish-muted);">{{ $info[3] }}</p>
              </div>
            </div>
            @endforeach
          </div>

          <!-- Social Media -->
          <div class="mt-4 pt-4" style="border-top:1px solid var(--furnish-border);">
            <p style="font-size:0.8rem;text-transform:uppercase;letter-spacing:0.1rem;font-weight:600;margin-bottom:1rem;">Follow Us</p>
            <div class="d-flex gap-2">
              @foreach([['bi-facebook','#'],['bi-instagram','#'],['bi-twitter-x','#'],['bi-pinterest','#']] as $s)
              <a href="{{ $s[1] }}" style="width:40px;height:40px;background:var(--furnish-light);border:1px solid var(--furnish-border);display:flex;align-items:center;justify-content:center;color:var(--furnish-text);text-decoration:none;transition:all 0.2s;" onmouseover="this.style.background='var(--furnish-accent)';this.style.borderColor='var(--furnish-accent)';this.style.color='#fff';" onmouseout="this.style.background='var(--furnish-light)';this.style.borderColor='var(--furnish-border)';this.style.color='var(--furnish-text)';">
                <i class="bi {{ $s[0] }}"></i>
              </a>
              @endforeach
            </div>
          </div>
        </div>

        <!-- Contact Form -->
        <div class="col-lg-8">
          <div style="border:1px solid var(--furnish-border);padding:2.5rem;">
            <h4 class="mb-4 pb-3" style="border-bottom:1px solid var(--furnish-border);">
              <i class="bi bi-chat-dots me-2 text-accent"></i>Send a Message
            </h4>

            @if(session('contact_success'))
              <div class="alert alert-success mb-4">
                <i class="bi bi-check-circle me-2"></i>{{ session('contact_success') }}
              </div>
            @endif

            <form action="#" method="POST" onsubmit="return false;">
              @csrf
              <div class="row g-4">
                <div class="col-md-6">
                  <label for="first_name" class="form-label fw-semibold" style="font-size:0.85rem;text-transform:uppercase;letter-spacing:0.05rem;">First Name <span class="text-danger">*</span></label>
                  <input type="text" id="first_name" name="first_name" class="form-control" placeholder="John" required>
                </div>
                <div class="col-md-6">
                  <label for="last_name" class="form-label fw-semibold" style="font-size:0.85rem;text-transform:uppercase;letter-spacing:0.05rem;">Last Name <span class="text-danger">*</span></label>
                  <input type="text" id="last_name" name="last_name" class="form-control" placeholder="Doe" required>
                </div>
                <div class="col-md-6">
                  <label for="email" class="form-label fw-semibold" style="font-size:0.85rem;text-transform:uppercase;letter-spacing:0.05rem;">Email Address <span class="text-danger">*</span></label>
                  <input type="email" id="email" name="email" class="form-control" placeholder="john@example.com" required>
                </div>
                <div class="col-md-6">
                  <label for="phone" class="form-label fw-semibold" style="font-size:0.85rem;text-transform:uppercase;letter-spacing:0.05rem;">Phone Number</label>
                  <input type="tel" id="phone" name="phone" class="form-control" placeholder="+1 234 567 890">
                </div>
                <div class="col-12">
                  <label for="subject" class="form-label fw-semibold" style="font-size:0.85rem;text-transform:uppercase;letter-spacing:0.05rem;">Subject <span class="text-danger">*</span></label>
                  <select id="subject" name="subject" class="form-select" required>
                    <option value="">-- Select a subject --</option>
                    <option>Product Inquiry</option>
                    <option>Custom Order</option>
                    <option>Delivery & Shipping</option>
                    <option>Returns & Refunds</option>
                    <option>General Question</option>
                    <option>Other</option>
                  </select>
                </div>
                <div class="col-12">
                  <label for="message" class="form-label fw-semibold" style="font-size:0.85rem;text-transform:uppercase;letter-spacing:0.05rem;">Message <span class="text-danger">*</span></label>
                  <textarea id="message" name="message" class="form-control" rows="5"
                    placeholder="Tell us how we can help you..." required></textarea>
                </div>
                <div class="col-12">
                  <button type="submit" class="btn-furnish-primary d-inline-flex align-items-center gap-2" onclick="this.innerHTML='<i class=\'bi bi-check-lg\'></i> Message Sent!';this.disabled=true;">
                    <i class="bi bi-send"></i> Send Message
                  </button>
                </div>
              </div>
            </form>
          </div>
        </div>

      </div>
    </div>
  </section>

  <!-- ===== MAP PLACEHOLDER ===== -->
  <section>
    <div style="background:var(--furnish-light);height:350px;display:flex;align-items:center;justify-content:center;border-top:1px solid var(--furnish-border);">
      <div class="text-center">
        <i class="bi bi-geo-alt" style="font-size:3rem;color:var(--furnish-accent);"></i>
        <h5 class="mt-2" style="font-family:'Inter',sans-serif;">123 Furniture Street, Design District, New York, NY 10001</h5>
        <a href="https://maps.google.com" target="_blank" class="btn-furnish-outline mt-3 d-inline-block">
          <i class="bi bi-map me-1"></i>View on Google Maps
        </a>
      </div>
    </div>
  </section>

@endsection
