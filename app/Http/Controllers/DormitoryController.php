<?php

namespace App\Http\Controllers;

use App\Models\Dormitory;
use App\Http\Requests\StoreDormitoryRequest;
use App\Http\Requests\UpdateDormitoryRequest;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Gate;

class DormitoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public const DORMITORY_ROUTE = [
        "index" => "dormitory.index",
        "store" => "dormitory.store",
        "create" => "dormitory.create",
        "show" => "dormitory.show",
        "edit" => "dormitory.edit",
        "update" => "dormitory.update",
        "delete" => "dormitory.destroy",

    ];

    public const DORMITORY_VIEW = [
        "index" => "dashboard.dormitory.index",
        "create" => "dashboard.dormitory.create",
        "detail" => "dashboard.dormitory.detail",
        "edit" => "dashboard.dormitory.edit",

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
        return view(DormitoryController::DORMITORY_VIEW["index"], [
            'title' => 'Data Penghuni',
            'dormitories' => Dormitory::with(["rooms"])->orderBy("name")->paginate(10),
            'dormitory_route' => DormitoryController::DORMITORY_ROUTE
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('index-dormitory');

        return view(DormitoryController::DORMITORY_VIEW["create"], [
            'title' => 'Tambah Penghuni',
            'dormitory_route' => DormitoryController::DORMITORY_ROUTE
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rulesData = [
            'name' => 'required|unique:dormitories',
            'address' => 'required',
            'phone_number' => 'required|unique:dormitories|numeric|digits_between:11,13',
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

        Dormitory::create($validatedData);

        return redirect()->route(DormitoryController::DORMITORY_ROUTE["index"])->with('success', 'Data Penghuni berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Dormitory $dormitory)
    {
        $date_start_checkin = null;
        if ($dormitory->checkin_date) {
            $date_start_checkin = getdate(strtotime($dormitory->checkin_date));
        }
        return view(DormitoryController::DORMITORY_VIEW["detail"], [
            'title' => "Detail Penghuni $dormitory->name",
            'dormitory' => $dormitory,
            'year_checkin'=> $date_start_checkin["year"],
            'max_year' => config("app.max_year"),
            'dormitory_route' => DormitoryController::DORMITORY_ROUTE,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Dormitory $dormitory)
    {
        return view(DormitoryController::DORMITORY_VIEW["edit"], [
            'title' => 'Edit Data Penghuni',
            'dormitory' => $dormitory,
            'dormitory_route' => DormitoryController::DORMITORY_ROUTE
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Dormitory $dormitory)
    {
        $rulesData = [
            'name' => 'required|unique:dormitories,name,'.$dormitory->id,
            'address' => 'required',
            'phone_number' => 'required|numeric|digits_between:11,13|unique:dormitories,phone_number,'.$dormitory->id ,
            'checkin_date' => 'required|date',
        ];

        if ($request->file("image")) {
            $rulesData["image"] = "required|image|mimes:jpeg,png,jpg,gif,svg|max:2048";
        }

        $validatedData = $request->validate($rulesData);

        if ($request->file("image")) {
            if ($dormitory->image) {
                Storage::disk('public')->delete($dormitory->image);
            }
            $validatedData["image"] = $request->file('image')->store('dormitory-images', 'public');
        } else {
            $validatedData["image"] = $dormitory->image;
        }

        Dormitory::with(["rooms"])->where("id", $dormitory->id)->update($validatedData);
        return redirect()->route(DormitoryController::DORMITORY_ROUTE["index"])->with('success', 'Data Penghuni berhasil diedit');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Dormitory $dormitory)
    {
        Dormitory::with(["rooms"])->find($dormitory->id)->delete();
        return redirect()->route(DormitoryController::DORMITORY_ROUTE["index"])->with('success', 'Data Penghuni berhasil dihapus');
    }
}
