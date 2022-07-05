<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>
        @if (@$general->sitename)
            {{ __(@$general->sitename) . '-' }}
        @endif
        {{ __(@$pageTitle) }}
    </title>
    <link rel="shortcut icon" type="image/png" href="{{ getFile('icon', @$general->favicon) }}">
    <link rel="stylesheet" href="{{ asset('asset/admin/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/admin/css/font-awsome.min.css') }}">
    @csrf
    <link rel="stylesheet" href="{{ asset('asset/admin/css/summernote-bs4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/admin/css/component-custom-switch.min.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/admin/modules/jquery-selectric/selectric.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/admin/modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/admin/css/bootstrap-timepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/admin/css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/admin/css/izitoast.min.css') }}">
    @stack('style-plugin')
    <link rel="stylesheet" href="{{ asset('asset/admin/modules/bootstrap-daterangepicker/daterangepicker.css') }}">
    <link rel="stylesheet"
        href="{{ asset('asset/admin/modules/bootstrap-timepicker/css/bootstrap-timepicker.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('asset/admin/modules/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/admin/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/admin/css/components.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/admin/css/daterangepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/admin/css/iconpicker.css') }}">

    @stack('style')
</head>

<body>
    <div id="app">
        <div class="main-wrapper">
            <div id="overlay">
                <div class="cv-spinner">
                    <span class="spinner"></span>
                </div>
            </div>
            @include('backend.layout.navbar')
            @include('backend.layout.sidebar')
            @yield('content')
            @include('backend.layout.footer')
        </div>
    </div>

    @yield('script')

    <script src="{{ asset('asset/admin/js/jquery.min.js') }}"></script>
    <script src="{{ asset('asset/admin/js/proper.min.js') }}"></script>
    <script src="{{ asset('asset/admin/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('asset/admin/js/nicescroll.min.js') }}"></script>
    <script src="{{ asset('asset/admin/js/summernote-bs4.min.js') }}"></script>
    <script src="{{ asset('asset/admin/js/daterangepicker.js') }}"></script>
    <script src="{{ asset('asset/admin/modules/jquery-selectric/jquery.selectric.min.js') }}"></script>
    <script src="{{ asset('asset/admin/modules/moment.min.js') }}"></script>
    <script src="{{ asset('asset/admin/modules/upload-preview/assets/js/jquery.uploadPreview.min.js') }}"></script>
    <script src="{{ asset('asset/admin/modules/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
    <script src="{{ asset('asset/admin/modules/bootstrap-timepicker/js/bootstrap-timepicker.min.js') }}"></script>
    <script src="{{ asset('asset/admin/modules/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js') }}"></script>
    <script src="{{ asset('asset/admin/js/stisla.js') }}"></script>
    <script src="{{ asset('asset/admin/js/scripts.js') }}"></script>
    <script src="{{ asset('asset/admin/js/izitoast.min.js') }}"></script>
    <script src="{{ asset('asset/admin/js/iconpicker.js') }}"></script>

    <script src="{{ asset('asset/admin/modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js') }}"></script>
    @stack('script-plugin')
    <script src="{{ asset('asset/admin/js/sortable.min.js') }}"></script>
    @stack('script')

    @if (Session::has('success'))
        <script>
            "use strict";
            iziToast.show({
                message: "{{ session('success') }}",
                position: 'topRight',
                theme: 'dark',
                icon: 'fas fa-solid fa-check',
                progressBarColor: 'rgb(0, 255, 184)',
                color: '#17d990',
                messageColor: '#ffffff',
            });
        </script>
    @endif

    @if (Session::has('error'))
        <script>
            "use strict";
            iziToast.show({
                message: "{{ __($error) }}",
                position: "topRight",
                theme: 'dark',
                icon: 'fa fa-exclamation-circle',
                progressBarColor: '#f78686',
                color: '#fb405d',
                messageColor: '#ffffff',
            });
        </script>
    @endif
    @if (session()->has('notify'))
        @foreach (session('notify') as $msg)
            <script>
                "use strict";
                iziToast.{{ $msg[0] }}({
                    message: "{{ __($msg[1]) }}",
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
        'use strict'
        var url = "{{ route('admin.changeLang') }}";

        $(".changeLang").change(function() {
            if ($(this).val() == '') {
                return false;
            }
            window.location.href = url + "?lang=" + $(this).val();
        });
    </script>
</body>

</html>
