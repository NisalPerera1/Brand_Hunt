<!DOCTYPE html>
<!-- Template Name: DashCode - HTML, React, Vue, Tailwind Admin Dashboard Template Author: Codeshaper Website: https://codeshaper.net Contact: support@codeshaperbd.net Like: https://www.facebook.com/Codeshaperbd Purchase: https://themeforest.net/item/dashcode-admin-dashboard-template/42600453 License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project. -->
<html lang="zxx" dir="ltr" class="light">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <title>Dashcode - HTML Template</title>
  <link rel="icon" type="image/png" href="assets/images/logo/favicon.svg">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
  <meta name="csrf-token" content="{{ csrf_token() }}">


<!-- Add this to your HTML file -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

  <!-- BEGIN: Theme CSS-->

  <!-- Include your CSS files using the asset function -->
  <link rel="stylesheet" href="{{ asset('admin/assets/css/rt-plugins.css') }}">
  <link rel="stylesheet" href="{{ asset('admin/assets/css/app.css') }}">
  <!-- End : Theme CSS-->
  <script src="{{ asset('admin/assets/js/settings.js') }}" sync></script>
</head>

<body class=" font-inter dashcode-app" id="body_class">
  <!-- [if IE]> <p class="browserupgrade"> You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security. </p> <![endif] -->
  <main class="app-wrapper">



    <!-- End: Settings -->
    <div class="flex flex-col justify-between min-h-screen">
      <div>
        @include('layouts.admin_includes.settings')

        @include('layouts.admin_includes.header')

        @include('layouts.admin_includes.sidebar')
        <div class="content-wrapper transition-all duration-150 ltr:ml-[248px] rtl:mr-[248px]" id="content_wrapper">
          <div class="page-content">
          {{-- <div class="flex justify-between flex-wrap items-center mb-6">   --}}
        @yield('content')
      </div>
    </div>
    </div>
    {{-- </div> --}}
        @include('layouts.admin_includes.footer')
      </div>

    
      </div>
    </div>
  </main>
  <!-- scripts -->
  <script src="{{ asset('admin/assets/js/jquery-3.6.0.min.js') }}"></script>
  <script src="{{ asset('admin/assets/js/rt-plugins.js') }}"></script>
  <script src="{{ asset('admin/assets/js/app.js') }}"></script>
  
</body>
</html>