@extends('backend.layouts.app')

@section('css')
    <style>
        td.details-control {
            background: url('assets/images/details_open.png') no-repeat center center;
            cursor: pointer;
        }

        tr.shown td.details-control {
            background: url('assets/images/details_close.png') no-repeat center center;
        }
    </style>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <h2>Add Manufacturers</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a><i class="fa fa-dashboard"></i></a>
                        </li>
                        <li class="breadcrumb-item active">Add Manufacturers</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row clearfix">
            <div class="col-md-12 mx-auto">
                <div class="card">
                    <div class="body">
                        <form id="add-manufacturor" method="post" action="{{ route('manufacturers.store') }}" novalidate
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>Company Logo<span class="text-warning">*</span></label>
                                        <input type="file"
                                            class="form-control @error('company_logo') parsley-error @enderror"
                                            name="company_logo">
                                        @error('company_logo')
                                            <ul class="parsley-errors-list filled">
                                                <li class="parsley-required">{{ $message }}</li>
                                            </ul>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>First Name<span class="text-warning">*</span></label>
                                        <input type="text"
                                            class="form-control @error('first_name') parsley-error @enderror"
                                            name="first_name" id="first_name" value="{{ old('first_name') }}">
                                        @error('first_name')
                                            <ul class="parsley-errors-list filled">
                                                <li class="parsley-required">{{ $message }}</li>
                                            </ul>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>Last Name</label>
                                        <input type="text"
                                            class="form-control @error('last_name') parsley-error @enderror"
                                            name="last_name" value="{{ old('last_name') }}">
                                        @error('last_name')
                                            <ul class="parsley-errors-list filled">
                                                <li class="parsley-required">{{ $message }}</li>
                                            </ul>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>Mobile Number<span class="text-warning">*</span></label>
                                        <input type="text"
                                            class="form-control @error('mobile_number') parsley-error @enderror"
                                            name="mobile_number" value="{{ old('mobile_number') }}">
                                        @error('mobile_number')
                                            <ul class="parsley-errors-list filled">
                                                <li class="parsley-required">{{ $message }}</li>
                                            </ul>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>Email<span class="text-warning">*</span></label>
                                        <input type="email" name="email"
                                            class="form-control @error('email') parsley-error @enderror"
                                            value="{{ old('email') }}">
                                        @error('email')
                                            <ul class="parsley-errors-list filled">
                                                <li class="parsley-required">{{ $message }}</li>
                                            </ul>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" name="password"
                                            class="form-control @error('password') parsley-error @enderror" disabled>
                                        @error('password')
                                            <ul class="parsley-errors-list filled">
                                                <li class="parsley-required">{{ $message }}</li>
                                            </ul>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>Whatsapp Number</label>
                                        <input type="text"
                                            class="form-control @error('whatsapp_number') parsley-error @enderror"
                                            name="whatsapp_number" value="{{ old('whatsapp_number') }}">
                                        @error('whatsapp_number')
                                            <ul class="parsley-errors-list filled">
                                                <li class="parsley-required">{{ $message }}</li>
                                            </ul>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="form-select form-group">
                                        <label>Select Category<span class="text-warning">*</span></label>
                                        <div class="">
                                            <select name="category_id"
                                                class="form-control @error('category_id') parsley-error @enderror">
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}"
                                                        {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                                        {{ $category->title }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @error('category_id')
                                            <ul class="parsley-errors-list filled">
                                                <li class="parsley-required">{{ $message }}</li>
                                            </ul>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-select form-group">
                                        <label>Investment Range</label>
                                        <div class="">
                                            <select name="investment_range"
                                                class="form-control @error('investment_range') parsley-error @enderror">
                                                <option value="" selected disabled>Please select</option>
                                                <option value="25 K to 50 K"
                                                    {{ old('investment_range') == '25 K to 50 K' ? 'selected' : '' }}>25 K
                                                    to 50 K</option>
                                                <option value="50 K to 1 Lac"
                                                    {{ old('investment_range') == '50 K to 1 Lac' ? 'selected' : '' }}>50 K
                                                    to 1 Lac</option>
                                                <option value="1 Lac to 2 Lacs"
                                                    {{ old('investment_range') == '1 Lac to 2 Lacs' ? 'selected' : '' }}>1
                                                    Lac to 2 Lacs</option>
                                                <option value="2 Lacs to 3 Lacs"
                                                    {{ old('investment_range') == '2 Lacs to 3 Lacs' ? 'selected' : '' }}>2
                                                    Lacs to 3 Lacs</option>
                                                <option value="3 Lacs to 5 Lacs"
                                                    {{ old('investment_range') == '3 Lacs to 5 Lacs' ? 'selected' : '' }}>3
                                                    Lacs to 5 Lacs</option>
                                                <option value="5 Lacs to 7 Lacs"
                                                    {{ old('investment_range') == '5 Lacs to 7 Lacs' ? 'selected' : '' }}>5
                                                    Lacs to 7 Lacs</option>
                                                <option value="7 Lacs to 10 Lacs"
                                                    {{ old('investment_range') == '7 Lacs to 10 Lacs' ? 'selected' : '' }}>
                                                    7 Lacs to 10 Lacs</option>
                                                <option value="10 Lacs to 15 Lacs"
                                                    {{ old('investment_range') == '10 Lacs to 15 Lacs' ? 'selected' : '' }}>
                                                    10 Lacs to 15 Lacs</option>
                                                <option value="15 Lacs to 20 Lacs"
                                                    {{ old('investment_range') == '15 Lacs to 20 Lacs' ? 'selected' : '' }}>
                                                    15 Lacs to 20 Lacs</option>
                                                <option value="20 Lacs to 30 Lacs"
                                                    {{ old('investment_range') == '20 Lacs to 30 Lacs' ? 'selected' : '' }}>
                                                    20 Lacs to 30 Lacs</option>
                                                <option value="30 Lacs to 40 Lacs"
                                                    {{ old('investment_range') == '30 Lacs to 40 Lacs' ? 'selected' : '' }}>
                                                    30 Lacs to 40 Lacs</option>
                                                <option value="40 Lacs to 50 Lacs"
                                                    {{ old('investment_range') == '40 Lacs to 50 Lacs' ? 'selected' : '' }}>
                                                    40 Lacs to 50 Lacs</option>
                                                <option value="Above 50 Lacs"
                                                    {{ old('investment_range') == 'Above 50 Lacs' ? 'selected' : '' }}>
                                                    Above 50 Lacs</option>
                                            </select>
                                        </div>
                                        @error('investment_range')
                                            <ul class="parsley-errors-list filled">
                                                <li class="parsley-required">{{ $message }}</li>
                                            </ul>
                                        @enderror
                                    </div>
                                </div>


                            </div>
                            <hr>
                            <div class="row">

                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>Company Name</label>
                                        <input type="text"
                                            class="form-control @error('company_name') parsley-error @enderror"
                                            name="company_name" value="{{ old('company_name') }}">
                                        @error('company_name')
                                            <ul class="parsley-errors-list filled">
                                                <li class="parsley-required">{{ $message }}</li>
                                            </ul>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="form-select form-group">
                                        <label>State</label>
                                        <div class="">
                                            <select name="states"
                                                class="form-control @error('states') parsley-error @enderror">
                                                <option value="" selected disabled>Please select</option>
                                                @if ($indianStates)
                                                    @foreach ($indianStates as $state)
                                                        <option value="{{ $state }}">{{ $state }}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                        @error('states')
                                            <ul class="parsley-errors-list filled">
                                                <li class="parsley-required">{{ $message }}</li>
                                            </ul>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>Marketing Support</label>
                                        <div class="">
                                            <select name="marketing_support"
                                                class="form-control @error('marketing_support') parsley-error @enderror">
                                                <option value="0">No</option>
                                                <option value="1">Yes</option>
                                            </select>
                                        </div>
                                        @error('marketing_support')
                                            <ul class="parsley-errors-list filled">
                                                <li class="parsley-required">{{ $message }}</li>
                                            </ul>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>Sales Support</label>
                                        <div class="">
                                            <select name="sales_support"
                                                class="form-control @error('sales_support') parsley-error @enderror">
                                                <option value="0">No</option>
                                                <option value="1">Yes</option>
                                            </select>
                                        </div>
                                        @error('sales_support')
                                            <ul class="parsley-errors-list filled">
                                                <li class="parsley-required">{{ $message }}</li>
                                            </ul>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>Term Renewable</label>
                                        <div class="">
                                            <select name="term_renewable"
                                                class="form-control @error('term_renewable') parsley-error @enderror">
                                                <option value="0">No</option>
                                                <option value="1">Yes</option>
                                            </select>
                                        </div>
                                        @error('term_renewable')
                                            <ul class="parsley-errors-list filled">
                                                <li class="parsley-required">{{ $message }}</li>
                                            </ul>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>Standard Distributorship Aggrement</label>
                                        <div class="">
                                            <select name="standard_distributorship_aggrement"
                                                class="form-control @error('standard_distributorship_aggrement') parsley-error @enderror">
                                                <option value="0">No</option>
                                                <option value="1">Yes</option>
                                            </select>
                                        </div>
                                        @error('standard_distributorship_aggrement')
                                            <ul class="parsley-errors-list filled">
                                                <li class="parsley-required">{{ $message }}</li>
                                            </ul>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>Distributorship Terms For</label>
                                        <input type="text"
                                            class="form-control @error('distributorship_terms_for') parsley-error @enderror"
                                            name="distributorship_terms_for"
                                            value="{{ old('distributorship_terms_for') }}">
                                        @error('distributorship_terms_for')
                                            <ul class="parsley-errors-list filled">
                                                <li class="parsley-required">{{ $message }}</li>
                                            </ul>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>Margin Commission</label>
                                        <input type="text"
                                            class="form-control @error('margin_commission') parsley-error @enderror"
                                            name="margin_commission" value="{{ old('margin_commission') }}">
                                        @error('margin_commission')
                                            <ul class="parsley-errors-list filled">
                                                <li class="parsley-required">{{ $message }}</li>
                                            </ul>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>Space</label>
                                        <input type="text"
                                            class="form-control @error('space_required') parsley-error @enderror"
                                            name="space_required" value="{{ old('space_required') }}">
                                        @error('space_required')
                                            <ul class="parsley-errors-list filled">
                                                <li class="parsley-required">{{ $message }}</li>
                                            </ul>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>GST Number</label>
                                        <input type="text"
                                            class="form-control @error('gst_number') parsley-error @enderror"
                                            name="gst_number" value="{{ old('gst_number') }}">
                                        @error('gst_number')
                                            <ul class="parsley-errors-list filled">
                                                <li class="parsley-required">{{ $message }}</li>
                                            </ul>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>Brand Name</label>
                                        <input type="text"
                                            class="form-control @error('brand_name') parsley-error @enderror"
                                            name="brand_name" value="{{ old('brand_name') }}">
                                        @error('brand_name')
                                            <ul class="parsley-errors-list filled">
                                                <li class="parsley-required">{{ $message }}</li>
                                            </ul>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>Business Nature</label>
                                        <div class="">
                                            <select name="business_nature[]"
                                                class="form-control select2 @error('business_nature') parsley-error @enderror"
                                                multiple="multiple">
                                                <option value="Manufactror">Manufactror</option>
                                                <option value="Distributor">Distributor</option>
                                                <option value="Trader">Trader</option>
                                                <option value="Supplier">Supplier</option>
                                                <option value="Importer">Importer</option>
                                                <option value="Explorer">Explorer</option>
                                            </select>
                                        </div>
                                        @error('business_nature')
                                            <ul class="parsley-errors-list filled">
                                                <li class="parsley-required">{{ $message }}</li>
                                            </ul>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>Establishment Year</label>
                                        <input type="text"
                                            class="form-control @error('establishment_year') parsley-error @enderror"
                                            name="establishment_year" value="{{ old('establishment_year') }}">
                                        @error('establishment_year')
                                            <ul class="parsley-errors-list filled">
                                                <li class="parsley-required">{{ $message }}</li>
                                            </ul>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>Number of Employees</label>
                                        <input type="text"
                                            class="form-control @error('number_of_employees') parsley-error @enderror"
                                            name="number_of_employees" value="{{ old('number_of_employees') }}">
                                        @error('number_of_employees')
                                            <ul class="parsley-errors-list filled">
                                                <li class="parsley-required">{{ $message }}</li>
                                            </ul>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>Annual Sales</label>
                                        <input type="text"
                                            class="form-control @error('annual_sales') parsley-error @enderror"
                                            name="annual_sales" value="{{ old('annual_sales') }}">
                                        @error('annual_sales')
                                            <ul class="parsley-errors-list filled">
                                                <li class="parsley-required">{{ $message }}</li>
                                            </ul>
                                        @enderror
                                    </div>
                                </div>


                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>Products Keywords <small class="text-info">(seperate by
                                                comma)</small></label>
                                        <input type="text"
                                            class="form-control @error('product_keywords') parsley-error @enderror"
                                            name="product_keywords" value="{{ old('product_keywords') }}">
                                        @error('product_keywords')
                                            <ul class="parsley-errors-list filled">
                                                <li class="parsley-required">{{ $message }}</li>
                                            </ul>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>Distributors Benefits</label>
                                        <textarea name="distributors_benefits" class="form-control summernote" cols="30" rows="10">{{ old('distributors_benefits') }}</textarea>
                                        @error('distributors_benefits')
                                            <ul class="parsley-errors-list filled">
                                                <li class="parsley-required">{{ $message }}</li>
                                            </ul>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>Distributorship Location</label>
                                        <div class="row" id="distributorship_location_section">
                                            <div class="col-lg-3">
                                                <div class="fancy-checkbox">
                                                    <label><input type="checkbox"
                                                            id="distributorship_location_selectall"><span>Select
                                                            All</span></label>
                                                </div>
                                            </div>
                                            @if ($indianStates)
                                                @foreach ($indianStates as $state)
                                                    <div class="col-lg-3">
                                                        <div class="fancy-checkbox">
                                                            <label><input type="checkbox"
                                                                    name="distributorship_location[]"
                                                                    value="{{ $state }}"><span>{{ $state }}</span></label>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @endif
                                        </div>
                                        @error('distributors_benefits')
                                            <ul class="parsley-errors-list filled">
                                                <li class="parsley-required">{{ $message }}</li>
                                            </ul>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>Company Profile</label>
                                        <textarea name="company_profile" class="form-control summernote" cols="30" rows="10">{{ old('company_profile') }}</textarea>
                                        @error('company_profile')
                                            <ul class="parsley-errors-list filled">
                                                <li class="parsley-required">{{ $message }}</li>
                                            </ul>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>USP of Products</label>
                                        <textarea name="usp_of_products" class="form-control summernote" cols="30" rows="10">{{ old('usp_of_products') }}</textarea>
                                        @error('usp_of_products')
                                            <ul class="parsley-errors-list filled">
                                                <li class="parsley-required">{{ $message }}</li>
                                            </ul>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>Address</label>
                                        <textarea name="address" class="form-control summernote" cols="30" rows="10">{{ old('address') }}</textarea>
                                        @error('address')
                                            <ul class="parsley-errors-list filled">
                                                <li class="parsley-required">{{ $message }}</li>
                                            </ul>
                                        @enderror
                                    </div>
                                </div>

                            </div>
                            <hr>
                            <div class="row" id="productsSection">
                                <div class="col-lg-12">
                                    <h6>Products<button type="button" class="btn btn-primary" id="addProduct">+</button></h6>
                                </div>
                            </div>
                            <br>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

@section('scripts')
    <script>
        $('#add-manufacturor').parsley();
        $(document).on('load', function() {
            $('#first_name').trigger('focus');
        });

        $(document).on('click', '#distributorship_location_selectall', function() {
            let input = $(this).parents('#distributorship_location_section').find('input')
            if ($(this).is(':checked')) {
                input.prop('checked', true);
            } else {
                input.prop('checked', false);
            }
        });

        $(document).on('click', '#addProduct', function() {
            var productDiv = `
            <div class="col-lg-12">
                <div class="d-flex align-items-center  mb-2">
                    <span>
                        <input type="text" class="form-control" placeholder="Product name" name="product_name[]" required>
                    </span>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                    <span>
                        <input type="file" name="product_image[]" required>
                    </span>
                    <button type="button" class="btn btn-warning" id="removeProduct">-</button>
                </div>
            </div>
            `;
            $('#productsSection').append(productDiv);
        })
        $(document).on('click', '#removeProduct', function() {
            $(this).closest('.d-flex').remove();
        })
    </script>
@endsection
