<?php

namespace App\Http\Controllers;

use App\Models\Detail;
use App\Http\Requests\StoreDetailRequest;
use App\Http\Requests\UpdateDetailRequest;
use Illuminate\Http\Request;
use DataTables;

class DetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Detail::query()->select(['id', 'name', 'created_at']);

            return Datatables::of($data)
                ->addIndexColumn()
                ->editColumn('created_at', function($data) {
                    return $data->created_at->format('Y-m-d');
                })
                ->addColumn('action', function($data){
                    return view('dashboard.details.action_file', [
                        'data' => $data,
                    ])->render();
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('dashboard.details.index');

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
    public function store(StoreDetailRequest $request)
    {
        $detail = new Detail;
        $detail->name = $request->name;
        $detail->save();
        return back()->with(['success'=>'تم إضافه البيانات بنجاح']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Detail $detail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Detail $detail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDetailRequest $request, Detail $detail)
    {
        $detail->name = $request->name;
        $detail->save();
        return back()->with(['update'=>'تم تحديث البيانات  ']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Detail $detail)
    {
        //
    }
}
