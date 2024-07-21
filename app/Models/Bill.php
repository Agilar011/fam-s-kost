<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
     protected $table = 'bill';

     protected $fillable = [
            'name',
            'month',
            'year',
            'total_price',
            'status',
            'price',
     ];

        public function price()
        {
            return $this->belongsTo(Price::class, "fk_id_price");
        }
}
