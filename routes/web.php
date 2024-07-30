<?php

use App\Http\Controllers\authController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\PharmacyOrdersController;
use App\Http\Controllers\userController;
use Illuminate\Support\Facades\Route;

// language route
Route::get('/lang', [userController::class, 'language_change']);
// Authentication
Route::post('login', [authController::class, 'login']);
Route::post('registerdata', [authController::class, 'register']);
Route::post('updateUser/{id}', [authController::class, 'update'])->name("update");
Route::match(['get',  'post'], 'weblogout', [authController::class, 'weblogout']);

Route::get('/login', function () {
    return view('login');
});
Route::get('/notifications', function () {
    return view('notification');
});

Route::middleware('custom')->group(function () {
    Route::get('/setting', [authController::class, 'settingdata']);
    Route::post('updateSettings', [authController::class, 'updateSet']);
    Route::get('/', [userController::class, 'Dashboard']);
    Route::get('help', function () {
        return view('help');
    });

    Route::get('/companies', [userController::class, 'users']);
    Route::get('/deleteUser/{id}', [userController::class, 'deleteUser'])->name("deleteUser");
    Route::get('/update-user/{id}', [userController::class, 'updateUser'])->name("updateUser");
    Route::post('/updateUserCar/{id}', [userController::class, 'updateUserCar']);

    Route::get('email', function () {

        return view("emails.parent");
    });
    Route::get('resources', function () {

        return view("resources");
    });
    Route::get('staff', function () {

        return view("admin.staff");
    });
});

Route::get('register', function () {

    return view("register");
});


// pharmacy
Route::get('/pharmacy/inventory', function () {
    return view('pharmacy.inventory');
});
Route::get('/doctor/patients', function () {
    return view('doctor.doctor');
});
Route::get('/pharmacy/billing/{order_id}', [InventoryController::class, 'invoiceData']);
Route::get('/pharmacy/inventory', [InventoryController::class, 'index']);


Route::post('/addInventroy', [InventoryController::class, 'insert']);
Route::get('/pharmacy/create-invoice', [InventoryController::class, 'medicine']);


Route::post('/pharmacyOrders', [PharmacyOrdersController::class, 'insert']);

Route::controller(PatientController::class)->group(function () {
    Route::post('/reception/patient', 'register');
    Route::get('/reception/patients', 'view');
});
