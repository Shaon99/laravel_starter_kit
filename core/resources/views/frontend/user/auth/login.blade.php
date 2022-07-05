@extends('frontend.layout.master')

@section('content')
   

@php
$content = content('login.content');
@endphp

    <section class="login py-5" style="background: url({{ getFile('frontendlogin', @$general->frontend_login_image) }})">
        <div class="container py-5">
            <div class="row mt-5">
                <div class="col-md-10 mx-auto">
                    <div class="row ">
                        <div style="background: url({{ getFile('login', @$content->data->image) }})" class="col-md-6 left-col">
                            <div class="inner-div-left text-center text-white py-5 mt-5">
                                <h2>{{ @$content->data->left_title }}</h2>
                                <p>{{ @$content->data->left_short_description }} </p>
                                <a href="{{ route('user.register') }}"
                                    class="btn btn-primary" type="submit">{{ @$content->data->left_button_text}}</a>
                            </div>
                        </div>
                        <div class="col-md-6  right-col">
                            <div class="inner-div-right text-center">
                                <h4 class="mt-4">{{@$content->data->title }}</h4>
                                <p class="py-2">{{ @$content->data->short_description }} </p>
                                <form class="reg-form" action="" method="POST">
                                    @csrf
                                <div class="mb-3 d-flex text-start w-75 mx-auto login-form-input">

                                    <div>
                                        <i class="fa-solid fa-envelope"></i>
                                    </div>
                                    <input type="email"  name="email" value="{{ old('email') }}" class="form-control login-form-control"
                                         placeholder="name@example.com">
                                </div>

                                <div class="mb-1 d-flex text-start w-75 mx-auto login-form-input">

                                    <div>
                                        <i class="fa-solid fa-lock"></i>
                                    </div>
                                    <input type="password" name="password" class="form-control login-form-control"
                                         placeholder="password">
                                </div>


                                <div class=" w-75 mx-auto text-end">
                                    <a href="{{ route('user.forgot.password') }}" class="text-decoration-none login-register">{{ __('Forgot Password ?') }}</a>

                                </div>
                                <div class=" w-75 mx-auto mt-2">
                                    @if (@$general->allow_recaptcha == 1)
                                    <div class="my-3">
    
                                        <script src="https://www.google.com/recaptcha/api.js"></script>
    
                                        <div class="g-recaptcha" data-sitekey="{{ @$general->recaptcha_key }}"
                                            data-callback="verifyCaptcha"></div>
                                        <div id="g-recaptcha-error"></div>
                                    </div>
                                @endif
                                </div>
                            
                                <div class=" w-75 mx-auto mt-4 mb-4">
                                    <button
                                        class="secondary-btn btn w-100  text-light" type="submit">{{ @$content->data->button_text}} </button>
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
                    "<span class='text-danger'>@changeLang('Captcha field is required.')</span>";
                return false;
            }
            return true;
        }

        function verifyCaptcha() {
            document.getElementById('g-recaptcha-error').innerHTML = '';
        }
    </script>
@endpush