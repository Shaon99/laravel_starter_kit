@extends('backend.layout.master')
@push('style')
    <link rel="stylesheet"
        href="{{ asset('asset/admin/modules/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.css') }}" />
    <style>
        .sp-replacer {
            padding: 0;
            border: 1px solid rgba(0, 0, 0, .125);
            border-radius: 5px 0 0 5px;
            border-right: none;
        }

        .sp-preview {
            width: 100px;
            height: 46px;
            border: 0;
        }

        .sp-preview-inner {
            width: 110px;
        }

        .sp-dd {
            display: none;
        }

        .select2-container .select2-selection--single {
            height: 44px;
        }

        .select2-container--default .select2-selection--single .select2-selection__rendered {
            line-height: 43px;
        }

        .select2-container--default .select2-selection--single .select2-selection__arrow {
            height: 43px;
        }
    </style>
@endpush
@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>{{ __($pageTitle) }}</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('admin.home') }}">{{ __('Dashboard') }}</a>
                </div>
                <div class="breadcrumb-item">{{ __($pageTitle) }}</div>
            </div>
        </div>

        


        <div class="section-body ">

            <div class="row">
                <div class="col-md-12 stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <form action="" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="sitename">{{ __('Site Name') }}</label>
                                        <input type="text" name="sitename" placeholder="@lang('site name')"
                                            class="form-control form_control" value="{{ @$general->sitename }}">
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="site_currency">{{ __('Site Currency') }}</label>
                                        <input type="text" name="site_currency" class="form-control"
                                            placeholder="Enter Site Currency"
                                            value="{{ @$general->site_currency ?? '' }}">
                                    </div>                                  


                                    <div class="form-group col-md-6">
                                        <label for="sitename">{{ __('Copyright Text') }}</label>
                                        <input type="text" name="copyright" placeholder="@lang('Copyright Text')"
                                            class="form-control form_control" value="{{ @$general->copyright }}">
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label>{{ __('Timezone') }}</label>
                                        <input type="text" name="timezone" placeholder="timezone"
                                            class="form-control form_control" value="{{ @$general->timezone }}">
                                    </div>
                                    
                                    
                                    <div class="form-group col-md-6">
                                        <label for="" class="w-100">{{ __('Email Verification On') }} </label>
                                        <div class="custom-switch custom-switch-label-onoff">
                                            <input class="custom-switch-input" id="ev" type="checkbox"
                                                name="is_email_verification_on"
                                                {{ @$general->is_email_verification_on ? 'checked' : '' }}>
                                            <label class="custom-switch-btn" for="ev"></label>
                                        </div>
                                    </div>
                                    

                                    <div class="form-group col-md-6">
                                        <label for="" class="w-100">{{ __('User Registration') }} </label>
                                        <div class="custom-switch custom-switch-label-onoff">
                                            <input class="custom-switch-input" id="ug_r" type="checkbox" name="user_reg"
                                                {{ @$general->user_reg ? 'checked' : '' }}>
                                            <label class="custom-switch-btn" for="ug_r"></label>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-12">
                                        <label for="sitename">{{ __('Map Link') }}</label>
                                        <input type="text" name="map_link" placeholder="@lang('Map Link')"
                                            class="form-control form_control" value="{{ @$general->map_link }}">
                                    </div>

                                 

                                    <div class="form-group col-md-4 mb-3">
                                        <label class="col-form-label">{{ __('Site logo') }}</label>

                                        <div id="image-preview" class="image-preview"
                                            style="background-image:url({{ getFile('logo', @$general->logo) }});">
                                            <label for="image-upload" id="image-label">{{ __('Choose File') }}</label>
                                            <input type="file" name="logo" id="image-upload" />
                                        </div>

                                    </div>

                                    <div class="form-group col-md-4 mb-3">
                                        <label class="col-form-label">{{ __('Favicon Icon') }}</label>
                                        <div id="image-preview-icon" class="image-preview"
                                            style="background-image:url({{ getFile('icon', @$general->favicon) }});">
                                            <label for="image-upload-icon"
                                                id="image-label-icon">{{ __('Choose File') }}</label>
                                            <input type="file" name="icon" id="image-upload-icon" />
                                        </div>
                                    </div>

                                    <div class="form-group col-md-4 mb-3">
                                        <label class="col-form-label">{{ __('Admin Login Image') }}</label>
                                        <div id="image-preview-login" class="image-preview"
                                            style="background-image:url({{ getFile('login', @$general->login_image) }});">
                                            <label for="image-upload-login"
                                                id="image-label-login">{{ __('Choose File') }}</label>
                                            <input type="file" name="login_image" id="image-upload-login" />
                                        </div>
                                    </div>


                                    <div class="form-group col-md-4 mb-3">
                                        <label class="col-form-label">{{ __('Frontend Login Background Image') }}</label>
                                        <div id="image-preview-login_image" class="image-preview"
                                            style="background-image:url({{ getFile('frontendlogin', @$general->frontend_login_image) }});">
                                            <label for="image-upload-login_image"
                                                id="image-label-login_image">{{ __('Choose File') }}</label>
                                            <input type="file" name="frontend_login_image" id="image-upload-login_image" />
                                        </div>
                                    </div>

                                    <div class="form-group col-md-4 mb-3">
                                        <label class="col-form-label">{{ __('Frontend Breadcrumbs Image') }}</label>
                                        <div id="image-preview-breadcrumbs" class="image-preview"
                                            style="background-image:url({{ getFile('breadcrumbs', @$general->breadcrumbs) }});">
                                            <label for="image-upload-breadcrumbs"
                                                id="image-label-breadcrumbs">{{ __('Choose File') }}</label>
                                            <input type="file" name="breadcrumbs" id="image-upload-breadcrumbs" />
                                        </div>
                                    </div>


                                    <div class="form-group col-md-4 mb-3">
                                        <label class="col-form-label">{{ __('Default Image') }}</label>
                                        <div id="image-preview-default" class="image-preview"
                                            style="background-image:url({{ getFile('default', @$general->default_image) }});">
                                            <label for="image-upload-default"
                                                id="image-label-default">{{ __('Choose File') }}</label>
                                            <input type="file" name="default" id="image-upload-default" />
                                        </div>
                                    </div>




                                    <div class="form-group col-md-12">

                                        <button type="submit"
                                            class="btn btn-primary float-right">{{ __('Update General Setting') }}</button>

                                    </div>

                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        </section>
    </div>
@endsection


@push('script')
    <script src="{{ asset('asset/admin/modules/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js') }}"></script>
    <script>
        $(function() {

            'use strict'

            $('#cp1').colorpicker();


            $.uploadPreview({
                input_field: "#image-upload",
                preview_box: "#image-preview",
                label_field: "#image-label",
                label_default: "Choose File",
                label_selected: "Update Image",
                no_label: false,
                success_callback: null
            });

            $.uploadPreview({
                input_field: "#image-upload-icon",
                preview_box: "#image-preview-icon",
                label_field: "#image-label-icon",
                label_default: "Choose File",
                label_selected: "Update Image",
                no_label: false,
                success_callback: null
            });

            $.uploadPreview({
                input_field: "#image-upload-login",
                preview_box: "#image-preview-login",
                label_field: "#image-label-login",
                label_default: "Choose File",
                label_selected: "Update Image",
                no_label: false,
                success_callback: null
            });

            $.uploadPreview({
                input_field: "#image-upload-login_image",
                preview_box: "#image-preview-login_image",
                label_field: "#image-label-login_image",
                label_default: "Choose File",
                label_selected: "Update Image",
                no_label: false,
                success_callback: null
            });

            $.uploadPreview({
                input_field: "#image-upload-breadcrumbs",
                preview_box: "#image-preview-breadcrumbs",
                label_field: "#image-label-breadcrumbs",
                label_default: "Choose File",
                label_selected: "Update Image",
                no_label: false,
                success_callback: null
            });

            $.uploadPreview({
                input_field: "#image-upload-main",
                preview_box: "#image-preview-main",
                label_field: "#image-label-main",
                label_default: "Choose File",
                label_selected: "Update Image",
                no_label: false,
                success_callback: null
            });

            $.uploadPreview({
                input_field: "#image-upload-default",
                preview_box: "#image-preview-default",
                label_field: "#image-label-default",
                label_default: "Choose File",
                label_selected: "Update Image",
                no_label: false,
                success_callback: null
            });
        })
    </script>
@endpush
