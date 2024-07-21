<?php

namespace App\Http\Controllers;

use App\Models\Dormitory;
use App\Models\PaymentLog;
use App\Models\Room;
use App\Models\User;
use App\Models\Price;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {

        return view('dashboard.home', [
            'total_dormitories' => count(Dormitory::all()),
            'total_rooms' => count(Room::all()),
            'total_transactions' => count(PaymentLog::all()),
            'total_users' => count(User::all()),
            'show_price' => Price::all()
        ]);
    }

    public function landingPage()
    {
        return view('landingpage', [
            'jumlah_kamar' => count(Room::all()),
            'jumlah_penghuni' => Room::whereNotNull('fk_id_dormitory')->count(),
            'total_transactions' => count(PaymentLog::all()),
            'total_admins' => User::where('role', 'admin')->count(),
        ]);
    }
}
