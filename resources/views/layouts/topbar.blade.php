<header id="page-topbar">
    <div class="layout-width">
        <div class="navbar-header">
            <div class="d-flex">
                <!-- LOGO -->
                <div class="navbar-brand-box horizontal-logo">
                    <a href="index" class="logo logo-dark">
                        <span class="logo-sm">
                            <img src="{{ URL::asset('assets/images/logo-sm.png') }}" alt="" height="22">
                        </span>
                        <span class="logo-lg">
                            <img src="{{ URL::asset('assets/images/logo-dark.png') }}" alt="" height="17">
                        </span>
                    </a>

                    <a href="index" class="logo logo-light">
                        <span class="logo-sm">
                            <img src="{{ URL::asset('assets/images/logo-sm.png') }}" alt="" height="22">
                        </span>
                        <span class="logo-lg">
                            <img src="{{ URL::asset('assets/images/logo-light.png') }}" alt="" height="17">
                        </span>
                    </a>
                </div>

                <button type="button" class="btn btn-sm px-3 fs-16 header-item vertical-menu-btn topnav-hamburger btn_box_shadow_remover " id="topnav-hamburger-icon">
                    <span class="hamburger-icon">
                        <span></span>
                        <span></span>
                        <span></span>
                    </span>
                </button>
            </div>
            @php
                $locale = App::getLocale();
            @endphp
            <div class="d-flex align-items-center">
                <div class="dropdown ms-1 topbar-head-dropdown header-item">
                    <button type="button" class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle shadow-none" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        @foreach ($getLang as $key => $value)
                            @if($locale == $key)
                                <img src="{{ URL::asset('/assets/flag-icons-3.1.0/flags/1x1/'.$flag[$key].'.svg') }}" class="rounded " alt="Header Language" height="18">
                            @endif
                        @endforeach
                    </button>
                    <div class="dropdown-menu dropdown-menu-end">
                        @foreach ($getLang as $key => $value)
                        <a href="{{ route('lang.index', ['language' => $key]) }}" class="dropdown-item notify-item language py-2" data-lang="{{ $key }}" title="{{ $value }}">
                            <img src="{{ URL::asset('/assets/flag-icons-3.1.0/flags/1x1/'.$flag[$key].'.svg') }}" alt="user-image" class="me-2 rounded" height="18">
                            <span class="align-middle">{{$value}}</span>
                        </a>
                        @endforeach
                    </div>
                </div>

                <div class="ms-1 header-item d-none d-sm-flex">
                    <button type="button" class="btn btn-icon btn-topbar btn-ghost-secondary text-muted rounded-circle shadow-none"
                        data-toggle="fullscreen">
                        <i class='bx bx-fullscreen fs-22'></i>
                    </button>
                </div>

                <div class="ms-1 header-item d-none d-sm-flex">
                    <button type="button" class="btn btn-icon btn-topbar btn-ghost-secondary text-muted rounded-circle light-dark-mode shadow-none">
                        <i class='bx bx-moon fs-22'></i>
                    </button>
                </div>

                <div class="dropdown ms-sm-3 header-item topbar-user">
                    <button type="button" class="btn btn_box_shadow_remover " id="page-header-user-dropdown" data-bs-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <span class="d-flex align-items-center">
                            <img class="rounded-circle header-profile-user" src="@if (Auth::user()->avatar != ''){{ URL::asset('images/' . Auth::user()->avatar) }}@else{{ URL::asset('assets/images/users/user.png') }}@endif"
                                alt="Header Avatar">
                            <span class="text-start ms-xl-2">
                                <span class="d-none d-xl-inline-block ms-1 fw-medium user-name-text">{{Auth::user()->name}}</span>
                                <span class="d-none d-xl-block ms-1 fs-12 text-muted user-name-sub-text">
                                    @php
                                        $i = 0;
                                    @endphp
                                    @foreach(Auth::user()->businessRoles as $key => $value)
                                        @if($i == 0)
                                            {{ $value->name }}
                                        @endif
                                        @php
                                            $i++;
                                        @endphp
                                        @if($i == 1)
                                            @break
                                        @endif
                                    @endforeach
                                    @if($i == 0)
                                        {{ "N/A" }}
                                    @endif
                                </span>
                            </span>
                        </span>
                    </button>
                    <div class="dropdown-menu dropdown-menu-end">
                        <h6 class="dropdown-header">@lang('Welcome') {{Auth::user()->m_name}} !</h6>
                        <a class="dropdown-item" href="{{ route('profile.view') }}">
                            <i class="mdi mdi-account-circle-outline text-muted fs-16 align-middle me-1"></i>
                            <span class="align-middle">@lang('My Profile')</span>
                        </a>
                        <a class="dropdown-item" href="{{ route('profile.setting') }}">
                            <i class="mdi mdi-account-cog-outline text-muted fs-16 align-middle me-1"></i>
                            <span class="align-middle">@lang('Account Setting')</span>
                        </a>
                        <a class="dropdown-item" href="{{ route('profile.password') }}">
                            <i class="mdi mdi-key-outline text-muted fs-16 align-middle me-1"></i>
                            <span class="align-middle">@lang('Change Password')</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item " href="javascript:void();" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="mdi mdi-power-off font-size-16 align-middle me-1"></i>
                            <span key="t-logout">@lang('Logout')</span>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
