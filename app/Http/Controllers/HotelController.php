<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use App\Http\Requests\StoreHotelRequest;
use App\Http\Requests\UpdateHotelRequest;
use App\Models\City;
use Illuminate\Http\Request;
use DataTables;
class HotelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $cities = City::all();

        if ($request->ajax()) {
            $data = Hotel::query()->select(['id', 'name','city_id','created_at']);

            return Datatables::of($data)
                ->addIndexColumn()
                ->editColumn('created_at', function($data) {
                    return $data->created_at->format('Y-m-d');
                })
                ->addColumn('city', function($data){
                    return $data->city->name;
                })
                ->addColumn('action', function($data) use ($cities){
                    return view('dashboard.hotels.action_file', [
                        'data' => $data,
                        'cities_for_update'=>$cities,
                    ])->render();
                })
                ->rawColumns(['action','city'])
                ->make(true);
        }
        return view('dashboard.hotels.index',compact('cities'));

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
    public function store(StoreHotelRequest $request)
    {
        //dd($request->all());
        $hotel = new Hotel;
        $hotel->name = $request->name;
        $hotel->city_id = $request->city_id;
        $hotel->save();
        return back()->with(['success'=>'تم إضافه البيانات بنجاح']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Hotel $hotel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Hotel $hotel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateHotelRequest $request, Hotel $hotel)
    {
        $hotel->name = $request->name;
        $hotel->city_id = $request->city_id;
        $hotel->save();
        return back()->with(['update'=>'تم تحديث البيانات  ']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Hotel $hotel)
    {
        //
    }
}
