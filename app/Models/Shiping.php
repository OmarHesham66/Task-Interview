<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shiping extends Model
{
    use HasFactory;
    protected $table = 'shiping';
    protected $fillable = [
        'order_id',
        'first_name',
        'last_name',
        'address_name',
        'country',
        'city',
        'state',
        'zip_code',
        'phone_number',
        'email',
    ];
    protected $hidden = [
        'created_at',
        'updated_at',
    ];
    public function Order()
    {
        return $this->belongsTo(UserOrder::class, 'order_id', 'id');
    }
}
