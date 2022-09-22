@php
    $title = __('public.Feedbacks')
@endphp
@extends('layouts.app')


@section('style')
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ URL::asset('css/feedback.css') }}">
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

<div class="container">
    {{-- Head --}}
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
            <li>{{ __('public.Feedbacks') }}</li>
          </ul>
        </div>
    </section>

    {{-- Add New Feedback --}}
    <section class="container mx-auto" style="width: 90%">
        <a href="{{ route('CreateFeedback') }}" class="btn btn-success">
            <i class="fa-regular fa-square-plus" style="margin-right: 5px"></i>
            {{ __('public.Create Feedback') }}
        </a>
    </section>

    {{-- Content --}}
    <section class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="media g-mb-30 media-comment">
                        <div class="media-body u-shadow-v18 g-bg-secondary g-pa-30">
                            <div class="g-mb-15">
                                <h5 class="h5 g-color-gray-dark-v1 mb-0">John Doe</h5>
                                <span class="g-color-gray-dark-v4 g-font-size-12">5 days ago</span>
                            </div>

                            <p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue
                                felis in faucibus ras purus odio, vestibulum in vulputate at, tempus viverra turpis.</p>

                            <ul class="list-inline d-sm-flex my-0">
                                <li class="list-inline-item g-mr-20">
                                    <a class="u-link-v5 g-color-gray-dark-v4 g-color-primary--hover" href="#!">
                                        <i class="fa fa-thumbs-up g-pos-rel g-top-1 g-mr-3"></i>
                                        178
                                    </a>
                                </li>
                                <li class="list-inline-item g-mr-20">
                                    <a class="u-link-v5 g-color-gray-dark-v4 g-color-primary--hover" href="#!">
                                        <i class="fa fa-thumbs-down g-pos-rel g-top-1 g-mr-3"></i>
                                        34
                                    </a>
                                </li>
                                <li class="list-inline-item ml-auto">
                                    <a class="u-link-v5 g-color-gray-dark-v4 g-color-primary--hover" href="#!">
                                        <i class="fa fa-reply g-pos-rel g-top-1 g-mr-3"></i>
                                        Reply
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


</div>
@endsection
