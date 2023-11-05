<header class="desk_view">
    <div class="header-sticky top_menu">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4">
                    <div class="site-brand">
                        <a href="{{ route('homepage') }}">
                            <img src="{{ asset('frontend/image/16975098606415.png') }}" alt="">
                        </a>
                    </div>
                </div>
                <div class="col-md-8 visibleOnScroll">
                    <form action="{{route('search')}}" method="POST">
@csrf
                        <div class="site-search pb-0">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search For Product Keyword..."
                                    name="search" autocomplete="off" required>
                                <div class="input-group-append">
                                    <button class="btn btn-theme" type="button">
                                        <img src="{{ asset('frontend/image/search.svg') }}" alt="">
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                {{-- <div class="col-md-4   text-right">
                    <div class="header_three">
                        <ul>

                            <li>
                                <a href="javascript;void(0)">
                                    <img src="{{ asset('frontend/image/menu-icon/email.png') }}" alt="">
                                    <span>Contact Us</span>
                                </a>
                            </li>

                        </ul>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
    <div class="top_menu">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4">
                    <div class="site-brand">
                        <a href="{{ route('homepage') }}">
                            <img src="{{ asset('frontend/image/16975098606415.png') }}" alt="">
                        </a>
                    </div>
                </div>
                <div class="col-md-8">
                    <form action="{{route('search')}}" method="post">
                        @csrf
                        <div class="site-search pb-0">
                            <div class="input-group">
                                <input type="text" value="" class="form-control"
                                    placeholder="Search For Product Keyword..." name="search" id="deskViewSearchInput"
                                    required>
                                <div class="input-group-append">
                                    <button class="btn btn-theme" type="submit">
                                        <img src="{{ asset('frontend/image/search.svg') }}" alt="">
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                {{-- <div class="col-md-4  text-right ">
                    <div class="header_three">
                        <ul>
                            <li>
                                <a href="javascript;void(0)">
                                    <img src="{{ asset('frontend/image/menu-icon/email.png') }}" alt="">
                                    <span>Contact Us</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
    <div class="header-top">
        <div class="container-fluid megamenusip p-0">
            <ul class="exo-menu">
                @foreach (getHeaderCategories() as $headerCategory)
                    <li class="mega-drop-down">
                        <a
                            href="{{ route('listByCategory', ['slug' => $headerCategory->slug]) }}">{!! $headerCategory->title !!}</a>
                        <div class="animated fadeIn mega-menu">
                            <div class="mega-menu-wrap">
                                <div class="row">
                                    <div class="col-12">
                                        <h4 class="row mega-title">{!! $headerCategory->title !!}</h4>
                                    </div>
                                    @foreach ($headerCategory->children as $childCategory)
                                        <div class="col-md-2">
                                            <ul class="cabeza">
                                                <li>
                                                    <a
                                                        href="{{ route('listByCategory', ['slug' => $childCategory->slug]) }}">{!! $childCategory->title !!}</a>
                                                </li>
                                            </ul>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</header>
<header class="mobile_view">
    <div class="container">
        <div class="row">
            <div class="col-9">
                <div class="mobile_brand_logo">
                    <a href="{{ route('homepage') }}">
                        <img src="{{ asset('frontend/image/16975098606415.png') }}" alt="">
                    </a>
                </div>
            </div>
            <div class="col-3">
                <div class="OpenMobileMenuBtn">
                    <h2 class="Hamburg_icon"> ☰</h2>
                </div>
                <div id="MobileMenuContainer" class="sidenav" style="width: 0px;">
                    <a class="CloseMobileMenuBtn">×</a>
                    <hr>
                    <a href="javascript;void(0)">About Us</a>
                    <a href="javascript;void(0)">Contact Us</a>
                    <a href="javascript;void(0)">Terms &amp; Conditions</a>
                    <a href="javascript;void(0)">Privacy &amp; Policy</a>
                    <a href="javascript;void(0)">Refund &amp; Policy</a>

                    <hr>
                    <a href="javascript;void(0)" style="font-size: 18px; text-transform: uppercase;">Popular
                        Categories</a>
                    <hr>
                    @foreach (getHeaderCategories() as $topCategory)
                        <a href="{{route('listByCategory', ['slug' => $topCategory->slug])}}">{!!$topCategory->title!!}</a>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- mobile header search-->

        <div class="row">
            <div class="col-12 mt-2">
                <div class="">
                    <form action="https://distributorschannel.com/search">
                        <div class="site-search pb-0">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search For Product Keyword..."
                                    name="search" required>
                                <div class="input-group-append">
                                    <button class="btn btn-theme" type="submit">
                                        <img src="{{ asset('frontend/image/search.svg') }}" alt="">
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>

        <!-- mobile header search-->

    </div>
</header>
