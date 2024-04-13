@extends('layouts.master')
@section('title') @lang('Quotes')  @endsection
@section('css')
    <link rel="stylesheet" href="{{ URL::asset('assets/dropify/dist/css/dropify.min.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    @component('components.breadcrumb')
        @slot('li_1') @lang('Quotes') @endslot
        @slot('title') @lang('Create Quote')  @endslot
    @endcomponent
    <div class="row">
        <form class="form-material form-horizontal" action="{{ route('quote.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">@lang('Quote Create Information')</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="quote_entry" class="form-label">@lang('Oppotunity / Quote Entry') <b class="ambitious-crimson">*</b></label>
                                <input id="quote_entry"  class="form-control @error('quote_entry') is-invalid @enderror" type="text" name="quote_entry" value="{{ old('quote_entry') }}" placeholder="@lang('Type Your Quote Entry')" required>
                                @error('quote_entry')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <fieldset class="custom-border p-3">
                                <div class="row mb-2"><div class="form-check"><div class="float-end"><br></div></div></div>
                                <legend class="float-none w-auto px-1 custom_heading" >@lang('Sold To')</legend>
                                <div class="row mb-3">
                                    <div class="col-lg-3">
                                        <label for="sold_to_customer_id" class="form-label float-end">@lang('Customer') <b class="ambitious-crimson">*</b></label>
                                    </div>
                                    <div class="col-lg-9">
                                        <select id="sold_to_customer_id" class="form-control select2 @error('sold_to_customer_id') is-invalid @enderror" name="sold_to_customer_id" required>
                                            <option value="">@lang('Select Customer')</option>
                                            @foreach($customers as $value)
                                            <option value="{{ $value->id }}" {{ old('sold_to_customer_id') == $value->id ? 'selected' : '' }} >{{ $value->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('sold_to_customer_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-lg-3">
                                        <label for="sold_to_customer_name_address" class="form-label float-end">@lang('Name & Address')</label>
                                    </div>
                                    <div class="col-lg-9">
                                        <textarea id="sold_to_customer_name_address" class="form-control" name="sold_to_customer_name_address" rows="3" placeholder="@lang('Select Customer, Name & Address Is Searchable')"></textarea>
                                        @error('sold_to_customer_name_address')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                        <div class="col-md-6">
                            <fieldset class="custom-border p-3">
                                <legend class="float-none w-auto px-1 custom_heading" >@lang('Ship To')</legend>
                                <div class="row mb-2">
                                    <div class="form-check">
                                        <div class="float-end">
                                            <label class="form-check-label" for="one_time_ship_address">
                                                @lang('One Time')
                                            </label>
                                            <input class="form-check-input" type="checkbox" id="one_time_ship_address" name="one_time_ship_address" value="1">
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-lg-3">
                                        <label for="ship_to_customer_id" class="form-label float-end">@lang('Customer') <b class="ambitious-crimson">*</b></label>
                                    </div>
                                    <div class="col-md-4">
                                        <select id="ship_to_customer_id" class="form-control select2 @error('ship_to_customer_id') is-invalid @enderror" name="ship_to_customer_id">
                                            <option value="">@lang('Select Customer')</option>
                                            @foreach($customers as $value)
                                            <option value="{{ $value->id }}" {{ old('ship_to_customer_id') == $value->id ? 'selected' : '' }} >{{ $value->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('ship_to_customer_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-lg-2">
                                        <label for="one_time_ship_id" class="form-label float-end">@lang('Ship To')</label>
                                    </div>
                                    <div class="col-md-3">

                                        <div id="one_time_ship_address_not_checked">
                                            <select id="one_time_ship_id" class="form-control select2 @error('one_time_ship_id') is-invalid @enderror" name="one_time_ship_id">
                                                <option value="">@lang('Select Customer')</option>
                                                @foreach($customers as $value)
                                                <option value="{{ $value->id }}" {{ old('ship_to_customer_id') == $value->id ? 'selected' : '' }} >{{ $value->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        
                                        <div id="one_time_ship_address_checked">
                                            <select id="one_time_ship_id_checked" class="form-control select2 @error('one_time_ship_id_checked') is-invalid @enderror" name="one_time_ship_id_checked">
                                                <option value="">@lang('Select One Time Ship')</option>
                                                @foreach($oneTimeShipData as $value)
                                                <option value="{{ $value->id }}" {{ old('one_time_ship_id_checked') == $value->id ? 'selected' : '' }} >{{ $value->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @error('one_time_ship_id_checked')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-lg-3">
                                        <label for="ship_to_customer_name_address" class="form-label float-end">@lang('Name & Address')</label>
                                    </div>
                                    <div class="col-lg-9">
                                        <textarea id="ship_to_customer_name_address" class="form-control" name="ship_to_customer_name_address" rows="3" placeholder="@lang('Select Customer, Name & Address Is Searchable')"></textarea>
                                        @error('ship_to_customer_name_address')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-6">
                            <fieldset class="custom-border p-3">
                                <legend class="float-none w-auto px-1 custom_heading" >@lang('Bill To')</legend>
                                <div class="row mb-3">
                                    <div class="col-md-2">
                                        <label for="bill_to_customer" class="form-label float-end">@lang('Customer') <b class="ambitious-crimson">*</b></label>
                                    </div>
                                    <div class="col-md-10">
                                        <select id="bill_to_customer" class="form-control select2 @error('bill_to_customer') is-invalid @enderror" name="bill_to_customer" required>
                                            <option value="">@lang('Same as Sold To')</option>
                                            @foreach($customers as $value)
                                            <option value="{{ $value->id }}" {{ old('bill_to_customer') == $value->id ? 'selected' : '' }} >{{ $value->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('bill_to_customer')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-2">
                                        <label for="bill_to_po" class="form-label float-end">@lang('PO')</label>
                                    </div>
                                    <div class="col-md-4">
                                        <input id="bill_to_po"  class="form-control @error('bill_to_po') is-invalid @enderror" type="text" name="bill_to_po" value="{{ old('bill_to_po') }}" placeholder="@lang('Type Your Po')">
                                        @error('bill_to_po')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-2">
                                        <label for="ship_via" class="form-label float-end">@lang('Ship Via')</label>
                                    </div>
                                    <div class="col-md-4">
                                        <select id="ship_via" class="form-control select2 @error('ship_via') is-invalid @enderror" name="ship_via">
                                            <option value="">@lang('Select Ship Via')</option>
                                            <option value="Company_Truck" {{ old('ship_via') == "Company_Truck" ? 'selected' : '' }}>@lang('Company Truck')</option>
                                            <option value="Container Ship" {{ old('ship_via') == "Container_Ship" ? 'selected' : '' }}>@lang('Container Ship')</option>
                                            <option value="Fedex_Express" {{ old('ship_via') == "Fedex_Express" ? 'selected' : '' }}>@lang('Fedex Express')</option>
                                        </select>
                                        @error('ship_via')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-2">
                                        <label for="bill_to_open" class="form-label float-end">@lang('Open')</label>
                                    </div>
                                    <div class="col-md-4">
                                        <input id="bill_to_open"  class="form-control @error('bill_to_open') is-invalid @enderror" type="text" name="bill_to_open" value="{{ old('bill_to_open') }}" placeholder="@lang('Pick Open Date')">
                                        @error('bill_to_open')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-2">
                                        <label for="terms" class="form-label float-end">@lang('Terms')</label>
                                    </div>
                                    <div class="col-md-4">
                                        <select id="terms" class="form-control @error('terms') is-invalid @enderror select2" name="terms">
                                            <option value="">@lang('Select Terms')</option>
                                            <option value="1_10_net_30">@lang('1/10 Net 30')</option>
                                            <option value="12_months_payments">@lang('12 months payments')</option>
                                            <option value="18_month_payments">@lang('18 months payments')</option>
                                            <option value="2_10_net_30">@lang('2/10 Net 30')</option>
                                            <option value="cash_on_delivery">@lang('Cash on Delivery')</option>
                                            <option value="credit_card">@lang('Credit Card')</option>
                                            <option value="net_30">@lang('Net 30')</option>
                                            <option value="net_45">@lang('Net 45')</option>
                                            <option value="pnp_multiple_discounts">@lang('PNP Multiple Discounts')</option>
                                            <option value="pnp12_month_payment_schedule">@lang('PNP12 Month Payment Schedule')</option>
                                            <option value="poslbterms">@lang('POSLBTERMS')</option>
                                        </select>
                                        @error('terms')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-2">
                                        <label for="bill_to_due" class="form-label float-end">@lang('Due')</label>
                                    </div>
                                    <div class="col-md-4">
                                        <input id="bill_to_due"  class="form-control @error('bill_to_due') is-invalid @enderror" type="text" name="bill_to_due" value="{{ old('bill_to_due') }}" placeholder="@lang('Pick Due Date')">
                                        @error('bill_to_due')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-2">
                                        <label for="disc" class="form-label float-end">@lang('Disc %')</label>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="input-group">
                                            <input id="disc"  class="form-control @error('disc') is-invalid @enderror" type="text" name="disc" value="{{ old('disc','0.00') }}" placeholder="@lang('0.00')">
                                            <span class="input-group-text">%</span>
                                            @error('disc')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>    
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-2">
                                        <label for="bill_to_days_open" class="form-label float-end">@lang('Days Open')</label>
                                    </div>
                                    <div class="col-md-4">
                                        <input id="bill_to_days_open"  class="form-control @error('bill_to_days_open') is-invalid @enderror" type="text" name="bill_to_days_open" value="{{ old('bill_to_days_open') }}" placeholder="@lang('Type Your Days Open')">
                                        @error('bill_to_days_open')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-2">
                                        <label for="territory" class="form-label float-end">@lang('Territory')</label>
                                    </div>
                                    <div class="col-md-4">
                                        <select id="territory" class="form-control select2 @error('territory') is-invalid @enderror" name="territory">
                                            <option value="">@lang('Select Territory')</option>
                                            <option value="ECanada">@lang('East Canada - North America')</option>
                                            <option value="Germany">@lang('Germany - Asia')</option>
                                            <option value="Japan">@lang('Japan - Asia')</option>
                                            <option value="Mexico">@lang('Mexico - North America')</option>
                                            <option value="UK">@lang('United Kingdom - Europe')</option>
                                            <option value="US_MAT">@lang('United States - Mid Atlantic')</option>
                                            <option value="US_MID">@lang('United States - Mid West')</option>
                                            <option value="US_NE">@lang('United States - New England')</option>
                                            <option value="US_NW">@lang('United States - North West')</option>
                                            <option value="US_SE">@lang('United States - South East')</option>
                                            <option value="US_SW">@lang('United States - South West')</option>
                                            <option value="WCanada">@lang('West Canada - North America')</option>
                                        </select>
                                        @error('territory')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-5"></div>
                                    <div class="col-md-3">
                                        <label for="primary_sales" class="form-label float-end">@lang('Primary Salesperson')</label>
                                    </div>
                                    <div class="col-md-4">
                                        <select id="primary_sales" class="form-control select2 @error('primary_sales') is-invalid @enderror" name="primary_sales">
                                            <option value="">@lang('Select Primary Salesperson')</option>
                                            <option value="Frank_Wright">@lang('Frank Wright')</option>
                                            <option value="Fred_Grandy">@lang('Fred Grandy')</option>
                                            <option value="Hyuma_Hoshi">@lang('Hyuma Hoshi')</option>
                                            <option value="Isabel_Mota">@lang('Isabel Mota')</option>
                                            <option value="James_J_Baily">@lang('James J.Baily')</option>
                                            <option value="Kenny_Johnson">@lang('Kenny Johnson')</option>
                                            <option value="Nancy_Johnson">@lang('Nancy Johnson')</option>
                                            <option value="Penny_Lane">@lang('Penny Lane')</option>
                                        </select>
                                        @error('primary_sales')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <hr>
                                <div class="row mb-3">
                                    <div class="col-md-6"></div>
                                    <div class="col-md-2">
                                        <label for="best_case" class="form-label float-end">@lang('Best Case')</label>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="input-group">
                                            <input id="best_case"  class="form-control @error('best_case') is-invalid @enderror" type="text" name="best_case" value="{{ old('best_case','0.00') }}" placeholder="@lang('Type Your Best Case')">
                                            <span class="input-group-text">%</span>
                                        </div>
                                        @error('best_case')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-2">
                                        <label for="rating" class="form-label float-end">@lang('Rating')</label>
                                    </div>
                                    <div class="col-md-4">
                                        <input id="rating"  class="form-control @error('rating') is-invalid @enderror" type="text" name="rating" value="{{ old('rating') }}" placeholder="@lang('Type Your Rating')">
                                        @error('rating')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-2">
                                        <label for="worst_case" class="form-label float-end">@lang('Worst Case')</label>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="input-group">
                                            <input id="worst_case"  class="form-control @error('worst_case') is-invalid @enderror" type="text" name="worst_case" value="{{ old('worst_case','0.00') }}" placeholder="@lang('Type Your Worst Case')">
                                            <span class="input-group-text">%</span>
                                        </div>
                                        @error('worst_case')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-6"></div>
                                    <div class="col-md-2">
                                        <label for="confidence" class="form-label float-end">@lang('Confidence')</label>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="input-group">
                                            <input id="confidence"  class="form-control @error('confidence') is-invalid @enderror" type="text" name="confidence" value="{{ old('confidence','0.00') }}" placeholder="@lang('Type Your Confidence')">
                                            <span class="input-group-text">%</span>
                                        </div>
                                        @error('confidence')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                        <div class="col-md-6">
                            <fieldset class="custom-border p-3">
                                <legend class="float-none w-auto px-1 custom_heading" >@lang('Summary')</legend>
                                <div class="row mb-3">
                                    <div class="col-md-2">
                                        <label for="gross_value" class="form-label float-end">@lang('Gross Value')</label>
                                    </div>
                                    <div class="col-md-10">
                                        <input id="gross_value"  class="form-control @error('gross_value') is-invalid @enderror" type="text" name="gross_value" value="{{ old('gross_value','0.00') }}" placeholder="@lang('Type Your Gross Value')" required>
                                        @error('gross_value')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-2">
                                        <label for="discount_percentage" class="form-label float-end">@lang('Discount')</label>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="input-group">
                                            <input id="discount_percentage"  class="form-control @error('discount_percentage') is-invalid @enderror" type="text" name="discount_percentage" value="{{ old('discount_percentage','0.00') }}" placeholder="@lang('Type Your Discount Percentage')">
                                            <span class="input-group-text">%</span>
                                        </div>
                                        @error('discount_percentage')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <input id="discount_value"  class="form-control @error('discount_value') is-invalid @enderror" type="text" name="discount_value" value="{{ old('discount_value','0.00') }}" placeholder="@lang('Type Your Discount Value')">
                                        @error('discount_value')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-2">
                                        <label for="rounding" class="form-label float-end">@lang('Rounding')</label>
                                    </div>
                                    <div class="col-md-10">
                                        <input id="rounding"  class="form-control @error('rounding') is-invalid @enderror" type="text" name="rounding" value="{{ old('rounding','0.00') }}" placeholder="@lang('Type Your Rounding')">
                                        @error('rounding')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-2">
                                        <label for="potential" class="form-label float-end">@lang('Potential')</label>
                                    </div>
                                    <div class="col-md-10">
                                        <input id="potential"  class="form-control @error('potential') is-invalid @enderror" type="text" name="potential" value="{{ old('potential','0.00') }}" placeholder="@lang('Type Your Potential')">
                                        @error('potential')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-2">
                                        <label for="misc_charges" class="form-label float-end">@lang('Misc. Charges')</label>
                                    </div>
                                    <div class="col-md-10">
                                        <input id="misc_charges"  class="form-control @error('misc_charges') is-invalid @enderror" type="text" name="misc_charges" value="{{ old('misc_charges','0.00') }}" placeholder="@lang('Type Your Misc Charges')">
                                        @error('misc_charges')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-2">
                                        <label for="tax" class="form-label float-end">@lang('Tax')</label>
                                    </div>
                                    <div class="col-md-10">
                                        <input id="tax"  class="form-control @error('tax') is-invalid @enderror" type="text" name="tax" value="{{ old('tax','0.00') }}" placeholder="@lang('Type Your Tax')">
                                        @error('tax')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-2">
                                        <label for="total" class="form-label float-end">@lang('Total')</label>
                                    </div>
                                    <div class="col-md-10">
                                        <input id="total"  class="form-control @error('total') is-invalid @enderror" type="text" name="total" value="{{ old('total','0.00') }}" placeholder="@lang('Type Your Total')" required>
                                        @error('total')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-2">
                                        <label for="summary_best_case_percentage" class="form-label float-end">@lang('Best Case')</label>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="input-group">
                                            <input id="summary_best_case_percentage"  class="form-control @error('summary_best_case_percentage') is-invalid @enderror" type="text" name="summary_best_case_percentage" value="{{ old('summary_best_case_percentage','0.00') }}" placeholder="@lang('Type Your Best Case')">
                                            <span class="input-group-text">%</span>
                                        </div>
                                        @error('summary_best_case_percentage')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <input id="summary_best_case_value"  class="form-control @error('summary_best_case_value') is-invalid @enderror" type="text" name="summary_best_case_value" value="{{ old('summary_best_case_value','0.00') }}">
                                        @error('summary_best_case_value')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-2">
                                        <label for="summary_worst_case_percentage" class="form-label float-end">@lang('Worst Case')</label>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="input-group">
                                            <input id="summary_worst_case_percentage"  class="form-control @error('summary_worst_case_percentage') is-invalid @enderror" type="text" name="summary_worst_case_percentage" value="{{ old('summary_worst_case_percentage','0.00') }}" placeholder="@lang('Type Your Worst Case')">
                                            <span class="input-group-text">%</span>
                                        </div>
                                        @error('summary_worst_case_percentage')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <input id="summary_worst_case_value"  class="form-control @error('summary_worst_case_value') is-invalid @enderror" type="text" name="summary_worst_case_value" value="{{ old('summary_worst_case_value','0.00') }}">
                                        @error('summary_worst_case_value')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-2">
                                        <label for="summary_exptected_percentage" class="form-label float-end">@lang('Exptected')</label>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="input-group">
                                            <input id="summary_exptected_percentage"  class="form-control @error('summary_exptected_percentage') is-invalid @enderror" type="text" name="summary_exptected_percentage" value="{{ old('summary_exptected_percentage','0.00') }}" placeholder="@lang('Type Your Exptected')">
                                            <span class="input-group-text">%</span>
                                        </div>
                                        @error('summary_exptected_percentage')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <input id="summary_exptected_value"  class="form-control @error('summary_exptected_value') is-invalid @enderror" type="text" name="summary_exptected_value" value="{{ old('summary_exptected_value','0.00') }}">
                                        @error('summary_exptected_value')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <input id="submit" type="submit" value="@lang('Submit')" class="btn btn-info btn-lg"/>
                    <a href="{{ route('dashboard.index') }}" class="btn btn-warning btn-lg float-end">@lang('Cancel')</a>
                </div>
            </div>
        </form>
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

            

            $(document).on('change', '#discount_percentage', function () {
                let discount_value_age = 0.00;
                let discount_percentage = $('#discount_percentage').val();
                discount_percentage = (!discount_percentage.length || isNaN(discount_percentage)) ? 0 : parseFloat(discount_percentage);

                let gross_value = $('#gross_value').val();
                gross_value = (!gross_value.length || isNaN(gross_value)) ? 0 : parseFloat(gross_value);

                if(gross_value == 0) {
                    discount_value_age = 0.00;
                } else {
                    discount_value_age = (gross_value * discount_percentage * 0.01);
                }

                $('#discount_value').val(discount_value_age.toFixed(2));

                let tax = $('#tax').val();
                tax = (!tax.length || isNaN(tax)) ? 0 : parseFloat(tax);

                let total = gross_value - discount_value_age + tax;

                $('#total').val(total.toFixed(2));
            });

            $(document).on('change', '#gross_value, #discount_value, #tax', function () {

                let gross_value = $('#gross_value').val();
                gross_value = (!gross_value.length || isNaN(gross_value)) ? 0 : parseFloat(gross_value);

                let discount_value = $('#discount_value').val();
                discount_value = (!discount_value.length || isNaN(discount_value)) ? 0 : parseFloat(discount_value);

                let tax = $('#tax').val();
                tax = (!tax.length || isNaN(tax)) ? 0 : parseFloat(tax);


                let total = gross_value - discount_value + tax;

                $('#total').val(total.toFixed(2));
            });

            $('#sold_to_customer_id').on('change', function(){
                var sold_customer_id = $(this).val();
                if (sold_customer_id) {
                    $.ajax({
                        url: '{{ url('quote/selectedSoldCustomerId') }}',
                        type: "GET",
                        dataType: 'JSON',
                        data: {
                            sold_customer_id: sold_customer_id
                        },
                        success: function(html) {
                            if (html.selectedCustomer) {
                                let customer_name = html.selectedCustomer.name;
                                let address_one = "";
                                let address_two = "";
                                const br_my = '\r\n';
                                if(html.selectedCustomer.address_one){
                                    address_one = html.selectedCustomer.address_one;
                                }
                                
                                if(html.selectedCustomer.address_two){
                                    address_two = ', '+html.selectedCustomer.address_two;
                                }
                                $("#sold_to_customer_name_address").val(customer_name+br_my+address_one+address_two);
                                $("#ship_to_customer_name_address").val(customer_name+br_my+address_one+address_two);

                                $("#bill_to_customer").empty();
                                if(!$('#one_time_ship_address_checked').is(":checked")) {
                                    $("#one_time_ship_id").empty();
                                }
                                $("#ship_to_customer_id").empty();
                                $("#bill_to_customer").append('<option>{{ __('Same as Sold To') }}</option>');
                                if(!$('#one_time_ship_address_checked').is(":checked")) {
                                    $("#one_time_ship_id").append('<option>{{ __('Same as Sold To') }}</option>');
                                }
                                $("#ship_to_customer_id").append('<option>{{ __('Same as Sold To') }}</option>');
                                html.allCustomers.forEach(function(user) {
                                    if (user.id == sold_customer_id) {
                                        if(!$('#one_time_ship_address_checked').is(":checked")) {
                                            $("#one_time_ship_id").append('<option selected="selected" value="' + user.id + '">'+ user.name +'</option>');
                                        }
                                        $("#bill_to_customer").append('<option selected="selected" value="' + user.id + '">'+ user.name +'</option>');
                                        $("#ship_to_customer_id").append('<option selected="selected" value="' + user.id + '">'+ user.name +'</option>');
                                    } else {
                                        if(!$('#one_time_ship_address_checked').is(":checked")) {
                                            $("#one_time_ship_id").append('<option value="' + user.id + '">'+ user.name +'</option>');
                                        }
                                        $("#bill_to_customer").append('<option value="' + user.id + '">'+ user.name +'</option>');
                                        $("#ship_to_customer_id").append('<option value="' + user.id + '">'+ user.name +'</option>');
                                    }
                                });
                            }
                        }
                    });
                }
            });

            $("#one_time_ship_address_checked").hide();
            $('#one_time_ship_address').change(function() {
                if(this.checked) {
                    $("#one_time_ship_address_checked").show();
                    $("#one_time_ship_address_not_checked").hide();
                } else {
                    $("#one_time_ship_address_checked").hide();
                    $("#one_time_ship_address_not_checked").show();
                }     
            });

            $("#bill_to_open").flatpickr({
                enableTime: false,
                dateFormat: "d-m-y",
                defaultDate: "today"
            });

            $("#bill_to_due").flatpickr({
                enableTime: false,
                dateFormat: "d-m-y",
                defaultDate: "today"
            });

        });
    </script>
@endsection