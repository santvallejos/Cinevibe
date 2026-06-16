<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RetailSale extends Model
{
    use HasFactory;

    protected $fillable = [
        'ticket_id', 'price', 'cant', 'precio_unitario', 'subtotal', 'headboard_sale_id',
    ];

    protected $casts = [
        'price'          => 'double',
        'precio_unitario' => 'double',
        'subtotal'       => 'double',
        'cant'           => 'integer',
    ];

    public function ticket()
    {
        return $this->belongsTo(Ticket::class, 'ticket_id');
    }

    public function headboardSale()
    {
        return $this->belongsTo(HeadboardSale::class, 'headboard_sale_id');
    }

    public function tickets()
    {
        return $this->hasMany(Ticket::class, 'retail_sale_id');
    }
}
