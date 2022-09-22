@php
    $title = __('public.Jobs')
@endphp
@if (Route::currentRouteName() == 'NewJob')
    @php
        $title = __('public.New Jobs')
    @endphp
@endif

@if (Route::currentRouteName() == 'CurrentJob')
    @php
        $title = __('public.Current Jobs')
    @endphp
@endif

@if (Route::currentRouteName() == 'FinishJob')
    @php
        $title = __('public.Finished Jobs')
    @endphp
@endif

@if (Route::currentRouteName() == 'CancelJob')
    @php
        $title = __('public.Canceled Jobs')
    @endphp
@endif

@extends('layouts.app')

@section('style')
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
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
                @if (Route::currentRouteName() == 'NewJob')
                    {{ __('public.New Jobs') }}
                @endif

                @if (Route::currentRouteName() == 'CurrentJob')
                    {{ __('public.Current Jobs') }}
                @endif

                @if (Route::currentRouteName() == 'FinishJob')
                    {{ __('public.Finished Jobs') }}
                @endif

                @if (Route::currentRouteName() == 'CancelJob')
                    {{ __('public.Canceled Jobs') }}
                @endif
            </li>
          </ul>
        </div>
    </section>

    <section class="container mx-auto" style="width: 90%">
        <a href="{{ route('CreateJobs') }}" class="btn btn-success">
            <i class="fa-regular fa-square-plus" style="margin-right: 5px"></i>
            {{ __('public.Create Job') }}
        </a>
    </section>

    <section class="container mx-auto" style="width: 90%">
      <div class="container">
         <div class="row">
            <div class="col-md-12">
               <div id="content" class="content content-full-width">
                  <!-- begin profile-content -->
                  <div class="profile-content">
                     <!-- begin tab-content -->
                     <div class="tab-content p-0">
                        <!-- begin #profile-post tab -->
                        <div class="tab-pane fade active show" id="profile-post">
                           <!-- begin timeline -->
                           @if (count($jobs) == 0)
                                <div class="card empty">
                                    <div class="card-content">
                                        <div>
                                          <span class="icon large"><i class="mdi mdi-emoticon-sad mdi-48px"></i></span>
                                        </div>
                                        <p>{{ __('public.There is no data to preview') }}</p>
                                    </div>
                                </div>
                             @else
                                @foreach ($jobs as $job)
                                  <ul class="timeline">
                                    <li>
                                        <!-- begin timeline-time -->
                                        <div class="timeline-time">
                                            <span class="date">{{ str_replace('-', ' ', date('Y-F-d', strtotime($job['created_at']))) }}</span>
                                            <span class="time">{{ date("H:i", strtotime($job['created_at'])) }}</span>
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
                                                    <i class="fa-solid fa-{{ strtolower(substr($job['company_name'], 0, 1)) }}"></i>
                                                </span>
                                                <a class="username" href="{{ route('ShowJob', ['id' => $job['id']]) }}">
                                                    {{ $job['company_name'] }}
                                                    <small></small>
                                                </a>
                                                @if ($job['status'] == 1)
                                                    <a href="{{ route('updateStatus',['id' => $job['id']]) }}" class="pull-right text-success content-link" style="
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
                                                <a href="{{ route('EditJob', ['id' => $job['id']]) }}" class="pull-right text-success content-link">
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
                                                            @if ($job['status'] == 1 || $job['status'] == 0)
                                                                {{ __('public.AssignTo') }}
                                                            @endif

                                                            @if ($job['status'] == 2)
                                                                {{ __('public.Finished') }}
                                                            @endif

                                                            @if ($job['status'] == 3)
                                                                {{ __('dashboard.Status') }}
                                                            @endif
                                                        </div>
                                                        <div style="padding: 5px;">
                                                            @if ($job['status'] == 1 || $job['status'] == 2)
                                                                {{ __('public.Updated at') }}
                                                            @endif
                                                        </div>
                                                    </div>

                                                    <div style="width: 70%; float:right;border: 1px solid #ddd;padding: 10px;">
                                                        <div style="padding: 5px;">
                                                            <p>
                                                                {{ $job['description'] }}
                                                            </p>
                                                        </div>
                                                        <div style="padding: 5px;">
                                                            <p class="timeline-content" style="text-align: {{ $align }}">
                                                                @php
                                                                    $more = " "
                                                                @endphp
                                                                @if (count($job['get_phones']) > 1)
                                                                    @php
                                                                        $more = " | "
                                                                    @endphp
                                                                @endif
                                                                @foreach ($job['get_phones'] as $phone)
                                                                    <span>{{ $phone['phone'] }}</span> {{ $more }}
                                                                @endforeach
                                                            </p>
                                                        </div>
                                                        <div style="padding: 5px;">
                                                            <p class="timeline-content" style="text-align: {{ $align }}">
                                                                <span>{{ $job['get_address']['address'] }}</span>
                                                            </p>
                                                        </div>
                                                        <div style="padding: 5px;">
                                                            @if ($job['status'] == 1 || $job['status'] == 2)
                                                                <p class="timeline-content" style="text-align: {{ $align }}">
                                                                    <a href="{{ route('showTechnicals', ['id' => $job['get_technical'][0]['id']]) }}">
                                                                        {{ '@'. Str::lower(str_replace(' ', '', $job['get_technical'][0]['name'])) }}
                                                                    </a>
                                                                </p>
                                                            @elseif ($job['status'] == 0)
                                                                <form action="{{ route('AssignTo') }}" method="post">
                                                                    @csrf
                                                                    <input
                                                                        type="text"
                                                                        list="AssignTo"
                                                                        class="form-control"
                                                                        name="AssignTo"
                                                                        style="border: 1px solid #ddd; width: 80%;display: inline;text-align: {{ $align }}"
                                                                        value="
                                                                            @if ($job['status'] == 1 || $job['status'] == 2)
                                                                                @if (strtolower(language()->getCode()) == 'en')
                                                                                    {{ $job['get_technical'][0]['name'] }}
                                                                                @elseif (strtolower(language()->getCode()) == 'ar')
                                                                                    {{ $job['get_technical'][0]['arabic_name'] }}
                                                                                @endif
                                                                            @endif
                                                                        "
                                                                    >
                                                                    <input type="hidden" name="job_id" value="{{ $job['id'] }}">
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
                                                            @if ($job['status'] == 1 || $job['status'] == 2)
                                                                {{ str_replace('-', ' ', date('Y-F-d', strtotime($job['updated_at']))) }}
                                                                {{ date("H:i", strtotime($job['updated_at'])) }}
                                                            @endif
                                                        </div>
                                                    </div>
                                                @elseif (strtolower(language()->getCode()) == 'ar')
                                                    <div style="width: 70%; float:left;padding: 10px; border: 1px solid #ddd">
                                                        <div style="padding: 5px;">
                                                            <p>
                                                                {{ $job['description'] }}
                                                            </p>
                                                        </div>
                                                        <div style="padding: 5px;">
                                                            <p class="timeline-content" style="text-align: {{ $align }}">
                                                                @php
                                                                    $more = " "
                                                                @endphp
                                                                @if (count($job['get_phones']) > 1)
                                                                    @php
                                                                        $more = " | "
                                                                    @endphp
                                                                @endif
                                                                @foreach ($job['get_phones'] as $phone)
                                                                    <span>{{ $phone['phone'] }}</span> {{ $more }}
                                                                @endforeach
                                                            </p>
                                                        </div>
                                                        <div style="padding: 5px;">
                                                            <p class="timeline-content" style="text-align: {{ $align }}">
                                                                <span>{{ $job['get_address']['address'] }}</span>
                                                            </p>
                                                        </div>
                                                        <div style="padding: 5px;">
                                                            @if ($job['status'] == 1 || $job['status'] == 2)
                                                                <p class="timeline-content" style="text-align: {{ $align }}">
                                                                    <a href="{{ route('showTechnicals', ['id' => $job['get_technical'][0]['id']]) }}">
                                                                        {{ '@'. Str::lower(str_replace(' ', '', $job['get_technical'][0]['name'])) }}
                                                                    </a>
                                                                </p>
                                                            @elseif ($job['status'] == 0)
                                                                <form action="{{ route('AssignTo') }}" method="post">
                                                                    @csrf
                                                                    <input
                                                                        type="text"
                                                                        list="AssignTo"
                                                                        class="form-control"
                                                                        name="AssignTo"
                                                                        style="border: 1px solid #ddd; width: 80%;display: inline;text-align: {{ $align }}"
                                                                        value="
                                                                            @if ($job['status'] == 1 || $job['status'] == 2)
                                                                                @if (strtolower(language()->getCode()) == 'en')
                                                                                    {{ $job['get_technical'][0]['name'] }}
                                                                                @elseif (strtolower(language()->getCode()) == 'ar')
                                                                                    {{ $job['get_technical'][0]['arabic_name'] }}
                                                                                @endif
                                                                            @endif
                                                                        "
                                                                    >
                                                                    <input type="hidden" name="job_id" value="{{ $job['id'] }}">
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
                                                            @if ($job['status'] != 0)
                                                                {{ str_replace('-', ' ', date('Y-F-d', strtotime($job['updated_at']))) }}
                                                                {{ date("H:i", strtotime($job['updated_at'])) }}
                                                            @endif
                                                        </div>
                                                    </div>

                                                    <div style="width: 30%; float:right;padding: 10px;">
                                                        <div style="padding: 5px;">{{ __('dashboard.Description') }}</div>
                                                        <div style="padding: 5px;">{{ __('public.Phones') }}</div>
                                                        <div style="padding: 5px;">{{ __('auth.Address') }}</div>
                                                        <div style="padding: 5px;">
                                                            @if ($job['status'] == 1 || $job['status'] == 0)
                                                                {{ __('public.AssignTo') }}
                                                            @endif

                                                            @if ($job['status'] == 2)
                                                                {{ __('public.Finished') }}
                                                            @endif

                                                            @if ($job['status'] == 3)
                                                                {{ __('dashboard.Status') }}
                                                            @endif
                                                        </div>
                                                        <div style="padding: 5px;">
                                                            @if ($job['status'] == 1 || $job['status'] == 2)
                                                                {{ __('public.Updated at') }}
                                                            @endif
                                                        </div>
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="timeline-likes">
                                                <div class="stats-right">
                                                    <span class="stats-text">
                                                        @if ($job['status'] == 0)
                                                            {{ __('public.New Jobs') }}
                                                        @endif
                                                        @if ($job['status'] == 1)
                                                            {{ __('public.Current Jobs') }}
                                                        @endif
                                                        @if ($job['status'] == 2)
                                                            {{ __('public.Finished Jobs') }}
                                                        @endif
                                                    </span>
                                                </div>
                                                <div class="stats">
                                                    <span class="stats-total">{{ $job['email'] }}</span>
                                                </div>
                                            </div>
                                            @if ($job['status'] == 2 || $job['status'] == 3)
                                                <div class="timeline-footer" style="text-align: {{ $align }}">
                                                    {{ __('public.Feedbacks') }}
                                                </div>
                                                {{-- Begin timeline-comment --}}
                                                <div class="timeline-comment-box" style="height: auto">
                                                    @foreach ($job['feedbacks'] as $feed)
                                                        <div style="text-align: {{ $align }};padding: 15px;height: 75px;">
                                                            @if ($job['status'] == 2)
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
                                @endforeach
                             @endif
                        </div>
                        <!-- end #profile-post tab -->
                     </div>
                     <!-- end tab-content -->
                  </div>
                  <!-- end profile-content -->
               </div>
            </div>
         </div>
      </div>
    </section>
</div>
@endsection
