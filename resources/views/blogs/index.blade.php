@extends('layouts.admin_includes.app')

@section('content')
    <div class="card">
        <header class="card-header noborder">
            <h4 class="card-title">All Blogs</h4>
        </header>
        <div class="d-flex justify-content-end mb-3">
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#createBlogModal">
                Create New Blog
            </button>
        </div>

      {{-- Create Mdal --}}

        <div class="modal fade" id="createBlogModal" tabindex="-1" role="dialog" aria-labelledby="createBlogModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="createBlogModalLabel">Create New Blog</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
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
        </div>
{{-- End of create  --}}




        <div class="card-body px-6 pb-6">
            <div class="overflow-x-auto -mx-6">
                <div class="inline-block min-w-full align-middle">
                    <div class="overflow-hidden">
                        <table id="blogDataTable" class="min-w-full divide-y divide-slate-100 table-fixed dark:divide-slate-700">
                            <thead class="bg-slate-200 dark:bg-slate-700">
                                <tr>
                                    <th scope="col" class="table-th">ID</th>
                                    <th scope="col" class="table-th">Blog Name</th>
                                    <th scope="col" class="table-th">Author</th>
                                    <th scope="col" class="table-th">Cretaed Date</th>
                                    <th scope="col" class="table-th">Description</th>
                                    <th scope="col" class="table-th">Image</th>
                                    <th scope="col" class="table-th">Gallery Images</th>
                                    <th scope="col" class="table-th">Action</th>
                                </tr>
                            </thead>

                            <tbody class="bg-white divide-y divide-slate-100 dark:bg-slate-800 dark:divide-slate-700">
                                @foreach($blogs as $blog)
                                    <tr class="hover:bg-slate-200 dark:hover:bg-slate-700">
                                        <td class="table-td">{{ $blog->id }}</td>
                                        <td class="table-td">{{ $blog->blog_name }}</td>
                                        <td class="table-td">{{ $blog->author }}</td>
                                        <td class="table-td">{{ $blog->date }}</td>

                                        <td class="table-td">{{ $blog->description }}</td>

                                        <td class="table-td">
                                            <img src="{{ asset('storage/' . $blog->image) }}" alt="blog Image" style="max-width: 50px; max-height: 50px;">
                                        </td>
                                        <td class="table-td">
                                            @if ($blog->gallery_images)
                                                @foreach (json_decode($blog->gallery_images) as $galleryImage)
                                                    <img src="{{ asset('storage/' . $galleryImage) }}" alt="Gallery Image" style="max-width: 50px; max-height: 50px;">
                                                @endforeach
                                            @endif
                                        </td>
                                        
                                        <td class="table-td">
                                            <a class="btn btn-info btn-sm" href="{{ route('blogs.show', $blog) }}">
                                                <i class="fas fa-eye"></i> View
                                            </a>


                                            <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editBlogModal" data-blog-id="{{ $blog->id }}">
                                                <i class="fas fa-edit"></i> Edit
                                            </button>
                            

                                            <form action="{{ route('blogs.destroy', $blog) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this blog?')">
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
        <!-- Edit Blog Modal -->
<div class="modal fade" id="editBlogModal" tabindex="-1" role="dialog" aria-labelledby="editBlogModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editBlogModalLabel">Edit Blog</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="card">
                <div class="card-body flex flex-col p-6">
                    <div class="card-text h-full">
                            <form id="editBlogForm" action="{{ url('blogs/' . $blog->id) }}" method="POST" enctype="multipart/form-data" class="space-y-4">

                            @csrf
                            @method('PUT')

                            <div class="input-area">
                                <label for="edit_blog_name" class="form-label">Blog Name</label>
                                <input id="edit_blog_name" name="blog_name" type="text" class="form-control" placeholder="Blog Name" required value="{{ old('blog_name', isset($blog) ? $blog->blog_name : '') }}">
                            </div>

                            <div class="input-area">
                                <label for="edit_author" class="form-label">Author</label>
                                <input id="edit_author" name="author" type="text" class="form-control" placeholder="Author" required value="{{ old('author', isset($blog) ? $blog->author : '') }}">
                            </div>

                            <div class="input-area">
                                <label for="edit_date" class="form-label">Date</label>
                                <input id="edit_date" name="date" type="date" class="form-control" required value="{{ old('date', isset($blog) ? $blog->date : '') }}">
                            </div>

                            <div class="input-area">
                                <label for="edit_description" class="form-label">Description</label>
                                <textarea id="edit_description" name="description" class="form-control">{{ old('description', isset($blog) ? $blog->description : '') }}</textarea>
                            </div>

                            <div class="input-area">
                                <label for="edit_image" class="form-label">Image</label>
                                <input id="edit_image" name="image" type="file" class="form-control">
                            </div>
                        
                            <div class="input-area">
                                <label for="edit_gallery_images" class="form-label">Gallery Images</label>
                                <input id="edit_gallery_images" name="gallery_images[]" type="file" class="form-control" multiple>
                            </div>
                            
                            <button type="submit" class="btn flex justify-center btn-dark ml-auto">Update Blog</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
 <!-- End of Edit Blog Modal -->
    </div>
    <script>
        // Add a script to handle form submission and modal behavior
        $(document).ready(function () {
            // Handle form submission
            $('#createBlogForm').submit(function (e) {
                e.preventDefault();

                // Your form submission logic here
                // You can use AJAX to send the form data to the server

                // Close the modal after successful submission
                $('#createBlogModal').modal('hide');
            });

            // Show the modal when the button is clicked
            $('[data-target="#createBlogModal"]').click(function () {
                $('#createBlogModal').modal('show');
            });
        });
    </script>

<script>
    $(document).ready(function () {
        // Handle form submission for editing
        $('#editBlogForm').submit(function (e) {
            e.preventDefault();

            // Your form submission logic here
            // You can use AJAX to send the form data to the server

            // Assuming you are sending the form data using $.ajax
            $.ajax({
                url: $(this).attr('action'),
                method: 'POST', // Change this to 'PUT' if your route uses 'put' method
                data: new FormData(this),
                contentType: false,
                processData: false,
                success: function (response) {
                    // Check if the response contains any errors
                    if (response.error) {
                        console.error('Error updating blog:', response.error);
                        // Handle the error, show a message, etc.
                    } else {
                        // Blog updated successfully
                        console.log('Blog updated successfully');

                        // Close the modal after successful submission
                        $('#editBlogModal').modal('hide');

                        // You can optionally redirect to the index page
                        // window.location.href = "{{ route('blogs.index') }}";
                    }
                },
                error: function (error) {
                    console.error('Error updating blog:', error);
                    // Handle the error, show a message, etc.
                }
            });
        });

        // Show the edit modal when the edit button is clicked
        $('[data-target="#editBlogModal"]').click(function () {
            // Populate the form with the blog data for editing
            var blogId = $(this).data('blog-id');

            // Fetch the blog data using AJAX and populate the form fields
            $.ajax({
                url: '/blogs/' + blogId,
                method: 'GET',
                dataType: 'json',
                success: function (data) {
                    // Populate the form fields with data
                    $('#edit_blog_name').val(data.blog_name);
                    $('#edit_author').val(data.author);
                    $('#edit_date').val(data.date);
                    $('#edit_description').val(data.description);

                    // Trigger change event for date input (some browsers might not update it automatically)
                    $('#edit_date').change();

                    // You may need to handle image and gallery images here if necessary

                    // Show the modal
                    $('#editBlogModal').modal('show');
                },
                error: function (error) {
                    console.error('Error fetching blog data:', error);
                }
            });
        });
    });
</script>




@endsection
