<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Http\Requests\StoreRoomRequest;
use App\Http\Requests\UpdateRoomRequest;
use Illuminate\Http\Request;
use DataTables;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Room::query()->select(['id', 'name', 'created_at']);

            return Datatables::of($data)
                ->addIndexColumn()
                ->editColumn('created_at', function($data) {
                    return $data->created_at->format('Y-m-d');
                })
                ->addColumn('action', function($data){
                    return view('dashboard.rooms.action_file', [
                        'data' => $data,
                    ])->render();
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('dashboard.rooms.index');

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
    public function store(StoreRoomRequest $request)
    {
        $room = new Room;
        $room->name = $request->name;
        $room->save();
        return back()->with(['success'=>'تم إضافه الغرفه بنجاح']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Room $room)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Room $room)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRoomRequest $request, Room $room)
    {
        $room->name = $request->name;
        $room->save();
        return back()->with(['update'=>'تم تحديث بيانات الغرفه بنجاح']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Room $room)
    {
        //
    }
}
