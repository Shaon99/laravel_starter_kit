 @php
     $content = content('footer.content');
     $element = element('footer.element');
     $contact = content('contact.content');
     $serviceElements = element('service.element');
     
 @endphp

 <section class="footer">
     <div class="container">

         <div class="row">
             <div class="col-md-5">
                 <a href="{{ route('home') }}">
                     <img src="{{ getfile('footer', @$content->data->footer_logo) }}" alt="logo" height="75" />

                 </a>
                 <ul>
                     <li>
                         <p class="pt-1 des w-100">{{ @$content->data->footer_short_description }}</p>
                     </li>
                     <li class="d-flex social-icons">

                         @forelse ($element as $item)
                             <a href="{{ @$item->data->social_link }}">
                                 <i class="{{ @$item->data->social_icon }}"></i>
                             </a>
                         @empty
                         @endforelse


                     </li>


                 </ul>
             </div>

           


             <div class="col-md-3 service-ml">
                 <h4 class="margin">{{ __('Our Services') }}</h4>
                 <ul class="footer-page margin py-1 text-capitalize">
                     @foreach ($serviceElements as $serviceelement)
                         <li> <a
                                 href="{{ route('service', [@$serviceelement->id, Str::slug(@$serviceelement->data->slug)]) }}"><i
                                     class="fas fa-chevron-right r"></i> {{ __(@$serviceelement->data->title) }}</a>
                         </li>
                     @endforeach


                 </ul>

             </div>

            

             <div class="col-md-4 contact">
                 <h4 class="margin">{{ __('Location') }}</h4>
                 <p class="mt-lg-3 margin text-capitalize">
                     <i class="fa fa-map-marker"></i> {{ @$contact->data->location }}
                 </p>
                 <p class="mt-lg-3 margin">
                     <i class="fa-solid fa-envelope "></i>{{ @$contact->data->email }}
                 </p>
                 <p class="mt-lg-3 margin">
                     <i class="fa fa-phone"></i>{{ @$contact->data->phone }}
                 </p>

             </div>

             <div class="footer-info mt-5 py-3 text-lowercase">
                 {{ @$general->copyright }}
             </div>

         </div>
     </div>
 </section>
