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

    /**
     * Cabecera pertenece a un usuario.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Cabecera referencia a una línea de venta (retail_sale).
     */
    public function retailSale()
    {
        return $this->belongsTo(RetailSale::class, 'retail_sale_id');
    }
}
