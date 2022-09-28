@php
    $title = __('public.Jobs')
@endphp
@extends('layouts.app')

@section('style')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
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


<style>
    .card {
        width: 80%;
        margin: auto;
        height: auto;
        display: flex;
        background-color: #fff;
        border: 1px solid rgba(59, 58, 58, 0.46);
        border-radius: 20px;
        box-shadow: -10px 5px 10px gray;
        position: relative;
        top: 0;
        transition: top ease 0.5s;
        cursor: pointer;
        padding: 10px
    }

    .card:hover {
        top: -50px;
    }

    .card img {
        width: 100%;
        height: 100%;
        border-radius: 20px;
    }

    .card .row .col-xl-8 .row {
        margin-bottom: 5px
    }
</style>


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
            <li>{{ __('public.My Profile') }}</li>
          </ul>
        </div>
    </section>


    <section class="container mx-auto" style="width: 90%">
      <div class="container">
         <div class="row">
            <div class="col-md-12">
               <div id="content" class="content content-full-width">
                  <!-- begin profile -->
                  <div class="profile">
                     <div class="profile-header">
                        <!-- BEGIN profile-header-cover -->
                        <div class="profile-header-cover"></div>
                        <!-- END profile-header-cover -->
                        <!-- BEGIN profile-header-content -->
                        <div class="profile-header-content" style="height: 170px;">
                           <!-- BEGIN profile-header-img -->
                           <div class="profile-header-img">
                              <img src="{{ URL('storage/users/'.auth()->user()->image_path) }}" alt="">
                           </div>
                           <!-- END profile-header-img -->
                           <!-- BEGIN profile-header-info -->
                           <div class="profile-header-info">
                              <h4 class="m-t-10 m-b-5">{{ auth()->user()->name }}</h4>
                              <p class="m-b-10">{{ auth()->user()->roles[0]->name }}</p>
                              <a href="{{ Auth::user()->checkRole('Admin') ? route('EditProfile') : route('Technical.EditProfile') }}" class="btn btn-sm btn-info mb-2">{{ __('public.Edit Profile') }}</a>
                           </div>
                           <!-- END profile-header-info -->
                        </div>
                        <!-- END profile-header-content -->
                     </div>
                  </div>
                  <!-- end profile -->
                  <!-- begin profile-content -->
                  <div class="profile-content">
                     <!-- begin tab-content -->
                     <div class="tab-content p-0">
                        <!-- begin #profile-post tab -->
                        <div class="tab-pane fade active show" id="profile-post">
                           <!-- begin timeline -->
                           <ul class="timeline">
                              <li>
                                    <!-- begin timeline-time -->
                                    <div class="timeline-time">
                                        <span class="date">{{ str_replace('-', ' ', date('Y-F-d', strtotime(auth()->user()->created_at))) }}</span>
                                        <span class="time">{{ str_replace('-', ' ', date('H:i', strtotime(auth()->user()->created_at))) }}</span>
                                    </div>
                                    <!-- end timeline-time -->
                                    <!-- begin timeline-icon -->
                                    <div class="timeline-icon">
                                        <a href="javascript:;">&nbsp;</a>
                                    </div>
                                    <!-- end timeline-icon -->
                                    <!-- begin timeline-body -->
                                    <div class="timeline-body">
                                        <div class="row">
                                            <div class="col-xl-12">
                                                <div class="row">
                                                    <div class="row"><h2 class="h2">{{ auth()->user()->name }} ({{ auth()->user()->arabic_name }})</h2></div>
                                                    <div class="row"><h5 class="h5 text-muted">{{ auth()->user()->roles[0]->name }}</h5></div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-xl-6"><b>{{ __('auth.Email') }} :</b></div>
                                                    <div class="col-xl-6">{{ auth()->user()->email }}</div>
                                                </div>

                                                <hr>
                                                <div class="row">
                                                    <div class="col-xl-6"><b>{{ __('auth.Phone') }} :</b></div>
                                                    <div class="col-xl-6">{{ auth()->user()->getPhones[0]->phone }}</div>
                                                </div>

                                                @if (isset(auth()->user()->getPhones[1]))
                                                    <hr>
                                                    <div class="row">
                                                        <div class="col-xl-6"><b>{{ __('auth.Phone') }} :</b></div>
                                                        <div class="col-xl-6">{{ auth()->user()->getPhones[1]->phone }}</div>
                                                    </div>
                                                @endif

                                                <hr>
                                                <div class="row">
                                                    <div class="col-xl-6"><b>{{ __('auth.Address') }} :</b></div>
                                                    <div class="col-xl-6">{{ auth()->user()->getAddress[0]->address }}</div>
                                                </div>

                                                <hr>
                                                <div class="row">
                                                    <div class="col-xl-6"><b>{{ __('public.Jobs No.') }} :</b></div>
                                                    <div class="col-xl-6">{{ count(auth()->user()->getJobs) }}</div>
                                                </div>

                                                <hr>
                                                {{-- <div class="row">
                                                    <div class="col-xl-3"><b>LINKED-IN: </b></div>
                                                    <div class="col-xl-9"><a href="{{ $user->linked_in }}">{{ $user->linked_in }}</a></div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-xl-3"><b>GITHUB: </b></div>
                                                    <div class="col-xl-9"><a href="{{ $user->github }}">{{ $user->github }}</a></div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-xl-3"><b>MY SITE: </b></div>
                                                    <div class="col-xl-9"><a href="{{ $user->my_site }}">{{ $user->my_site }}</a></div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-xl-3"><b>Profile: </b></div>
                                                    <div class="col-xl-9">
                                                        {{ $user->profile }}
                                                    </div>
                                                </div> --}}
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end timeline-body -->
                              </li>
                           </ul>
                           <!-- end timeline -->
                        </div>
                        <!-- end #profile-post tab -->
                     </div>
                     <!-- end tab-content -->
                  </div>
                  <!-- end profile-content -->
               </div>
            </div>
         </div>
      </div>
    </section>
</div>
@endsection
