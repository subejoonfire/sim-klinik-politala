<?php

use App\Models\Queues;
use App\Models\Quotas;
use App\Models\Doctors;
use App\Models\Patients;
use App\Models\Schedule;
use App\Models\PatientReservation;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\QueueController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\DoctorScheduleController;

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
Route::get('/api/patients/{nama}', function ($nama) {
    $patients = Patients::where('nama', 'LIKE', "%{$nama}%")->get();
    return response()->json($patients);
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
                $data = Patients::get();
                return view('admin/patient/register', compact('data'));
            });
            Route::post('edit-patient', [PatientController::class, 'update']);
            Route::get('delete-patient/{idpatient}', function ($idpatient) {
                Patients::find($idpatient)->delete();
                return redirect('admin/register');
            });
            Route::group(['prefix' => 'doctor-schedule', 'as' => 'doctor-schedule'], function () {
                Route::get('/', function () {
                    $data = Schedule::getScheduleWithDoctor();
                    return view('admin/patient/doctor-schedule', compact('data', 'doctors'));
                });
                Route::post('store', [DoctorScheduleController::class, 'store']);
                Route::post('update', [DoctorScheduleController::class, 'update']);
                Route::get('delete/{id_schedule}', function ($id_schedule) {
                    Schedule::find($id_schedule)->delete();
                    return redirect('admin/register/doctor-schedule');
                });
            });
            Route::group(['prefix' => 'queue', 'as' => 'queue'], function () {
                Route::get('/', function () {
                    $data = Queues::get();
                    return view('admin/patient/queue', compact('data'));
                });
                Route::get('delete/{id_queue}', function ($id_queue) {
                    $deleted = Queues::find($id_queue)->delete();
                    if ($deleted) {
                        return redirect('admin/register/queue')->with('success', 'Data Berhasil dihapus.');
                    } else {
                        return redirect('admin/register/queue')->with('error', 'Data Gagal dihapus.');
                    }
                });
                Route::post('store', [QueueController::class, 'store']);
                Route::group(['prefix' => 'panggil', 'as' => 'panggil.'], function () {
                    Route::get('waiting/{id_queue}', function ($id_queue) {
                        $updated = Queues::where('id_queue', $id_queue)->update(['panggil' => 'Menunggu']);
                        if ($updated) {
                            return redirect('admin/register/queue')->with('success', 'Status panggil berhasil diperbarui menjadi Menunggu.');
                        } else {
                            return redirect('admin/register/queue')->with('error', 'Gagal memperbarui status panggil.');
                        }
                    })->name('waiting');

                    Route::get('called/{id_queue}', function ($id_queue) {
                        $updated = Queues::where('id_queue', $id_queue)->update(['panggil' => 'Dipanggil']);
                        if ($updated) {
                            return redirect('admin/register/queue')->with('success', 'Status panggil berhasil diperbarui menjadi Dipanggil.');
                        } else {
                            return redirect('admin/register/queue')->with('error', 'Gagal memperbarui status panggil.');
                        }
                    })->name('called');
                });
                Route::group(['prefix' => 'status', 'as' => 'status.'], function () {
                    Route::get('waiting/{id_queue}', function ($id_queue) {
                        $updated = Queues::where('id_queue', $id_queue)->update(['status' => 'Menunggu']);
                        if ($updated) {
                            return redirect('admin/register/queue')->with('success', 'Status antrian berhasil diperbarui menjadi Menunggu.');
                        } else {
                            return redirect('admin/register/queue')->with('error', 'Gagal memperbarui status antrian.');
                        }
                    })->name('waiting');

                    Route::get('done/{id_queue}', function ($id_queue) {
                        $updated = Queues::where('id_queue', $id_queue)->update(['status' => 'Selesai']);
                        if ($updated) {
                            return redirect('admin/register/queue')->with('success', 'Status antrian berhasil diperbarui menjadi Selesai.');
                        } else {
                            return redirect('admin/register/queue')->with('error', 'Gagal memperbarui status antrian.');
                        }
                    })->name('done');
                });
            });
            Route::group(['prefix' => 'patient-reservation', 'as' => 'patient-reservation.'], function () {
                Route::get('/', function () {
                    $data = PatientReservation::getReservationsWithPatient();
                    return view('admin/patient/patient-reservation', compact('data'));
                });
                Route::get('delete/{id_reservation}', function ($id_reservation) {
                    $deleted = PatientReservation::find($id_reservation)->delete();
                    if ($deleted) {
                        return redirect('admin/register/patient-reservation')->with('success', 'Berhasil menghapus reservasi.');
                    } else {
                        return redirect('admin/register/patient-reservation')->with('error', 'Gagal menghapus reservasi.');
                    }
                    return redirect('admin/register/patient-reservation');
                });
                Route::get('confirm/{id_reservation}', function ($id_reservation) {
                    $confirm = PatientReservation::where('id_reservation', $id_reservation)->update(['status' => 'KONFIRMASI']);
                    if ($confirm) {
                        return redirect('admin/register/patient-reservation')->with('success', 'Berhasil mengonfirmasi reservasi.');
                    } else {
                        return redirect('admin/register/patient-reservation')->with('error', 'Gagal mengonfirmasi reservasi.');
                    }
                    return redirect('admin/register/patient-reservation');
                });
                Route::get('skip/{id_reservation}', function ($id_reservation) {
                    $skip = PatientReservation::where('id_reservation', $id_reservation)->update(['status' => 'LEWATI']);
                    if ($skip) {
                        return redirect('admin/register/patient-reservation')->with('success', 'Berhasil melewati reservasi.');
                    } else {
                        return redirect('admin/register/patient-reservation')->with('error', 'Gagal melewati reservasi.');
                    }
                    return redirect('admin/register/patient-reservation');
                });
                Route::get('cancel/{id_reservation}', function ($id_reservation) {
                    $skip = PatientReservation::where('id_reservation', $id_reservation)->update(['status' => 'BATAL']);
                    if ($skip) {
                        return redirect('admin/register/patient-reservation')->with('success', 'Berhasil membatalkan reservasi.');
                    } else {
                        return redirect('admin/register/patient-reservation')->with('error', 'Gagal membatalkan reservasi.');
                    }
                    return redirect('admin/register/patient-reservation');
                });
                Route::post('store', [ReservationController::class, 'store']);
                Route::post('update', [ReservationController::class, 'update']);
            });
            Route::get('register-new-patient', function () {
                return view('admin/patient/register-new-patient');
            })->name('register-new-patient');
            Route::get('register-external-patient', function () {
                return view('admin/patient/register-external-patient');
            })->name('register-external-patient');
            Route::get('medical-record-tracer', function () {
                return view('admin/patient/medical-record-tracer');
            })->name('medical-record-tracer');
            Route::post('add-patient', [PatientController::class, 'store']);
            Route::group(['prefix' => 'quota-reservation', 'as' => 'quota-reservation'], function () {
                Route::get('/', function () {
                    $data = Quotas::get();
                    return view('admin/patient/quota-reservation', compact('data'));
                });
            });
        });
        Route::group(['prefix' => 'medical-record', 'as' => 'medical-record'], function () {
            Route::get('/', function () {
                session()->put('medical-record-container', 'history-visit');
                return view('admin/medical-record/index');
            });
            Route::get('/history-visit', function () {
                session()->put('medical-record-container', 'history-visit');
                return view('admin/medical-record/index');
            });
            Route::get('/general-data-test', function () {
                session()->put('medical-record-container', 'general-data-test');
                return view('admin/medical-record/index');
            });
            Route::get('/agreed-general', function () {
                session()->put('medical-record-container', 'agreed-general');
                return view('admin/medical-record/index');
            });
        });
    });
});
