<?php

namespace App\Http\Controllers;

use App\Models\Lead;
use App\Models\Manufacturer;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Yajra\DataTables\Facades\DataTables;

class LeadController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request()->ajax()) {
            $leads = Lead::orderBy('id', 'desc')->get();
            $dataTables = DataTables::of($leads)
                ->addColumn('expandRowLink', function ($row) {
                    $manufacturer = Manufacturer::find($row->manufacturer_id);
                    $product = Product::find($row->product_id);
                    return view('backend.leads.childtable', compact('row', 'manufacturer', 'product'))->render();
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
                ->rawColumns(['status','expandRowLink'])
                ->make(true);

            $content = $dataTables->getContent();
            $contentLength = strlen($content);

            return Response::make($content)
                ->header('Content-Type', 'application/json')
                ->header('Content-Length', $contentLength);
        }
        return view('backend.leads.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Lead $lead)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Lead $lead)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Lead $lead)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Lead $lead)
    {
        //
    }
}
