@extends('layouts.master')
@section('title')
    @lang('Customer')
@endsection
@section('css')
    <link rel="stylesheet" href="{{ URL::asset('assets/libs/multi.js/multi.js.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/dropify/dist/css/dropify.min.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    @component('components.breadcrumb')
        @slot('li_1')
            @lang('Customer')
        @endslot
        @slot('title')
            @lang('Edit Customer')
        @endslot
    @endcomponent
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <ul class="nav nav-tabs nav-justified mb-3" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-bs-toggle="tab" href="#customer_tab" role="tab"
                                aria-selected="false">
                                @lang('Customer Info')
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#shipping_tab" role="tab" aria-selected="false">
                                @lang('Shipping Info')
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#bill_tab" role="tab"
                                aria-selected="false">
                                @lang('Billing Info')
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#account_action_tab" role="tab"
                                aria-selected="false">
                                @lang('Contact Info & Primary Contact')
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="tab-content">
                    <div class="tab-pane active" id="customer_tab" role="tabpanel">
                        <form class="form-material form-horizontal" action="{{ route('customer.update', $customer->id) }}" method="POST" enctype="multipart/form-data">
                            <div class="card-body">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="name" class="form-label">@lang('Name') <b class="ambitious-crimson">*</b></label>
                                            <input id="name"  class="form-control @error('name') is-invalid @enderror" type="text" name="name" value="{{ old('name', $customer->name) }}" placeholder="@lang('Type Your Customer Name')" required>
                                            @error('name')
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
                                            <input id="address_one"  class="form-control @error('address_one') is-invalid @enderror" type="text" name="address_one" value="{{ old('address_one', $customer->address_one) }}" placeholder="@lang('Type Your Address One')">
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
                                            <input id="address_two"  class="form-control @error('address_two') is-invalid @enderror" type="text" name="address_two" value="{{ old('address_two',$customer->address_two) }}" placeholder="@lang('Type Your Address Two')">
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
                                                <option value="{{ $key }}" {{ old('country',$customer->country) == $key ? 'selected' : '' }} >{{ $value }}</option>
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
                                        <div class="mb-2">
                                            <label for="state" class="form-label">@lang('State') <b class="ambitious-crimson">*</b></label>
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
                                                <option value="{{ $key }}" {{ old('city',$customer->city) == $key ? 'selected' : '' }} >{{ $value }}</option>
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
                                            <input id="zip_code" class="form-control @error('zip_code') is-invalid @enderror" type="text" name="zip_code" value="{{ old('zip_code',$customer->zip_code) }}" placeholder="@lang('Type Your Zip Code')">
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
                                            <label for="phone" class="form-label">@lang('Phone')</label>
                                            <input id="phone"  class="form-control @error('phone') is-invalid @enderror" type="text" name="phone" value="{{ old('phone', $customer->phone) }}" placeholder="@lang('Type Your Phone Number')">
                                            @error('phone')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="fax" class="form-label">@lang('Fax')</label>
                                            <input id="fax"  class="form-control @error('fax') is-invalid @enderror" type="text" name="fax" value="{{ old('fax', $customer->fax) }}" placeholder="@lang('Type Your Fax Address')">
                                            @error('fax')
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
                                            <label for="email" class="form-label">@lang('Email')</label>
                                            <input id="email"  class="form-control @error('email') is-invalid @enderror" type="text" name="email" value="{{ old('email', $customer->email) }}" placeholder="@lang('Type Your Email Address')">
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="url" class="form-label">@lang('URL')</label>
                                            <input id="url"  class="form-control @error('url') is-invalid @enderror" type="text" name="url" value="{{ old('url', $customer->url) }}" placeholder="@lang('Type Your URL Address')">
                                            @error('url')
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
                                <a href="{{ route('dashboard.index') }}" class="btn btn-warning btn-lg float-end">@lang('common.cancel')</a>
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane" id="shipping_tab" role="tabpanel">
                        <form class="form-material form-horizontal" action="{{ route('customer.shippingUpdate', $customer->id) }}" method="POST" enctype="multipart/form-data">
                            <div class="card-body">
                                @csrf
                                @method('PUT')
                            </div>
                            <div class="card-footer">
                                <input type="submit" value="@lang('common.submit')" class="btn btn-info btn-lg" />
                                <a href="{{ route('dashboard.index') }}" class="btn btn-warning btn-lg float-end">@lang('common.cancel')</a>
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane" id="bill_tab" role="tabpanel">
                        <form class="form-material form-horizontal" action="{{ route('customer.billUpdate', $customer->id) }}" method="POST" enctype="multipart/form-data">
                            <div class="card-body">
                                @csrf
                                @method('PUT')
                            </div>
                            <div class="card-footer">
                                <input type="submit" value="@lang('common.submit')" class="btn btn-info btn-lg" />
                                <a href="{{ route('dashboard.index') }}" class="btn btn-warning btn-lg float-end">@lang('common.cancel')</a>
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane" id="account_action_tab" role="tabpanel">
                        <form class="form-material form-horizontal" action="{{ route('customer.accountUpdate', $customer->id) }}" method="POST" enctype="multipart/form-data">
                            <div class="card-body">
                                @csrf
                                @method('PUT')
                            </div>
                            <div class="card-footer">
                                <input type="submit" value="@lang('common.submit')" class="btn btn-info btn-lg" />
                                <a href="{{ route('dashboard.index') }}" class="btn btn-warning btn-lg float-end">@lang('common.cancel')</a>
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
            let selectState = {{ $customer->state ? $customer->state : '2336' }};
            let selectCity = {{ $customer->city ? $customer->city : '48615' }};
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
