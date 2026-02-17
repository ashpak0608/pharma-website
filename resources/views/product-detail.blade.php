@extends('layouts.app')

@section('title', $product->name . ' - Corran Pharma')

@section('content')
    <!-- Page Header -->
    <section class="bg-primary text-white py-4">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-white">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('products') }}" class="text-white">Products</a></li>
                    @if($product->category)
                        <li class="breadcrumb-item"><a href="{{ route('products') }}#{{ Str::slug($product->category->name) }}" class="text-white">{{ $product->category->name }}</a></li>
                    @endif
                    <li class="breadcrumb-item active text-white" aria-current="page">{{ $product->name }}</li>
                </ol>
            </nav>
        </div>
    </section>

    <!-- Product Detail -->
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6 mb-4">
                    @if($product->image)
                        <img src="{{ asset($product->image) }}" class="img-fluid rounded shadow" alt="{{ $product->name }}">
                    @else
                        <img src="https://via.placeholder.com/600x400" class="img-fluid rounded shadow" alt="{{ $product->name }}">
                    @endif
                </div>
                <div class="col-md-6">
                    <h1 class="mb-4">{{ $product->name }}</h1>
                    
                    @if($product->category)
                        <p class="text-muted mb-3">Category: <strong>{{ $product->category->name }}</strong></p>
                    @endif
                    
                    @if($product->composition)
                        <div class="mb-4">
                            <h5>Composition:</h5>
                            <p>{{ $product->composition }}</p>
                        </div>
                    @endif
                    
                    @if($product->description)
                        <div class="mb-4">
                            <h5>Description:</h5>
                            <p>{{ $product->description }}</p>
                        </div>
                    @endif
                    
                    @if($product->packaging)
                        <div class="mb-4">
                            <h5>Packaging:</h5>
                            <p>{{ $product->packaging }}</p>
                        </div>
                    @endif
                    
                    <div class="mt-4">
                        <a href="{{ route('contact') }}" class="btn btn-primary btn-lg">Inquire About This Product</a>
                        <a href="{{ route('products') }}" class="btn btn-outline-secondary btn-lg">Back to Products</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection