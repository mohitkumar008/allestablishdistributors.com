<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Support\Str;
use App\Models\Manufacturer;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index(){
        return view('frontend.index');
    }

    public function listByCategory($slug){
        $category = Category::where('slug', $slug)->first();

        return view('frontend.listByCategory', compact('category'));
    }

    public function manufacturerDetails($slug){
        $manufacturer = Manufacturer::where('company_slug', $slug)->first();

        return view('frontend.manufacturerDetails', compact('manufacturer'));
    }
}
