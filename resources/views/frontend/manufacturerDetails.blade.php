@extends('frontend.layouts.app')
@section('content')
    <section class="brand_info_sec mt-7">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="filter-heading">
                        <h3 class="mb-0">{{ $manufacturer->company_name }}</h3>
                        <span class="p-2">
                            <b>GST No: </b>{{ $manufacturer->gst_number }} </span>
                        <a href="javascript:void(0)" data-toggle="modal" data-target="#SendEnquiresModel"
                            data-product-id="0" data-manufacturer-id="{{ $manufacturer->id }}"
                            onclick="SetDistributorshipAttr(this)" class="btn btn-theme">Enquiry now</a>
                    </div>
                </div>
            </div>
            <div class="brand_information row w-100 m-0">
                <div class="col-md-2">
                    <div class="brand_img">
                        @if (Storage::exists($manufacturer->company_logo))
                            <img src="{{ Storage::url($manufacturer->company_logo) }}" alt="" class="lazyload">
                        @endif
                    </div>
                </div>
                <div class="col-md-10">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="brand_title">
                                <h5>Brand Name:</h5>
                                <p>{{ $manufacturer->brand_name }}</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="brand_title">
                                <h5>Establisment Year:</h5>
                                <p>{{ $manufacturer->establishment_year }}</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="brand_title">
                                <h5>Margin/Commission</h5>
                                <p>{{ $manufacturer->margin_commission }}</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="brand_title">
                                <h5>Space Required:</h5>
                                <p>{{ $manufacturer->space_required }}</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="brand_title">
                                <h5>Marketing Support :</h5>
                                <p>{{ $manufacturer->marketing_support == 1 ? 'Yes' : 'No' }}</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="brand_title">
                                <h5>Investment Range:</h5>
                                <p>{{ $manufacturer->investment_range }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="barnd_menu">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 p-0">
                    <ul>
                        <li>
                            <a href="#product_range">Our Product Range</a>
                        </li>
                        <li>
                            <a href="#comp_info">Company Profile</a>
                        </li>
                        <li>
                            <a href="#distrb_sec">Distributors Benefits</a>
                        </li>
                        <li>
                            <a href="#agreement_sec">Agreement and Term Details</a>
                        </li>
                        <li>
                            <a href="#contactor_sec">Contact Us</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section class="testmnial_sec" id="product_range">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="owl-carousel slider-items owl-carousel owl-loaded owl-drag">
                        <div class="owl-stage-outer">
                            <div class="owl-stage">

                                @foreach ($manufacturer->products as $product)
                                    <div class="owl-item active">
                                        <div class="item">
                                            @if (Storage::exists($product->product_image))
                                                <img src="{{ Storage::url($product->product_image) }}" alt=""
                                                    class="lazyload">
                                            @endif
                                            <div class="pop_bottom">
                                                <h5>{{ $product->product_name }}</h5>
                                                <a href="javascript:void(0)" data-toggle="modal"
                                                    data-target="#SendEnquiresModel" data-product-id="{{ $product->id }}"
                                                    data-manufacturer-id="{{ $manufacturer->id }}"
                                                    onclick="SetDistributorshipAttr(this)"
                                                    class="btn btn-theme w-100 btn-prod">Apply For Distributorship</a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="band_company_detail" id="comp_info">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 ">
                    <div class="row">
                        <div class="col-12 p-0">
                            <div class="heading_title">
                                <h5>Company Profile</h5>
                            </div>
                        </div>
                        <div class="col-12">
                            <div>
                                {!! $manufacturer->company_profile !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="band_company_detail" id="distrb_sec">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 ">
                    <div class="row">
                        <div class="col-12 p-0">
                            <div class="heading_title">
                                <h5>Distributors Benefits</h5>
                            </div>
                        </div>
                        <div class="col-12">
                            <div>
                                {!! $manufacturer->distributors_benefits !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class=" list_style_design">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 ">
                    <div class="row">
                        <div class="col-12 p-0">
                            <div class="heading_title">
                                <h5>Distributionship Locations</h5>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="filter-heading d-block">
                                <ul>
                                    @php
                                        $locations = explode(',', $manufacturer->distributorship_location);
                                        $product_keywords = explode(',', $manufacturer->product_keywords);
                                    @endphp
                                    @foreach ($locations as $state)
                                        <li>
                                            <a href="javascript:void(0)">{{ $state }}</a>
                                        </li>
                                    @endforeach

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class=" list_style_design">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 ">
                    <div class="row">
                        <div class="col-12 p-0">
                            <div class="heading_title">
                                <h5>Products Keywords</h5>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="filter-heading d-block">
                                <ul>
                                    @foreach ($product_keywords as $keyword)
                                        <li>
                                            <a href="javascript:void(0)">{{ $keyword }}</a>
                                        </li>
                                    @endforeach

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="band_company_detail" id="agreement_sec">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 ">
                    <div class="row">
                        <div class="col-12 p-0">
                            <div class="heading_title">
                                <h5>Agreement and Term Details</h5>
                            </div>
                        </div>
                        <div class="col-12">
                            <p>Do you have a standard distributorship agreement?
                                <span>{{ $manufacturer->standard_distributorship_aggrement == 1 ? 'Yes' : 'No' }}</span>
                            </p>
                            <p>How long is the distributorship term for?
                                <span>{{ $manufacturer->distributorship_terms_for }}</span>
                            </p>
                            <p>Is the term renewable? <span>{{ $manufacturer->term_renewable == 1 ? 'Yes' : 'No' }}</span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="band_company_detail" id="contactor_sec">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 ">
                    <div class="row">
                        <div class="col-12 p-0">
                            <div class="heading_title">
                                <h5>Contact Details</h5>
                            </div>
                        </div>
                        <div class="col-12">
                            {!! $manufacturer->address !!}
                        </div>
                        <div class="col-12 text-center">
                            <a href="javascript:void(0)" data-toggle="modal" data-target="#SendEnquiresModel"
                                data-product-id="0" data-manufacturer-id="{{ $manufacturer->id }}"
                                onclick="SetDistributorshipAttr(this)" class="btn btn-theme mt-3">Apply For
                                Distributorship</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
