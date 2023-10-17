<?php

namespace App\Models;

use App\Models\Coupone;
use App\Traits\Get_Cookie as TraitsGet_Cookie;
use App\Traits\Get_Cookie;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserCart extends Model
{
    use HasFactory, Get_Cookie;
    protected $table = 'users_cart';
    protected $fillable = [
        'user_id',
        'cookie_id',
    ];
    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public static function booted()
    {
        static::addGlobalScope('cookie', function (Builder $builder) {
            $builder->where('cookie_id', Get_Cookie::get_cookie());
        });
    }
    public function CartItems()
    {
        return $this->hasMany(CartItem::class, 'cart_id');
    }
    public function User()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function Products()
    {
        return $this->belongsToMany(Product::class, 'cart_items', 'cart_id', 'product_id')
            ->using(CartItem::class)
            ->withPivot([
                'id',
                'quantity',
            ]);
    }
    public function GetProduct($category_name)
    {
        return $this->Products()->whereHas('Category', function ($category) use ($category_name) {
            $category->where('name', $category_name);
        });
    }
    public function HasProduct($category_name)
    {
        return $this->Products()->whereHas('Category', function ($category) use ($category_name) {
            $category->where('name', $category_name);
        })->exists();
    }
}
