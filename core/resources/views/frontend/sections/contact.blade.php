@php
$content = content('contact.content');

@endphp
<section class="blog py-5">
    <div class="container">
        <iframe class="map" src="{{ @$general->map_link }}" frameborder="0" allowfullscreen></iframe>

        <div class="container">
            <div class="row mt-4 mb-2 hr-tag">
                <div class="col-md-4">
                    <div class="contact-box text-center">
                        <h4>{{ __('Location') }}</h4>
                        <address><i class="fa fa-map-marker"></i>
                            {{ @$content->data->location }}</address>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="contact-box text-center">
                        <h4>{{ __('Email') }}</h4>
                        <a href="mailto:#"> <i class="fa-solid fa-envelope"></i>
                            {{ @$content->data->email }}</a>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="contact-box text-center">
                        <h4>{{ __('Phone') }}</h4>

                        <a href="tel:#"><i class="fa fa-phone"></i>
                            {{ @$content->data->phone }}</a>
                    </div>
                </div>
                <hr class="mt-3 mb-4 mt-md-1">
            </div>


            <div class="touch-container row justify-content-center mb-3">
                <div class="col-md-9 col-lg-7">
                    <div class="text-center">
                        <h2 class="title mb-1 text-light">{{ __('Get In Touch') }}</h2>
                        <p class="lead faq-des">
                            {{ @$content->data->Get_in_touch_text }}
                        </p>

                    </div>

                    <form action="{{ route('contact') }}" method="POST" class="contact-form mb-2 reply">
                        @csrf
                        <div class="row">
                            <div class="col-sm-6 mb-3">
                                <input type="text" class="form-control" name="name" placeholder="Name *" required>
                            </div>

                            <div class="col-sm-6 mb-3">
                                <input type="email" class="form-control" name="email" placeholder="Email *" required>
                            </div>
                         
                        </div>

                        <input type="text" class="form-control" name="subject" placeholder="Subject">


                        <textarea class="form-control mt-3" cols="30" rows="4" name="message" required placeholder="Message *"></textarea>

                        <div class="text-center">
                            <button type="submit" class="btn secondary-btn mt-3 w-50">
                                <span>{{ __('SUBMIT') }}</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
