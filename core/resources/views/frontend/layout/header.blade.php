    <nav id="navbar" class="navbar navbar-expand-lg fixed-top">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">
                <img src="{{ getfile('logo', @$general->logo) }}" alt="logo" height="75" />
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa-solid fa-bars text-light"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav m-auto text-uppercase">
                    <li class="nav-item mt-2">
                        <a class="nav-link" 
                            href="{{ route('home') }}">{{ __('Home') }}</a>
                    </li>                   
                    @forelse ($pages as $page)
                        <li class="nav-item mt-2 "><a class="nav-link"
                                href="{{ route('pages', $page->slug) }}">{{ __($page->name) }}</a></li>
                    @empty
                    @endforelse
                    
                    @if (Auth::user())
                    <li class="nav-item mt-2">
                        <a href="{{ route('user.logout') }}"
                        class="nav-link"
                        type="submit">{{ __('Logout') }}</a>
                    </li>
                    @endif

                </ul>

                <form class="d-flex">

                    @if (Auth::user())
                        <a href="{{ route('user.dashboard') }}" class="btn btn-white  hover-btm-up-2"
                            type="submit">{{ __('Dashboard') }}</a>
                    @else
                        <a href="{{ route('user.login') }}" class="btn btn-white  hover-btm-up-2"
                            type="submit">{{ __('Login') }}</a>
                    @endif

                    <div>
                        <select class="form-control selectric select-style changeLang">
                            @foreach ($language_top as $top)
                                <option value="{{ $top->short_code }}"
                                    {{ session('locale') == $top->short_code ? 'selected' : '' }}>
                                    {{ __(ucwords($top->name)) }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </form>



            </div>
        </div>
    </nav>
