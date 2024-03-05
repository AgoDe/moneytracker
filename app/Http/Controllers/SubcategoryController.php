<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubcategoryRequest;
use App\Models\Subcategory;
use Inertia\Inertia;

class SubcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subcategories = Subcategory::with('category')->get();
        return Inertia::render('Subcategories/Index', [
            'subcategories' => $subcategories
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Subcategories/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SubcategoryRequest $request)
    {
        $attributes = $request->validated();

        Subcategory::create($attributes);

        return redirect()->route('subcategories.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(Subcategory $subcategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Subcategory $subcategory)
    {
        return Inertia::render('Subcategories/Edit', [
            'subcategory' => $subcategory
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SubcategoryRequest $request, Subcategory $subcategory)
    {
        $attributes = $request->validated();
        $subcategory->update($attributes);
        return redirect()->route('subcategories.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Subcategory $subcategory)
    {
        //
    }
}
