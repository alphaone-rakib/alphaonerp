@extends('layouts.master')
@section('title') @lang('Fiscal Calendar')  @endsection
@section('css')
    <link rel="stylesheet" href="{{ URL::asset('assets/dropify/dist/css/dropify.min.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    @component('components.breadcrumb')
        @slot('li_1') @lang('Production Calendar') @endslot
        @slot('title') @lang('Show Production Calendar')  @endslot
    @endcomponent
    <div class="row">
        <div class="col-lg-12">
            <div class="card profile-project-card profile-project-success mb-0">
                <div class="card-header">
                    <h5 class="fs-14 text-truncate mb-1"><b>@lang('Show Production Calendar Information')</b></h5>
                </div>
                <div class="card-body p-4">
                    <div class="table-responsive">
                        <table class="table table-borderless mb-0">
                            <tbody>
                                <tr>
                                    @if (isset($productionCalendar->production_calendar_id))
                                        <th class="ps-0 col-md-2" scope="row">@lang('Calendar Id')</th>
                                        <td class="col-md-4 text-muted">{{ $productionCalendar->production_calendar_id }}</td>
                                    @endif
                                </tr>
                                <tr>
                                    @if (isset($productionCalendar->production_calendar_name))
                                        <th class="ps-0 col-md-2" scope="row">@lang('Calendar Name')</th>
                                        <td class="col-md-4 text-muted">{{ $productionCalendar->production_calendar_name }}</td>
                                    @endif
                                </tr>
                                <tr>
                                    @if (isset($productionCalendar->production_calendar_start))
                                        <th class="ps-0 col-md-2" scope="row">@lang('Start')</th>
                                        <td class="col-md-4 text-muted">{{ $months[$productionCalendar->production_calendar_start] }}</td>
                                    @endif
                                </tr>
                                <tr>
                                    @if (isset($productionCalendar->production_calendar_end))
                                        <th class="ps-0 col-md-2" scope="row">@lang('End')</th>
                                        <td class="col-md-4 text-muted">{{ $months[$productionCalendar->production_calendar_end] }}</td>
                                    @endif
                                </tr>
                                <tr>
                                    @if (isset($productionCalendar->description))
                                        <th class="ps-0 col-md-2" scope="row">@lang('Description')</th>
                                        <td class="col-md-4 text-muted">{!! $productionCalendar->description !!}</td>
                                    @endif
                                </tr>
                                <tr>
                                    @if (isset($productionCalendar->work_per_week))
                                        @if( $productionCalendar->work_per_week == "24_7")
                                            <th class="ps-0 col-md-2" scope="row">@lang('Company Work / Per Week')</th>
                                            <td class="col-md-4 text-muted">@lang('24 hours a day & 7 days a week')</td>
                                        @else
                                            <th class="ps-0 col-md-2" scope="row">@lang('Company Work / Per Week')</th>
                                            <td class="col-md-4 text-muted">@lang('10 hours a day & 5 days a week')</td>
                                        @endif
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