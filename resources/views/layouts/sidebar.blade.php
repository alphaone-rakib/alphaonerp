@php
$c = Request::segment(1);
$m = Request::segment(2);

$userId = auth()->user()->id;

// dd($menuPermission);
// dd($menus);

@endphp
<div class="app-menu navbar-menu">
    <!-- LOGO -->
    <div class="navbar-brand-box">
        <!-- Dark Logo-->
        <a href="index" class="logo logo-dark">
            <span class="logo-sm">
                <img src="{{ URL::asset('assets/images/logo-sm.png') }}" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="{{ URL::asset('assets/images/logo-dark.png') }}" alt="" height="17">
            </span>
        </a>
        <!-- Light Logo-->
        <a href="index" class="logo logo-light">
            <span class="logo-sm">
                <img src="{{ URL::asset('assets/images/logo-sm.png') }}" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="{{ URL::asset('assets/images/logo-light.png') }}" alt="" height="17">
            </span>
        </a>
        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover" id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
    </div>

    <div id="scrollbar">
        <div class="container-fluid">

            <div id="two-column-menu">
            </div>
            <ul class="navbar-nav" id="navbar-nav">
                <li class="menu-title"><span>@lang('translation.menu')</span></li>

                <li class="nav-item">
                    <a class="nav-link menu-link @if($c == 'dashboard') active @endif" href="{{ route('dashboard.index') }}">
                        <i class="mdi mdi-view-dashboard-outline"></i> <span>@lang('Dashboard')
                        </span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link @if($c == 'user') active @endif" href="{{ route('user.index') }}">
                        <i class="mdi mdi-account-outline"></i> <span>@lang('User')
                        </span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link @if($c == 'company' || $c == 'company-configuration') active @endif" href="#companySide" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="companySide">
                        <i class="mdi mdi-cube-outline"></i> <span>@lang('Company')
                        </span>
                    </a>
                    <div class="collapse menu-dropdown @if($c == 'company' || $c == 'company-configuration') show @endif" id="companySide">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{ route('company.index') }}" class="nav-link @if($c == 'company') active @endif">@lang('Company')
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('company-configuration.index') }}" class="nav-link @if($c == 'company-configuration') active @endif">@lang('Company Configuration')
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link @if($c == 'plant') active @endif" href="{{ route('plant.index') }}">
                        <i class="mdi mdi-layers-outline"></i> <span>@lang('Plant')
                        </span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link @if($c == 'application-settings' || $c == 'menu' || $c == 'business-role') active @endif" href="#sidebarApps" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarApps">
                        <i class="mdi mdi-cog"></i> <span>@lang('Settings')
                        </span>
                    </a>
                    <div class="collapse menu-dropdown @if($c == 'application-settings' || $c == 'menu' || $c == 'business-role') show @endif" id="sidebarApps">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{ route('business-role.index') }}" class="nav-link @if($c == 'business-role') active @endif">@lang('Business Role')
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('menu.index') }}" class="nav-link @if($c == 'menu') active @endif">@lang('Menu')
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('application-settings') }}" class="nav-link @if($c == 'application-settings') active @endif">@lang('Application Settings')
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarMultilevel" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarMultilevel">
                        <i class="mdi mdi-share-variant-outline"></i> <span>@lang('translation.multi-level')
                        </span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarMultilevel">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="#" class="nav-link">@lang('translation.level-1.1')
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#sidebarAccount" class="nav-link" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarAccount">@lang('translation.level-1.2')

                                </a>
                                <div class="collapse menu-dropdown" id="sidebarAccount">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a href="#" class="nav-link">@lang('translation.level-2.1')
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#sidebarCrm" class="nav-link" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarCrm">@lang('translation.level-2.2')

                                            </a>
                                            <div class="collapse menu-dropdown" id="sidebarCrm">
                                                <ul class="nav nav-sm flex-column">
                                                    <li class="nav-item">
                                                        <a href="#" class="nav-link">@lang('translation.level-3.1')
                                                        </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a href="#" class="nav-link">@lang('translation.level-3.2')
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </li>

                {{-- @foreach($menus as $category)

                @if($category->menu_href != "javascript:void(0)")

                    <li class="nav-item">
                        <a class="nav-link menu-link @if($c == $category->menu_href) active @endif" href="{{ route($category->menu_href.".index") }}">
                            <i class="{{$mdiIcon[$category->menu_href]}}"></i>
                            <span>
                                @lang($category->name)
                            </span>
                        </a>
                    </li>
                @else
                    @php
                        $activeMenu = array();
                        $activeMenuStr = implode("_",$activeMenu);
                    @endphp
                    <li class="nav-item">
                        <a class="nav-link menu-link @if(in_array($c, $activeMenu)) active @endif" data-bs-toggle="collapse" role="button" aria-expanded="false">
                            <i class="mdi mdi-account-outline"></i>
                            <span>
                                @lang($category->name)
                            </span>
                        </a>
                        @foreach($category->children as $child)
                        @php
                            $activeMenu[] = $child->menu_href;
                        @endphp
                        <div class="collapse menu-dropdown @if(in_array($c, $activeMenu)) show @endif">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="{{ route($child->menu_href.".index") }}" class="nav-link @if(in_array($c, $activeMenu)) active @endif">
                                        @lang($child->name)
                                    </a>
                                </li>
                            </ul>
                        </div>
                        @endforeach
                    </li>
                    
                @endif --}}

                

                {{-- @php
                    dd($category);
                @endphp --}}

                {{-- <li class="nav-item">
                    <a class="nav-link menu-link " href="#" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarApps">
                        <i class="mdi mdi-view-dashboard-outline"></i> <span>@lang($category->name)
                        </span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarApps">
                        <ul class="nav nav-sm flex-column">
                            @foreach($category->children as $child)
                            <li class="nav-item">
                                <a href="#" class="nav-link">@lang($child->name)
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </li> --}}

                {{-- @endforeach --}}

            </ul>
        </div>
        <!-- Sidebar -->
    </div>
    <div class="sidebar-background"></div>
</div>
<!-- Left Sidebar End -->
<!-- Vertical Overlay-->
<div class="vertical-overlay"></div>
