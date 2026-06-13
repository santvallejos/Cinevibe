<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RetailSale extends Model
{
    use HasFactory;

    protected $fillable = [
        'ticket_id', 'price', 'cant', 'precio_unitario', 'subtotal',
    ];

    protected $casts = [
        'price'          => 'double',
        'precio_unitario' => 'double',
        'subtotal'       => 'double',
        'cant'           => 'integer',
    ];

    /**
     * RetailSale apunta al ticket representativo del evento.
     */
    public function ticket()
    {
        return $this->belongsTo(Ticket::class, 'ticket_id');
    }

    /**
     * RetailSale puede estar en una cabecera de venta.
     */
    public function headboardSale()
    {
        return $this->hasOne(HeadboardSale::class, 'retail_sale_id');
    }

    /**
     * Todos los tickets asociados a esta línea de venta.
     */
    public function tickets()
    {
        return $this->hasMany(Ticket::class, 'retail_sale_id');
    }
}
