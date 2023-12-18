@extends('layouts.master')
@section('title') @lang('Supplier')  @endsection
@section('css')
    <link rel="stylesheet" href="{{ URL::asset('assets/dropify/dist/css/dropify.min.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    @component('components.breadcrumb')
        @slot('li_1') @lang('Supplier') @endslot
        @slot('title') @lang('Create Supplier')  @endslot
    @endcomponent
    <div class="row">
        <div class="col-lg-12">
            <form class="form-material form-horizontal" action="{{ route('supplier.update', $supplier) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card">
                    <div class="card-header align-items-center d-flex">
                        <h4 class="card-title mb-0 flex-grow-1">@lang('Supplier Edit Information')</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="supplier_id" class="form-label">@lang('Supplier') <b class="ambitious-crimson">*</b></label>
                                    <input id="supplier_id"  class="form-control @error('supplier_id') is-invalid @enderror" type="text" name="supplier_id" value="{{ old('supplier_id', $supplier->supplier_id) }}" placeholder="@lang('Type Your Supplier')" required>
                                    @error('supplier_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="name" class="form-label">@lang('Name') <b class="ambitious-crimson">*</b></label>
                                    <input id="name"  class="form-control @error('name') is-invalid @enderror" type="text" name="name" value="{{ old('name', $supplier->name) }}" placeholder="@lang('Type Your Name')" required>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <br>
                        <fieldset class="custom-border p-3">
                            <legend class="float-none w-auto px-1" >@lang('Currency & Language')</legend>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="currency_id" class="form-label">@lang('Currency') <b class="ambitious-crimson">*</b></label>
                                        <select id="currency_id" class="form-control @error('currency_id') is-invalid @enderror select2" name="currency_id" required>
                                            <option value="">@lang('Select Currency')</option>
                                            @foreach($currencies as $key=> $value)
                                                <option value="{{ $key }}" {{ old('currency_id', $supplier->currency_id) == $key ? 'selected' : '' }}>{{ $value['name'] }}</option>
                                            @endforeach
                                        </select>
                                        @error('currency_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="language_id" class="form-label">@lang('Language') <b class="ambitious-crimson">*</b></label>
                                        <select id="language_id" class="form-control select2 @error('language_id') is-invalid @enderror" name="language_id" required>
                                            @php
                                                $defaultLang = env('LOCALE_LANG', 'en');
                                            @endphp
                                            <option value="">@lang('select language')</option>
                                            @foreach($getLang as $key => $value)
                                                <option value="{{ $key }}" {{ old('language_id', $defaultLang, $supplier->language_id) == $key ? 'selected' : '' }} >{{ $value }}</option>
                                            @endforeach
                                        </select>
                                        @error('language_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                        <br>
                        <fieldset class="custom-border p-3">
                            <legend class="float-none w-auto px-1" >@lang('Tax')</legend>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="tax_region" class="form-label">@lang('Tax Region')</label>
                                        <input id="tax_region"  class="form-control @error('tax_region') is-invalid @enderror" type="text" name="tax_region" value="{{ old('tax_region',$supplier->tax_region) }}" placeholder="@lang('Type Your Tax Region')">
                                        @error('tax_region')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="tax_description" class="form-label">@lang('Tax Description')</label>
                                        <input id="tax_description"  class="form-control @error('tax_description') is-invalid @enderror" type="text" name="tax_description" value="{{ old('tax_description',$supplier->tax_description) }}" placeholder="@lang('Type Your Tax Description')">
                                        @error('tax_description')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                        <br>
                        <fieldset class="custom-border p-3">
                            <legend class="float-none w-auto px-1" >@lang('Supplier Information')</legend>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="group" class="form-label">@lang('Group') <b class="ambitious-crimson">*</b></label>
                                        <select id="group" class="form-control select2 @error('group') is-invalid @enderror" name="group" required>
                                            <option value="">@lang('Select Group')</option>
                                            <option value="Installation_Services" {{ old('group', $supplier->group) == "Installation_Services" ? 'selected' : '' }}>@lang('Installation Services')</option>
                                            <option value="Management_Services" {{ old('group', $supplier->group) == "Management_Services" ? 'selected' : '' }}>@lang('Management Services')</option>
                                            <option value="Outside_Vendor" {{ old('group', $supplier->group) == "Outside_Vendor" ? 'selected' : '' }}>@lang('Outside Vendor')</option>
                                            <option value="Steel_Supplier" {{ old('group', $supplier->group) == "Steel_Supplier" ? 'selected' : '' }}>@lang('Steel Supplier')</option>
                                            <option value="Stock" {{ old('group', $supplier->group) == "Stock" ? 'selected' : '' }}>@lang('Stock')</option>
                                        </select>
                                        @error('group')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="terms" class="form-label">@lang('Terms') <b class="ambitious-crimson">*</b></label>
                                        <select id="terms" class="form-control @error('terms') is-invalid @enderror select2" name="terms" required>
                                            <option value="">@lang('Select Bill Terms')</option>
                                            <option value="1_10_net_30" {{ old('terms', $supplier->terms) == "1_10_net_30" ? 'selected' : '' }}>@lang('1/10 Net 30')</option>
                                            <option value="12_months_payments" {{ old('terms', $supplier->terms) == "12_months_payments" ? 'selected' : '' }}>@lang('12 months payments')</option>
                                            <option value="18_month_payments" {{ old('terms', $supplier->terms) == "18_month_payments" ? 'selected' : '' }}>@lang('18 months payments')</option>
                                            <option value="2_10_net_30" {{ old('terms', $supplier->terms) == "2_10_net_30" ? 'selected' : '' }}>@lang('2/10 Net 30')</option>
                                            <option value="cash_on_delivery" {{ old('terms', $supplier->terms) == "cash_on_delivery" ? 'selected' : '' }}>@lang('Cash on Delivery')</option>
                                            <option value="credit_card" {{ old('terms', $supplier->terms) == "credit_card" ? 'selected' : '' }}>@lang('Credit Card')</option>
                                            <option value="net_30" {{ old('terms', $supplier->terms) == "net_30" ? 'selected' : '' }}>@lang('Net 30')</option>
                                            <option value="net_45" {{ old('terms', $supplier->terms) == "net_45" ? 'selected' : '' }}>@lang('Net 45')</option>
                                            <option value="pnp12_month_payment_schedule" {{ old('terms', $supplier->terms) == "pnp12_month_payment_schedule" ? 'selected' : '' }}>@lang('PNP12 Month Payment Schedule')</option>
                                        </select>
                                        @error('terms')
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
                                        <label for="ship_via" class="form-label">@lang('Ship Via') <b class="ambitious-crimson">*</b></label>
                                        <select id="ship_via" class="form-control @error('ship_via') is-invalid @enderror select2" name="ship_via" required>
                                            <option value="">@lang('Select Ship Via')</option>
                                            <option value="Company_Truck" {{ old('ship_via', $supplier->ship_via) == "Company_Truck" ? 'selected' : '' }}>@lang('Company Truck')</option>
                                            <option value="Container_Ship" {{ old('ship_via', $supplier->ship_via) == "Container_Ship" ? 'selected' : '' }}>@lang('Container Ship')</option>
                                            <option value="Fedex_Express" {{ old('ship_via', $supplier->ship_via) == "Fedex_Express" ? 'selected' : '' }}>@lang('Fedex Express')</option>
                                        </select>
                                        @error('terms')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="payment_method" class="form-label">@lang('Payment Method') <b class="ambitious-crimson">*</b></label>
                                        <select id="payment_method" class="form-control select2 @error('payment_method') is-invalid @enderror" name="payment_method" required>
                                            <option value="">@lang('Select Payment Method')</option>
                                            <option value="Cash" {{ old('payment_method', $supplier->payment_method) == "Cash" ? 'selected' : '' }}>@lang('Cash')</option>
                                            <option value="Credit_Card" {{ old('payment_method', $supplier->payment_method) == "Credit_Card" ? 'selected' : '' }}>@lang('Credit Card')</option>
                                            <option value="Credit_Card_2" {{ old('payment_method', $supplier->payment_method) == "Credit_Card_2" ? 'selected' : '' }}>@lang('Credit Card 2')</option>
                                            <option value="LockBox" {{ old('payment_method', $supplier->payment_method) == "LockBox" ? 'selected' : '' }}>@lang('LockBox')</option>
                                            <option value="Check" {{ old('payment_method', $supplier->payment_method) == "Check" ? 'selected' : '' }}>@lang('Check')</option>
                                            <option value="Payment_Clearing" {{ old('payment_method', $supplier->payment_method) == "Payment_Clearing" ? 'selected' : '' }}>@lang('Payment Clearing')</option>
                                            <option value="OPR_Cash" {{ old('payment_method', $supplier->payment_method) == "OPR_Cash" ? 'selected' : '' }}>@lang('OPR-Cash')</option>
                                            <option value="Store_Credit" {{ old('payment_method', $supplier->payment_method) == "Store_Credit" ? 'selected' : '' }}>@lang('Store Credit')</option>
                                        </select>
                                        @error('payment_method')
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
                                        <label for="fob" class="form-label">@lang('FOB') <b class="ambitious-crimson">*</b></label>
                                        <input id="fob"  class="form-control @error('fob') is-invalid @enderror" type="text" name="fob" value="{{ old('fob', 'Origin', $supplier->fob) }}" placeholder="@lang('Type Your FOB')" required>
                                        @error('fob')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                    </div>
                    <div class="card-footer">
                        <input type="submit" value="@lang('Submit')" class="btn btn-info btn-lg"/>
                        <a href="{{ route('dashboard.index') }}" class="btn btn-warning btn-lg float-end">@lang('Cancel')</a>
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