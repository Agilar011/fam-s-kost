<?php

use App\Http\Controllers\DashboardController;
use App\Models\Member;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\PaymentLogController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PriceController;
use App\Http\Controllers\BillController;
use App\Models\Dormitory;
use App\Models\PaymentLog;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get("/", function(){
// return view("landingpage");
// })->name("landingpage");

route::get('/', [DashboardController::class, 'landingPage'])->name('landingpage');

// route('/', [DashboardController::class, 'landingPage'])->name('landingpage');

Route::middleware(['auth'])->group(function () {
    Route::resource('/home', DashboardController::class);
    Route::resource('/dashboard/member', MemberController::class);
    Route::resource('/dashboard/room', RoomController::class);
    Route::resource('/dashboard/transactions', PaymentLogController::class)->except([ 'edit', 'update']);
    Route::resource('/dashboard/users', UserController::class);
    Route::resource('/dashboard/prices', PriceController::class);
    Route::resource('/dashboard/bill', BillController::class);
    Route::post('/midtrans-callback', [BillController::class, 'callback'])->name('midtrans.callback');
});

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');


// Route::get('/success/create',[PaymentLogController::class, 'createTransaction'])->name('success.create');
// Route::post('success/create/transaction',[PaymentLogController::class, 'storeTransaction'])->name('success.store');

Route::get("/success/create", function(){
    return view("dashboard.afterSuccess.create");
    })->name("success.create");

    Route::post('/store/member', [DashboardController::class, 'storeMember'])->name('storeMember');


Route::get('/dashboard/dormitory/payment/{id}/year/{year}', function ($id, $year) {
    $dataDormitory = Member::where("id", $id)->first();

    $dataPayment = PaymentLog::where("fk_id_dormitory", $id)->get();

    $date_start_checkin = getdate(strtotime($dataDormitory->checkin_date));

    $months_year_checkin = config("app.month.language.indonesian");

    foreach ($months_year_checkin as $monthIndex => $month) {
        if ($month["id"] < $date_start_checkin["mon"]) {
            unset($months_year_checkin[$monthIndex]);
        }
    }

    return view("dashboard.dormitory.ajax.monthpayment", [
        'year_checkin'=> $date_start_checkin["year"],
        'year'=> $year,
        'months_year_checkin' => $months_year_checkin,
        'max_year' => config("app.max_year"),
        'months' => config("app.month.language.indonesian"),
    ]);
})->name("dormitory.ajax.payment");
