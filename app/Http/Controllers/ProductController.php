<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Category;
use Illuminate\Contracts\Filesystem\Filesystem;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function index()
    {
        $products = Products::all();
        return view('products.index', compact('products'));
        
    }

    public function create()
    {

        $categories = Category::all();
        return view('products.create_edit', compact('categories'));    }

        public function store(Request $request)
        {
            $validatedData = $request->validate([
                'name' => 'required|string',
                'quantity' => 'required|integer',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'gallery_images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'description' => 'nullable|string',
                'price' => 'required|integer',
                'short_description'=> 'nullable|string',
                'sku' => 'required|string',
                'category_id' => 'required|exists:categories,id', 
            ]);
        
            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('product_images', 'public');
                $validatedData['image'] = $imagePath;
            }
        
            if ($request->hasFile('gallery_images')) {
                $galleryImagePaths = [];
                foreach ($request->file('gallery_images') as $galleryImage) {
                    $galleryImagePath = $galleryImage->store('product_gallery_images', 'public');
                    $galleryImagePaths[] = $galleryImagePath;
                }
                $validatedData['gallery_images'] = json_encode($galleryImagePaths);
            }
        
            // Include the category_id in the validated data
            $validatedData['category_id'] = $request->category_id;
        
            Products::create($validatedData);
        
            return redirect()->route('products.index')->with('success', 'Product added successfully.');
        }
        
    
    public function show(Products $product)
    {
        return view('products.show', compact('product'));
    }

    public function edit(Products $product)
    {
        $categories = Category::all();
        return view('products.create_edit', compact('product', 'categories'));
    }

    public function update(Request $request, Products $product)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'quantity' => 'required|integer',
            'new_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'gallery_images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description' => 'nullable|string',
            'price' => 'required|integer',
            'short_description' => 'nullable|string',
            'sku' => 'required|string',
            'category_id' => 'required|exists:categories,id',
        ]);
    
        // If a new image is provided, upload it and update the 'image' attribute
        if ($request->hasFile('new_image')) {
            // Delete the current image
            if ($product->image) {
                Storage::delete('public/' . $product->image);
            }
    
            // Upload the new image
            $imagePath = $request->file('new_image')->store('product_images', 'public');
            $validatedData['image'] = $imagePath;
        }
    
        // Handle changes to gallery images
        if ($request->hasFile('gallery_images')) {
            // Delete the existing gallery images
            if ($product->gallery_images) {
                foreach (json_decode($product->gallery_images) as $existingGalleryImage) {
                    Storage::delete('public/' . $existingGalleryImage);
                }
            }
    
            // Upload the new gallery images
            $galleryImagePaths = [];
            foreach ($request->file('gallery_images') as $galleryImage) {
                $galleryImagePath = $galleryImage->store('gallery_images', 'public');
                $galleryImagePaths[] = $galleryImagePath;
            }
            $validatedData['gallery_images'] = json_encode($galleryImagePaths);
        } else {
            // If no new gallery images provided, keep the existing ones
            $existingGalleryImages = json_decode($product->gallery_images, true);
            $validatedData['gallery_images'] = $existingGalleryImages ?? [];
        }
    
        // Update the product with only the validated data
        $product->update($validatedData);
    
        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }
    
    public function destroy(Products $product)
    {
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
    }
}
