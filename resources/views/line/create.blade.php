@extends('layouts.master')
@section('title') @lang('Line')  @endsection
@section('css')
    <link rel="stylesheet" href="{{ URL::asset('assets/dropify/dist/css/dropify.min.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" type="text/css" />
@endsection

@section('content')
    @component('components.breadcrumb')
        @slot('li_1') @lang('Line') @endslot
        @slot('title') @lang('Create Line')  @endslot
    @endcomponent

    <div class="row">
        <div class="col-lg-12">
            <form class="form-material form-horizontal" action="{{ route('line.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <div class="card-header align-items-center d-flex">
                        <h4 class="card-title mb-0 flex-grow-1">@lang('Line')</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="part_id" class="form-label">@lang('Part Master') <b class="ambitious-crimson">*</b></label>
                                    <select id="part_id" class="form-control @error('part_id') is-invalid @enderror select2" name="part_id" required>
                                        <option value="">@lang('Select Part Master')</option>
                                        @foreach($partMaster as $value)
                                        <option value="{{ $value->id }}" {{ old('part_id') == $value->id ? 'selected' : '' }} >{{ $value->part_number }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="description" class="form-label">@lang('Description') <b class="ambitious-crimson">*</b></label>
                                    <input id="description"  class="form-control @error('description') is-invalid @enderror" type="text" name="description" value="{{ old('description') }}" placeholder="@lang('Type Your Description')" required>
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
                                    <label for="customer_id" class="form-label">@lang('Customers') <b class="ambitious-crimson">*</b></label>
                                    <select id="customer_id" class="form-control @error('customer_id') is-invalid @enderror select2" name="customer_id" required>
                                        <option value="">@lang('Select Customer')</option>
                                        @foreach($customers as $key => $value)
                                        <option value="{{ $key }}" {{ old('customer_id') == $key ? 'selected' : '' }} >{{ $value }}</option>
                                        @endforeach
                                    </select>
                                    @error('customer_id')
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
                                    <div class="row mb-3">
                                        <div class="col-md-4">
                                            <label for="order_quantity" class="form-label float-end pt-2">@lang('Order Quantity')</label>
                                        </div>
                                        <div class="col-md-6">
                                            <input id="order_quantity"  class="form-control @error('order_quantity') is-invalid @enderror" type="text" name="order_quantity" value="{{ old('order_quantity') }}" placeholder="@lang('Type Your Order Quantity')">
                                            @error('order_quantity')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-md-2">
                                            <select id="order_quantity_type" class="form-control @error('order_quantity_type') is-invalid @enderror" name="order_quantity_type">
                                                <option value="EA">@lang('EA')</option>
                                                <option value="BX">@lang('BX')</option>
                                            </select>
                                            @error('order_quantity_type')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-4">
                                            <label for="excepted_quantity" class="form-label float-end pt-2">@lang('Excepted Quantity') <b class="ambitious-crimson">*</b></label>
                                        </div>
                                        <div class="col-md-6">
                                            <input id="excepted_quantity"  class="form-control @error('excepted_quantity') is-invalid @enderror" type="text" name="excepted_quantity" value="{{ old('excepted_quantity') }}" placeholder="@lang('Type Your Excepted Quantity')" required>
                                            @error('excepted_quantity')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-md-2">
                                            <select id="excepted_quantity_type" class="form-control @error('excepted_quantity_type') is-invalid @enderror" name="excepted_quantity_type" required>
                                                <option value="EA">@lang('EA')</option>
                                                <option value="BX">@lang('BX')</option>
                                            </select>
                                            @error('excepted_quantity_type')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-4">
                                            <label for="best_case_percentage" class="form-label float-end pt-2">@lang('Best Case')</label>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="input-group">
                                                <input id="best_case_percentage"  class="form-control @error('best_case_percentage') is-invalid @enderror" type="text" name="best_case_percentage" value="{{ old('best_case_percentage','0.00') }}" placeholder="@lang('0.00')">
                                                <span class="input-group-text">%</span>
                                                @error('best_case_percentage')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-4">
                                            <label for="worst_case_percentage" class="form-label float-end pt-2">@lang('Worst Case')</label>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="input-group">
                                                <input id="worst_case_percentage"  class="form-control @error('worst_case_percentage') is-invalid @enderror" type="text" name="worst_case_percentage" value="{{ old('worst_case_percentage','0.00') }}" placeholder="@lang('0.00')">
                                                <span class="input-group-text">%</span>
                                                @error('worst_case_percentage')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-4">
                                            <label for="confidence_percentage" class="form-label float-end pt-2">@lang('Confidence')</label>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="input-group">
                                                <input id="confidence_percentage"  class="form-control @error('confidence_percentage') is-invalid @enderror" type="text" name="confidence_percentage" value="{{ old('confidence_percentage','0.00') }}" placeholder="@lang('0.00')">
                                                <span class="input-group-text">%</span>
                                                @error('confidence_percentage')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-4">
                                            <label for="price_per" class="form-label float-end pt-2">@lang('Price Per')</label>
                                        </div>
                                        <div class="col-md-8">
                                            <select id="price_per" class="form-control select2 @error('price_per') is-invalid @enderror" name="price_per">
                                                <option value="1">@lang('/1')</option>
                                                <option value="10">@lang('/10')</option>
                                                <option value="100">@lang('/100')</option>
                                                <option value="1000">@lang('/1000')</option>
                                            </select>
                                            @error('price_per')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-4">
                                            <label for="unit_price" class="form-label float-end pt-2">@lang('Unit Price') <b class="ambitious-crimson">*</b></label>
                                        </div>
                                        <div class="col-md-8">
                                            <input id="unit_price"  class="form-control @error('unit_price') is-invalid @enderror" type="text" name="unit_price" value="{{ old('unit_price') }}" placeholder="@lang('Type Your Unit Price')" required>
                                            @error('unit_price')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-4">
                                            <label for="override_price_list" class="form-label float-end pt-2">@lang('Override Price List')</label>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-check pt-2">
                                                <input class="form-check-input " type="checkbox" id="override_price_list" name="override_price_list" value="1">
                                                @error('override_price_list')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-4">
                                            <label for="price_list" class="form-label float-end pt-2">@lang('Price List')</label>
                                        </div>
                                        <div class="col-md-8">
                                            <select id="price_list" class="form-control select2 @error('price_list') is-invalid @enderror" name="price_list" disabled>
                                                <option value="">@lang('Select Price List')</option>
                                            </select>
                                            @error('price_list')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-4">
                                            <label for="discount_percentage" class="form-label float-end pt-2">@lang('Discount')</label>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="input-group">
                                                <input id="discount_percentage"  class="form-control @error('discount_percentage') is-invalid @enderror" type="text" name="discount_percentage" value="{{ old('discount_percentage','0.00') }}" placeholder="@lang('0.00')">
                                                <span class="input-group-text">%</span>
                                                @error('discount_percentage')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <input id="discount_value"  class="form-control @error('discount_value') is-invalid @enderror" type="text" name="discount_value" value="{{ old('discount_value') }}" placeholder="@lang('Type Your Discount Value')">
                                            @error('discount_value')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-4">
                                            <label for="override_discount_price_list" class="form-label float-end pt-2">@lang('Override Discount Price List')</label>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-check pt-2">
                                                <input class="form-check-input " type="checkbox" id="override_discount_price_list" name="override_discount_price_list" value="1">
                                                @error('override_discount_price_list')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-md-4">
                                            <label for="discount_price_list" class="form-label float-end pt-2">@lang('Discount Price List')</label>
                                        </div>
                                        <div class="col-md-8">
                                            <select id="discount_price_list" class="form-control select2 @error('discount_price_list') is-invalid @enderror" name="discount_price_list" disabled>
                                                <option value="">@lang('Select Price List')</option>
                                            </select>
                                            @error('discount_price_list')
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
                                    <div class="row mb-3">
                                        <div class="col-md-4">
                                            <label for="price_group" class="form-label float-end pt-2">@lang('Price Group')</label>
                                        </div>
                                        <div class="col-md-8">
                                            <select id="price_group" class="form-control @error('price_group') is-invalid @enderror select2" name="price_group">
                                                <option value="">@lang('Select Price Group')</option>
                                                @foreach($pGroups as $key => $value)
                                                <option value="{{ $key }}" {{ old('price_group') == $key ? 'selected' : '' }} >{{ $value }}</option>
                                                @endforeach
                                            </select>
                                            @error('price_group')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-4">
                                            <label for="pricing_quantity" class="form-label float-end pt-2">@lang('Pricing Quantity')</label>
                                        </div>
                                        <div class="col-md-6">
                                            <input id="pricing_quantity"  class="form-control @error('pricing_quantity') is-invalid @enderror" type="text" name="pricing_quantity" value="{{ old('pricing_quantity') }}" placeholder="@lang('Type Your Pricing Quantity')">
                                            @error('pricing_quantity')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-md-2">
                                            <select id="pricing_quantity_type" class="form-control @error('pricing_quantity_type') is-invalid @enderror" name="pricing_quantity_type">
                                                <option value="EA">@lang('EA')</option>
                                                <option value="BX">@lang('BX')</option>
                                            </select>
                                            @error('pricing_quantity_type')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-4">
                                            <label for="extended_price" class="form-label float-end pt-2">@lang('Extended Price')</label>
                                        </div>
                                        <div class="col-md-8">
                                            <input id="extended_price"  class="form-control @error('extended_price') is-invalid @enderror" type="text" name="extended_price" value="{{ old('extended_price','0.00') }}" placeholder="@lang('0.00')">
                                            @error('extended_price')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-4">
                                            <label for="potential" class="form-label float-end pt-2">@lang('Potential')</label>
                                        </div>
                                        <div class="col-md-8">
                                            <input id="potential"  class="form-control @error('potential') is-invalid @enderror" type="text" name="potential" value="{{ old('potential','0.00') }}" placeholder="@lang('0.00')">
                                            @error('potential')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-4">
                                            <label for="misc_charges" class="form-label float-end">@lang('Misc. Charges')</label>
                                        </div>
                                        <div class="col-md-8">
                                            <input id="misc_charges"  class="form-control @error('misc_charges') is-invalid @enderror" type="text" name="misc_charges" value="{{ old('misc_charges','0.00') }}" placeholder="@lang('Type Your Misc Charges')">
                                            @error('misc_charges')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-4">
                                            <label for="tax" class="form-label float-end">@lang('Tax')</label>
                                        </div>
                                        <div class="col-md-8">
                                            <input id="tax"  class="form-control @error('tax') is-invalid @enderror" type="text" name="tax" value="{{ old('tax','0.00') }}" placeholder="@lang('Type Your Tax')">
                                            @error('tax')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-4">
                                            <label for="total" class="form-label float-end">@lang('Total') <b class="ambitious-crimson">*</b></label>
                                        </div>
                                        <div class="col-md-8">
                                            <input id="total"  class="form-control @error('total') is-invalid @enderror" type="text" name="total" value="{{ old('total','0.00') }}" placeholder="@lang('Type Your Total')" required>
                                            @error('total')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-4">
                                            <label for="best_case_value" class="form-label float-end">@lang('Best Case')</label>
                                        </div>
                                        <div class="col-md-8">
                                            <input id="best_case_value"  class="form-control @error('best_case_value') is-invalid @enderror" type="text" name="best_case_value" value="{{ old('best_case_value','0.00') }}">
                                            @error('best_case_value')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-4">
                                            <label for="worst_case_value" class="form-label float-end">@lang('Worst Case')</label>
                                        </div>
                                        <div class="col-md-8">
                                            <input id="worst_case_value"  class="form-control @error('worst_case_value') is-invalid @enderror" type="text" name="worst_case_value" value="{{ old('worst_case_value','0.00') }}">
                                            @error('worst_case_value')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-4">
                                            <label for="excepted_value" class="form-label float-end">@lang('Excepted')</label>
                                        </div>
                                        <div class="col-md-8">
                                            <input id="excepted_value"  class="form-control @error('excepted_value') is-invalid @enderror" type="text" name="excepted_value" value="{{ old('excepted_value','0.00') }}">
                                            @error('excepted_value')
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

            $(document).on('change', '#unit_price, #discount_value, #tax, #excepted_quantity, #best_case_percentage, #worst_case_percentage, #confidence_percentage', function () {
                let best_case_value = 0;
                let worst_case_value = 0;
                let best_case_percentage = $('#best_case_percentage').val();
                best_case_percentage = (!best_case_percentage.length || isNaN(best_case_percentage)) ? 0 : parseFloat(best_case_percentage);

                let worst_case_percentage = $('#worst_case_percentage').val();
                worst_case_percentage = (!worst_case_percentage.length || isNaN(worst_case_percentage)) ? 0 : parseFloat(worst_case_percentage);

                // let confidence_percentage = $('#confidence_percentage').val();
                // confidence_percentage = (!confidence_percentage.length || isNaN(confidence_percentage)) ? 0 : parseFloat(confidence_percentage);

                let excepted_quantity = $('#excepted_quantity').val();
                excepted_quantity = (!excepted_quantity.length || isNaN(excepted_quantity)) ? 0 : parseFloat(excepted_quantity);

                if(excepted_quantity == 0) {
                    alert("Please Give Excepted Quantity");
                    $('#total').val(0.00);
                    return false;
                }

                let unit_price = $('#unit_price').val();
                unit_price = (!unit_price.length || isNaN(unit_price)) ? 0 : parseFloat(unit_price);

                // if(unit_price == 0) {
                //     alert("Please Give Unit Price");
                //     $('#total').val(0.00);
                //     return false;
                // }

                let gross_value = unit_price * excepted_quantity;

                let discount_value = $('#discount_value').val();
                discount_value = (!discount_value.length || isNaN(discount_value)) ? 0 : parseFloat(discount_value);


                let tax = $('#tax').val();
                tax = (!tax.length || isNaN(tax)) ? 0 : parseFloat(tax);


                let total = gross_value - discount_value + tax;

                best_case_value = (gross_value * best_case_percentage * 0.01);
                worst_case_value = (gross_value * worst_case_percentage * 0.01);
                
                $('#best_case_value').val(best_case_value.toFixed(2));
                $('#worst_case_value').val(worst_case_value.toFixed(2));

                $('#total').val(total.toFixed(2));
                $('#extended_price').val(gross_value.toFixed(2));
                $('#potential').val(gross_value.toFixed(2));


            });


            $(document).on('change', '#discount_percentage', function () {
                let discount_value_age = 0.00;
                let discount_percentage = $('#discount_percentage').val();
                discount_percentage = (!discount_percentage.length || isNaN(discount_percentage)) ? 0 : parseFloat(discount_percentage);

                let excepted_quantity = $('#excepted_quantity').val();
                excepted_quantity = (!excepted_quantity.length || isNaN(excepted_quantity)) ? 0 : parseFloat(excepted_quantity);

                if(excepted_quantity == 0) {
                    alert("Please Give Excepted Quantity");
                    $('#discount_percentage').val(0.00);
                    return false;
                }

                let unit_price = $('#unit_price').val();
                unit_price = (!unit_price.length || isNaN(unit_price)) ? 0 : parseFloat(unit_price);

                if(unit_price == 0) {
                    alert("Please Give Unit Price");
                    $('#discount_percentage').val(0.00);
                    return false;
                }

                let gross_value = unit_price * excepted_quantity;


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

            $(document).on('change', '#part_id', function () {
                let part_id = $('#part_id').val();
                if (part_id) {
                    $.ajax({
                        url: '{{ url('line/selectedPartMasterId') }}',
                        type: "GET",
                        dataType: 'JSON',
                        data: {
                            part_id: part_id
                        },
                        success: function(html) {
                            if (html.selectedPartMaster) {
                                $('#description').val(html.selectedPartMaster.description);
                            }
                        }
                    });
                }
            });
        });
    </script>
@endsection