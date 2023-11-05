@extends('frontend.layouts.app')
@section('content')
    <section class="top_dearlership listing_sec">
        <div class="container-fluid">
            <div class="square_box square_box_fst row">
                <div class="col-lg-3 col-sm-4">
                    <div class="filter_box">
                        <div class="filter-heading">
                            <h3>Filter By Options</h3>
                        </div>
                        <div id="accordion">
                            <div class="card">
                                <button class="card-header collapsed card-link" data-toggle="collapse"
                                    data-target="#collapseOne"><b class="header-title float-left">Other Category</b><i
                                        class="fa fa-angle-up float-right "></i></button>
                                <div id="collapseOne" class="collapse show" data-parent="#accordion">
                                    <div class="card-body">
                                        <ul>
                                            @foreach ($otherCategories as $otherCategory)
                                                <li>
                                                    <a
                                                        href="{{ route('listByCategory', ['slug' => $otherCategory->slug]) }}">{!! $otherCategory->title !!}</a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="filter-heading d-block">
                            <h3>Top catogery</h3>
                            <ul>
                                @foreach (getHomeTopCategories() as $topCategory)
                                    <li>
                                        <a
                                            href="{{ route('listByCategory', ['slug' => $topCategory->slug]) }}">{!! $topCategory->title !!}</a>
                                    </li>
                                @endforeach

                            </ul>
                        </div>

                        <div class="filter-heading d-block">
                            <h3>Investment Renge</h3>
                            <ul>
                                <li>
                                    <a href="{{ route('listByInvestment', ['investment' => 'Under 5 Lacs']) }}">Under 5 Lacs</a>
                                </li>
                                <li>
                                    <a href="{{ route('listByInvestment', ['investment' => '5 Lacs - 20 Lacs']) }}">5 Lacs - 20 Lacs</a>
                                </li>
                                <li>
                                    <a href="{{ route('listByInvestment', ['investment' => '20 Lacs - 50 Lacs']) }}">20 Lacs - 50 Lacs</a>
                                </li>
                                <li>
                                    <a href="{{ route('listByInvestment', ['investment' => 'Above 50 Lacs']) }}">Above 50
                                        Lacs</a>
                                </li>

                            </ul>
                        </div>

                        <div class="filter-heading d-block">
                            <h3>States</h3>
                            <ul>
                                @foreach (config('indian_states') as $state)
                                    <li>
                                        <a href="{{ route('listByState', ['state' => $state]) }}">{{ $state }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 col-sm-8 bg-wht">
                    <div class="row">
                        <div class="col-12">
                            <div class="filter-heading">
                                <h3 class="mb-0">{!! $headerTitle !!}</h3>
                            </div>
                        </div>
                        @if ($manufacturers->isEmpty())
                            <div class="page-wrap d-flex flex-row align-items-center"
                                style="width:100% !important;margin-top:100px;">
                                <div class="container">
                                    <div class="row justify-content-center">
                                        <div class="col-md-8 text-center">
                                            <span class="display-1 d-block">OOPs!</span>
                                            <div class="mb-4 lead">We're sorry. There were no results found in our database.
                                            </div>
                                            <a href="{{ route('homepage') }}" class="btn btn-link">Back to Home</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @else
                            @foreach ($manufacturers as $manufacturer)
                                <div class="col-lg-4 col-sm-6 col-12 p-0">
                                    <div class="card">
                                        @if (Storage::exists($manufacturer->company_logo))
                                            <img class="card-img-top lazyload"
                                                src="{{ Storage::url($manufacturer->company_logo) }}" alt="Card image cap">
                                        @endif
                                        <div class="card-body px-0 pb-0">
                                            <a href="javascript:void(0)"
                                                class="btn btn-distbt">{{ $manufacturer->category->title }}</a>
                                            <h4 class="card-title">{{ $manufacturer->company_name }}</h4>
                                            <ul>
                                                <li class="text-dark">Investment Range</li>
                                                <li>{{ $manufacturer->investment_range }}</li>
                                                <li class="text-dark">Space Required</li>
                                                <li>{{ $manufacturer->space_required }}</li>
                                                <li>Location</li>
                                                <li>{{ substr($manufacturer->distributorship_location, 0, 120) }}...</li>
                                            </ul>
                                            <h5 class="knw_mt"><a class="btn btn-theme btn-bdr w-100"
                                                    href="{{ route('manufacturerDetails', ['slug' => $manufacturer->company_slug]) }}">
                                                    Know
                                                    more</a>
                                            </h5>
                                            <a href="javascript:void(0)" data-toggle="modal"
                                                data-target="#SendEnquiresModel" data-product-id="0"
                                                data-manufacturer-id="{{ $manufacturer->id }}"
                                                onclick="SetDistributorshipAttr(this)" class="btn btn-theme w-100">Apply For
                                                Distributorship</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
