@extends('layouts.admin_includes.app')

@section('content')
    <form id="categoryForm" enctype="multipart/form-data" class="space-y-4">
        @csrf
        <input type="hidden" id="category_id" name="category_id" value="{{ $category->id ?? '' }}">
        <div class="input-area">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $category->name ?? '' }}">
        </div>
        <div class="input-area">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description">{{ $category->description ?? '' }}</textarea>
        </div>
        <button type="submit" class="btn flex justify-center btn-dark ml-auto">Submit</button>
    </form>

    <script>
       $('#categoryForm').submit(function(e) {
    e.preventDefault();

    var formData = new FormData(this);

    $.ajax({
    url: "{{ isset($category) ? route('categories.update', $category->id) : route('categories.store') }}",
    method: "{{ isset($category) ? 'PUT' : 'POST' }}",
    data: {
        _token: "{{ csrf_token() }}", // Include CSRF token
        category_id: $("#category_id").val(), // Include other form fields
        name: $("#name").val(),
        description: $("#description").val()
    },
    success: function(response) {
        console.log(response);
        // Handle success, maybe show a success message or redirect
        alert('Category saved successfully.');
        window.location.href = "{{ route('categories.index') }}"; // Redirect to existing categories page
    },
    error: function(xhr, status, error) {
        console.error(xhr.responseText);
        // Handle errors, maybe show error messages
    }
});

});

    </script>
@endsection
