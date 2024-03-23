<?php

namespace App\Http\Controllers;

use App\Models\PageDetail;
use App\Http\Requests\StorePageDetailRequest;
use App\Http\Requests\UpdatePageDetailRequest;

class PageDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(StorePageDetailRequest $request)
    {
        //dd($request->all());

        if($request->has('nights_one')){
            $page_details = new PageDetail;
            $page_details->page_id = $request->page_id;
            $page_details->user_id = auth()->id();
            $page_details->hotel_id = $request->hotel_one_id;
            $page_details->room_id = $request->room_one_id;
            $page_details->meal_id = $request->meal_one_id;
            $page_details->entry_date = $request->entry_date_one;
            $page_details->nights = $request->nights_one;
            $page_details->save();
        }

        if($request->confirm_two == 1){
            $page_details = new PageDetail;
            $page_details->page_id = $request->page_id;
            $page_details->user_id = auth()->id();
            $page_details->hotel_id = $request->hotel_two_id;
            $page_details->room_id = $request->room_two_id;
            $page_details->meal_id = $request->meal_two_id;
            $page_details->entry_date = $request->entry_date_two;
            $page_details->nights = $request->nights_two;
            $page_details->save();
        }


        if($request->confirm_three == 1){
            $page_details = new PageDetail;
            $page_details->page_id = $request->page_id;
            $page_details->user_id = auth()->id();
            $page_details->hotel_id = $request->hotel_three_id;
            $page_details->room_id = $request->room_three_id;
            $page_details->meal_id = $request->meal_three_id;
            $page_details->entry_date = $request->entry_date_three;
            $page_details->nights = $request->nights_three;
            $page_details->save();
        }

        return back()->with(['success'=>'تم إضافه البيانات بنجاح']);

    }

    /**
     * Display the specified resource.
     */
    public function show(PageDetail $pageDetail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PageDetail $pageDetail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePageDetailRequest $request)
    {
        //dd($request->all());
        if($request->has('nights_one')){
            $page_details = PageDetail::find($request->page_detail_one);
            $page_details->hotel_id = $request->hotel_one_id;
            $page_details->room_id = $request->room_one_id;
            $page_details->meal_id = $request->meal_one_id;
            $page_details->entry_date = $request->entry_date_one;
            $page_details->nights = $request->nights_one;
            $page_details->save();

            if($request->has('delete_one')){
                $page_details->delete();
            }
        }

        if($request->has('nights_two')){
            $page_details = PageDetail::find($request->page_detail_two);
            $page_details->hotel_id = $request->hotel_two_id;
            $page_details->room_id = $request->room_two_id;
            $page_details->meal_id = $request->meal_two_id;
            $page_details->entry_date = $request->entry_date_two;
            $page_details->nights = $request->nights_two;
            $page_details->save();

            if($request->has('delete_two')){
                $page_details->delete();
            }
        }


        if($request->has('nights_three')){
            $page_details = PageDetail::find($request->page_detail_three);
            $page_details->hotel_id = $request->hotel_three_id;
            $page_details->room_id = $request->room_three_id;
            $page_details->meal_id = $request->meal_three_id;
            $page_details->entry_date = $request->entry_date_three;
            $page_details->nights = $request->nights_three;
            $page_details->save();

            if($request->has('delete_three')){
                $page_details->delete();
            }
        }

        return back()->with(['success'=>'تم تحديث البيانات بنجاح']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PageDetail $pageDetail)
    {
        //
    }
}
