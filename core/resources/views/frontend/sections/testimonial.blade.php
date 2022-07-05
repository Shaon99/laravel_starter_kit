@php
$content = content('testimonial.content');
$elements = App\Models\SectionData::where('key', 'testimonial.element')
    ->latest()
    ->limit(9)
    ->get();
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
        <div class="row mt-4 multiple-items">
            @forelse ($elements as $element)
                <div class="col-lg-3 col-md-3 px-3 mt-1">
                    <div class="card mt-5 mb-5">
                        <div class="client-review">
                            <img class="user-img" src="{{ getFile('testimonial', @$element->data->image) }}"
                                alt="img">
                            <h4>{{ @$element->data->clientname }}</h4>
                            <p>{{ @$element->data->designation }}</p>
                            <blockquote >
                                {{ @$element->data->answer }}
                            </blockquote>
                        </div>
                    </div>
                </div>

            @empty
                <p>{{ __('No Data Found') }}</p>
            @endforelse


        </div>
    </div>
</section>
