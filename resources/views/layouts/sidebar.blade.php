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
                <img src="{{ URL::asset('assets/images/logolight-s.png') }}" alt="" height="24">
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
                <li class="menu-title"><span>@lang('Menu')</span></li>

                <li class="nav-item">
                    <a class="nav-link menu-link @if($c == 'dashboard') active @endif" href="{{ route('dashboard.index') }}">
                        <i class="mdi mdi-view-dashboard-outline"></i> <span>@lang('Dashboard')
                        </span>
                    </a>
                </li>

                @if(auth()->user()->id == "1")

                <li class="nav-item">
                    <a class="nav-link menu-link @if($c == 'customer' || $c == 'product-group' || $c == 'part-master') active @endif" href="#salesModule" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="salesModule">
                        <i class="mdi mdi-point-of-sale"></i>
                        <span>@lang('Sales Management')</span>
                    </a>
                    <div class="collapse menu-dropdown @if($c == 'customer' || $c == 'product-group' || $c == 'part-master') show @endif" id="salesModule">
                        <ul class="nav nav-sm flex-column">
                            {{-- <li class="nav-item">
                                <a href="{{ route('part-master.index') }}" class="nav-link @if($c == 'part-master') active @endif">
                                    @lang('Part Master')
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('customer.index') }}" class="nav-link @if($c == 'customer') active @endif">
                                    @lang('Customer')
                                </a>
                            </li> --}}
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    @lang('Case Managment')
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    @lang('Quote Managment')
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    @lang('Demand Managment')
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    @lang('Order Management')
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link" href="#serviceManagement" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="serviceManagement">
                        <i class="mdi mdi-lifebuoy"></i>
                        <span>@lang('Service Management')</span>
                    </a>
                    <div class="collapse menu-dropdown" id="serviceManagement">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    @lang('Expense Management')
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    @lang('Maintenance Management')
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    @lang('Field Service')
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link" href="#productionManagement" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="productionManagement">
                        <i class="mdi mdi-sitemap"></i>
                        <span>@lang('Production Management')</span>
                    </a>
                    <div class="collapse menu-dropdown" id="productionManagement">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    @lang('Job Management')
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    @lang('Scheduling')
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    @lang('Engineering')
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    @lang('Material Requirement Planning')
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    @lang('Quality Assurance')
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link" href="#materialManagement" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="materialManagement">
                        <i class="mdi mdi-palette-swatch"></i>
                        <span>@lang('Material Management')</span>
                    </a>
                    <div class="collapse menu-dropdown" id="materialManagement">
                        <ul class="nav nav-sm flex-column">
                            <a href="#" class="nav-link">
                                @lang('Inventory Management')
                            </a>
                            <a href="#" class="nav-link">
                                @lang('Shipping / Receiving')
                            </a>
                            <a href="#" class="nav-link">
                                @lang('Purchase Management')
                            </a>
                            <a href="#" class="nav-link">
                                @lang('Purchase Contracts Management')
                            </a>
                            <a href="#" class="nav-link">
                                @lang('Supplier Relationship Management')
                            </a>
                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link" href="#financialManagement" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="financialManagement">
                        <i class="mdi mdi-finance"></i>
                        <span>@lang('Financial Management')</span>
                    </a>
                    <div class="collapse menu-dropdown" id="financialManagement">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    @lang('Project Management')
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    @lang('Accounts Receivable')
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    @lang('Accounts Payable')
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    @lang('Currency Management')
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    @lang('Cash Management')
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    @lang('General Ledger')
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    @lang('Multi-Site')
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    @lang('Payroll')
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    @lang('Rebates, Promotions and Royalties')
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    @lang('Asset Management')
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link @if($c == 'company' || $c == 'company-configuration' || $c == 'customer-group'|| $c == 'plant' || $c == 'group' || $c == 'bin' || $c == 'warehouse' || $c =='part-class' || $c == 'buyer' || $c == 'supplier' || $c == 'application-settings' || $c == 'menu' || $c == 'business-role' || $c == 'fiscal-calendar' || $c == 'fiscal-year' || $c == 'production-calendar' || $c =='revision' || $c == 'customer') active @endif" href="#sidebarApps" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarApps">
                        <i class="mdi mdi-cog"></i> <span>@lang('System Management')
                        </span>
                    </a>
                    <div class="collapse menu-dropdown @if($c == 'company' || $c == 'company-configuration' || $c == 'customer-group' || $c == 'plant' || $c == 'user' || $c =='group' || $c == 'bin' || $c == 'warehouse' || $c == 'part-class' || $c == 'buyer' || $c == 'supplier' || $c == 'application-settings' || $c == 'menu' || $c == 'business-role' || $c == 'fiscal-calendar' || $c == 'fiscal-year' || $c == 'production-calendar' || $c =='revision' || $c == 'customer') show @endif" id="sidebarApps">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{ route('plant.index') }}" class="nav-link @if($c == 'plant') active @endif">@lang('Plant')
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('user.index') }}" class="nav-link @if($c == 'user') active @endif">@lang('User')
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#companySide" class="nav-link @if($c == 'company' || $c == 'company-configuration') active @endif" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="companySide">@lang('Company')

                                </a>
                                <div class="collapse menu-dropdown @if($c == 'company' || $c =='company-configuration') show @endif" id="companySide">
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
                                <a href="#sidebarSalesModuleSetup" class="nav-link @if($c == 'customer-group' || $c == 'group' || $c == 'bin' || $c =='warehouse' || $c == 'part-class' || $c == 'supplier' || $c == 'buyer' || $c =='revision' || $c == 'customer') active @endif" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarSalesModuleSetup">@lang('Sales Module Setup')

                                </a>
                                <div class="collapse menu-dropdown @if($c == 'customer-group' || $c =='group' || $c == 'bin' || $c == 'warehouse' || $c == 'part-class' || $c == 'supplier' || $c == 'buyer' || $c =='revision' || $c == 'customer') show @endif" id="sidebarSalesModuleSetup">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a href="{{ route('customer-group.index') }}" class="nav-link @if($c == 'customer-group') active @endif">@lang('Customer Group')
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{ route('supplier.index') }}" class="nav-link @if($c == 'supplier') active @endif">@lang('Supplier')
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{ route('buyer.index') }}" class="nav-link @if($c == 'buyer') active @endif">@lang('Buyer')
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{ route('customer.index') }}" class="nav-link @if($c == 'customer') active @endif">@lang('Customer')
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#sidebarPartMasterSetup" class="nav-link @if($c == 'part-class' || $c == 'group' || $c == 'bin' || $c == 'warehouse' || $c =='revision') active @endif" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarPartMasterSetup">@lang('Part Master Setup')

                                            </a>
                                            <div class="collapse menu-dropdown @if($c == 'part-class' || $c =='group' || $c == 'bin' || $c == 'warehouse' || $c =='revision') show @endif" id="sidebarPartMasterSetup">
                                                <ul class="nav nav-sm flex-column">
                                                    <li class="nav-item">
                                                        <a href="{{ route('part-class.index') }}" class="nav-link @if($c == 'part-class') active @endif">@lang('Part Class')
                                                        </a>
                                                    </li>

                                                    <li class="nav-item">
                                                        <a href="{{ route('group.index') }}" class="nav-link @if($c == 'group') active @endif">@lang('Part Group')
                                                        </a>
                                                    </li>

                                                    <li class="nav-item">
                                                        <a href="{{ route('warehouse.index') }}" class="nav-link @if($c == 'warehouse') active @endif">@lang('Warehouse')
                                                        </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a href="{{ route('revision.index') }}" class="nav-link @if($c == 'revision') active @endif">@lang('Revision')
                                                        </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a href="{{ route('bin.index') }}" class="nav-link @if($c == 'bin') active @endif">@lang('Bin')
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('business-role.index') }}" class="nav-link @if($c == 'business-role') active @endif">@lang('Business Role')
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('menu.index') }}" class="nav-link @if($c == 'menu') active @endif">@lang('Menu')
                                </a>
                            </li>
                            {{-- <li class="nav-item">
                                <a href="{{ route('application-settings.index') }}" class="nav-link @if($c == 'application-settings') active @endif">@lang('Application Settings')
                                </a>
                            </li> --}}
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
