<?php

namespace App\Http\Controllers;

use App\Models\Lead;
use App\Models\Category;
use Illuminate\Support\Str;
use App\Models\Manufacturer;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index(){
        $getTopCategories = Category::top()->limit(12)->get();
        $topManufacturers = Manufacturer::where('top', 1)->limit(8)->get();
        $featuredManufacturers = Manufacturer::where('featured', 1)->limit(24)->get();
        return view('frontend.index', compact('getTopCategories', 'topManufacturers', 'featuredManufacturers'));
    }

    public function listByCategory($slug){
        $category = Category::where('slug', $slug)->first();
        $headerTitle = $category->title;
        $otherCategories = Category::whereNull('parent_id')->select('id', 'title', 'slug')->get();
        $manufacturers = Manufacturer::where('category_id', $category->id)->get();
        return view('frontend.list', compact('headerTitle', 'otherCategories', 'manufacturers'));
    }

    public function listByInvestment($investment){
        $headerTitle = 'Listing By Investment - '.$investment;
        $otherCategories = Category::whereNull('parent_id')->select('id', 'title', 'slug')->get();
        $manufacturers = Manufacturer::where('investment_range', $investment)->get();
        return view('frontend.list', compact('headerTitle', 'otherCategories', 'manufacturers'));
    }

    public function listByState($state){
        $headerTitle = 'Listing By State - '.$state;
        $otherCategories = Category::whereNull('parent_id')->select('id', 'title', 'slug')->get();
        $manufacturers = Manufacturer::where('states', $state)->get();
        return view('frontend.list', compact('headerTitle', 'otherCategories', 'manufacturers'));
    }

    public function manufacturerDetails($slug){
        $manufacturer = Manufacturer::where('company_slug', $slug)->first();

        return view('frontend.manufacturerDetails', compact('manufacturer'));
    }

    public function sendRequirement(Request $request){
        
        try {
            $input = $request->all();
            Lead::create($input);
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('error', 'Something went wrong');
        }
        return redirect()->back()->with('success', 'Request sent successfully');
    }

    public function search(Request $request){
        $manufacturers = Manufacturer::where('product_keywords', 'like', '%'.$request->search.'%')->get();

        $headerTitle = 'Listing By State - '.$request->search;
        $otherCategories = Category::whereNull('parent_id')->select('id', 'title', 'slug')->get();
        return view('frontend.list', compact('headerTitle', 'otherCategories', 'manufacturers'));
    }
}
