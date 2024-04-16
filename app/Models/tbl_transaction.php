<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class tbl_transaction extends Model
{
    protected $fillable = [
        'reference_number',
        'sender_name',
        'sender_contact',
        'recipient_name',
        'recipient_contact',
        'transaction_type',
        'amount_local_currency',
        'currency_conversion_code',
        'amount_converted',
        'transaction_status',
        'branch_sent',
        'branch_received',
        'transfer_fee_id',
        'datetime_transaction',
    ];
}
