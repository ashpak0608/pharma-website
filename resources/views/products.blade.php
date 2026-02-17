@extends('layouts.app')

@section('title', 'Products - Corran Pharma')

@section('content')
    <!-- Page Header -->
    <section class="bg-primary text-white py-5">
        <div class="container text-center">
            <h1 class="display-4 fw-bold">Our Products</h1>
            <p class="lead">High-quality pharmaceutical products for better healthcare</p>
        </div>
    </section>

    <!-- Products Section -->
    <section class="py-5">
        <div class="container">
            @forelse($categories as $category)
                @if($category->products->count() > 0)
                <div class="mb-5">
                    <h2 class="mb-4">{{ $category->name }}</h2>
                    <div class="row">
                        @foreach($category->products as $product)
                        <div class="col-md-4 mb-4">
                            <div class="card h-100">
                                @if($product->image)
                                    <img src="{{ asset($product->image) }}" class="card-img-top product-img" alt="{{ $product->name }}">
                                @else
                                    <img src="https://via.placeholder.com/300x200" class="card-img-top product-img" alt="{{ $product->name }}">
                                @endif
                                <div class="card-body">
                                    <h5 class="card-title">{{ $product->name }}</h5>
                                    @if($product->composition)
                                        <p class="text-muted small">Composition: {{ $product->composition }}</p>
                                    @endif
                                    <p class="card-text">{{ Str::limit($product->description, 100) }}</p>
                                    <a href="{{ route('product.detail', $product->slug) }}" class="btn btn-primary">View Details</a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif
            @empty
                <div class="text-center py-5">
                    <h3>No products available</h3>
                </div>
            @endforelse
        </div>
    </section>
@endsection