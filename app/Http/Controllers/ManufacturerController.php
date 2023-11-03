<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Manufacturer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;
use Yajra\DataTables\Facades\DataTables;

class ManufacturerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request()->ajax()) {
            $manufacturers = Manufacturer::orderBy('id', 'desc')->get();
            $dataTables = DataTables::of($manufacturers)
                ->addColumn('editRowLink', function ($row) {
                    return route('manufacturers.edit', ['manufacturer' => $row->id]);
                })
                ->editColumn('status', function ($row) {
                    $output = '';
                    if ($row->status == 1) {
                        $output = '<span class="badge badge-success">Active</span>';
                    } else {
                        $output = '<span class="badge badge-warning">Inactive</span>';
                    }
                    return $output;
                })
                ->removeColumn('id')
                ->rawColumns(['status'])
                ->make(true);

            $content = $dataTables->getContent();
            $contentLength = strlen($content);

            return Response::make($content)
                ->header('Content-Type', 'application/json')
                ->header('Content-Length', $contentLength);
        }
        return view('backend.manufacturers.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $indianStates = config('indian_states');
        return view('backend.manufacturers.create', compact('categories', 'indianStates'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'first_name' => 'required',
            'company_logo' => 'required|image',
            'mobile_number' => 'required',
            'email' => 'required|email',
            'category_id' => 'required'
        ], [
            'category_id.required' => 'The category field is required'
        ]);
        try {
            DB::beginTransaction();
            $input = $request->only(["first_name", "last_name", "mobile_number", "email", "whatsapp_number", "category_id", "investment_range", "company_name", "states", "marketing_support", "sales_support", "term_renewable", "standard_distributorship_aggrement", "distributorship_terms_for", "margin_commission", "space_required", "gst_number", "brand_name", "number_of_employees", "annual_sales", "product_keywords", "distributors_benefits", "company_profile", "usp_of_products", "address", "establishment_year"]);
            $input['business_nature'] = $request->post('business_nature') ? implode(", ", $request->post('business_nature')) : "";
            $input['distributorship_location'] = $request->post('distributorship_location') ? implode(",", $request->post('distributorship_location')) : "";
            if ($request->hasFile('company_logo')) {
                $image = $request->file('company_logo');
                $imageName = time() . '_' . rand(1111, 9999) . '_' . $image->getClientOriginalName();
                $input['company_logo'] = $image->storeAs('public/uploads/', $imageName);
            }

            $manufacturer = Manufacturer::create($input);

            if ($request->product_name) {
                $i = 0;
                foreach ($request->product_name as $productName) {
                    $productInput = [
                        'product_name' => $request->product_name[$i],
                        'manufacturer_id' => $manufacturer->id,
                    ];
                    if ($request->hasFile('product_image.' . $i)) { // Make sure to use dot notation for array fields
                        $image = $request->file('product_image.' . $i);
                        if ($image) {
                            $imageName = time() . '_' . rand(1111, 9999) . '_' . $image->getClientOriginalName();
                            $productInput['product_image'] = $image->storeAs('public/uploads/', $imageName);
                        }
                    }

                    // Instead of using DB::table, create products using the Product model
                    Product::create($productInput);
                    $i++;
                }
            }
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::emergency("File: " . $th->getFile() . "\nLine: " . $th->getLine() . "\nMessage: " . $th->getMessage());
            return redirect()->back()->with('error', 'An error occurred. Please try again later.');
        }
        return redirect()->route('manufacturers.index')->with('success', 'Manufacturor created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Manufacturer $manufacturer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Manufacturer $manufacturer)
    {
        $categories = Category::all();
        $indianStates = config('indian_states');
        return view('backend.manufacturers.edit', compact('categories', 'indianStates', 'manufacturer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Manufacturer $manufacturer)
    {
        $request->validate([
            'first_name' => 'required',
            'company_logo' => 'image',
            'mobile_number' => 'required',
            'email' => 'required|email',
            'category_id' => 'required'
        ], [
            'category_id.required' => 'The category field is required'
        ]);
        try {
            DB::beginTransaction();
            $input = $request->only(["first_name", "last_name", "mobile_number", "email", "whatsapp_number", "category_id", "investment_range", "company_name", "states", "marketing_support", "sales_support", "term_renewable", "standard_distributorship_aggrement", "distributorship_terms_for", "margin_commission", "space_required", "gst_number", "brand_name", "number_of_employees", "annual_sales", "product_keywords", "distributors_benefits", "company_profile", "usp_of_products", "address", "establishment_year"]);
            $input['business_nature'] = $request->post('business_nature') ? implode(", ", $request->post('business_nature')) : "";
            $input['distributorship_location'] = $request->post('distributorship_location') ? implode(",", $request->post('distributorship_location')): "";
            if ($request->hasFile('company_logo')) {
                $image = $request->file('company_logo');
                $imageName = time() . '_' . rand(1111, 9999) . '_' . $image->getClientOriginalName();
                $input['company_logo'] = $image->storeAs('public/uploads/', $imageName);
            }

            $manufacturer->update($input);

            if ($request->product_name) {
                $i = 0;
                foreach ($request->product_name as $productName) {
                    $productInput = [
                        'product_name' => $request->product_name[$i],
                        'manufacturer_id' => $manufacturer->id,
                    ];
                    if ($request->hasFile('product_image.' . $i)) { // Make sure to use dot notation for array fields
                        $image = $request->file('product_image.' . $i);
                        if ($image) {
                            $imageName = time() . '_' . rand(1111, 9999) . '_' . $image->getClientOriginalName();
                            $productInput['product_image'] = $image->storeAs('public/uploads/', $imageName);
                        }
                    }

                    // Instead of using DB::table, create products using the Product model
                    Product::create($productInput);
                    $i++;
                }
            }
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::emergency("File: " . $th->getFile() . "\nLine: " . $th->getLine() . "\nMessage: " . $th->getMessage());
            return redirect()->back()->with('error', 'An error occurred. Please try again later.');
        }
        return redirect()->route('manufacturers.index')->with('success', 'Manufacturor updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Manufacturer $manufacturer)
    {
        //
    }
}
