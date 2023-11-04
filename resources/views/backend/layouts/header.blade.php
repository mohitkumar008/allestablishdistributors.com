<!-- Top navbar div start -->
<nav class="navbar navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-brand">
            <button type="button" class="btn-toggle-offcanvas"><i class="fa fa-bars"></i></button>
            <button type="button" class="btn-toggle-fullwidth"><i class="fa fa-bars"></i></button>
            <a href="index.html">ICONIC</a>
        </div>

        <div class="navbar-right">
            <form id="navbar-search" class="navbar-form search-form">
                <input value="" class="form-control" placeholder="Search here..." type="text">
                <button type="button" class="btn btn-default"><i class="icon-magnifier"></i></button>
            </form>

            <div id="navbar-menu">
                <ul class="nav navbar-nav">
                    <li class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle icon-menu" data-toggle="dropdown">
                            <i class="fa fa-bell"></i>
                            <span class="notification-dot"></span>
                        </a>
                        <ul class="dropdown-menu notifications">
                            <li class="header"><strong>You have 4 new Notifications</strong></li>
                            <li>
                                <a href="javascript:void(0);">
                                    <div class="media">
                                        <div class="media-left">
                                            <i class="icon-info text-warning"></i>
                                        </div>
                                        <div class="media-body">
                                            <p class="text">Campaign <strong>Holiday Sale</strong> is nearly
                                                reach budget limit.</p>
                                            <span class="timestamp">10:00 AM Today</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0);">
                                    <div class="media">
                                        <div class="media-left">
                                            <i class="icon-like text-success"></i>
                                        </div>
                                        <div class="media-body">
                                            <p class="text">Your New Campaign <strong>Holiday Sale</strong> is
                                                approved.</p>
                                            <span class="timestamp">11:30 AM Today</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0);">
                                    <div class="media">
                                        <div class="media-left">
                                            <i class="icon-pie-chart text-info"></i>
                                        </div>
                                        <div class="media-body">
                                            <p class="text">Website visits from Twitter is 27% higher than
                                                last week.</p>
                                            <span class="timestamp">04:00 PM Today</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0);">
                                    <div class="media">
                                        <div class="media-left">
                                            <i class="icon-info text-danger"></i>
                                        </div>
                                        <div class="media-body">
                                            <p class="text">Error on website analytics configurations</p>
                                            <span class="timestamp">Yesterday</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="footer"><a href="javascript:void(0);" class="more">See all
                                    notifications</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="page-login.html" class="icon-menu"><i class="fa fa-power-off"></i></a>
                    </li>
                </ul>
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
                <a href="javascript:void(0);" class="dropdown-toggle user-name" data-toggle="dropdown"><strong>Pamela
                        Petrus</strong></a>
                <ul class="dropdown-menu dropdown-menu-right account">
                    <li><a href="page-profile2.html"><i class="icon-user"></i>My Profile</a></li>
                    <li><a href="app-inbox.html"><i class="icon-envelope-open"></i>Messages</a></li>
                    <li><a href="javascript:void(0);"><i class="icon-settings"></i>Settings</a></li>
                    <li class="divider"></li>
                    <li><a href="page-login.html"><i class="icon-power"></i>Logout</a></li>
                </ul>
            </div>
        </div>

        <!-- Tab panes -->
        <div class="tab-content padding-0">
            <div class="tab-pane active" id="menu">
                <nav id="left-sidebar-nav" class="sidebar-nav">
                    <ul id="main-menu" class="metismenu li_animation_delay">
                        <li class="@yield('manufacturers_nav')">
                            <a href="{{route('manufacturers.index')}}">
                                <i class="fa fa-dashboard"></i><span>Manufacturers</span>
                            </a>
                        </li>
                        <li class="@yield('categories_nav')">
                            <a href="{{route('categories.index')}}">
                                <i class="fa fa-dashboard"></i><span>Categories</span>
                            </a>
                        </li>
                        <li class="@yield('leads_nav')">
                            <a href="#Dashboard">
                                <i class="fa fa-dashboard"></i><span>Leads</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>

