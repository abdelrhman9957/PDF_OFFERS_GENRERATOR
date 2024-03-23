<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminCrudController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\MealController;
use App\Http\Controllers\OFFERController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PageDetailController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\SetingController;
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| dashboard Routes
|--------------------------------------------------------------------------
*/
    /* url & folder for controller  (Group) */


    /* Authantecation Routes */
Route::prefix('admin-panel')->group(function () {
    Auth::routes([
        'login' => true,
        'register' => false,
        'reset' => false,
        'verify' => false,
    ]);
});
Route::prefix('admin-panel')->middleware('auth')->group(function(){




    /* Dashboard Routes Group */
    Route::controller(DashboardController::class)->group(function(){
        Route::get('/', 'index')->name('index_dash');
        /* Route::get('/calendar', 'index_calendar')->name('index_calendar'); */

    });

    /* Admins Routes Group */
    Route::controller(AdminController::class)->group(function(){
        Route::get('/admins','index')->name('index_admins');
        Route::post('/store_admin', 'store')->name('store_admin');
        Route::post('/update_admin/{admin}', 'update')->name('update_admin');

        //Profile Update Route
        Route::post('update_profile','update_profile')->name('updateProfile');
    });


    /* OFFERS Routes Group AREA */

    Route::controller(OFFERController::class)->group(function(){
        Route::get('/offers', 'index')->name('index_offers');
        Route::post('/store_offer', 'store')->name('store_offer');
        Route::get('load_pdf/{offer}', 'load_pdf')->name('load_pdf');
        Route::get('download_pdf/{offer}', 'download_pdf')->name('download_pdf');
        Route::post('/update_offer/{offer}', 'update')->name('update_offer');
        Route::post('/delete/{offer}', 'destroy')->name('delete_offer');

        /* INDEX PAGE COST */
        Route::post('/store_index_page_cost/{offer}', 'store_index_page_cost')->name('store_index_page_cost');
        Route::post('/update_index_page_cost/{cost}', 'update_index_page_cost')->name('update_index_page_cost');
    });


    // PAGES ROUTS GROUP
    Route::controller(PageController::class)->group(function(){
        Route::get('/offer/{offer}/pages-and-details', 'index')->name('index_pages');
        Route::post('/store_page', 'store')->name('store_page');
        Route::post('/update_page/{page}', 'update')->name('update_page');

        Route::post('/delete-page/{page}', 'destroy')->name('delete_page');
    });


    // PAGE DETAILS ROUTS GROUP
    Route::controller(PageDetailController::class)->group(function(){
        Route::post('/store_page_details', 'store')->name('store_page_details');
        Route::post('/update_page_details', 'update')->name('update_page_details');
    });




    /* END OFFERS Routes Group AREA */



    /* PDF GENERATOR (OFFERS) ROUTES GROUP */
    /* Route::controller(PDFController::class)->group(function(){
        Route::get('/offers_generator', 'index')->name('offers_generator');
        Route::get('/load-hotels/{id}', 'load_hotels')->name('load_hotels');
        //Route::post('/store_hotel', 'store')->name('store_hotel');
        //Route::post('/update_hotel/{hotel}', 'update')->name('update_hotel');
        //Route::post('/delete/{hotel}', 'destroy')->name('delete_hotel');
    }); */


    /* Global Setings Routes Group */
    Route::controller(SetingController::class)->group(function(){
        Route::get('/index_page_bg_img', 'index')->name('index_page_bg_img');
        Route::post('/index_page_bg_img/{seting}', 'update')->name('update_index_page_bg_img');
    });





    /* Cities Routes Group */
    Route::controller(CityController::class)->group(function(){
        Route::get('/cities', 'index')->name('index_cities');
        Route::post('/store_city', 'store')->name('store_city');
        Route::post('/update_city/{city}', 'update')->name('update_city');
        Route::get('/edit/city/{city}/image', 'edit')->name('edit_city');
        Route::post('/delete/{city}', 'destroy')->name('delete_city');
    });

    /* Hotels Routes Group */
    Route::controller(HotelController::class)->group(function(){
        Route::get('/hotels', 'index')->name('index_hotels');
        Route::post('/store_hotel', 'store')->name('store_hotel');
        Route::post('/update_hotel/{hotel}', 'update')->name('update_hotel');
        Route::post('/delete/{hotel}', 'destroy')->name('delete_hotel');
    });

    /* Rooms Routes Group */
    Route::controller(RoomController::class)->group(function(){
        Route::get('/rooms', 'index')->name('index_rooms');
        Route::post('/store_room', 'store')->name('store_room');
        Route::post('/update_room/{room}', 'update')->name('update_room');
        Route::post('/delete/{room}', 'destroy')->name('delete_room');
    });


    /* Details Routes Group */
    Route::controller(DetailController::class)->group(function(){
        Route::get('/details', 'index')->name('index_details');
        Route::post('/store_detail', 'store')->name('store_detail');
        Route::post('/update_detail/{detail}', 'update')->name('update_detail');
        Route::post('/delete/{detail}', 'destroy')->name('delete_detail');
    });


    /* Meals Routes Group */
    Route::controller(MealController::class)->group(function(){
        Route::get('/meals', 'index')->name('index_meals');
        Route::post('/store_meal', 'store')->name('store_meal');
        Route::post('/update_meal/{meal}', 'update')->name('update_meal');
        Route::post('/delete/{meal}', 'destroy')->name('delete_meal');
    });


    /* Setings Routes Group */
    Route::controller(SetingController::class)->group(function(){
        Route::get('/setings', 'index')->name('index_setings');
        Route::post('/store_setting', 'store')->name('store_setting');
        Route::post('/update_setting/{setting}', 'update')->name('update_setting');
        Route::post('/delete/{setting}', 'destroy')->name('delete_setting');
    });



});



Route::get('/', function () { return redirect()->route('index_dash'); });



