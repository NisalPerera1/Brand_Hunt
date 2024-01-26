@extends('layouts.admin_includes.app')

@section('content')

    <div class="">
        <div class="">
            <div class="flex justify-between flex-wrap items-center mb-6">    
                <h4>{{ isset($product) ? 'Edit Product' : 'Create New Product' }}</h4>
                <a href="{{ route('products.index') }}" class="btn inline-flex justify-center btn-outline-dark">Back to All Products</a>
            </div>

            <div class="card">
                <div class="card-body flex flex-col p-6">
                    <div class="card-text h-full">
                        <form id="productForm" action="{{ isset($product) ? route('products.update', $product->id) : route('products.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                            @csrf
                        
                            @if(isset($product))
                                @method('PUT')
                            @endif
                        
                        
                            <div class="input-area">
                                <label for="name" class="form-label">Product Name</label>
                                <input id="name" name="name" type="text" class="form-control" placeholder="Product Name" value="{{ old('name', isset($product) ? $product->name : '') }}" required>
                            </div>
                        
                            <div class="input-area">
                                <label for="quantity" class="form-label">Quantity</label>
                                <input id="quantity" name="quantity" type="number" class="form-control" placeholder="Quantity" value="{{ old('quantity', isset($product) ? $product->quantity : '') }}" required>
                            </div>
                        
                            @if(isset($product) && $product->image)
                                <div class="input-area">
                                    <label for="current_image" class="form-label">Current Image</label>
                                    <img src="{{ asset('storage/' . $product->image) }}" alt="Current Image" style="width: 250px; height: 150px;">
                                </div>
                            @endif

                            @if(isset($product) && $product->gallery_images)
                                <div class="input-area" style="display: flex; flex-wrap: nowrap; overflow-x: auto;">
                                    <label for="current_gallery" class="form-label">Current Gallery Images</label>
                                    @foreach(json_decode($product->gallery_images) as $galleryImage)
                                        <img src="{{ asset('storage/' . $galleryImage) }}" alt="Gallery Image" style="width: 250px; height: 150px; margin-right: 10px;">
                                    @endforeach
                                </div>
                            @endif

                            @if(!isset($product))
                                <div class="input-area">
                                    <label for="image" class="form-label">Image</label>
                                    <input id="image" name="image" type="file" class="form-control">
                                </div>

                                <div class="input-area">
                                    <label for="gallery_images" class="form-label">Gallery Images</label>
                                    <input id="gallery_images" name="gallery_images[]" type="file" class="form-control" multiple>
                                </div>
                            @endif  
                            <div class="input-area">
                                <label for="description" class="form-label">Description</label>
                                <textarea id="description" name="description" class="form-control">{{ old('description', isset($product) ? $product->description : '') }}</textarea>
                            </div>
                        
                            <div class="input-area">
                                <label for="price" class="form-label">Price</label>
                                <input id="price" type="number" name="price" class="form-control" placeholder="Price" value="{{ old('price', isset($product) ? $product->price : '') }}" required>
                            </div>
                        
                            <div class="input-area">
                                <label for="short_description" class="form-label">Short Description</label>
                                <textarea id="short_description" name="short_description" class="form-control" placeholder="Short Description Under Product">{{ old('short_description', isset($product) ? $product->short_description : '') }}</textarea>
                            </div>
                        
                            <div class="input-area">
                                <label for="sku" class="form-label">SKU</label>
                                <input id="sku" name="sku" type="text" class="form-control" placeholder="SKU" value="{{ old('sku', isset($product) ? $product->sku : '') }}" required>
                            </div>

                            <div class="form-group">
                                <label for="category">Category:</label>
                                <select id="category" name="category_id" class="form-control" required>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" {{ isset($product) && $product->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        
                            <button type="button" id="addProductBtn" class="btn flex justify-center btn-dark ml-auto">{{ isset($product) ? 'Update Product' : 'Add Product' }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script>
$(document).ready(function () {
    $('#addProductBtn').on('click', function () {
        // Serialize form data
        var formData = new FormData($('#productForm')[0]);

        // Add CSRF token to formData
        formData.append('_token', $('meta[name="csrf-token"]').attr('content'));

        // Add method override for PUT requests
        formData.append('_method', 'PUT');

        // Make AJAX request
        $.ajax({
            url: "{{ isset($product) ? route('products.update', $product->id) : route('products.store') }}",
            method: "POST", // Always use POST for AJAX with Laravel
            data: formData,
            contentType: false,
            processData: false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (response) {
                // Handle success response
                alert('Product {{ isset($product) ? 'Updated' : 'Added' }} successfully.');
                window.location.href = "{{ route('products.index') }}";
            },
            error: function (error) {
                // Handle error response
                console.error(error);
                // You can update the UI or show an error message here
            }
        });
    });
});


    </script>


    
    
        
@endsection
