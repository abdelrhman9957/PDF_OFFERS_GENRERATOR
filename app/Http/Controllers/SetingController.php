<?php

namespace App\Http\Controllers;

use App\Models\Seting;
use App\Http\Requests\StoreSetingRequest;
use App\Http\Requests\UpdateSetingRequest;

class SetingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $img = Seting::find(1);
        //dd($img);
        return view('dashboard.seting.edit_image',compact('img'));
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
    public function store(StoreSetingRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Seting $seting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Seting $seting)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSetingRequest $request, Seting $seting)
    {

            $request->validate([
                'bg_img' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            ], [
                'bg_img.required' => 'يرجى اختيار صورة للرئيسيه.',
                'bg_img.image' => 'الملف المُحدد يجب أن يكون صورة.',
                'bg_img.mimes' => 'يجب أن تكون الصورة من النوع: jpeg، png، jpg، gif، أو svg.',
            ]);

            \File::delete('global_images/'.$seting->name);
            $imageName = time().'.'.$request->bg_img->extension();

            $request->bg_img->move(public_path('global_images'), $imageName);
            $seting->name = $imageName;


            $seting->save();
        return back()->with(['update'=>'تم تحديث البيانات']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Seting $seting)
    {
        //
    }
}
