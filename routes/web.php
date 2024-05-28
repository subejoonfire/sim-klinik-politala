<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteSe  rviceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('login', function () {
    return view('login');
})->name('login');

Route::get('/', function () {
    return view('login');
});
Route::post('/loginAction', [UserController::class, 'loginAction']);

Route::group(['middleware' => 'auth'], function () {
    Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
        Route::get('dashboard', function () {
            return view('admin/dashboard');
        });
        Route::get('add-patient', function () {
            return view('admin/patient/add');
        });
        Route::group(['prefix' => 'register', 'as' => 'register'], function () {
            Route::get('/', function () {
                return view('admin/patient/register');
            });
            Route::get('doctor-schedule', function () {
                return view('admin/patient/doctor-schedule');
            })->name('doctor-schedule');
            Route::get('queue', function () {
                return view('admin/patient/queue');
            })->name('queue');
            Route::get('patient-reservation', function () {
                return view('admin/patient/patient-reservation');
            })->name('patient-reservation');
            Route::get('reservation-quota', function () {
                return view('admin/patient/reservation-quota');
            })->name('reservation-quota');
            Route::get('register-new-patient', function () {
                return view('admin/patient/register-new-patient');
            })->name('register-new-patient');
            Route::get('register-external-patient', function () {
                return view('admin/patient/register-external-patient');
            })->name('register-external-patient');
            Route::get('medical-record-tracer', function () {
                return view('admin/patient/medical-record-tracer');
            })->name('medical-record-tracer');
        });
        Route::group(['prefix' => 'medical-record', 'as' => 'medical-record'], function () {
            Route::get('/', function () {
                return view('admin/medical-record/index');
            });
        });
    });
});
