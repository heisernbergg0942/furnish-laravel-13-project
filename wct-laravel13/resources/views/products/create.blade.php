@extends('layouts.app')

@section('title', 'Add New Product - Furnish')

@section('content')

  <!-- ===== PAGE HERO ===== -->
  <section class="page-hero">
    <div class="container">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-2">
          <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
          <li class="breadcrumb-item"><a href="{{ route('products.index') }}">Products</a></li>
          <li class="breadcrumb-item active">Add New Product</li>
        </ol>
      </nav>
      <h1>Add New Product</h1>
    </div>
  </section>

  <!-- ===== FORM ===== -->
  <section class="py-5">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-8">
          <div style="border:1px solid var(--furnish-border);padding:2.5rem;">
            <h4 class="mb-4 pb-3" style="border-bottom:1px solid var(--furnish-border);">
              <i class="bi bi-box2-heart me-2 text-accent"></i>Product Details
            </h4>

            @if($errors->any())
              <div class="alert alert-danger mb-4">
                <ul class="mb-0 ps-3">
                  @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                  @endforeach
                </ul>
              </div>
            @endif

            <form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">
              @csrf

              <div class="row g-4">
                <!-- Name -->
                <div class="col-12">
                  <label for="name" class="form-label fw-semibold" style="font-size:0.85rem;text-transform:uppercase;letter-spacing:0.05rem;">Product Name <span class="text-danger">*</span></label>
                  <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror"
                    placeholder="e.g. Modern Comfort Sofa" value="{{ old('name') }}" required>
                  @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <!-- Category -->
                <div class="col-md-6">
                  <label for="category" class="form-label fw-semibold" style="font-size:0.85rem;text-transform:uppercase;letter-spacing:0.05rem;">Category <span class="text-danger">*</span></label>
                  <select id="category" name="category" class="form-select @error('category') is-invalid @enderror" required>
                    <option value="">-- Select Category --</option>
                    @foreach($categories as $cat)
                      <option value="{{ $cat }}" {{ old('category') == $cat ? 'selected' : '' }}>{{ $cat }}</option>
                    @endforeach
                  </select>
                  @error('category') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <!-- Price -->
                <div class="col-md-6">
                  <label for="price" class="form-label fw-semibold" style="font-size:0.85rem;text-transform:uppercase;letter-spacing:0.05rem;">Price (USD) <span class="text-danger">*</span></label>
                  <div class="input-group">
                    <span class="input-group-text" style="border-radius:0;background:var(--furnish-light);border-color:var(--furnish-border);">$</span>
                    <input type="number" id="price" name="price" class="form-control @error('price') is-invalid @enderror"
                      placeholder="0.00" step="0.01" min="0" value="{{ old('price') }}" required>
                    @error('price') <div class="invalid-feedback">{{ $message }}</div> @enderror
                  </div>
                </div>

                <!-- Description -->
                <div class="col-12">
                  <label for="description" class="form-label fw-semibold" style="font-size:0.85rem;text-transform:uppercase;letter-spacing:0.05rem;">Description</label>
                  <textarea id="description" name="description" class="form-control @error('description') is-invalid @enderror"
                    rows="4" placeholder="Describe the product, materials, dimensions, etc.">{{ old('description') }}</textarea>
                  @error('description') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <!-- Image -->
                <div class="col-12">
                  <label for="image" class="form-label fw-semibold" style="font-size:0.85rem;text-transform:uppercase;letter-spacing:0.05rem;">Product Image</label>
                  <div style="border:2px dashed var(--furnish-border);padding:2rem;text-align:center;position:relative;cursor:pointer;" id="imageDropzone"
                    onclick="document.getElementById('image').click();">
                    <i class="bi bi-cloud-upload" style="font-size:2rem;color:var(--furnish-muted);"></i>
                    <p style="margin:0.5rem 0 0;font-size:0.875rem;color:var(--furnish-muted);">Click to upload or drag & drop</p>
                    <p style="margin:0;font-size:0.75rem;color:#bbb;">JPG, PNG, WebP up to 2MB</p>
                    <input type="file" id="image" name="image" class="@error('image') is-invalid @enderror"
                      accept="image/*" style="display:none;" onchange="previewImage(this)">
                  </div>
                  <div id="imagePreview" class="mt-2 d-none">
                    <img src="" alt="Preview" style="max-height:200px;max-width:100%;object-fit:contain;border:1px solid var(--furnish-border);padding:0.5rem;">
                  </div>
                  @error('image') <div class="text-danger mt-1" style="font-size:0.875rem;">{{ $message }}</div> @enderror
                </div>
              </div>

              <!-- Actions -->
              <div class="d-flex gap-3 mt-5 pt-3" style="border-top:1px solid var(--furnish-border);">
                <button type="submit" class="btn-furnish-primary d-inline-flex align-items-center gap-2">
                  <i class="bi bi-check-lg"></i> Save Product
                </button>
                <a href="{{ route('products.index') }}" class="btn-furnish-outline d-inline-flex align-items-center gap-2">
                  <i class="bi bi-x-lg"></i> Cancel
                </a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>

@endsection

@push('scripts')
<script>
  function previewImage(input) {
    if (input.files && input.files[0]) {
      const reader = new FileReader();
      reader.onload = function(e) {
        const preview = document.getElementById('imagePreview');
        preview.classList.remove('d-none');
        preview.querySelector('img').src = e.target.result;
      };
      reader.readAsDataURL(input.files[0]);
    }
  }

  // Drag and drop
  const dropzone = document.getElementById('imageDropzone');
  dropzone.addEventListener('dragover', e => { e.preventDefault(); dropzone.style.borderColor = 'var(--furnish-accent)'; });
  dropzone.addEventListener('dragleave', () => { dropzone.style.borderColor = 'var(--furnish-border)'; });
  dropzone.addEventListener('drop', e => {
    e.preventDefault();
    dropzone.style.borderColor = 'var(--furnish-border)';
    const file = e.dataTransfer.files[0];
    if (file) {
      document.getElementById('image').files = e.dataTransfer.files;
      previewImage(document.getElementById('image'));
    }
  });
</script>
@endpush
