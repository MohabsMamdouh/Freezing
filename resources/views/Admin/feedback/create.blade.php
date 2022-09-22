@php
    $title = __('public.Create Feedback')
@endphp
@extends('layouts.app')


@section('style')
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ URL::asset('css/feedback.css') }}">
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
            <li>{{ __('public.Create Feedback') }}</li>
          </ul>
        </div>
    </section>

    <section>
        <form action="{{ route('StoreFeedback') }}" method="POST">
            @csrf
            <div class="container d-flex justify-content-center">
                <div class="card mt-5 pb-5" style="box-shadow: 2px 2px 5px #0763c5;border-radius: 20px;">
                    <div class="d-flex flex-row justify-content-center p-3 adiv text-white" style="border-radius: 20px;">
                        <span class="pb-3" style="font-size: 18px;margin-top: -5px;"><b>{{ __('public.Feedbacks') }}</b></span>
                    </div>
                    <div class="mt-2 p-4 text-center">
                        <h6 class="mb-0">{{ __('public.Your feedback help us to improve.') }}</h6>
                        <small class="px-3">{{ __('public.Please let us know about your experience.') }}</small>
                        <div class="form" style="margin-top: 20px">
                            <div class="col-md-12">
                                <input
                                    type="text"
                                    list="JobName"
                                    class="form-control"
                                    name="JobName"
                                    style="border: 1px solid #ddd; width: 80%;display: inline;text-align: {{ $align }}"
                                    placeholder="{{ __('dashboard.Company') }}"
                                    required
                                >
                                <datalist id="JobName">
                                    @foreach ($jobs as $job)
                                        <option value="{{ $job->company_name }}">{{ str_replace('-', ' ', date('Y-F-d', strtotime($job['created_at']))) }}</option>
                                    @endforeach
                                </datalist>
                            </div>
                            <div class="d-flex flex-row justify-content-center mt-2">
                                <img id="angry" src="{{ URL('storage/emojis/angry.png') }}" />
                                <img id="sad" src="{{ URL('storage/emojis/sad.png') }}" />
                                <img id="happy" src="{{ URL('storage/emojis/happy.png') }}" />
                                <img id="smile" src="{{ URL('storage/emojis/smiling.png') }}" />
                                <img id="lol" src="{{ URL('storage/emojis/lol.png') }}" />
                            </div>
                            <input type="hidden" id="rate" name="rate" value="0" required>
                            <div class="form-group mt-4">
                                <textarea style="text-align: {{ $align }}" name="feedback" class="form-control" rows="4" required placeholder="{{ __('public.Feedbacks') }}"></textarea>
                            </div>
                            <div class="mt-2">
                                <button type="submit" class="btn btn-primary btn-block">
                                    <span style="font-size: 13px;color: #fff"><b>{{ __('public.Create Feedback') }}</b></span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



            {{-- <fieldset>
                <div class="col-md-12">
                    <label for="JobName" class="labels" style="text-align: {{ $align }};display: block;color: #fff">{{ __('dashboard.Company') }}</label>
                    <input
                        type="text"
                        list="JobName"
                        class="form-control"
                        name="JobName"
                        style="border: 1px solid #ddd; width: 80%;display: inline;"
                    >
                    <datalist id="JobName">
                        @foreach ($jobs as $job)
                            <option value="{{ $job->company_name }}">{{ str_replace('-', ' ', date('Y-F-d', strtotime($job['created_at']))) }}</option>
                        @endforeach
                    </datalist>
                </div>
            </fieldset>
            <fieldset>
                <div class="col-md-12">
                    <label for="rate" class="labels" style="text-align: {{ $align }};display: block;color: #fff">{{ __('public.Rate') }}</label>
                    {{-- <div class="review__rating">
                        <input type="radio" id="1" name="rating" value="1" required />
                        <label for="1" aria-label="1 Star">☆</label>
                        <input type="radio" id="2" name="rating" value="2" required />
                        <label for="2" aria-label="2 Stars">☆</label>
                        <input type="radio" id="3" name="rating" value="3" required />
                        <label for="3" aria-label="3 Stars">☆</label>
                        <input type="radio" id="4" name="rating" value="4" required />
                        <label for="4" aria-label="4 Stars">☆</label>
                        <input type="radio" id="5" name="rating" value="5" required />
                        <label for="5" aria-label="5 Stars">☆</label>
                    </div> --}}

                {{--  </div>
            </fieldset>

            <input class="review__button" type="submit" value="Submit Review" /> --}}
        </form>
    </section>
</div>

@endsection


@section('script')
<script src="{{ URL::asset('js/feedback.js') }}"></script>
@endsection
