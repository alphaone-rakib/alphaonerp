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
                                @lang('Customer info')
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#shippingInfoTab" role="tab">
                                <i class="far fa-user"></i>
                                @lang('Shipping Info')
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
                                @lang('Contact Info')
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#primaryInfoTab" role="tab">
                                <i class="far fa-user"></i>
                                @lang('Primary Info')
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="card-body p-4">
                    <div class="tab-content">
                        <div class="tab-pane active" id="customerInfoTab" role="tabpanel">
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
                                        @if(isset($customer->phone))
                                            <tr>
                                                <th class="ps-0 col-md-4" scope="row">@lang('Phone')</th>
                                                <td class="text-muted">{{ $customer->phone }}</td>
                                            </tr>
                                        @endif
                                        @if(isset($customer->fax))
                                            <tr>
                                                <th class="ps-0 col-md-4" scope="row">@lang('Fax')</th>
                                                <td class="text-muted">{{ $customer->fax }}</td>
                                            </tr>
                                        @endif
                                        @if(isset($customer->email))
                                            <tr>
                                                <th class="ps-0 col-md-4" scope="row">@lang('Email')</th>
                                                <td class="text-muted">{{ $customer->email }}</td>
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
                        <div class="tab-pane" id="shippingInfoTab" role="tabpanel">
                            <div class="table-responsive">
                                <table class="table table-borderless mb-0">
                                    <tbody>
                                        @if (isset($customer->ship_address_one))
                                        <tr>
                                            <th class="ps-0 col-md-4" scope="row">@lang('Ship Address One')</th>
                                            <td class="text-muted">{{ $customer->ship_address_one }}</td>
                                        </tr>
                                        @endif
                                        @if (isset($customer->ship_address_two))
                                        <tr>
                                            <th class="ps-0 col-md-4" scope="row">@lang('Ship Address Two')</th>
                                            <td class="text-muted">{{ $customer->ship_address_two }}</td>
                                        </tr>
                                        @endif
                                        @if(isset($customer->ship_country))
                                            <tr>
                                                <th class="ps-0 col-md-4" scope="row">@lang('Ship Country')</th>
                                                <td class="text-muted">{{ $shipCountryName->name }}</td>
                                            </tr>
                                        @endif
                                        @if(isset($customer->ship_city))
                                            <tr>
                                                <th class="ps-0 col-md-4" scope="row">@lang('Ship State')</th>
                                                <td class="text-muted">{{ $shipCityName->name }}</td>
                                            </tr>
                                        @endif
                                        @if(isset($customer->ship_state))
                                            <tr>
                                                <th class="ps-0 col-md-4" scope="row">@lang('Ship State')</th>
                                                <td class="text-muted">{{ $shipStateName->name }}</td>
                                            </tr>
                                        @endif
                                        @if(isset($customer->ship_zip_code))
                                            <tr>
                                                <th class="ps-0 col-md-4" scope="row">@lang('Ship Zip Code')</th>
                                                <td class="text-muted">{{ $customer->ship_zip_code }}</td>
                                            </tr>
                                        @endif
                                        @if(isset($customer->ship_phone))
                                            <tr>
                                                <th class="ps-0 col-md-4" scope="row">@lang('Ship Phone')</th>
                                                <td class="text-muted">{{ $customer->ship_phone }}</td>
                                            </tr>
                                        @endif
                                        @if(isset($customer->ship_fax))
                                            <tr>
                                                <th class="ps-0 col-md-4" scope="row">@lang('Ship Fax')</th>
                                                <td class="text-muted">{{ $customer->ship_fax }}</td>
                                            </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane" id="billingInfoTab" role="tabpanel">
                            <div class="table-responsive">
                                <table class="table table-borderless mb-0">
                                    <tbody>
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
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
    
    @section('script')
        <script src="{{ URL::asset('assets/js/app.min.js') }}"></script>
    @endsection