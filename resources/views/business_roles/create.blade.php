@extends('layouts.master')
@section('title') @lang('Business Role')  @endsection
@section('css')
    <link rel="stylesheet" href="{{ URL::asset('assets/dropify/dist/css/dropify.min.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    @component('components.breadcrumb')
        @slot('li_1') @lang('Business Role') @endslot
        @slot('title') @lang('Create Business Role')  @endslot
    @endcomponent
    <div class="row">
        <div class="col-lg-12">
            <form class="form-material form-horizontal" action="{{ route('business-role.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <div class="card-header align-items-center d-flex">
                        <h4 class="card-title mb-0 flex-grow-1">@lang('Business Role Create Information')</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="role_id" class="form-label">@lang('Business Role Id') <b class="ambitious-crimson">*</b></label>
                                    <input id="role_id" class="form-control @error('role_id') is-invalid @enderror" type="text" name="role_id" value="{{ old('role_id') }}" placeholder="@lang('Type Your Business Role Id')" required>
                                    @error('role_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="name" class="form-label">@lang('Business Role Name') <b class="ambitious-crimson">*</b></label>
                                    <input id="name" class="form-control @error('name') is-invalid @enderror" type="text" name="name" value="{{ old('name') }}" placeholder="@lang('Type Your Business Role Name')" required>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="description" class="form-label">@lang('Description')</label>
                                    <textarea id="description" class="form-control" name="description" rows="3" placeholder="@lang('Type Your Plant Description')"></textarea>
                                    @error('description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title mb-0">Vertical</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="verti-sitemap">
                                                    <ul class="list-unstyled mb-0">
                                                        <li class="p-0 parent-title"><a href="javascript: void(0);"
                                                                class="fw-medium fs-14">Nancy Martino - Project Director</a>
                                                        </li>
                                                        <li>
                                                            <div class="first-list">
                                                                <div class="list-wrap">
                                                                    <a href="javascript: void(0);" class="fw-medium text-primary">Erica
                                                                        Kernan - Team Leader</a>
                                                                </div>
                                                                <ul class="second-list list-unstyled">
                                                                    <li>
                                                                        <a href="javascript: void(0);">Jason McQuaid -
                                                                            Member</a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="javascript: void(0);">Elwood Arter -
                                                                            Member</a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                            <div class="first-list">
                                                                <div class="list-wrap">
                                                                    <a href="javascript: void(0);" class="fw-medium text-primary">Mary
                                                                        Jones
                                                                        - Project Manager</a>
                                                                </div>
                                                                <ul class="second-list list-unstyled">
                                                                    <li><a href="javascript: void(0);">Jordyn Jones -
                                                                            Designer</a></li>
                                                                    <li><a href="javascript: void(0);">Ashlee Haney -
                                                                            Developer</a></li>
                                                                    <li><a href="javascript: void(0);">Rashad Charles -
                                                                            BackEnd Developer</a></li>
                                                                    <li><a href="javascript: void(0);">Walter Newman -
                                                                            Frontend Developer</a>
                                                                    </li>
                                                                    <li><a href="javascript: void(0);">Adam Moss -
                                                                            Designer</a></li>
                                                                </ul>
                                                            </div>
                                                            <div class="first-list">
                                                                <div class="list-wrap">
                                                                    <a href="javascript: void(0);" class="fw-medium text-primary">Tilly
                                                                        Kent
                                                                        - Executive Manager</a>
                                                                </div>
                                                                <ul class="second-list list-unstyled">
                                                                    <li>
                                                                        <a href="javascript: void(0);">Tyler Porter -
                                                                            Account Executive</a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="javascript: void(0);">Alicia Thompson -
                                                                            Sales Executive</a>
                                                                        <ul class="third-list list-unstyled">
                                                                            <li><a href="javascript: void(0);">Jack
                                                                                    Coates -
                                                                                    Member</a></li>
                                                                            <li><a href="javascript: void(0);">Owen
                                                                                    Jarvis -
                                                                                    Member</a></li>
                                                                            <li><a href="javascript: void(0);">Ashlee
                                                                                    Haney
                                                                                    - Member</a></li>
                                                                            <li><a href="javascript: void(0);">Archie
                                                                                    Cook -
                                                                                    Member</a></li>
                                                                        </ul>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <!--end row-->
                                    </div>
                                    <!--end card-body-->
                                </div>
                                <!--end card-->
                            </div>
                            <!--end col-->
                        </div>

                            <div class="row">
                              <div class="col-md-5">
                                <select name="from[]" id="multiselect" class="form-control" size="8" multiple="multiple">
                                  <option value="1">Item 1</option>
                                  <option value="2">Item 5</option>
                                  <option value="2">Item 2</option>
                                  <option value="2">Item 4</option>
                                  <option value="3">Item 3</option>
                                </select>
                              </div>
                          
                              <div class="col-md-2">
                                <div class="row">
                                    <button type="button" id="multiselect_rightAll" class="btn btn-block btn-soft-primary"><span class="mdi mdi-skip-forward"></span>
                                    </span></button>
                                </div>
                                <div class="row">
                                    <button type="button" id="multiselect_rightSelected" class="btn btn-block btn-soft-info"><span class="mdi mdi-menu-right"></span>
                                    </button>
                                </div>
                                <div class="row">
                                    <button type="button" id="multiselect_leftSelected" class="btn btn-block btn-soft-info"><span class="mdi mdi-menu-left"></span>
                                    </button>
                                </div>
                                <div class="row">
                                    <button type="button" id="multiselect_leftAll" class="btn btn-block btn-soft-primary"><span class="mdi mdi-skip-backward"></span>
                                    </button>
                                </div>
                              </div>
                          
                              <div class="col-md-5">
                                <select name="to[]" id="multiselect_to" class="form-control" size="8" multiple="multiple"></select>
                              </div>
                            </div>
                    </div>
                    <div class="card-footer">
                        <input type="submit" value="@lang('common.submit')" class="btn btn-info btn-lg"/>
                        <a href="{{ route('dashboard') }}" class="btn btn-warning btn-lg float-end">@lang('common.cancel')</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
    @endsection

@section('script')
    <script src="{{ URL::asset('assets/dropify/dist/js/dropify.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="{{ URL::asset('assets/js/app.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/multiselect.js') }}"></script>
    <script>
        $(document).ready(function() {
            "use strict";
            $('.select2').select2();

            $('#multiselect').multiselect();
        });
    </script>
@endsection