<?php

namespace App\Http\Controllers;

use App\Models\Lead;
use App\Models\Category;
use Illuminate\Support\Str;
use App\Models\Manufacturer;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        $getTopCategories = Category::homeTop()->get();
        $getTopBrands = Manufacturer::active()->topBrand()->get();
        $topManufacturers = Manufacturer::active()->where('top', 1)->limit(8)->get();
        $featuredManufacturers = Manufacturer::active()->where('featured', 1)->limit(24)->get();
        return view('frontend.index', compact('getTopCategories', 'topManufacturers', 'featuredManufacturers', 'getTopBrands'));
    }

    public function topCategories()
    {
        $getTopCategories = Category::top()->get();
        return view('frontend.topCategories', compact('getTopCategories'));
    }

    public function listByCategory($slug)
    {
        $category = Category::where('slug', $slug)->first();
        $headerTitle = $category->title;
        $otherCategories = Category::whereNull('parent_id')->select('id', 'title', 'slug')->get();
        $manufacturers = Manufacturer::active()->where('category_id', $category->id)->get();
        return view('frontend.list', compact('headerTitle', 'otherCategories', 'manufacturers'));
    }

    public function listByTopBrands()
    {
        $headerTitle = 'Listing By Top Brands';
        $otherCategories = Category::whereNull('parent_id')->select('id', 'title', 'slug')->get();
        $manufacturers = Manufacturer::active()->where('top_brands', 1)->get();
        return view('frontend.list', compact('headerTitle', 'otherCategories', 'manufacturers'));
    }

    public function listByTopDealership()
    {
        $headerTitle = 'Listing By Top Delarship';
        $otherCategories = Category::whereNull('parent_id')->select('id', 'title', 'slug')->get();
        $manufacturers = Manufacturer::active()->topDealerShip()->get();
        return view('frontend.list', compact('headerTitle', 'otherCategories', 'manufacturers'));
    }

    public function listByFeaturedBrand()
    {
        $headerTitle = 'Listing By Featured Brands';
        $otherCategories = Category::whereNull('parent_id')->select('id', 'title', 'slug')->get();
        $manufacturers = Manufacturer::active()->featuredBrand()->get();
        return view('frontend.list', compact('headerTitle', 'otherCategories', 'manufacturers'));
    }

    public function listByInvestment($investment)
    {
        $headerTitle = 'Listing By Investment - ' . $investment;
        $otherCategories = Category::whereNull('parent_id')->select('id', 'title', 'slug')->get();
        switch ($investment) {
            case 'Under 5 Lacs':
                $manufacturers = Manufacturer::active()->whereIn('investment_range', ['25 K to 50 K', '50 K to 1 Lac', '1 Lac to 2 Lacs', '2 Lacs to 3 Lacs', '3 Lacs to 5 Lacs'])->get();
                break;

            case '5 Lacs - 20 Lacs':
                $manufacturers = Manufacturer::active()->whereIn('investment_range', ['5 Lacs to 7 Lacs', '7 Lacs to 10 Lacs', '10 Lacs to 15 Lacs', '15 Lacs to 20 Lacs'])->get();
                break;

            case '20 Lacs - 50 Lacs':
                $manufacturers = Manufacturer::active()->whereIn('investment_range', ['20 Lacs to 30 Lacs', '30 Lacs to 40 Lacs', '40 Lacs to 50 Lacs'])->get();
                break;

            default:
                $manufacturers = Manufacturer::active()->where('investment_range', $investment)->get();
                break;
        }
        return view('frontend.list', compact('headerTitle', 'otherCategories', 'manufacturers'));
    }

    public function listByState($state)
    {
        $headerTitle = 'Listing By State - ' . $state;
        $otherCategories = Category::whereNull('parent_id')->select('id', 'title', 'slug')->get();
        $manufacturers = Manufacturer::active()->where('states', $state)->get();
        return view('frontend.list', compact('headerTitle', 'otherCategories', 'manufacturers'));
    }

    public function manufacturerDetails($slug)
    {
        $manufacturer = Manufacturer::active()->where('company_slug', $slug)->first();

        return view('frontend.manufacturerDetails', compact('manufacturer'));
    }

    public function sendRequirement(Request $request)
    {

        try {
            $input = $request->all();
            Lead::create($input);
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('error', 'Something went wrong');
        }
        return redirect()->back()->with('success', 'Request sent successfully');
    }

    public function search(Request $request)
    {
        $manufacturers = Manufacturer::active()->where('product_keywords', 'like', '%' . $request->search . '%')->get();

        $headerTitle = 'Listing By State - ' . $request->search;
        $otherCategories = Category::whereNull('parent_id')->select('id', 'title', 'slug')->get();
        return view('frontend.list', compact('headerTitle', 'otherCategories', 'manufacturers'));
    }
}
