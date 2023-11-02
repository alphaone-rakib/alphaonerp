@extends('layouts.master')
@section('title')
    @lang('User')
@endsection
@section('css')
    <link rel="stylesheet" href="{{ URL::asset('assets/libs/multi.js/multi.js.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/dropify/dist/css/dropify.min.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    @component('components.breadcrumb')
        @slot('li_1')
            @lang('User')
        @endslot
        @slot('title')
            @lang('Edit User')
        @endslot
    @endcomponent
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <ul class="nav nav-tabs nav-justified mb-3" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-bs-toggle="tab" href="#user_tab" role="tab"
                                aria-selected="false">
                                @lang('Basic User')
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#business_tab" role="tab" aria-selected="false">
                                @lang('Assign Business Profile')
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#company_tab" role="tab"
                                aria-selected="false">
                                @lang('Assign Company')
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#account_action_tab" role="tab"
                                aria-selected="false">
                                @lang('Account Actions')
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="tab-content">
                    <div class="tab-pane active" id="user_tab" role="tabpanel">
                        <form class="form-material form-horizontal" action="{{ route('user.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                            <div class="card-body">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="user_id" class="form-label">@lang('User Id') <b class="ambitious-crimson">*</b></label>
                                            <input id="user_id"  class="form-control @error('user_id') is-invalid @enderror" type="text" name="user_id" value="{{ old('user_id',$user->user_id) }}" placeholder="@lang('Type Your User Id')" required>
                                            @error('user_id')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
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
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
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
                                    <div class="col-md-6">
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
                                            <textarea id="address_one" class="form-control" name="address_one" rows="3" placeholder="@lang('common.enter your address')">{{ $user->address_one }}</textarea>
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
                                            <textarea id="address_two" class="form-control" name="address_two" rows="3" placeholder="@lang('common.enter your address')">{{ $user->address_two }}</textarea>
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
                                            <label for="language" class="form-label">@lang('common.default language')</label>
                                            <select id="language" class="form-control @error('company_email') is-invalid @enderror" data-choices name="language">
                                                @php
                                                    $defaultLang = env('LOCALE_LANG', 'en');
                                                @endphp
                                                <option value="">@lang('common.select language')</option>
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
                                <input type="submit" value="@lang('common.submit')" class="btn btn-info btn-lg" />
                                <a href="{{ route('dashboard') }}" class="btn btn-warning btn-lg float-end">@lang('common.cancel')</a>
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane" id="business_tab" role="tabpanel">
                        <form class="form-material form-horizontal" action="{{ route('user.assignBusinessProfile', $user->id) }}" method="POST" enctype="multipart/form-data">
                            <div class="card-body">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-lg-2"></div>
                                    <div class="col-lg-8">
                                        <div class="mt-4 mt-lg-0">
                                            <h5 class="fs-14 mb-1">Assign Business Profile</h5>
                                            <p class="text-muted">Select One or More Business Profile To The User</p>
                                            <select required multiple="multiple" name="assign_business_role[]" id="multiselect-header">
                                                @foreach($roleNames as $key => $value)
                                                    <option value="{{ $key }}" @if(in_array($key, $roles)) selected @endif>{{ $value }}</option>
                                                @endforeach
                                            </select>
                                            @error('assign_business_role')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-2"></div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <input type="submit" value="@lang('common.submit')" class="btn btn-info btn-lg" />
                                        <a href="{{ route('dashboard') }}" class="btn btn-warning btn-lg float-end">@lang('common.cancel')</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane" id="company_tab" role="tabpanel">
                        <form class="form-material form-horizontal" action="{{ route('user.assignCompany', $user->id) }}" method="POST" enctype="multipart/form-data">
                            <div class="card-body">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-lg-2"></div>
                                    <div class="col-lg-8">
                                        <div class="verti-sitemap">
                                            <ul class="list-unstyled mb-0">
                                                <li class="p-0 parent-title">
                                                    <a href="javascript: void(0);" class="fw-medium fs-14">@lang('Assign Company & Plant')</a>
                                                </li>
                                                @foreach($companyNames as $company)
                                                <div class="first-list">
                                                    <div class="list-wrap">
                                                        <div class="form-check form-check-primary">
                                                            <input id="{{"c_".$company->id}}" class="form-check-input authorized_menu_click" type="checkbox" name="company[]" table_id="{{ $company->id }}" value="{{ $company->id }}" @if(in_array($company->id, $selectedCompany)) checked @endif style="margin-left: -26px !important">
                                                            <label for="{{"c_".$company->id}}" class="form-label">{{ucfirst($company->name)." ( Company )"}}</label>
                                                        </div>
                                                    </div>
                                                    @foreach($company->plants as $child)
                                                    <ul class="second-list list-unstyled">
                                                        <li>
                                                            <div class="form-check form-check-secondary">
                                                                <input id="{{"p_".$child->id}}" class="form-check-input authorized_menu_click" type="checkbox" name="plants[]" table_id="{{ $child->id }}" value="{{ $child->id }}" @if(in_array($child->id, $selectedPlant)) checked @endif style="margin-left: -26px !important">
                                                                <label for="{{"p_".$child->id}}" class="form-label">{{ucfirst($child->name)." ( Plant )"}}</label>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                    @endforeach
                                                </div>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <input type="submit" value="@lang('common.submit')" class="btn btn-info btn-lg" />
                                        <a href="{{ route('dashboard') }}" class="btn btn-warning btn-lg float-end">@lang('common.cancel')</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane" id="account_action_tab" role="tabpanel">
                        <form class="form-material form-horizontal" action="{{ route('user.accountAction', $user->id) }}" method="POST" enctype="multipart/form-data">
                            <div class="card-body">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-lg-2"></div>
                                    <div class="col-lg-8">
                                        <div class="mb-3">
                                            <label for="enabled" class="form-label">@lang('Enabled Account') <b
                                                    class="ambitious-crimson">*</b></label>
                                            <select id="enabled" class="form-control @error('enabled') is-invalid @enderror" select2 name="enabled" required>
                                                <option value="1"
                                                    {{ old('enabled',$user->enabled) === 1 ? 'selected' : '' }}> @lang('Enable')
                                                </option>
                                                <option value="0"
                                                    {{ old('enabled',$user->enabled) === 0 ? 'selected' : '' }}> @lang('Disable')
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-2"></div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-2"></div>
                                    <div class="col-lg-8">
                                        <div class="mb-3">
                                            <label for="locked" class="form-label">@lang('Locked') <b class="ambitious-crimson">*</b></label>
                                            <select id="locked" class="form-control @error('locked') is-invalid @enderror" select2 name="locked" required>
                                                <option value="1" {{ old('locked',$user->locked) == 1 ? 'selected' : '' }}>
                                                    @lang('Locaked')
                                                </option>
                                                <option value="0"
                                                    {{ old('locked',$user->locked) == 0 ? 'selected' : '' }}>
                                                    @lang('Unlocked')
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-2"></div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-2"></div>
                                    <div class="col-lg-8">
                                        <div class="mb-3">
                                            <label for="forget-password" class="form-label"><a class="btn btn-outline btn-soft-info shadow-none" href="#">@lang('Reset Password')</a></label>
                                        </div>
                                    </div>
                                    <div class="col-lg-2"></div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <input type="submit" value="@lang('common.submit')" class="btn btn-info btn-lg" />
                                        <a href="{{ route('dashboard') }}" class="btn btn-warning btn-lg float-end">@lang('common.cancel')</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
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

            $('.dropify').dropify();

            $('.select2').select2();

            $("#fiscal_calendar").flatpickr({
                enableTime: false,
                dateFormat: "d-m",
                defaultDate: "1-6"
            });

            $("#production_calendar").flatpickr({
                enableTime: false,
                dateFormat: "d-m",
                defaultDate: "1-6"
            });

            $('#country').on('change', function() {
                var countryId = $(this).val();
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
                                $("#state").append(
                                    '<option>{{ __('Select State') }}</option>');
                                $("#city").append('<option>{{ __('Select City') }}</option>');
                                $.each(html.states, function(key, value) {
                                    $("#state").append('<option value="' + key + '">' +
                                        value + '</option>');
                                });
                                $.each(html.cities, function(key, value) {
                                    $("#city").append('<option value="' + key + '">' +
                                        value + '</option>');
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
        });
    </script>
@endsection
