<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    // تحديد الحقول القابلة للتعديل (fillable)
    protected $fillable = [
        'start_date',
        'end_date',
        'total_price',
        'payment_status',
        'client_id',
        'property_id',
    ];

    // العلاقة مع النموذج Client
    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    // العلاقة مع النموذج Property
    public function property()
    {
        return $this->belongsTo(Property::class);
    }
}
