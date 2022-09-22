@php
    $title = __('public.Settings')
@endphp
@extends('layouts.app')


@section('style')
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" id="mce-u0" referrerpolicy="origin" href="https://cdn.tiny.cloud/1/no-api-key/tinymce/5.10.3-128/skins/ui/oxide/skin.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
@endsection

@section('content')
<div class="container">
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
            <li>{{ __('public.Settings') }}</li>
          </ul>
        </div>
    </section>
    <div class="content-box">
        @foreach ($site as $item)
            <form id="updateForm" action="{{ route('updateSetting', ['id' => $item->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col">
                        @if (strtolower(language()->getCode()) == 'en')
                            <div class="form-group">
                                <label>{{ __('setting.Website Title') }} <span style="color:red">*</span></label>
                                <input type="text" name="website_title" value="{{ $item->website_title }}" class="form-control" required>
                        @elseif (strtolower(language()->getCode()) == 'ar')
                            <div class="form-group" style="text-align: right">
                                <label><span style="color:red">*</span> {{ __('setting.Website Title') }}</label>
                                <input type="text" style="text-align: right" name="website_title" value="{{ $item->website_title }}" class="form-control" required>
                        @endif
                        </div>
                    </div>
                    <div class="col">
                        @if (strtolower(language()->getCode()) == 'en')
                            <div class="form-group">
                                <label>{{ __('setting.Website Title Arabic') }} <span style="color:red">*</span></label>
                                <input type="text" name="website_name" value="{{ $item->website_arabic }}" class="form-control" required>
                        @elseif (strtolower(language()->getCode()) == 'ar')
                            <div class="form-group" style="text-align: right">
                                <label><span style="color:red">*</span> {{ __('setting.Website Title Arabic') }}</label>
                                <input type="text" style="text-align: right" name="website_name" value="{{ $item->website_arabic }}" class="form-control" required>
                        @endif
                        </div>
                    </div>
                </div>
{{--
                <div class="row">
                    @if (strtolower(language()->getCode()) == 'en')
                    <div class="col">
                        <label>{{ __('setting.Website Logo') }} <span style="color:red">*</span></label>
                        <div class="custom-file mb-3">
                            <input type="file" class="custom-file-input" id="customFile" name="website_logo">
                            <label class="custom-file-label" for="customFile">{{ __('setting.Choose File') }}</label>
                        </div>
                    @elseif (strtolower(language()->getCode()) == 'ar')
                    <div class="col" style="text-align: right">
                        <label><span style="color:red">*</span> {{ __('setting.Website Logo') }} </label>
                        <div class="custom-file mb-3">
                            <input type="file" class="custom-file-input" id="customFile" name="website_logo">
                            <label class="custom-file-label" style="padding-right: 20%" for="customFile">{{ __('setting.Choose File') }}</label>
                        </div>
                    @endif
                        <div class="form-group">
                            <img src="{{ URL('storage/'.$item->website_logo) }}" width="200px" height="50px">
                            <input type="hidden" class="custom-file-input" id="customFile" value="{{ $item->website_logo }}" name="hidden_logo">
                        </div>
                    </div>


                    @if (strtolower(language()->getCode()) == 'en')
                    <div class="col">
                        <label>{{ __('setting.Website Favicon') }} <span style="color:red">*</span></label>
                        <div class="custom-file mb-3">
                            <input type="file" class="custom-file-input" id="customFile" name="website_favicon">
                            <label class="custom-file-label" for="customFile">{{ __('setting.Choose File') }}</label>
                        </div>
                    @elseif (strtolower(language()->getCode()) == 'ar')
                    <div class="col" style="text-align: right">
                        <label><span style="color:red">*</span> {{ __('setting.Website Favicon') }} </label>
                        <div class="custom-file mb-3">
                            <input type="file" class="custom-file-input" id="customFile" name="website_favicon">
                            <label class="custom-file-label" style="padding-right: 20%" for="customFile">{{ __('setting.Choose File') }}</label>
                        </div>
                    @endif

                        <div class="form-group">
                            <img src="{{ URL('storage/'.$item->website_favicon) }}" width="30px" height="30px">
                            <input type="hidden" class="custom-file-input" id="customFile" value="{{ $item->website_favicon }}" name="hidden_logo">
                        </div>
                    </div>
                </div> --}}

                <div class="row">
                    <div class="col">
                        @if (strtolower(language()->getCode()) == 'en')
                            <div class="form-group">
                                <label>{{ __('auth.Email') }} <span style="color:red">*</span></label>
                                <input type="email" name="website_email" value="{{ $item->email }}" class="form-control" required>
                        @elseif (strtolower(language()->getCode()) == 'ar')
                            <div class="form-group" style="text-align: right">
                                <label><span style="color:red">*</span> {{ __('auth.Email') }}</label>
                                <input type="email" style="text-align: right" name="website_email" value="{{ $item->email }}" class="form-control" required>
                        @endif
                        </div>
                    </div>
                    <div class="col">
                        @if (strtolower(language()->getCode()) == 'en')
                            <div class="form-group">
                                <label>{{ __('auth.Address') }} <span style="color:red">*</span></label>
                                <input type="text" name="website_address" value="{{ $item->address }}" class="form-control" required>
                        @elseif (strtolower(language()->getCode()) == 'ar')
                            <div class="form-group" style="text-align: right">
                                <label><span style="color:red">*</span> {{ __('auth.Address') }}</label>
                                <input type="text" style="text-align: right" name="website_address" value="{{ $item->address }}" class="form-control" required>
                        @endif
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col">
                        @if (strtolower(language()->getCode()) == 'en')
                            <div class="form-group">
                                <label>{{ __('auth.Phone') }}<span style="color:red">*</span></label>
                                <input type="text" name="website_phone1" value="{{ $item->phone1 }}" class="form-control" required>
                        @elseif (strtolower(language()->getCode()) == 'ar')
                            <div class="form-group" style="text-align: right">
                                <label><span style="color:red">*</span> {{ __('auth.Phone') }}</label>
                                <input type="text" style="text-align: right" name="website_phone1" value="{{ $item->phone1 }}" class="form-control" required>
                        @endif
                        </div>
                    </div>
                    <div class="col">
                        @if (strtolower(language()->getCode()) == 'en')
                            <div class="form-group">
                                <label>{{ __('auth.Phone') }}</label>
                                <input type="text" name="website_phone2" value="{{ $item->phone2 }}" class="form-control">
                        @elseif (strtolower(language()->getCode()) == 'ar')
                            <div class="form-group" style="text-align: right">
                                <label>{{ __('auth.Phone') }}</label>
                                <input type="text" style="text-align: right" name="website_phone2" value="{{ $item->phone2 }}" class="form-control">
                        @endif
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col">
                        @if (strtolower(language()->getCode()) == 'en')
                            <div class="form-group">
                                <label>{{ __('setting.Meta Keyword') }} <span style="color:red">*</span></label>
                                <input type="text" name="meta_keyword" value="{{ $item->meta_keyword }}" class="form-control" required>
                        @elseif (strtolower(language()->getCode()) == 'ar')
                            <div class="form-group" style="text-align: right">
                                <label><span style="color:red">*</span> {{ __('setting.Meta Keyword') }}</label>
                                <input type="text" style="text-align: right" name="meta_keyword" value="{{ $item->meta_keyword }}" class="form-control" required>
                        @endif
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        @if (strtolower(language()->getCode()) == 'en')
                            <div class="form-group">
                                <label>{{ __('setting.Meta Description') }} <span style="color:red">*</span></label>
                                <input type="text" name="meta_description" value="{{ $item->meta_description }}" class="form-control" required>
                        @elseif (strtolower(language()->getCode()) == 'ar')
                            <div class="form-group" style="text-align: right">
                                <label><span style="color:red">*</span> {{ __('setting.Meta Description') }}</label>
                                <input type="text" style="text-align: right" name="meta_description" value="{{ $item->meta_description }}" class="form-control" required>
                        @endif
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <button type="submit" class="btn btn-block btn-success">{{ __('setting.Update') }}</button>
                        </div>
                    </div>
                </div>
            </form>
        @endforeach
    </div>
</div>
@endsection
