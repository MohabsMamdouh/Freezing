<div class="aside-tools"
@if (strtolower(language()->getCode()) == 'ar')
style="text-align: right;display: grid;"
@endif
>
    <div>
        <b class="font-black">
            @if (strtolower(language()->getCode()) == 'en')
                {{ $titleEn }}
            @elseif (strtolower(language()->getCode()) == 'ar')
                {{ $titleAr }}
            @endif    
        </b>
    </div>
</div>
<div class="menu is-menu-main">
    <p class="menu-label">{{ __('public.General') }}</p>
    <ul class="menu-list">
        <li
        @if (Route::currentRouteName() == 'dashboard')
            class="active"
        @endif
        >
            <a href="{{ route('dashboard') }}">
                <span class="icon"><i class="mdi mdi-desktop-mac"></i></span>
                <span class="menu-item-label"
                @if (strtolower(language()->getCode()) == 'ar')
                    style="text-align: right;padding-right: 30px"
                @endif
                >
                    {{ __('dashboard.Dashboard') }}
                </span>
            </a>
        </li>
    </ul>
    <p class="menu-label">{{ __('public.Perspective') }}</p>
    <ul class="menu-list">
        <li class="--set-active-tables-html
        @if (Route::currentRouteName() == 'settings')
            active
        @endif
        ">
            <a href="{{ route('settings', ['id' => 1]) }}">
                <span class="icon"><i class="mdi mdi-settings"></i></span>
                <span class="menu-item-label"
                @if (strtolower(language()->getCode()) == 'ar')
                    style="text-align: right;padding-right: 30px"
                @endif
                >{{ __('public.Settings') }}</span>
            </a>
        </li>
        <li class="--set-active-forms-html
        {{-- @if (Route::currentRouteName() == 'dashboard')
            active
        @endif --}}
        ">
            <a href="{{ route('CreateFeedback') }}">
                <span class="icon"><i class="mdi mdi-square-edit-outline"></i></span>
                <span class="menu-item-label"
                @if (strtolower(language()->getCode()) == 'ar')
                    style="text-align: right;padding-right: 30px"
                @endif
                >{{ __('public.Feedbacks') }}</span>
            </a>
        </li>
        <li class="--set-active-profile-html
        @if (Route::currentRouteName() == 'technicals')
            active
        @endif
        ">
            <a href="{{ route('technicals') }}">
                <span class="icon"><i class="mdi mdi-account-circle"></i></span>
                <span class="menu-item-label"
                @if (strtolower(language()->getCode()) == 'ar')
                    style="text-align: right;padding-right: 30px"
                @endif
                >{{ __('public.Technicals') }}</span>
            </a>
        </li>
        <li>
            <a class="dropdown">
                <span class="icon"><i class="mdi mdi-view-list"></i></span>
                <span class="menu-item-label"
                @if (strtolower(language()->getCode()) == 'ar')
                    style="text-align: right;padding-right: 30px"
                @endif
                >{{ __('public.Jobs') }}</span>
            </a>
            <ul>
                <li>
                    <a href="{{ route('NewJob', ['status' => 0]) }}"
                    @if (strtolower(language()->getCode()) == 'ar')
                        style="display: grid;"
                    @endif
                    @if (Route::currentRouteName() == 'technicals')
                        class="active"
                    @endif
                    >
                        <span
                        @if (strtolower(language()->getCode()) == 'ar')
                            style="text-align: right;padding-right: 30px"
                        @endif
                        >{{ __('public.New Jobs') }}</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('CurrentJob', ['status' => 1]) }}"
                    @if (strtolower(language()->getCode()) == 'ar')
                        style="display: grid;"
                    @endif
                    @if (Route::currentRouteName() == 'technicals')
                        class="active"
                    @endif
                    >
                        <span
                        @if (strtolower(language()->getCode()) == 'ar')
                            style="text-align: right;padding-right: 30px"
                        @endif
                        >{{ __('public.Current Jobs') }}</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('FinishJob', ['status' => 2]) }}"
                    @if (strtolower(language()->getCode()) == 'ar')
                        style="display: grid;"
                    @endif
                    @if (Route::currentRouteName() == 'technicals')
                        class="active"
                    @endif
                    >
                        <span
                        @if (strtolower(language()->getCode()) == 'ar')
                            style="text-align: right;padding-right: 30px"
                        @endif
                        >{{ __('public.Finished Jobs') }}</span>

                    </a>
                </li>
                <li>
                    <a href="{{ route('CancelJob', ['status' => 3]) }}"
                    @if (strtolower(language()->getCode()) == 'ar')
                        style="display: grid;"
                    @endif
                    @if (Route::currentRouteName() == 'technicals')
                        class="active"
                    @endif
                    >
                        <span
                        @if (strtolower(language()->getCode()) == 'ar')
                            style="text-align: right;padding-right: 30px"
                        @endif
                        >{{ __('public.Canceled Jobs')  }}</span>
                    </a>
                </li>
            </ul>
        </li>
        <li>
            <a class="dropdown">
                <span class="icon"><i class="mdi mdi-view-list"></i></span>
                <span class="menu-item-label"
                @if (strtolower(language()->getCode()) == 'ar')
                    style="text-align: right;padding-right: 30px"
                @endif
                >{{ __('public.Pricing Plan') }}</span>
            </a>
            <ul>
                @foreach ($price as $f)
                    <li>
                        <a href="{{ route('ShowPlan', ['id' => $f->id]) }}"
                            @if (strtolower(language()->getCode()) == 'ar')
                                style="display: grid;"
                            @endif
                        >
                            <span
                                @if (strtolower(language()->getCode()) == 'ar')
                                    style="text-align: right;padding-right: 30px"
                                @endif
                            >{{ __('public.'.$f->plan) }}</span>
                        </a>
                    </li>
                @endforeach
                
            </ul>
        </li>
    </ul>
</div>