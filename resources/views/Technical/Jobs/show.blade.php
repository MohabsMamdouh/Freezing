@php
    $title = __('public.Show Indiviual Job')
@endphp
@extends('layouts.app')

@section('style')
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
    <link rel="stylesheet" href="{{ URL::asset('css/list.css') }}">

@endsection

@section('content')
@if (strtolower(language()->getCode()) == 'en')
    @php
        $align = 'left'
    @endphp
@elseif (strtolower(language()->getCode()) == 'ar')
    @php
        $align = 'right'
    @endphp
@endif

<div class="content-box">

    <br>
    <section class="is-title-bar">
        <div
        @if (strtolower(language()->getCode()) == 'en')
            class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0"
        @elseif (strtolower(language()->getCode()) == 'ar')
            style="text-align: right"
        @endif
        >
        <ul>
            <li>{{ __('dashboard.Admin') }}</li>
            <li>
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 style="width: 100%;text-align: {{ $align }};display: block;">
                        {{ __('public.Show Indiviual Job') }}
                    </h4>
                </div>
            </li>
        </ul>
        </div>
    </section>

    <section class="container" style="margin-top: 40px">
        {{-- @foreach ($jobs as $job) --}}
            <ul class="timeline">
                <li>
                    <!-- begin timeline-time -->
                    <div class="timeline-time">
                        <span class="date">{{ str_replace('-', ' ', date('Y-F-d', strtotime($jobs['created_at']))) }}</span>
                        <span class="time">{{ date("H:i", strtotime($jobs['created_at'])) }}</span>
                    </div>
                    <!-- end timeline-time -->

                    <!-- begin timeline-icon -->
                    <div class="timeline-icon">
                        <a href="javascript:;">&nbsp;</a>
                    </div>
                    <!-- end timeline-icon -->

                    <!-- begin timeline-body -->
                    <div class="timeline-body">
                        <div class="timeline-header">
                            <span class="userimage" style="border: 1px solid #000;border-radius: 100%;text-align: center;background: #eee;">
                                <i class="fa-solid fa-{{ strtolower(substr($jobs['company_name'], 0, 1)) }}"></i>
                            </span>
                            <a class="username" href="{{ route('ShowJob', ['id' => $jobs['id']]) }}">
                                {{ $jobs['company_name'] }}
                                <small></small>
                            </a>
                            @if ($jobs['status'] == 1)
                                <a href="{{ route('updateStatus',['id' => $jobs['id']]) }}" class="pull-right text-success content-link" style="
                                    background: #080;
                                    margin-left: 15px;
                                    border: 1px solid #ddd;
                                    padding: 5px 7px;
                                    color: #fff !important;
                                    margin-top: -7px;
                                ">
                                    <i class="fa-solid fa-check"></i>
                                </a>
                            @endif
                            <a href="{{ route('EditJob', ['id' => $jobs['id']]) }}" class="pull-right text-success content-link">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </a>
                        </div>
                        <div class="timeline-content" style="text-align: {{ $align }}">

                            @if (strtolower(language()->getCode()) == 'en')
                                <div style="width: 30%; float:left;padding: 10px;">
                                    <div style="padding: 5px;">{{ __('dashboard.Description') }}</div>
                                    <div style="padding: 5px;">{{ __('public.Phones') }}</div>
                                    <div style="padding: 5px;">{{ __('auth.Address') }}</div>
                                    <div style="padding: 5px;">
                                        @if ($jobs['status'] == 1 || $jobs['status'] == 0)
                                            {{ __('public.AssignTo') }}
                                        @endif

                                        @if ($jobs['status'] == 2)
                                            {{ __('public.Finished') }}
                                        @endif

                                        @if ($jobs['status'] == 3)
                                            {{ __('dashboard.Status') }}
                                        @endif
                                    </div>
                                    <div style="padding: 5px;">
                                        @if ($jobs['status'] == 1 || $jobs['status'] == 2)
                                            {{ __('public.Updated at') }}
                                        @endif
                                    </div>
                                </div>

                                <div style="width: 70%; float:right;border: 1px solid #ddd;padding: 10px;">
                                    <div style="padding: 5px;">
                                        <p>
                                            {{ $jobs['description'] }}
                                        </p>
                                    </div>
                                    <div style="padding: 5px;">
                                        <p class="timeline-content" style="text-align: {{ $align }}">
                                            @php
                                                $more = " "
                                            @endphp
                                            @if (count($jobs['getPhones']) > 1)
                                                @php
                                                    $more = " | "
                                                @endphp
                                            @endif
                                            @foreach ($jobs['getPhones'] as $phone)
                                                <span>{{ $phone['phone'] }}</span> {{ $more }}
                                            @endforeach
                                        </p>
                                    </div>
                                    <div style="padding: 5px;">
                                        <p class="timeline-content" style="text-align: {{ $align }}">
                                            <span>{{ $jobs['getAddress']['address'] }}</span>
                                        </p>
                                    </div>
                                    <div style="padding: 5px;">
                                        @if ($jobs['status'] == 1 || $jobs['status'] == 2)
                                            <p class="timeline-content" style="text-align: {{ $align }}">
                                                <a href="{{ route('showTechnicals', ['id' => $jobs['getTechnical'][0]['id']]) }}">
                                                    {{ '@'. Str::lower(str_replace(' ', '', $jobs['getTechnical'][0]['name'])) }}
                                                </a>
                                            </p>
                                        @elseif ($jobs['status'] == 0)
                                            <form action="{{ route('AssignTo') }}" method="post">
                                                @csrf
                                                <input
                                                    type="text"
                                                    list="AssignTo"
                                                    class="form-control"
                                                    name="AssignTo"
                                                    style="border: 1px solid #ddd; width: 80%;display: inline;text-align: {{ $align }}"
                                                    value="
                                                        @if ($jobs['status'] == 1 || $jobs['status'] == 2)
                                                            @if (strtolower(language()->getCode()) == 'en')
                                                                {{ $jobs['getTechnical'][0]['name'] }}
                                                            @elseif (strtolower(language()->getCode()) == 'ar')
                                                                {{ $jobs['getTechnical'][0]['arabic_name'] }}
                                                            @endif
                                                        @endif
                                                    "
                                                >
                                                <input type="hidden" name="job_id" value="{{ $jobs['id'] }}">
                                                <datalist id="AssignTo">
                                                    @foreach ($techs as $tech)
                                                        @if (strtolower(language()->getCode()) == 'en')
                                                            <option value="{{ $tech->name }}">
                                                                @foreach ($tech->roles as $role)
                                                                    | {{ __('dashboard.'.$role->name) }} |
                                                                @endforeach
                                                            </option>
                                                        @elseif (strtolower(language()->getCode()) == 'ar')
                                                            <option value="{{ $tech->arabic_name }}">
                                                                @foreach ($tech->roles as $role)
                                                                    | {{ __('dashboard.'.$role->name) }} |
                                                                @endforeach
                                                            </option>
                                                        @endif
                                                    @endforeach
                                                </datalist>
                                                <input class="btn" type="submit" value="confirm">
                                            </form>
                                        @else
                                            <p class="timeline-content" style="text-align: {{ $align }}">
                                                <span class="text-danger">{{ __('public.Canceled') }}</span>
                                            </p>
                                        @endif
                                    </div>
                                    <div style="padding: 5px;">
                                        @if ($jobs['status'] == 1 || $jobs['status'] == 2)
                                            {{ App\Http\Controllers\FeedbackController::time_elapsed_string($jobs->updated_at) }}
                                        @endif
                                    </div>
                                </div>
                            @elseif (strtolower(language()->getCode()) == 'ar')
                                <div style="width: 70%; float:left;padding: 10px; border: 1px solid #ddd">
                                    <div style="padding: 5px;">
                                        <p>
                                            {{ $jobs['description'] }}
                                        </p>
                                    </div>
                                    <div style="padding: 5px;">
                                        <p class="timeline-content" style="text-align: {{ $align }}">
                                            @php
                                                $more = " "
                                            @endphp
                                            @if (count($jobs['getPhones']) > 1)
                                                @php
                                                    $more = " | "
                                                @endphp
                                            @endif
                                            @foreach ($jobs['getPhones'] as $phone)
                                                <span>{{ $phone['phone'] }}</span> {{ $more }}
                                            @endforeach
                                        </p>
                                    </div>
                                    <div style="padding: 5px;">
                                        <p class="timeline-content" style="text-align: {{ $align }}">
                                            <span>{{ $jobs['getAddress']['address'] }}</span>
                                        </p>
                                    </div>
                                    <div style="padding: 5px;">
                                        @if ($jobs['status'] == 1 || $jobs['status'] == 2)
                                            <p class="timeline-content" style="text-align: {{ $align }}">
                                                <a href="{{ route('showTechnicals', ['id' => $jobs['getTechnical'][0]['id']]) }}">
                                                    {{ '@'. Str::lower(str_replace(' ', '', $jobs['getTechnical'][0]['name'])) }}
                                                </a>
                                            </p>
                                        @elseif ($jobs['status'] == 0)
                                            <form action="{{ route('AssignTo') }}" method="post">
                                                @csrf
                                                <input
                                                    type="text"
                                                    list="AssignTo"
                                                    class="form-control"
                                                    name="AssignTo"
                                                    style="border: 1px solid #ddd; width: 80%;display: inline;text-align: {{ $align }}"
                                                    value="
                                                        @if ($jobs['status'] == 1 || $jobs['status'] == 2)
                                                            @if (strtolower(language()->getCode()) == 'en')
                                                                {{ $jobs['getTechnical'][0]['name'] }}
                                                            @elseif (strtolower(language()->getCode()) == 'ar')
                                                                {{ $jobs['getTechnical'][0]['arabic_name'] }}
                                                            @endif
                                                        @endif
                                                    "
                                                >
                                                <input type="hidden" name="job_id" value="{{ $jobs['id'] }}">
                                                <datalist id="AssignTo">
                                                    @foreach ($techs as $tech)
                                                        @if (strtolower(language()->getCode()) == 'en')
                                                            <option value="{{ $tech->name }}">
                                                                @foreach ($tech->roles as $role)
                                                                    | {{ __('dashboard.'.$role->name) }} |
                                                                @endforeach
                                                            </option>
                                                        @elseif (strtolower(language()->getCode()) == 'ar')
                                                            <option value="{{ $tech->arabic_name }}">
                                                                @foreach ($tech->roles as $role)
                                                                    | {{ __('dashboard.'.$role->name) }} |
                                                                @endforeach
                                                            </option>
                                                        @endif
                                                    @endforeach
                                                </datalist>
                                                <input class="btn" type="submit" value="confirm">
                                            </form>
                                        @else
                                            <p class="timeline-content" style="text-align: {{ $align }}">
                                                <span class="text-danger">{{ __('public.Canceled') }}</span>
                                            </p>
                                        @endif
                                    </div>
                                    <div style="padding: 5px;">
                                        @if ($jobs['status'] != 0)
                                            {{ str_replace('-', ' ', date('Y-F-d', strtotime($jobs['updated_at']))) }}
                                            {{ date("H:i", strtotime($jobs['updated_at'])) }}
                                        @endif
                                    </div>
                                </div>

                                <div style="width: 30%; float:right;padding: 10px;">
                                    <div style="padding: 5px;">{{ __('dashboard.Description') }}</div>
                                    <div style="padding: 5px;">{{ __('public.Phones') }}</div>
                                    <div style="padding: 5px;">{{ __('auth.Address') }}</div>
                                    <div style="padding: 5px;">
                                        @if ($jobs['status'] == 1 || $jobs['status'] == 0)
                                            {{ __('public.AssignTo') }}
                                        @endif

                                        @if ($jobs['status'] == 2)
                                            {{ __('public.Finished') }}
                                        @endif

                                        @if ($jobs['status'] == 3)
                                            {{ __('dashboard.Status') }}
                                        @endif
                                    </div>
                                    <div style="padding: 5px;">
                                        @if ($jobs['status'] == 1 || $jobs['status'] == 2)
                                            {{ __('public.Updated at') }}
                                        @endif
                                    </div>
                                </div>
                            @endif
                        </div>
                        <div class="timeline-likes">
                            <div class="stats-right">
                                <span class="stats-text">
                                    @if ($jobs['status'] == 0)
                                        {{ __('public.New Jobs') }}
                                    @endif
                                    @if ($jobs['status'] == 1)
                                        {{ __('public.Current Jobs') }}
                                    @endif
                                    @if ($jobs['status'] == 2)
                                        {{ __('public.Finished Jobs') }}
                                    @endif
                                </span>
                            </div>
                            <div class="stats">
                                <span class="stats-total">{{ $jobs['email'] }}</span>
                            </div>
                        </div>
                        @if ($jobs['status'] == 2 || $jobs['status'] == 3)
                            <div class="timeline-footer" style="text-align: {{ $align }}">
                                {{ __('public.Feedbacks') }}
                            </div>
                            {{-- Begin timeline-comment --}}
                            <div class="timeline-comment-box" style="height: auto">
                                @foreach ($jobs['feedbacks'] as $feed)
                                    <div style="text-align: {{ $align }};padding: 15px;height: 75px;">
                                        @if ($jobs['status'] == 2)
                                            @if (strtolower(language()->getCode()) == 'en')
                                                <div style="width: 20%; float:left;border: 1px solid #ddd;padding: 10px;">
                                                    <span>{{ __('public.Rate') }}</span>
                                                    <br>
                                                    <span>{{ __('public.Feedbacks') }}</span>
                                                </div>
                                                <div style="width: 80%; float:right;border: 1px solid #ddd;padding: 10px;">
                                                    <span>
                                                        @for ($i = 0; $i <= $feed['rate']; $i++)
                                                            *
                                                        @endfor
                                                        ({{ $feed['rate']+1 }})
                                                    </span><br>
                                                    <span>{{ $feed['feedback'] }}</span>
                                                </div>
                                            @elseif (strtolower(language()->getCode()) == 'ar')
                                                <div style="width: 80%; float:left;border: 1px solid #ddd;padding: 10px;">
                                                    <span>
                                                        @for ($i = 0; $i <= $feed['rate']; $i++)
                                                            *
                                                        @endfor
                                                        ({{ $feed['rate']+1 }})
                                                    </span><br>
                                                    <span>{{ $feed['feedback'] }}</span>
                                                </div>

                                                <div style="width: 20%; float:right;border: 1px solid #ddd;padding: 10px;">
                                                    <span>{{ __('public.Rate') }}</span>
                                                    <br>
                                                    <span>{{ __('public.Feedbacks') }}</span>
                                                </div>
                                            @endif
                                        @endif
                                    </div>
                                @endforeach
                            </div>
                            {{-- End timeline-comment --}}
                        @endif
                    </div>
                    <!-- end timeline-body -->
                </li>
            </ul>
            <!-- end timeline -->
        {{-- @endforeach --}}
        <!-- end timeline -->
    </section>
</div>

@endsection
