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
    <section class="blog">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="text-center mt-3 text-capitalize">{{ __(@$data->data->title) }}</h4>
                    <div class="p-3 service-details">
                        <?php
                        echo clean(@$data->data->description);
                        ?>

                    </div>

                </div>

            </div>
        </div>


    </section>
@endsection
