@php
    $title = 'Forget Password';
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
        {{ __('auth.Forgot Your Password?') }}
        <span class="icon"><i class="mdi mdi-lock"></i></span>
    </p>
@endsection

@section('form')

@if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
@endif
<form method="POST" action="{{ route('submitForgetPasswordForm') }}">
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

    <hr>

    {{-- Input: Button --}}
    <div class="field grouped">
        <div class="control">
            <button type="submit" class="button blue">
                {{ __('auth.Send Password Reset Link') }}
            </button>
        </div>
        <div class="control">
            @include('vendor.language.flags')
        </div>
    </div>
</form>

@endsection