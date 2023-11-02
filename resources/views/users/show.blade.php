@extends('layouts.master')
@section('title') @lang('User')  @endsection
@section('content')
    @component('components.breadcrumb')
        @slot('li_1') @lang('User') @endslot
        @slot('title') @lang('Show User')  @endslot
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
                    <ul class="nav nav-tabs-custom rounded card-header-tabs border-bottom-0" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-bs-toggle="tab" href="#user_tab_view" role="tab">
                                <i class="fas fa-home"></i>
                                @lang('Basic User')
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#business_tab_view" role="tab">
                                <i class="far fa-user"></i>
                                @lang('Assign Business Profile')
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#company_tab_view" role="tab">
                                <i class="far fa-envelope"></i>
                                @lang('Assign Company')
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#account_action_tab_view" role="tab"
                                aria-selected="false">
                                @lang('Account Actions')
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="card-body p-4">
                    <div class="tab-content">
                        <div class="tab-pane active" id="user_tab_view" role="tabpanel">
                            <div class="table-responsive">
                                <table class="table table-borderless mb-0">
                                    <tbody>
                                        @if(isset($user->user_id))
                                            <tr>
                                                <th class="ps-0 col-md-4" scope="row">@lang('User Id')</th>
                                                <td class="text-muted">{{ $user->user_id }}</td>
                                            </tr>
                                        @endif
                                        @if(isset($user->name))
                                            <tr>
                                                <th class="ps-0 col-md-4" scope="row">@lang('User Name')</th>
                                                <td class="text-muted">{{ $user->name }}</td>
                                            </tr>
                                        @endif
                                        @if(isset($user->email))
                                        <tr>
                                            <th class="ps-0 col-md-4" scope="row">@lang('Email')</th>
                                            <td class="text-muted">{{ $user->email }}</td>
                                        </tr>
                                        @endif
                                        @if(isset($user->address_one))
                                            <tr>
                                                <th class="ps-0 col-md-4" scope="row">@lang('Address One')</th>
                                                <td class="text-muted">{{ $user->address_one }}</td>
                                            </tr>
                                        @endif
                                        @if(isset($user->address_two))
                                            <tr>
                                                <th class="ps-0 col-md-4" scope="row">@lang('Address Two')</th>
                                                <td class="text-muted">{{ $user->address_two }}</td>
                                            </tr>
                                        @endif
                                        @if(isset($user->country))
                                            <tr>
                                                <th class="ps-0 col-md-4" scope="row">@lang('Country')</th>
                                                <td class="text-muted">{{ $countryName->name }}</td>
                                            </tr>
                                        @endif
                                        @if(isset($user->state))
                                            <tr>
                                                <th class="ps-0 col-md-4" scope="row">@lang('State')</th>
                                                <td class="text-muted">{{ $stateName->name }}</td>
                                            </tr>
                                        @endif
                                        @if(isset($user->city))
                                            <tr>
                                                <th class="ps-0 col-md-4" scope="row">@lang('City')</th>
                                                <td class="text-muted">{{ $cityName->name }}</td>
                                            </tr>
                                        @endif
                                        @if(isset($user->zip_code))
                                            <tr>
                                                <th class="ps-0 col-md-4" scope="row">@lang('Zip Code')</th>
                                                <td class="text-muted">{{ $user->zip_code }}</td>
                                            </tr>
                                        @endif
                                        @if(isset($user->office_phone))
                                            <tr>
                                                <th class="ps-0 col-md-4" scope="row">@lang('Office Phone')</th>
                                                <td class="text-muted">{{ $user->office_phone }}</td>
                                            </tr>
                                        @endif
                                        @if(isset($user->cell_phone))
                                            <tr>
                                                <th class="ps-0 col-md-4" scope="row">@lang('Cell Phone')</th>
                                                <td class="text-muted">{{ $user->cell_phone }}</td>
                                            </tr>
                                        @endif
                                        @if(isset($user->language))
                                            <tr>
                                                <th class="ps-0 col-md-4" scope="row">@lang('Language')</th>
                                                <td class="text-muted">{{ $getLang[$user->language] }}</td>
                                            </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane" id="business_tab_view" role="tabpanel">
                            <div class="table-responsive">
                                <table class="table table-borderless mb-0">
                                    @if($user->businessRoles)
                                        <tr>
                                            <th class="ps-0 col-md-4" scope="row">@lang('Assign Business Profile')</th>
                                            <td class="text-muted">@php
                                                $i = 0;
                                            @endphp
                                            @foreach($user->businessRoles as $key => $value)
                                            @if($i == 0)
                                                {{ $value->name }}
                                            @else
                                                {{ ', '.$value->name }}
                                            @endif
                                            @php
                                                $i++;
                                            @endphp
                    
                                            @endforeach
                                            @if($i == 0)
                                                {{ "N/A" }}
                                            @endif</td>
                                        </tr>
                                    @endif
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane" id="company_tab_view" role="tabpanel">
                            <div class="verti-sitemap">
                                <ul class="list-unstyled mb-0">
                                    <li class="p-0 parent-title">
                                        <a href="javascript: void(0);" class="fw-medium fs-14">@lang('Assign Company & Plant')</a>
                                    </li>
                                    @foreach($companyNames as $company)
                                    @if(in_array($company->id, $selectedCompany))
                                    <li>
                                        <div class="first-list">
                                            <div class="list-wrap">
                                                <a href="javascript: void(0);" class="fw-medium text-primary">{{ucfirst($company->name)." ( Company )"}}</a>
                                            </div>
                                            @foreach($company->plants as $child)
                                            @if(in_array($child->id, $selectedPlant))
                                            <ul class="third-list list-unstyled">
                                                <li>
                                                    <a href="javascript: void(0);">{{ucfirst($child->name)." ( Plant )"}}</a>
                                                </li>
                                            </ul>
                                            @endif
                                            @endforeach
                                        </div>
                                    </li>
                                    @endif
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="tab-pane" id="account_action_tab_view" role="tabpanel">
                            <div class="table-responsive">
                                <table class="table table-borderless mb-0">
                                    <tbody>
                                        @if(isset($user->enabled))
                                            <tr>
                                                <th class="ps-0 col-md-4" scope="row">@lang('Account')</th>
                                                <td class="text-muted">
                                                    @if($user->enabled == "1")
                                                        @lang('Enable')
                                                    @else
                                                        @lang('Disable')
                                                    @endif
                                                </td>
                                            </tr>
                                        @endif
                                        @if(isset($user->locked))
                                            <tr>
                                                <th class="ps-0 col-md-4" scope="row">@lang('Locked')</th>
                                                <td class="text-muted">
                                                    @if($user->locked == "1")
                                                        @lang('Yes')
                                                    @else
                                                        @lang('No')
                                                    @endif
                                                </td>
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