@extends('layouts.master')
@section('title')
    @lang('Part Master')
@endsection
@section('content')
    @component('components.breadcrumb')
        @slot('li_1')
            @lang('Part Master')
        @endslot
        @slot('title')
            @lang('Show Part Master')
        @endslot
    @endcomponent
    <div class="position-relative mx-n4 mt-n4">
        <div class="profile-wid-bg profile-setting-img">
            <img src="{{ URL::asset('assets/images/profile-bg.jpg') }}" class="profile-wid-img" alt="">
        </div>
    </div>
    <div class="row">
        <div class="col-xxl-12">
            <div class="card mt-xxl-n5">
                <div class="card-header">
                    <ul class="nav nav-tabs-custom nav-justified rounded card-header-tabs border-bottom-0" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-bs-toggle="tab" href="#partDetailsTab" role="tab">
                                <i class="fas fa-home"></i>
                                @lang('Part Tab')
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#revisionDetailsTab" role="tab">
                                <i class="far fa-user"></i>
                                @lang('Revision Tab')
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#plantDetailsTab" role="tab">
                                <i class="far fa-envelope"></i>
                                @lang('Plant Tab')
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#warehouseDetailsTab" role="tab">
                                <i class="far fa-envelope"></i>
                                @lang('Warehouse Tab')
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="card-body p-4">
                    <div class="tab-content">
                        <div class="tab-pane active" id="partDetailsTab" role="tabpanel">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <div class="card profile-project-card profile-project-success mb-0">
                                        <div class="card-header">
                                            <h5 class="fs-14 text-truncate mb-1"><b>@lang('Parameters')</b></h5>
                                        </div>
                                        <div class="card-body p-4">
                                            <div class="table-responsive">
                                                <table class="table table-borderless mb-0">
                                                    <tbody>
                                                        <tr>
                                                            @if (isset($partMaster->part_number))
                                                                <th class="ps-0 col-md-3" scope="row">@lang('PartNum')</th>
                                                                <td class="text-muted">{{ $partMaster->part_number }}</td>
                                                            @endif
                                                        
                                                            @if (isset($partMaster->type))
                                                                <th class="ps-0 col-md-3" scope="row">@lang('Type')</th>
                                                                <td class="text-muted">{{ str_replace("_"," ",$partMaster->type) }}</td>
                                                            @endif
                                                        </tr>

                                                        @if (isset($partMaster->description))
                                                            <tr>
                                                                <th class="ps-0 col-md-3" scope="row">@lang('Part Description')</th>
                                                                <td class="text-muted">{{ $partMaster->description }}</td>
                                                            </tr>
                                                        @endif
                                                        <tr>
                                                            @if (isset($partMaster->group_id))
                                                                <th class="ps-0 col-md-3" scope="row">@lang('Group')</th>
                                                                <td class="text-muted">{{ $groups[$partMaster->group_id] }}</td>
                                                            @endif
                                                            @if (isset($partMaster->class_id))
                                                                <th class="ps-0 col-md-3" scope="row">@lang('Class')</th>
                                                                <td class="text-muted">{{ $partClass[$partMaster->class_id] }}</td>
                                                            @endif
                                                        </tr>
                                                        <tr>
                                                            @if (isset($partMaster->costing_method))
                                                                <th class="ps-0 col-md-3" scope="row">@lang('Costing Method')</th>
                                                                <td class="text-muted">{{ str_replace("_"," ",$partMaster->costing_method) }}</td>
                                                            @endif

                                                            <th class="ps-0 col-md-3" scope="row">@lang('Active')</th>
                                                            @if (isset($partMaster->active) && ($partMaster->active == "1"))
                                                                <td class="text-muted">{{ "Enable" }}</td>
                                                            @else
                                                                <td class="text-muted">{{ "Disable" }}</td>
                                                            @endif
                                                        </tr>

                                                        <tr>
                                                            <th class="ps-0 col-md-3" scope="row">@lang('Buy To Order')</th>
                                                            @if (isset($partMaster->buy_to_order) && ($partMaster->buy_to_order == "1"))
                                                                <td class="text-muted">{{ "Enable" }}</td>
                                                            @else
                                                                <td class="text-muted">{{ "Disable" }}</td>
                                                            @endif
                                                        
                                                            <th class="ps-0 col-md-3" scope="row">@lang('Non-Stock Part')</th>
                                                            @if (isset($partMaster->non_stock_part) && ($partMaster->non_stock_part == "1"))
                                                                <td class="text-muted">{{ "Enable" }}</td>
                                                            @else
                                                                <td class="text-muted">{{ "Disable" }}</td>
                                                            @endif
                                                        </tr>

                                                        <tr>
                                                            <th class="ps-0 col-md-3" scope="row">@lang('Quantity Bearing')</th>
                                                            @if (isset($partMaster->quantity_bearing) && ($partMaster->quantity_bearing == "1"))
                                                                <td class="text-muted">{{ "Enable" }}</td>
                                                            @else
                                                                <td class="text-muted">{{ "Disable" }}</td>
                                                            @endif
                                                        
                                                            <th class="ps-0 col-md-3" scope="row">@lang('Phantom Part')</th>
                                                            @if (isset($partMaster->phantom_part) && ($partMaster->phantom_part == "1"))
                                                                <td class="text-muted">{{ "Enable" }}</td>
                                                            @else
                                                                <td class="text-muted">{{ "Disable" }}</td>
                                                            @endif
                                                        </tr>
                                                        
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="swiper-slide">
                                    <div class="card profile-project-card profile-project-success mb-0">
                                        <div class="card-header">
                                            <h5 class="fs-14 text-truncate mb-1"><b>@lang('UOMs')</b></h5>
                                        </div>
                                        <div class="card-body p-4">
                                            <div class="table-responsive">
                                                <table class="table table-borderless mb-0">
                                                    <tbody>
                                                        @if (isset($partMaster->inventory))
                                                            <tr>
                                                                <th class="ps-0 col-md-3" scope="row">@lang('Inventory')</th>
                                                                <td class="text-muted">{{ $partMaster->inventory }}</td>
                                                            </tr>
                                                        @endif
                                                        @if (isset($partMaster->sales))
                                                            <tr>
                                                                <th class="ps-0 col-md-3" scope="row">@lang('Sales')</th>
                                                                <td class="text-muted">{{ $partMaster->sales }}</td>
                                                            </tr>
                                                        @endif
                                                        @if (isset($partMaster->purchasing))
                                                            <tr>
                                                                <th class="ps-0 col-md-3" scope="row">@lang('Purchasing')</th>
                                                                <td class="text-muted">{{ $partMaster->purchasing }}</td>
                                                            </tr>
                                                        @endif
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="swiper-slide">
                                    <div class="card profile-project-card profile-project-success mb-0">
                                        <div class="card-header">
                                            <h5 class="fs-14 text-truncate mb-1"><b>@lang('Sales Unit Prices / Internal Price')</b></h5>
                                        </div>
                                        <div class="card-body p-4">
                                            <div class="table-responsive">
                                                <table class="table table-borderless mb-0">
                                                    <tbody>
                                                        @if (isset($partMaster->sales_unit_price))
                                                            <tr>
                                                                <th class="ps-0 col-md-3" scope="row">@lang('Sales Unit Price')</th>
                                                                <td class="text-muted">{{ $partMaster->sales_unit_price }}</td>
                                                            </tr>
                                                        @endif
                                                        @if (isset($partMaster->internal_price))
                                                            <tr>
                                                                <th class="ps-0 col-md-3" scope="row">@lang('Internal Price')</th>
                                                                <td class="text-muted">{{ $partMaster->internal_price }}</td>
                                                            </tr>
                                                        @endif
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="swiper-slide">
                                    <div class="card profile-project-card profile-project-success mb-0">
                                        <div class="card-header">
                                            <h5 class="fs-14 text-truncate mb-1"><b>@lang('Tracking')</b></h5>
                                        </div>
                                        <div class="card-body p-4">
                                            <div class="table-responsive">
                                                <table class="table table-borderless mb-0">
                                                    <tbody>
                                                        <tr>
                                                            <th class="ps-0 col-md-3" scope="row">@lang('Track Lot')</th>
                                                            @if (isset($partMaster->track_lot) && ($partMaster->track_lot == "1"))
                                                                <td class="text-muted">{{ "Enable" }}</td>
                                                            @else
                                                                <td class="text-muted">{{ "Disable" }}</td>
                                                            @endif
                                                        
                                                            <th class="ps-0 col-md-3" scope="row">@lang('Track Serial Numbers')</th>
                                                            @if (isset($partMaster->track_serial_numbers) && ($partMaster->track_serial_numbers == "1"))
                                                                <td class="text-muted">{{ "Enable" }}</td>
                                                            @else
                                                                <td class="text-muted">{{ "Disable" }}</td>
                                                            @endif
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="revisionDetailsTab" role="tabpanel">
                            <div class="table-responsive">
                                <table class="table table-borderless mb-0">
                                    <tbody>
                                        @if (isset($partMaster->revision_name))
                                        <tr>
                                            <th class="ps-0 col-md-3" scope="row">@lang('Revision Name')</th>
                                            <td class="text-muted">{{ $partMaster->revision_name }}</td>
                                        </tr>
                                        @endif
                                        @if (isset($partMaster->revision_description))
                                        <tr>
                                            <th class="ps-0 col-md-3" scope="row">@lang('Revision Description')</th>
                                            <td class="text-muted">{{ $partMaster->revision_description }}</td>
                                        </tr>
                                        @endif
                                        @if (isset($partMaster->effective_date))
                                            <tr>
                                                <th class="ps-0 col-md-3" scope="row">@lang('Effective Date')</th>
                                                <td class="text-muted">{{ $partMaster->effective_date }}</td>
                                            </tr>
                                        @endif
                                        <th class="ps-0 col-md-3" scope="row">@lang('Approved')</th>
                                        @if (isset($partMaster->approved) && ($partMaster->approved == "1"))
                                            <td class="text-muted">{{ "Enable" }}</td>
                                        @else
                                            <td class="text-muted">{{ "Disable" }}</td>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane" id="plantDetailsTab" role="tabpanel">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <div class="card profile-project-card profile-project-success mb-0">
                                        <div class="card-header">
                                            <h5 class="fs-14 text-truncate mb-1"><b>@lang('Plant')</b></h5>
                                        </div>
                                        <div class="card-body p-4">
                                            <div class="table-responsive">
                                                <table class="table table-borderless mb-0">
                                                    <tbody>
                                                        <tr>
                                                            @if (isset($partMaster->plant_id))
                                                                <th class="ps-0 col-md-3" scope="row">@lang('Plant Id')</th>
                                                                <td class="text-muted">{{ $plants[$partMaster->plant_id] }}</td>
                                                            @endif
                                                            @if (isset($partMaster->plant_type))
                                                                <th class="ps-0 col-md-3" scope="row">@lang('Plant Type')</th>
                                                                <td class="text-muted">{{ $partMaster->plant_type }}</td>
                                                            @endif
                                                        </tr>
                                                        <tr>
                                                            @if (isset($partMaster->plant_warehouse))
                                                                <th class="ps-0 col-md-3" scope="row">@lang('Warehouse')</th>
                                                                <td class="text-muted">{{ $partMaster->warehouse->name }}</td>
                                                            @endif
                                                            @if (isset($partMaster->plant_costing_method))
                                                                <th class="ps-0 col-md-3" scope="row">@lang('Costing Method')</th>
                                                                <td class="text-muted">{{ $partMaster->plant_costing_method }}</td>
                                                            @endif
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="swiper-slide">
                                    <div class="card profile-project-card profile-project-success mb-0">
                                        <div class="card-header">
                                            <h5 class="fs-14 text-truncate mb-1"><b>@lang('Inventory')</b></h5>
                                        </div>
                                        <div class="card-body p-4">
                                            <div class="table-responsive">
                                                <table class="table table-borderless mb-0">
                                                    <tbody>
                                                        <tr>
                                                            @if (isset($partMaster->plant_inventort_min_on_hand))
                                                                <th class="ps-0 col-md-3" scope="row">@lang('Min on Hand')</th>
                                                                <td class="text-muted">{{ $partMaster->plant_inventort_min_on_hand }}</td>
                                                            @endif
                                                            @if (isset($partMaster->plant_inventort_max_on_hand))
                                                                <th class="ps-0 col-md-3" scope="row">@lang('Max on Hand')</th>
                                                                <td class="text-muted">{{ $partMaster->plant_inventort_max_on_hand }}</td>
                                                            @endif
                                                        </tr>
                                                        @if (isset($partMaster->plant_inventort_safety_stock))
                                                            <tr>
                                                                <th class="ps-0 col-md-3" scope="row">@lang('Safety Stock')</th>
                                                                <td class="text-muted">{{ $partMaster->plant_inventort_safety_stock }}</td>
                                                            </tr>
                                                        @endif
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="swiper-slide">
                                    <div class="card profile-project-card profile-project-success mb-0">
                                        <div class="card-header">
                                            <h5 class="fs-14 text-truncate mb-1"><b>@lang('Purchasing')</b></h5>
                                        </div>
                                        <div class="card-body p-4">
                                            <div class="table-responsive">
                                                <table class="table table-borderless mb-0">
                                                    <tbody>
                                                        <tr>
                                                            @if (isset($partMaster->plant_purchase_buyer))
                                                                <th class="ps-0 col-md-3" scope="row">@lang('Buyer')</th>
                                                                <td class="text-muted">{{ $partMaster->buyer->f_name." ".$partMaster->buyer->l_name }}</td>
                                                            @endif
                                                            @if (isset($partMaster->plant_purchase_supplier))
                                                                <th class="ps-0 col-md-3" scope="row">@lang('Supplier')</th>
                                                                <td class="text-muted">{{ $partMaster->supplier->name }}</td>
                                                            @endif
                                                        </tr>
                                                        <tr>
                                                            @if (isset($partMaster->plant_purchase_min_order_qty))
                                                                <th class="ps-0 col-md-3" scope="row">@lang('Min Order Qty')</th>
                                                                <td class="text-muted">{{ $partMaster->plant_purchase_min_order_qty }}</td>
                                                            @endif
                                                            @if (isset($partMaster->plant_purchase_lead_time))
                                                                <th class="ps-0 col-md-3" scope="row">@lang('Lead Time')</th>
                                                                <td class="text-muted">{{ $partMaster->plant_purchase_lead_time }}</td>
                                                            @endif
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="swiper-slide">
                                    <div class="card profile-project-card profile-project-success mb-0">
                                        <div class="card-header">
                                            <h5 class="fs-14 text-truncate mb-1"><b>@lang('Manufacturig')</b></h5>
                                        </div>
                                        <div class="card-body p-4">
                                            <div class="table-responsive">
                                                <table class="table table-borderless mb-0">
                                                    <tbody>
                                                        <tr>
                                                            @if (isset($partMaster->plant_manufacture_mrp))
                                                                <th class="ps-0 col-md-3" scope="row">@lang('MRP')</th>
                                                                <td class="text-muted">{{ $partMaster->plant_manufacture_mrp }}</td>
                                                            @endif
                                                            <th class="ps-0 col-md-3" scope="row">@lang('Generate PO Suggestions')</th>
                                                            @if (isset($partMaster->plant_manufacture_generate_po_suggestion) && ($partMaster->plant_manufacture_generate_po_suggestion == "1"))
                                                                <td class="text-muted">{{ "Enable" }}</td>
                                                            @else
                                                                <td class="text-muted">{{ "Disable" }}</td>
                                                            @endif
                                                        </tr>
                                                        <tr>
                                                            @if (isset($partMaster->plant_manufacture_blackflush))
                                                                <th class="ps-0 col-md-3" scope="row">@lang('Backflush')</th>
                                                                <td class="text-muted">{{ $partMaster->plant_manufacture_blackflush }}</td>
                                                            @endif
                                                            @if (isset($partMaster->plant_manufacture_re_order_max))
                                                                <th class="ps-0 col-md-3" scope="row">@lang('Re-Order Max')</th>
                                                                <td class="text-muted">{{ $partMaster->plant_manufacture_re_order_max }}</td>
                                                            @endif
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="warehouseDetailsTab" role="tabpanel">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
    
    @section('script')
        <script src="{{ URL::asset('assets/js/app.min.js') }}"></script>
    @endsection