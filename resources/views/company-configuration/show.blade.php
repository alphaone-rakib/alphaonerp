@extends('layouts.master')
@section('title')
    @lang('Company')
@endsection
@section('content')
    @component('components.breadcrumb')
        @slot('li_1')
            @lang('Company Configuration')
        @endslot
        @slot('title')
            @lang('Show Company Configuration')
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
                            <a class="nav-link active" data-bs-toggle="tab" href="#companyDetailsTab" role="tab">
                                <i class="fas fa-home"></i>
                                @lang('Company Details')
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#salesTab" role="tab">
                                <i class="far fa-user"></i>
                                @lang('Sales')
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#purchaseTab" role="tab">
                                <i class="far fa-envelope"></i>
                                @lang('Purchase')
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#inventoryTab" role="tab">
                                <i class="far fa-envelope"></i>
                                @lang('Inventory')
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#logisticTab" role="tab">
                                <i class="far fa-envelope"></i>
                                @lang('Logistic')
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#productionTab" role="tab">
                                <i class="far fa-envelope"></i>
                                @lang('Production')
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#serviceTab" role="tab">
                                <i class="far fa-envelope"></i>
                                @lang('Service')
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#projectTab" role="tab">
                                <i class="far fa-envelope"></i>
                                @lang('Project')
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#humanResourceTab" role="tab">
                                <i class="far fa-envelope"></i>
                                @lang('Human Resource')
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#financeTab" role="tab">
                                <i class="far fa-envelope"></i>
                                @lang('Finance')
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="card-body p-4">
                    <div class="tab-content">
                        <div class="tab-pane active" id="companyDetailsTab" role="tabpanel">
                            <div class="table-responsive">
                                <table class="table table-borderless mb-0">
                                    <tbody>
                                        @if (isset($company->name))
                                        <tr>
                                            <th class="ps-0 col-md-4" scope="row">@lang('Company Name')</th>
                                            <td class="text-muted">{{ $company->name }}</td>
                                        </tr>
                                        @endif
                                        @if (isset($company->phone))
                                        <tr>
                                            <th class="ps-0 col-md-4" scope="row">@lang('Phone')</th>
                                            <td class="text-muted">{{ $company->phone }}</td>
                                        </tr>
                                        @endif
                                        @if (isset($company->country))
                                            <tr>
                                                <th class="ps-0 col-md-4" scope="row">@lang('Country')</th>
                                                <td class="text-muted">{{ $country }}</td>
                                            </tr>
                                        @endif
                                        @if (isset($company->state))
                                            <tr>
                                                <th class="ps-0 col-md-4" scope="row">@lang('State')</th>
                                                <td class="text-muted">{{ $state }}</td>
                                            </tr>
                                        @endif
                                        @if (isset($company->city))
                                            <tr>
                                                <th class="ps-0 col-md-4" scope="row">@lang('City')</th>
                                                <td class="text-muted">{{ $city }}</td>
                                            </tr>
                                        @endif
                                        @if (isset($company->zip_code))
                                            <tr>
                                                <th class="ps-0 col-md-4" scope="row">@lang('Zip Code')</th>
                                                <td class="text-muted">{{ $company->zip_code }}</td>
                                            </tr>
                                        @endif
                                        @if (isset($company->company_address_one))
                                            <tr>
                                                <th class="ps-0 col-md-4" scope="row">@lang('Address One')</th>
                                                <td class="text-muted">{{ $company->company_address_one }}</td>
                                            </tr>
                                        @endif
                                        @if (isset($company->company_address_one))
                                            <tr>
                                                <th class="ps-0 col-md-4" scope="row">@lang('Address Two')</th>
                                                <td class="text-muted">{{ $company->company_address_two }}</td>
                                            </tr>
                                        @endif
                                        @if (isset($company->fax))
                                            <tr>
                                                <th class="ps-0 col-md-4" scope="row">@lang('Fax')</th>
                                                <td class="text-muted">{{ $company->fax }}</td>
                                            </tr>
                                        @endif
                                        @if (isset($company->url))
                                            <tr>
                                                <th class="ps-0 col-md-4" scope="row">@lang('URL')</th>
                                                <td class="text-muted">{{ $company->url }}</td>
                                            </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane" id="salesTab" role="tabpanel">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <div class="card profile-project-card profile-project-success mb-0">
                                        <div class="card-header">
                                            <h5 class="fs-14 text-truncate mb-1"><b>@lang('Quote Setup')</b></h5>
                                        </div>
                                        <div class="card-body p-4">
                                            <div class="table-responsive">
                                                <table class="table table-borderless mb-0">
                                                    <tbody>
                                                        @if (isset($company->initial_quote_no))
                                                            <tr>
                                                                <th class="ps-0 col-md-3" scope="row">@lang('Initial Quote No')</th>
                                                                <td class="text-muted">{{ $company->initial_quote_no }}</td>
                                                            </tr>
                                                        @endif
                                                        @if (isset($company->quote_prefix))
                                                            <tr>
                                                                <th class="ps-0 col-md-3" scope="row">@lang('Quote Prefix')</th>
                                                                <td class="text-muted">{{ $company->quote_prefix }}</td>
                                                            </tr>
                                                        @endif
                                                        @if (isset($company->expiration_days))
                                                            <tr>
                                                                <th class="ps-0 col-md-3" scope="row">@lang('Expiration Days')</th>
                                                                <td class="text-muted">{{ $company->expiration_days }}</td>
                                                            </tr>
                                                        @endif
                                                        @if (isset($company->follow_up_days))
                                                            <tr>
                                                                <th class="ps-0 col-md-3" scope="row">@lang('Follow Up Days')</th>
                                                                <td class="text-muted">{{ $company->follow_up_days }}</td>
                                                            </tr>
                                                        @endif
                                                        @if (isset($company->days_to_quote))
                                                            <tr>
                                                                <th class="ps-0 col-md-3" scope="row">@lang('Days To Quote')</th>
                                                                <td class="text-muted">{{ $company->days_to_quote }}</td>
                                                            </tr>
                                                        @endif
                                                        @if (isset($company->quote_form_messages))
                                                            <tr>
                                                                <th class="ps-0 col-md-3" scope="row">@lang('Quote Form Messages')</th>
                                                                <td class="text-muted">{{ $company->quote_form_messages }}</td>
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
                                            <h5 class="fs-14 text-truncate mb-1"><b>@lang('Order Setup')</b></h5>
                                        </div>
                                        <div class="card-body p-4">
                                            <div class="table-responsive">
                                                <table class="table table-borderless mb-0">
                                                    <tbody>
                                                        @if (isset($company->initial_order_no))
                                                            <tr>
                                                                <th class="ps-0 col-md-3" scope="row">@lang('Initial Order No')</th>
                                                                <td class="text-muted">{{ $company->initial_order_no }}</td>
                                                            </tr>
                                                        @endif
                                                        @if (isset($company->order_prefix))
                                                            <tr>
                                                                <th class="ps-0 col-md-3" scope="row">@lang('Order Prefix')</th>
                                                                <td class="text-muted">{{ $company->order_prefix }}</td>
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
                                            <h5 class="fs-14 text-truncate mb-1"><b>@lang('RMA Setup')</b></h5>
                                        </div>
                                        <div class="card-body p-4">
                                            <div class="table-responsive">
                                                <table class="table table-borderless mb-0">
                                                    <tbody>
                                                        @if (isset($company->initial_rma_no))
                                                            <tr>
                                                                <th class="ps-0 col-md-3" scope="row">@lang('Initial RMA No')</th>
                                                                <td class="text-muted">{{ $company->initial_rma_no }}</td>
                                                            </tr>
                                                        @endif
                                                        @if (isset($company->rma_prefix))
                                                            <tr>
                                                                <th class="ps-0 col-md-3" scope="row">@lang('RMA Prefix')</th>
                                                                <td class="text-muted">{{ $company->rma_prefix }}</td>
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
                                            <h5 class="fs-14 text-truncate mb-1"><b>@lang('Custumer  Setup')</b></h5>
                                        </div>
                                        <div class="card-body p-4">
                                            <div class="table-responsive">
                                                <table class="table table-borderless mb-0">
                                                    <tbody>
                                                        @if (isset($company->initial_customer_no))
                                                            <tr>
                                                                <th class="ps-0 col-md-3" scope="row">@lang('Initial Customer No')</th>
                                                                <td class="text-muted">{{ $company->initial_customer_no }}</td>
                                                            </tr>
                                                        @endif
                                                        @if (isset($company->customer_prefix))
                                                            <tr>
                                                                <th class="ps-0 col-md-3" scope="row">@lang('Customer Prefix')</th>
                                                                <td class="text-muted">{{ $company->customer_prefix }}</td>
                                                            </tr>
                                                        @endif
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="purchaseTab" role="tabpanel">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <div class="card profile-project-card profile-project-success mb-0">
                                        <div class="card-header">
                                            <h5 class="fs-14 text-truncate mb-1"><b>@lang('Purchase Order Setup')</b></h5>
                                        </div>
                                        <div class="card-body p-4">
                                            <div class="table-responsive">
                                                <table class="table table-borderless mb-0">
                                                    <tbody>
                                                        @if (isset($company->initial_purchase_order_no))
                                                            <tr>
                                                                <th class="ps-0 col-md-3" scope="row">@lang('Initial Purchase Order No')</th>
                                                                <td class="text-muted">{{ $company->initial_purchase_order_no }}</td>
                                                            </tr>
                                                        @endif
                                                        @if (isset($company->purchase_order_prefix))
                                                            <tr>
                                                                <th class="ps-0 col-md-3" scope="row">@lang('Purchase Order Prefix')</th>
                                                                <td class="text-muted">{{ $company->purchase_order_prefix }}</td>
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
                                            <h5 class="fs-14 text-truncate mb-1"><b>@lang('Requisition Setup')</b></h5>
                                        </div>
                                        <div class="card-body p-4">
                                            <div class="table-responsive">
                                                <table class="table table-borderless mb-0">
                                                    <tbody>
                                                        @if (isset($company->initial_requisition_no))
                                                            <tr>
                                                                <th class="ps-0 col-md-3" scope="row">@lang('Initial Requisition No')</th>
                                                                <td class="text-muted">{{ $company->initial_requisition_no }}</td>
                                                            </tr>
                                                        @endif
                                                        @if (isset($company->requisition_prefix))
                                                            <tr>
                                                                <th class="ps-0 col-md-3" scope="row">@lang('Requisition Prefix')</th>
                                                                <td class="text-muted">{{ $company->requisition_prefix }}</td>
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
                                            <h5 class="fs-14 text-truncate mb-1"><b>@lang('Vendor Setup')</b></h5>
                                        </div>
                                        <div class="card-body p-4">
                                            <div class="table-responsive">
                                                <table class="table table-borderless mb-0">
                                                    <tbody>
                                                        @if (isset($company->initial_vendor_no))
                                                            <tr>
                                                                <th class="ps-0 col-md-3" scope="row">@lang('Initial Vendor No')</th>
                                                                <td class="text-muted">{{ $company->initial_vendor_no }}</td>
                                                            </tr>
                                                        @endif
                                                        @if (isset($company->vendor_prefix))
                                                            <tr>
                                                                <th class="ps-0 col-md-3" scope="row">@lang('Vendor Prefix')</th>
                                                                <td class="text-muted">{{ $company->vendor_prefix }}</td>
                                                            </tr>
                                                        @endif
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="inventoryTab" role="tabpanel">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <div class="card profile-project-card profile-project-success mb-0">
                                        <div class="card-header">
                                            <h5 class="fs-14 text-truncate mb-1"><b>@lang('Default Warehouse')</b></h5>
                                        </div>
                                        <div class="card-body p-4">
                                            <div class="table-responsive">
                                                <table class="table table-borderless mb-0">
                                                    <tbody>
                                                        @if (isset($company->warehouse_general) || isset($company->warehouse_general_bin))
                                                            <tr>
                                                                @if (isset($company->warehouse_general))
                                                                    <th class="ps-0 col-md-2" scope="row">@lang('General')</th>
                                                                    <td class="col-md-4 text-muted">{{ $company->warehouse_general }}</td>
                                                                @endif
                                                                @if (isset($company->warehouse_general_bin))
                                                                    <th class="ps-0 col-md-2" scope="row">@lang('Bin')</th>
                                                                    <td class="col-md-4 text-muted">{{ $company->warehouse_general_bin }}</td>
                                                                @endif
                                                            </tr>
                                                        @endif
                                                        @if (isset($company->warehouse_receiving) || isset($company->warehouse_general_bin))
                                                            <tr>
                                                                @if (isset($company->warehouse_receiving))
                                                                    <th class="ps-0 col-md-2" scope="row">@lang('Receiving')</th>
                                                                    <td class="col-md-4 text-muted">{{ $company->warehouse_receiving }}</td>
                                                                @endif
                                                                @if (isset($company->warehouse_receiving_bin))
                                                                    <th class="ps-0 col-md-2" scope="row">@lang('Bin')</th>
                                                                    <td class="col-md-4 text-muted">{{ $company->warehouse_receiving_bin }}</td>
                                                                @endif
                                                            </tr>
                                                        @endif
                                                        @if (isset($company->warehouse_shipping) || isset($company->warehouse_general_bin))
                                                            <tr>
                                                                @if (isset($company->warehouse_shipping))
                                                                    <th class="ps-0 col-md-2" scope="row">@lang('Shipping')</th>
                                                                    <td class="col-md-4 text-muted">{{ $company->warehouse_shipping }}</td>
                                                                @endif
                                                                @if (isset($company->warehouse_shipping_bin))
                                                                    <th class="ps-0 col-md-2" scope="row">@lang('Bin')</th>
                                                                    <td class="col-md-4 text-muted">{{ $company->warehouse_shipping_bin }}</td>
                                                                @endif
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
                                            <h5 class="fs-14 text-truncate mb-1"><b>@lang('Default Plant Settings')</b></h5>
                                        </div>
                                        <div class="card-body p-4">
                                            <div class="table-responsive">
                                                <table class="table table-borderless mb-0">
                                                    <tbody>
                                                        @if (isset($company->default_plant))
                                                            <tr>
                                                                <th class="ps-0 col-md-3" scope="row">@lang('Default Plant')</th>
                                                                <td class="text-muted">{{ $company->default_plant }}</td>
                                                            </tr>
                                                        @endif
                                                        @if (isset($company->costing_method))
                                                            <tr>
                                                                <th class="ps-0 col-md-3" scope="row">@lang('Costing Method')</th>
                                                                <td class="text-muted">{{ $company->costing_method }}</td>
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
                                            <h5 class="fs-14 text-truncate mb-1"><b>@lang('Transfer Orders')</b></h5>
                                        </div>
                                        <div class="card-body p-4">
                                            <div class="table-responsive">
                                                <table class="table table-borderless mb-0">
                                                    <tbody>
                                                        @if (isset($company->initial_transfer_order_no))
                                                            <tr>
                                                                <th class="ps-0 col-md-3" scope="row">@lang('Initial Transfer Order No')</th>
                                                                <td class="text-muted">{{ $company->initial_transfer_order_no }}</td>
                                                            </tr>
                                                        @endif
                                                        @if (isset($company->transfer_order_prefix))
                                                            <tr>
                                                                <th class="ps-0 col-md-3" scope="row">@lang('Transfer Order Prefix')</th>
                                                                <td class="text-muted">{{ $company->transfer_order_prefix }}</td>
                                                            </tr>
                                                        @endif
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="logisticTab" role="tabpanel">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <div class="card profile-project-card profile-project-success mb-0">
                                        <div class="card-header">
                                            <h5 class="fs-14 text-truncate mb-1"><b>@lang('Shipping Setup')</b></h5>
                                        </div>
                                        <div class="card-body p-4">
                                            <div class="table-responsive">
                                                <table class="table table-borderless mb-0">
                                                    <tbody>
                                                        @if (isset($company->initial_packing_slip_no))
                                                            <tr>
                                                                <th class="ps-0 col-md-3" scope="row">@lang('Initial Packing Slip No')</th>
                                                                <td class="text-muted">{{ $company->initial_packing_slip_no }}</td>
                                                            </tr>
                                                        @endif
                                                        @if (isset($company->pack_slip_prefix))
                                                            <tr>
                                                                <th class="ps-0 col-md-3" scope="row">@lang('Pack Slip Prefix')</th>
                                                                <td class="text-muted">{{ $company->pack_slip_prefix }}</td>
                                                            </tr>
                                                        @endif
                                                        @if (isset($company->initial_bol_no))
                                                            <tr>
                                                                <th class="ps-0 col-md-3" scope="row">@lang('Initial BOL No')</th>
                                                                <td class="text-muted">{{ $company->initial_bol_no }}</td>
                                                            </tr>
                                                        @endif
                                                        @if (isset($company->bol_prefix))
                                                            <tr>
                                                                <th class="ps-0 col-md-3" scope="row">@lang('BOL Prefix')</th>
                                                                <td class="text-muted">{{ $company->bol_prefix }}</td>
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
                                            <h5 class="fs-14 text-truncate mb-1"><b>@lang('Default Shipping')</b></h5>
                                        </div>
                                        <div class="card-body p-4">
                                            <div class="table-responsive">
                                                <table class="table table-borderless mb-0">
                                                    <tbody>
                                                        @if (isset($company->ship_via))
                                                            <tr>
                                                                <th class="ps-0 col-md-3" scope="row">@lang('Ship Via')</th>
                                                                <td class="text-muted">{{ $company->ship_via }}</td>
                                                            </tr>
                                                        @endif
                                                        @if (isset($company->fob))
                                                            <tr>
                                                                <th class="ps-0 col-md-3" scope="row">@lang('FOB')</th>
                                                                <td class="text-muted">{{ $company->fob }}</td>
                                                            </tr>
                                                        @endif
                                                        @if (isset($company->misc_freight))
                                                            <tr>
                                                                <th class="ps-0 col-md-3" scope="row">@lang('Misc Freight')</th>
                                                                <td class="text-muted">{{ $company->misc_freight }}</td>
                                                            </tr>
                                                        @endif
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="productionTab" role="tabpanel">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <div class="card profile-project-card profile-project-success mb-0">
                                        <div class="card-header">
                                            <h5 class="fs-14 text-truncate mb-1"><b>@lang('Job Setup')</b></h5>
                                        </div>
                                        <div class="card-body p-4">
                                            <div class="table-responsive">
                                                <table class="table table-borderless mb-0">
                                                    <tbody>
                                                        @if (isset($company->initial_job_no))
                                                            <tr>
                                                                <th class="ps-0 col-md-3" scope="row">@lang('Initial Job No')</th>
                                                                <td class="text-muted">{{ $company->initial_job_no }}</td>
                                                            </tr>
                                                        @endif
                                                        @if (isset($company->job_prefix))
                                                            <tr>
                                                                <th class="ps-0 col-md-3" scope="row">@lang('Job Prefix')</th>
                                                                <td class="text-muted">{{ $company->job_prefix }}</td>
                                                            </tr>
                                                        @endif
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="serviceTab" role="tabpanel">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <div class="card profile-project-card profile-project-success mb-0">
                                        <div class="card-header">
                                            <h5 class="fs-14 text-truncate mb-1"><b>@lang('Service Setup')</b></h5>
                                        </div>
                                        <div class="card-body p-4">
                                            <div class="table-responsive">
                                                <table class="table table-borderless mb-0">
                                                    <tbody>
                                                        @if (isset($company->initial_service_job_no))
                                                            <tr>
                                                                <th class="ps-0 col-md-3" scope="row">@lang('Initial Service Job No')</th>
                                                                <td class="text-muted">{{ $company->initial_service_job_no }}</td>
                                                            </tr>
                                                        @endif
                                                        @if (isset($company->service_job_prefix))
                                                            <tr>
                                                                <th class="ps-0 col-md-3" scope="row">@lang('Service Job Prefix')</th>
                                                                <td class="text-muted">{{ $company->service_job_prefix }}</td>
                                                            </tr>
                                                        @endif
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="projectTab" role="tabpanel">
                        </div>
                        <div class="tab-pane" id="humanResourceTab" role="tabpanel">
                        </div>
                        <div class="tab-pane" id="financeTab" role="tabpanel">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <div class="card profile-project-card profile-project-success mb-0">
                                        <div class="card-header">
                                            <h5 class="fs-14 text-truncate mb-1"><b>@lang('Accounts Recivable Setup')</b></h5>
                                        </div>
                                        <div class="card-body p-4">
                                            <div class="table-responsive">
                                                <table class="table table-borderless mb-0">
                                                    <tbody>
                                                        @if (isset($company->initial_ar_no))
                                                            <tr>
                                                                <th class="ps-0 col-md-3" scope="row">@lang('Initial AR No')</th>
                                                                <td class="text-muted">{{ $company->initial_ar_no }}</td>
                                                            </tr>
                                                        @endif
                                                        @if (isset($company->ar_prefix))
                                                            <tr>
                                                                <th class="ps-0 col-md-3" scope="row">@lang('AR Prefix')</th>
                                                                <td class="text-muted">{{ $company->ar_prefix }}</td>
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
                                            <h5 class="fs-14 text-truncate mb-1"><b>@lang('Accounts Payable Setup')</b></h5>
                                        </div>
                                        <div class="card-body p-4">
                                            <div class="table-responsive">
                                                <table class="table table-borderless mb-0">
                                                    <tbody>
                                                        @if (isset($company->initial_ap_no))
                                                            <tr>
                                                                <th class="ps-0 col-md-3" scope="row">@lang('Initial AP No')</th>
                                                                <td class="text-muted">{{ $company->initial_ap_no }}</td>
                                                            </tr>
                                                        @endif
                                                        @if (isset($company->ap_prefix))
                                                            <tr>
                                                                <th class="ps-0 col-md-3" scope="row">@lang('AP Prefix')</th>
                                                                <td class="text-muted">{{ $company->ap_prefix }}</td>
                                                            </tr>
                                                        @endif
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
