@php
$content = content('newsletter.content');

@endphp

<section class="subscribe-section ">
    <div class="container">   
    <div class="subscribe-el">
        <img src="{{ getFile('newsletter', @$content->data->image) }}" alt="image">
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 text-center">
                <div class="section-top">
                    <h2><span class="font-weight-normal text-light">{{ @$content->data->title }}</h2>
                    <p>{{ @$content->data->short_description }}</p>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <form class="subscribe-form" id="subscribe" method="POST">
                    <input type="text" name="email" class="form-control subscribe-email"
                        placeholder="Enter Email Here">
                    <button bt>{{ __('Subscribe') }} <i class="fas fa-paper-plane"></i></button>
                </form>
            </div>
        </div>
    </div>
    </div>
</section>