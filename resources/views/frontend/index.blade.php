@extends('frontend.layouts.app')
@section('content')
    <section class="banner_sec">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8 col-sm-12 pl-0">
                    <div class="banner_main">
                        <div class="owl-carousel home-banner-slider owl-theme">
                            <div class="item">
                                <div class="offer-item">
                                    <div class="offer-item-img">
                                        <div class="gambo-overlay"></div>
                                        <img class="home-banner-img img-responsive lazyload"
                                            src="{{ Storage::url('public/banners/01.png') }}" alt="">
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="offer-item">
                                    <div class="offer-item-img">
                                        <div class="gambo-overlay"></div>
                                        <img class="home-banner-img img-responsive lazyload"
                                            src="{{ Storage::url('public/banners/02.png') }}" alt="">
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="offer-item">
                                    <div class="offer-item-img">
                                        <div class="gambo-overlay"></div>
                                        <img class="home-banner-img img-responsive lazyload"
                                            src="{{ Storage::url('public/banners/03.png') }}" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="invest_box_new">
                                <div class="heading_banner">
                                    <h5>Choose distribution as per investment</h5>
                                </div>
                                <ul>
                                    <li>
                                        <a class="invest_box"
                                            href="{{ route('listByInvestment', ['investment' => 'Under 5 Lacs']) }}">
                                            <h4>Investments</h4>
                                            <p>Under 5 Lacs</p>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="invest_box"
                                            href="{{ route('listByInvestment', ['investment' => '5 Lacs - 20 Lacs']) }}">
                                            <h4>Investments</h4>
                                            <p>5 Lacs - 20 Lacs</p>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="invest_box"
                                            href="{{ route('listByInvestment', ['investment' => '20 Lacs - 50 Lacs']) }}">
                                            <h4>Investments</h4>
                                            <p>20 Lacs - 50 Lacs</p>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="invest_box"
                                            href="{{ route('listByInvestment', ['investment' => 'Above 50 Lacs']) }}">
                                            <h4>Investment</h4>
                                            <p>Above 50 Lacs</p>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-12 col-12">
                    <div class="post_requirement">
                        <h3>Apply For DistributorshipHelp to Start a Business</h3>
                        <p>Post your enquiry for dealer/distributorship opportunities</p>
                        <form class="row" action="{{ route('sendRequirement') }}" method="post"
                            enctype="multipart/form-data" id="post-your-requirement">
                            @csrf
                            <div class="form-group col-lg-12 col-sm-6 col-12">
                                <input type="text" class="form-control" placeholder="Name" name="name" value=""
                                    required />
                            </div>
                            <div class="form-group col-lg-12 col-sm-6 col-12">
                                <input type="text" class="form-control" placeholder="Email Id" name="email"
                                    value="" required />
                            </div>
                            <div class="form-group col-lg-12 col-sm-6 col-12">
                                <input type="text" class="form-control" placeholder="Mobile No." name="mobile"
                                    value="" required />
                            </div>
                            <div class="form-group col-12">
                                <textarea class="form-control" name="message" rows="4" placeholder="Write your requirement" required></textarea>
                            </div>
                            <div class="col-lg-12 col-sm-6 col-12 text-center">
                                <button type="submit" class="btn btn-theme w-100">Submit</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <section class="cat_home_sec">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-sm-12 cat_circle_box">
                    <div class="row">
                        <div class="col-12 p-0">
                            <div class="heading_title">
                                <h5>Top categories</h5>
                                <a class="btn btn-show-more" href="{{ route('topCategories') }}"> Show more</a>
                            </div>
                        </div>
                        @foreach ($getTopCategories as $topCategory)
                            <div class="col-md-2 col-6 text-center">
                                <a class="cat_btn" href="{{ route('listByCategory', ['slug' => $topCategory->slug]) }}">
                                    <div class="round_cat">
                                        @if (Storage::exists($topCategory->logo))
                                            <img src="{{ Storage::url($topCategory->logo) }}" alt="" />
                                        @endif
                                        <h5>{!! $topCategory->title !!}</h5>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="cat_home_sec">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-sm-3 col-6">
                    <div class="banner_discount">
                        <img src="{{ Storage::url('public/category_icons/238141692790525.png') }}" alt="" />
                        <div class="discnt_bottom">
                            <a href="javascript:void(0)" data-toggle="modal" data-target="#SendEnquiresModel"
                                class="btn btn-theme w-100 btn-prod">Apply
                                For Distributorship</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-3 col-6">
                    <div class="banner_discount">
                        <img src="{{ Storage::url('public/category_icons/750341692790552.png') }}" alt="" />
                        <div class="discnt_bottom">
                            <a href="javascript:void(0)" data-toggle="modal" data-target="#SendEnquiresModel"
                                class="btn btn-theme w-100 btn-prod">Apply
                                For Distributorship</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-3 col-6">
                    <div class="banner_discount">
                        <img src="{{ Storage::url('public/category_icons/627601692790538.png') }}" alt="" />
                        <div class="discnt_bottom">
                            <a href="javascript:void(0)" data-toggle="modal" data-target="#SendEnquiresModel"
                                class="btn btn-theme w-100 btn-prod">Apply
                                For Distributorship</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-3 col-6">
                    <div class="banner_discount">
                        <img src="{{ Storage::url('public/category_icons/833181692790509.png') }}" alt="" />
                        <div class="discnt_bottom">
                            <a href="javascript:void(0)" data-toggle="modal" data-target="#SendEnquiresModel"
                                class="btn btn-theme w-100 btn-prod">Apply
                                For Distributorship</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="top_brand">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 p-0">
                    <div class="heading_title">
                        <h5>distributorship by top brands</h5>
                        <a class="btn btn-show-more" href="{{ route('listByTopBrands') }}"> Show more</a>
                    </div>
                </div>
                @foreach ($getTopBrands as $topBrand)
                    <div class="brandBox">
                        <a href="{{ route('manufacturerDetails', ['slug' => $topBrand->company_slug]) }}">
                            @if (Storage::exists($topBrand->company_logo))
                                <span class="brandLogo">
                                    <img src="{{ Storage::url($topBrand->company_logo) }}" alt=""
                                        class="lazyload" />
                                </span>
                            @endif
                            <span class="ftBrandName">{{ $topBrand->company_name }}</span>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="top_dearlership">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 p-0">
                    <div class="heading_title">
                        <h5>Top dearlership opportunities</h5>
                        <a class="btn btn-show-more" href="{{ route('listByTopDealership') }}"> Show more</a>
                    </div>
                </div>
            </div>
            <div class="square_box square_box_fst row">
                @foreach ($topManufacturers as $topManufacturer)
                    <div class="col-lg-3 col-sm-4 col-12 p-0">
                        <div class="card">
                            @switch($topManufacturer->verify_status)
                                @case(1)
                                    <img src="{{ asset('frontend/image/premium.png') }}" alt=""
                                        class="verfiyed lazyload" />
                                @break

                                @case(2)
                                    <img src="{{ asset('frontend/image/verified.png') }}" alt=""
                                        class="verfiyed lazyload" />
                                @break

                                @case(3)
                                    <img src="{{ asset('frontend/image/trusted.png') }}" alt=""
                                        class="verfiyed lazyload" />
                                @break

                                @default
                            @endswitch
                            @if (Storage::exists($topManufacturer->company_logo))
                                <img class="card-img-top" src="{{ Storage::url($topManufacturer->company_logo) }}"
                                    alt="Card image cap" />
                            @endif
                            <div class="card-body px-0 pb-0">
                                <a href="javascript:void(0)" class="btn btn-distbt">{!! $topManufacturer->category->title !!}</a>
                                <h4 class="card-title">{{ $topManufacturer->company_name }}</h4>
                                <ul>
                                    <li class="text-dark">Investment Range</li>
                                    <li>{{ $topManufacturer->investment_range }}</li>
                                    <li class="text-dark">Location</li>
                                    <li>{{ substr($topManufacturer->distributorship_location, 0, 120) }}...</li>
                                </ul>
                                <h5 class="knw_mt">
                                    <a class="btn btn-theme btn-bdr w-100"
                                        href="{{ route('manufacturerDetails', ['slug' => $topManufacturer->company_slug]) }}">
                                        Know more</a>
                                </h5>
                                <a href="javascript:void(0)" data-toggle="modal" data-target="#SendEnquiresModel"
                                    data-product-id="0" data-manufacturer-id="{{ $topManufacturer->id }}"
                                    onclick="SetDistributorshipAttr(this)" class="btn btn-theme w-100">Apply For
                                    Distributorship</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="top_dearlership">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 p-0">
                    <div class="heading_title">
                        <h5>Featured brand opportunities</h5>
                        <a class="btn btn-show-more" href="{{ route('listByFeaturedBrand') }}"> Show more</a>
                    </div>
                </div>
            </div>
            <div class="square_box row">
                @foreach ($featuredManufacturers as $featuredManufacturer)
                    <div class="col-lg-2 col-sm-4 col-12 p-0">
                        <div class="card">
                            @switch($featuredManufacturer->verify_status)
                                @case(1)
                                    <img src="{{ asset('frontend/image/premium.png') }}" alt=""
                                        class="verfiyed lazyload" />
                                @break

                                @case(2)
                                    <img src="{{ asset('frontend/image/verified.png') }}" alt=""
                                        class="verfiyed lazyload" />
                                @break

                                @case(3)
                                    <img src="{{ asset('frontend/image/trusted.png') }}" alt=""
                                        class="verfiyed lazyload" />
                                @break

                                @default
                            @endswitch
                            @if (Storage::exists($featuredManufacturer->company_logo))
                                <img class="card-img-top" src="{{ Storage::url($featuredManufacturer->company_logo) }}"
                                    alt="Card image cap" />
                            @endif
                            <div class="card-body px-0 pb-0">
                                <a href="javascript:void(0)"
                                    class="btn btn-distbt">{{ $featuredManufacturer->category->title }}</a>
                                <h4 class="card-title">{{ $featuredManufacturer->brand_name }}</h4>
                                <p class="m-0 text-dark">Investment Range</p>
                                <p class="card-title">{{ $featuredManufacturer->investment_range }}</p>
                                <h5 class="knw_mt">
                                    <a class="btn btn-theme btn-bdr w-100"
                                        href="{{ route('manufacturerDetails', ['slug' => $featuredManufacturer->company_slug]) }}">
                                        Know more</a>
                                </h5>
                                <a href="javascript:void(0)" data-toggle="modal" data-target="#SendEnquiresModel"
                                    data-product-id="0" data-manufacturer-id="{{ $featuredManufacturer->id }}"
                                    onclick="SetDistributorshipAttr(this)" class="btn btn-theme w-100">Send Enquiry</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>


    <section class="ask_sec">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 pd-r-10">
                    <div class="ask_img">
                        <img src="{{ asset('frontend/image/16604734904818.png') }}" alt="" />
                    </div>
                </div>
                <div class="col-md-6 pd-l-10">
                    <div class="post_requirement m-0">
                        <h3 class="pb-3">One Request, Multiple Opportunities</h3>
                        <form class="row" action="{{ route('sendRequirement') }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="form-group col-lg-6">
                                <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Name"
                                    name="name" value="" required />
                            </div>
                            <div class="form-group col-6">
                                <input type="text" class="form-control" id="formGroupExampleInput2"
                                    placeholder="Email Id" name="email" value="" required />
                            </div>
                            <div class="form-group col-6">
                                <input type="text" class="form-control" id="formGroupExampleInput2"
                                    placeholder="Mobile No." name="mobile" value="" required />
                            </div>
                            <div class="form-group col-6">
                                <input type="text" class="form-control" id="formGroupExampleInput2"
                                    placeholder="Location" name="location" value="" required />
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-theme">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
