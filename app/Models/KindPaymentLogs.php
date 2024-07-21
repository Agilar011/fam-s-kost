<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KindPaymentLogs extends Model
{
    use HasFactory;
    protected $table = 'kind_payment_logs';

    protected $guarded = ['id'];

    // public function paymentLogs()
    // {
    //     return $this->hasOne(PaymentLog::class, "fk_id_paymentlogs");
    // }
}
