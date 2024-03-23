<?php

namespace App\Http\Controllers;

use App\Models\PDF;
use App\Http\Requests\StorePDFRequest;
use App\Http\Requests\UpdatePDFRequest;
use App\Models\City;
use App\Models\Detail;
use App\Models\Hotel;

class PDFController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cities = City::all();
        $details = Detail::all();
        return view('dashboard.pdf_area.generate_form', compact('details','cities'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function load_hotels($id)
    {
        $hotels = Hotel::where('city_id', $id)->pluck('name', 'id');

        return response()->json($hotels);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePDFRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(PDF $pDF)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PDF $pDF)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePDFRequest $request, PDF $pDF)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PDF $pDF)
    {
        //
    }
}
