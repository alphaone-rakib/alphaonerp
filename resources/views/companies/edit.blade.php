@extends('layouts.master')
@section('title') @lang('Company')  @endsection
@section('css')
    <link rel="stylesheet" href="{{ URL::asset('assets/dropify/dist/css/dropify.min.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    @component('components.breadcrumb')
        @slot('li_1') @lang('Company') @endslot
        @slot('title') @lang('Edit Company')  @endslot
    @endcomponent
    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">
                    <ul class="nav nav-tabs nav-justified mb-3" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-bs-toggle="tab" href="#comapny_tab" role="tab" aria-selected="false">
                                @lang('Company')
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#sales_tab" role="tab" aria-selected="false">
                                @lang('Sales')
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#purchase_tab" role="tab" aria-selected="false">
                                @lang('Purchase')
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#inventory_tab" role="tab" aria-selected="true">
                                @lang('Inventory')
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#logistic_tab" role="tab" aria-selected="true">
                                @lang('Logistic')
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#production_tab" role="tab" aria-selected="true">
                                @lang('Production')
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#service_tab" role="tab" aria-selected="true">
                                @lang('Service')
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#project_tab" role="tab" aria-selected="true">
                                @lang('Project')
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#human_resource_tab" role="tab" aria-selected="true">
                                @lang('Human Resource')
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#finance_tab" role="tab" aria-selected="true">
                                @lang('Finance')
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="comapny_tab" role="tabpanel">
                            <form class="form-material form-horizontal" action="{{ route('company.update', $company) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="name" class="form-label">@lang('Name') <b class="ambitious-crimson">*</b></label>
                                            <input id="name"  class="form-control @error('name') is-invalid @enderror" type="text" name="name" value="{{ old('name', $company->name) }}" placeholder="@lang('Type Your Company Name')" required>
                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="phone" class="form-label">@lang('Phone') <b class="ambitious-crimson">*</b></label>
                                            <input id="phone" class="form-control @error('phone') is-invalid @enderror" type="text" name="phone" value="{{ old('phone', $company->phone) }}" placeholder="@lang('Type Your Company Phone Number')" required>
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
                                            <label for="company_address_one" class="form-label">@lang('Address One')</label>
                                            <textarea id="company_address_one" class="form-control" name="company_address_one" rows="3" placeholder="@lang('common.enter your address')">{{ $company->company_address_one }}</textarea>
                                            @error('company_address_two')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="company_address_two" class="form-label">@lang('Address Two')</label>
                                            <textarea id="company_address_two" class="form-control" name="company_address_two" rows="3" placeholder="@lang('common.enter your address')">{{ $company->company_address_two }}</textarea>
                                            @error('company_address_two')
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
                                                <option value="{{ $key }}" {{ old('country',$company->country) == $key ? 'selected' : '' }} >{{ $value }}</option>
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
                                                <option value="{{ $key }}" {{ old('city') == $key ? 'selected' : '' }} >{{ $value }}</option>
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
                                            <input id="zip_code" class="form-control @error('zip_code') is-invalid @enderror" type="text" name="zip_code" value="{{ old('zip_code', $company->zip_code) }}" placeholder="@lang('Type Your Zip Code')">
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
                                            <label for="fax" class="form-label">@lang('Fax') </label>
                                            <input id="fax" class="form-control  @error('fax') is-invalid @enderror" type="text" name="fax" value="{{ old('fax', $company->fax) }}" placeholder="@lang('Type Company Fax Number')">
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
                                            <input id="url" class="form-control  @error('url') is-invalid @enderror" type="text" name="url" value="{{ old('url', $company->url) }}" placeholder="@lang('Type Company URL Address')">
                                            @error('url')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <input type="submit" value="@lang('common.submit')" class="btn btn-info btn-lg"/>
                                    <a href="{{ route('dashboard') }}" class="btn btn-warning btn-lg float-end">@lang('common.cancel')</a>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane" id="sales_tab" role="tabpanel">

                            <form class="form-material form-horizontal" action="{{ route('company.salesUpdate', $company->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="card-header align-items-center d-flex">
                                    <h4 class="card-title mb-0 flex-grow-1">@lang('Quote Setup')</h4>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="initial_quote_no" class="form-label">@lang('Initial Quote No')</label>
                                                <input id="initial_quote_no"  class="form-control @error('initial_quote_no') is-invalid @enderror" type="text" name="initial_quote_no" value="{{ old('initial_quote_no', $company->initial_quote_no) }}" placeholder="@lang('Type Your Company Initial Quote No')">
                                                @error('initial_quote_no')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="quote_prefix" class="form-label">@lang('Quote Prefix')</label>
                                                <input id="quote_prefix"  class="form-control @error('quote_prefix') is-invalid @enderror" type="text" name="quote_prefix" value="{{ old('quote_prefix', $company->quote_prefix) }}" placeholder="@lang('Type Your Company Quote Prefix')">
                                                @error('quote_prefix')
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
                                                <label for="expiration_days" class="form-label">@lang('Expiration Days')</label>
                                                <input id="expiration_days"  class="form-control @error('expiration_days') is-invalid @enderror" type="text" name="expiration_days" value="{{ old('expiration_days', $company->expiration_days) }}" placeholder="@lang('Type Your Company Sales Expiration Days')">
                                                @error('expiration_days')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="follow_up_days" class="form-label">@lang('Follow Up Days')</label>
                                                <input id="follow_up_days"  class="form-control @error('follow_up_days') is-invalid @enderror" type="text" name="follow_up_days" value="{{ old('follow_up_days', $company->follow_up_days) }}" placeholder="@lang('Type Your Company Sales Follow Up Days')">
                                                @error('follow_up_days')
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
                                                <label for="days_to_quote" class="form-label">@lang('Days To Quote')</label>
                                                <input id="days_to_quote"  class="form-control @error('days_to_quote') is-invalid @enderror" type="text" name="days_to_quote" value="{{ old('days_to_quote', $company->days_to_quote) }}" placeholder="@lang('Type Your Company Sales Days To Quote')">
                                                @error('days_to_quote')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="quote_form_messages" class="form-label">@lang('Days To Quote')</label>
                                                <input id="quote_form_messages"  class="form-control @error('quote_form_messages') is-invalid @enderror" type="text" name="quote_form_messages" value="{{ old('quote_form_messages', $company->quote_form_messages) }}" placeholder="@lang('Type Your Company Sales Quote From Message')">
                                                @error('quote_form_messages')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-header align-items-center d-flex">
                                    <h4 class="card-title mb-0 flex-grow-1">@lang('Order Setup')</h4>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="initial_order_no" class="form-label">@lang('Initial Order No')</label>
                                                <input id="initial_order_no"  class="form-control @error('initial_order_no') is-invalid @enderror" type="text" name="initial_order_no" value="{{ old('initial_order_no', $company->initial_order_no) }}" placeholder="@lang('Type Your Company Initial Order No')">
                                                @error('initial_order_no')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="order_prefix" class="form-label">@lang('Order Prefix')</label>
                                                <input id="order_prefix"  class="form-control @error('order_prefix') is-invalid @enderror" type="text" name="order_prefix" value="{{ old('order_prefix', $company->order_prefix) }}" placeholder="@lang('Type Your Company Oder Prefix')">
                                                @error('order_prefix')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-header align-items-center d-flex">
                                    <h4 class="card-title mb-0 flex-grow-1">@lang('RMA Setup')</h4>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="initial_rma_no" class="form-label">@lang('Initial RMA No')</label>
                                                <input id="initial_rma_no"  class="form-control @error('initial_rma_no') is-invalid @enderror" type="text" name="initial_rma_no" value="{{ old('initial_rma_no', $company->initial_rma_no) }}" placeholder="@lang('Type Your Company Initial RMA No')">
                                                @error('initial_rma_no')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="rma_prefix" class="form-label">@lang('RMA Prefix')</label>
                                                <input id="rma_prefix"  class="form-control @error('rma_prefix') is-invalid @enderror" type="text" name="rma_prefix" value="{{ old('rma_prefix', $company->rma_prefix) }}" placeholder="@lang('Type Your Company RMA Prefix')">
                                                @error('rma_prefix')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-header align-items-center d-flex">
                                    <h4 class="card-title mb-0 flex-grow-1">@lang('Custumer  Setup')</h4>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="initial_customer_no" class="form-label">@lang('Initial Customer No')</label>
                                                <input id="initial_customer_no"  class="form-control @error('initial_customer_no') is-invalid @enderror" type="text" name="initial_customer_no" value="{{ old('initial_customer_no', $company->initial_customer_no) }}" placeholder="@lang('Type Your Company Initial Customer No')">
                                                @error('initial_customer_no')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="customer_prefix" class="form-label">@lang('Customer Prefix')</label>
                                                <input id="customer_prefix"  class="form-control @error('customer_prefix') is-invalid @enderror" type="text" name="customer_prefix" value="{{ old('customer_prefix', $company->customer_prefix) }}" placeholder="@lang('Type Your Company Customer Prefix')">
                                                @error('customer_prefix')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <input type="submit" value="@lang('common.submit')" class="btn btn-info btn-lg"/>
                                    <a href="{{ route('dashboard') }}" class="btn btn-warning btn-lg float-end">@lang('common.cancel')</a>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane" id="purchase_tab" role="tabpanel">
                            <form class="form-material form-horizontal" action="{{ route('company.purchaseUpdate', $company->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="card-header align-items-center d-flex">
                                    <h4 class="card-title mb-0 flex-grow-1">@lang('Purchase Order Setup')</h4>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="initial_purchase_order_no" class="form-label">@lang('Initial Purchase Order No')</label>
                                                <input id="initial_purchase_order_no"  class="form-control @error('initial_purchase_order_no') is-invalid @enderror" type="text" name="initial_purchase_order_no" value="{{ old('initial_purchase_order_no', $company->initial_purchase_order_no) }}" placeholder="@lang('Type Your Company Initial Purchase Order No')">
                                                @error('initial_purchase_order_no')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="purchase_order_prefix" class="form-label">@lang('Purchase Order Prefix')</label>
                                                <input id="purchase_order_prefix"  class="form-control @error('purchase_order_prefix') is-invalid @enderror" type="text" name="purchase_order_prefix" value="{{ old('purchase_order_prefix', $company->purchase_order_prefix) }}" placeholder="@lang('Type Your Company Purchase Order Prefix')">
                                                @error('purchase_order_prefix')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-header align-items-center d-flex">
                                    <h4 class="card-title mb-0 flex-grow-1">@lang('Requisition Setup')</h4>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="initial_requisition_no" class="form-label">@lang('Initial Requisition No')</label>
                                                <input id="initial_requisition_no"  class="form-control @error('initial_requisition_no') is-invalid @enderror" type="text" name="initial_requisition_no" value="{{ old('initial_requisition_no', $company->initial_requisition_no) }}" placeholder="@lang('Type Your Company Initial Requisition No')">
                                                @error('initial_requisition_no')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="requisition_prefix" class="form-label">@lang('Requisition Prefix')</label>
                                                <input id="requisition_prefix"  class="form-control @error('requisition_prefix') is-invalid @enderror" type="text" name="requisition_prefix" value="{{ old('requisition_prefix', $company->requisition_prefix) }}" placeholder="@lang('Type Your Company Requisition Prefix')">
                                                @error('requisition_prefix')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-header align-items-center d-flex">
                                    <h4 class="card-title mb-0 flex-grow-1">@lang('Vendor Setup')</h4>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="initial_vendor_no" class="form-label">@lang('Initial Vendor No')</label>
                                                <input id="initial_vendor_no"  class="form-control @error('initial_vendor_no') is-invalid @enderror" type="text" name="initial_vendor_no" value="{{ old('initial_vendor_no', $company->initial_vendor_no) }}" placeholder="@lang('Type Your Company Initial Vendor No')">
                                                @error('initial_vendor_no')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="vendor_prefix" class="form-label">@lang('Vendor Prefix')</label>
                                                <input id="vendor_prefix"  class="form-control @error('vendor_prefix') is-invalid @enderror" type="text" name="vendor_prefix" value="{{ old('vendor_prefix', $company->vendor_prefix) }}" placeholder="@lang('Type Your Company Vendor Prefix')">
                                                @error('vendor_prefix')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <input type="submit" value="@lang('common.submit')" class="btn btn-info btn-lg"/>
                                    <a href="{{ route('dashboard') }}" class="btn btn-warning btn-lg float-end">@lang('common.cancel')</a>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane" id="inventory_tab" role="tabpanel">
                            <div class="card-header align-items-center d-flex">
                                <h4 class="card-title mb-0 flex-grow-1">@lang('Default Warehouse')</h4>
                            </div>
                            <form class="form-material form-horizontal" action="{{ route('company.inventoryUpdate', $company->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="warehouse_general" class="form-label">@lang('General')</label>
                                                <input id="warehouse_general"  class="form-control @error('warehouse_general') is-invalid @enderror" type="text" name="warehouse_general" value="{{ old('warehouse_general', $company->warehouse_general) }}" placeholder="@lang('Type Your Company Warehouse General')">
                                                @error('warehouse_general')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="warehouse_general_bin" class="form-label">@lang('Bin')</label>
                                                <input id="warehouse_general_bin"  class="form-control @error('warehouse_general_bin') is-invalid @enderror" type="text" name="warehouse_general_bin" value="{{ old('warehouse_general_bin', $company->warehouse_general_bin) }}" placeholder="@lang('Type Your Company Warehouse General Bin')">
                                                @error('warehouse_general_bin')
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
                                                <label for="warehouse_receiving" class="form-label">@lang('Receiving')</label>
                                                <input id="warehouse_receiving"  class="form-control @error('warehouse_receiving') is-invalid @enderror" type="text" name="warehouse_receiving" value="{{ old('warehouse_receiving', $company->warehouse_receiving) }}" placeholder="@lang('Type Your Company Warehouse Receiving')">
                                                @error('warehouse_receiving')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="warehouse_receiving_bin" class="form-label">@lang('Bin')</label>
                                                <input id="warehouse_receiving_bin"  class="form-control @error('warehouse_receiving_bin') is-invalid @enderror" type="text" name="warehouse_receiving_bin" value="{{ old('warehouse_receiving_bin', $company->warehouse_receiving_bin) }}" placeholder="@lang('Type Your Company Warehouse Receiving Bin')">
                                                @error('warehouse_receiving_bin')
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
                                                <label for="warehouse_shipping" class="form-label">@lang('Shipping')</label>
                                                <input id="warehouse_shipping"  class="form-control @error('warehouse_shipping') is-invalid @enderror" type="text" name="warehouse_shipping" value="{{ old('warehouse_shipping', $company->warehouse_shipping) }}" placeholder="@lang('Type Your Company Warehouse Shipping')">
                                                @error('warehouse_shipping')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="warehouse_shipping_bin" class="form-label">@lang('Bin')</label>
                                                <input id="warehouse_shipping_bin"  class="form-control @error('warehouse_shipping_bin') is-invalid @enderror" type="text" name="warehouse_shipping_bin" value="{{ old('warehouse_shipping_bin', $company->warehouse_shipping_bin) }}" placeholder="@lang('Type Your Company Warehouse Shipping Bin')">
                                                @error('warehouse_shipping_bin')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-header align-items-center d-flex">
                                    <h4 class="card-title mb-0 flex-grow-1">@lang('Default Plant Settings')</h4>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="default_plant" class="form-label">@lang('Default Plant')</label>
                                                <select id="default_plant" class="form-control @error('default_plant') is-invalid @enderror select2" name="default_plant">
                                                    <option value="">@lang('Select Plant')</option>
                                                    @foreach($plants as $key => $value)
                                                    <option value="{{ $key }}" {{ old('default_plant') == $key ? 'selected' : '' }} >{{ $value }}</option>
                                                    @endforeach
                                                </select>
                                                @error('default_plant')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="costing_method" class="form-label">@lang('Costing Method')</label>
                                                <input id="costing_method"  class="form-control @error('costing_method') is-invalid @enderror" type="text" name="costing_method" value="{{ old('costing_method', $company->costing_method) }}" placeholder="@lang('Type Your Costing Method')">
                                                @error('costing_method')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-header align-items-center d-flex">
                                    <h4 class="card-title mb-0 flex-grow-1">@lang('Transfer Orders')</h4>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="initial_transfer_order_no" class="form-label">@lang('Initial Transfer Order No')</label>
                                                <input id="initial_transfer_order_no"  class="form-control @error('initial_transfer_order_no') is-invalid @enderror" type="text" name="initial_transfer_order_no" value="{{ old('initial_transfer_order_no', $company->initial_transfer_order_no) }}" placeholder="@lang('Type Your Comapny Initial Transfer Order No')">
                                                @error('initial_transfer_order_no')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="transfer_order_prefix" class="form-label">@lang('Transfer Order Prefix')</label>
                                                <input id="transfer_order_prefix"  class="form-control @error('transfer_order_prefix') is-invalid @enderror" type="text" name="transfer_order_prefix" value="{{ old('transfer_order_prefix', $company->transfer_order_prefix) }}" placeholder="@lang('Type Your Comapny Transfer Order Prefix')">
                                                @error('transfer_order_prefix')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <input type="submit" value="@lang('common.submit')" class="btn btn-info btn-lg"/>
                                    <a href="{{ route('dashboard') }}" class="btn btn-warning btn-lg float-end">@lang('common.cancel')</a>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane" id="logistic_tab" role="tabpanel">
                            <form class="form-material form-horizontal" action="{{ route('company.logisticUpdate', $company->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="card-header align-items-center d-flex">
                                    <h4 class="card-title mb-0 flex-grow-1">@lang('Shipping Setup')</h4>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="initial_packing_slip_no" class="form-label">@lang('Initial Packing Slip No')</label>
                                                <input id="initial_packing_slip_no"  class="form-control @error('initial_packing_slip_no') is-invalid @enderror" type="text" name="initial_packing_slip_no" value="{{ old('initial_packing_slip_no', $company->initial_packing_slip_no) }}" placeholder="@lang('Type Your Comapny Initial Packing Slip No')">
                                                @error('initial_packing_slip_no')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="pack_slip_prefix" class="form-label">@lang('Pack Slip Prefix')</label>
                                                <input id="pack_slip_prefix"  class="form-control @error('pack_slip_prefix') is-invalid @enderror" type="text" name="pack_slip_prefix" value="{{ old('pack_slip_prefix', $company->pack_slip_prefix) }}" placeholder="@lang('Type Your Comapny Pack Slip Prefix')">
                                                @error('pack_slip_prefix')
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
                                                <label for="initial_bol_no" class="form-label">@lang('Initial BOL No')</label>
                                                <input id="initial_bol_no"  class="form-control @error('initial_bol_no') is-invalid @enderror" type="text" name="initial_bol_no" value="{{ old('initial_bol_no', $company->initial_bol_no) }}" placeholder="@lang('Type Your Comapny Initial BOL No')">
                                                @error('initial_bol_no')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="bol_prefix" class="form-label">@lang('BOL Prefix')</label>
                                                <input id="bol_prefix"  class="form-control @error('bol_prefix') is-invalid @enderror" type="text" name="bol_prefix" value="{{ old('bol_prefix', $company->bol_prefix) }}" placeholder="@lang('Type Your Comapny BOL Prefix')">
                                                @error('bol_prefix')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-header align-items-center d-flex">
                                    <h4 class="card-title mb-0 flex-grow-1">@lang('Default Shipping')</h4>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="ship_via" class="form-label">@lang('Ship Via')</label>
                                                <input id="ship_via"  class="form-control @error('ship_via') is-invalid @enderror" type="text" name="ship_via" value="{{ old('ship_via', $company->ship_via) }}" placeholder="@lang('Type Your Comapny Ship Via')">
                                                @error('ship_via')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="fob" class="form-label">@lang('FOB')</label>
                                                <input id="fob"  class="form-control @error('fob') is-invalid @enderror" type="text" name="fob" value="{{ old('fob', $company->fob) }}" placeholder="@lang('Type Your Comapny FOB')">
                                                @error('fob')
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
                                                <label for="misc_freight" class="form-label">@lang('Misc Freight')</label>
                                                <input id="misc_freight"  class="form-control @error('misc_freight') is-invalid @enderror" type="text" name="misc_freight" value="{{ old('misc_freight', $company->misc_freight) }}" placeholder="@lang('Type Your Comapny Misc Freight')">
                                                @error('misc_freight')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <input type="submit" value="@lang('common.submit')" class="btn btn-info btn-lg"/>
                                    <a href="{{ route('dashboard') }}" class="btn btn-warning btn-lg float-end">@lang('common.cancel')</a>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane" id="production_tab" role="tabpanel">
                            <form class="form-material form-horizontal" action="{{ route('company.productionUpdate', $company->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="card-header align-items-center d-flex">
                                    <h4 class="card-title mb-0 flex-grow-1">@lang('Job Setup')</h4>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="initial_job_no" class="form-label">@lang('Initial Job No')</label>
                                                <input id="initial_job_no"  class="form-control @error('initial_job_no') is-invalid @enderror" type="text" name="initial_job_no" value="{{ old('initial_job_no', $company->initial_job_no) }}" placeholder="@lang('Type Your Comapny Initial Job No')">
                                                @error('initial_job_no')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="job_prefix" class="form-label">@lang('Job Prefix')</label>
                                                <input id="job_prefix"  class="form-control @error('job_prefix') is-invalid @enderror" type="text" name="job_prefix" value="{{ old('job_prefix', $company->job_prefix) }}" placeholder="@lang('Type Your Comapny Job Prefix')">
                                                @error('job_prefix')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <input type="submit" value="@lang('common.submit')" class="btn btn-info btn-lg"/>
                                    <a href="{{ route('dashboard') }}" class="btn btn-warning btn-lg float-end">@lang('common.cancel')</a>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane" id="service_tab" role="tabpanel">
                            <form class="form-material form-horizontal" action="{{ route('company.serviceUpdate', $company->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="card-header align-items-center d-flex">
                                    <h4 class="card-title mb-0 flex-grow-1">@lang('Service Setup')</h4>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="initial_service_job_no" class="form-label">@lang('Initial Service Job No')</label>
                                                <input id="initial_service_job_no"  class="form-control @error('initial_service_job_no') is-invalid @enderror" type="text" name="initial_service_job_no" value="{{ old('initial_service_job_no', $company->initial_service_job_no) }}" placeholder="@lang('Type Your Comapny Initial Service Job No')">
                                                @error('initial_service_job_no')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="service_job_prefix" class="form-label">@lang('Service Job Prefix')</label>
                                                <input id="service_job_prefix"  class="form-control @error('service_job_prefix') is-invalid @enderror" type="text" name="service_job_prefix" value="{{ old('service_job_prefix', $company->service_job_prefix) }}" placeholder="@lang('Type Your Comapny Service Job Prefix')">
                                                @error('service_job_prefix')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <input type="submit" value="@lang('common.submit')" class="btn btn-info btn-lg"/>
                                    <a href="{{ route('dashboard') }}" class="btn btn-warning btn-lg float-end">@lang('common.cancel')</a>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane" id="project_tab" role="tabpanel">
                        </div>
                        <div class="tab-pane" id="human_resource_tab" role="tabpanel">
                        </div>
                        <div class="tab-pane" id="finance_tab" role="tabpanel">
                            <form class="form-material form-horizontal" action="{{ route('company.financeUpdate', $company->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="card-header align-items-center d-flex">
                                    <h4 class="card-title mb-0 flex-grow-1">@lang('Accounts Recivable Setup')</h4>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="initial_ar_no" class="form-label">@lang('Initial AR No')</label>
                                                <input id="initial_ar_no"  class="form-control @error('initial_ar_no') is-invalid @enderror" type="text" name="initial_ar_no" value="{{ old('initial_ar_no', $company->initial_ar_no) }}" placeholder="@lang('Type Your Comapny Initial AR No')">
                                                @error('initial_ar_no')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="ar_prefix" class="form-label">@lang('AR Prefix')</label>
                                                <input id="ar_prefix"  class="form-control @error('ar_prefix') is-invalid @enderror" type="text" name="ar_prefix" value="{{ old('ar_prefix', $company->ar_prefix) }}" placeholder="@lang('Type Your Comapny AR Prefix')">
                                                @error('ar_prefix')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-header align-items-center d-flex">
                                    <h4 class="card-title mb-0 flex-grow-1">@lang('Accounts Payable Setup')</h4>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="initial_ap_no" class="form-label">@lang('Initial AP No')</label>
                                                <input id="initial_ap_no"  class="form-control @error('initial_ap_no') is-invalid @enderror" type="text" name="initial_ap_no" value="{{ old('initial_ap_no', $company->initial_ap_no) }}" placeholder="@lang('Type Your Comapny Initial AP No')">
                                                @error('initial_ap_no')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="ap_prefix" class="form-label">@lang('AP Prefix')</label>
                                                <input id="ap_prefix"  class="form-control @error('ap_prefix') is-invalid @enderror" type="text" name="ap_prefix" value="{{ old('ap_prefix', $company->ap_prefix) }}" placeholder="@lang('Type Your Comapny AP Prefix')">
                                                @error('ap_prefix')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-header align-items-center d-flex">
                                    <h4 class="card-title mb-0 flex-grow-1">@lang('General Ledger Setup')</h4>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-check form-check-info mb-3">
                                                <input id="accounts_receivable" class="form-check-input" type="checkbox" name="accounts_receivable" value="{{ true }}" @if($company->accounts_receivable == "1") checked @endif>
                                                <label for="accounts_receivable" class="form-label">@lang('Accounts Receivable')</label>
                                                @error('accounts_receivable')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-check form-check-info mb-3">
                                                <input id="accounts_payable" class="form-check-input" type="checkbox" name="accounts_payable" value="{{ true }}" @if($company->accounts_payable == "1") checked @endif>
                                                <label for="accounts_payable" class="form-label">@lang('Accounts Payable')</label>
                                                @error('accounts_payable')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-check form-check-info mb-3">
                                                <input id="inventory" class="form-check-input" type="checkbox" name="inventory" value="{{ true }}" @if($company->inventory == "1") checked @endif>
                                                <label for="inventory" class="form-label">@lang('Inventory')</label>
                                                @error('inventory')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card-body">
                                    <input type="submit" value="@lang('common.submit')" class="btn btn-info btn-lg"/>
                                    <a href="{{ route('dashboard') }}" class="btn btn-warning btn-lg float-end">@lang('common.cancel')</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            {{--  <form class="form-material form-horizontal" action="{{ route('company.update', $company) }}" method="POST" enctype="multipart/form-data">
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
                                    <label for="name" class="form-label">@lang('Name') <b class="ambitious-crimson">*</b></label>
                                    <input id="name"  class="form-control @error('name') is-invalid @enderror" type="text" name="name" value="{{ old('name', $company->name) }}" placeholder="@lang('Type Your Company Name')" required>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="phone" class="form-label">@lang('Phone') <b class="ambitious-crimson">*</b></label>
                                    <input id="phone" class="form-control @error('phone') is-invalid @enderror" type="text" name="phone" value="{{ old('phone', $company->phone) }}" placeholder="@lang('Type Your Company Phone Number')" required>
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
                                    <input id="fax" class="form-control  @error('fax') is-invalid @enderror" type="text" name="fax" value="{{ old('fax', $company->fax) }}" placeholder="@lang('Type Company Fax Number')">
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
                                    <input id="url" class="form-control  @error('url') is-invalid @enderror" type="text" name="url" value="{{ old('url', $company->url) }}" placeholder="@lang('Type Company URL Address')">
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
                                    <label for="country" class="form-label">@lang('Country') <b class="ambitious-crimson">*</b></label>
                                    <select id="country" class="form-control @error('country') is-invalid @enderror select2" name="country" required>
                                        <option value="">@lang('Select Country')</option>
                                        @foreach($countriesList as $key => $value)
                                        <option value="{{ $key }}" {{ old('country',$company->country) == $key ? 'selected' : '' }} >{{ $value }}</option>
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
                                        <option value="{{ $key }}" {{ old('city') == $key ? 'selected' : '' }} >{{ $value }}</option>
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
                                    <input id="zip_code" class="form-control @error('zip_code') is-invalid @enderror" type="text" name="zip_code" value="{{ old('zip_code', $company->zip_code) }}" placeholder="@lang('Type Your Zip Code')">
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
                                    <textarea id="company_address_one" class="form-control" name="company_address_one" rows="3" placeholder="@lang('common.enter your address')">{{ $company->company_address_one }}</textarea>
                                    @error('company_address_two')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="company_address_two" class="form-label">@lang('Address Two')</label>
                                    <textarea id="company_address_two" class="form-control" name="company_address_two" rows="3" placeholder="@lang('common.enter your address')">{{ $company->company_address_two }}</textarea>
                                    @error('company_address_two')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="logo" class="form-label">@lang('Company Logo')<b class="ambitious-crimson">*</b></label>
                                    <input id="logo" class="dropify" name="logo" value="{{ old('logo') }}" type="file" data-allowed-file-extensions="png jpeg jpg" data-max-file-size="5120K" />
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
                                    <label for="currency_code" class="form-label">@lang('Code') <b class="ambitious-crimson">*</b></label>
                                    <select id="currency_code" class="form-control @error('currency_code') is-invalid @enderror select2" name="currency_code" required>
                                        <option value="">@lang('Select Currency Code')</option>
                                        @foreach($currencies as $key=> $value)
                                            <option value="{{ $key }}" {{ old('currency_code', $company->currency_code) == $key ? 'selected' : '' }}>{{ $key }}</option>
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
                                    <label for="currency_name" class="form-label">@lang('Currency Name') <b class="ambitious-crimson">*</b></label>
                                    <input id="currency_name" class="form-control @error('currency_name') is-invalid @enderror" type="text" name="currency_name" value="{{ old('currency_name', $company->currency_name) }}" placeholder="@lang('Type Your Currency Name')" required>
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
                                    <input id="decimal_precision" class="form-control @error('decimal_precision') is-invalid @enderror" type="text" name="decimal_precision" value="{{ old('decimal_precision', $company->decimal_precision) }}" placeholder="@lang('Type Your Currency Precision')">
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
                                    <input id="decimal_mark" class="form-control @error('decimal_mark') is-invalid @enderror" type="text" name="decimal_mark" value="{{ old('decimal_mark', $company->currency_decimal_mark) }}" placeholder="@lang('Type Your Currency Decimal Mark')">
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
                                    <label for="currency_symbol" class="form-label">@lang('Symbol') <b class="ambitious-crimson">*</b></label>
                                    <input id="currency_symbol" class="form-control @error('currency_symbol') is-invalid @enderror" type="text" name="currency_symbol" value="{{ old('currency_symbol', $company->currency_symbol) }}" placeholder="@lang('Type Your Currency Symbol')" required>
                                    @error('currency_symbol')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="currency_symbol_first" class="form-label">@lang('Symbol Position') <b class="ambitious-crimson">*</b></label>
                                    <select id="currency_symbol_first" class="form-control @error('currency_symbol_first') is-invalid @enderror" select2 name="currency_symbol_first" required>
                                        <option value="1" {{ old('currency_symbol_first', $company->currency_symbol_first) == 1 ? 'selected' : '' }}>@lang('Before Amount')</option>
                                        <option value="0" {{ old('currency_symbol_first', $company->currency_symbol_first) == 0 ? 'selected' : '' }}>@lang('After Amount')</option>
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
                                    <input id="federal_id" class="form-control @error('federal_id') is-invalid @enderror" type="text" name="federal_id" value="{{ old('federal_id', $company->federal_id) }}" placeholder="@lang('Type Your Federal Id')">
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
                                    <input id="tax_id" class="form-control @error('tax_id') is-invalid @enderror" type="text" name="tax_id" value="{{ old('tax_id', $company->tax_id) }}" placeholder="@lang('Type Your Tax Id')">
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
                                    <input id="fiscal_calendar" class="form-control @error('fiscal_calendar') is-invalid @enderror" type="text" name="fiscal_calendar" value="{{ old('fiscal_calendar', $company->fiscal_calendar) }}">
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
                                    <input id="production_calendar" class="form-control @error('production_calendar') is-invalid @enderror" type="text" name="production_calendar" value="{{ old('production_calendar', $company->production_calendar) }}">
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
                                    <label for="date_format" class="form-label">@lang('Date Format') <b class="ambitious-crimson">*</b></label>
                                    <select id="date_format" class="form-control @error('date_format') is-invalid @enderror" select2 name="date_format" required>
                                        <option value="d M Y" {{ old('date_format', $company->date_format) == "d M Y" ? 'selected' : '' }}>{{ date('d M Y') }}</option>
                                        <option value="d F Y" {{ old('date_format', $company->date_format) == "d F Y" ? 'selected' : '' }}>{{ date('d F Y') }}</option>
                                        <option value="d m Y" {{ old('date_format', $company->date_format) == "d m Y" ? 'selected' : '' }}>{{ date('d m Y') }}</option>
                                        <option value="m d Y" {{ old('date_format', $company->date_format) == "m d Y" ? 'selected' : '' }}>{{ date('m d Y') }}</option>
                                        <option value="Y m d" {{ old('date_format', $company->date_format) == "Y m d" ? 'selected' : '' }}>{{ date('Y m d') }}</option>
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
                                    <label for="date_separator" class="form-label">@lang('Date Separator') <b class="ambitious-crimson">*</b></label>
                                    <select id="date_separator" class="form-control @error('date_separator') is-invalid @enderror" select2 name="date_separator" required>
                                        <option value="dash" {{ old('date_separator', $company->date_separator) == "dash" ? 'selected' : '' }}>{{ __('Dash') }} (-)</option>
                                        <option value="slash" {{ old('date_separator', $company->date_separator) == "slash" ? 'selected' : '' }}>{{ __('Slash') }} (/)</option>
                                        <option value="dot" {{ old('date_separator', $company->date_separator) == "dot" ? 'selected' : '' }}>{{ __('Dot') }} (.)</option>
                                        <option value="comma" {{ old('date_separator', $company->date_separator) == "comma" ? 'selected' : '' }}>{{ __('Comma') }} (,)</option>
                                        <option value="space" {{ old('date_separator', $company->date_separator) == "space" ? 'selected' : '' }}>{{ __('Space') }} ( )</option>
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
                                    <label for="time_format" class="form-label">@lang('Time Format') <b class="ambitious-crimson">*</b></label>
                                    <select id="time_format" class="form-control @error('time_format') is-invalid @enderror" select2 name="time_format" required>
                                        <option value="h" {{ old('time_format', $company->time_format) == "h" ? 'selected' : '' }}>{{ "12-Hour Format" }}</option>
                                        <option value="H" {{ old('time_format', $company->time_format) == "H" ? 'selected' : '' }}>{{ "24-Hour Format" }}</option>
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
                                    <label for="time_decorations" class="form-label">@lang('Time Decorations') <b class="ambitious-crimson">*</b></label>
                                    <select id="time_decorations" class="form-control @error('time_decorations') is-invalid @enderror" select2 name="time_decorations" required>
                                        <option value="A" {{ old('time_decorations', $company->time_decorations) == "A" ? 'selected' : '' }}>{{ "Uppercase (AM or PM)" }}</option>
                                        <option value="a" {{ old('time_decorations', $company->time_decorations) == "a" ? 'selected' : '' }}>{{ "Lowercase (am or pm)" }}</option>
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
                                    <label for="language" class="form-label">@lang('common.default language') <b class="ambitious-crimson">*</b></label>
                                    <select id="language" class="form-control @error('language') is-invalid @enderror" select2 name="language" required>
                                        @php
                                            $defaultLang = env('LOCALE_LANG', 'en');
                                        @endphp
                                        <option value="">@lang('common.select language')</option>
                                        @foreach($getLang as $key => $value)
                                            <option value="{{ $key }}" {{ old('language', $defaultLang, $company->language) == $key ? 'selected' : '' }} >{{ $value }}</option>
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
                                    <label for="enabled" class="form-label">@lang('Enabled') <b class="ambitious-crimson">*</b></label>
                                    <select id="enabled" class="form-control @error('enabled') is-invalid @enderror" select2 name="enabled" required>
                                        <option value="1" {{ old('enabled', $company->enabled) == 1 ? 'selected' : '' }}>@lang('Yes')</option>
                                        <option value="0" {{ old('enabled', $company->enabled) == 0 ? 'selected' : '' }}>@lang('No')</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <input type="submit" value="@lang('common.submit')" class="btn btn-info btn-lg"/>
                        <a href="{{ route('dashboard') }}" class="btn btn-warning btn-lg float-end">@lang('common.cancel')</a>
                    </div>
                </div>
            </form>  --}}
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
            if(countryId){
                $.ajax({
                    url: '{{ url('company/selectedStateData') }}',

                    type:"GET",
                    dataType: 'JSON',
                    data:{countryId:countryId},
                    success:function(html){
                        if(html){
                            $("#state").empty();
                            $("#city").empty();
                            $("#state").append('<option>{{ __('Select State') }}</option>');
                            $("#city").append('<option>{{ __('Select City') }}</option>');
                            $.each(html.states,function(key,value){
                                if (key == selectState) {
                                    $("#state").append('<option selected="selected" value="'+key+'">'+value+'</option>');
                                } else {
                                    $("#state").append('<option value="'+key+'">'+value+'</option>');
                                }
                            });
                            $.each(html.cities,function(key,value){
                                if (key == selectCity) {
                                    $("#city").append('<option selected="selected" value="'+key+'">'+value+'</option>');
                                } else {
                                    $("#city").append('<option value="'+key+'">'+value+'</option>');
                                }
                            });
                        }else{
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

            $('#country').on('change', function(){
                var countryId = $(this).val();
                if(countryId){
                    $.ajax({
                        url: '{{ url('company/selectedStateData') }}',

                        type:"GET",
                        dataType: 'JSON',
                        data:{countryId:countryId},
                        success:function(html){
                            if(html){
                                $("#state").empty();
                                $("#city").empty();
                                $("#state").append('<option>{{ __('Select State') }}</option>');
                                $("#city").append('<option>{{ __('Select City') }}</option>');
                                $.each(html.states,function(key,value){
                                    $("#state").append('<option value="'+key+'">'+value+'</option>');
                                });
                                $.each(html.cities,function(key,value){
                                    $("#city").append('<option value="'+key+'">'+value+'</option>');
                                });
                            }else{
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

