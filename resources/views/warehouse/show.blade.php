@extends('layouts.master')
@section('title') @lang('Warehouse')  @endsection
@section('css')
    <link rel="stylesheet" href="{{ URL::asset('assets/dropify/dist/css/dropify.min.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    @component('components.breadcrumb')
        @slot('li_1') @lang('Warehouse') @endslot
        @slot('title') @lang('Show Warehouse')  @endslot
    @endcomponent
    <div class="row">
        <div class="col-lg-12">
            <div class="card profile-project-card profile-project-success mb-0">
                <div class="card-header">
                    <h5 class="fs-14 text-truncate mb-1"><b>@lang('Show Warehouse Information')</b></h5>
                </div>
                <div class="card-body p-4">
                    <div class="table-responsive">
                        <table class="table table-borderless mb-0">
                            <tbody>
                                <tr>
                                    @if (isset($warehouse->warehouse_id))
                                        <th class="ps-0 col-md-2" scope="row">@lang('Warehouse')</th>
                                        <td class="col-md-4 text-muted">{{ $warehouse->warehouse_id }}</td>
                                    @endif
                                    @if (isset($warehouse->name))
                                        <th class="ps-0 col-md-2" scope="row">@lang('Name')</th>
                                        <td class="col-md-4 text-muted">{{ $warehouse->name }}</td>
                                    @endif
                                </tr>
                                <tr>
                                    @if (isset($warehouse->address_one))
                                        <th class="ps-0 col-md-2" scope="row">@lang('Address One')</th>
                                        <td class="col-md-4 text-muted">{{ $warehouse->address_one }}</td>
                                    @endif
                                    @if (isset($warehouse->address_two))
                                        <th class="ps-0 col-md-2" scope="row">@lang('Address Two')</th>
                                        <td class="col-md-4 text-muted">{{ $warehouse->address_two }}</td>
                                    @endif
                                </tr>
                                <tr>
                                    @if (isset($warehouse->country))
                                        <th class="ps-0 col-md-2" scope="row">@lang('Country')</th>
                                        <td class="col-md-4 text-muted">{{ $country }}</td>
                                    @endif
                                    @if (isset($warehouse->state))
                                        <th class="ps-0 col-md-2" scope="row">@lang('State')</th>
                                        <td class="col-md-4 text-muted">{{ $state }}</td>
                                    @endif
                                </tr>
                                <tr>
                                    @if (isset($warehouse->city))
                                        <th class="ps-0 col-md-2" scope="row">@lang('City')</th>
                                        <td class="col-md-4 text-muted">{{ $city }}</td>
                                    @endif
                                    @if (isset($warehouse->zip_code))
                                        <th class="ps-0 col-md-2" scope="row">@lang('Zip Code')</th>
                                        <td class="col-md-4 text-muted">{{ $warehouse->zip_code }}</td>
                                    @endif
                                </tr>
                                <tr>
                                    @if (isset($warehouse->manager_name))
                                        <th class="ps-0 col-md-2" scope="row">@lang('Manager Name')</th>
                                        <td class="col-md-4 text-muted">{{ $warehouse->manager_name }}</td>
                                    @endif
                                    @if (isset($warehouse->description))
                                        <th class="ps-0 col-md-2" scope="row">@lang('Description')</th>
                                        <td class="col-md-4 text-muted">{{ $warehouse->description }}</td>
                                    @endif
                                </tr>
                            </tbody>
                        </table>
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
            $('.select2').select2();
        });
    </script>
@endsection
