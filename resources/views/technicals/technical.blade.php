@php
    $title = __('public.Technicals')
@endphp
@extends('layouts.app')

@section('style')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ URL::asset('css/userList.css') }}">
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
            <li>{{ __('public.Technicals') }}</li>
          </ul>
        </div>
    </section>

    <section class="container mx-auto" style="width: 90%">

        <a href="{{ route('createTechnicals') }}" class="btn btn-success">
            <i class="fa-solid fa-user-plus"></i>
            {{ __('public.Create Technical') }}
        </a>

    </section>


    <section class="container mx-auto" style="width: 90%">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="main-box clearfix">
                        <div class="table-responsive">
                            <table class="table user-list">
                                <thead>
                                    <tr>
                                        <th class="text-center"><span>{{ __('auth.Full Name') }}</span></th>
                                        <th class="text-center"><span>{{ __('dashboard.Created_at') }}</span></th>
                                        <th class="text-center"><span>{{ __('public.Role') }}</span></th>
                                        <th class="text-center"><span>{{ __('auth.Email') }}</span></th>
                                        <th class="text-center">&nbsp;</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($tech as $member)
                                        <tr>
                                            <td>
                                                <img src="{{ URL('storage/users/'.$member->image_path) }}" alt="">
                                                <a href="{{ route('showTechnicals', ['id' => $member->id]) }}" class="user-link">
                                                    {{ $member->name }}
                                                </a>
                                                <span class="user-subhead">{{ $member->arabic_name }}</span>
                                            </td>
                                            <td>
                                                {{ str_replace('-', ' ', date('Y-F-d', strtotime($member->created_at))) }}
                                            </td>
                                            <td class="text-center">
                                                @foreach ($member->roles as $role)
                                                    <span class="label label-default">{{ __('dashboard.'.$role->name) }}</span><br>
                                                @endforeach
                                            </td>
                                            <td>
                                                <a href="#">{{ $member->email }}</a>
                                            </td>
                                            <td style="width: 25%;">
                                                <a href="{{ route('showTechnicals', ['id'=> $member->id]) }}" class="table-link text-center" style="margin: 5%;">     
                                                    <span class="fa-stack text-center" style="">
                                                        <i class="fa-solid fa-eye"></i>
                                                    </span>
                                                </a>
                                                <a href="{{ route('EditTechnicals', ['id'=> $member->id]) }}" class="table-link text-center" style="margin: 5%;">     
                                                    <span class="fa-stack text-center" style="">
                                                        <i class="fa-solid fa-pencil"></i>
                                                    </span>
                                                </a>
                                                <a data-bs-toggle="modal" style="cursor: pointer" data-bs-target="#DeleteModal{{ $member->id }}" class="table-link text-center" style="margin: 5%;">     
                                                    <span class="fa-stack text-center" style="">
                                                        <i class="fa-solid fa-trash"></i>
                                                    </span>
                                                </a>

                                                <!-- Modal -->
                                                <div class="modal fade" style="z-index: 99999999999" id="DeleteModal{{ $member->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="DeleteModalLabel{{ $member->id }}" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="DeleteModalLabel{{ $member->id }}">{{ __('public.Delete') }}</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body"
                                                        @if (strtolower(language()->getCode()) == 'en')
                                                            style="text-align: left"
                                                        @elseif (strtolower(language()->getCode()) == 'ar')
                                                            style="text-align: right"
                                                        @endif
                                                        >
                                                            {{ __('public.Do You Want to Delete this user:') }}<br>
                                                            <b>{{ $member->name }}</b>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('public.close') }}</button>
                                                            <a class="btn btn-danger" href="{{ route('DeleteTechnicals', ['id' => $member->id]) }}">{{ __('public.Delete') }}</a>
                                                        </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection