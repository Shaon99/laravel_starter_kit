@php
$content = content('about.content');
@endphp

<section class="faq py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="text-center">
                <div>
                    <h2><span class="font-weight-normal text-light text-capitalize">{{ @$content->data->title }}</h2>
                    <p class="text-center faq-des col-md-6 mx-auto">{{ @$content->data->short_description }}</p>
                </div>
            </div>
        </div>
       
        <div class="row py-5">
            <div class="col-md-6"  >
                <img src="{{ getFile('about', @$content->data->image) }}" class="img-fluid rounded" width="100%">
            </div>
            <div class="col-lg-6 col-md-6 text-justify about-description">
                    <?php
                    echo clean(@$content->data->description);
                    ?>
               
            </div>

        </div>
    </div>
</section>
