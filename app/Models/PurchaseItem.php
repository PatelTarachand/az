<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseItem extends Model
{
    use HasFactory;
    protected $fillable =[ 'user_id', 'service_id', 'item_name', 'price', 'qty', 'total', 'status', 'service_man_id'];
}
