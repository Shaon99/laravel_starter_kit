@extends('frontend.layout.master')

@section('content')
    @php
    $content = content('registration.content');
    @endphp

    <section class="login py-5"
        style="background: url({{ getFile('frontendlogin', @$general->frontend_login_image) }})">
        <div class="container py-5">
            <div class="row mt-5">
                <div class="col-md-10 mx-auto">
                    <div class="row ">
                        <div class="col-md-6  right-col">
                            <div class="inner-div-right text-center">
                                <h4>{{ @$content->data->title }}</h4>
                                <p class="py-2">{{ @$content->data->short_description }}</p>
                                <form class="reg-form" action="{{ route('user.register') }}" method="POST">
                                    @csrf
                                    <div class="mb-3 d-flex text-start w-100 mx-auto login-form-input">

                                        <div>
                                            <i class="fa-solid fa-user"></i>
                                        </div>
                                        <input type="text" name="fname" value="{{ old('fname') }}" class="form-control login-form-control" placeholder="first Name">
                                    </div>
                                    <div class="mb-3 d-flex text-start w-100 mx-auto login-form-input">

                                        <div>
                                            <i class="fa-solid fa-user"></i>
                                        </div>
                                        <input type="text" name="lname" value="{{ old('lname') }}" class="form-control login-form-control" placeholder="last Name">
                                    </div>

                                    <div class="mb-3 d-flex text-start w-100 mx-auto login-form-input">

                                        <div>
                                            <i class="fa-solid fa-envelope"></i>
                                        </div>
                                        <input type="email" name="email" value="{{ old('email') }}" class="form-control login-form-control"
                                            placeholder="name@example.com">
                                    </div>

                                 

                                    <div class="mb-1 d-flex text-start w-100 mx-auto login-form-input">
                                        <div>
                                            <i class="fa-solid fa-lock"></i>
                                        </div>
                                        <input type="password" name="password" class="form-control login-form-control"
                                            placeholder="password">
                                    </div>

                                    <div class="mt-3 d-flex text-start w-100 mx-auto login-form-input">
                                        <div>
                                            <i class="fa-solid fa-lock"></i>
                                        </div>
                                        <input type="password" name="password_confirmation" class="form-control login-form-control"
                                            placeholder="confirm password">
                                    </div>
                                    <div class="mt-3 d-flex">
                                        <div>
                                            <input type="checkbox" class="form-check-input" name="check" id="exampleCheck1" required>
                                        </div>
                                        <label class="form-check-label px-2 mt-1" for="exampleCheck1"><p class="text-secondary">{{ __('I Agree To The') }} <a href="{{ route('privacy') }}" class="text-primary color-change">{{ __('Privacy Policy') }}</a></p></label>
                                      </div>
                                    @if (@$general->allow_recaptcha == 1)
                                        <div class="my-3">

                                            <script src="https://www.google.com/recaptcha/api.js"></script>

                                            <div class="g-recaptcha" data-sitekey="{{ @$general->recaptcha_key }}"
                                                data-callback="verifyCaptcha"></div>
                                            <div id="g-recaptcha-error"></div>
                                        </div>
                                    @endif

                                    <div class=" w-100 mx-auto mt-3 mb-3">
                                        <button class="secondary-btn btn w-100  text-light"
                                            type="submit">{{ @$content->data->button_text }}</button>
                                    </div>

                                </form>

                            </div>


                        </div>


                        <div style="background: url({{ getFile('registration', @$content->data->image) }})"
                            class="col-md-6 left-col">

                            <div class="inner-div-left text-center text-white py-5 mb-5">

                                <h2>{{ @$content->data->right_title }}</h2>
                                <p>{{ @$content->data->right_short_description }} </p>
                                <a href="{{ route('user.login') }}"
                                    class="btn btn-primary"
                                    type="submit">{{ @$content->data->right_button_text }}</a>
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
