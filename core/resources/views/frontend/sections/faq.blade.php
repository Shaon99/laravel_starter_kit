@php
$content = content('faq.content');
$element = element('faq.element');

@endphp
<section class="faq2 py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="text-center">
                <div>
                    <h2><span class="font-weight-normal text-light">{{ @$content->data->title }}</h2>
                    <p class="text-center faq-des col-md-6 mx-auto">{{ @$content->data->short_description }}</p>
                </div>
            </div>
        </div>
        <div class="row mt-3">

            <div class="col-lg-8 col-md-12 mx-auto ">
                <div class="faq-accordion">
                    <div class="accordion" id="accordionExample">
                        @forelse ($element as $item)
                            <div class="accordion-item mb-3">
                                <h2 class="accordion-header" id="headingSix">
                                
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapse{{ $loop->iteration }}" aria-expanded="false"
                                        aria-controls="collapseSix">                                       
                                        {{ @$item->data->question }}
                                    </button>
                                </h2>
                                <div id="collapse{{ $loop->iteration }}" class="accordion-collapse collapse"
                                    aria-labelledby="headingSix" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                      <p>{{ @$item->data->answer }}</p> 
                                    </div>
                                </div>
                            </div>
                        @empty
                        @endforelse
                    </div>
                </div>
            </div>

        </div>
    </div>
    </div>
</section>
