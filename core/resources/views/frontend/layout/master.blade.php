<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="shortcut icon" type="image/png" href="{{ getFile('icon', @$general->favicon) }}">

    <title>
        @if (@$general->sitename)
            {{ __(@$general->sitename) . '-' }}
        @endif
        {{ __(@$pageTitle) }}
    </title>

    <link rel="stylesheet" href="{{ asset('asset/frontend/css/cookie.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/frontend/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/frontend/css/selectric.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/frontend/css/font-awsome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/frontend/css/iziToast.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('asset/frontend/css/slick.css') }}" />
    <link rel="stylesheet" href="{{ asset('asset/frontend/css/all.css') }}" />
    <link rel="stylesheet" href="{{ asset('asset/frontend/css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('asset/frontend/css/aos.css') }}" />
    @stack('style')
    <link rel="stylesheet"
        href="{{ asset('asset/frontend/css/color.php?primary_color=' . str_replace('#', '', @$general->primary_color)) }}">
</head>

<body>

    @if (@$general->allow_modal)
        @include('cookieConsent::index')
    @endif


    @if (@$general->analytics_status)
        <script async src="https://www.googletagmanager.com/gtag/js?id={{ @$general->analytics_key }}"></script>
        <script>
            'use strict'
            window.dataLayer = window.dataLayer || [];

            function gtag() {
                dataLayer.push(arguments);
            }
            gtag("js", new Date());
            gtag("config", "{{ @$general->analytics_key }}");
        </script>
    @endif

    @include('frontend.layout.header')

    @yield('content')

    @include('frontend.layout.footer')

    <button type="button" class="btn btn-danger btn-floating btn-lg" id="btn-back-to-top">
        <i class="fas fa-arrow-up"></i>
    </button>

    <script src="{{ asset('asset/frontend/js/jquery.min.js') }}"></script>
    <script src="{{ asset('asset/frontend/js/slick.js') }}"></script>
    <script src="{{ asset('asset/frontend/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('asset/frontend/js/selectric.min.js') }}"></script>
    <script src="{{ asset('asset/frontend/js/iziToast.min.js') }}"></script>
    <script src="{{ asset('asset/frontend/js/jquery.uploadPreview.min.js') }}"></script>
    <script src="{{ asset('asset/frontend/js/main.js') }}"></script>
    <script src="{{ asset('asset/frontend/js/aos.js') }}"></script>

    @stack('script')

    @if (@$general->twak_allow)
        <script type="text/javascript">
            var Tawk_API = Tawk_API || {},
                Tawk_LoadStart = new Date();
            (function() {
                var s1 = document.createElement("script"),
                    s0 = document.getElementsByTagName("script")[0];
                s1.async = true;
                s1.src = "https://embed.tawk.to/{{ @$general->twak_key }}";
                s1.charset = 'UTF-8';
                s1.setAttribute('crossorigin', '*');
                s0.parentNode.insertBefore(s1, s0);
            })();
        </script>
    @endif


    @if (Session::has('error'))
        <script>
            "use strict";
            iziToast.show({
                message: "{{ session('error') }}",
                position: "topRight",
                theme: 'dark',
                icon: 'fa fa-exclamation-circle',
                progressBarColor: '#f78686',
                color: '#fb405d',
                messageColor: '#ffffff',
            });
        </script>
    @endif

    @if (Session::has('success'))
        <script>
            "use strict";
            iziToast.show({
                message: "{{ session('success') }}",
                position: 'topRight',
                theme: 'dark',
                icon: 'fa-solid fa-check',
                progressBarColor: 'rgb(0, 255, 184)',
                color: '#17d990',
                messageColor: '#ffffff',
            });
        </script>
    @endif

    @if (session()->has('notify'))
        @foreach (session('notify') as $msg)
            <script>
                "use strict";
                iziToast.{{ $msg[0] }}({
                    message: "{{ trans($msg[1]) }}",
                    position: 'topRight',
                    theme: 'dark',
                    icon: 'fas fa-solid fa-check',
                    progressBarColor: 'rgb(0, 255, 184)',
                    color: '#17d990',
                    messageColor: '#ffffff',
                });
            </script>
        @endforeach
    @endif

    @if (@$errors->any())
        <script>
            "use strict";
            @foreach ($errors->all() as $error)
                iziToast.show({
                    message: "{{ __($error) }}",
                    position: "topRight",
                    theme: 'dark',
                    icon: 'fa fa-exclamation-circle',
                    progressBarColor: '#f78686',
                    color: '#fb405d',
                    messageColor: '#ffffff',
                });
            @endforeach
        </script>
    @endif

    <script>
        'use strict';

        AOS.init();

        jQuery('.cookie-consent__cancel').on('click', function() {
            jQuery(this).closest('.cookie-modal').fadeOut();


        })

        if (jQuery().selectric) {
            $(".selectric").selectric({
                disableOnMobile: false,
                nativeOnMobile: false
            });
        }

        var url = "{{ route('user.changeLang') }}";

        $(".changeLang").change(function() {
            if ($(this).val() == '') {
                return false;
            }
            window.location.href = url + "?lang=" + $(this).val();
        });
    </script>

</body>


</html>
