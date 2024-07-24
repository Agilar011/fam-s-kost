<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $fillable = [
        'room_number',
        'fk_id_member'
    ];

    protected $table = 'rooms';

    public function roomimages()
    {
        return $this->hasMany(RoomImage::class, "fk_id_room");
    }

    public function member()
    {
        return $this->belongsTo(Member::class, "fk_id_member" );
    }
}
