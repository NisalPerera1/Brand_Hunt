{{-- @extends('layouts.admin_includes.app')

@section('content')
    <div class="" id="content_wrapper">
        <div class="">
            <div class="flex justify-between flex-wrap items-center mb-6">    
                <h4>Edit Product</h4>
                <a href="{{ route('products.index') }}" class="btn inline-flex justify-center btn-outline-dark">Back to All Products</a>
            </div>

            <div class="card">
                <div class="card-body flex flex-col p-6">

                    <div class="card-text h-full">
                        <form action="{{ route('products.update', $product) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                            @csrf
                            @method('PUT')

                            <div class="input-area">
                                <label for="name" class="form-label">Product Name</label>
                                <input id="name" name="name" type="text" class="form-control" value="{{ old('name', $product->name) }}" required>
                            </div>

                            <div class="input-area">
                                <label for="quantity" class="form-label">Quantity</label>
                                <input id="quantity" name="quantity" type="number" class="form-control" value="{{ old('quantity', $product->quantity) }}" required>
                            </div>

                            <div class="input-area">
                                <label for="image" class="form-label">Current Image</label>
                                @if($product->image)
                                <img src="{{ asset('storage/' . $product->image) }}" alt="Product Image" style="max-width: 80px; max-height: 80px;" alt="Current Image">
                                @else
                                    <p>No image uploaded</p>
                                @endif
                            </div>
                            

                            <div class="input-area">
                                <label for="new_image" class="form-label">New Image</label>
                                <input id="new_image" name="new_image" type="file" class="form-control">
                            </div>

                            <div class="input-area">
                                <label for="description" class="form-label">Description</label>
                                <textarea id="description" name="description" class="form-control">{{ old('description', $product->description) }}</textarea>
                            </div>

                            <!-- Add validation errors display -->
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <button type="submit" class="btn flex justify-center btn-dark ml-auto">Update Product</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    
    
    
@endsection --}}
