@extends('layouts.master')
@section('title') @lang('Company')  @endsection
@section('content')
    @component('components.breadcrumb')
        @slot('li_1') @lang('Company') @endslot
        @slot('title') @lang('Show Company')  @endslot
    @endcomponent
    <div class="position-relative mx-n4 mt-n4">
        <div class="profile-wid-bg profile-setting-img">
            <img src="{{ URL::asset('assets/images/profile-bg.jpg') }}" class="profile-wid-img" alt="">
        </div>
    </div>
    <div class="row">
        <div class="col-xxl-3">
            <div class="card mt-n5">
                <div class="card-body p-4">
                    <div class="text-center">
                        <div class="profile-user position-relative d-inline-block mx-auto  mb-4">
                            <img src="@if (Auth::user()->avatar != '') {{ URL::asset('images/' . Auth::user()->avatar) }}@else{{ URL::asset('assets/images/users/avatar-1.jpg') }} @endif"
                                class="rounded-circle avatar-xl img-thumbnail user-profile-image  shadow"
                                alt="user-profile-image">

                        </div>
                        <h5 class="fs-16 mb-1">{{ $company->name }}</h5>
                        <p class="text-muted mb-0">Phone :  {{ $company->phone }}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xxl-9">
            <div class="card mt-xxl-n5">
                <div class="card-header">
                    <ul class="nav nav-tabs-custom rounded card-header-tabs border-bottom-0" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-bs-toggle="tab" href="#basicInformationDetails" role="tab">
                                <i class="fas fa-home"></i>
                                Basic Information
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#baseCurrencyDetails" role="tab">
                                <i class="far fa-user"></i>
                                Base Currency
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#taxInformationDetails" role="tab">
                                <i class="far fa-envelope"></i>
                                Tax Information
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#baseCalendarMiscSettings" role="tab">
                                <i class="far fa-envelope"></i>
                                Base Calendar & Misc Settings
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="card-body p-4">
                    <div class="tab-content">
                        <div class="tab-pane active" id="basicInformationDetails" role="tabpanel">
                            <div class="table-responsive">
                                <table class="table table-borderless mb-0">
                                    <tbody>
                                        @if(isset($company->fax))
                                            <tr>
                                                <th class="ps-0 col-md-4" scope="row">Fax</th>
                                                <td class="text-muted">{{ $company->fax }}</td>
                                            </tr>
                                        @endif
                                        @if(isset($company->url))
                                            <tr>
                                                <th class="ps-0 col-md-4" scope="row">URL</th>
                                                <td class="text-muted">{{ $company->url }}</td>
                                            </tr>
                                        @endif
                                        @if(isset($company->country))
                                            <tr>
                                                <th class="ps-0 col-md-4" scope="row">Country</th>
                                                <td class="text-muted">{{ $country }}</td>
                                            </tr>
                                        @endif
                                        @if(isset($company->state))
                                            <tr>
                                                <th class="ps-0 col-md-4" scope="row">State</th>
                                                <td class="text-muted">{{ $state }}</td>
                                            </tr>
                                        @endif
                                        @if(isset($company->city))
                                            <tr>
                                                <th class="ps-0 col-md-4" scope="row">City</th>
                                                <td class="text-muted">{{ $city }}</td>
                                            </tr>
                                        @endif
                                        @if(isset($company->zip_code))
                                            <tr>
                                                <th class="ps-0 col-md-4" scope="row">Zip Code</th>
                                                <td class="text-muted">{{ $company->zip_code }}</td>
                                            </tr>
                                        @endif
                                        @if(isset($company->company_address_one))
                                            <tr>
                                                <th class="ps-0 col-md-4" scope="row">Address One</th>
                                                <td class="text-muted">{{ $company->company_address_one }}</td>
                                            </tr>
                                        @endif
                                        @if(isset($company->company_address_one))
                                            <tr>
                                                <th class="ps-0 col-md-4" scope="row">Address Two</th>
                                                <td class="text-muted">{{ $company->company_address_two }}</td>
                                            </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane" id="baseCurrencyDetails" role="tabpanel">
                            <div class="table-responsive">
                                <table class="table table-borderless mb-0">
                                    <tbody>
                                        @if(isset($company->currency_code))
                                            <tr>
                                                <th class="ps-0 col-md-4" scope="row">Code</th>
                                                <td class="text-muted">{{ $company->currency_code }}</td>
                                            </tr>
                                        @endif
                                        @if(isset($company->currency_name))
                                            <tr>
                                                <th class="ps-0 col-md-4" scope="row">Currency Name</th>
                                                <td class="text-muted">{{ $company->currency_name }}</td>
                                            </tr>
                                        @endif
                                        @if(isset($company->decimal_precision))
                                            <tr>
                                                <th class="ps-0 col-md-4" scope="row">Precision</th>
                                                <td class="text-muted">{{ $company->decimal_precision }}</td>
                                            </tr>
                                        @endif
                                        @if(isset($company->currency_decimal_mark))
                                            <tr>
                                                <th class="ps-0 col-md-4" scope="row">Decimal Mark</th>
                                                <td class="text-muted">{{ $company->currency_decimal_mark }}</td>
                                            </tr>
                                        @endif
                                        @if(isset($company->currency_symbol))
                                            <tr>
                                                <th class="ps-0 col-md-4" scope="row">Symbol</th>
                                                <td class="text-muted">{{ $company->currency_symbol }}</td>
                                            </tr>
                                        @endif
                                        @if(isset($company->currency_symbol_first))
                                            <tr>
                                                <th class="ps-0 col-md-4" scope="row">Symbol Position</th>
                                                @if($company->currency_symbol_first == "0")
                                                    <td class="text-muted">@lang('After Amount')</td>
                                                @else
                                                    <td class="text-muted">@lang('Before Amount')</td>
                                                @endif
                                            </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane" id="taxInformationDetails" role="tabpanel">
                            <div class="table-responsive">
                                <table class="table table-borderless mb-0">
                                    <tbody>
                                        @if(isset($company->federal_id))
                                            <tr>
                                                <th class="ps-0 col-md-4" scope="row">Federal ID</th>
                                                <td class="text-muted">{{ $company->federal_id }}</td>
                                            </tr>
                                        @endif
                                        @if(isset($company->tax_id))
                                            <tr>
                                                <th class="ps-0 col-md-4" scope="row">Tax ID</th>
                                                <td class="text-muted">{{ $company->tax_id }}</td>
                                            </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane" id="baseCalendarMiscSettings" role="tabpanel">
                            <div class="table-responsive">
                                <table class="table table-borderless mb-0">
                                    <tbody>
                                        @if(isset($company->fiscal_calendar))
                                            <tr>
                                                <th class="ps-0 col-md-4" scope="row">Fiscal Calendar</th>
                                                <td class="text-muted">{{ $company->fiscal_calendar }}</td>
                                            </tr>
                                        @endif
                                        @if(isset($company->production_calendar))
                                            <tr>
                                                <th class="ps-0 col-md-4" scope="row">Production Calendar</th>
                                                <td class="text-muted">{{ $company->production_calendar }}</td>
                                            </tr>
                                        @endif
                                        @if(isset($company->date_format))
                                            <tr>
                                                <th class="ps-0 col-md-4" scope="row">Date Format</th>
                                                <td class="text-muted">{{ $company->date_format }}</td>
                                            </tr>
                                        @endif
                                        @if(isset($company->date_separator))
                                            <tr>
                                                <th class="ps-0 col-md-4" scope="row">Date Separator</th>
                                                <td class="text-muted">{{ ucFirst($company->date_separator) }}</td>
                                            </tr>
                                        @endif
                                        @if(isset($company->time_format))
                                            <tr>
                                                <th class="ps-0 col-md-4" scope="row">Time Format</th>
                                                @if($company->time_format == "H")
                                                    <td class="text-muted">@lang('24-Hour Format')</td>
                                                @else
                                                    <td class="text-muted">@lang('12-Hour Format')</td>
                                                @endif
                                            </tr>
                                        @endif
                                        @if(isset($company->time_decorations))
                                            <tr>
                                                <th class="ps-0 col-md-4" scope="row">Time Decorations</th>
                                                @if($company->time_decorations == "A")
                                                    <td class="text-muted">Uppercase (AM or PM)</td>
                                                @else
                                                    <td class="text-muted">Lowercase (am or pm)</td>
                                                @endif
                                            </tr>
                                        @endif
                                        @if(isset($company->language))
                                            <tr>
                                                <th class="ps-0 col-md-4" scope="row">Default Language</th>
                                                <td class="text-muted">{{ $lang }}</td>
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
