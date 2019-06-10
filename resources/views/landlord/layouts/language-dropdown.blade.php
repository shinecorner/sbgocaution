<div class="position-absolute">
  <div class="language-dropdown">
      <div class="btn-group">
            <a href="#" data-toggle="dropdown" class="btn dropdown-toggle">
                <span class="caret"></span> &nbsp;
                <img class="mx-15" id="selected_img" src="{{asset('/static/flag-icon-frontend/'.app()->getLocale().'.gif') }}" alt="" /><span id="selected_lang">{{ __('general.language.'.strtoupper(app()->getLocale())) }}</span>
              </a>
              <ul class="lang-block dropdown-menu" dir="ltr">
                @foreach(LaravelLocalization::getSupportedLocales() as $lang => $properties)
                  <li data-content="{{$lang}}"><a href="{{LaravelLocalization::getLocalizedURL($lang)}}"><img class="mx-15 mR-5" src="{{asset('/static/flag-icon-frontend/'.$lang.'.gif')}}" alt="" /> {{ __('general.language.'.strtoupper($lang)) }}</a></li>
                @endforeach
              </ul>
      </div>
  </div>
</div>
