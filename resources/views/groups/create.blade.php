@extends('layouts.master')
@section('title') @lang('Group')  @endsection
@section('css')
    <link rel="stylesheet" href="{{ URL::asset('assets/dropify/dist/css/dropify.min.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    @component('components.breadcrumb')
        @slot('li_1') @lang('Group') @endslot
        @slot('title') @lang('Create Group')  @endslot
    @endcomponent
    <div class="row">
        <div class="col-lg-12">
            <form class="form-material form-horizontal" action="{{ route('group.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <div class="card-header align-items-center d-flex">
                        <h4 class="card-title mb-0 flex-grow-1">@lang('Group Create Information')</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="group_id" class="form-label">@lang('Group Id') <b class="ambitious-crimson">*</b></label>
                                    <input id="group_id"  class="form-control @error('group_id') is-invalid @enderror" type="text" name="group_id" value="{{ old('group_id') }}" placeholder="@lang('Type Your Group Id')" required>
                                    @error('group_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="group_name" class="form-label">@lang('Group Name') <b class="ambitious-crimson">*</b></label>
                                    <input id="group_name" class="form-control @error('group_name') is-invalid @enderror" type="text" name="group_name" value="{{ old('group_name') }}" placeholder="@lang('Type Your Group Name')" required>
                                    @error('group_name')
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
                                    <label for="description" class="form-label">@lang('Description')</label>
                                    <textarea id="description" class="form-control" name="description" rows="3" placeholder="@lang('Type Your Group Description')"></textarea>
                                    @error('description')
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
                                    <label for="sales_site" class="form-label">@lang('Sales Site')</label>
                                    <select id="sales_site" class="form-control select2 @error('sales_site') is-invalid @enderror" name="sales_site">
                                        <option value="">{{ __('Select Sales Site') }}</option>
                                        <option value="chicago" {{ old('sales_site') == "chicago" ? 'selected' : '' }}>{{ __('Chicago') }}</option>
                                        <option value="evanston" {{ old('sales_site') == "evanston" ? 'selected' : '' }}>{{ __('Evanston') }}</option>
                                        <option value="gm" {{ old('sales_site') == "gm" ? 'selected' : '' }}>{{ __('GM') }}</option>
                                        <option value="new_york" {{ old('sales_site') == "new_york" ? 'selected' : '' }}>{{ __('New York') }}</option>
                                        <option value="rockford" {{ old('sales_site') == "rockford" ? 'selected' : '' }}>{{ __('Rockford') }}</option>
                                    </select>
                                    @error('sales_site')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="warranty" class="form-label">@lang('Warranty')</label>
                                    <select id="warranty" class="form-control select2 @error('warranty') is-invalid @enderror" name="warranty">
                                        <option value="">{{ __('Select Warranty') }}</option>
                                        <option value="12_month_warranty" {{ old('warranty') == "12_month_warranty" ? 'selected' : '' }}>{{ __('12 Month Warranty') }}</option>
                                        <option value="2_year_material_misc" {{ old('warranty') == "2_year_material_misc" ? 'selected' : '' }}>{{ __('2 Year, Material/Misc') }}</option>
                                    </select>
                                    @error('warranty')
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
                                    <label for="planner" class="form-label">@lang('Planner')</label>
                                    <select id="planner" class="form-control select2 @error('planner') is-invalid @enderror" name="planner">
                                        <option value="">{{ __('Select Planner') }}</option>
                                        <option value="brian_howard" {{ old('planner') == "brian_howard" ? 'selected' : '' }}>{{ __('Brian Howard') }}</option>
                                        <option value="fred_grandy" {{ old('planner') == "fred_grandy" ? 'selected' : '' }}>{{ __('Fred Grandy') }}</option>
                                        <option value="henry_low" {{ old('planner') == "henry_low" ? 'selected' : '' }}>{{ __('Henry Low') }}</option>
                                        <option value="jimmy_johnson" {{ old('planner') == "jimmy_johnson" ? 'selected' : '' }}>{{ __('Jimmy Johnson') }}</option>
                                        <option value="lew_schmidt" {{ old('planner') == "lew_schmidt" ? 'selected' : '' }}>{{ __('Lew Schmidt') }}</option>
                                    </select>
                                    @error('planner')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="tax_category" class="form-label">@lang('Tax Category')</label>
                                    <select id="tax_category" class="form-control select2 @error('tax_category') is-invalid @enderror" name="tax_category">
                                        <option value="">{{ __('Select Tax Category') }}</option>
                                        <option value="pnp_tax_cat" {{ old('tax_category') == "pnp_tax_cat" ? 'selected' : '' }}>{{ __('PNP Tax Cat') }}</option>
                                        <option value="products" {{ old('tax_category') == "products" ? 'selected' : '' }}>{{ __('Products') }}</option>
                                        <option value="raw_materials" {{ old('tax_category') == "raw_materials" ? 'selected' : '' }}>{{ __('Raw Materials') }}</option>
                                        <option value="services" {{ old('tax_category') == "services" ? 'selected' : '' }}>{{ __('Services') }}</option>
                                    </select>
                                    @error('tax_category')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <input type="submit" value="@lang('common.submit')" class="btn btn-info btn-lg"/>
                        <a href="{{ route('dashboard.index') }}" class="btn btn-warning btn-lg float-end">@lang('common.cancel')</a>
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
                $('.select2').select2();
            });
        </script>
    @endsection