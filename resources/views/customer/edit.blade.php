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
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="url" class="form-label">@lang('Ptoto')</label>
                                        <input id="logo" class="dropify" name="logo" value="{{ old('logo') }}" type="file" data-allowed-file-extensions="png jpg jpeg" data-max-file-size="5120K" />
                                        <small id="name" class="form-text text-muted">@lang('Leave Blank For Remain Unchanged')</small>
                                        <p>@lang('Max Size: 5MB, Allowed Format: png jpg jpeg')</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <input type="submit" value="@lang('Submit')" class="btn btn-info btn-lg" />
                                <a href="{{ route('dashboard.index') }}" class="btn btn-warning btn-lg float-end">@lang('Cancel')</a>
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane" id="shipping_tab" role="tabpanel">
                        <form class="form-material form-horizontal" action="{{ route('customer.shippingUpdate', $customer->id) }}" method="POST" enctype="multipart/form-data">
                            <div class="card-body">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="ship_address_one" class="form-label">@lang('Ship Address One')</label>
                                            <input id="ship_address_one"  class="form-control @error('ship_address_one') is-invalid @enderror" type="text" name="ship_address_one" value="{{ old('ship_address_one', $customer->ship_address_one) }}" placeholder="@lang('Type Your Shipping Address One Address')">
                                            @error('ship_address_one')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="ship_address_two" class="form-label">@lang('Ship Address Two')</label>
                                            <input id="ship_address_two"  class="form-control @error('ship_address_two') is-invalid @enderror" type="text" name="ship_address_two" value="{{ old('ship_address_two', $customer->ship_address_two) }}" placeholder="@lang('Type Your Shipping Address Two Address')">
                                            @error('ship_address_two')
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
                                            <label for="ship_country" class="form-label">@lang('Ship Country') <b class="ambitious-crimson">*</b></label>
                                            <select id="ship_country" class="form-control @error('ship_country') is-invalid @enderror select2" name="ship_country" required>
                                                <option value="">@lang('Select Ship Country')</option>
                                                @foreach($countriesList as $key => $value)
                                                <option value="{{ $key }}" {{ old('ship_country', $customer->ship_country) == $key ? 'selected' : '' }} >{{ $value }}</option>
                                                @endforeach
                                            </select>
                                            @error('ship_country')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="ship_state" class="form-label">@lang('Ship State') <b class="ambitious-crimson">*</b></label>
                                            <select id="ship_state" class="form-control @error('ship_state') is-invalid @enderror select2" name="ship_state" required>
                                                <option value="">@lang('Select Ship State')</option>
                                            </select>
                                            @error('ship_state')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-2">
                                            <label for="ship_city" class="form-label">@lang('Ship City')</label>
                                            <select id="ship_city" class="form-control @error('ship_city') is-invalid @enderror select2" name="ship_city">
                                                <option value="">@lang('Select Ship City')</option>
                                            </select>
                                            @error('ship_city')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-2">
                                            <label for="ship_zip_code" class="form-label">@lang('Ship Zip Code')</label>
                                            <input id="ship_zip_code" class="form-control @error('ship_zip_code') is-invalid @enderror" type="text" name="ship_zip_code" value="{{ old('ship_zip_code', $customer->ship_zip_code) }}" placeholder="@lang('Type Your Ship Zip Code')">
                                            @error('ship_zip_code')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-2">
                                            <label for="ship_phone" class="form-label">@lang('Ship Phone')</label>
                                            <input id="ship_phone"  class="form-control @error('ship_phone') is-invalid @enderror" type="text" name="ship_phone" value="{{ old('ship_phone', $customer->ship_phone) }}" placeholder="@lang('Type Your Ship Phone Number')">
                                            @error('ship_phone')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-2">
                                            <label for="ship_fax" class="form-label">@lang('Ship Fax')</label>
                                            <input id="ship_fax"  class="form-control @error('ship_fax') is-invalid @enderror" type="text" name="ship_fax" value="{{ old('ship_fax', $customer->ship_fax) }}" placeholder="@lang('Type Your Ship Fax Address')">
                                            @error('ship_fax')
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
                        </form>
                    </div>
                    <div class="tab-pane" id="bill_tab" role="tabpanel">
                        <form class="form-material form-horizontal" action="{{ route('customer.billUpdate', $customer->id) }}" method="POST" enctype="multipart/form-data">
                            <div class="card-body">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="bill_currency_id" class="form-label">@lang('Currency')</label>
                                            <select id="bill_currency_id"
                                                class="form-control @error('bill_currency_id') is-invalid @enderror select2"
                                                name="bill_currency_id">
                                                <option value="">@lang('Select Currency Code')</option>
                                                @foreach ($currencies as $key => $value)
                                                    <option value="{{ $key }}"
                                                        {{ old('bill_currency_id', $customer->bill_currency_id) == $key ? 'selected' : '' }}>
                                                        {{ $value['name']." (".$key." )" }}</option>
                                                @endforeach
                                            </select>
                                            @error('bill_currency_id')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="bill_customer_group_id" class="form-label">@lang('Customer Group')</label>
                                            <select id="bill_customer_group_id" class="form-control @error('bill_customer_group_id') is-invalid @enderror select2" name="bill_customer_group_id">
                                                <option value="">@lang('Select Customer Group')</option>
                                                @foreach ($customerGroupList as $key => $value)
                                                <option value="{{ $key }}"
                                                        {{ old('bill_customer_group_id', $customer->bill_customer_group_id) == $key ? 'selected' : '' }}>
                                                        {{ ucfirst($value) }}</option>
                                                @endforeach
                                            </select>
                                            @error('bill_customer_group_id')
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
                                            <label for="bill_payment_method_id" class="form-label">@lang('Payment Method')</label>
                                            <select id="bill_payment_method_id" class="form-control @error('bill_payment_method_id') is-invalid @enderror select2" name="bill_payment_method_id">
                                                <option value="">@lang('Select Payment Method')</option>
                                                <option value="cash" @if($customer->bill_payment_method_id == "cash") selected @endif>@lang('Cash')</option>
                                                <option value="credit_card" @if($customer->bill_payment_method_id == "credit_card") selected @endif>@lang('Credit Card')</option>
                                                <option value="credit_card_2" @if($customer->bill_payment_method_id == "credit_card_2") selected @endif>@lang('Credit Card 2')</option>
                                                <option value="lock_box" @if($customer->bill_payment_method_id == "lock_box") selected @endif>@lang('LockBox')</option>
                                                <option value="check" @if($customer->bill_payment_method_id == "check") selected @endif>@lang('Check')</option>
                                                <option value="payment_clearing" @if($customer->bill_payment_method_id == "payment_clearing") selected @endif>@lang('Payment Clearing')</option>
                                                <option value="opr_cash" @if($customer->bill_payment_method_id == "opr_cash") selected @endif>@lang('OPR-Cash')</option>
                                                <option value="store_credit" @if($customer->bill_payment_method_id == "store_credit") selected @endif>@lang('Store Credit')</option>
                                            </select>
                                            @error('bill_payment_method_id')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="bill_federal_id" class="form-label">@lang('Federal ID')</label>
                                            <input id="bill_federal_id"  class="form-control @error('bill_federal_id') is-invalid @enderror" type="text" name="bill_federal_id" value="{{ old('bill_federal_id', $customer->bill_federal_id) }}" placeholder="@lang('Type Your Bill Federal Id')">
                                            @error('bill_federal_id')
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
                                            <label for="bill_terms_id" class="form-label">@lang('Terms')</label>
                                            <select id="bill_terms_id" class="form-control @error('bill_terms_id') is-invalid @enderror select2" name="bill_terms_id">
                                                <option value="">@lang('Select Bill Terms')</option>
                                                <option value="1_10_net_30" @if($customer->bill_terms_id == "1_10_net_30") selected @endif>@lang('1/10 Net 30')</option>
                                                <option value="12_months_payments" @if($customer->bill_terms_id == "12_months_payments") selected @endif>@lang('12 months payments')</option>
                                                <option value="18_month_payments" @if($customer->bill_terms_id == "18_month_payments") selected @endif>@lang('18 months payments')</option>
                                                <option value="2_10_net_30" @if($customer->bill_terms_id == "2_10_net_30") selected @endif>@lang('2/10 Net 30')</option>
                                                <option value="cash_on_delivery" @if($customer->bill_terms_id == "cash_on_delivery") selected @endif>@lang('Cash on Delivery')</option>
                                                <option value="credit_card" @if($customer->bill_terms_id == "credit_card") selected @endif>@lang('Credit Card')</option>
                                                <option value="net_30" @if($customer->bill_terms_id == "net_30") selected @endif>@lang('Net 30')</option>
                                                <option value="net_45" @if($customer->bill_terms_id == "net_45") selected @endif>@lang('Net 45')</option>
                                                <option value="pnp_multiple_discounts" @if($customer->bill_terms_id == "pnp_multiple_discounts") selected @endif>@lang('PNP Multiple Discounts')</option>
                                                <option value="pnp12_month_payment_schedule" @if($customer->bill_terms_id == "pnp12_month_payment_schedule") selected @endif>@lang('PNP12 Month Payment Schedule')</option>
                                                <option value="poslbterms" @if($customer->bill_terms_id == "poslbterms") selected @endif>@lang('POSLBTERMS')</option>
                                            </select>
                                            @error('bill_terms_id')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="bill_terms_type" class="form-label">@lang('Term Type')</label>
                                            <input id="bill_terms_type"  class="form-control @error('bill_terms_type') is-invalid @enderror" type="text" name="bill_terms_type" value="{{ old('bill_terms_type', $customer->bill_terms_type) }}" placeholder="@lang('Type Your Bill Terms Type')">
                                            @error('bill_terms_type')
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
                                            <label for="bill_ship_via" class="form-label">@lang('Ship Via')</label>
                                            <input id="bill_ship_via"  class="form-control @error('bill_ship_via') is-invalid @enderror" type="text" name="bill_ship_via" value="{{ old('bill_ship_via', $customer->bill_ship_via) }}" placeholder="@lang('Type Your Bill Ship Via')">
                                            @error('bill_ship_via')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="bill_fob" class="form-label">@lang('FOB')</label>
                                            <input id="bill_fob"  class="form-control @error('bill_fob') is-invalid @enderror" type="text" name="bill_fob" value="{{ old('bill_fob', $customer->bill_fob) }}" placeholder="@lang('Type Your Bill FOB')">
                                            @error('bill_fob')
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
                                            <label for="bill_tax_id" class="form-label">@lang('Tax ID')</label>
                                            <input id="bill_tax_id"  class="form-control @error('bill_tax_id') is-invalid @enderror" type="text" name="bill_tax_id" value="{{ old('bill_tax_id', $customer->bill_tax_id) }}" placeholder="@lang('Type Your Bill Tax Id')">
                                            @error('bill_tax_id')
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
                        </form>
                    </div>
                    <div class="tab-pane" id="account_action_tab" role="tabpanel">
                        <form class="form-material form-horizontal" action="{{ route('customer.accountUpdate', $customer->id) }}" method="POST" enctype="multipart/form-data">
                            <div class="card-body">
                                @csrf
                                @method('PUT')
                                <h4 class="card-title mb-0 flex-grow-1 mb-1">@lang('Contact Info')</h4>
                                <hr>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="contact_name" class="form-label">@lang('Name')</label>
                                            <input id="contact_name"  class="form-control @error('contact_name') is-invalid @enderror" type="text" name="contact_name" value="{{ old('contact_name', $customer->contact_name) }}" placeholder="@lang('Type Your Contact Name')">
                                            @error('contact_name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="contact_title" class="form-label">@lang('Title')</label>
                                            <input id="contact_title"  class="form-control @error('contact_title') is-invalid @enderror" type="text" name="contact_title" value="{{ old('contact_title', $customer->contact_title) }}" placeholder="@lang('Type Your Customer Title')">
                                            @error('contact_title')
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
                                            <label for="contact_email" class="form-label">@lang('Email')</label>
                                            <input id="contact_email"  class="form-control @error('contact_email') is-invalid @enderror" type="text" name="contact_email" value="{{ old('contact_email', $customer->contact_email) }}" placeholder="@lang('Type Your Contact Email')">
                                            @error('contact_email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="contact_phone" class="form-label">@lang('Phone')</label>
                                            <input id="contact_phone"  class="form-control @error('contact_phone') is-invalid @enderror" type="text" name="contact_phone" value="{{ old('contact_phone', $customer->contact_phone) }}" placeholder="@lang('Type Your Contact Phone')">
                                            @error('contact_phone')
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
                                            <label for="contact_cell_phone" class="form-label">@lang('Cell Phone')</label>
                                            <input id="contact_cell_phone"  class="form-control @error('contact_cell_phone') is-invalid @enderror" type="text" name="contact_cell_phone" value="{{ old('contact_cell_phone', $customer->contact_cell_phone) }}" placeholder="@lang('Type Your Contact Cell Phone')">
                                            @error('contact_cell_phone')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <h4 class="card-title mb-0 flex-grow-1 mb-1 mt-1">@lang('Primary Contact')</h4>
                                <hr>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-check form-check-info mb-3">
                                            <input id="billing" class="form-check-input" type="checkbox" name="billing" value="{{ true }}" @if ($customer->billing == '1') checked @endif>
                                            <label for="billing" class="form-label">@lang('Billing')</label>
                                            @error('billing')
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
                                            <input id="purchasing" class="form-check-input" type="checkbox" name="purchasing" value="{{ true }}" @if ($customer->purchasing == '1') checked @endif>
                                            <label for="purchasing" class="form-label">@lang('Purchasing')</label>
                                            @error('purchasing')
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
                                            <input id="shipping" class="form-check-input" type="checkbox" name="shipping" value="{{ true }}" @if ($customer->shipping == '1') checked @endif>
                                            <label for="shipping" class="form-label">@lang('Shipping')</label>
                                            @error('shipping')
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

            let shipCountryId = $("#ship_country").val();
            let selectShipState = {{ $customer->ship_state ? $customer->ship_state : '2336' }};
            let selectShipCity = {{ $customer->ship_city ? $customer->ship_city : '48615' }};
            if (shipCountryId) {
                $.ajax({
                    url: '{{ url('company/selectedStateData') }}',
                    type: "GET",
                    dataType: 'JSON',
                    data: {
                        countryId: shipCountryId
                    },
                    success: function(html) {
                        if (html) {
                            $("#ship_state").empty();
                            $("#ship_city").empty();
                            $("#ship_state").append('<option>{{ __('Select Ship State') }}</option>');
                            $("#ship_city").append('<option>{{ __('Select Ship City') }}</option>');
                            $.each(html.states, function(key, value) {
                                if (key == selectShipState) {
                                    $("#ship_state").append('<option selected="selected" value="' +
                                        key + '">' + value + '</option>');
                                } else {
                                    $("#ship_state").append('<option value="' + key + '">' + value +
                                        '</option>');
                                }
                            });
                            $.each(html.cities, function(key, value) {
                                if (key == selectShipCity) {
                                    $("#ship_city").append('<option selected="selected" value="' +
                                        key + '">' + value + '</option>');
                                } else {
                                    $("#ship_city").append('<option value="' + key + '">' + value +
                                        '</option>');
                                }
                            });
                        } else {
                            $("#ship_state").empty();
                            $("#ship_city").empty();
                        }
                    }
                });
            } else {
                $('#ship_state').html('<option value="">{{ __('Select Ship Country First') }}</option>');
                $('#ship_city').html('<option value="">{{ __('Select Ship State First') }}</option>');
            }

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

            $('#ship_country').on('change', function() {
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
                                $("#ship_state").empty();
                                $("#ship_city").empty();
                                $("#ship_state").append(
                                    '<option>{{ __('Select Ship State') }}</option>');
                                $("#ship_city").append('<option>{{ __('Select Ship City') }}</option>');
                                $.each(html.states, function(key, value) {
                                    $("#ship_state").append('<option value="' + key + '">' +
                                        value + '</option>');
                                });
                                $.each(html.cities, function(key, value) {
                                    $("#ship_city").append('<option value="' + key + '">' +
                                        value + '</option>');
                                });
                            } else {
                                $("#ship_state").empty();
                                $("#ship_city").empty();
                            }
                        }
                    });
                } else {
                    $('#ship_state').html('<option value="">{{ __('Select Ship Country First') }}</option>');
                    $('#ship_city').html('<option value="">{{ __('Select Ship State First') }}</option>');
                }
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
