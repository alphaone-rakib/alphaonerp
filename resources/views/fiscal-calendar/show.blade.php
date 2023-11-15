@extends('layouts.master')
@section('title') @lang('Fiscal Calendar')  @endsection
@section('css')
    <link rel="stylesheet" href="{{ URL::asset('assets/dropify/dist/css/dropify.min.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    @component('components.breadcrumb')
        @slot('li_1') @lang('Fiscal Calendar') @endslot
        @slot('title') @lang('Show Fiscal Calendar')  @endslot
    @endcomponent
    <div class="row">
        <div class="col-lg-12">
            <div class="card profile-project-card profile-project-success mb-0">
                <div class="card-header">
                    <h5 class="fs-14 text-truncate mb-1"><b>@lang('Show Fiscal Calendar Information')</b></h5>
                </div>
                <div class="card-body p-4">
                    <div class="table-responsive">
                        <table class="table table-borderless mb-0">
                            <tbody>
                                <tr>
                                    @if (isset($fiscalCalendar->fiscal_calendar_id))
                                        <th class="ps-0 col-md-2" scope="row">@lang('Fiscal Calendar Id')</th>
                                        <td class="col-md-4 text-muted">{{ $fiscalCalendar->fiscal_calendar_id }}</td>
                                    @endif
                                </tr>
                                <tr>
                                    @if (isset($fiscalCalendar->fiscal_calendar_name))
                                        <th class="ps-0 col-md-2" scope="row">@lang('Fiscal Calendar Name')</th>
                                        <td class="col-md-4 text-muted">{{ $fiscalCalendar->fiscal_calendar_name }}</td>
                                    @endif
                                </tr>
                                <tr>
                                    @if (isset($fiscalCalendar->fiscal_calendar_start))
                                        <th class="ps-0 col-md-2" scope="row">@lang('Fiscal Calendar Start')</th>
                                        <td class="col-md-4 text-muted">{{ Carbon\Carbon::parse($fiscalCalendar->fiscal_calendar_start."-2023")->format('d F') }}</td>
                                    @endif
                                </tr>
                                <tr>
                                    @if (isset($fiscalCalendar->fiscal_calendar_end))
                                        <th class="ps-0 col-md-2" scope="row">@lang('Fiscal Calendar End')</th>
                                        <td class="col-md-4 text-muted">{{ Carbon\Carbon::parse($fiscalCalendar->fiscal_calendar_end."-2023")->format('d F') }}</td>
                                    @endif
                                </tr>
                                <tr>
                                    @if (isset($fiscalCalendar->description))
                                        <th class="ps-0 col-md-2" scope="row">@lang('Description')</th>
                                        <td class="col-md-4 text-muted">{!! $fiscalCalendar->description !!}</td>
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