@php
$content = content('banner.content');
@endphp

<!-- ======= Banner Section ======= -->
<section class="banner-section has-img"
    style="background-image: url({{ getFile('banner', @$content->data->image) }});">

    <div class="container">
        <div class="row">
            <div class="col-xxl-6 col-xl-7 col-lg-8 text-lg-start text-center">
                <h2 class="banner-title">{{ __(@$content->data->title) }}
                    <span class="typing">{{ @$content->data->color_text }}</span>
                </h2>
                <p>{{ @$content->data->short_description }}</p>
                <div class="button-des mt-4">
                    <a href="{{ route('user.register') }}" class="cmn-btn btn  hover-btm-up-2"
                        type="submit">{{ @$content->data->button_text }}</a>
                </div>
            </div>
        </div>
    </div>

</section>
<!-- End Banner -->
