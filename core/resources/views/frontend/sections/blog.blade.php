@php
$content = content('blog.content');
$elements = App\Models\SectionData::where('key', 'blog.element')
    ->latest()
    ->limit(6)
    ->get();

@endphp
<section class="blog py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="text-center">
                <div>
                    <h2><span class="font-weight-normal text-light">{{ @$content->data->title }}</h2>
                    <p class="text-center faq-des col-md-6 mx-auto">{{ @$content->data->short_description }}</p>
                </div>
            </div>
        </div>
        <div class="row">
            @forelse ($elements as $element)
                @php
                    $comment = App\Models\Comment::where('blog_id', $element->id)->count();
                @endphp
                
                <div class="col-lg-4 col-md-6 mb-3">
                    <a href="{{ route('blog', [@$element->id, Str::slug(@$element->data->title)]) }}">

                        <div class="blog-card"
                            style="background: url({{ getFile('blog', @$element->data->image) }})  no-repeat;">
                            <div class="title-content">
                                <h3>{{ @$element->data->title }}</h3>
                                <hr />
                                <div class="intro">{{ @$element->data->tag }}</div>
                            </div>
                            <div class="card-info">
                                {{ Str::limit(@$element->data->short_description, 200, '...') }}
                            </div>
                            <div class="utility-info">
                                <ul class="utility-list">
                                    <li class="comments">{{ $comment }}</li>
                                    <li class="date">{{ @$element->created_at->format('d.m.Y') }}</li>
                                </ul>
                            </div>

                            <div class="gradient-overlay"></div>
                            <div class="color-overlay"></div>
                        </div>
                    </a>
                </div>

            @empty
                <p>{{ __('No Data Found') }}</p>
            @endforelse


        </div>
    </div>
</section>
