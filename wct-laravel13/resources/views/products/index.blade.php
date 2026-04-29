@extends('layouts.app')

@section('title', 'Products - Furnish Premium Furniture Store')

@section('content')

  <!-- ===== PAGE HERO ===== -->
  <section class="page-hero">
    <div class="container">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-2">
          <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
          <li class="breadcrumb-item active">Products</li>
        </ol>
      </nav>
      <div class="d-flex align-items-center justify-content-between flex-wrap gap-2">
        <h1>Our Products</h1>
        <a href="{{ route('products.create') }}" class="btn-furnish-accent d-inline-flex align-items-center gap-2">
          <i class="bi bi-plus-lg"></i> Add New Product
        </a>
      </div>
    </div>
  </section>

  <!-- ===== PRODUCTS MAIN ===== -->
  <section class="py-5">
    <div class="container">
      <div class="row g-4">

        <!-- ===== SIDEBAR ===== -->
        <div class="col-lg-3">
          <form method="GET" action="{{ route('products.index') }}" id="filterForm">

            <!-- Search -->
            <div class="sidebar-filter mb-3">
              <h6>Search Products</h6>
              <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Search..." value="{{ request('search') }}">
                <button class="btn-furnish-primary" type="submit" style="padding:0.6rem 1rem;">
                  <i class="bi bi-search"></i>
                </button>
              </div>
            </div>

            <!-- Categories -->
            <div class="sidebar-filter mb-3">
              <h6>Categories</h6>
              <div class="d-flex flex-column gap-2">
                <a href="{{ route('products.index') }}" class="text-decoration-none d-flex justify-content-between align-items-center py-1" style="color:{{ !request('category') ? 'var(--furnish-accent)' : 'var(--furnish-text)' }};font-size:0.875rem;border-bottom:1px solid var(--furnish-border);">
                  <span><i class="bi bi-grid me-2"></i>All Categories</span>
                </a>
                @foreach($categories as $cat)
                <a href="{{ route('products.index', array_merge(request()->query(), ['category' => $cat])) }}" 
                   class="text-decoration-none d-flex justify-content-between align-items-center py-1" 
                   style="color:{{ request('category') === $cat ? 'var(--furnish-accent)' : 'var(--furnish-text)' }};font-size:0.875rem;{{ !$loop->last ? 'border-bottom:1px solid var(--furnish-border);' : '' }}">
                  <span>{{ $cat }}</span>
                  @if(request('category') === $cat)
                    <i class="bi bi-check2 text-accent"></i>
                  @endif
                </a>
                @endforeach
              </div>
            </div>

            <!-- Price Range -->
            <div class="sidebar-filter mb-3">
              <h6>Price Range</h6>
              <div class="row g-2">
                <div class="col-6">
                  <input type="number" name="min_price" class="form-control form-control-sm" placeholder="Min $" value="{{ request('min_price') }}" min="0">
                </div>
                <div class="col-6">
                  <input type="number" name="max_price" class="form-control form-control-sm" placeholder="Max $" value="{{ request('max_price') }}" min="0">
                </div>
              </div>
              <button class="btn-furnish-primary w-100 mt-2" type="submit" style="padding:0.5rem;">Apply Filter</button>
            </div>

            @if(request()->hasAny(['category', 'search', 'min_price', 'max_price']))
            <a href="{{ route('products.index') }}" class="btn-furnish-outline w-100 text-center d-block" style="padding:0.5rem;font-size:0.8rem;">
              <i class="bi bi-x-circle me-1"></i>Clear All Filters
            </a>
            @endif

          </form>
        </div>

        <!-- ===== PRODUCT GRID ===== -->
        <div class="col-lg-9">

          <!-- Results Info -->
          <div class="d-flex justify-content-between align-items-center mb-4 pb-3" style="border-bottom:1px solid var(--furnish-border);">
            <p style="margin:0;color:var(--furnish-muted);font-size:0.875rem;">
              Showing {{ $products->firstItem() ?? 0 }}-{{ $products->lastItem() ?? 0 }} of {{ $products->total() }} products
              @if(request('category')) in <strong>{{ request('category') }}</strong> @endif
              @if(request('search')) for "<strong>{{ request('search') }}</strong>" @endif
            </p>
            <span style="font-size:0.8rem;color:var(--furnish-muted);">
              <i class="bi bi-sort-down me-1"></i>Latest First
            </span>
          </div>

          @if($products->count() > 0)
            <div class="row g-4">
              @foreach($products as $product)
              <div class="col-md-6 col-xl-4">
                <div class="product-card h-100">
                  <div class="card-img-wrapper">
                    @if($product->image)
                      <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top" alt="{{ $product->name }}">
                    @else
                      <img src="https://images.unsplash.com/photo-1555041469-a586c61ea9bc?w=600&q=80" class="card-img-top" alt="{{ $product->name }}">
                    @endif
                    <div class="card-overlay">
                      <div class="d-flex gap-2">
                        <a href="{{ route('products.edit', $product) }}" class="btn btn-sm btn-warning flex-grow-1" style="border-radius:0;font-size:0.8rem;font-weight:600;">
                          <i class="bi bi-pencil me-1"></i>Edit
                        </a>
                        <form method="POST" action="{{ route('products.destroy', $product) }}" onsubmit="return confirm('Delete this product?');" style="flex-grow:1;">
                          @csrf @method('DELETE')
                          <button type="submit" class="btn btn-sm btn-danger w-100" style="border-radius:0;font-size:0.8rem;font-weight:600;">
                            <i class="bi bi-trash me-1"></i>Delete
                          </button>
                        </form>
                      </div>
                    </div>
                  </div>
                  <div class="card-body d-flex flex-column">
                    <p class="product-category">{{ $product->category }}</p>
                    <h5 class="product-name flex-grow-1">{{ $product->name }}</h5>
                    @if($product->description)
                      <p style="font-size:0.8rem;color:var(--furnish-muted);line-height:1.6;margin-bottom:0.75rem;">{{ Str::limit($product->description, 70) }}</p>
                    @endif
                    <div class="d-flex justify-content-between align-items-center mt-auto pt-2" style="border-top:1px solid var(--furnish-border);">
                      <span class="product-price">${{ number_format($product->price, 2) }}</span>
                      <div class="d-flex gap-1">
                        <a href="{{ route('products.edit', $product) }}" class="btn btn-sm btn-outline-secondary" style="border-radius:0;padding:0.25rem 0.5rem;" title="Edit">
                          <i class="bi bi-pencil" style="font-size:0.8rem;"></i>
                        </a>
                        <form method="POST" action="{{ route('products.destroy', $product) }}" onsubmit="return confirm('Are you sure you want to delete this product?');">
                          @csrf @method('DELETE')
                          <button type="submit" class="btn btn-sm btn-outline-danger" style="border-radius:0;padding:0.25rem 0.5rem;" title="Delete">
                            <i class="bi bi-trash" style="font-size:0.8rem;"></i>
                          </button>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              @endforeach
            </div>

            <!-- Pagination -->
            @if($products->hasPages())
            <div class="d-flex justify-content-center mt-5">
              <nav aria-label="Product pagination">
                <ul class="pagination gap-1">
                  {{-- Previous --}}
                  @if($products->onFirstPage())
                    <li class="page-item disabled">
                      <span class="page-link" style="border-radius:0;border-color:var(--furnish-border);">
                        <i class="bi bi-chevron-left"></i>
                      </span>
                    </li>
                  @else
                    <li class="page-item">
                      <a class="page-link" href="{{ $products->previousPageUrl() }}" style="border-radius:0;border-color:var(--furnish-border);color:var(--furnish-primary);">
                        <i class="bi bi-chevron-left"></i>
                      </a>
                    </li>
                  @endif

                  {{-- Pages --}}
                  @foreach($products->links()->elements[0] as $page => $url)
                    @if($page == $products->currentPage())
                      <li class="page-item active">
                        <span class="page-link" style="border-radius:0;background:var(--furnish-primary);border-color:var(--furnish-primary);">{{ $page }}</span>
                      </li>
                    @else
                      <li class="page-item">
                        <a class="page-link" href="{{ $url }}" style="border-radius:0;border-color:var(--furnish-border);color:var(--furnish-primary);">{{ $page }}</a>
                      </li>
                    @endif
                  @endforeach

                  {{-- Next --}}
                  @if($products->hasMorePages())
                    <li class="page-item">
                      <a class="page-link" href="{{ $products->nextPageUrl() }}" style="border-radius:0;border-color:var(--furnish-border);color:var(--furnish-primary);">
                        <i class="bi bi-chevron-right"></i>
                      </a>
                    </li>
                  @else
                    <li class="page-item disabled">
                      <span class="page-link" style="border-radius:0;border-color:var(--furnish-border);">
                        <i class="bi bi-chevron-right"></i>
                      </span>
                    </li>
                  @endif
                </ul>
              </nav>
            </div>
            @endif

          @else
            <!-- Empty State -->
            <div class="text-center py-5">
              <i class="bi bi-box-seam" style="font-size:4rem;color:var(--furnish-border);"></i>
              <h4 class="mt-3 mb-2">No Products Found</h4>
              <p class="text-muted mb-4">
                @if(request()->hasAny(['category', 'search', 'min_price', 'max_price']))
                  No products match your current filters. Try adjusting your search criteria.
                @else
                  No products have been added yet. Be the first to add one!
                @endif
              </p>
              @if(request()->hasAny(['category', 'search', 'min_price', 'max_price']))
                <a href="{{ route('products.index') }}" class="btn-furnish-outline me-2">Clear Filters</a>
              @endif
              <a href="{{ route('products.create') }}" class="btn-furnish-primary">
                <i class="bi bi-plus-lg me-1"></i>Add First Product
              </a>
            </div>
          @endif

        </div>
      </div>
    </div>
  </section>

@endsection
