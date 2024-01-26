<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Belle Multipurpose Bootstrap 4 Html Template</title>
    <meta name="description" content="description">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('site/assets/images/favicon.png') }}" />
    <!-- Plugins CSS -->
    <link rel="stylesheet" href="{{ asset('site/assets/css/plugins.css') }}">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('site/assets/css/bootstrap.min.css') }}">
    <!-- Main Style CSS -->
    {{-- <link rel="stylesheet" href="{{ asset('site/assets/css/style.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('site/assets/css/responsive.css') }}">
</head>

<body class="template-index belle template-index-belle">
    <div id="pre-loader">
        <img src="{{ asset('site/assets/images/loader.gif') }}" alt="Loading..." />
    </div>
    <div class="pageWrapper">
        <div class="flex flex-col justify-between min-h-screen">
            <div>
                @include('layouts.site_includes.top_header')
                @include('layouts.site_includes.header')
                {{-- @include('layouts.site_includes.mobile_menu') --}}
                @include('layouts.site_includes.promoSearch')
                @yield('content')
                @include('layouts.site_includes.footer')
                @include('layouts.site_includes.scrolltotop')
                @include('layouts.site_includes.quickviewpopup')
                @include('layouts.site_includes.newsletter')
            </div>
        </div>
    </div>

    <!-- JavaScript Section -->
    <script src="{{ asset('site/assets/js/vendor/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('site/assets/js/vendor/modernizr-3.6.0.min.js') }}"></script>
    <script src="{{ asset('site/assets/js/vendor/jquery.cookie.js') }}"></script>
    <script src="{{ asset('site/assets/js/vendor/wow.min.js') }}"></script>
    <script src="{{ asset('site/assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('site/assets/js/plugins.js') }}"></script>
    <script src="{{ asset('site/assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('site/assets/js/lazysizes.js') }}"></script>
    <script src="{{ asset('site/assets/js/main.js') }}"></script>

    <!-- For Newsletter Popup -->
    <script>
        jQuery(document).ready(function () {
            jQuery('.closepopup').on('click', function () {
                jQuery('#popup-container').fadeOut();
                jQuery('#modalOverly').fadeOut();
            });

            var visits = jQuery.cookie('visits') || 0;
            visits++;
            jQuery.cookie('visits', visits, {
                expires: 1,
                path: '/'
            });
            console.debug(jQuery.cookie('visits'));
            if (jQuery.cookie('visits') > 1) {
                jQuery('#modalOverly').hide();
                jQuery('#popup-container').hide();
            } else {
                var pageHeight = jQuery(document).height();
                jQuery('<div id="modalOverly"></div>').insertBefore('body');
                jQuery('#modalOverly').css("height", pageHeight);
                jQuery('#popup-container').show();
            }
            if (jQuery.cookie('noShowWelcome')) {
                jQuery('#popup-container').hide();
                jQuery('#active-popup').hide();
            }
        });

        jQuery(document).mouseup(function (e) {
            var container = jQuery('#popup-container');
            if (!container.is(e.target) && container.has(e.target).length === 0) {
                container.fadeOut();
                jQuery('#modalOverly').fadeIn(200);
                jQuery('#modalOverly').hide();
            }
        });
    </script>
    <!-- End For Newsletter Popup -->
</body>

</html>
