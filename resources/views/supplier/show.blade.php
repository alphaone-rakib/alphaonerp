@extends('layouts.master')
@section('title') @lang('Supplier')  @endsection
@section('css')
    <link rel="stylesheet" href="{{ URL::asset('assets/dropify/dist/css/dropify.min.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    @component('components.breadcrumb')
        @slot('li_1') @lang('Supplier') @endslot
        @slot('title') @lang('Show Supplier')  @endslot
    @endcomponent
    <div class="row">
        <div class="col-lg-12">
            <div class="card profile-project-card profile-project-success mb-0">
                <div class="card-header">
                    <h5 class="fs-14 text-truncate mb-1"><b>@lang('Show Supplier Information')</b></h5>
                </div>
                <div class="card-body p-4">
                    <div class="table-responsive">
                        <fieldset class="custom-border p-3">
                            <legend class="float-none w-auto px-1" >@lang('Basic Info')</legend>
                            <div class="row">
                                @if (isset($supplier->supplier_id))
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">@lang('Supplier :') {{ $supplier->supplier_id }}</label>
                                        </div>
                                    </div>
                                @endif
                                @if (isset($supplier->name))
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">@lang('Name :') {{ $supplier->name }}</label>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </fieldset>
                        <br>
                        <fieldset class="custom-border p-3">
                            <legend class="float-none w-auto px-1" >@lang('Currency & Language')</legend>
                            <div class="row">
                                @if (isset($supplier->currency_id))
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">@lang('Currency') : {{ $currencies[$supplier->currency_id]['name'] }}</label>
                                        </div>
                                    </div>
                                @endif
                                @if (isset($supplier->language_id))
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">@lang('Language') : {{ $getLang[$supplier->language_id] }}</label>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </fieldset>
                        <br>
                        <fieldset class="custom-border p-3">
                            <legend class="float-none w-auto px-1" >@lang('Tax')</legend>
                            <div class="row">
                                @if (isset($supplier->tax_region))
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">@lang('Tax Region') : {{ ucwords(str_replace("_"," ",$supplier->tax_region)) }}</label>
                                        </div>
                                    </div>
                                @endif
                                @if (isset($supplier->tax_description))
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">@lang('Tax Description') : {{ ucwords(str_replace("_"," ",$supplier->tax_description)) }}</label>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </fieldset>
                        <br>
                        <fieldset class="custom-border p-3">
                            <legend class="float-none w-auto px-1" >@lang('Supplier Information')</legend>
                            <div class="row">
                                @if (isset($supplier->group))
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">@lang('Group') : {{ ucwords(str_replace("_"," ",$supplier->group)) }}</label>
                                        </div>
                                    </div>
                                @endif
                                @if (isset($supplier->terms))
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">@lang('Terms') : {{ ucwords(str_replace("_"," ",$supplier->terms)) }}</label>
                                        </div>
                                    </div>
                                @endif
                                @if (isset($supplier->ship_via))
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">@lang('Ship Via') : {{ ucwords(str_replace("_"," ",$supplier->ship_via)) }}</label>
                                        </div>
                                    </div>
                                @endif
                                @if (isset($supplier->payment_method))
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">@lang('Payment Method') : {{ ucwords(str_replace("_"," ",$supplier->payment_method)) }}</label>
                                        </div>
                                    </div>
                                @endif
                                @if (isset($supplier->fob))
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">@lang('FOB') : {{ ucwords(str_replace("_"," ",$supplier->fob)) }}</label>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </fieldset>
                    </div>
                </div>
            </div>
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
