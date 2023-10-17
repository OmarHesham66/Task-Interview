<?php

namespace App\Models;

use Carbon\Carbon;
use App\Models\Shiping;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserOrder extends Model
{
    use HasFactory;
    protected $table = 'users_order';
    protected $fillable = [
        'user_id',
        'cookie_user_id',
        'order_number',
        'status_order',
        'Vat',
        'discount',
        'shiping_price',
        'total_price',
    ];
    protected $hidden = [
        'created_at',
        'updated_at',
    ];
    protected static function booted()
    {
        static::creating(function (UserOrder $userOrder) {
            $year = now()->year;
            $order = UserOrder::latest()->first();
            if ($order) {
                $userOrder->order_number = $order->order_number + 1;
            } else {
                $userOrder->order_number = (int)((string)$year . '0001');
            }
        });
    }
    public function OrderItems()
    {
        return $this->hasMany(OrderItem::class, 'order_id');
    }
    public function User()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function Products()
    {
        return $this->belongsToMany(Product::class, 'order_items', 'order_id', 'product_id')
            ->using(OrderItem::class)
            ->withPivot([
                'product_name',
                'option_id',
                'option',
                'quantity',
                'price',
            ]);
    }
    public function Shiping()
    {
        return $this->hasOne(Shiping::class, 'order_id', 'id');
    }
    // public static function get_order($number)
    // {
    //     return self::where('order_number', $number)->first()->id;
    // }
}
