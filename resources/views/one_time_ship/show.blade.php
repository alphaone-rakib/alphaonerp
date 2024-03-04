@extends('layouts.master')
@section('title')
    @lang('One Time Ship To')
@endsection
@section('content')
    @component('components.breadcrumb')
        @slot('li_1')
            @lang('One Time Ship To')
        @endslot
        @slot('title')
            @lang('Show One Time Ship To')
        @endslot
    @endcomponent
    {{-- <div class="position-relative mx-n4 mt-n4">
        <div class="profile-wid-bg profile-setting-img">
            <img src="{{ URL::asset('assets/images/profile-bg.jpg') }}" class="profile-wid-img" alt="">
        </div>
    </div> --}}
    <div class="row">
        <div class="col-xxl-12">
            <div class="card mt-xxl-n5">
                <div class="card-body p-4">
                    <div class="table-responsive">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div class="card profile-project-card profile-project-success mb-0">
                                    <div class="card-header">
                                        <h5 class="fs-14 text-truncate mb-1"><b>@lang('One Time Ship To Info')</b></h5>
                                    </div>
                                    <div class="card-body p-4">
                                        <div class="table-responsive">
                                            <table class="table table-borderless mb-0">
                                                <tbody>
                                                    @if (isset($oneTimeShipTo->contact))
                                                    <tr>
                                                        <th class="ps-0 col-md-4" scope="row">@lang('Contact')</th>
                                                        <td class="text-muted">{{ $oneTimeShipTo->contact }}</td>
                                                    </tr>
                                                    @endif
                                                    @if (isset($oneTimeShipTo->name))
                                                        <tr>
                                                            <th class="ps-0 col-md-4" scope="row">@lang('Name')</th>
                                                            <td class="text-muted">{{ $oneTimeShipTo->name }}</td>
                                                        {{-- </tr> --}}
                                                    @endif
                                                    @if (isset($oneTimeShipTo->save_as))
                                                        {{-- <tr> --}}
                                                            <th class="ps-0 col-md-4" scope="row">@lang('Save As')</th>
                                                            <td class="text-muted">{{ $oneTimeShipTo->save_as }}</td>
                                                        </tr>
                                                    @endif
                                                    @if (isset($oneTimeShipTo->address_one))
                                                    <tr>
                                                        <th class="ps-0 col-md-4" scope="row">@lang('Address One')</th>
                                                        <td class="text-muted">{{ $oneTimeShipTo->address_one }}</td>
                                                    {{-- </tr> --}}
                                                    @endif
                                                    @if (isset($oneTimeShipTo->address_two))
                                                    {{-- <tr> --}}
                                                        <th class="ps-0 col-md-4" scope="row">@lang('Address Two')</th>
                                                        <td class="text-muted">{{ $oneTimeShipTo->address_two }}</td>
                                                    </tr>
                                                    @endif
                                                    @if (isset($oneTimeShipTo->customer_id))
                                                    <tr>
                                                        <th class="ps-0 col-md-4" scope="row">@lang('Customer')</th>
                                                        <td class="text-muted">{{ $oneTimeShipTo->customer->name }}</td>
                                                    {{-- </tr> --}}
                                                    @endif
                                                    @if (isset($oneTimeShipTo->ship_to))
                                                    {{-- <tr> --}}
                                                        <th class="ps-0 col-md-4" scope="row">@lang('Ship To')</th>
                                                        <td class="text-muted">{{ $oneTimeShipTo->ship_to }}</td>
                                                    </tr>
                                                    @endif
                                                    @if (isset($oneTimeShipTo->country))
                                                    <tr>
                                                        <th class="ps-0 col-md-4" scope="row">@lang('Country')</th>
                                                        <td class="text-muted">{{ ($countryName->name) ? $countryName->name : '' }}</td>
                                                    {{-- </tr> --}}
                                                    @endif
                                                    @if (isset($oneTimeShipTo->state))
                                                    {{-- <tr> --}}
                                                        <th class="ps-0 col-md-4" scope="row">@lang('State')</th>
                                                        <td class="text-muted">{{ ($stateName->name) ? $stateName->name : '' }}</td>
                                                    </tr>
                                                    @endif
                                                    @if (isset($oneTimeShipTo->city))
                                                    <tr>
                                                        <th class="ps-0 col-md-4" scope="row">@lang('City')</th>
                                                        <td class="text-muted">{{ ($cityName->name) ? $cityName->name : '' }}</td>
                                                    {{-- </tr> --}}
                                                    @endif
                                                    @if (isset($oneTimeShipTo->postal_code))
                                                    {{-- <tr> --}}
                                                        <th class="ps-0 col-md-4" scope="row">@lang('Postal Code')</th>
                                                        <td class="text-muted">{{ $oneTimeShipTo->postal_code }}</td>
                                                    </tr>
                                                    @endif
                                                    @if (isset($oneTimeShipTo->phone))
                                                    <tr>
                                                        <th class="ps-0 col-md-4" scope="row">@lang('Phone')</th>
                                                        <td class="text-muted">{{ $oneTimeShipTo->phone }}</td>
                                                    {{-- </tr> --}}
                                                    @endif
                                                    @if (isset($oneTimeShipTo->fax))
                                                    {{-- <tr> --}}
                                                        <th class="ps-0 col-md-4" scope="row">@lang('Fax')</th>
                                                        <td class="text-muted">{{ $oneTimeShipTo->fax }}</td>
                                                    </tr>
                                                    @endif
                                                    @if (isset($oneTimeShipTo->tax_id))
                                                    <tr>
                                                        <th class="ps-0 col-md-4" scope="row">@lang('Tax Id')</th>
                                                        <td class="text-muted">{{ $oneTimeShipTo->tax_id }}</td>
                                                    {{-- </tr> --}}
                                                    @endif
                                                    @if (isset($oneTimeShipTo->tax_liability))
                                                    {{-- <tr> --}}
                                                        <th class="ps-0 col-md-4" scope="row">@lang('Tax Liability')</th>
                                                        <td class="text-muted">{{ $oneTimeShipTo->tax_liability }}</td>
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

@endsection

@section('script')
    <script src="{{ URL::asset('assets/js/app.min.js') }}"></script>
@endsection