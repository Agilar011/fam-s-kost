<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dormitory extends Model
{
    use HasFactory;
    protected $table = 'dormitories';

    protected $fillable = [
        'name',
        'address',
        'phone_number',
        'image',
        'checkin_date',
        'checkout_date'
    ];

    public function rooms()
    {
        return $this->hasMany(Room::class, "fk_id_dormitory");
    }

    public function paymentLogs()
    {
        return $this->hasMany(PaymentLog::class, "fk_id_dormitory");
    }

    public function parentDormitories()
    {
        return $this->hasMany(ParentDormitory::class, "fk_id_dormitory");
    }
}
