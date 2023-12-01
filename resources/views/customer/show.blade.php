@extends('layouts.master')
@section('title')
    @lang('Customer')
@endsection
@section('content')
    @component('components.breadcrumb')
        @slot('li_1')
            @lang('Customer')
        @endslot
        @slot('title')
            @lang('Show Customer')
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
                            <a class="nav-link active" data-bs-toggle="tab" href="#customerInfoTab" role="tab">
                                <i class="fas fa-home"></i>
                                @lang('Customer')
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#shippingInfoTab" role="tab">
                                <i class="far fa-user"></i>
                                @lang('Customer & Shipping Info')
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#billingInfoTab" role="tab">
                                <i class="far fa-user"></i>
                                @lang('Billing Info')
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#contactInfoTab" role="tab">
                                <i class="far fa-user"></i>
                                @lang('Contact & Primary Info')
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="card-body p-4">
                    <div class="tab-content">
                        <div class="tab-pane active" id="customerInfoTab" role="tabpanel">
                            <div class="row">
                                <div class="col-xxl-3">
                                    <div class="card-body p-4">
                                        <div class="text-center">
                                            <div class="profile-user position-relative d-inline-block mx-auto  mb-4">
                                                <img src="@if ($customer->logo != '') {{ asset($customer->logo) }}@else{{ URL::asset('assets/images/users/user.png') }} @endif" class="rounded-circle avatar-xl img-thumbnail user-profile-image  shadow" alt="user-profile-image">
                                            </div>
                                            @if(isset($customer->name))
                                            <h5 class="fs-16 mb-1">{{ $customer->name }}</h5>
                                            @endif
                                            @if(isset($customer->address_one) && !empty($customer->address_one))
                                            <p class="text-muted mb-0">{{ $customer->address_one }} @if(isset($customer->address_two) && !empty($customer->address_two)) {{ ", ".$customer->address_two }} @endif</p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xxl-9">
                                    <table class="table table-borderless mb-0">
                                        <tbody>
                                            @if(isset($customer->phone))
                                                <tr>
                                                    <th class="ps-0 col-md-3" scope="row">@lang('Phone')</th>
                                                    <td class="text-muted">{{ $customer->phone }}</td>
                                                </tr>
                                            @endif
                                            @if(isset($customer->email))
                                                <tr>
                                                    <th class="ps-0 col-md-3" scope="row">@lang('Email')</th>
                                                    <td class="text-muted">{{ $customer->email }}</td>
                                                </tr>
                                            @endif
                                        </tbody>
                                    </table>
                                    <br>
                                    <div class="table-responsive">
                                        <div class="swiper-wrapper">
                                            <div class="swiper-slide">
                                                <div class="card profile-project-card profile-project-info mb-0">
                                                    <div class="card-header">
                                                        <h5 class="fs-14 text-truncate mb-1"><b>@lang('Summary')</b></h5>
                                                    </div>
                                                    <div class="card-body p-4">
                                                        <div class="table-responsive">
                                                            <table class="table table-borderless mb-0">
                                                                <tbody>
                                                                    <tr class="table-success">
                                                                        <th class="ps-0 col-md-4 text-center" scope="row">@lang('Total Sales')</th>
                                                                        <td class="text-muted">{{ "$ 150000.00" }}</td>
                                                                    </tr>
                                                                    <tr class="table-danger">
                                                                        <th class="ps-0 col-md-4 text-center" scope="row">@lang('Total Discounts')</th>
                                                                        <td class="text-muted">{{ "$ 4500.00" }}</td>
                                                                    </tr>
                                                                    <tr class="table-secondary">
                                                                        <th class="ps-0 col-md-4 text-center" scope="row">@lang('Total Payments')</th>
                                                                        <td class="text-muted">{{ "$ 76000.00" }}</td>
                                                                    </tr>
                                                                    <tr class="table-warning">
                                                                        <th class="ps-0 col-md-4 text-center" scope="row">@lang('Total Due')</th>
                                                                        <td class="text-muted">{{ "$ 85000.00" }}</td>
                                                                    </tr>
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
                            <br>
                            <div class="row">
                                <div class="col-xxl-3 d-grid">
                                    <input type="submit" value="@lang('View Quotes')" class="btn btn-warning"/>
                                </div>
                                <div class="col-xxl-3 d-grid">
                                    <input type="submit" value="@lang('View Orders')" class="btn btn-primary"/>
                                </div>
                                <div class="col-xxl-3 d-grid">
                                    <input type="submit" value="@lang('Views Invoices')" class="btn btn-info"/>
                                </div>
                                <div class="col-xxl-3 d-grid">
                                    <input type="submit" value="@lang('Account Statement')" class="btn btn-success"/>
                                </div>
                                
                            </div>
                        </div>
                        <div class="tab-pane" id="shippingInfoTab" role="tabpanel">
                            <div class="table-responsive">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <div class="card profile-project-card profile-project-success mb-0">
                                            <div class="card-header">
                                                <h5 class="fs-14 text-truncate mb-1"><b>@lang('Customer Info')</b></h5>
                                            </div>
                                            <div class="card-body p-4">
                                                <div class="table-responsive">
                                                    <table class="table table-borderless mb-0">
                                                        <tbody>
                                                            @if (isset($customer->name))
                                                            <tr>
                                                                <th class="ps-0 col-md-4" scope="row">@lang('Customer Name')</th>
                                                                <td class="text-muted">{{ $customer->name }}</td>
                                                            </tr>
                                                            @endif
                                                            @if (isset($customer->address_one))
                                                            <tr>
                                                                <th class="ps-0 col-md-4" scope="row">@lang('Address One')</th>
                                                                <td class="text-muted">{{ $customer->address_one }}</td>
                                                            </tr>
                                                            @endif
                                                            @if (isset($customer->address_two))
                                                            <tr>
                                                                <th class="ps-0 col-md-4" scope="row">@lang('Address Two')</th>
                                                                <td class="text-muted">{{ $customer->address_two }}</td>
                                                            </tr>
                                                            @endif
                                                            @if(isset($customer->country))
                                                                <tr>
                                                                    <th class="ps-0 col-md-4" scope="row">@lang('Country')</th>
                                                                    <td class="text-muted">{{ $countryName->name }}</td>
                                                                </tr>
                                                            @endif
                                                            @if(isset($customer->state))
                                                                <tr>
                                                                    <th class="ps-0 col-md-4" scope="row">@lang('State')</th>
                                                                    <td class="text-muted">{{ $stateName->name }}</td>
                                                                </tr>
                                                            @endif
                                                            @if(isset($customer->city))
                                                                <tr>
                                                                    <th class="ps-0 col-md-4" scope="row">@lang('City')</th>
                                                                    <td class="text-muted">{{ $cityName->name }}</td>
                                                                </tr>
                                                            @endif
                                                            @if(isset($customer->zip_code))
                                                                <tr>
                                                                    <th class="ps-0 col-md-4" scope="row">@lang('Zip Code')</th>
                                                                    <td class="text-muted">{{ $customer->zip_code }}</td>
                                                                </tr>
                                                            @endif
                                                            
                                                            @if(isset($customer->fax))
                                                                <tr>
                                                                    <th class="ps-0 col-md-4" scope="row">@lang('Fax')</th>
                                                                    <td class="text-muted">{{ $customer->fax }}</td>
                                                                </tr>
                                                            @endif
                                                            @if(isset($customer->url))
                                                                <tr>
                                                                    <th class="ps-0 col-md-4" scope="row">@lang('Url')</th>
                                                                    <td class="text-muted">{{ $customer->url }}</td>
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
                            <br>
                            <div class="table-responsive">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <div class="card profile-project-card profile-project-success mb-0">
                                            <div class="card-header">
                                                <h5 class="fs-14 text-truncate mb-1"><b>@lang('Shipping Info')</b></h5>
                                            </div>
                                            <div class="card-body p-4">
                                                <div class="table-responsive">
                                                    <table class="table table-borderless mb-0">
                                                        <tbody>
                                                            @if (isset($customer->ship_address_one))
                                                            <tr>
                                                                <th class="ps-0 col-md-4" scope="row">@lang('Address One')</th>
                                                                <td class="text-muted">{{ $customer->ship_address_one }}</td>
                                                            </tr>
                                                            @endif
                                                            @if (isset($customer->ship_address_two))
                                                            <tr>
                                                                <th class="ps-0 col-md-4" scope="row">@lang('Address Two')</th>
                                                                <td class="text-muted">{{ $customer->ship_address_two }}</td>
                                                            </tr>
                                                            @endif
                                                            @if(isset($customer->ship_country))
                                                                <tr>
                                                                    <th class="ps-0 col-md-4" scope="row">@lang('Country')</th>
                                                                    <td class="text-muted">{{ $shipCountryName->name }}</td>
                                                                </tr>
                                                            @endif
                                                            @if(isset($customer->ship_city))
                                                                <tr>
                                                                    <th class="ps-0 col-md-4" scope="row">@lang('State')</th>
                                                                    <td class="text-muted">{{ $shipCityName->name }}</td>
                                                                </tr>
                                                            @endif
                                                            @if(isset($customer->ship_state))
                                                                <tr>
                                                                    <th class="ps-0 col-md-4" scope="row">@lang('State')</th>
                                                                    <td class="text-muted">{{ $shipStateName->name }}</td>
                                                                </tr>
                                                            @endif
                                                            @if(isset($customer->ship_zip_code))
                                                                <tr>
                                                                    <th class="ps-0 col-md-4" scope="row">@lang('Zip Code')</th>
                                                                    <td class="text-muted">{{ $customer->ship_zip_code }}</td>
                                                                </tr>
                                                            @endif
                                                            @if(isset($customer->ship_phone))
                                                                <tr>
                                                                    <th class="ps-0 col-md-4" scope="row">@lang('Phone')</th>
                                                                    <td class="text-muted">{{ $customer->ship_phone }}</td>
                                                                </tr>
                                                            @endif
                                                            @if(isset($customer->ship_fax))
                                                                <tr>
                                                                    <th class="ps-0 col-md-4" scope="row">@lang('Fax')</th>
                                                                    <td class="text-muted">{{ $customer->ship_fax }}</td>
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
                        <div class="tab-pane" id="billingInfoTab" role="tabpanel">
                            <div class="table-responsive">
                                <table class="table table-borderless mb-0">
                                    <tbody>
                                        @if(isset($customer->bill_currency_id))
                                            <tr>
                                                <th class="ps-0 col-md-4" scope="row">@lang('Currency')</th>
                                                <td class="text-muted">{{ $currencies[$customer->bill_currency_id]['name'] }}</td>
                                            </tr>
                                        @endif
                                        @if(isset($customer->bill_customer_group_id))
                                        <tr>
                                            <th class="ps-0 col-md-4" scope="row">@lang('Customer Group')</th>
                                            <td class="text-muted">{{ $customerGroupList[$customer->bill_customer_group_id] }}</td>
                                        </tr>
                                        @endif
                                        @if(isset($customer->bill_payment_method_id))
                                        <tr>
                                            <th class="ps-0 col-md-4" scope="row">@lang('Payment Method')</th>
                                            <td class="text-muted">{{ ucfirst($customer->bill_payment_method_id) }}</td>
                                        </tr>
                                        @endif
                                        @if(isset($customer->bill_terms_type))
                                        <tr>
                                            <th class="ps-0 col-md-4" scope="row">@lang('Federal ID')</th>
                                            <td class="text-muted">{{ ucfirst($customer->bill_terms_type) }}</td>
                                        </tr>
                                        @endif
                                        @if(isset($customer->bill_terms_id))
                                            <tr>
                                                <th class="ps-0 col-md-4" scope="row">@lang('Terms')</th>
                                                <td class="text-muted">{{ ucwords(str_replace("_", " ",$customer->bill_terms_id)) }}</td>
                                            </tr>
                                        @endif
                                        @if(isset($customer->bill_terms_type))
                                            <tr>
                                                <th class="ps-0 col-md-4" scope="row">@lang('Term Type')</th>
                                                <td class="text-muted">{{ $customer->bill_terms_type }}</td>
                                            </tr>
                                        @endif
                                        @if(isset($customer->bill_ship_via))
                                            <tr>
                                                <th class="ps-0 col-md-4" scope="row">@lang('Ship Via')</th>
                                                <td class="text-muted">{{ $customer->bill_ship_via }}</td>
                                            </tr>
                                        @endif
                                        @if(isset($customer->bill_fob))
                                            <tr>
                                                <th class="ps-0 col-md-4" scope="row">@lang('FOB')</th>
                                                <td class="text-muted">{{ $customer->bill_fob }}</td>
                                            </tr>
                                        @endif
                                        @if(isset($customer->bill_tax_id))
                                            <tr>
                                                <th class="ps-0 col-md-4" scope="row">@lang('Tax ID')</th>
                                                <td class="text-muted">{{ $customer->bill_tax_id }}</td>
                                            </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane" id="contactInfoTab" role="tabpanel">
                            <div class="table-responsive">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <div class="card profile-project-card profile-project-success mb-0">
                                            <div class="card-header">
                                                <h5 class="fs-14 text-truncate mb-1"><b>@lang('Contact Info')</b></h5>
                                            </div>
                                            <div class="card-body p-4">
                                                <div class="table-responsive">
                                                    <table class="table table-borderless mb-0">
                                                        <tbody>
                                                            @if(isset($customer->contact_name))
                                                                <tr>
                                                                    <th class="ps-0 col-md-4" scope="row">@lang('Name')</th>
                                                                    <td class="text-muted">{{ $customer->contact_name }}</td>
                                                                </tr>
                                                            @endif
                                                            @if(isset($customer->contact_title))
                                                                <tr>
                                                                    <th class="ps-0 col-md-4" scope="row">@lang('Title')</th>
                                                                    <td class="text-muted">{{ $customer->contact_title }}</td>
                                                                </tr>
                                                            @endif
                                                            @if(isset($customer->contact_email))
                                                                <tr>
                                                                    <th class="ps-0 col-md-4" scope="row">@lang('Email')</th>
                                                                    <td class="text-muted">{{ $customer->contact_email }}</td>
                                                                </tr>
                                                            @endif
                                                            @if(isset($customer->contact_phone))
                                                                <tr>
                                                                    <th class="ps-0 col-md-4" scope="row">@lang('Phone')</th>
                                                                    <td class="text-muted">{{ $customer->contact_phone }}</td>
                                                                </tr>
                                                            @endif
                                                            @if(isset($customer->contact_cell_phone))
                                                                <tr>
                                                                    <th class="ps-0 col-md-4" scope="row">@lang('Phone')</th>
                                                                    <td class="text-muted">{{ $customer->contact_cell_phone }}</td>
                                                                </tr>
                                                            @endif
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <div class="card profile-project-card profile-project-success mb-0">
                                            <div class="card-header">
                                                <h5 class="fs-14 text-truncate mb-1"><b>@lang('Primary Info')</b></h5>
                                            </div>
                                            <div class="card-body p-4">
                                                <div class="table-responsive">
                                                    <table class="table table-borderless mb-0">
                                                        <tbody>
                                                            <tr>
                                                                <th class="ps-0 col-md-4" scope="row">@lang('Billing')</th>
                                                                @if(isset($customer->billing) && $customer->billing == 1)
                                                                    <td class="text-muted">{{ "Enable" }}</td>
                                                                @else
                                                                    <td class="text-muted">{{ "Disable" }}</td>
                                                                @endif
                                                            </tr>
                                                            <tr>
                                                                <th class="ps-0 col-md-4" scope="row">@lang('Purchasing')</th>
                                                                @if(isset($customer->purchasing) && $customer->purchasing == 1)
                                                                    <td class="text-muted">{{ "Enable" }}</td>
                                                                @else
                                                                    <td class="text-muted">{{ "Disable" }}</td>
                                                                @endif
                                                            </tr>
                                                            <tr>
                                                                <th class="ps-0 col-md-4" scope="row">@lang('Shipping')</th>
                                                                @if(isset($customer->shipping) && $customer->shipping == 1)
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