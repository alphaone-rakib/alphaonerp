@extends('layouts.master')
@section('title') @lang('Line')  @endsection
@section('css')
    <link rel="stylesheet" href="{{ URL::asset('assets/dropify/dist/css/dropify.min.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" type="text/css" />
@endsection


@section('content')
    @component('components.breadcrumb')
        @slot('li_1') @lang('Line') @endslot
        @slot('title') @lang('Show Line')  @endslot
    @endcomponent
    <div class="row">
        <div class="col-lg-12">
            <div class="card profile-project-card profile-project-success mb-0">
                <div class="card-header">
                    <h5 class="fs-14 text-truncate mb-1"><b>@lang('Show Line Information')</b></h5>
                </div>
                <div class="card-body p-4">
                    <div class="table-responsive">
                        <table class="table table-borderless mb-0">
                            <tbody>
                                <tr>
                                    @if (isset($line->part_id))
                                        <th class="ps-0 col-md-2" scope="row">@lang('Part Id')</th>
                                        <td class="col-md-4 text-muted">{{ $line->partMaster->part_number }}</td>
                                    @endif
                                {{-- </tr>
                                <tr> --}}
                                    @if (isset($line->description))
                                        <th class="ps-0 col-md-2" scope="row">@lang('Description')</th>
                                        <td class="col-md-4 text-muted">{{ $line->partMaster->description }}</td>
                                    @endif
                                </tr>
                                <tr>
                                    @if (isset($line->customer_id))
                                        <th class="ps-0 col-md-2" scope="row">@lang('Plant Name')</th>
                                        <td class="col-md-4 text-muted">{{ $line->customer->name }}</td>
                                    @endif
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-lg-12">
            <div class="card profile-project-card profile-project-success mb-0">
                <div class="card-header">
                    <h5 class="fs-14 text-truncate mb-1"><b>@lang('Order Info')</b></h5>
                </div>
                <div class="card-body p-4">
                    <div class="table-responsive">
                        <table class="table table-borderless mb-0">
                            <tbody>
                                <tr>
                                    @if (isset($line->order_quantity))
                                        <th class="ps-0 col-md-2" scope="row">@lang('Order Quantity')</th>
                                        <td class="col-md-4 text-muted">{{ $line->order_quantity." ".$line->order_quantity_type }}</td>
                                    @endif
                                    @if (isset($line->excepted_quantity))
                                        <th class="ps-0 col-md-2" scope="row">@lang('Excepted Quantity')</th>
                                        <td class="col-md-4 text-muted">{{ $line->excepted_quantity." ".$line->excepted_quantity_type }}</td>
                                    @endif
                                </tr>
                                <tr>
                                    @if (isset($line->best_case_percentage))
                                        <th class="ps-0 col-md-2">@lang('Best Case')</th>
                                        <td class="col-md-4">{{ $line->best_case_percentage." %" }}</td>
                                    @endif
                                    @if (isset($line->worst_case_percentage))
                                        <th class="ps-0 col-md-2">@lang('Worst Case')</th>
                                        <td class="col-md-4">{{ $line->worst_case_percentage." %" }}</td>
                                    @endif
                                </tr>
                                <tr>
                                    @if (isset($line->confidence_percentage))
                                        <th class="ps-0 col-md-2">@lang('Confidence')</th>
                                        <td class="col-md-2">{{ $line->confidence_percentage." %" }}</td>
                                    @endif
                                </tr>
                                <tr>
                                    @if (isset($line->price_per))
                                        <th class="ps-0 col-md-2">@lang('Price Per')</th>
                                        <td class="col-md-4">{{ $line->price_per }}</td>
                                    @endif
                                    @if (isset($line->unit_price))
                                        <th class="ps-0 col-md-2">@lang('Unit Price')</th>
                                        <td class="col-md-4">{{ $line->unit_price }}</td>
                                    @endif
                                </tr>
                                <tr>
                                    @if (isset($line->discount_percentage))
                                        <th class="ps-0 col-md-2">@lang('Discount')</th>
                                        <td class="col-md-4">{{ $line->discount_percentage }}</td>
                                    @endif
                                    @if (isset($line->discount_value))
                                        <td class="col-md-4">{{ $line->discount_value }}</td>
                                    @endif
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-lg-12">
            <div class="card profile-project-card profile-project-success mb-0">
                <div class="card-header">
                    <h5 class="fs-14 text-truncate mb-1"><b>@lang('Line Price Info')</b></h5>
                </div>
                <div class="card-body p-4">
                    <div class="table-responsive">
                        <table class="table table-borderless mb-0">
                            <tbody>
                                <tr>
                                    @if (isset($line->price_group))
                                        <th class="ps-0 col-md-2" scope="row">@lang('Price Group')</th>
                                        <td class="col-md-4 text-muted">{{ $line->priceGroup->group_name}}</td>
                                    @endif
                                    @if (isset($line->pricing_quantity))
                                        <th class="ps-0 col-md-2" scope="row">@lang('Pricing Quantity')</th>
                                        <td class="col-md-4 text-muted">{{ $line->pricing_quantity." ".$line->pricing_quantity_type }}</td>
                                    @endif
                                </tr>
                                <tr>
                                    @if (isset($line->tax))
                                        <th class="ps-0 col-md-2" scope="row">@lang('Tax')</th>
                                        <td class="col-md-4 text-muted">{{ $line->tax}}</td>
                                    @endif
                                    @if (isset($line->total))
                                        <th class="ps-0 col-md-2" scope="row">@lang('Total')</th>
                                        <td class="col-md-4 text-muted">{{ $line->total }}</td>
                                    @endif
                                </tr>
                            </tbody>
                            
                        </table>
                        
                        
                    </div>
                    <br>
                    <div class="row mb-3">
                        <div class="col-sm-4 text-center">
                            <b class="float-start">Extended Price</b>
                            <span class="text-muted">
                                @if(isset($line->extended_price))
                                    {{$line->extended_price}}
                                @endif
                            </span>
                        </div>
                        <div class="col-sm-4 text-center">
                            <b class="float-start">Potential</b>
                            <span class="text-muted">
                                @if(isset($line->potential))
                                    {{$line->potential}}
                                @endif
                            </span>
                        </div>
                        <div class="col-sm-4 text-center">
                            <b class="float-start">Misc. Charges</b>
                            <span class="text-muted">
                                @if(isset($line->misc_charges))
                                    {{$line->misc_charges}}
                                @endif
                            </span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4 text-center">
                            <b class="float-start">Best Case</b>
                            <span class="text-muted">
                                @if(isset($line->best_case_value))
                                    {{$line->best_case_value}}
                                @endif
                            </span>
                        </div>
                        <div class="col-sm-4 text-center">
                            <b class="float-start">Worst Case</b>
                            <span class="text-muted">
                                @if(isset($line->worst_case_value))
                                    {{$line->worst_case_value}}
                                @endif
                            </span>
                        </div>
                        <div class="col-sm-4 text-center">
                            <b class="float-start">Excepted</b>
                            <span class="text-muted">
                                @if(isset($line->excepted_value))
                                    {{$line->excepted_value}}
                                @endif
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
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