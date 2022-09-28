<div class="navbar-brand is-right">
  <a class="navbar-item mobile-aside-button">
    <span class="icon"><i class="mdi mdi-forwardburger mdi-24px"></i></span>
  </a>
  <a class="navbar-item --jb-navbar-menu-toggle" data-target="navbar-menu">
    <span class="icon"><i class="mdi mdi-dots-vertical mdi-24px"></i></span>
  </a>
</div>
<div class="navbar-menu" id="navbar-menu">
  <div class="navbar-end">
    <div class="navbar-item dropdown has-divider has-user-avatar">
      <a class="navbar-link">
        <div class="user-avatar">
          <img src="https://avatars.dicebear.com/v2/initials/john-doe.svg" alt="
              @if (strtolower(language()->getCode()) == 'en')
                  {{ auth()->user()->name }}
              @elseif (strtolower(language()->getCode()) == 'ar')
                  {{ auth()->user()->arabic_name }}
              @endif
          " class="rounded-full">
        </div>
        <div class="is-user-name">
          <span>
              @if (strtolower(language()->getCode()) == 'en')
                  {{ auth()->user()->name }}
              @elseif (strtolower(language()->getCode()) == 'ar')
                  {{ auth()->user()->arabic_name }}
              @endif
          </span>
        </div>
        <span class="icon"><i class="mdi mdi-chevron-down"></i></span>
      </a>
      <div class="navbar-dropdown"
      @if (strtolower(language()->getCode()) == 'ar')
        style="text-align: right"
      @endif
      >

        {{-- My Profile --}}
        @if (strtolower(language()->getCode()) == 'en')
          <a href="{{ Auth::user()->checkRole('Admin') ? route('MyProfile') : route('Technical.MyProfile') }}" class="navbar-item">
            <span class="icon"><i class="mdi mdi-account"></i></span>
            <span>{{ __('public.My Profile') }}</span>
        @elseif (strtolower(language()->getCode()) == 'ar')
          <a href="{{ Auth::user()->checkRole('Admin') ? route('MyProfile') : route('Technical.MyProfile') }}" style="display: inline-flex" class="navbar-item">
            <span>{{ __('public.My Profile') }}</span>
            <span class="icon right"><i class="mdi mdi-account"></i></span>
        @endif
        </a>

        <hr class="navbar-divider">

        {{-- Logout --}}
        @if (strtolower(language()->getCode()) == 'en')
          <a class="navbar-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <span class="icon"><i class="mdi mdi-logout"></i></span>
            <span>{{ __('auth.Log Out') }}</span>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        @elseif (strtolower(language()->getCode()) == 'ar')
          <a class="navbar-item" href="{{ route('logout') }}"  style="display: inline-flex" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <span>{{ __('auth.Log Out') }}</span>
            <span class="icon"><i class="mdi mdi-logout"></i></span>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        @endif
        </a>
      </div>
    </div>

    {{-- Language Switcher --}}
    <div class="navbar-item has-divider has-user-avatar">
      @if (strtolower(language()->getCode()) == 'en')
        <a class="dropdown-item" href="{{ language()->back('ar') }}">
            <img style="display: inline" src="{{ asset('storage/flags/'. language()->country('ar') .'.png') }}" alt="{{ 'العربية' }}" width="{{ config('language.flags.width') }}" /> &nbsp;
            {{ 'العربية' }}
        </a>
      @elseif (strtolower(language()->getCode()) == 'ar')
        <a class="dropdown-item" href="{{ language()->back('en') }}">
            <img style="display: inline" src="{{ asset('storage/flags/'. language()->country('en') .'.png') }}" alt="{{ 'English' }}" width="{{ config('language.flags.width') }}" /> &nbsp;
            {{ 'English' }}
        </a>
      @endif
    </div>
  </div>
</div>
