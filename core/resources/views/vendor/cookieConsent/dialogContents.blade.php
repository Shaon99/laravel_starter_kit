
<div class="js-cookie-consent cookie-consent cookie-modal">

    <div class="cookies-card__icon">
        <i class="fas fa-cookie-bite"></i>
      </div>

    <span class="cookie-consent__message">
        {{__(@$general->cookie_text)}}
    </span>

    <div class="d-flex">
        <button class="js-cookie-consent-agree cookie-consent__agree btn">
            {{ __(@$general->button_text) }}
        </button>       
    
        <button class="js-cookie-consent-cancel cookie-consent__cancel btn mx-2">
            {{ __('Cancel') }}
        </button>
    </div>
  

</div>




