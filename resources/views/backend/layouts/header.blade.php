<!-- Top navbar div start -->
<nav class="navbar navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-brand">
            <button type="button" class="btn-toggle-offcanvas"><i class="fa fa-bars"></i></button>
            <button type="button" class="btn-toggle-fullwidth"><i class="fa fa-bars"></i></button>
            <a href="javascript:void(0)">AED</a>
        </div>

        <div class="navbar-right">

            <div id="navbar-menu">
                <form action="{{ route('logout') }}" method="post">
                    @csrf
                    <ul class="nav navbar-nav">
                        <li>
                            <a href="javascript:void(0)" onclick="$(this).closest('form').submit()" class="icon-menu"><i
                                    class="fa fa-power-off"></i></a>
                        </li>
                    </ul>
                </form>
            </div>
        </div>
    </div>
</nav>

<!-- main left menu -->
<div id="left-sidebar" class="sidebar">
    <button type="button" class="btn-toggle-offcanvas"><i class="fa fa-arrow-left"></i></button>
    <div class="sidebar-scroll">
        <div class="user-account">
            <img src="{{ asset('backend/images/user.png') }}" class="rounded-circle user-photo"
                alt="User Profile Picture">
            <div class="dropdown">
                <span>Welcome,</span>
                <a href="javascript:void(0);" class="user-name"><strong>{{ Auth::user()->name }}</strong></a>
            </div>
        </div>

        <!-- Tab panes -->
        <div class="tab-content padding-0">
            <div class="tab-pane active" id="menu">
                <nav id="left-sidebar-nav" class="sidebar-nav">
                    <ul id="main-menu" class="metismenu li_animation_delay">
                        <li class="@yield('manufacturers_nav')">
                            <a href="{{ route('manufacturers.index') }}">
                                <i class="fa fa-dashboard"></i><span>Manufacturers</span>
                            </a>
                        </li>
                        <li class="@yield('categories_nav')">
                            <a href="{{ route('categories.index') }}">
                                <i class="fa fa-dashboard"></i><span>Categories</span>
                            </a>
                        </li>
                        <li class="@yield('leads_nav')">
                            <a href="{{ route('leads.index') }}">
                                <i class="fa fa-dashboard"></i><span>Leads</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>
