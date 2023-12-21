@extends('layouts.master')
@section('title')
    @lang('Part Master')
@endsection
@section('css')
    <link rel="stylesheet" href="{{ URL::asset('assets/dropify/dist/css/dropify.min.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    @component('components.breadcrumb')
        @slot('li_1')
            @lang('Part Master')
        @endslot
        @slot('title')
            @lang('Edit Part Master')
        @endslot
    @endcomponent
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <ul class="nav nav-tabs nav-justified mb-3" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-bs-toggle="tab" href="#part_tab" role="tab"
                                aria-selected="false">
                                @lang('Part Tab')
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#revision_tab" role="tab" aria-selected="false">
                                @lang('Revision Tab')
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#plant_tab" role="tab" aria-selected="false">
                                @lang('Plant Tab')
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#warehouse_tab" role="tab" aria-selected="false">
                                @lang('Warehouse Tab')
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="part_tab" role="tabpanel">
                            <form class="form-material form-horizontal" action="{{ route('part-master.update', $partMaster) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <fieldset class="custom-border p-3">
                                    <legend class="float-none w-auto px-1" >@lang('Parameters')</legend>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="part_number" class="form-label">@lang('PartNum') <b class="ambitious-crimson">*</b></label>
                                                <input id="part_number"  class="form-control @error('part_number') is-invalid @enderror" type="text" name="part_number" value="{{ old('part_number', $partMaster->part_number) }}" placeholder="@lang('Type Your Part Number')" required>
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
                                                <input id="description"  class="form-control @error('description') is-invalid @enderror" type="text" name="description" value="{{ old('description', $partMaster->description) }}" placeholder="@lang('Type Your Part Description')">
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
                                                    <option value="Manufacturer" {{ old('type', $partMaster->type) == 'Manufacturer' ? 'selected' : '' }}> {{ __('Manufacturer [M]') }}</option>
                                                    <option value="Purchase" {{ old('type', $partMaster->type) == 'Purchase' ? 'selected' : '' }}> {{ __('Purchase [P]') }}</option>
                                                    <option value="Service" {{ old('type', $partMaster->type) == 'Service' ? 'selected' : '' }}> {{ __('Service [S]') }}</option>
                                                    <option value="Sales_Kit" {{ old('type', $partMaster->type) == 'Sales_Kit' ? 'selected' : '' }}> {{ __('Sales Kit [K]') }}</option>
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
                                                    <option value="{{ $key }}" {{ old('group_id', $partMaster->group_id) == $key ? 'selected' : '' }} >{{ ucwords($value)}}</option>
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
                                                    <option value="{{ $key }}" {{ old('class_id', $partMaster->class_id) == $key ? 'selected' : '' }} >{{ ucwords($value)}}</option>
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
                                                    <option value="Std_For_Standard" {{ old('costing_method', $partMaster->costing_method) == 'Std_For_Standard' ? 'selected' : '' }}> {{ __('Std For Standard') }}</option>
                                                    <option value="Last_For_MGF" {{ old('costing_method', $partMaster->costing_method) == 'Last_For_MGF' ? 'selected' : '' }}> {{ __('Last For MGF') }}</option>
                                                    <option value="AVG_For_Average" {{ old('costing_method', $partMaster->costing_method) == 'AVG_For_Average' ? 'selected' : '' }}> {{ __('AVG For Average') }}</option>
                                                    <option value="FIFO" {{ old('costing_method', $partMaster->costing_method) == 'FIFO' ? 'selected' : '' }}> {{ __('FIFO') }}</option>
                                                    <option value="LOT_Avg" {{ old('costing_method', $partMaster->costing_method) == 'LOT_Avg' ? 'selected' : '' }}> {{ __('LOT Avg') }}</option>
                                                    <option value="LOT_FIFO" {{ old('costing_method', $partMaster->costing_method) == 'LOT_FIFO' ? 'selected' : '' }}> {{ __('LOT FIFO') }}</option>
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
                                                    <input id="active" class="form-check-input" type="checkbox" name="active" value="{{ true }}" @if ($partMaster->active == '1') checked @endif>
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
                                                    <input id="buy_to_order" class="form-check-input" type="checkbox" name="buy_to_order" value="{{ true }}" @if ($partMaster->buy_to_order == '1') checked @endif>
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
                                                    <input id="non_stock_part" class="form-check-input" type="checkbox" name="non_stock_part" value="{{ true }}" @if ($partMaster->non_stock_part == '1') checked @endif>
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
                                                    <input id="quantity_bearing" class="form-check-input" type="checkbox" name="quantity_bearing" value="{{ true }}" @if ($partMaster->quantity_bearing == '1') checked @endif>
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
                                                    <input id="phantom_part" class="form-check-input" type="checkbox" name="phantom_part" value="{{ true }}" @if ($partMaster->phantom_part == '1') checked @endif>
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
                                                <input id="inventory"  class="form-control @error('inventory') is-invalid @enderror" type="text" name="inventory" value="{{ old('inventory', $partMaster->inventory) }}" placeholder="@lang('Type Your Inventory')" required>
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
                                                <input id="sales"  class="form-control @error('sales') is-invalid @enderror" type="text" name="sales" value="{{ old('sales', $partMaster->sales) }}" placeholder="@lang('Type Your Sales')" required>
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
                                                <input id="purchasing"  class="form-control @error('purchasing') is-invalid @enderror" type="text" name="purchasing" value="{{ old('purchasing', $partMaster->purchasing) }}" placeholder="@lang('Type Your Purchasing')" required>
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
                                                <input id="sales_unit_price"  class="form-control @error('sales_unit_price') is-invalid @enderror" type="text" name="sales_unit_price" value="{{ old('sales_unit_price', $partMaster->sales_unit_price) }}" placeholder="@lang('Type Your Sales Unit Price')" required>
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
                                                <input id="internal_price"  class="form-control @error('internal_price') is-invalid @enderror" type="text" name="internal_price" value="{{ old('internal_price', $partMaster->internal_price) }}" placeholder="@lang('Type Your Internal Price')" required>
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
                                                    <input id="track_lot" class="form-check-input" type="checkbox" name="track_lot" value="{{ true }}"  @if ($partMaster->track_lot == '1') checked @endif>
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
                                                    <input id="track_serial_numbers" class="form-check-input" type="checkbox" name="track_serial_numbers" value="{{ true }}" @if ($partMaster->track_serial_numbers == '1') checked @endif>
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
                                <div class="card-body ps-0 pe-0">
                                    <input type="submit" value="@lang('common.submit')" class="btn btn-info btn-lg" />
                                    <a href="{{ route('dashboard.index') }}"
                                        class="btn btn-warning btn-lg float-end">@lang('common.cancel')</a>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane" id="revision_tab" role="tabpanel">
                            <form class="form-material form-horizontal" action="{{ route('part-master.revisionTabUpdate', $partMaster->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="revision_name" class="form-label">@lang('Revision Name') <b class="ambitious-crimson">*</b></label>
                                            <select id="revision_name" class="form-control select2 @error('revision_name') is-invalid @enderror" name="revision_name" required>
                                                <option value="">@lang('Select Revision')</option>
                                                @foreach($revision as $key => $value)
                                                <option value="{{ $key }}" {{ old('revision_name', $partMaster->revision_id) == $key ? 'selected' : '' }} >{{ ucwords($value)}}</option>
                                                @endforeach
                                            </select>
                                            @error('revision_name')
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
                                            <label for="revision_description" class="form-label">@lang('Revision Description')</label>
                                            <input id="revision_description"  class="form-control @error('revision_description') is-invalid @enderror" type="text" name="revision_description" value="{{ old('revision_description', $partMaster->revision_description) }}" placeholder="@lang('Type Your Revision Description')">
                                            @error('revision_description')
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
                                            <label for="effective_date" class="form-label">@lang('Effective Date')</label>
                                            <input id="effective_date"  class="form-control @error('effective_date') is-invalid @enderror" type="text" name="effective_date" value="{{ old('effective_date', $partMaster->effective_date) }}" placeholder="@lang('Select Your Effective Date')">
                                            @error('effective_date')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="mb-3">
                                            <div class="form-check form-check-info">
                                                <br><br>
                                                <input id="approved" class="form-check-input" type="checkbox" name="approved" value="{{ true }}" @if ($partMaster->approved == '1') checked @endif>
                                                <label for="approved" class="form-label">@lang('Approved')</label>
                                                @error('approved')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body ps-0 pe-0">
                                    <input type="submit" value="@lang('common.submit')" class="btn btn-info btn-lg pl-0" />
                                    <a href="{{ route('dashboard.index') }}"
                                        class="btn btn-warning btn-lg float-end">@lang('common.cancel')</a>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane" id="plant_tab" role="tabpanel">
                            <form class="form-material form-horizontal" action="{{ route('part-master.plantTabUpdate', $partMaster->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <fieldset class="custom-border p-3">
                                    <legend class="float-none w-auto px-1" >@lang('Plant')</legend>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="plant_id" class="form-label">@lang('Plant Id') <b class="ambitious-crimson">*</b></label>
                                                <select id="plant_id" class="form-control select2 @error('plant_id') is-invalid @enderror" name="plant_id" required>
                                                    <option value="">@lang('Select Class')</option>
                                                    @foreach($plants as $key => $value)
                                                    <option value="{{ $key }}" {{ old('plant_id', $partMaster->plant_id) == $key ? 'selected' : '' }} >{{ ucwords($value)}}</option>
                                                    @endforeach
                                                </select>
                                                @error('plant_id')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="plant_type" class="form-label">@lang('Type') <b class="ambitious-crimson">*</b></label>
                                                <input id="plant_type"  class="form-control @error('plant_type') is-invalid @enderror" type="text" name="plant_type" value="{{ old('plant_type', $partMaster->plant_type) }}" placeholder="@lang('Type Your Plant Type')" required>
                                                @error('plant_type')
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
                                                <label for="plant_warehouse" class="form-label">@lang('Warehouse') <b class="ambitious-crimson">*</b></label>
                                                <select id="plant_warehouse" class="form-control select2 @error('plant_warehouse') is-invalid @enderror" name="plant_warehouse" required>
                                                    <option value="">@lang('Select Warehouse')</option>
                                                    @foreach($warehouse as $key => $value)
                                                    <option value="{{ $key }}" {{ old('plant_warehouse', $partMaster->plant_warehouse) == $key ? 'selected' : '' }} >{{ ucwords($value)}}</option>
                                                    @endforeach
                                                </select>
                                                @error('plant_warehouse')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="plant_costing_method" class="form-label">@lang('Costing Method')</label>
                                                <input id="plant_costing_method"  class="form-control @error('plant_costing_method') is-invalid @enderror" type="text" name="plant_costing_method" value="{{ old('plant_costing_method', $partMaster->plant_costing_method) }}" placeholder="@lang('Type Your Plant Costing Method')">
                                                @error('plant_costing_method')
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
                                    <legend class="float-none w-auto px-1" >@lang('Inventory')</legend>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="plant_inventort_min_on_hand" class="form-label">@lang('Min on Hand') <b class="ambitious-crimson">*</b></label>
                                                <input id="plant_inventort_min_on_hand"  class="form-control @error('plant_inventort_min_on_hand') is-invalid @enderror" type="text" name="plant_inventort_min_on_hand" value="{{ old('plant_inventort_min_on_hand', $partMaster->plant_inventort_min_on_hand) }}" placeholder="@lang('Type Your Plant Inventory Min On-Hand')">
                                                @error('plant_inventort_min_on_hand')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="plant_inventort_max_on_hand" class="form-label">@lang('Max on Hand') <b class="ambitious-crimson">*</b></label>
                                                <input id="plant_inventort_max_on_hand"  class="form-control @error('plant_inventort_max_on_hand') is-invalid @enderror" type="text" name="plant_inventort_max_on_hand" value="{{ old('plant_inventort_max_on_hand', $partMaster->plant_inventort_max_on_hand) }}" placeholder="@lang('Type Your Plant Inventory Max On-Hand')">
                                                @error('plant_inventort_max_on_hand')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="plant_inventort_safety_stock" class="form-label">@lang('Safety Stock') <b class="ambitious-crimson">*</b></label>
                                                <input id="plant_inventort_safety_stock"  class="form-control @error('plant_inventort_safety_stock') is-invalid @enderror" type="text" name="plant_inventort_safety_stock" value="{{ old('plant_inventort_safety_stock', $partMaster->plant_inventort_safety_stock) }}" placeholder="@lang('Type Your Plant Inventory Safety Stock')">
                                                @error('plant_inventort_safety_stock')
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
                                    <legend class="float-none w-auto px-1" >@lang('Purchasing')</legend>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="plant_purchase_buyer" class="form-label">@lang('Buyer') <b class="ambitious-crimson">*</b></label>
                                                <select id="plant_purchase_buyer" class="form-control select2 @error('plant_purchase_buyer') is-invalid @enderror" name="plant_purchase_buyer" required>
                                                    <option value="">@lang('Select Buyer')</option>
                                                    @foreach($buyers as $value)
                                                    <option value="{{ $value->id }}" {{ old('plant_purchase_buyer', $partMaster->plant_purchase_buyer) == $value->id ? 'selected' : '' }} >{{ ucwords($value->f_name)." ".ucwords($value->l_name)}}</option>
                                                    @endforeach
                                                </select>
                                                @error('plant_purchase_buyer')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="plant_purchase_supplier" class="form-label">@lang('Supplier') <b class="ambitious-crimson">*</b></label>
                                                <select id="plant_purchase_supplier" class="form-control select2 @error('plant_purchase_supplier') is-invalid @enderror" name="plant_purchase_supplier" required>
                                                    <option value="">@lang('Select Supplier')</option>
                                                    @foreach($supplier as $key => $value)
                                                    <option value="{{ $key }}" {{ old('plant_purchase_supplier', $partMaster->plant_purchase_supplier) == $key ? 'selected' : '' }} >{{ ucwords($value)}}</option>
                                                    @endforeach
                                                </select>
                                                @error('plant_purchase_buyer')
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
                                                <label for="plant_purchase_min_order_qty" class="form-label">@lang('Min Order Qty') <b class="ambitious-crimson">*</b></label>
                                                <input id="plant_purchase_min_order_qty"  class="form-control @error('plant_purchase_min_order_qty') is-invalid @enderror" type="text" name="plant_purchase_min_order_qty" value="{{ old('plant_purchase_min_order_qty', $partMaster->plant_purchase_min_order_qty) }}" placeholder="@lang('Type Your Purchasing Min Order Qty')" required>
                                                @error('plant_purchase_min_order_qty')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="plant_purchase_lead_time" class="form-label">@lang('Lead Time') <b class="ambitious-crimson">*</b></label>
                                                <input id="plant_purchase_lead_time"  class="form-control @error('plant_purchase_lead_time') is-invalid @enderror" type="text" name="plant_purchase_lead_time" value="{{ old('plant_purchase_lead_time', $partMaster->plant_purchase_lead_time) }}" placeholder="@lang('Type Your Purchasing Lead Time')" required>
                                                @error('plant_purchase_lead_time')
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
                                    <legend class="float-none w-auto px-1" >@lang('Manufacturig')</legend>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="plant_manufacture_mrp" class="form-label">@lang('MRP') <b class="ambitious-crimson">*</b></label>
                                                <input id="plant_manufacture_mrp"  class="form-control @error('plant_manufacture_mrp') is-invalid @enderror" type="text" name="plant_manufacture_mrp" value="{{ old('plant_manufacture_mrp', $partMaster->plant_manufacture_mrp) }}" placeholder="@lang('Type Your Manufacturig MRP')" required>
                                                @error('plant_manufacture_mrp')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="mb-3">
                                                <div class="form-check form-check-info">
                                                    <br><br>
                                                    <input id="plant_manufacture_generate_po_suggestion" class="form-check-input" type="checkbox" name="plant_manufacture_generate_po_suggestion" value="{{ true }}" @if ($partMaster->plant_manufacture_generate_po_suggestion == '1') checked @endif>
                                                    <label for="plant_manufacture_generate_po_suggestion" class="form-label">@lang('Generate PO Suggestions')</label>
                                                    @error('plant_manufacture_generate_po_suggestion')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="plant_manufacture_blackflush" class="form-label">@lang('Backflush') <b class="ambitious-crimson">*</b></label>
                                                <input id="plant_manufacture_blackflush"  class="form-control @error('plant_manufacture_blackflush') is-invalid @enderror" type="text" name="plant_manufacture_blackflush" value="{{ old('plant_manufacture_blackflush', $partMaster->plant_manufacture_blackflush) }}" placeholder="@lang('Type Your Manufacturig Backflush')" required>
                                                @error('plant_manufacture_blackflush')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="plant_manufacture_re_order_max" class="form-label">@lang('Re-Order  Max') <b class="ambitious-crimson">*</b></label>
                                                <input id="plant_manufacture_re_order_max"  class="form-control @error('plant_manufacture_re_order_max') is-invalid @enderror" type="text" name="plant_manufacture_re_order_max" value="{{ old('plant_manufacture_re_order_max', $partMaster->plant_manufacture_re_order_max) }}" placeholder="@lang('Type Your Manufacturig Re-Order  Max')" required>
                                                @error('plant_manufacture_re_order_max')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                                <div class="card-body ps-0 pe-0">
                                    <input type="submit" value="@lang('common.submit')" class="btn btn-info btn-lg pl-0" />
                                    <a href="{{ route('dashboard.index') }}"
                                        class="btn btn-warning btn-lg float-end">@lang('common.cancel')</a>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane" id="warehouse_tab" role="tabpanel">
                            <form class="form-material form-horizontal"
                                action="{{ route('part-master.warehouseTabUpdate', $partMaster->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <fieldset class="custom-border p-3">
                                    <legend class="float-none w-auto px-1" >@lang('Warehouse')</legend>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="warehouse_name" class="form-label">@lang('Warehouse') <b class="ambitious-crimson">*</b></label>
                                                <select id="warehouse_name" class="form-control select2 @error('warehouse_name') is-invalid @enderror" name="warehouse_name" required>
                                                    <option value="">@lang('Select Warehouse')</option>
                                                    @foreach($warehouse as $key => $value)
                                                    <option value="{{ $key }}" {{ old('warehouse_name', $partMaster->warehouse_name) == $key ? 'selected' : '' }} >{{ ucwords($value)}}</option>
                                                    @endforeach
                                                </select>
                                                @error('warehouse_name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="warehouse_primary_bin" class="form-label">@lang('Primary BIN')</label>
                                                <select id="warehouse_primary_bin" class="form-control select2 @error('warehouse_primary_bin') is-invalid @enderror" name="warehouse_primary_bin" required>
                                                    <option value="">@lang('Select Bin')</option>
                                                    @foreach($bin as $key => $value)
                                                    <option value="{{ $key }}" {{ old('warehouse_primary_bin', $partMaster->warehouse_primary_bin) == $key ? 'selected' : '' }} >{{ ucwords($value)}}</option>
                                                    @endforeach
                                                </select>
                                                @error('warehouse_primary_bin')
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
                                                <label for="warehouse_description" class="form-label">@lang('Warehouse Description')</label>
                                                <input id="warehouse_description"  class="form-control @error('warehouse_description') is-invalid @enderror" type="text" name="warehouse_description" value="{{ old('warehouse_description', $partMaster->warehouse_description) }}" placeholder="@lang('Type Your Warehouse Description')">
                                                @error('warehouse_description')
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
                                    <legend class="float-none w-auto px-1" >@lang('Cycle Count')</legend>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="warehouse_manual_abc_code" class="form-label">@lang('Manual ABC Code') <b class="ambitious-crimson">*</b></label>
                                                <input id="warehouse_manual_abc_code"  class="form-control @error('warehouse_manual_abc_code') is-invalid @enderror" type="text" name="warehouse_manual_abc_code" value="{{ old('warehouse_manual_abc_code', $partMaster->warehouse_manual_abc_code) }}" placeholder="@lang('Type Your Cycle Count Manual ABC Code')" required>
                                                @error('warehouse_manual_abc_code')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <div class="form-check form-check-info">
                                                    <br><br>
                                                    <input id="warehouse_override_frequency" class="form-check-input" type="checkbox" name="warehouse_override_frequency" value="{{ true }}" @if ($partMaster->warehouse_override_frequency == '1') checked @endif>
                                                    <label for="warehouse_override_frequency" class="form-label">@lang('Override Frequency')</label>
                                                    @error('warehouse_override_frequency')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="warehouse_abc_code" class="form-label">@lang('ABC Code')</label>
                                                <input id="warehouse_abc_code"  class="form-control @error('warehouse_abc_code') is-invalid @enderror" type="text" name="warehouse_abc_code" value="{{ old('warehouse_abc_code', $partMaster->warehouse_abc_code) }}" placeholder="@lang('Type Your Cycle Count ABC Code')">
                                                @error('warehouse_abc_code')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <div class="form-check form-check-info">
                                                    <br><br>
                                                    <input id="warehouse_count_frequency" class="form-check-input" type="checkbox" name="warehouse_count_frequency" value="{{ true }}" @if ($partMaster->warehouse_count_frequency == '1') checked @endif>
                                                    <label for="warehouse_count_frequency" class="form-label">@lang('Count Frequency')</label>
                                                    @error('warehouse_count_frequency')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="warehouse_min_abc" class="form-label">@lang('Min ABC')</label>
                                                <input id="warehouse_min_abc"  class="form-control @error('warehouse_min_abc') is-invalid @enderror" type="text" name="warehouse_min_abc" value="{{ old('warehouse_min_abc', $partMaster->warehouse_min_abc) }}" placeholder="@lang('Type Your Cycle Count Min ABC')">
                                                @error('warehouse_min_abc')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="warehouse_last_cycle_count_date" class="form-label">@lang('Last Cycle Count Date')</label>
                                                <input id="warehouse_last_cycle_count_date"  class="form-control @error('warehouse_last_cycle_count_date') is-invalid @enderror" type="text" name="warehouse_last_cycle_count_date" value="{{ old('warehouse_last_cycle_count_date', $partMaster->warehouse_last_cycle_count_date) }}" placeholder="@lang('Type Your Warehouse Last Cycle Count Date')">
                                                @error('warehouse_last_cycle_count_date')
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
                                    <legend class="float-none w-auto px-1" >@lang('Variance Tolerance')</legend>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <div class="form-check form-check-info">
                                                    <br><br>
                                                    <input id="warehouse_calculate_qty_adj" class="form-check-input" type="checkbox" name="warehouse_calculate_qty_adj" value="{{ true }}" @if ($partMaster->warehouse_calculate_qty_adj == '1') checked @endif>
                                                    <label for="warehouse_calculate_qty_adj" class="form-label">@lang('Calculate Qty Adj')</label>
                                                    @error('warehouse_calculate_qty_adj')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2"></div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="warehouse_qty_adjustment_tolerance" class="form-label">@lang('Qty Adjustment Tolerance')</label>
                                                <input id="warehouse_qty_adjustment_tolerance"  class="form-control @error('warehouse_qty_adjustment_tolerance') is-invalid @enderror" type="text" name="warehouse_qty_adjustment_tolerance" value="{{ old('warehouse_qty_adjustment_tolerance', $partMaster->warehouse_qty_adjustment_tolerance) }}" placeholder="@lang('Type Your Variance Tolerance Qty Adjustment Tolerance')">
                                                @error('warehouse_qty_adjustment_tolerance')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <div class="form-check form-check-info">
                                                    <br><br>
                                                    <input id="warehouse_calculate_percent" class="form-check-input" type="checkbox" name="warehouse_calculate_percent" value="{{ true }}" @if ($partMaster->warehouse_calculate_percent == '1') checked @endif>
                                                    <label for="warehouse_calculate_percent" class="form-label">@lang('Calculate Percent')</label>
                                                    @error('warehouse_calculate_percent')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2"></div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="warehouse_percentange_tolerance" class="form-label">@lang('Percetange Tolerance')</label>
                                                <input id="warehouse_percentange_tolerance"  class="form-control @error('warehouse_percentange_tolerance') is-invalid @enderror" type="text" name="warehouse_percentange_tolerance" value="{{ old('warehouse_percentange_tolerance', $partMaster->warehouse_percentange_tolerance) }}" placeholder="@lang('Type Your Variance Tolerance Percetange Tolerance')">
                                                @error('warehouse_percentange_tolerance')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <div class="form-check form-check-info">
                                                    <br>
                                                    <input id="warehouse_calculate_quality" class="form-check-input" type="checkbox" name="warehouse_calculate_quality" value="{{ true }}" @if ($partMaster->warehouse_calculate_quality == '1') checked @endif>
                                                    <label for="warehouse_calculate_quality" class="form-label">@lang('Calculate Quality')</label>
                                                    @error('warehouse_calculate_quality')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2"></div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="warehouse_qty_tolerance" class="form-label">@lang('Qty Tolerance')</label>
                                                <input id="warehouse_qty_tolerance"  class="form-control @error('warehouse_qty_tolerance') is-invalid @enderror" type="text" name="warehouse_qty_tolerance" value="{{ old('warehouse_qty_tolerance', $partMaster->warehouse_qty_tolerance) }}" placeholder="@lang('Type Your Variance Tolerance Qty Tolerance')">
                                                @error('warehouse_qty_tolerance')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <div class="form-check form-check-info">
                                                    <br>
                                                    <input id="warehouse_calculate_value" class="form-check-input" type="checkbox" name="warehouse_calculate_value" value="{{ true }}" @if ($partMaster->warehouse_calculate_value == '1') checked @endif>
                                                    <label for="warehouse_calculate_value" class="form-label">@lang('Calculate Value')</label>
                                                    @error('warehouse_calculate_value')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2"></div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="warehouse_value_tolerance" class="form-label">@lang('Value Tolerance')</label>
                                                <input id="warehouse_value_tolerance"  class="form-control @error('warehouse_value_tolerance') is-invalid @enderror" type="text" name="warehouse_value_tolerance" value="{{ old('warehouse_value_tolerance', $partMaster->warehouse_value_tolerance) }}" placeholder="@lang('Type Your Variance Tolerance Value Tolerance')">
                                                @error('warehouse_value_tolerance')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                                <br>
                                <div class="card-body ps-0 pe-0">
                                    <input type="submit" value="@lang('common.submit')" class="btn btn-info btn-lg pl-0" />
                                    <a href="{{ route('dashboard.index') }}"
                                        class="btn btn-warning btn-lg float-end">@lang('common.cancel')</a>
                                </div>
                            </form>
                        </div>
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

            $('.dropify').dropify();

            $('.select2').select2();

            $("#effective_date").flatpickr({
                enableTime: false,
                dateFormat: "d-m-y"
            });

            $("#warehouse_last_cycle_count_date").flatpickr({
                enableTime: false,
                dateFormat: "d-m-y"
            });

            $('#revision_name').change(function() {
                let revision_id = $("#revision_name").val();
                $.ajax({
                    url: '{{ route('revision.getData') }}',
                    type: 'GET',
                    dataType: 'JSON',
                    data: 'id=' + revision_id,
                    success: function(data) {
                        $('#revision_description').val(data.revision_description);
                        $('#effective_date').val(data.effective_date);
                        if(data.approved == "1") {
                            $('#approved').attr('checked', true);
                        } else {
                            $('#approved').attr('checked', false);
                        }
                    }
                });
            });

            $('#warehouse_name').change(function() {
                let warehouse_id = $("#warehouse_name").val();

                $.ajax({
                    url: '{{ route('warehouse.getData') }}',
                    type: 'GET',
                    dataType: 'JSON',
                    data: 'id=' + warehouse_id,
                    success: function(data) {
                        $('#warehouse_description').val(data.description);
                    }
                });

            });

            
        });
    </script>
@endsection
