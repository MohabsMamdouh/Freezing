@php
    $title = __('public.Edit')
@endphp
@extends('layouts.app')

@section('style')
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
    <link rel="stylesheet" href="{{ asset('css/profile.css') }}">
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
                        {{ __('public.Edit Data') }}
                    </h4>
                </div>
            </li>
        </ul>
        </div>
    </section>


    <section class="container rounded bg-white mt-5 mb-5">
        <div class="row w-75 mx-auto">
            <div class="w-auto p-3">
                <form action="{{ route('UpdateJob') }}" method="post">
                    @csrf
                    <input type="hidden" name="id" value="{{ $job[0]->id }}">
                    <div class="row mt-2">
                        <div class="col-md-6">
                            <label class="labels" style="text-align: {{ $align }};display: block;">{{ __('dashboard.Company') }}</label>
                            <input type="text" style="text-align: {{ $align }};" class="form-control" name="CompanyName" placeholder="{{ __('dashboard.Company') }}" value="{{ $job[0]->company_name }}">
                        </div>
                        <div class="col-md-6">
                            <label class="labels" style="text-align: {{ $align }};display: block;">{{ __('auth.Email Address') }}</label>
                            <input type="text" style="text-align: {{ $align }};" class="form-control" name="Email" placeholder="{{ __('auth.Email Address') }}" value="{{ $job[0]->email }}">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12">
                            <label class="labels" style="text-align: {{ $align }};display: block;">{{ __('auth.Phone') }}</label>
                            <input type="text" style="text-align: {{ $align }};" class="form-control" name="Phone1" placeholder="{{ __('auth.Phone') }}" value="{{ $job[0]->getPhones[0]->phone }}">
                            <input type="hidden" name="Hidden_Phone" value="{{ $job[0]->getPhones[0]->id }}">
                        </div>

                        @isset($job[0]->getPhones[1])
                            <div class="col-md-12">
                                <label class="labels" style="text-align: {{ $align }};display: block;">{{ __('auth.Phone') }}</label>
                                <input type="text" style="text-align: {{ $align }};" class="form-control" name="Phone2" placeholder="{{ __('auth.Phone') }}" value="{{ $job[0]->getPhones[1]->phone }}">
                                <input type="hidden" name="Hidden_Phone2" value="{{ $job[0]->getPhones[1]->id }}">
                            </div>
                        @else
                            <div class="col-md-12">
                                <label class="labels" style="text-align: {{ $align }};display: block;">{{ __('auth.Phone') }}</label>
                                <input type="text" style="text-align: {{ $align }};" class="form-control" name="addPhone" placeholder="{{ __('auth.Phone') }}" value="">
                            </div>
                        @endisset

                        <div class="col-md-12">
                            <label class="labels" style="text-align: {{ $align }};display: block;">{{ __('auth.Address') }}</label>
                            <input type="text" style="text-align: {{ $align }};" class="form-control" name="Address" placeholder="{{ __('auth.Address') }}" value="{{ $job[0]->getAddress->address }}">
                        </div>
                        <div class="col-md-12">
                            <label class="labels" style="text-align: {{ $align }};display: block;">{{ __('dashboard.Description') }}</label>
                            <textarea class="form-control" style="text-align: {{ $align }};" name="Description" id="" cols="30" rows="10" placeholder="{{ __('dashboard.Description') }}">{{ $job[0]->description }}</textarea>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="AssignTo" class="labels" style="text-align: {{ $align }};display: block;">{{ __('public.AssignTo') }}</label>
                                <input
                                    type="text"
                                    list="AssignTo"
                                    class="form-control"
                                    name="AssignTo"
                                    style="border: 1px solid #ddd"
                                    value="
                                    @if ($job[0]->status == 1 || $job[0]->status == 2)
                                        @if (strtolower(language()->getCode()) == 'en')
                                            {{ $job[0]->getTechnical[0]->name }}
                                        @elseif (strtolower(language()->getCode()) == 'ar')
                                            {{ $job[0]->getTechnical[0]->arabic_name }}
                                        @endif
                                    @endif
                                    "
                                >
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
                            </div>
                        </div>
                        <input type="hidden" name="status" value="{{ $job[0]->status }}">
                    </div>
                    <div class="col-md-12">
                        <label class="labels text-danger" style="text-align: {{ $align }};display: block;">{{ __('dashboard.Status') }}</label>
                        <!-- Default switch -->
                        <div class="form-check form-switch">
                            <input
                                class="form-check-input text-danger"
                                type="checkbox"
                                name="status"
                                role="switch"
                                id="technicalChecked"
                                @if ($job[0]->status == 3)
                                    checked
                                @endif
                            />
                            <label class="form-check-label text-danger" for="technicalChecked">{{ __('public.Cancel') }}</label>
                        </div>
                    </div>
                    <div class="mt-5 text-center">
                        <button style="width: 100%;" class="btn btn-primary btn-block profile-button" type="submit">{{ __('setting.Update') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </section>

</div>

@endsection
