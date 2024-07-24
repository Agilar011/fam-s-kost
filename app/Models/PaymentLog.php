<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentLog extends Model
{
    use HasFactory;

    protected $table = 'payment_logs';

    protected $fillable = [
        'total_month',
        'from',
        'to',
        'proof_payment',
        'fk_id_kind_paymentlogs',
        'fk_id_member'
    ];

    public function member()
    {
        return $this->belongsTo(Member::class, "fk_id_member");
    }

    public function kindpayment()
    {
        return $this->belongsTo(KindPaymentLogs::class, "fk_id_kind_paymentlogs");
    }
}
