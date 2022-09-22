@php
    $title = __('auth.Login');
@endphp

@extends('layouts.public')


@if (strtolower(language()->getCode()) == 'en')
    @php
        $align = 'left'
    @endphp
@elseif (strtolower(language()->getCode()) == 'ar')
    @php
        $align = 'right'
    @endphp
@endif


@section('header')
    <p class="card-header-title" style="text-align: {{ $align }};display:block">
        {{ __('auth.Login') }}
        <span class="icon"><i class="mdi mdi-lock"></i></span>
    </p>
@endsection




@section('form')

<form method="POST" action="{{ route('login') }}">
    @csrf
    {{-- Input: Email Address --}}
    <div class="field spaced">
        <label class="label" for="email" style="text-align: {{ $align }}">{{ __('auth.Email Address') }}</label>
        <div class="control icons-{{ $align }}">
            <input id="email" type="email" style="text-align: {{ $align }}" class="input @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
            <span class="icon is-small {{ $align }}"><i class="mdi mdi-account"></i></span>
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <p class="help" style="text-align: {{ $align }}">
            {{ __('auth.Enter Your Email Address') }}
        </p>
    </div>

    {{-- Input: Password --}}
    <div class="field spaced">
        <label class="label" for="password" style="text-align: {{ $align }}">{{ __('auth.Password') }}</label>
        <div class="control icons-{{ $align }}">
            <input id="password" type="password" placeholder="{{ __('auth.Password') }}" style="text-align: {{ $align }}" class="input @error('password') is-invalid @enderror" name="password" value="{{ old('password') }}" required autocomplete="password" autofocus>
            <span class="icon is-small {{ $align }}"><i class="mdi mdi-asterisk"></i></span>
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <p class="help" style="text-align: {{ $align }}">
            {{ __('auth.Enter Your Password') }}
        </p>
    </div>

    {{-- Input: Remember --}}
    <div class="field spaced">
        <div class="control"
        @if (strtolower(language()->getCode()) == 'ar')
            dir="rtl"
        @endif
        >
            <label class="checkbox" >
                <input type="checkbox" style="text-align: {{ $align }}" name="remember" value="1" checked>
                <span class="check"></span>
                <span class="control-label" style="{{ 'margin-' . $align }}: 10px">{{ __('auth.Remember Me') }}</span>
            </label>
        </div>
    </div>

    <hr>

    {{-- Input: Button --}}
    <div class="field grouped">
        <div class="control">
            <button type="submit" class="button blue">
                {{ __('auth.Login') }}
            </button>
        </div>
        <div class="control">
            @if (Route::has('password.request'))
                <a href="{{ route('showForgetPasswordForm') }}" class="button">
                    {{ __('auth.Forgot Your Password?') }}
                </a>
            @endif
        </div>
        <div class="control">
            @include('vendor.language.flags')
        </div>
    </div>
</form>

@endsection
