@extends('frontend.layout.master')


@section('content')
    <section class="breadcrumbs" style="background-image: url({{ getFile('breadcrumbs', @$general->breadcrumbs) }});">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center text-capitalize">
                <h2>{{ __($pageTitle) }}</h2>
                <ol>
                    <li><a href="{{ route('home') }}">{{ __('Home') }}</a></li>
                    <li>{{ __($pageTitle) }}</li>
                </ol>
            </div>
        </div>
    </section>
    <section class="user-profile">
        <div class="container">

            <center>
                <div class="dashboard-media mt-3">

                    @if (Auth::user()->image)
                        <img class="auth-user-img" src="{{ getfile('user', Auth::user()->image) }}" alt="User">
                    @else
                        <img class="auth-user-img" src="{{ getfile('default', @$general->default_image) }}"
                            alt="User">
                    @endif

                </div>
                <div class="text-capitalize p-2">
                    <h4 class="text-light">{{ Auth::user()->fullname }}</h4>
                </div>
            </center>
            <div class="col-md-12 mt-3 mb-5">

                <ul class="nav nav-tabs nav-justified text-capitalize mb-3 nav-tab-design">
                    <li class="nav-item">
                        <a class="nav-link active" data-bs-toggle="tab" href="#dashboard">{{ __('Dashboard') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#profile">{{ __('Profile') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#download">{{ __('Resource') }}</a>
                    </li>
                </ul>

                <div class="tab-content">
                    <div class="tab-pane fade show active" id="dashboard">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="card p-2 membership-card-bg">
                                    <div class="card-content">
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between">
                                                <div>
                                                    <i class="fa-solid fa-gem text-dark"></i>
                                                </div>
                                                <div>
                                                    <h5 class="text-dark mx-4">{{ __('Current Membership') }}</h5>
                                                    <p class="d-box-one-amount1 text-light">0
                                                        <span class="pulse badge badge-pill bg-left text-white">0</span>
                                                    </p>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card p-2 spent-card">
                                    <div class="card-content">
                                        <div class="card-body ">
                                            <div class="d-flex justify-content-between">
                                                <div>
                                                    <i class="fa-solid fa-money-bill-wave text-dark"></i>
                                                </div>
                                                <div>
                                                    <h5 class="text-dark">{{ __('Total Spent Amount') }}</h6>
                                                        <p class="d-box-one-amount text-light">0
                                                        </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="card p-2 resource-card">
                                    <div class="card-content">
                                        <div class="card-body ">
                                            <div class="d-flex justify-content-between">
                                                <div>
                                                    <i class="fa-solid fa-file-arrow-down"></i>
                                                </div>
                                                <div>
                                                    <h5 class="text-dark">{{ __('Total Resource') }}</h5>

                                                    <p class="d-box-one-amount text-light">0
                                                    </p>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="card mt-5 p-0">
                                    <div class="card-content">
                                        <div class="card-body">
                                            <h4 class="text-light">{{ __('Purchase History') }}</h4>
                                            <table class="history table py-2">
                                                <thead>
                                                    <tr>
                                                        <th>{{ __('Membership Name') }}</th>
                                                        <th>{{ __('Activation Date') }}</th>
                                                        <th>{{ __('Expire Date') }}</th>
                                                        <th>{{ __('Recurring') }}</th>
                                                        <th>{{ __('Payslip') }}</th>
                                                    </tr>
                                                </thead>



                                            </table>

                                            {{-- {{ $allmembership->links('frontend.pages.paginate') }} --}}

                                        </div>

                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                    <div class="tab-pane fade" id="profile">
                        <div class="d-flex justify-content-center">
                            <div class="col-md-12">
                                <div class="profile-update">
                                    <form action="{{ route('user.profileupdate') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="w-50 img-choose-div m-auto h-75">

                                                    @if (Auth::user()->image)
                                                        <img class="file-id-preview" id="file-id-preview"
                                                            src="{{ getFile('user', @Auth::user()->image) }}"
                                                            alt="pp">
                                                    @else
                                                        <img class="file-id-preview" id="file-id-preview"
                                                            src="{{ getfile('default', @$general->default_image) }}"
                                                            alt="User">
                                                    @endif

                                                    <input type="file" name="image" id="imageUpload" class="upload"
                                                        accept=".png, .jpg, .jpeg" hidden>

                                                    <label for="imageUpload"
                                                        class="change-btn text-center">{{ _('Choose File') }}</label>

                                                </div>

                                                <div class="w-50 img-choose-div m-auto h-75 mt-5">
                                                    <a href="{{ route('user.change.password') }}"
                                                        class="btn change-btn ">{{ __('Change Password') }}</a>
                                                </div>


                                            </div>
                                            <div class="col-md-8 card p-3">
                                                <div class="row">
                                                    <div class="col-md-6 mb-2">
                                                        <label>{{ __('First Name') }}</label>
                                                        <input type="text" class="form-control" name="fname"
                                                            value="{{ @Auth::user()->fname }}"
                                                            placeholder="{{ __('Enter First Name') }}">
                                                    </div>
                                                    <div class="col-md-6 mb-2">
                                                        <label>{{ __('Last Name') }}</label>
                                                        <input type="text" class="form-control" name="lname"
                                                            value="{{ @Auth::user()->lname }}"
                                                            placeholder="{{ __('Enter Last Name') }}">
                                                    </div>


                                                    <div class="col-md-6 mb-2">
                                                        <label>{{ __('Email') }}</label>
                                                        <input type="email" class="form-control" name="email"
                                                            value="{{ @Auth::user()->email }}"
                                                            placeholder="{{ __('Enter Email') }}">
                                                    </div>

                                                    <div class="col-md-6 mb-2">
                                                        <label>{{ __('Phone') }}</label>
                                                        <input type="text" class="form-control" name="phone"
                                                            value="{{ @Auth::user()->phone }}"
                                                            placeholder="{{ __('Enter Phone') }}">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-6 mb-2">
                                                        <label>{{ __('Country') }}</label>
                                                        <input type="text" name="country" class="form-control"
                                                            placeholder="country"
                                                            value="{{ @Auth::user()->address->country }}">
                                                    </div>
                                                    <div class="col-md-6 mb-2">

                                                        <label for="">{{ __('City') }}</label>
                                                        <input type="text" name="city"
                                                            class="form-control form_control" placeholder="city"
                                                            value="{{ @Auth::user()->address->city }}">

                                                    </div>

                                                    <div class="col-md-6 mb-2">
                                                        <label for="">{{ __('Zip') }}</label>
                                                        <input type="text" name="zip"
                                                            class="form-control form_control" placeholder="zip"
                                                            value="{{ @Auth::user()->address->zip }}">
                                                    </div>

                                                    <div class="col-md-6 mb-2">
                                                        <label for="">{{ __('State') }}</label>
                                                        <input type="text" name="state"
                                                            class="form-control form_control" placeholder="state"
                                                            value="{{ @Auth::user()->address->state }}">
                                                    </div>

                                                    <div class="d-grid gap-2 mt-3">
                                                        <button
                                                            class="btn change-btn btn-block">{{ __('Update') }}</button>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="download">
                        <div class="row">


                        </div>

                        {{-- {{ $allAccessFile->links('frontend.pages.paginate') }} --}}

                        <div class="col-md-12">
                            <p class="text-center">{{ __('Membership Expire Or Not Found') }}</p>

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
