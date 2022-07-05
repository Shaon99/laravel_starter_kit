@extends('backend.layout.master')


@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>{{ __($pageTitle) }}</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('admin.user') }}">{{ __('User List') }}</a>
                    </div>
                    <div class="breadcrumb-item">{{ __($pageTitle) }}</div>
                </div>
            </div>


            <div class="section-body card p-3 shadow">

                <div class="row">

                    <div class="col-md-3">
                        <div class="card shadow">
                            @if ($user->image)
                                <img src="{{ getFile('user', $user->image) }}" class="w-100" alt="img">
                            @else
                                <img src="{{ getFile('default', @$general->default_image) }}" alt="img">
                            @endif


                            <div class="container my-3">
                                <h4>{{ $user->fullname }}</h4>
                                <p class="title">{{ $user->designation }}</p>
                                <p class="title">{{ $user->email }}</p>
                                <a href="#"
                                    class="btn btn-primary btn-block sendMail">{{ __('Send Mail To user') }}</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-9">

                        <form action="{{ route('admin.user.update', $user->id) }}" method="post">
                            @csrf

                            <div class="row">
                                <div class="form-group col-md-6 mb-3">
                                    <label for="">{{ __('First Name') }}</label>
                                    <input type="text" name="fname" class="form-control" value="{{ $user->fname }}">
                                </div>

                                <div class="form-group col-md-6 mb-3">

                                    <label for="">{{ __('Last Name') }}</label>
                                    <input type="text" name="lname" class="form-control" value="{{ $user->lname }}">

                                </div>

                                <div class="form-group col-md-6 mb-3 ">
                                    <label>{{ __('Phone') }}</label>
                                    <input type="text" name="phone" class="form-control"
                                        value="{{ @$user->phone }}">
                                </div>

                                <div class="form-group col-md-6 mb-3 ">
                                    <label>{{ __('Email') }}</label>
                                    <input type="text" name="email" class="form-control"
                                        value="{{ @$user->email }}">
                                </div>


                                <div class="form-group col-md-4 mb-3 ">
                                    <label>{{ __('Country') }}</label>
                                    <input type="text" name="country" class="form-control"
                                        value="{{ @$user->address->country }}">
                                </div>

                                <div class="form-group col-md-4 mb-3">

                                    <label for="">{{ __('City') }}</label>
                                    <input type="text" name="city" class="form-control form_control"
                                        value="{{ @$user->address->city }}">

                                </div>

                                <div class="form-group col-md-4 mb-3">

                                    <label for="">{{ __('Zip') }}</label>
                                    <input type="text" name="zip" class="form-control form_control"
                                        value="{{ @$user->address->zip }}">

                                </div>

                                <div class="form-group col-md-6 mb-3">
                                    <label for="">{{ __('State') }}</label>
                                    <input type="text" name="state" class="form-control form_control"
                                        value="{{ @$user->address->state }}">

                                </div>

                                <div class="form-group col-md-6 mb-3">

                                    <label for="">{{ 'Status' }}</label>
                                    <select name="status" id="" class="form-control selectric">

                                        <option value="0" {{ $user->status == 0 ? 'selected' : '' }}>
                                            {{ 'Inactive' }}</option>
                                        <option value="1" {{ $user->status == 1 ? 'selected' : '' }}>
                                            {{ 'Active' }}</option>

                                    </select>

                                </div>

                            </div>
                    </div>
                    <div class="col-md-12 text-right p-3">
                        <button type="submit" class="btn btn-primary w-25 p-2">{{ 'Submit' }}</button>
                    </div>
                    </form>

                </div>

            </div>
        </section>
    </div>



    <div class="modal fade" tabindex="-1" role="dialog" id="mail">
        <div class="modal-dialog" role="document">
            <form action="{{ route('admin.user.mail', $user->id) }}" method="post">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">{{ __('Send Mail to user') }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">

                            <label for="">{{ __('Subject') }}</label>

                            <input type="text" name="subject" class="form-control">

                        </div>

                        <div class="form-group">

                            <label for="">{{ __('Message') }}</label>

                            <textarea name="message" id="" cols="30" rows="10" class="form-control summernote"></textarea>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">{{ __('Send Mail') }}</button>
                        <button type="button" class="btn btn-secondary"
                            data-dismiss="modal">{{ __('Close') }}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection


@push('script')
    <script>
        'use strict'

        $(function() {
            $('.sendMail').on('click', function(e) {
                e.preventDefault();

                const modal = $('#mail');

                modal.modal('show');
            })

            $('#country option').each(function(index) {

                let country = "{{ @$user->address->country }}"

                if ($(this).val() == country) {
                    $(this).attr('selected', 'selected')
                }


            })
        })
    </script>
@endpush
