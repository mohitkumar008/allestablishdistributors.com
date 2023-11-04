<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Response;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request()->ajax()) {
            $categories = Category::orderBy('id', 'desc')->get();
            $dataTables = DataTables::of($categories)
                ->addColumn('editRowLink', function ($row) {
                    return route('categories.edit', ['category' => $row->id]);
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
        return view('backend.categories.index');
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
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        //
    }
}
