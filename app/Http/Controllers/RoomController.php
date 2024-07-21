<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Http\Requests\StoreRoomRequest;
use App\Http\Requests\UpdateRoomRequest;
use App\Models\Dormitory;
use App\Models\RoomImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Gate;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public const ROOM_ROUTE = [
        "index" => "room.index",
        "store" => "room.store",
        "create" => "room.create",
        "show" => "room.show",
        "edit" => "room.edit",
        "update" => "room.update",
        "delete" => "room.destroy",

    ];

    public const ROOM_VIEW = [
        "index" => "dashboard.room.index",
        "create" => "dashboard.room.create",
        "detail" => "dashboard.room.detail",
        "edit" => "dashboard.room.edit",

    ];
    public function index()
    {
        if (Gate::denies('index-room')) {
            abort(403, 'You do not have permission to access this page');
        }

        return view(RoomController::ROOM_VIEW["index"], [
            'title' => 'Room',
            'rooms' => Room::with(["dormitory"])->orderByRaw("CAST(room_number AS UNSIGNED) ASC")->paginate(10),
            'rooms_route' => RoomController::ROOM_ROUTE
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view(RoomController::ROOM_VIEW["create"], [
            'title' => 'Tambah Kamar',
            'rooms_route' => RoomController::ROOM_ROUTE,
            'dormitories_route' => DormitoryController::DORMITORY_ROUTE,
            'dormitories' => Dormitory::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rulesData = [
            'room_number' => 'required|integer|min:0',
            // 'fk_id_dormitory' => 'required|unique:rooms'
        ];

        $validator = Validator::make($request->all(), $rulesData);

        $validatedData = $validator->validated();

        $unique_room_number = Room::with(["dormitory"])->where("room_number", $request->room_number)->first();
        if ($unique_room_number) {
            $validator->errors()->add(
                'room_number',
                "The room_number has already been taken."
            );
            return redirect(route(RoomController::ROOM_ROUTE["create"]))->withErrors($validator)->withInput();
        }
        // else {
        //     $unique_room_number = Room::withTrashed()->where("room_number", $request->room_number)->first();
        //     if ($unique_room_number) {
        //         $validator->errors()->add(
        //             'room_number',
        //             "The room_number has in trash. To use this room_number please restore the data. Click <a href='" . route(RoomController::ROOM_ROUTE["trashDetail"], $unique_room_number->id) . "'>here to restore</a>"
        //         );
        //         return redirect(route(RoomController::ROOM_ROUTE["create"]))->withErrors($validator)->withInput();
        //     }
        // }

        $room = Room::create($validatedData);

        $rulesDataImage = [
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];

        for ($i = 0; $i < count($request->file('image')); $i++) {
            $validator = Validator::make($request->all(), $rulesDataImage);
            $validatedDataImage = $validator->validated();
            $file = $request->file('image')[$i]->store('room-images', 'public');

            $validatedDataImage["image"] = $file;
            $validatedDataImage["fk_id_room"] = $room->id;

            RoomImage::create($validatedDataImage);
        }

        return redirect()->route(RoomController::ROOM_ROUTE["index"])->with('success', 'Data Kamar berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Room $room)
    {
        return view(RoomController::ROOM_VIEW["detail"], [
            'title' => "Detail Kamar $room->name",
            'room' => $room,
            'rooms_route' => RoomController::ROOM_ROUTE,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Room $room)
    {
        return view(RoomController::ROOM_VIEW["edit"], [
            'title' => "Edit Kamar $room->name",
            'room' => $room,
            'dormitories' => Dormitory::all(),
            'rooms_route' => RoomController::ROOM_ROUTE,
            'room_images' => RoomImage::where("fk_id_room", $room->id)->get(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Room $room)
    {
        $rulesData = [
            'fk_id_dormitory' => 'required|unique:rooms,fk_id_dormitory,' . $room->id,
            'room_number' => 'required|integer|min:0|unique:rooms,room_number,' . $room->id,
        ];

        $validatedData = $request->validate($rulesData);

        if ($validatedData["fk_id_dormitory"] == 0) {
            $validatedData["fk_id_dormitory"] = null;
        }

        if ($request->file('image')) {
            $rulesDataImage = [
                'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ];

            $validator = Validator::make($request->all(), $rulesDataImage);
            $validatedDataImage = $validator->validated();

            $file = $request->file('image')->store('room-images', 'public');

            $validatedDataImage["image"] = $file;
            $validatedDataImage["fk_id_room"] = $room->id;
            RoomImage::create($validatedDataImage);
        }

        Room::where("id", $room->id)->update($validatedData);


        return redirect()->route(RoomController::ROOM_ROUTE["index"])->with('success', 'Data Kamar berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Room $room)
    {

        Room::find($room->id)->delete();
        return redirect()->route(RoomController::ROOM_ROUTE["index"])->with('success', 'Data Kamar berhasil dihapus');
    }
}
