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


    <section class="pricing">
        <div class="container py-3">
                <div class="row justify-content-center">
                    <div class="col-md-6">                       
                        <div class="card bg-dark ">
                        <div class="card-body">
                            <form action="{{ route('user.update.password') }}" method="POST">
                                @csrf                       
                            <div class="form-group">
                                <p  class="text-light mb-2">{{ __('Old Password') }}</p>
                                <input type="password" class="form-control" name="oldpassword"
                                    placeholder="{{ __('Enter Old Password') }}">
                            </div>

                            <div class="form-group">
                                <p  class="text-light mt-2 mb-2">{{ __('New Password') }}</p>
                                <input type="password" class="form-control" name="password"
                                    placeholder="{{ __('Enter New Password') }}">
                            </div>

                            <div class="form-group">
                                <p  class="text-light mt-2 mb-2">{{ __('Confirm Password') }}</p>
                                <input type="password" class="form-control" name="password_confirmation"
                                    placeholder="{{ __('Confirm Password') }}">
                            </div>                           
                           
                            <div class="row mt-4">
                                <div class="col-xs-12 d-grid gap-2">
                                    <button class="btn change-btn"
                                        type="submit">{{ __('Reset Password') }}</button>
                                </div>
                            </div>                        


                        </form>

                        </div>

                </div>
            </div>
        </div>
        
    </section>




@endsection
