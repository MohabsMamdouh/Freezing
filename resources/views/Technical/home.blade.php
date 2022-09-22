@php
    $title = __('dashboard.Dashboard')
@endphp
@extends('layouts.app')

@section('content')
<div class="container">
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
            <li>{{ __('dashboard.Dashboard') }}</li>
          </ul>
        </div>
    </section>

    <section class="section main-section">

    </section>
</div>
@endsection
