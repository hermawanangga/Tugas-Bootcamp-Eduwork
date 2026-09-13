<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Order extends Model
{
    protected $fillable = [
        'user_id',
        'product_id',
        'quantity',
        'total',
        'status',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function getStatusLabelAttribute(): string
    {
        return match ($this->status) {
            'diproses'   => 'Pesanan Diproses',
            'packing'    => 'Pesanan Dipacking',
            'dikirim'    => 'Dalam Pengiriman',
            'terkirim'   => 'Pesanan Terkirim',
            'dibatalkan' => 'Pesanan Dibatalkan',
            default      => ucfirst($this->status),
        };
    }
}
