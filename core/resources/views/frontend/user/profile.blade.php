@extends('frontend.layout.master')


@section('content')

    <section class="breadcrumbs" style="background-image: url({{ getFile('breadcrumbs', @$general->breadcrumbs) }});">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center text-capitalize">
                <h2>{{ __($pageTitle) }}</h2>
                <ol>
                    <li><a href="{{ route('user.dashboard') }}">{{ __('Dashboard') }}</a></li>
                    <li>{{ __($pageTitle) }}</li>
                </ol>
            </div>

        </div>
    </section>


    <section>
        <div class="container">
            <div class="d-flex justify-content-end">           
            <a href="{{ route('user.change.password') }}" class="btn btn-main mb-2">{{ __('Change Password') }}</a>
            </div>
            <div class="d-flex justify-content-center">
                <div class="col-md-12">
                    <div class="profile-update">
                        <form action="{{ route('user.profileupdate') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-4 justify-content-center">
                                    <div class="w-50 img-choose-div m-auto h-75">
                                        <label for="exampleInputEmail1" class="mb-1">{{ __('Profile Picture') }}</label>

                                        @if (Auth::user()->image)
                                            <img class=" rounded file-id-preview" id="file-id-preview"
                                                src="{{ getFile('user', @Auth::user()->image) }}" alt="pp">

                                        @else
                                            <img class=" rounded file-id-preview" id="file-id-preview"
                                                src="{{ asset('asset/frontend/img/user.png') }}" alt="pp">

                                        @endif
                                        <input type="file" name="image" id="imageUpload" class="upload"
                                            accept=".png, .jpg, .jpeg" hidden>
                                            
                                        <label for="imageUpload" class="editImg">{{_("Choose file")}}</label>

                                           
                                    </div>
                                </div>
                                <div class="col-md-6">                                    
                                    <div class="update">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">{{ __('First Name') }}</label>
                                            <input type="text" class="form-control" name="fname"
                                                value="{{ @Auth::user()->fname }}"
                                                placeholder="{{ __('Enter First Name') }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">{{ __('Last Name') }}</label>
                                            <input type="text" class="form-control" name="lname"
                                                value="{{ @Auth::user()->lname }}"
                                                placeholder="{{ __('Enter Last Name') }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">{{ __('Username') }}</label>
                                            <input type="text" class="form-control text-white" name="username"
                                                value="{{ @Auth::user()->username }}"
                                                placeholder="{{ __('Enter User Name') }}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">{{ __('Email address') }}</label>
                                        <input type="email" class="form-control" name="email"
                                            value="{{ @Auth::user()->email }}" placeholder="{{ __('Enter Email') }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">{{ __('Phone') }}</label>
                                        <input type="text" class="form-control" name="phone"
                                            value="{{ @Auth::user()->phone }}" placeholder="{{ __('Enter Phone') }}">
                                    </div>


                                    <div class="row">

                                        <div class="form-group col-md-6 mb-3 ">
                                            <label>{{ __('Country') }}</label>
                                            <input type="text" name="country" class="form-control"
                                                value="{{ @Auth::user()->address->country }}">
                                        </div>

                                        <div class="col-md-6 mb-3">

                                            <label for="">{{ __('city') }}</label>
                                            <input type="text" name="city" class="form-control form_control"
                                                value="{{ @Auth::user()->address->city }}">

                                        </div>

                                        <div class="col-md-6 mb-3">

                                            <label for="">{{ __('zip') }}</label>
                                            <input type="text" name="zip" class="form-control form_control"
                                                value="{{ @Auth::user()->address->zip }}">

                                        </div>

                                        <div class="col-md-6 mb-3">

                                            <label for="">{{ __('state') }}</label>
                                            <input type="text" name="state" class="form-control form_control"
                                                value="{{ @Auth::user()->address->state }}">

                                        </div>

                                    </div>
                                </div>
                                <button class="btn btn-main mt-2">{{ __('Update') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>


@endsection


@push('script')

    <script>
        'use strict'
        document.getElementById("imageUpload").onchange = function() {
            show();
        };

        function show() {
            if (event.target.files.length > 0) {
                var src = URL.createObjectURL(event.target.files[0]);
                var preview = document.getElementById("file-id-preview");
                preview.src = src;
                preview.style.display = "block";
                document.getElementById("file-id-preview").style.visibility = "visible";
            }
        }
    </script>




@endpush
