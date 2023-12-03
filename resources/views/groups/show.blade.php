@extends('layouts.master')
@section('title') @lang('Group')  @endsection
@section('css')
    <link rel="stylesheet" href="{{ URL::asset('assets/dropify/dist/css/dropify.min.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    @component('components.breadcrumb')
        @slot('li_1') @lang('Group') @endslot
        @slot('title') @lang('Show Group')  @endslot
    @endcomponent
    <div class="row">
        <div class="col-lg-12">
            <div class="card profile-project-card profile-project-success mb-0">
                <div class="card-header">
                    <h5 class="fs-14 text-truncate mb-1"><b>@lang('Show Group Information')</b></h5>
                </div>
                <div class="card-body p-4">
                    <div class="table-responsive">
                        <table class="table table-borderless mb-0">
                            <tbody>
                                <tr>
                                    @if (isset($group->group_id))
                                        <th class="ps-0 col-md-2" scope="row">@lang('Group Id')</th>
                                        <td class="col-md-4 text-muted">{{ $group->group_id }}</td>
                                    @endif
                                </tr>
                                <tr>
                                    @if (isset($group->group_name))
                                        <th class="ps-0 col-md-2" scope="row">@lang('Group Name')</th>
                                        <td class="col-md-4 text-muted">{{ $group->group_name }}</td>
                                    @endif
                                </tr>
                                <tr>
                                    @if (isset($group->sales_site))
                                        <th class="ps-0 col-md-2" scope="row">@lang('Sales Site')</th>
                                        <td class="col-md-4 text-muted">{{ ucwords(str_replace("_"," ",$group->sales_site)) }}</td>
                                    @endif
                                    @if (isset($group->warranty))
                                        <th class="ps-0 col-md-2" scope="row">@lang('Warranty')</th>
                                        <td class="col-md-4 text-muted">{{ ucwords(str_replace("_"," ",$group->warranty)) }}</td>
                                    @endif
                                </tr>
                                <tr>
                                    @if (isset($group->planner))
                                        <th class="ps-0 col-md-2" scope="row">@lang('Planner')</th>
                                        <td class="col-md-4 text-muted">{{ ucwords(str_replace("_"," ",$group->planner)) }}</td>
                                    @endif
                                    @if (isset($group->tax_category))
                                        <th class="ps-0 col-md-2" scope="row">@lang('Tax Category')</th>
                                        <td class="col-md-4 text-muted">{{ ucwords(str_replace("_"," ",$group->tax_category)) }}</td>
                                    @endif
                                </tr>
                                <tr>
                                    @if (isset($group->description))
                                        <th class="ps-0 col-md-2" scope="row">@lang('Description')</th>
                                        <td class="col-md-4 text-muted">{!! $group->description !!}</td>
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
