@php
    $title = __('public.Create Technical')
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
                        {{ __('public.Create Technical') }}
                    </h4>
                </div>
            </li>
        </ul>
        </div>
    </section>

    <div class="container rounded bg-white mt-5 mb-5">
        <div class="row w-75 mx-auto">
            <div class="w-auto p-3">
                <form action="{{ route('storeTechnicals') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row mt-2">
                        <div class="col-md-6">
                            <label class="labels" style="text-align: {{ $align }};display: block;">{{ __('auth.Full name') }}</label>
                            <input type="text" class="form-control" name="FullName" placeholder="{{ __('auth.Full Name') }}">
                        </div>
                        <div class="col-md-6">
                            <label class="labels" style="text-align: {{ $align }};display: block;">{{ __('auth.Arabic Name') }}</label>
                            <input type="text" class="form-control" name="ArabicName"  placeholder="{{ __('auth.Arabic Name') }}">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12">
                            <label class="labels" style="text-align: {{ $align }};display: block;">{{ __('auth.Phone') }}</label>
                            <input type="text" class="form-control" name="Phone1" placeholder="{{ __('auth.Phone') }}">
                        </div>
                        <div class="col-md-12">
                            <label class="labels" style="text-align: {{ $align }};display: block;">{{ __('auth.Phone') }}</label>
                            <input type="text" class="form-control" name="addPhone" placeholder="{{ __('auth.Phone') }}">
                        </div>
                        <div class="col-md-12">
                            <label class="labels" style="text-align: {{ $align }};display: block;">{{ __('auth.Address') }}</label>
                            <input type="text" class="form-control" name="Address" placeholder="{{ __('auth.Address') }}">
                        </div>
                        <div class="col-md-12">
                            <label class="labels" style="text-align: {{ $align }};display: block;">{{ __('auth.Email Address') }}</label>
                            <input type="text" class="form-control" name="Email" placeholder="{{ __('auth.Email Address') }}">
                        </div>
                        <div class="col-md-12">
                            <label class="labels" style="text-align: {{ $align }};display: block;">{{ __('public.Photo') }}</label>
                            <input type="file" class="form-control" name="Photo" placeholder="{{ __('public.Photo') }}">
                        </div>
                        <div class="col-md-12">
                            <label class="labels" style="text-align: {{ $align }};display: block;">{{ __('public.Role') }}</label>
                            <!-- Default switch -->
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" name="admin" role="switch" id="adminChecked" />
                                <label class="form-check-label" for="adminChecked">{{ __('dashboard.Admin') }}</label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label class="labels" style="text-align: {{ $align }};display: block;">{{ __('public.Role') }}</label>
                            <!-- Default switch -->
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" name="technical" role="switch" id="technicalChecked" />
                                <label class="form-check-label" for="technicalChecked">{{ __('public.Technicals') }}</label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label class="labels" style="text-align: {{ $align }};display: block;">{{ __('auth.Password') }}</label>
                            <input type="password" class="form-control" name="Password" placeholder="{{ __('auth.Password') }}">
                        </div>
                    </div>
                    <div class="mt-5 text-center">
                        <button style="width: 100%;" class="btn btn-primary btn-block profile-button" type="submit">{{ __('public.Create') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


</div>

@endsection
