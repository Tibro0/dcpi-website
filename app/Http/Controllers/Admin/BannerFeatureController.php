<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\BannerFeatureDataTable;
use App\Http\Controllers\Controller;
use App\Models\BannerFeature;
use Illuminate\Http\Request;

class BannerFeatureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(BannerFeatureDataTable $dataTable)
    {
        return $dataTable->render('admin.banner-feature.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.banner-feature.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'icon' => ['required', 'max:255'],
            'title' => ['required', 'max:255'],
            'description' => ['required', 'max:255'],
            'status' => ['required', 'boolean'],
        ]);

        $bannerFeature = new BannerFeature();
        $bannerFeature->icon = $request->icon;
        $bannerFeature->title = $request->title;
        $bannerFeature->description = $request->description;
        $bannerFeature->status = $request->status;
        $bannerFeature->save();

        toastr()->success('Created Successfully!');
        return redirect()->route('admin.banner-feature.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $bannerFeature = BannerFeature::findOrFail($id);
        return view('admin.banner-feature.edit', compact('bannerFeature'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'icon' => ['required', 'max:255'],
            'title' => ['required', 'max:255'],
            'description' => ['required', 'max:255'],
            'status' => ['required', 'boolean'],
        ]);

        $bannerFeature = BannerFeature::findOrFail($id);
        $bannerFeature->icon = $request->icon;
        $bannerFeature->title = $request->title;
        $bannerFeature->description = $request->description;
        $bannerFeature->status = $request->status;
        $bannerFeature->save();

        toastr()->success('Updated Successfully!');
        return redirect()->route('admin.banner-feature.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $bannerFeature = BannerFeature::findOrFail($id);
        $bannerFeature->delete();

        return response(['status' => 'success', 'message' => 'Deleted Successfully!']);
    }
}
