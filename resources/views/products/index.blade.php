@extends('layouts.admin_includes.app')

@section('content')
    <div class="card">
        <header class="card-header noborder">
            <h4 class="card-title">All Products</h4>
        </header>
        <div class="d-flex justify-content-end mb-3">
            <a href="{{ route('products.create') }}" class="btn btn-success"><i class="fas fa-plus"></i> Create Product</a>
        </div>
        
        <div class="card-body px-6 pb-6">
            <div class="overflow-x-auto -mx-6">
                <div class="inline-block min-w-full align-middle">
                    <div class="overflow-hidden ">
                        <table class="min-w-full divide-y divide-slate-100 table-fixed dark:divide-slate-700">
                            <thead class="bg-slate-200 dark:bg-slate-700">
                                <tr>
                                    <th scope="col" class="table-th">ID</th>
                                    <th scope="col" class="table-th">Name</th>
                                    <th scope="col" class="table-th">Quantity</th>
                                    <th scope="col" class="table-th">Description</th>
                                    <th scope="col" class="table-th">Image</th>
                                    <th scope="col" class="table-th">Short Description</th>
                                    <th scope="col" class="table-th">Price</th>
                                    <th scope="col" class="table-th">SKU</th>
                                    <th scope="col" class="table-th">Gallery Images</th>
                                    <th scope="col" class="table-th">Action</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-slate-100 dark:bg-slate-800 dark:divide-slate-700">
                                @foreach($products as $product)
                                    <tr class="hover:bg-slate-200 dark:hover:bg-slate-700">
                                        <td class="table-td">{{ $product->id }}</td>
                                        <td class="table-td">{{ $product->name }}</td>
                                        <td class="table-td">{{ $product->quantity }}</td>
                                        <td class="table-td">{{ $product->description }}</td>
                                        <td class="table-td">
                                            <img src="{{ asset('storage/' . $product->image) }}" alt="Product Image" style="max-width: 50px; max-height: 50px;">
                                        </td>
                                        <td class="table-td">{{ $product->short_description }}</td>
                                        <td class="table-td">{{ $product->price }}</td>
                                        <td class="table-td">{{ $product->sku }}</td>
                                        <td class="table-td">
                                            @if ($product->gallery_images)
                                                @foreach (json_decode($product->gallery_images) as $galleryImage)
                                                    <img src="{{ asset('storage/' . $galleryImage) }}" alt="Gallery Image" style="max-width: 50px; max-height: 50px;">
                                                @endforeach
                                            @endif
                                        </td>
                                        
                                        
                                        <td class="table-td">
                                            <a class="btn btn-info btn-sm" href="{{ route('products.show', $product) }}">
                                                <i class="fas fa-eye"></i> View
                                            </a>
                                            <a class="btn btn-warning btn-sm" href="{{ route('products.edit', $product) }}">
                                                <i class="fas fa-edit"></i> Edit
                                            </a>
                                            <form action="{{ route('products.destroy', $product) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this product?')">
                                                    <i class="fas fa-trash-alt"></i> Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
