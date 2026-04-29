@extends('layouts.app')

@section('title', 'Edit Product - Furnish')

@section('content')

  <!-- ===== PAGE HERO ===== -->
  <section class="page-hero">
    <div class="container">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-2">
          <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
          <li class="breadcrumb-item"><a href="{{ route('products.index') }}">Products</a></li>
          <li class="breadcrumb-item active">Edit Product</li>
        </ol>
      </nav>
      <h1>Edit Product</h1>
    </div>
  </section>

  <!-- ===== FORM ===== -->
  <section class="py-5">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-8">
          <div style="border:1px solid var(--furnish-border);padding:2.5rem;">

            <!-- Header with ID and Delete -->
            <div class="d-flex justify-content-between align-items-start mb-4 pb-3" style="border-bottom:1px solid var(--furnish-border);">
              <div>
                <h4 class="mb-0">
                  <i class="bi bi-pencil-square me-2 text-accent"></i>Edit Product
                </h4>
                <small class="text-muted">ID: #{{ $product->id }} &bull; Last updated: {{ $product->updated_at->format('M d, Y') }}</small>
              </div>
              <form method="POST" action="{{ route('products.destroy', $product) }}"
                onsubmit="return confirm('Are you sure you want to delete this product? This action cannot be undone.');">
                @csrf @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm" style="border-radius:0;">
                  <i class="bi bi-trash me-1"></i>Delete
                </button>
              </form>
            </div>

            @if($errors->any())
              <div class="alert alert-danger mb-4">
                <ul class="mb-0 ps-3">
                  @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                  @endforeach
                </ul>
              </div>
            @endif

            <form method="POST" action="{{ route('products.update', $product) }}" enctype="multipart/form-data">
              @csrf @method('PUT')

              <div class="row g-4">
                <!-- Name -->
                <div class="col-12">
                  <label for="name" class="form-label fw-semibold" style="font-size:0.85rem;text-transform:uppercase;letter-spacing:0.05rem;">Product Name <span class="text-danger">*</span></label>
                  <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror"
                    value="{{ old('name', $product->name) }}" required>
                  @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <!-- Category -->
                <div class="col-md-6">
                  <label for="category" class="form-label fw-semibold" style="font-size:0.85rem;text-transform:uppercase;letter-spacing:0.05rem;">Category <span class="text-danger">*</span></label>
                  <select id="category" name="category" class="form-select @error('category') is-invalid @enderror" required>
                    <option value="">-- Select Category --</option>
                    @foreach($categories as $cat)
                      <option value="{{ $cat }}" {{ old('category', $product->category) == $cat ? 'selected' : '' }}>{{ $cat }}</option>
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
                      step="0.01" min="0" value="{{ old('price', $product->price) }}" required>
                    @error('price') <div class="invalid-feedback">{{ $message }}</div> @enderror
                  </div>
                </div>

                <!-- Description -->
                <div class="col-12">
                  <label for="description" class="form-label fw-semibold" style="font-size:0.85rem;text-transform:uppercase;letter-spacing:0.05rem;">Description</label>
                  <textarea id="description" name="description" class="form-control @error('description') is-invalid @enderror"
                    rows="4">{{ old('description', $product->description) }}</textarea>
                  @error('description') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <!-- Current Image -->
                <div class="col-12">
                  <label class="form-label fw-semibold" style="font-size:0.85rem;text-transform:uppercase;letter-spacing:0.05rem;">Product Image</label>

                  @if($product->image)
                  <div class="mb-3 p-3" style="background:var(--furnish-light);border:1px solid var(--furnish-border);">
                    <p style="font-size:0.8rem;color:var(--furnish-muted);margin-bottom:0.5rem;">Current image:</p>
                    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}"
                      style="max-height:180px;max-width:100%;object-fit:contain;">
                  </div>
                  @endif

                  <div style="border:2px dashed var(--furnish-border);padding:1.5rem;text-align:center;cursor:pointer;" id="imageDropzone"
                    onclick="document.getElementById('image').click();">
                    <i class="bi bi-cloud-upload" style="font-size:1.75rem;color:var(--furnish-muted);"></i>
                    <p style="margin:0.5rem 0 0;font-size:0.875rem;color:var(--furnish-muted);">
                      {{ $product->image ? 'Click to replace image' : 'Click to upload image' }}
                    </p>
                    <p style="margin:0;font-size:0.75rem;color:#bbb;">JPG, PNG, WebP up to 2MB</p>
                    <input type="file" id="image" name="image" class="@error('image') is-invalid @enderror"
                      accept="image/*" style="display:none;" onchange="previewImage(this)">
                  </div>
                  <div id="imagePreview" class="mt-2 d-none">
                    <img src="" alt="New image preview" style="max-height:200px;max-width:100%;object-fit:contain;border:1px solid var(--furnish-border);padding:0.5rem;">
                  </div>
                  @error('image') <div class="text-danger mt-1" style="font-size:0.875rem;">{{ $message }}</div> @enderror
                </div>
              </div>

              <!-- Actions -->
              <div class="d-flex gap-3 mt-5 pt-3" style="border-top:1px solid var(--furnish-border);">
                <button type="submit" class="btn-furnish-primary d-inline-flex align-items-center gap-2">
                  <i class="bi bi-check-lg"></i> Update Product
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
</script>
@endpush
