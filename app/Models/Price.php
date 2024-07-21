<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    use HasFactory;
    protected $table = 'price';
    protected $guarded = ['id'];
    protected $fillable = [
        'name',
        'price',
        'description',
    ];

    public function bills()
    {
        return $this->hasMany(Bill::class, "fk_id_price");
    }


}


