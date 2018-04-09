<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="{{ route('home') }}">Aida</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
       
        <ul class="navbar-nav">
          
          <li class="nav-item {{ is_route('home') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('home') }}">{{ __('home') }} </a>
          </li>
    
          <li class="nav-item {{ is_route('contact') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('contact') }}">{{ __('contact') }}</a>
          </li>

          <li class="nav-item {{ is_route('private') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('private') }}">{{ __('private') }}</a>
          </li>
    
        </ul>

        <ul class="navbar-nav ml-auto">

            @if( $res->locales() )
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown">
                    Languages
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    @foreach( $res->locales() as $locale )
                    <a class="dropdown-item" href="{{ localization_url( $locale ) }}">{{ $locale }}</a>
                    @endforeach
                </div>
            </li>
            @endif

            @if( auth()->check() )

                <li class="nav-item">
                <a class="nav-link" href="{{ route('logout') }}">{{ __('logout') }}</a>
                </li>

                <li class="nav-item">
                <a class="nav-link" href="#">{{ auth()->user()->first_name }}</a>
                </li>

            @else

                <li class="nav-item">
                  <a class="nav-link" href="{{ route('login') }}">{{ __('login') }}</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ $res->facebook->login() }}">Facebook</a>
                </li>

            @endif

        </ul>
    
    </div>
</nav>