@extends('layouts.master')
@section('title') @lang('common.application settings')  @endsection
@section('css')
    <link rel="stylesheet" href="{{ URL::asset('assets/dropify/dist/css/dropify.min.css') }}">
@endsection
@section('content')
    @component('components.breadcrumb')
        @slot('li_1') @lang('common.settings') @endslot
        @slot('title') @lang('common.application settings')  @endslot
    @endcomponent
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">@lang('common.application configuration')</h4>
                </div>
                <form class="form-material form-horizontal" action="{{ route('application-settings.update') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="item_name" class="form-label">@lang('common.item name') <b class="ambitious-crimson">*</b></label>
                                    <input id="item_name"  class="form-control @error('email') is-invalid @enderror" type="text" name="item_name" value="{{ old('item_name', $data->item_name) }}" placeholder="@lang('common.type your item name here')" required>
                                    @error('item_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="item_short_name" class="form-label">@lang('common.item short name') <b class="ambitious-crimson">*</b></label>
                                    <input id="item_short_name" class="form-control @error('item_short_name') is-invalid @enderror" type="text" name="item_short_name" value="{{ old('item_short_name', $data->item_short_name) }}" placeholder="@lang('common.type your item short name here')" required>
                                    @error('item_short_name')
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
                                    <label for="company_name" class="form-label">@lang('common.company name') <b class="ambitious-crimson">*</b></label>
                                    <input id="company_name" class="form-control  @error('company_name') is-invalid @enderror" type="text" name="company_name" value="{{ old('company_name', $data->company_name) }}" placeholder="@lang('common.type your company name here')" required>
                                    @error('company_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="company_email" class="form-label">@lang('common.company email') <b class="ambitious-crimson">*</b></label>
                                    <input id="company_email" class="form-control  @error('company_email') is-invalid @enderror" type="text" name="company_email" value="{{ old('company_email', $data->company_email) }}" placeholder="@lang('common.type your company email here')" required>
                                    @error('company_email')
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
                                    <label for="language" class="form-label">@lang('common.default language') <b class="ambitious-crimson">*</b></label>
                                    <select id="language" class="form-control @error('company_email') is-invalid @enderror" data-choices name="language">
                                        @php
                                            $defaultLang = env('LOCALE_LANG', 'en');
                                        @endphp
                                        <option value="">@lang('common.select language')</option>
                                        @foreach($getLang as $key => $value)
                                            <option value="{{ $key }}" {{ old('language', $defaultLang, $data->language) == $key ? 'selected' : '' }} >{{ $value }}</option>
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
                                    <label for="time_zone" class="form-label">@lang('common.time zone') <b class="ambitious-crimson">*</b></label>
                                    <select id="time_zone" class="form-control @error('company_email') is-invalid @enderror" data-choices name="time_zone">
                                        <option value="">@lang('common.select time zone')</option>
                                        @foreach($timezone as $key => $value)
                                        <option value="{{ $key }}" {{ old('time_zone', $data->time_zone) == $key ? 'selected' : '' }} >{{ $value }}</option>
                                        @endforeach
                                    </select>
                                    @error('time_zone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="company_address" class="form-label">@lang('common.company address')</label>
                                    <textarea id="company_address" class="form-control" name="company_address" rows="3" placeholder="@lang('common.enter your address')">{{ $data->company_address }}</textarea>
                                    @error('time_zone')
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
                                    <label for="logo" class="form-label">@lang('common.logo')</label>
                                    <input id="logo" class="dropify" name="logo" value="{{ old('logo') }}" type="file" data-allowed-file-extensions="png" data-max-file-size="2024K" />
                                    <p>@lang('Max Size: 2mb, Allowed Format: png')</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="favicon" class="form-label">@lang('common.favicon')</label>
                                    <input id="favicon" class="dropify" name="favicon" value="{{ old('favicon') }}" type="file" data-allowed-file-extensions="png" data-max-file-size="500K" />
                                    <p>@lang('Max Size: 500kb, Allowed Format: png')</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <input type="submit" value="@lang('common.submit')" class="btn btn-info btn-lg"/>
                        <a href="{{ route('dashboard.index') }}" class="btn btn-warning btn-lg float-end">@lang('common.cancel')</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

@section('script')
    <script src="{{ URL::asset('assets/dropify/dist/js/dropify.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/app.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            "use strict";
            $('.dropify').dropify();
        });
    </script>
@endsection
