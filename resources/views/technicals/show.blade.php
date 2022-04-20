@php
    $title = __('public.Show')
@endphp
@extends('layouts.app')

@section('style')
    <link rel="stylesheet" href="{{ asset('css/showProfile.css') }}">
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

@foreach ($tech as $member)
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
            <li>{{ __('public.Technicals') }}</li>
          </ul>
        </div>
    </section>

    <div class="container">
        <div class="main-body">
            <div class="row gutters-sm">
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-column align-items-center text-center">
                                <img src="{{ URL('storage/users/'.$member->image_path) }}" alt="Admin" class="rounded-circle" style="width: 225px;height: 200px;">
                                <div class="mt-3">
                                    <h4>{{ $member->arabic_name }} | {{ $member->name }}</h4>
                                    <p class="text-secondary mb-1">
                                        @foreach ($member->roles as $role)
                                            <span title="{{ $role->description }}">
                                                | {{ $role->name }} |
                                            </span> 
                                        @endforeach
                                    </p>
                                    <p class="text-secondary mb-1">{{ __('public.Jobs') }} => {{ count($member->getJobs) }}</p>
                                    <p class="text-secondary mb-1">
                                        <div style="width: 42%; float:left;padding: 10px;">
                                            <span style="margin-left: 10px">{{ __('public.Joined at') }}</span>
                                        </div>
                                        <div style="width: 58%; float:right;padding: 10px;">
                                            <span>{{ str_replace('-', ' ', date('Y-F-d', strtotime($member->created_at))) }}</span>
                                        </div>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">{{ __('auth.Full Name') }}</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{ $member->name }}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">{{ __('auth.Full Name') }}</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{ $member->arabic_name }}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">{{ __('auth.Email') }}</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{ $member->email }}
                                </div>
                            </div>
                            <hr>
                            @foreach ($member->getPhones as $phone)
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">{{ __('auth.Phone') }}</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        {{ $phone->phone }}
                                    </div>
                                </div>
                                <hr>
                            @endforeach
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">{{ __('auth.Address') }}</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{ $member->getAddress[0]->address }}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-12">
                                    <a class="btn btn-success" style="color: #fff" href="{{ route('EditTechnicals', ['id'=> $member->id]) }}"><i class="fa-solid fa-pen-to-square"></i> {{ __('public.Edit Data') }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
        
                    <div class="row gutters-sm">
                        <div class="col-sm-6 mb-3">
                            <div class="card h-100">
                                <div class="card-body">
                                    <h6 class="d-flex align-items-center mb-3" style="text-align: {{ $align }}">
                                        <i class="material-icons text-primary mr-2">{{ __('public.Current Jobs') }}</i>
                                    </h6>
                                    @foreach ($member->getJobs as $job)
                                        @if ($job->status == 1)
                                            <div style="border: 1px solid #ddd;min-height: 70px;">
                                                <div style="width: 40%; float:left;padding: 10px;">
                                                    <div style="margin-left: 10px">{{ __('dashboard.Company') }}</div>
                                                    <div style="margin-left: 10px">{{ __('public.Updated at') }}</div>
                                                </div>
                                                <div style="width: 60%; float:right;padding: 10px;">
                                                    <div><a href="{{ route('ShowJob', ['id' => $job->id]) }}">{{ $job->company_name }}</a></div>
                                                    <div>{{ str_replace('-', ' ', date('Y-F-d', strtotime($job->updated_at))) }}</div>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 mb-3">
                            <div class="card h-100">
                                <div class="card-body">
                                    <h6 class="d-flex align-items-center mb-3" style="text-align: {{ $align }}">
                                        <i class="material-icons text-primary mr-2">{{ __('public.Finished Jobs') }}</i>
                                    </h6>
                                    {{-- {{ dd($member->getJobs) }} --}}
                                    @foreach ($member->getJobs as $job)
                                        @if ($job->status == 2)
                                            <div style="border: 1px solid #ddd;min-height: 70px;">
                                                <div style="width: 40%; float:left;padding: 10px;">
                                                    <div style="margin-left: 10px">{{ __('dashboard.Company') }}</div>
                                                    <div style="margin-left: 10px">{{ __('public.Updated at') }}</div>
                                                </div>
                                                <div style="width: 60%; float:right;padding: 10px;">
                                                    <div><a href="{{ route('ShowJob', ['id' => $job->id]) }}">{{ $job->company_name }}</a></div>
                                                    <div>{{ str_replace('-', ' ', date('Y-F-d', strtotime($job->updated_at))) }}</div>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach

@endsection