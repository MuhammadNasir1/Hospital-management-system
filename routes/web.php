<?php

use App\Http\Controllers\AappointmentController;
use App\Http\Controllers\authController;
use App\Http\Controllers\DoctorController;
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
Route::post('registerCompany', [authController::class, 'company']);
Route::post('updateUser/{id}', [authController::class, 'update'])->name("update");
Route::get('approvedCompany/{id}', [authController::class, 'approvedCompany'])->name("update");
Route::get('cancelCompany/{id}', [authController::class, 'cancelCompany'])->name("update");
Route::match(['get',  'post'], 'weblogout', [authController::class, 'weblogout']);

Route::get('/login', function () {
    return view('login');
});
Route::get('/notifications', function () {
    return view('notification');
});
Route::get('/requests', function () {
    return view('admin.requsets');
});

Route::middleware('custom')->group(function () {
    Route::get('/setting', [authController::class, 'settingdata']);
    Route::post('updateSettings', [authController::class, 'updateSet']);
    Route::get('/', [userController::class, 'Dashboard']);
    Route::get('help', function () {
        return view('help');
    });

    Route::get('/companies', [userController::class, 'users']);
    Route::get('/requests', [userController::class, 'requests']);
    Route::get('/departments', [userController::class, 'departments']);
    Route::get('/staff', [userController::class, 'staff']);
    Route::get('/deleteUser/{id}', [userController::class, 'deleteUser'])->name("deleteUser");
    Route::get('/update-user/{id}', [userController::class, 'updateUser'])->name("updateUser");
    Route::post('/updateUserCar/{id}', [userController::class, 'updateUserCar']);

    Route::get('email', function () {

        return view("emails.parent");
    });
    Route::get('resources', function () {

        return view("resources");
    });
});

Route::get('register', function () {

    return view("register");
});
Route::get('/pharmacy', function () {

    return view("admin.pharmcy");
});


// pharmacy
Route::get('/pharmacy/inventory', function () {
    return view('pharmacy.inventory');
});
Route::get('/doctor/patients', function () {
    return view('doctor.doctor');
});
Route::get('/reception/patient-detail', function () {
    return view('reception.patient_detail');
});
Route::get('/pharmacy/billing/{order_id}', [InventoryController::class, 'invoiceData']);
Route::get('/pharmacy/inventory', [InventoryController::class, 'index']);


Route::post('/addInventroy', [InventoryController::class, 'insert']);
Route::get('/pharmacy/create-invoice', [InventoryController::class, 'medicine']);


Route::post('/pharmacyOrders', [PharmacyOrdersController::class, 'insert']);

Route::controller(PatientController::class)->group(function () {
    Route::post('/reception/patient', 'register');
    Route::get('/reception/patients', 'view');
    Route::get('/reception/fetchpatient/{id}', 'fetch');
    Route::get('/reception/fetchpatientData/{id}', 'fetchPatient');
    Route::get('/reception/patient/print-detail/{id}', 'print')->name('printPatient');
    Route::get('/reception/patient/delete-patient/{id}', 'delete')->name('delPatient');
});
Route::controller(AappointmentController::class)->group(function () {
    Route::post('/reception/assign-doctor', 'appoimtment');
    Route::get('/reception/patient/print-token/{id}', 'printToken');
});
Route::controller(DoctorController::class)->group(function () {
    Route::get('/doctor/appointments', 'view');
});
