<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApplyService extends Model
{
    use HasFactory;
    
    protected $fillable = ['user_id', 'category_id', 'sub_category_id', 'description', 'lat', 'long', 'manual_address', 'service_man_id', 'status'];
    
    public function categories()
    {
        return $this->belongsTo(category::class, 'category_id', 'id');
    }

    public function sub_categories()
    {
        return $this->belongsTo(subCategory::class, 'sub_category_id', 'id');
    }
}
