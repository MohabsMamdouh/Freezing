@php
    $title = __('public.'.$plan[0]->plan)
@endphp

@extends('layouts.app')

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
                        {{ __('public.'.$plan[0]->plan) }}
                    </h4>
                </div>
            </li>
        </ul>
        </div>
    </section>

    <div class="container rounded bg-white mt-5 mb-5">
        <div class="row w-75 mx-auto">
            <div class="p-3">
                <form action="{{ route('UpdatePlan') }}" method="post">
                    @csrf
                    <input type="hidden" name="id" value="{{ $plan[0]->id }}">
                    <div class="row mt-2">
                        <div class="col-md-12">
                            <label class="labels" style="text-align: {{ $align }};display: block;">{{ __('public.Pricing Plan') }}</label>
                            <input type="text" class="form-control" style="text-align: {{ $align }};" value="{{ $plan[0]->plan }}" name="plan" placeholder="{{ __('public.Pricing Plan') }}" disabled>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-12">
                            <label class="labels" style="text-align: {{ $align }};display: block;">{{ __('public.Price') }}</label>
                            <input type="number" class="form-control" style="text-align: {{ $align }};" value="{{ $plan[0]->price }}" name="price" placeholder="{{ __('public.Price') }}">
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-12">
                            <label class="labels" style="text-align: {{ $align }};display: block;">{{ __('public.') }}</label>
                            <input type="text" class="form-control" style="text-align: {{ $align }};" value="{{ $plan[0]->duration }}" name="duration" placeholder="{{ __('public.Price') }}">
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
