@extends('layouts.master')
@section('title') @lang('Part Master')  @endsection
@section('css')
    <link rel="stylesheet" href="{{ URL::asset('assets/dropify/dist/css/dropify.min.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    @component('components.breadcrumb')
        @slot('li_1') @lang('Part Master') @endslot
        @slot('title') @lang('Create Part Master')  @endslot
    @endcomponent
    <div class="row">
        <div class="col-lg-12">
            <form class="form-material form-horizontal" action="{{ route('part-master.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <div class="card-header align-items-center d-flex">
                        <h4 class="card-title mb-0 flex-grow-1">@lang('Part Master Create Information')</h4>
                    </div>
                    <div class="card-body">
                        <fieldset class="custom-border p-3">
                            <legend class="float-none w-auto px-1" >@lang('Parameters')</legend>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="part_number" class="form-label">@lang('PartNum') <b class="ambitious-crimson">*</b></label>
                                        <input id="part_number"  class="form-control @error('part_number') is-invalid @enderror" type="text" name="part_number" value="{{ old('part_number') }}" placeholder="@lang('Type Your Part Number')" required>
                                        @error('part_number')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="description" class="form-label">@lang('Part Description')</label>
                                        <input id="description"  class="form-control @error('description') is-invalid @enderror" type="text" name="description" value="{{ old('description') }}" placeholder="@lang('Type Your Part Description')">
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
                                        <label for="type" class="form-label">@lang('Type') <b class="ambitious-crimson">*</b></label>
                                        <select id="type" class="form-control select2 @error('type') is-invalid @enderror" name="type" required>
                                            <option value="">@lang('Select Part Type')</option>
                                            <option value="Manufacturer" {{ old('type') == 'Manufacturer' ? 'selected' : '' }}> {{ __('Manufacturer [M]') }}</option>
                                            <option value="Purchase" {{ old('type') == 'Purchase' ? 'selected' : '' }}> {{ __('Purchase [P]') }}</option>
                                            <option value="Service" {{ old('type') == 'Service' ? 'selected' : '' }}> {{ __('Service [S]') }}</option>
                                            <option value="Sales_Kit" {{ old('type') == 'Sales_Kit' ? 'selected' : '' }}> {{ __('Sales Kit [K]') }}</option>
                                        </select>
                                        @error('type')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="group_id" class="form-label">@lang('Group') <b class="ambitious-crimson">*</b></label>
                                        <select id="group_id" class="form-control select2 @error('group_id') is-invalid @enderror" name="group_id" required>
                                            <option value="">@lang('Select Group')</option>
                                            @foreach($groups as $key => $value)
                                            <option value="{{ $key }}" {{ old('group_id') == $key ? 'selected' : '' }} >{{ ucwords($value)}}</option>
                                            @endforeach
                                        </select>
                                        @error('group_id')
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
                                        <label for="class_id" class="form-label">@lang('Class') <b class="ambitious-crimson">*</b></label>
                                        <select id="class_id" class="form-control select2 @error('class_id') is-invalid @enderror" name="class_id" required>
                                            <option value="">@lang('Select Class')</option>
                                            @foreach($partClass as $key => $value)
                                            <option value="{{ $key }}" {{ old('class_id') == $key ? 'selected' : '' }} >{{ ucwords($value)}}</option>
                                            @endforeach
                                        </select>
                                        @error('class_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="costing_method" class="form-label">@lang('Costing Method') <b class="ambitious-crimson">*</b></label>
                                        <select id="costing_method" class="form-control select2 @error('costing_method') is-invalid @enderror" name="costing_method" required>
                                            <option value="">@lang('Select Part Costing Method')</option>
                                            <option value="Std_For_Standard" {{ old('costing_method') == 'Std_For_Standard' ? 'selected' : '' }}> {{ __('Std For Standard') }}</option>
                                            <option value="Last_For_MGF" {{ old('costing_method') == 'Last_For_MGF' ? 'selected' : '' }}> {{ __('Last For MGF') }}</option>
                                            <option value="AVG_For_Average" {{ old('costing_method') == 'AVG_For_Average' ? 'selected' : '' }}> {{ __('AVG For Average') }}</option>
                                            <option value="FIFO" {{ old('costing_method') == 'FIFO' ? 'selected' : '' }}> {{ __('FIFO') }}</option>
                                            <option value="LOT_Avg" {{ old('costing_method') == 'LOT_Avg' ? 'selected' : '' }}> {{ __('LOT Avg') }}</option>
                                            <option value="LOT_FIFO" {{ old('costing_method') == 'LOT_FIFO' ? 'selected' : '' }}> {{ __('LOT FIFO') }}</option>
                                        </select>
                                        @error('costing_method')
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
                                        <div class="form-check form-check-info">
                                            <input id="active" class="form-check-input" type="checkbox" name="active" value="{{ true }}">
                                            <label for="active" class="form-label">@lang('Active')</label>
                                            @error('active')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <div class="form-check form-check-info">
                                            <input id="buy_to_order" class="form-check-input" type="checkbox" name="buy_to_order" value="{{ true }}">
                                            <label for="buy_to_order" class="form-label">@lang('Buy To Order')</label>
                                            @error('buy_to_order')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <div class="form-check form-check-info">
                                            <input id="non_stock_part" class="form-check-input" type="checkbox" name="non_stock_part" value="{{ true }}">
                                            <label for="non_stock_part" class="form-label">@lang('Non-Stock Part')</label>
                                            @error('non_stock_part')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <div class="form-check form-check-info">
                                            <input id="quantity_bearing" class="form-check-input" type="checkbox" name="quantity_bearing" value="{{ true }}">
                                            <label for="quantity_bearing" class="form-label">@lang('Quantity Bearing')</label>
                                            @error('quantity_bearing')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <div class="form-check form-check-info">
                                            <input id="phantom_part" class="form-check-input" type="checkbox" name="phantom_part" value="{{ true }}">
                                            <label for="phantom_part" class="form-label">@lang('Phantom Part')</label>
                                            @error('phantom_part')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                        <br>
                        <fieldset class="custom-border p-3">
                            <legend class="float-none w-auto px-1" >@lang('UOMs')</legend>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="inventory" class="form-label">@lang('Inventory') <b class="ambitious-crimson">*</b></label>
                                        <input id="inventory"  class="form-control @error('inventory') is-invalid @enderror" type="text" name="inventory" value="{{ old('inventory') }}" placeholder="@lang('Type Your Inventory')" required>
                                        @error('inventory')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="sales" class="form-label">@lang('Sales') <b class="ambitious-crimson">*</b></label>
                                        <input id="sales"  class="form-control @error('sales') is-invalid @enderror" type="text" name="sales" value="{{ old('sales') }}" placeholder="@lang('Type Your Sales')" required>
                                        @error('sales')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="purchasing" class="form-label">@lang('Purchasing') <b class="ambitious-crimson">*</b></label>
                                        <input id="purchasing"  class="form-control @error('purchasing') is-invalid @enderror" type="text" name="purchasing" value="{{ old('purchasing') }}" placeholder="@lang('Type Your Purchasing')" required>
                                        @error('purchasing')
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
                            <legend class="float-none w-auto px-1" >@lang('Sales Unit Prices / Internal Price')</legend>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="sales_unit_price" class="form-label">@lang('Sales Unit Price') <b class="ambitious-crimson">*</b></label>
                                        <input id="sales_unit_price"  class="form-control @error('sales_unit_price') is-invalid @enderror" type="text" name="sales_unit_price" value="{{ old('sales_unit_price') }}" placeholder="@lang('Type Your Sales Unit Price')" required>
                                        @error('sales_unit_price')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="internal_price" class="form-label">@lang('Internal Price') <b class="ambitious-crimson">*</b></label>
                                        <input id="internal_price"  class="form-control @error('internal_price') is-invalid @enderror" type="text" name="internal_price" value="{{ old('internal_price') }}" placeholder="@lang('Type Your Internal Price')" required>
                                        @error('internal_price')
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
                            <legend class="float-none w-auto px-1" >@lang('Tracking')</legend>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <div class="form-check form-check-info">
                                            <input id="track_lot" class="form-check-input" type="checkbox" name="track_lot" value="{{ true }}">
                                            <label for="track_lot" class="form-label">@lang('Track Lot')</label>
                                            @error('track_lot')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <div class="form-check form-check-info">
                                            <input id="track_serial_numbers" class="form-check-input" type="checkbox" name="track_serial_numbers" value="{{ true }}">
                                            <label for="track_serial_numbers" class="form-label">@lang('Track Serial Numbers')</label>
                                            @error('track_serial_numbers')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                    </div>
                    <div class="card-footer">
                        <input id="submit" type="submit" value="@lang('Submit')" class="btn btn-info btn-lg"/>
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


                $(document).on("submit", "form", function(e){
                    let parameterCheck = 0;

                    if( $('#buy_to_order').is(':checked') ){
                        parameterCheck = 1;
                    }
                    if( $('#non_stock_part').is(':checked') ){
                        parameterCheck = 1;
                    }
                    if( $('#quantity_bearing').is(':checked') ){
                        parameterCheck = 1;
                    }
                    if( $('#phantom_part').is(':checked') ){
                        parameterCheck = 1;
                    }

                    if( parameterCheck == 0 ) {
                        toastr.error('At Least One Checkbox Is Checked Between Those Field Buy To Order, Non-Stock Part, Quantity Bearing, Phantom Part');
                        e.preventDefault();
                        return false;
                    }
                });

            });
        </script>
    @endsection