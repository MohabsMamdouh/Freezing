@php
    $title = __('public.Show')
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
    @foreach ($tech as $member)
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
                            @if (auth()->user()->id == $member->id)
                                {{ __('public.My Profile') }}
                            @else
                                {{ __('public.Edit Data') }}
                            @endif
                        </h4>
                    </div>
                </li>
            </ul>
            </div>
        </section>

        <div class="container rounded bg-white mt-5 mb-5">
            <div class="row">
                <div class="col-md-5 border-right">
                    <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                        <img
                            class="rounded-circle mt-3"
                            style="width: 200px;height: 200px"
                            src="{{ URL('storage/users/'.$member->image_path) }}"
                        >
                        <span class="font-weight-bold">{{ $member->name }}</span>
                        <span class="text-black-50">{{ $member->email }}</span>
                        @foreach ($member->roles as $role)
                            <span class="text-muted" title="{{ $role->description }}">| {{ $role->name }} |</span>
                        @endforeach
                    </div>
                </div>
                <div class="col-md-6 border-right">
                    <div class="w-auto p-3">

                        <form action="{{ route('UpdateTechnicals') }}" method="post" enctype="multipart/form-data">
                            @csrf

                            <input type="hidden" name="id" value="{{ $member->id }}">
                            <div class="row mt-2">
                                <div class="col-md-6">
                                    <label class="labels" style="text-align: {{ $align }};display: block;">{{ __('auth.Full name') }}</label>
                                    <input type="text" class="form-control" name="FullName" placeholder="{{ __('auth.Full Name') }}" value="{{ $member->name }}">
                                </div>
                                <div class="col-md-6">
                                    <label class="labels" style="text-align: {{ $align }};display: block;">{{ __('auth.Arabic Name') }}</label>
                                    <input type="text" class="form-control" name="ArabicName"  placeholder="{{ __('auth.Arabic Name') }}" value="{{ $member->arabic_name }}">
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-12">
                                    <label class="labels" style="text-align: {{ $align }};display: block;">{{ __('auth.Phone') }}</label>
                                    <input type="text" class="form-control" name="Phone1" placeholder="{{ __('auth.Phone') }}" value="{{ $member->getPhones[0]->phone }}">
                                    <input type="hidden" name="Hidden_Phone" value="{{ $member->getPhones[0]->id }}">
                                </div>
                                @if (isset($member->getPhones[1]))
                                    <div class="col-md-12">
                                        <label class="labels" style="text-align: {{ $align }};display: block;">{{ __('auth.Phone') }}</label>
                                        <input type="text" class="form-control" name="Phone2" placeholder="{{ __('auth.Phone') }}" value="{{ $member->getPhones[1]->phone }}">
                                        <input type="hidden" name="Hidden_Phone2" value="{{ $member->getPhones[1]->id }}">
                                    </div>
                                @else
                                    <div class="col-md-12">
                                        <label class="labels" style="text-align: {{ $align }};display: block;">{{ __('auth.Phone') }}</label>
                                        <input type="text" class="form-control" name="Phone2" placeholder="{{ __('auth.Phone') }}" value="">
                                    </div>
                                @endif
                                <div class="col-md-12">
                                    <label class="labels" style="text-align: {{ $align }};display: block;">{{ __('auth.Address') }}</label>
                                    <input type="text" class="form-control" name="Address" placeholder="{{ __('auth.Address') }}" value="{{ $member->getAddress[0]->address }}">
                                    <input type="hidden" name="Address_id" value="{{ $member->getAddress[0]->id }}">
                                </div>
                                <div class="col-md-12">
                                    <label class="labels" style="text-align: {{ $align }};display: block;">{{ __('auth.Email Address') }}</label>
                                    <input type="text" class="form-control" name="Email" placeholder="{{ __('auth.Email Address') }}" value="{{ $member->email }}">
                                </div>
                                <div class="col-md-12">
                                    <label class="labels" style="text-align: {{ $align }};display: block;">{{ __('public.Photo') }}</label>
                                    <input type="file" class="form-control" name="Photo" placeholder="{{ __('public.Photo') }}">
                                    <input type="hidden" name="Hidden_Photo" value="{{ $member->image_path }}">
                                </div>
                                <div class="col-md-12">
                                    <label class="labels" style="text-align: {{ $align }};display: block;">{{ __('public.Role') }}</label>
                                    <!-- Default switch -->
                                    @if ($member->roles[0]->name == 'Admin')
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" name="admin" role="switch" id="adminChecked" checked />
                                            <label class="form-check-label" for="adminChecked">{{ __('dashboard.Admin') }}</label>
                                        </div>
                                    @elseif (isset($member->roles[1]->name) && $member->roles[1]->name == 'Admin')
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" name="admin" role="switch" id="adminChecked" checked />
                                            <label class="form-check-label" for="adminChecked">{{ __('dashboard.Admin') }}</label>
                                        </div>
                                    @else
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" name="admin" role="switch" id="adminChecked" />
                                            <label class="form-check-label" for="adminChecked">{{ __('dashboard.Admin') }}</label>
                                        </div>
                                    @endif
                                </div>
                                <div class="col-md-12">
                                    <label class="labels" style="text-align: {{ $align }};display: block;">{{ __('public.Role') }}</label>
                                    <!-- Default switch -->
                                    @foreach ($member->roles as $role)
                                        <input type="hidden"name="{{ $role->name }}" value="{{ $role->name }}">
                                    @endforeach
                                    @if ($member->roles[0]->name == 'Technical')
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" name="technical" role="switch" id="technicalChecked" checked />
                                            <label class="form-check-label" for="technicalChecked">{{ __('public.Technicals') }}</label>
                                        </div>
                                    @elseif (isset($member->roles[1]->name) && $member->roles[1]->name == 'Technical')
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" name="technical" role="switch" id="technicalChecked" checked />
                                            <label class="form-check-label" for="technicalChecked">{{ __('public.Technicals') }}</label>
                                        </div>
                                    @else
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" name="technical" role="switch" id="technicalChecked" />
                                            <label class="form-check-label" for="technicalChecked">{{ __('public.Technicals') }}</label>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="mt-5 text-center">
                                <button class="btn btn-primary profile-button" type="submit">{{ __('setting.Update') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach


</div>

@endsection
