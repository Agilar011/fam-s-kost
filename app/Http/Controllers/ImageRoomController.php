<?php

namespace App\Http\Controllers;

use App\Models\RoomImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageRoomController extends Controller
{
    public function Destroy($id)
    {
        $image = RoomImage::find($id);
        Storage::delete($image->image);
        $image->delete();

        return redirect()->back();
    }
}
