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
            <li>
                {{ Auth::user()->checkRole('Admin') ? __('dashboard.Admin') : __('dashboard.Technical') }}
            </li>
            <li>{{ __('dashboard.Dashboard') }}</li>
          </ul>
        </div>
    </section>

    <section class="section main-section">
        @if (Auth::user()->checkRole('Admin'))
            <div class="grid gap-6 grid-cols-1 md:grid-cols-3 mb-6">
                <div class="card">
                    <div class="card-content">
                        <div class="flex items-center justify-between">
                            <div class="widget-label">
                                <h3>
                                    {{ __('public.Technicals') }}
                                </h3>
                                <h1>
                                    {{ $count_tech }}
                                </h1>
                            </div>
                            <span class="icon widget-icon text-green-500"><i class="mdi mdi-account-multiple mdi-48px"></i></span>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-content">
                        <div class="flex items-center justify-between">
                            <div class="widget-label">
                                <h3>
                                    {{ __('public.Jobs') }}
                                </h3>
                                <h1>
                                    {{ $count_job }}
                                </h1>
                            </div>
                            <span class="icon widget-icon text-blue-500"><i class="mdi mdi-cart-outline mdi-48px"></i></span>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-content">
                    <div class="flex items-center justify-between">
                        <div class="widget-label">
                        <h3>
                            {{ __('public.Growth Ration') }}
                        </h3>
                        <h1>
                            {{ $growth }}%
                        </h1>
                        </div>
                        <span class="icon widget-icon text-red-500"><i class="mdi mdi-finance mdi-48px"></i></span>
                    </div>
                    </div>
                </div>
            </div>
        @endif


        <div class="notification blue">
            <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0">
                <div>
                <span class="icon"><i class="mdi mdi-buffer"></i></span>
                <b>{{ __('public.Get The Latest 10 records') }}</b>
                </div>
                <button type="button" class="button small textual --jb-notification-dismiss">{{ __('public.Dismiss') }}</button>
            </div>
        </div>

        <div class="card has-table">
            <header class="card-header">
                @if (strtolower(language()->getCode()) == 'en')
                    <p class="card-header-title">
                        <span class="icon"><i class="mdi mdi-account-multiple"></i></span>
                        {{ Auth::user()->checkRole('Admin') ? __('public.Jobs') : __('public.Current Jobs') }}
                    </p>
                    <a href="{{ Auth::user()->checkRole('Admin') ? route('AdminDashboard') : route('TechnicalDashboard') }}" class="card-header-icon">
                        <span class="icon"><i class="mdi mdi-reload"></i></span>
                    </a>
                @elseif (strtolower(language()->getCode()) == 'ar')
                    <a href="{{ Auth::user()->checkRole('Admin') ? route('AdminDashboard') : route('TechnicalDashboard') }}" class="card-header-icon">
                        <span class="icon"><i class="mdi mdi-reload"></i></span>
                    </a>
                    <p class="card-header-title" style="text-align: right;display: inline">
                        {{ Auth::user()->checkRole('Admin') ? __('public.Jobs') : __('public.Current Jobs') }}
                        <span class="icon"><i class="mdi mdi-account-multiple"></i></span>
                    </p>
                @endif
            </header>
            <div class="card-content">
                <table class="table">
                    <thead>
                        <tr>
                            @php
                                $heads = array('', 'Company', 'Email', 'Description', 'Status', 'Created_at', 'Updated_at', 'AssignTo', '')
                            @endphp

                            @foreach ($heads as $head)
                                <th>{{ __('dashboard.'.$head) }}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        @if (Auth::user()->checkRole('Admin'))
                            @php
                                $jobs = \App\Http\Controllers\JobController::latest();
                            @endphp
                        @endif
                        @if (Auth::user()->checkRole('Technical'))
                            @php
                                $jobs = \App\Http\Controllers\JobController::MYlatest(Auth::user()->id);
                            @endphp
                        @endif
                        @foreach ($jobs as $job)
                            <tr style="cursor: pointer;">
                                <td class="image-cell">
                                    <div
                                        class="image"
                                        style="border: 1px solid #000;border-radius: 100%;text-align: center;background: #eee;"
                                    >
                                        <i class="fa-solid fa-{{ strtolower(substr($job->company_name, 0, 1)) }}"></i>
                                    </div>
                                </td>
                                <td data-label="{{ __('dashboard.Company') }}">
                                    <a href="{{ Auth::user()->checkRole('Admin') ? route('ShowJob', ['id' => $job->id]) : route('Job.Show', ['id' => $job->id]) }}">
                                        {{ $job->company_name }}
                                    </a>
                                </td>
                                <td data-label="{{ __('dashboard.Email') }}">{{ $job->email }}</td>
                                <td data-label="{{ __('dashboard.Description') }}">{{ $job->description }}</td>
                                <td data-label="{{ __('dashboard.Status') }}">
                                    @if ($job->status == 0)
                                        <label
                                            class="badge badge-info"
                                            style="background: #A461D8"
                                        >
                                            {{ __('public.New') }}
                                        </label>
                                    @elseif ($job->status == 1)
                                        <label
                                            class="badge badge-warning"
                                            style="background: #FFC542"
                                        >
                                            {{ __('public.Current') }}
                                        </label>
                                    @elseif ($job->status == 2)
                                        <label
                                            class="badge badge-success"
                                            style="background: #44CE42"
                                        >
                                            {{ __('public.Finished') }}
                                        </label>
                                    @elseif ($job->status == 3)
                                        <label
                                            class="badge badge-danger"
                                            style="background: #FC5A5A"
                                        >
                                            {{ __('public.Canceled') }}
                                        </label>
                                    @endif
                                </td>
                                <td data-label="{{ __('dashboard.Created_at') }}">
                                    {{ App\Http\Controllers\FeedbackController::time_elapsed_string($job->created_at) }}
                                </td>
                                <td data-label="{{ __('dashboard.Updated_at') }}">
                                    {{ App\Http\Controllers\FeedbackController::time_elapsed_string($job->updated_at) }}
                                </td>
                                <td data-label="{{ __('dashboard.AssignTo') }}">
                                    @if ($job->status != 0)
                                        {{ $job->getTechnical[0]->name }}
                                    @else
                                        -
                                    @endif
                                </td>
                                <td class="actions-cell">
                                    <div class="buttons right nowrap">
                                        <a href="{{ Auth::user()->checkRole('Admin') ? route('ShowJob', ['id' => $job->id]) : route('Job.Show', ['id' => $job->id]) }}" class="button small green --jb-modal"  data-target="sample-modal-2" type="button">
                                            <span class="icon"><i class="mdi mdi-eye"></i></span>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>
@endsection
