@extends('layouts.master')
@section('title') @lang('Quotes')  @endsection
@section('css')
    <link rel="stylesheet" href="{{ URL::asset('assets/dropify/dist/css/dropify.min.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" type="text/css" />
@endsection

@section('content')
    @component('components.breadcrumb')
        @slot('li_1') @lang('Quotes') @endslot
        @slot('title') @lang('Edit Quote')  @endslot
    @endcomponent
    <div class="row">
        <form class="form-material form-horizontal" action="{{ route('quote.update', $quote) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">@lang('Quote Edit Information')</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="quote_entry" class="form-label">@lang('Oppotunity / Quote Entry') <b class="ambitious-crimson">*</b></label>
                                <input id="quote_entry"  class="form-control @error('quote_entry') is-invalid @enderror" type="text" name="quote_entry" value="{{ old('quote_entry',$quote->quote_entry) }}" placeholder="@lang('Type Your Quote Entry')" required>
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
                                            <option value="{{ $value->id }}" {{ old('sold_to_customer_id',$quote->sold_to_customer_id) == $value->id ? 'selected' : '' }} >{{ $value->name }}</option>
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
                                        <textarea id="sold_to_customer_name_address" class="form-control" name="sold_to_customer_name_address" rows="3" placeholder="@lang('Select Customer, Name & Address Is Searchable')">{{$quote->sold_to_customer_name_address}}</textarea>
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
                                            <input class="form-check-input" type="checkbox" id="one_time_ship_address" name="one_time_ship_address" @if($quote->one_time_ship_address == "1") checked @endif value="1">
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
                                            <option value="{{ $value->id }}" {{ old('ship_to_customer_id',$quote->ship_to_customer_id) == $value->id ? 'selected' : '' }} >{{ $value->name }}</option>
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
                                                <option value="{{ $value->id }}" {{ old('ship_to_customer_id',$quote->ship_to_customer_id) == $value->id ? 'selected' : '' }} >{{ $value->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div id="one_time_ship_address_checked">
                                            <select id="one_time_ship_id_checked" class="form-control select2 @error('one_time_ship_id_checked') is-invalid @enderror" name="one_time_ship_id_checked">
                                                <option value="">@lang('Select One Time Ship')</option>
                                                @foreach($oneTimeShipData as $value)
                                                <option value="{{ $value->id }}" {{ old('one_time_ship_id_checked',$quote->one_time_ship_id_checked) == $value->id ? 'selected' : '' }} >{{ $value->name }}</option>
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
                                        <textarea id="ship_to_customer_name_address" class="form-control" name="ship_to_customer_name_address" rows="3" placeholder="@lang('Select Customer, Name & Address Is Searchable')">{{$quote->ship_to_customer_name_address}}</textarea>
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
                                            <option value="{{ $value->id }}" {{ old('bill_to_customer',$quote->bill_to_customer) == $value->id ? 'selected' : '' }} >{{ $value->name }}</option>
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
                                        <input id="bill_to_po"  class="form-control @error('bill_to_po') is-invalid @enderror" type="text" name="bill_to_po" value="{{ old('bill_to_po',$quote->bill_to_po) }}" placeholder="@lang('Type Your Po')">
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
                                            <option value="Company_Truck" {{ old('ship_via',$quote->ship_via) == "Company_Truck" ? 'selected' : '' }}>@lang('Company Truck')</option>
                                            <option value="Container Ship" {{ old('ship_via',$quote->ship_via) == "Container_Ship" ? 'selected' : '' }}>@lang('Container Ship')</option>
                                            <option value="Fedex_Express" {{ old('ship_via',$quote->ship_via) == "Fedex_Express" ? 'selected' : '' }}>@lang('Fedex Express')</option>
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
                                        <input id="bill_to_open"  class="form-control @error('bill_to_open') is-invalid @enderror" type="text" name="bill_to_open" value="{{ old('bill_to_open', $quote->bill_to_open) }}" placeholder="@lang('Pick Open Date')">
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
                                            <option value="1_10_net_30" {{ old('terms',$quote->terms) == "1_10_net_30" ? 'selected' : '' }}>@lang('1/10 Net 30')</option>
                                            <option value="12_months_payments" {{ old('terms',$quote->terms) == "12_months_payments" ? 'selected' : '' }}>@lang('12 months payments')</option>
                                            <option value="18_month_payments" {{ old('terms',$quote->terms) == "18_month_payments" ? 'selected' : '' }}>@lang('18 months payments')</option>
                                            <option value="2_10_net_30" {{ old('terms',$quote->terms) == "2_10_net_30" ? 'selected' : '' }}>@lang('2/10 Net 30')</option>
                                            <option value="cash_on_delivery" {{ old('terms',$quote->terms) == "cash_on_delivery" ? 'selected' : '' }}>@lang('Cash on Delivery')</option>
                                            <option value="credit_card" {{ old('terms',$quote->terms) == "credit_card" ? 'selected' : '' }}>@lang('Credit Card')</option>
                                            <option value="net_30" {{ old('terms',$quote->terms) == "net_30" ? 'selected' : '' }}>@lang('Net 30')</option>
                                            <option value="net_45" {{ old('terms',$quote->terms) == "net_30" ? 'selected' : '' }}>@lang('Net 45')</option>
                                            <option value="pnp_multiple_discounts" {{ old('terms',$quote->terms) == "pnp_multiple_discounts" ? 'selected' : '' }}>@lang('PNP Multiple Discounts')</option>
                                            <option value="pnp12_month_payment_schedule" {{ old('terms',$quote->terms) == "pnp12_month_payment_schedule" ? 'selected' : '' }}>@lang('PNP12 Month Payment Schedule')</option>
                                            <option value="poslbterms" {{ old('terms',$quote->terms) == "poslbterms" ? 'selected' : '' }}>@lang('POSLBTERMS')</option>
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
                                        <input id="bill_to_due"  class="form-control @error('bill_to_due') is-invalid @enderror" type="text" name="bill_to_due" value="{{ old('bill_to_due', $quote->bill_to_due) }}" placeholder="@lang('Pick Due Date')">
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
                                            <input id="disc"  class="form-control @error('disc') is-invalid @enderror" type="text" name="disc" value="{{ old('disc', $quote->disc) }}" placeholder="@lang('0.00')">
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
                                        <input id="bill_to_days_open"  class="form-control @error('bill_to_days_open') is-invalid @enderror" type="text" name="bill_to_days_open" value="{{ old('bill_to_days_open', $quote->bill_to_days_open) }}" placeholder="@lang('Type Your Days Open')">
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
                                            <option value="ECanada" {{ old('territory',$quote->territory) == "ECanada" ? 'selected' : '' }}>@lang('East Canada - North America')</option>
                                            <option value="Germany" {{ old('territory',$quote->territory) == "Germany" ? 'selected' : '' }}>@lang('Germany - Asia')</option>
                                            <option value="Japan" {{ old('territory',$quote->territory) == "Japan" ? 'selected' : '' }}>@lang('Japan - Asia')</option>
                                            <option value="Mexico" {{ old('territory',$quote->territory) == "Mexico" ? 'selected' : '' }}>@lang('Mexico - North America')</option>
                                            <option value="UK" {{ old('territory',$quote->territory) == "UK" ? 'selected' : '' }}>@lang('United Kingdom - Europe')</option>
                                            <option value="US_MAT" {{ old('territory',$quote->territory) == "US_MAT" ? 'selected' : '' }}>@lang('United States - Mid Atlantic')</option>
                                            <option value="US_MID" {{ old('territory',$quote->territory) == "US_MID" ? 'selected' : '' }}>@lang('United States - Mid West')</option>
                                            <option value="US_NE" {{ old('territory',$quote->territory) == "US_NE" ? 'selected' : '' }}>@lang('United States - New England')</option>
                                            <option value="US_NW" {{ old('territory',$quote->territory) == "US_NW" ? 'selected' : '' }}>@lang('United States - North West')</option>
                                            <option value="US_SE" {{ old('territory',$quote->territory) == "US_SE" ? 'selected' : '' }}>@lang('United States - South East')</option>
                                            <option value="US_SW" {{ old('territory',$quote->territory) == "US_SW" ? 'selected' : '' }}>@lang('United States - South West')</option>
                                            <option value="WCanada" {{ old('territory',$quote->territory) == "WCanada" ? 'selected' : '' }}>@lang('West Canada - North America')</option>
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
                                            <option value="Frank_Wright" {{ old('primary_sales',$quote->primary_sales) == "Frank_Wright" ? 'selected' : '' }}>@lang('Frank Wright')</option>
                                            <option value="Fred_Grandy" {{ old('primary_sales',$quote->primary_sales) == "Fred_Grandy" ? 'selected' : '' }}>@lang('Fred Grandy')</option>
                                            <option value="Hyuma_Hoshi" {{ old('primary_sales',$quote->primary_sales) == "Hyuma_Hoshi" ? 'selected' : '' }}>@lang('Hyuma Hoshi')</option>
                                            <option value="Isabel_Mota" {{ old('primary_sales',$quote->primary_sales) == "Isabel_Mota" ? 'selected' : '' }}>@lang('Isabel Mota')</option>
                                            <option value="James_J_Baily" {{ old('primary_sales',$quote->primary_sales) == "James_J_Baily" ? 'selected' : '' }}>@lang('James J.Baily')</option>
                                            <option value="Kenny_Johnson" {{ old('primary_sales',$quote->primary_sales) == "Kenny_Johnson" ? 'selected' : '' }}>@lang('Kenny Johnson')</option>
                                            <option value="Nancy_Johnson" {{ old('primary_sales',$quote->primary_sales) == "Nancy_Johnson" ? 'selected' : '' }}>@lang('Nancy Johnson')</option>
                                            <option value="Penny_Lane" {{ old('primary_sales',$quote->primary_sales) == "Penny_Lane" ? 'selected' : '' }}>@lang('Penny Lane')</option>
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
                                            <input id="best_case"  class="form-control @error('best_case') is-invalid @enderror" type="text" name="best_case" value="{{ old('best_case',$quote->best_case) }}" placeholder="@lang('Type Your Best Case')">
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
                                        <input id="rating"  class="form-control @error('rating') is-invalid @enderror" type="text" name="rating" value="{{ old('rating',$quote->rating) }}" placeholder="@lang('Type Your Rating')">
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
                                            <input id="worst_case"  class="form-control @error('worst_case') is-invalid @enderror" type="text" name="worst_case" value="{{ old('worst_case',$quote->worst_case) }}" placeholder="@lang('Type Your Worst Case')">
                                            <span class="input-group-text">%</span>
                                        </div>
                                        @error('worst_case')
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