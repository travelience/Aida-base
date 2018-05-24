<div class="navbar">
    <div class="navbar-logo">
        <span class="text-xl tracking-tight">Aida</span>
    </div>

    <div class="navbar-menu lg:flex lg:items-center lg:w-auto">
        <div class="text-sm lg:flex-grow">

            <a href="{{ route('home') }}" class="navbar-item lg:inline-block lg:mt-0 {{ is_route('home') ? 'navbar-item-active' : '' }}">
                {{ __('home') }}
            </a>

            <a href="{{ route('contact') }}" class="navbar-item lg:inline-block lg:mt-0 {{ is_route('contact') ? 'navbar-item-active' : '' }}">
                {{ __('contact') }}
            </a>

            <a href="{{ route('private') }}" class="navbar-item lg:inline-block lg:mt-0 {{ is_route('private') ? 'navbar-item-active' : '' }}">
                {{ __('private') }}
            </a>

        </div>

        <div>
            @if( auth()->check() )

                <a href="{{ route('logout') }}" class="navbar-item lg:inline-block lg:mt-0">
                    {{ __('logout') }}
                </a>

                <a href="#" class="bnavbar-item">
                    {{ auth()->user()->first_name }}
                </a>
            @else
                <a href="{{ route('login') }}" class="navbar-item lg:inline-block lg:mt-0 {{ is_route('login') ? 'navbar-item-active' : '' }}">
                    {{ __('login') }}
                </a>

                <a href="{{ $res->facebook->login() }}" class="navbar-item lg:inline-block lg:mt-0">
                    Facebook
                </a>     
            @endif
        </div>
    </div>
</div>
