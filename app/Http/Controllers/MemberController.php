<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Http\Requests\StoreDormitoryRequest;
use App\Http\Requests\UpdateDormitoryRequest;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Gate;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public const MEMBER_ROUTE = [
        "index" => "member.index",
        "store" => "member.store",
        "create" => "member.create",
        "show" => "member.show",
        "edit" => "member.edit",
        "update" => "member.update",
        "delete" => "member.destroy",

    ];

    public const MEMBER_VIEW = [
        "index" => "dashboard.member.index",
        "create" => "dashboard.member.create",
        "detail" => "dashboard.member.detail",
        "edit" => "dashboard.member.edit",
        "createMember" => "dashboard.afterSuccess.create",

    ];

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if (Gate::denies('index-dormitory')) {
                abort(403, 'You do not have permission to access this page');
            }
        return $next($request);
        });
    }

    public function index()
    {
        return view(MemberController::MEMBER_VIEW["index"], [
            'title' => 'Data Penghuni',
            'members' => Member::with(["rooms"])->orderBy("name")->paginate(10),
            'member_route' => MemberController::MEMBER_ROUTE
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('index-dormitory');

        return view(MemberController::MEMBER_VIEW["create"], [
            'title' => 'Tambah Penghuni',
            'member_route' => MemberController::MEMBER_ROUTE
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rulesData = [
            'name' => 'required|unique:members',
            'address' => 'required',
            'phone_number' => 'required|unique:members|numeric|digits_between:11,13',
            'checkin_date' => 'required|date',

        ];

        if ($request->file("image")) {
            $rulesData["image"] = "required|image|mimes:jpeg,png,jpg,gif,svg|max:2048";
        }

        $validatedData = $request->validate($rulesData);

        if ($validatedData["image"]) {
            $file = $request->file('image')->store('dormitory-images', 'public');
            $validatedData["image"] = $file;
        }

        Member::create($validatedData);

        return redirect()->route(MemberController::MEMBER_ROUTE["index"])->with('success', 'Data Penghuni berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Member $dormitory)
    {
        $date_start_checkin = null;
        if ($dormitory->checkin_date) {
            $date_start_checkin = getdate(strtotime($dormitory->checkin_date));
        }
        return view(MemberController::MEMBER_VIEW["detail"], [
            'title' => "Detail Penghuni $dormitory->name",
            'dormitory' => $dormitory,
            'year_checkin'=> $date_start_checkin["year"],
            'max_year' => config("app.max_year"),
            'dormitory_route' => MemberController::MEMBER_ROUTE,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Member $member)
    {
        return view(MemberController::MEMBER_VIEW["edit"], [
            'title' => 'Edit Data Penghuni',
            'member' => $member,
            'member_route' => MemberController::MEMBER_ROUTE
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Member $member)
    {
        // dd($request->all());
        // dd($member);
        $rulesData = [
            'name' => 'required|unique:members,name,'.$member->id,
            'address' => 'required',
            'phone_number' => 'required|numeric|digits_between:11,13|unique:members,phone_number,'.$member->id ,
            'checkin_date' => 'required|date',
        ];

        if ($request->file("image")) {
            $rulesData["image"] = "required|image|mimes:jpeg,png,jpg,gif,svg|max:2048";
        }

        $validatedData = $request->validate($rulesData);

        if ($request->file("image")) {
            if ($member->image) {
                Storage::disk('public')->delete($member->image);
            }
            $validatedData["image"] = $request->file('image')->store('member-images', 'public');
        } else {
            $validatedData["image"] = $member->image;
        }

        Member::with(["rooms"])->where("id", $member->id)->update($validatedData);
        return redirect()->route(MemberController::MEMBER_ROUTE["index"])->with('success', 'Data Penghuni berhasil diedit');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Member $member)
    {
        Member::with(["rooms"])->find($member->id)->delete();
        return redirect()->route(MemberController::MEMBER_ROUTE["index"])->with('success', 'Data Penghuni berhasil dihapus');
    }

    public function getCreate()
    {
        return view(MemberController::MEMBER_VIEW["create"], [
            'title' => 'Tambah Penghuni',
            'member_route' => MemberController::MEMBER_ROUTE
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

        Member::create($validatedData);
        if (auth()->user()->role == 'user') {
            return redirect()->route('dashboard.index')->with('success', 'Data Penghuni berhasil ditambahkan');
            # code...
        } else {
            # code...
            return redirect()->route(MemberController::MEMBER_ROUTE["index"])->with('success', 'Data Penghuni berhasil ditambahkan');

        }


        // return redirect()->route(MemberController::MEMBER_ROUTE["index"])->with('success', 'Data Penghuni berhasil ditambahkan');
    }
}
