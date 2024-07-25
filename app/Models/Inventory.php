<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    use HasFactory;

    protected $table = "inventories";

    protected $timestamp = true;

    protected $fillable =  [
        'name',
        'packing',
        'batch_id',
        'expiry_date',
        'quantity',
        'price'

    ];
}
