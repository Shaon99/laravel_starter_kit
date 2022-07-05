@extends('frontend.layout.master')


@section('content')


    @if ($sections->sections != null)
        @foreach ($sections->sections as $sections)
            @include('frontend.sections.' . $sections)
        @endforeach
    @endif



@endsection
@push('script')
    <script>
        'use strict';
        $(document).ready(function() {
            $(document).on('submit', '#subscribe', function(e) {
                e.preventDefault();
                const email = $('.subscribe-email').val();
                var url = "{{ route('subscribe') }}";
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: 'POST',
                    url: url,
                    data: {
                        email: email,
                    },
                    success: (data) => {
                        iziToast.success({
                            message: data.message,
                            position: 'topRight',
                            theme: 'dark',
                            icon: 'fas fa-solid fa-check',
                            progressBarColor: 'rgb(0, 255, 184)',
                            color: '#17d990',
                            messageColor: '#ffffff',
                        });
                        $('.subscribe-email').val('');

                    },
                    error: (error) => {
                        if (typeof(error.responseJSON.errors.email) !== "undefined") {
                            iziToast.error({
                                message: error.responseJSON.errors.email,
                                position: "topRight",
                                theme: 'dark',
                                icon: 'fa fa-exclamation-circle',
                                progressBarColor: '#f78686',
                                color: '#fb405d',
                                messageColor: '#ffffff',
                            });
                        }

                    }
                })

            });
        });
        $('.multiple-items').slick({
            dots: true,
            infinite: true,
            autoplay: true,
            autoplaySpeed: 3000,
            slidesToShow: 3,
            slidesToScroll: 3,
            prevArrow: false,
            nextArrow: false,
            speed: 600,
            responsive: [{
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 3,
                        infinite: true,
                        dots: true
                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }

            ]
        });
    </script>
@endpush
