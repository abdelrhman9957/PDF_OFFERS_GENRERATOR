<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Http\Requests\StorePageRequest;
use App\Http\Requests\UpdatePageRequest;
use App\Models\City;
use App\Models\Detail;
use App\Models\Hotel;
use App\Models\Meal;
use App\Models\OFFER;
use App\Models\Room;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(OFFER $offer)
    {

        //$page = Page::find(2);

        //dd($page->details);


        $hotels = Hotel::all();
        $rooms = Room::all();
        $meals = Meal::all();
        $details = Detail::all();
        $cities = City::all();
        return view('dashboard.offers_area.pages.index',compact(
            'offer',
            'hotels',
            'rooms',
            'meals',
            'details',
            'cities'
        ));
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
    public function store(StorePageRequest $request)
    {

        //dd($request->all());
        $page = new Page;
        $page->offer_id = $request->offer_id;
        $page->note = $request->note;
        $page->city_id = $request->city_id;
        $page->travel_type = $request->travel_type;
        $page->details_ids = implode(',', $request->details_ids);
        $page->save();
        return back()->with(['success'=>'تم إضافه البيانات بنجاح']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Page $page)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Page $page)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePageRequest $request, Page $page)
    {
        $page->note = $request->note;
        $page->details_ids = implode(',', $request->details_ids);
        if($request->has('city_id')){$page->city_id = $request->city_id;}
        $page->travel_type = $request->travel_type;
        $page->save();
        return back()->with(['success'=>'تم تحديث البيانات بنجاح']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Page $page)
    {

        foreach ($page->details as $detail) {
            $detail->delete();
        }
        $page->delete();

        return back()->with(['success'=>'تم حذف الصفحه بنجاح']);
    }
}
