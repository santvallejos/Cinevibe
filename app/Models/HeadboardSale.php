<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class HeadboardSale extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'retail_sale_id', 'state', 'total',
    ];

    protected $casts = [
        'total' => 'double',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function retailSales()
    {
        return $this->hasMany(RetailSale::class, 'headboard_sale_id');
    }
}
