@php
$c = Request::segment(1);
$m = Request::segment(2);

$userId = auth()->user()->id;

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

                @if(auth()->user()->id == "1")

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
                    <a class="nav-link menu-link @if($c == 'customer-group' || $c == 'customer' || $c == 'product-group') active @endif" href="#salesModule" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="salesModule">
                        <i class="mdi mdi-point-of-sale"></i>
                        <span>@lang('Sales Module')</span>
                    </a>
                    <div class="collapse menu-dropdown @if($c == 'customer-group' || $c == 'customer' || $c == 'product-group') show @endif" id="salesModule">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{ route('customer.index') }}" class="nav-link @if($c == 'customer') active @endif">
                                    @lang('Customer')
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('customer-group.index') }}" class="nav-link @if($c == 'customer-group') active @endif">
                                    @lang('Customer Group')
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('product-group.index') }}" class="nav-link @if($c == 'product-group') active @endif">
                                    @lang('Product Group')
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link @if($c == 'application-settings' || $c == 'menu' || $c == 'business-role' || $c == 'fiscal-calendar' || $c == 'fiscal-year' || $c == 'production-calendar') active @endif" href="#sidebarApps" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarApps">
                        <i class="mdi mdi-cog"></i> <span>@lang('Settings')
                        </span>
                    </a>
                    <div class="collapse menu-dropdown @if($c == 'application-settings' || $c == 'menu' || $c == 'business-role' || $c == 'fiscal-calendar' || $c == 'fiscal-year' || $c == 'production-calendar') show @endif" id="sidebarApps">
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
                                <a href="{{ route('fiscal-calendar.index') }}" class="nav-link @if($c == 'fiscal-calendar') active @endif">@lang('Fiscal Calendar')
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('production-calendar.index') }}" class="nav-link @if($c == 'production-calendar') active @endif">@lang('Production Calendar')
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('fiscal-year.index') }}" class="nav-link @if($c == 'fiscal-year') active @endif">@lang('Fiscal Year')
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('application-settings.index') }}" class="nav-link @if($c == 'application-settings') active @endif">@lang('Application Settings')
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                @else
                    @foreach($menus as $category)
                    @if(in_array($category->id, $menuPermission))
                        @php
                            $activeMenu = array();
                            $activeMenu_2nd = array();
                            $activeMenu_3rd = array();
                            $activeMenu_4th = array();
                            $activeMenuStr = "";
                        @endphp
                        @if($category->menu_href != "javascript:void(0)")
                            <li class="nav-item">
                                <a class="nav-link menu-link @if($c == $category->menu_href) active @endif" href="{{ route($category->menu_href.".index") }}">
                                    <i class="mdi {{$category['parent_menu_icon']}}"></i> <span>
                                        @lang($category->name)
                                    </span>
                                </a>
                            </li>
                        @else
                            @php
                                foreach($category->children as $child) {
                                    if(in_array($child->id, $menuPermission)) {
                                        $activeMenu[] = $child->menu_href;
                                        foreach($child->children as $child2) {
                                            if(in_array($child2->id, $menuPermission)) {
                                                $activeMenu[] = $child2->menu_href;
                                                $activeMenu_2nd[] = $child2->menu_href;
                                                foreach($child2->children as $child3) {
                                                    if(in_array($child3->id, $menuPermission)) {
                                                        $activeMenu[] = $child3->menu_href;
                                                        $activeMenu_2nd[] = $child3->menu_href;
                                                        $activeMenu_3rd[] = $child3->menu_href;
                                                        foreach($child3->children as $child4) {
                                                            if(in_array($child4->id, $menuPermission)) {
                                                                $activeMenu[] = $child4->menu_href;
                                                                $activeMenu_2nd[] = $child4->menu_href;
                                                                $activeMenu_3rd[] = $child4->menu_href;
                                                                $activeMenu_4th[] = $child4->menu_href;
                                                            }
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }
                                $activeMenuWithoutVoid = array_map(fn (string $value): string => $value == 'javascript:void(0)' ? 'blank' : $value, $activeMenu);
                                $activeMenuStr = implode("_",$activeMenuWithoutVoid);
                            @endphp
                            <li class="nav-item">
                                <a class="nav-link menu-link @if(in_array($c, $activeMenu)) active  @endif" href="#{{$activeMenuStr}}" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="{{$activeMenuStr}}">
                                    <i class="mdi {{$category['parent_menu_icon']}}"></i> <span>
                                        @lang($category->name)
                                    </span>
                                </a>
                                <div class="collapse menu-dropdown @if(in_array($c, $activeMenu)) show @endif" id="{{$activeMenuStr}}">
                                    <ul class="nav nav-sm flex-column">
                                        @foreach($category->children as $child)
                                            @if(in_array($child->id, $menuPermission))
                                                @if($child->menu_href != "javascript:void(0)")
                                                <li class="nav-item">
                                                    <a href="{{ route($child->menu_href.".index") }}" class="nav-link @if($c == $child->menu_href) active @endif">
                                                        @lang($child->name)
                                                    </a>
                                                </li>
                                                @else
                                                <li class="nav-item">
                                                    <a @if(in_array($c, $activeMenu_2nd)) active  @endif href="#{{$activeMenuStr}}_2nd" class="nav-link" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="{{$activeMenuStr}}_2nd">
                                                        @lang($child->name)
                                                    </a>
                                                    <div class="collapse menu-dropdown @if(in_array($c, $activeMenu_2nd)) show @endif" id="{{$activeMenuStr}}_2nd">
                                                        <ul class="nav nav-sm flex-column">
                                                            @foreach($child->children as $child2)
                                                            @if(in_array($child2->id, $menuPermission))
                                                                @if($child2->menu_href != "javascript:void(0)")
                                                                    <li class="nav-item">
                                                                        <a href="{{ route($child2->menu_href.".index") }}" class="nav-link @if($c == $child2->menu_href) active @endif">
                                                                            @lang($child2->name)
                                                                        </a>
                                                                    </li>
                                                                @else
                                                                    <a @if(in_array($c, $activeMenu_3rd)) active  @endif href="#{{$activeMenuStr}}_3rd" class="nav-link" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="{{$activeMenuStr}}_3rd">
                                                                        @lang($child2->name)
                                                                    </a>
                                                                    <div class="collapse menu-dropdown @if(in_array($c, $activeMenu_3rd)) show @endif" id="{{$activeMenuStr}}_3rd">
                                                                        <ul class="nav nav-sm flex-column">
                                                                            @foreach($child2->children as $child3)
                                                                                @if(in_array($child3->id, $menuPermission))
                                                                                    @if($child3->menu_href != "javascript:void(0)")
                                                                                        <li class="nav-item">
                                                                                            <a href="{{ route($child3->menu_href.".index") }}" class="nav-link @if($c == $child3->menu_href) active @endif">
                                                                                                @lang($child3->name)
                                                                                            </a>
                                                                                        </li>
                                                                                    @else
                                                                                        <a @if(in_array($c, $activeMenu_4th)) active  @endif href="#{{$activeMenuStr}}_4th" class="nav-link" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="{{$activeMenuStr}}_4th">
                                                                                            @lang($child3->name)
                                                                                        </a>
                                                                                        <div class="collapse menu-dropdown @if(in_array($c, $activeMenu_4th)) show @endif" id="{{$activeMenuStr}}_4th">
                                                                                            <ul class="nav nav-sm flex-column">
                                                                                                @foreach($child3->children as $child4)
                                                                                                    @if(in_array($child4->id, $menuPermission))
                                                                                                        @if($child4->menu_href != "javascript:void(0)")
                                                                                                            <li class="nav-item">
                                                                                                                <a href="{{ route($child4->menu_href.".index") }}" class="nav-link @if($c == $child4->menu_href) active @endif">
                                                                                                                    @lang($child4->name)
                                                                                                                </a>
                                                                                                            </li>
                                                                                                        @endif
                                                                                                    @endif
                                                                                                @endforeach
                                                                                            </ul>
                                                                                        </div>
                                                                                    @endif
                                                                                @endif
                                                                            @endforeach
                                                                        </ul>
                                                                    </div>
                                                                @endif
                                                            @endif
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                </li>
                                                @endif
                                            @endif
                                        @endforeach
                                    </ul>
                                </div>
                            </li>
                        @endif
                    @endif
                    @endforeach 
                @endif
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
    <div class="sidebar-background"></div>
</div>
<!-- Left Sidebar End -->
<!-- Vertical Overlay-->
<div class="vertical-overlay"></div>
