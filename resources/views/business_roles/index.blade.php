@extends('layouts.master')
@section('title') @lang('Business Role')  @endsection
@section('css')
<!--datatable css-->
<link href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" rel="stylesheet" type="text/css" />
<!--datatable responsive css-->
<link href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css" rel="stylesheet" type="text/css" />
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    @component('components.breadcrumb')
        @slot('li_1') @lang('Business Role') @endslot
        @slot('title') @lang('Business Role List')  @endslot
    @endcomponent

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">@lang('Business Role List')</h4>
                    <div class="flex-shrink-0">
                        <button class="btn btn-outline btn-soft-primary shadow-none" data-bs-toggle="collapse" href="#filter"><span class="mdi mdi-filter"></span> @lang('Filter')</button>
                    </div>
                    <div class="flex-shrink-0">
                        <a href="{{ route('business-role.create') }}" class="btn btn-outline btn-soft-info shadow-none ml-1">+ @lang('Add Business Role')</a>
                    </div>
                </div>
                <div class="card-body">
                    <div id="filter" class="collapse @if(request()->isFilterActive) show @endif">
                        <div class="card-body border">
                            <form action="" method="get" role="form" autocomplete="off">
                                <input type="hidden" name="isFilterActive" value="true">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="mb-3">
                                            <div class="form-group">
                                                <label>@lang('Role Id')</label>
                                                <input type="text" name="role_id" class="form-control" value="{{ request()->role_id }}" placeholder="@lang('Business Role Id')">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="mb-3">
                                            <div class="form-group">
                                                <label>@lang('Name')</label>
                                                <input type="text" name="name" class="form-control" value="{{ request()->name }}" placeholder="@lang('Business Role Name')">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="mb-3">
                                            <button type="submit" class="btn btn-info">@lang('Submit')</button>
                                            @if(request()->isFilterActive)
                                                <a href="{{ route('business-role.index') }}" class="btn btn-soft-secondary ml-1">@lang('Clear')</a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <br>
                    <div class="table-responsive table-card">
                        <table class="table table-striped compact table-width" id="laravel_datatable">
                            <thead class="text-muted">
                                <tr>
                                    <th>@lang('Role Id')</th>
                                    <th>@lang('Role Name')</th>
                                    <th>@lang('Status')</th>
                                    <th width='30%'>@lang('Settings')</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $item)
                                <tr>
                                    <td>{{ $item->role_id }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>
                                        @if($item->enabled == '1')
                                        <span class="badge border border-success text-success">@lang('Active')</span>
                                        @else
                                        <span class="badge border border-danger text-danger">@lang('Inactive')</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href=" {{ route('business-role.show', $item) }}" type="button" class="btn btn-outline-info waves-effect waves-light shadow-none">@lang('View')</a>&nbsp;&nbsp;
                                        <a href=" {{ route('business-role.edit', $item) }}" type="button" class="btn btn-outline-warning waves-effect waves-light shadow-none">@lang('Edit')</a>&nbsp;&nbsp;
                                        <a href="#" data-href="{{ route('business-role.destroy', $item) }}" class="btn btn-outline-danger waves-effect waves-light shadow-none" data-bs-toggle="modal" data-bs-target="#myModal">@lang('Delete')</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @include('components.paginate')
                </div>
            </div>
        </div>
    </div>

    @include('layouts.delete_modal')
@endsection

@section('script')
    <script src="{{ URL::asset('assets/js/app.min.js') }}"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            "use strict";
            $('.dropify').dropify();

            $('.select2').select2();

            $("#myModal").on("show.bs.modal", function (e) {
                $(this).find(".btn-ok").attr("action", $(e.relatedTarget).data("href"));
            });

            $('#laravel_datatable').DataTable({
                "paging": false,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": false,
                "autoWidth": false,
                "responsive": true,
            });

        });
    </script>
@endsection
