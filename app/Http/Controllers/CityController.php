<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Http\Requests\StoreCityRequest;
use App\Http\Requests\UpdateCityRequest;
use Illuminate\Http\Request;
use DataTables;


class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //dd(City::find(2)->bg_img);
        if ($request->ajax()) {
            $data = City::query()->select(['id', 'name', 'created_at','bg_img','bg_img_train']);

            return Datatables::of($data)
                ->addIndexColumn()
                ->editColumn('created_at', function($data) {
                    return $data->created_at->format('Y-m-d');
                })
                ->addColumn('action', function($data){
                    return view('dashboard.cities.action_file', [
                        'data' => $data,
                    ])->render();
                })
                ->addColumn('hotel_count', function($data){
                    $hotel_count = count($data->hotels);
                    return $hotel_count;
                })
                ->addColumn('background', function($data){
                    return "<img src='" . asset('cities_images/' . $data->bg_img) . "' style='width: 100px; height: 100px;' />";
                })
                ->editColumn('bg_img_train', function($data){
                    return "<img src='" . asset('cities_images/' . $data->bg_img_train) . "' style='width: 100px; height: 100px;' />";
                })
                ->rawColumns(['action','hotel_count','background','bg_img_train'])
                ->make(true);
        }
        return view('dashboard.cities.index');

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
    public function store(StoreCityRequest $request)
    {
        //dd($request->all());


        $request->validate([
            'bg_img' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        ], [
            'bg_img.required' => 'يرجى اختيار صورة للمدينة.',
            'bg_img.image' => 'الملف المُحدد يجب أن يكون صورة.',
            'bg_img.mimes' => 'يجب أن تكون الصورة من النوع: jpeg، png، jpg، gif، أو svg.',
        ]);

        $imageOneName = time().'.'.$request->bg_img->extension();
        $request->bg_img->move(public_path('cities_images'), $imageOneName);

        if (!$request->has('bg_img_train')) {
            // إذا لم يتم إرسال صورة bg_img_train في الطلب، انسخ الصورة الأولى وغير اسمها
            $imageTwoName = 'train_' . $imageOneName; // تغيير اسم الصورة الثانية
            copy(public_path('cities_images/' . $imageOneName), public_path('cities_images/' . $imageTwoName));
        } else {
            // إذا تم إرسال صورة bg_img_train في الطلب، استخدمها
            $request->validate([
                'bg_img_train' => 'image|mimes:jpeg,png,jpg,gif,svg',
            ], [
                'bg_img_train.image' => 'الملف المُحدد للصورة الثانية يجب أن يكون صورة.',
                'bg_img_train.mimes' => 'يجب أن تكون الصورة الثانية من النوع: jpeg، png، jpg، gif، أو svg.',
            ]);

            $imageTwoName = 'train_' . time().'.'.$request->bg_img_train->extension();
            $request->bg_img_train->move(public_path('cities_images'), $imageTwoName);
        }

        $city = new City;
        $city->name = $request->name;
        $city->bg_img = $imageOneName;
        $city->bg_img_train = $imageTwoName;
        $city->save();

        return back()->with(['success'=>'تم إضافة المدينة بنجاح']);

    }

    /**
     * Display the specified resource.
     */
    public function show(City $city)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(City $city)
    {
        return view('dashboard.cities.edit_image',compact('city'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCityRequest $request, City $city)
    {
        if($request->has('name')){
            $city->name = $request->name;
        }

        if($request->has('bg_img')) {
            $request->validate([
                'bg_img' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            ], [
                'bg_img.required' => 'يرجى اختيار صورة للمدينة.',
                'bg_img.image' => 'الملف المُحدد يجب أن يكون صورة.',
                'bg_img.mimes' => 'يجب أن تكون الصورة من النوع: jpeg، png، jpg، gif، أو svg.',
            ]);

            \File::delete('cities_images/'.$city->bg_img);
            $imageName = time().'.'.$request->bg_img->extension();

            $request->bg_img->move(public_path('cities_images'), $imageName);
            $city->bg_img = $imageName;

        }

        if($request->has('bg_img_train')) {
            $request->validate([
                'bg_img_train' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            ], [
                'bg_img_train.required' => 'يرجى اختيار صورة للمدينة.',
                'bg_img_train.image' => 'الملف المُحدد يجب أن يكون صورة.',
                'bg_img_train.mimes' => 'يجب أن تكون الصورة من النوع: jpeg، png، jpg، gif، أو svg.',
            ]);

            \File::delete('cities_images/'.$city->bg_img_train);
            $imageName = time().'.'.$request->bg_img_train->extension();

            $request->bg_img_train->move(public_path('cities_images'), $imageName);
            $city->bg_img_train = $imageName;

        }
        $city->save();
        return back()->with(['update'=>'تم تحديث بيانات المدينه بنجاح']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(City $city)
    {
        //
    }
}
