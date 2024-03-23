<?php

namespace App\Http\Controllers;

use App\Models\IndexPagePrice;
use App\Models\OFFER;
use App\Http\Requests\StoreOFFERRequest;
use App\Http\Requests\UpdateOFFERRequest;
use App\Models\Page;
use App\Models\Seting;
use Illuminate\Http\Request;
use DataTables;
use PDF;

class OFFERController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = OFFER::latest()->get();

            return Datatables::of($data)
                ->addIndexColumn()
                ->editColumn('created_at', function($data) {
                    return $data->created_at->format('Y-m-d');
                })
                ->editColumn('note', function($data) {
                    if($data->note) { return $data->note; } else { return '--'; }
                })
                ->editColumn('user_id', function($data) {
                    return $data->user->name;
                })
                ->addColumn('pages_count', function($data) {
                    return count($data->pages);
                })
                ->addColumn('action', function($data){
                    return view('dashboard.offers_area.offers.action_file', [
                        'data' => $data,
                    ])->render();
                })
                ->rawColumns(['action','note','user_id','pages_count'])
                ->make(true);
        }
        return view('dashboard.offers_area.offers.index');

    }

    /**
     * Show the form for creating a new resource.
     */
    public function load_pdf(OFFER $offer)
    {
        //$offer = OFFER::find(2);
        $bg_img = Seting::find(1)->name;
        $pdf = PDF::loadView('dashboard.offers_area.offers.pdfContent' ,compact('offer','bg_img'));
        return $pdf->stream($offer->name . '.pdf');
    }

    public function download_pdf(OFFER $offer)
    {
        //$offer = OFFER::find(2);
        $bg_img = Seting::find(1)->name;
        $pdf = PDF::loadView('dashboard.offers_area.offers.pdfContent' ,compact('offer','bg_img'));
        return $pdf->download($offer->name . '.pdf');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreOFFERRequest $request)
    {
        $offer = new OFFER;
        $offer->name = $request->name;
        $offer->note = $request->note;
        $offer->user_id = auth()->id();
        $offer->save();
        return redirect()->route('index_pages',$offer->id)->with(['success'=>'تم إضافه البيانات بنجاح']);

    }

    /**
     * Display the specified resource.
     */
    public function show(OFFER $offer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(OFFER $offer)
    {


    }

    /**
     * Update the specified resource in storage.
     */
    public function store_index_page_cost(Request $request, OFFER $offer)
    {
        $cost = new IndexPagePrice;
        $cost->cost = $request->cost;
        $cost->offer_id = $offer->id;
        $cost->save();
        return back()->with(['success'=>'تم إضافه البيانات بنجاح']);

    }

    public function update_index_page_cost(Request $request, IndexPagePrice $cost)
    {
        $cost->cost = $request->cost;
        $cost->save();
        return back()->with(['success'=>'تم تحديث البيانات بنجاح']);

    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(OFFER $offer)
    {
        //
    }
}
