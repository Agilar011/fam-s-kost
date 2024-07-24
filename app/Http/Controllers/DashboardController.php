<?php

namespace App\Http\Controllers;

use App\Models\Dormitory;
use App\Models\Member;
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
            'total_dormitories' => count(Member::all()),
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
            'jumlah_penghuni' => Room::whereNotNull('fk_id_member')->count(),
            'total_transactions' => count(PaymentLog::all()),
            'total_admins' => User::where('role', 'admin')->count(),
        ]);
    }

    public function storeMember(Request $request)
    {
        // dd($request->all());
        $rulesData = [
            'name' => 'required|unique:members',
            'address' => 'required',
            'phone_number' => 'required|unique:members|numeric|digits_between:11,13',
            'checkin_date' => 'required|date',

        ];

        if ($request->file("image")) {
            $rulesData["image"] = "required|image|mimes:jpeg,png,jpg,gif,svg|max:2048";
        }
        if ($request->file("image2")) {
            $rulesData["image2"] = "required|image|mimes:jpeg,png,jpg,gif,svg|max:2048";
        }

        $validatedData = $request->validate($rulesData);


        if ($validatedData["image"]) {
            $file = $request->file('image')->store('dormitory-images', 'public');
            $validatedData["image"] = $file;
        }

        if ($validatedData["image2"]) {
            $file2 = $request->file('image2')->store('dormitory-images', 'public');
            $validatedData["image2"] = $file2;
        }

        // dd($validatedData);
        Member::create($validatedData);
        return redirect()->route('dashboard.index')->with('success', 'Data Penghuni berhasil ditambahkan');



        // return redirect()->route(MemberController::MEMBER_ROUTE["index"])->with('success', 'Data Penghuni berhasil ditambahkan');
    }
}
