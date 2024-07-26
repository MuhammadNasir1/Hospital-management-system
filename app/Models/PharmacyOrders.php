<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PharmacyOrders extends Model
{
    use HasFactory;


    protected $table = "pharmacy_orders";

    protected $timestamp = true;

    protected $fillable  = [
        'user_id',
        'customer_name',
        'customer_phone',
        'payment_type',
        'date',
        'total_amount',
        'discount',
        'paid_amount',
        'change',
        'grand_total',

    ];
}
