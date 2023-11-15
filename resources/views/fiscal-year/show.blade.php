@extends('layouts.master')
@section('title') @lang('Fiscal Year')  @endsection
@section('css')
    <link rel="stylesheet" href="{{ URL::asset('assets/dropify/dist/css/dropify.min.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    @component('components.breadcrumb')
        @slot('li_1') @lang('Fiscal Year') @endslot
        @slot('title') @lang('Show Fiscal Year')  @endslot
    @endcomponent
    <div class="row">
        <div class="col-lg-12">
            <div class="card profile-project-card profile-project-success mb-0">
                <div class="card-header">
                    <h5 class="fs-14 text-truncate mb-1"><b>@lang('Show Fiscal Year Information')</b></h5>
                </div>
                <div class="card-body p-4">
                    <div class="table-responsive">
                        <table class="table table-borderless mb-0">
                            <tbody>
                                <tr>
                                    @if (isset($fiscalYear->fiscal_year_id))
                                        <th class="ps-0 col-md-2" scope="row">@lang('Fiscal Year Id')</th>
                                        <td class="col-md-4 text-muted">{{ $fiscalYear->fiscal_year_id }}</td>
                                    @endif
                                </tr>
                                <tr>
                                    @if (isset($fiscalYear->fiscal_year_name))
                                        <th class="ps-0 col-md-2" scope="row">@lang('Fiscal Year Name')</th>
                                        <td class="col-md-4 text-muted">{{ $fiscalYear->fiscal_year_name }}</td>
                                    @endif
                                </tr>
                                <tr>
                                    @if (isset($fiscalYear->fiscal_year_start))
                                        <th class="ps-0 col-md-2" scope="row">@lang('Start')</th>
                                        <td class="col-md-4 text-muted">{{ $months[$fiscalYear->fiscal_year_start] }}</td>
                                    @endif
                                </tr>
                                <tr>
                                    @if (isset($fiscalYear->fiscal_year_end))
                                        <th class="ps-0 col-md-2" scope="row">@lang('End')</th>
                                        <td class="col-md-4 text-muted">{{ $months[$fiscalYear->fiscal_year_end] }}</td>
                                    @endif
                                </tr>
                                <tr>
                                    @if (isset($fiscalYear->number_periods))
                                        <th class="ps-0 col-md-2" scope="row">@lang('Number of Periods')</th>
                                        <td class="col-md-4 text-muted">{{ $fiscalYear->number_periods }}</td>
                                    @endif
                                </tr>
                                <tr>
                                    @if (isset($fiscalYear->number_closing_periods))
                                        <th class="ps-0 col-md-2" scope="row">@lang('Number of Closing Periods')</th>
                                        <td class="col-md-4 text-muted">{{ $fiscalYear->number_closing_periods }}</td>
                                    @endif
                                </tr>
                                <tr>
                                    @if (isset($fiscalYear->description))
                                        <th class="ps-0 col-md-2" scope="row">@lang('Description')</th>
                                        <td class="col-md-4 text-muted">{!! $fiscalYear->description !!}</td>
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