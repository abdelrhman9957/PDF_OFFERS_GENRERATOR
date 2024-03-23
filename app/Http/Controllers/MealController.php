<?php

namespace App\Http\Controllers;

use App\Models\Meal;
use App\Http\Requests\StoreMealRequest;
use App\Http\Requests\UpdateMealRequest;
use Illuminate\Http\Request;
use DataTables;

class MealController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Meal::query()->select(['id', 'name', 'created_at']);

            return Datatables::of($data)
                ->addIndexColumn()
                ->editColumn('created_at', function($data) {
                    return $data->created_at->format('Y-m-d');
                })
                ->addColumn('action', function($data){
                    return view('dashboard.meals.action_file', [
                        'data' => $data,
                    ])->render();
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('dashboard.meals.index');

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
    public function store(StoreMealRequest $request)
    {
        $meal = new Meal;
        $meal->name = $request->name;
        $meal->save();
        return back()->with(['success'=>'تم إضافه البيانات بنجاح']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Meal $meal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Meal $meal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMealRequest $request, Meal $meal)
    {
        $meal->name = $request->name;
        $meal->save();
        return back()->with(['update'=>'تم تحديث البيانات  ']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Meal $meal)
    {
        //
    }
}
