@extends('frontend.layout.master')

@section('content')
    @php
    $content = content('login.content');
    @endphp
    <section class="login py-5"
        style="background: url({{ getFile('frontendlogin', @$general->frontend_login_image) }})">
        <div class="container py-5">
            <div class="row mt-5">
                <div class="col-md-10 mx-auto">
                    <div class="row">
                        <div style="background: url({{ getFile('login', @$content->data->image) }})"
                            class="col-md-6 left-col">
                            <h2 class="mt-5 text-light">{{ __('Recover Your Password') }}</h2>
                            <p class="text-light">{{ __('Know Your Password?') }}</p>
                            <a href="{{ route('user.login') }}" class="btn btn-primary"
                                >{{ __('Login') }} </a>
                        </div>
                        <div class="col-md-6  right-col">
                            <div class="inner-div-right text-center mt-5">
                                <h4 class="mt-5">{{ __('Enter Your Email Address') }}</h4>
                                </p>
                                <form action="{{ route('user.forgot.password') }}" method="POST">
                                    @csrf
                                    <div class="mb-1 d-flex text-start  mx-auto login-form-input">

                                        <div>
                                            <i class="fa-solid fa-envelope"></i>
                                        </div>
                                        <input type="text" name="email" class="form-control login-form-control"
                                            placeholder="Enter Email Address">
                                    </div>

                                    <div class=" mx-auto mt-2">
                                        @if (@$general->allow_recaptcha == 1)
                                            <div class="my-3">

                                                <script src="https://www.google.com/recaptcha/api.js"></script>

                                                <div class="g-recaptcha" data-sitekey="{{ @$general->recaptcha_key }}"
                                                    data-callback="verifyCaptcha"></div>
                                                <div id="g-recaptcha-error"></div>
                                            </div>
                                        @endif
                                    </div>

                                    <div class="mx-auto mt-4 mb-4">
                                        <button class="secondary-btn btn w-100  text-light"
                                            type="submit">{{ __('Send Verification Code') }} </button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection


@push('script')
    <script>
        "use strict";

        function submitUserForm() {
            var response = grecaptcha.getResponse();
            if (response.length == 0) {
                document.getElementById('g-recaptcha-error').innerHTML =
                    "<span class='text-danger'>{{__('Captcha field is required.')</span>";
                return false;
            }
            return true;
        }

        function verifyCaptcha() {
            document.getElementById('g-recaptcha-error').innerHTML = '';
        }
    </script>
@endpush
