<!-- resources/views/blogs/create.blade.php -->

{{-- @extends('layouts.admin_includes.app')

@section('content')
    <div class="">
        <div class="">
            <div class="flex justify-between flex-wrap items-center mb-6">    
                <h4>Create New Blog</h4>
                <a href="{{ route('blogs.index') }}" class="btn inline-flex justify-center btn-outline-dark">Back to All Blogs</a>
            </div>

            <div class="card">
                <div class="card-body flex flex-col p-6">

                    <div class="card-text h-full">
                        <form id="blogForm" action="{{ route('blogs.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                            @csrf
                        
                            <div class="input-area">
                                <label for="blog_name" class="form-label">Blog Name</label>
                                <input id="blog_name" name="blog_name" type="text" class="form-control" placeholder="Blog Name" required>
                            </div>
                        
                            <div class="input-area">
                                <label for="author" class="form-label">Author</label>
                                <input id="author" name="author" type="text" class="form-control" placeholder="Author" required>
                            </div>
                        
                            <div class="input-area">
                                <label for="date" class="form-label">Date</label>
                                <input id="date" name="date" type="date" class="form-control" required>
                            </div>
                        
                            <div class="input-area">
                                <label for="description" class="form-label">Description</label>
                                <textarea id="description" name="description" class="form-control"></textarea>
                            </div>
                        
                            <div class="input-area">
                                <label for="image" class="form-label">Image</label>
                                <input id="image" name="image" type="file" class="form-control">
                            </div>
                        
                            <div class="input-area">
                                <label for="gallery_images" class="form-label">Gallery Images</label>
                                <input id="gallery_images" name="gallery_images[]" type="file" class="form-control" multiple>
                            </div>
                        
                            <button type="submit" class="btn flex justify-center btn-dark ml-auto">Add Blog</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection --}}
