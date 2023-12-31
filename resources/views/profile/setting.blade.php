@extends('layouts.master')
@section('title')
    @lang('Setting')
@endsection
@section('css')
    <link rel="stylesheet" href="{{ URL::asset('assets/libs/multi.js/multi.js.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/dropify/dist/css/dropify.min.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    @component('components.breadcrumb')
        @slot('li_1')
            @lang('Setting')
        @endslot
        @slot('title')
            @lang('Account Setting')
        @endslot
    @endcomponent
    <div class="row">
        <div class="col-lg-12">
            <form class="form-material form-horizontal" action="{{ route('profile.updateSetting') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <div class="card-header align-items-center d-flex">
                        <h4 class="card-title mb-0 flex-grow-1">@lang('Basic Account Setting')</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="f_name" class="form-label">@lang('First Name') <b class="ambitious-crimson">*</b></label>
                                    <input id="f_name"  class="form-control @error('f_name') is-invalid @enderror" type="text" name="f_name" value="{{ old('f_name',$user->f_name) }}" placeholder="@lang('Type Your First Name')" required>
                                    @error('f_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="m_name" class="form-label">@lang('Middle Initial') <b class="ambitious-crimson">*</b></label>
                                    <input id="m_name"  class="form-control @error('m_name') is-invalid @enderror" type="text" name="m_name" value="{{ old('m_name',$user->m_name) }}" placeholder="@lang('Type Your Middle Name')" required>
                                    @error('m_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="l_name" class="form-label">@lang('Last Initial') <b class="ambitious-crimson">*</b></label>
                                    <input id="l_name"  class="form-control @error('l_name') is-invalid @enderror" type="text" name="l_name" value="{{ old('l_name',$user->l_name) }}" placeholder="@lang('Type Your Last Name')" required>
                                    @error('l_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="address_one" class="form-label">@lang('Address One')</label>
                                    <textarea id="address_one" class="form-control" name="address_one" rows="3" placeholder="@lang('Enter Your Address')">{{ $user->address_one }}</textarea>
                                    @error('address_one')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="address_two" class="form-label">@lang('Address Two')</label>
                                    <textarea id="address_two" class="form-control" name="address_two" rows="3" placeholder="@lang('Enter Your Address')">{{ $user->address_two }}</textarea>
                                    @error('address_two')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="country" class="form-label">@lang('Country') <b class="ambitious-crimson">*</b></label>
                                    <select id="country" class="form-control @error('country') is-invalid @enderror select2" name="country" required>
                                        <option value="">@lang('Select Country')</option>
                                        @foreach($countriesList as $key => $value)
                                        <option value="{{ $key }}" {{ old('country',$user->country) == $key ? 'selected' : '' }} >{{ $value }}</option>
                                        @endforeach
                                    </select>
                                    @error('country')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="state" class="form-label">@lang('State')<b class="ambitious-crimson">*</b></label>
                                    <select id="state" class="form-control @error('state') is-invalid @enderror select2" name="state" required>
                                        <option value="">@lang('Select State')</option>
                                    </select>
                                    @error('state')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="city" class="form-label">@lang('City')</label>
                                    <select id="city" class="form-control @error('city') is-invalid @enderror select2" name="city">
                                        <option value="">@lang('Select City')</option>
                                        @foreach($countriesList as $key => $value)
                                        <option value="{{ $key }}" {{ old('city',$user->city) == $key ? 'selected' : '' }} >{{ $value }}</option>
                                        @endforeach
                                    </select>
                                    @error('city')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="zip_code" class="form-label">@lang('Zip Code')</label>
                                    <input id="zip_code" class="form-control @error('zip_code') is-invalid @enderror" type="text" name="zip_code" value="{{ old('zip_code',$user->zip_code) }}" placeholder="@lang('Type Your Zip Code')">
                                    @error('zip_code')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="office_phone" class="form-label">@lang('Office Phone')</label>
                                    <input id="office_phone" class="form-control @error('office_phone') is-invalid @enderror" type="text" name="office_phone" value="{{ old('office_phone',$user->office_phone) }}" placeholder="@lang('Type Your Office Phone Number')">
                                    @error('office_phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="cell_phone" class="form-label">@lang('Cell Phone')</label>
                                    <input id="cell_phone" class="form-control @error('cell_phone') is-invalid @enderror" type="text" name="cell_phone" value="{{ old('cell_phone',$user->cell_phone) }}" placeholder="@lang('Type Your Cell Phone Number')">
                                    @error('cell_phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="email" class="form-label">@lang('Email') <b class="ambitious-crimson">*</b></label>
                                    <input id="email" class="form-control @error('email') is-invalid @enderror" type="email" name="email" value="{{ old('email',$user->email) }}" placeholder="@lang('Type Your Email Address')" required>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="language" class="form-label">@lang('Default Language')</label>
                                    <select id="language" class="form-control @error('company_email') is-invalid @enderror" data-choices name="language">
                                        @php
                                            $defaultLang = env('LOCALE_LANG', 'en');
                                        @endphp
                                        <option value="">@lang('Select Language')</option>
                                        @foreach($getLang as $key => $value)
                                            <option value="{{ $key }}" {{ old('language', $user->language) == $key ? 'selected' : '' }} >{{ $value }}</option>
                                        @endforeach
                                    </select>
                                    @error('language')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <input type="submit" value="@lang('Submit')" class="btn btn-info btn-lg" />
                        <a href="{{ route('dashboard.index') }}" class="btn btn-warning btn-lg float-end">@lang('Cancel')</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ URL::asset('assets/libs/multi.js/multi.js.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/pages/form-advanced.init.js') }}"></script>
    <script src="{{ URL::asset('assets/dropify/dist/js/dropify.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="{{ URL::asset('assets/js/app.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            "use strict";

            var countryId = $("#country").val();

            let selectState = {{ $user->state ? $user->state : '2336' }};
            let selectCity = {{ $user->city ? $user->city : '48615' }};

            if (countryId) {
                $.ajax({
                    url: '{{ url('company/selectedStateData') }}',

                    type: "GET",
                    dataType: 'JSON',
                    data: {
                        countryId: countryId
                    },
                    success: function(html) {
                        if (html) {
                            $("#state").empty();
                            $("#city").empty();
                            $("#state").append('<option>{{ __('Select State') }}</option>');
                            $("#city").append('<option>{{ __('Select City') }}</option>');
                            $.each(html.states, function(key, value) {
                                if (key == selectState) {
                                    $("#state").append('<option selected="selected" value="' +
                                        key + '">' + value + '</option>');
                                } else {
                                    $("#state").append('<option value="' + key + '">' + value +
                                        '</option>');
                                }
                            });
                            $.each(html.cities, function(key, value) {
                                if (key == selectCity) {
                                    $("#city").append('<option selected="selected" value="' +
                                        key + '">' + value + '</option>');
                                } else {
                                    $("#city").append('<option value="' + key + '">' + value +
                                        '</option>');
                                }
                            });
                        } else {
                            $("#state").empty();
                            $("#city").empty();
                        }
                    }
                });
            } else {
                $('#state').html('<option value="">{{ __('Select Country First') }}</option>');
                $('#city').html('<option value="">{{ __('Select State First') }}</option>');
            }
        });
    </script>
@endsection