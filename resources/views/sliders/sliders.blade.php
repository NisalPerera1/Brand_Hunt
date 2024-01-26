@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <!-- Form for creating and editing sliders -->
                <div id="sliderFormContainer">
                    @include('sliders.form')
                </div>
            </div>
            <div class="col-md-6">
                <!-- Display existing sliders -->
                <div id="sliderListContainer">
                    @include('sliders.list')
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('admin/assets/js/slider.js') }}"></script>
@endpush
