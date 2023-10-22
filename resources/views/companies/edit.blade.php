@extends('layouts.master')
@section('title')
    @lang('Company')
@endsection
@section('css')
    <link rel="stylesheet" href="{{ URL::asset('assets/dropify/dist/css/dropify.min.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    @component('components.breadcrumb')
        @slot('li_1')
            @lang('Company')
        @endslot
        @slot('title')
            @lang('Edit Company')
        @endslot
    @endcomponent
    <div class="row">
        <div class="col-lg-12">
            <form class="form-material form-horizontal" action="{{ route('company.update', $company) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card">
                    <div class="card-header align-items-center d-flex">
                        <h4 class="card-title mb-0 flex-grow-1">@lang('Basic Information')</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="name" class="form-label">@lang('Name') <b
                                            class="ambitious-crimson">*</b></label>
                                    <input id="name" class="form-control @error('name') is-invalid @enderror"
                                        type="text" name="name" value="{{ old('name', $company->name) }}"
                                        placeholder="@lang('Type Your Company Name')" required>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="phone" class="form-label">@lang('Phone') <b
                                            class="ambitious-crimson">*</b></label>
                                    <input id="phone" class="form-control @error('phone') is-invalid @enderror"
                                        type="text" name="phone" value="{{ old('phone', $company->phone) }}"
                                        placeholder="@lang('Type Your Company Phone Number')" required>
                                    @error('phone')
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
                                    <label for="fax" class="form-label">@lang('Fax') </label>
                                    <input id="fax" class="form-control  @error('fax') is-invalid @enderror"
                                        type="text" name="fax" value="{{ old('fax', $company->fax) }}"
                                        placeholder="@lang('Type Company Fax Number')">
                                    @error('fax')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="url" class="form-label">@lang('URL')</label>
                                    <input id="url" class="form-control  @error('url') is-invalid @enderror"
                                        type="text" name="url" value="{{ old('url', $company->url) }}"
                                        placeholder="@lang('Type Company URL Address')">
                                    @error('url')
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
                                    <label for="country" class="form-label">@lang('Country') <b
                                            class="ambitious-crimson">*</b></label>
                                    <select id="country"
                                        class="form-control @error('country') is-invalid @enderror select2" name="country"
                                        required>
                                        <option value="">@lang('Select Country')</option>
                                        @foreach ($countriesList as $key => $value)
                                            <option value="{{ $key }}"
                                                {{ old('country', $company->country) == $key ? 'selected' : '' }}>
                                                {{ $value }}</option>
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
                                    <label for="state" class="form-label">@lang('State')<b
                                            class="ambitious-crimson">*</b></label>
                                    <select id="state" class="form-control @error('state') is-invalid @enderror select2"
                                        name="state" required>
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
                                    <select id="city" class="form-control @error('city') is-invalid @enderror select2"
                                        name="city">
                                        <option value="">@lang('Select City')</option>
                                        @foreach ($countriesList as $key => $value)
                                            <option value="{{ $key }}"
                                                {{ old('city') == $key ? 'selected' : '' }}>{{ $value }}</option>
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
                                    <input id="zip_code" class="form-control @error('zip_code') is-invalid @enderror"
                                        type="text" name="zip_code" value="{{ old('zip_code', $company->zip_code) }}"
                                        placeholder="@lang('Type Your Zip Code')">
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
                                    <label for="company_address_one" class="form-label">@lang('Address One')</label>
                                    <textarea id="company_address_one" class="form-control" name="company_address_one" rows="3"
                                        placeholder="@lang('common.enter your address')">{{ $company->company_address_one }}</textarea>
                                    @error('company_address_two')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="company_address_two" class="form-label">@lang('Address Two')</label>
                                    <textarea id="company_address_two" class="form-control" name="company_address_two" rows="3"
                                        placeholder="@lang('common.enter your address')">{{ $company->company_address_two }}</textarea>
                                    @error('company_address_two')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="logo" class="form-label">@lang('Company Logo')<b
                                            class="ambitious-crimson">*</b></label>
                                    <input id="logo" class="dropify" name="logo" value="{{ old('logo') }}"
                                        type="file" data-allowed-file-extensions="png jpeg jpg"
                                        data-max-file-size="5120K" />
                                    <small id="name" class="form-text text-muted">@lang('Leave Blank For Remain Unchanged')</small>
                                    <p>@lang('Max Size: 5mb, Allowed Format: png, jpeg, jpg')</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header align-items-center d-flex">
                        <h4 class="card-title mb-0 flex-grow-1">@lang('Base Currency & Tax Information')</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="currency_code" class="form-label">@lang('Code') <b
                                            class="ambitious-crimson">*</b></label>
                                    <select id="currency_code"
                                        class="form-control @error('currency_code') is-invalid @enderror select2"
                                        name="currency_code" required>
                                        <option value="">@lang('Select Currency Code')</option>
                                        @foreach ($currencies as $key => $value)
                                            <option value="{{ $key }}"
                                                {{ old('currency_code', $company->currency_code) == $key ? 'selected' : '' }}>
                                                {{ $key }}</option>
                                        @endforeach
                                    </select>
                                    @error('currency_code')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="currency_name" class="form-label">@lang('Currency Name') <b
                                            class="ambitious-crimson">*</b></label>
                                    <input id="currency_name"
                                        class="form-control @error('currency_name') is-invalid @enderror" type="text"
                                        name="currency_name" value="{{ old('currency_name', $company->currency_name) }}"
                                        placeholder="@lang('Type Your Currency Name')" required>
                                    @error('currency_name')
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
                                    <label for="decimal_precision" class="form-label">@lang('Precision')</label>
                                    <input id="decimal_precision"
                                        class="form-control @error('decimal_precision') is-invalid @enderror"
                                        type="text" name="decimal_precision"
                                        value="{{ old('decimal_precision', $company->decimal_precision) }}"
                                        placeholder="@lang('Type Your Currency Precision')">
                                    @error('decimal_precision')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="decimal_mark" class="form-label">@lang('Decimal Mark')</label>
                                    <input id="decimal_mark"
                                        class="form-control @error('decimal_mark') is-invalid @enderror" type="text"
                                        name="decimal_mark"
                                        value="{{ old('decimal_mark', $company->currency_decimal_mark) }}"
                                        placeholder="@lang('Type Your Currency Decimal Mark')">
                                    @error('decimal_mark')
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
                                    <label for="currency_symbol" class="form-label">@lang('Symbol') <b
                                            class="ambitious-crimson">*</b></label>
                                    <input id="currency_symbol"
                                        class="form-control @error('currency_symbol') is-invalid @enderror"
                                        type="text" name="currency_symbol"
                                        value="{{ old('currency_symbol', $company->currency_symbol) }}"
                                        placeholder="@lang('Type Your Currency Symbol')" required>
                                    @error('currency_symbol')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="currency_symbol_first" class="form-label">@lang('Symbol Position') <b
                                            class="ambitious-crimson">*</b></label>
                                    <select id="currency_symbol_first"
                                        class="form-control @error('currency_symbol_first') is-invalid @enderror" select2
                                        name="currency_symbol_first" required>
                                        <option value="1"
                                            {{ old('currency_symbol_first', $company->currency_symbol_first) == 1 ? 'selected' : '' }}>
                                            @lang('Before Amount')</option>
                                        <option value="0"
                                            {{ old('currency_symbol_first', $company->currency_symbol_first) == 0 ? 'selected' : '' }}>
                                            @lang('After Amount')</option>
                                    </select>
                                    @error('currency_symbol_first')
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
                                    <label for="federal_id" class="form-label">@lang('Federal ID')</label>
                                    <input id="federal_id" class="form-control @error('federal_id') is-invalid @enderror"
                                        type="text" name="federal_id"
                                        value="{{ old('federal_id', $company->federal_id) }}"
                                        placeholder="@lang('Type Your Federal Id')">
                                    @error('federal_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="tax_id" class="form-label">@lang('Tax ID')</label>
                                    <input id="tax_id" class="form-control @error('tax_id') is-invalid @enderror"
                                        type="text" name="tax_id" value="{{ old('tax_id', $company->tax_id) }}"
                                        placeholder="@lang('Type Your Tax Id')">
                                    @error('tax_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header align-items-center d-flex">
                        <h4 class="card-title mb-0 flex-grow-1">@lang('Base Calendar & Misc Settings')</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="fiscal_calendar" class="form-label">@lang('Fiscal Calendar')</label>
                                    <input id="fiscal_calendar"
                                        class="form-control @error('fiscal_calendar') is-invalid @enderror"
                                        type="text" name="fiscal_calendar"
                                        value="{{ old('fiscal_calendar', $company->fiscal_calendar) }}">
                                    @error('fiscal_calendar')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="production_calendar" class="form-label">@lang('Production Calendar')</label>
                                    <input id="production_calendar"
                                        class="form-control @error('production_calendar') is-invalid @enderror"
                                        type="text" name="production_calendar"
                                        value="{{ old('production_calendar', $company->production_calendar) }}">
                                    @error('production_calendar')
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
                                    <label for="date_format" class="form-label">@lang('Date Format') <b
                                            class="ambitious-crimson">*</b></label>
                                    <select id="date_format"
                                        class="form-control @error('date_format') is-invalid @enderror" select2
                                        name="date_format" required>
                                        <option value="d M Y"
                                            {{ old('date_format', $company->date_format) == 'd M Y' ? 'selected' : '' }}>
                                            {{ date('d M Y') }}</option>
                                        <option value="d F Y"
                                            {{ old('date_format', $company->date_format) == 'd F Y' ? 'selected' : '' }}>
                                            {{ date('d F Y') }}</option>
                                        <option value="d m Y"
                                            {{ old('date_format', $company->date_format) == 'd m Y' ? 'selected' : '' }}>
                                            {{ date('d m Y') }}</option>
                                        <option value="m d Y"
                                            {{ old('date_format', $company->date_format) == 'm d Y' ? 'selected' : '' }}>
                                            {{ date('m d Y') }}</option>
                                        <option value="Y m d"
                                            {{ old('date_format', $company->date_format) == 'Y m d' ? 'selected' : '' }}>
                                            {{ date('Y m d') }}</option>
                                    </select>
                                    @error('date_format')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="date_separator" class="form-label">@lang('Date Separator') <b
                                            class="ambitious-crimson">*</b></label>
                                    <select id="date_separator"
                                        class="form-control @error('date_separator') is-invalid @enderror" select2
                                        name="date_separator" required>
                                        <option value="dash"
                                            {{ old('date_separator', $company->date_separator) == 'dash' ? 'selected' : '' }}>
                                            {{ __('Dash') }} (-)</option>
                                        <option value="slash"
                                            {{ old('date_separator', $company->date_separator) == 'slash' ? 'selected' : '' }}>
                                            {{ __('Slash') }} (/)</option>
                                        <option value="dot"
                                            {{ old('date_separator', $company->date_separator) == 'dot' ? 'selected' : '' }}>
                                            {{ __('Dot') }} (.)</option>
                                        <option value="comma"
                                            {{ old('date_separator', $company->date_separator) == 'comma' ? 'selected' : '' }}>
                                            {{ __('Comma') }} (,)</option>
                                        <option value="space"
                                            {{ old('date_separator', $company->date_separator) == 'space' ? 'selected' : '' }}>
                                            {{ __('Space') }} ( )</option>
                                    </select>
                                    @error('date_separator')
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
                                    <label for="time_format" class="form-label">@lang('Time Format') <b
                                            class="ambitious-crimson">*</b></label>
                                    <select id="time_format"
                                        class="form-control @error('time_format') is-invalid @enderror" select2
                                        name="time_format" required>
                                        <option value="h"
                                            {{ old('time_format', $company->time_format) == 'h' ? 'selected' : '' }}>
                                            {{ '12-Hour Format' }}</option>
                                        <option value="H"
                                            {{ old('time_format', $company->time_format) == 'H' ? 'selected' : '' }}>
                                            {{ '24-Hour Format' }}</option>
                                    </select>
                                    @error('time_format')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="time_decorations" class="form-label">@lang('Time Decorations') <b
                                            class="ambitious-crimson">*</b></label>
                                    <select id="time_decorations"
                                        class="form-control @error('time_decorations') is-invalid @enderror" select2
                                        name="time_decorations" required>
                                        <option value="A"
                                            {{ old('time_decorations', $company->time_decorations) == 'A' ? 'selected' : '' }}>
                                            {{ 'Uppercase (AM or PM)' }}</option>
                                        <option value="a"
                                            {{ old('time_decorations', $company->time_decorations) == 'a' ? 'selected' : '' }}>
                                            {{ 'Lowercase (am or pm)' }}</option>
                                    </select>
                                    @error('time_decorations')
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
                                    <label for="language" class="form-label">@lang('common.default language') <b
                                            class="ambitious-crimson">*</b></label>
                                    <select id="language" class="form-control @error('language') is-invalid @enderror"
                                        select2 name="language" required>
                                        @php
                                            $defaultLang = env('LOCALE_LANG', 'en');
                                        @endphp
                                        <option value="">@lang('common.select language')</option>
                                        @foreach ($getLang as $key => $value)
                                            <option value="{{ $key }}"
                                                {{ old('language', $defaultLang, $company->language) == $key ? 'selected' : '' }}>
                                                {{ $value }}</option>
                                        @endforeach
                                    </select>
                                    @error('language')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="enabled" class="form-label">@lang('Enabled') <b
                                            class="ambitious-crimson">*</b></label>
                                    <select id="enabled" class="form-control @error('enabled') is-invalid @enderror"
                                        select2 name="enabled" required>
                                        <option value="1"
                                            {{ old('enabled', $company->enabled) == 1 ? 'selected' : '' }}>
                                            @lang('Yes')</option>
                                        <option value="0"
                                            {{ old('enabled', $company->enabled) == 0 ? 'selected' : '' }}>
                                            @lang('No')</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <input type="submit" value="@lang('common.submit')" class="btn btn-info btn-lg" />
                        <a href="{{ route('dashboard') }}"
                            class="btn btn-warning btn-lg float-end">@lang('common.cancel')</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ URL::asset('assets/dropify/dist/js/dropify.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="{{ URL::asset('assets/js/app.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            "use strict";

            var countryId = $("#country").val();

            let selectState = {{ $company->state }};
            let selectCity = {{ $company->city }};
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

            $('#currency_code').change(function() {
                $.ajax({
                    url: '{{ route('currency.code') }}',
                    type: 'GET',
                    dataType: 'JSON',
                    data: 'code=' + $(this).val(),
                    success: function(data) {
                        $('#currency_name').val(data.name);
                        $('#decimal_precision').val(data.precision);
                        $('#decimal_mark').val(data.decimal_mark);
                        $('#currency_symbol').val(data.symbol);
                        $('#currency_symbol_first').trigger('change');
                    }
                });
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
