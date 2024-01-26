@extends('layouts.admin_includes.app')

@section('content')
<form id="sliderForm" enctype="multipart/form-data" class="space-y-4">
    @csrf
    <input type="hidden" id="slider_id" name="slider_id" value="{{ $slider->id ?? '' }}">
    <div class="input-area">
        <label for="title" class="form-label">Title</label>
        <input type="text" class="form-control" id="title" name="title" value="{{ $slider->title ?? '' }}">
    </div>
    <div class="input-area">
        <label for="description" class="form-label">Description</label>
        <textarea class="form-control" id="description" name="description">{{ $slider->description ?? '' }}</textarea>
    </div>
    <div class="input-area">
        <label for="image" class="form-label">Image</label>
        <input type="file" class="form-control-file" id="image" name="image">
        @if(isset($slider) && $slider->image)
            <img src="{{ asset('slider_images/' . $slider->image) }}" alt="Slider Image" width="100">
        @endif
    </div>
    <button type="submit" class="btn flex justify-center btn-dark ml-auto">Submit</button>
</form>

<script>
    $('#sliderForm').submit(function(e) {
        e.preventDefault();

        var formData = new FormData(this);

        $.ajax({
            url: "{{ isset($slider) ? route('sliders.update', $slider->id) : route('sliders.store') }}",
            method: "{{ isset($slider) ? 'PUT' : 'POST' }}",
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: function(response) {
                console.log(response);
                // Handle success, maybe show a success message or redirect
                alert('Slider saved successfully.');
                window.location.href = "{{ route('sliders.index') }}"; // Redirect to existing sliders page
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
                // Handle errors, maybe show error messages
            }
        });
    });
</script>


@endsection