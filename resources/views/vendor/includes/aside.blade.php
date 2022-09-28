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
        <li class="{{ Route::currentRouteName() == 'AdminDashboard' || Route::currentRouteName() == 'TechnicalDashboard'  ? "active" : "" }}">
            <a href="{{ route('authenticated') }}">
                <span class="icon"><i class="mdi mdi-desktop-mac"></i></span>
                <span class="menu-item-label"  style="{{ strtolower(language()->getCode()) == 'ar' ? "text-align: right;padding-right: 30px" : "" }}">
                    {{ __('dashboard.Dashboard') }}
                </span>
            </a>
        </li>
    </ul>
    <p class="menu-label">{{ __('public.Perspective') }}</p>
    <ul class="menu-list">
        @if (Auth::user()->checkRole('Admin'))
            <li class="--set-active-tables-html {{ Route::currentRouteName() == 'settings' ? "active" : "" }} ">
                <a href="{{ route('settings', ['id' => 1]) }}">
                    <span class="icon"><i class="mdi mdi-settings"></i></span>
                    <span class="menu-item-label"  style="{{ strtolower(language()->getCode()) == 'ar' ? "text-align: right;padding-right: 30px" : "" }}"
                    >{{ __('public.Settings') }}</span>
                </a>
            </li>
        @endif

        <li class="--set-active-forms-html">
            <a class="dropdown">
                <span class="icon"><i class="mdi mdi-view-list"></i></span>
                <span class="menu-item-label"  style="{{ strtolower(language()->getCode()) == 'ar' ? "text-align: right;padding-right: 30px" : "" }}">
                    {{ __('public.Feedbacks') }}
                </span>
            </a>
            <ul>

                @if (Auth::user()->checkRole('Admin'))
                    <li>
                        <a href="{{ route('ShowFeedback') }}">
                            <span class="icon"><i class="mdi mdi-square-edit-outline"></i></span>
                            <span class="menu-item-label"  style="{{ strtolower(language()->getCode()) == 'ar' ? "text-align: right;padding-right: 30px" : "" }}">
                                {{ __('public.Show Feedbacks') }}
                            </span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('CreateFeedback') }}">
                            <span class="icon"><i class="mdi mdi-square-edit-outline"></i></span>
                            <span class="menu-item-label"  style="{{ strtolower(language()->getCode()) == 'ar' ? "text-align: right;padding-right: 30px" : "" }}">
                                {{ __('public.Create Feedbacks') }}
                            </span>
                        </a>
                    </li>
                @endif

                @if (Auth::user()->checkRole('Technical'))
                    <li>
                        <a href="{{ route('Feedback.Show', ['id' => Auth::user()->id]) }}">
                            <span class="icon"><i class="mdi mdi-square-edit-outline"></i></span>
                            <span class="menu-item-label"  style="{{ strtolower(language()->getCode()) == 'ar' ? "text-align: right;padding-right: 30px" : "" }}">
                                {{ __('public.Show My Feedbacks') }}
                            </span>
                        </a>
                    </li>
                @endif
            </ul>
        </li>
        @if (Auth::user()->checkRole('Admin'))
            <li class="--set-active-profile-html {{ Route::currentRouteName() == 'technicals' ? "active" : "" }}">
                <a href="{{ route('technicals') }}">
                    <span class="icon"><i class="mdi mdi-account-circle"></i></span>
                    <span class="menu-item-label"  style="{{ strtolower(language()->getCode()) == 'ar' ? "text-align: right;padding-right: 30px" : "" }}">
                        {{ __('public.Technicals') }}
                    </span>
                </a>
            </li>
        @endif
        <li>
            <a class="dropdown">
                <span class="icon"><i class="mdi mdi-view-list"></i></span>
                <span class="menu-item-label"  style="{{ strtolower(language()->getCode()) == 'ar' ? "text-align: right;padding-right: 30px" : "" }}">
                    {{ __('public.Jobs') }}
                </span>
            </a>
            <ul>
                @if (Auth::user()->checkRole('Admin'))
                    <li>
                        <a href="{{ route('CreateJobs') }}"
                            style="{{ strtolower(language()->getCode()) == 'ar' ? "display: grid;" : "" }}"
                            class= "{{ Route::currentRouteName() == 'NewJob' ? "active" : "" }}">
                            <span  style="{{ strtolower(language()->getCode()) == 'ar' ? "text-align: right;padding-right: 30px" : "" }}">
                                {{ __('public.Create Job') }}
                            </span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('NewJob', ['status' => 0]) }}"
                            style="{{ strtolower(language()->getCode()) == 'ar' ? "display: grid;" : "" }}"
                            class= "{{ Route::currentRouteName() == 'NewJob' ? "active" : "" }}">
                            <span  style="{{ strtolower(language()->getCode()) == 'ar' ? "text-align: right;padding-right: 30px" : "" }}">
                                {{ __('public.New Jobs') }}
                            </span>
                        </a>
                    </li>
                @endif
                <li>
                    <a href="{{ Auth::user()->checkRole('Admin') ? route('CurrentJob', ['status' => 1]) : route('Job.Current', ['status' => 1]) }}"
                        style="{{ strtolower(language()->getCode()) == 'ar' ? "display: grid;" : "" }}"
                        class= "{{ Route::currentRouteName() == 'CurrentJob' ? "active" : "" }}">
                        <span  style="{{ strtolower(language()->getCode()) == 'ar' ? "text-align: right;padding-right: 30px" : "" }}">
                            {{ __('public.Current Jobs') }}
                        </span>
                    </a>
                </li>
                <li>
                    <a href="{{ Auth::user()->checkRole('Admin') ? route('FinishJob', ['status' => 2]) : route('Job.Finish', ['status' => 2]) }}"
                        style="{{ strtolower(language()->getCode()) == 'ar' ? "display: grid;" : "" }}"
                        class= "{{ Route::currentRouteName() == 'FinishJob' ? "active" : "" }}">
                        <span  style="{{ strtolower(language()->getCode()) == 'ar' ? "text-align: right;padding-right: 30px" : "" }}">
                            {{ __('public.Finished Jobs') }}
                        </span>

                    </a>
                </li>
                @if (Auth::user()->checkRole('Admin'))
                    <li>
                        <a href="{{ route('CancelJob', ['status' => 3]) }}"
                            style="{{ strtolower(language()->getCode()) == 'ar' ? "display: grid;" : "" }}"
                            class= "{{ Route::currentRouteName() == 'CancelJob' ? "active" : "" }}">
                            <span  style="{{ strtolower(language()->getCode()) == 'ar' ? "text-align: right;padding-right: 30px" : "" }}">
                                {{ __('public.Canceled Jobs')  }}
                            </span>
                        </a>
                    </li>
                @endif
            </ul>
        </li>
        @if (Auth::user()->checkRole('Admin'))
            <li>
                <a class="dropdown">
                    <span class="icon"><i class="mdi mdi-view-list"></i></span>
                    <span class="menu-item-label"  style="{{ strtolower(language()->getCode()) == 'ar' ? "text-align: right;padding-right: 30px" : "" }}">
                        {{ __('public.Pricing Plan') }}
                    </span>
                </a>
                <ul>
                    @foreach ($price as $f)
                        <li>
                            <a href="{{ route('ShowPlan', ['id' => $f->id]) }}" style="{{ strtolower(language()->getCode()) == 'ar' ? "display: grid;" : "" }}">
                                <span  style="{{ strtolower(language()->getCode()) == 'ar' ? "text-align: right;padding-right: 30px" : "" }}">
                                    {{ __('public.'.$f->plan) }}
                                </span>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </li>
        @endif
    </ul>
</div>
