<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;
    protected $table = 'Members';

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
        return $this->hasMany(Room::class, "fk_id_member");
    }

    public function paymentLogs()
    {
        return $this->hasMany(PaymentLog::class, "fk_id_member");
    }

    public function parentDormitories()
    {
        return $this->hasMany(ParentMember::class, "fk_id_member");
    }
}
