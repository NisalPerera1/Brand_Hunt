@extends('layouts.admin_includes.app')

@section('content')
    <div class="container mt-4">
        <h4>Product Details</h4>

        <div class="card mt-3">
            <div class="card-body">
                <h5 class="card-title">{{ $product->name }}</h5>
                <p class="card-text">Quantity: {{ $product->quantity }}</p>
                <p class="card-text">Description: {{ $product->description }}</p>
                <img src="{{ asset('storage/' . $product->image) }}" alt="Product Image" style="max-width: 300px; max-height: 300px;">

                {{-- Back button --}}
                <a href="{{ route('products.index') }}" class="btn inline-flex justify-center btn-outline-info">Back to Products</a>
            </div>
        </div>
    </div>
@endsection
