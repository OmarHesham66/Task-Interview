<?php

namespace App\Models;

use App\Models\Brand;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $fillable = [
        'name',
        'slug',
        'describtion',
        'photo',
        'shiping_from',
        'shiping_price',
        'weight',
        'price',
        'discount',
        'avaliabile',
        'quantity',
        'category_id',
    ];
    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    protected static function booted()
    {
        static::creating(function (Product $product) {
            $product->slug = Str::slug($product->name);
            // Str::star
        });
    }
    public function Category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
    public function OrderItem()
    {
        return $this->hasOne(OrderItem::class, 'product_id');
    }
    public function CartItem()
    {
        return $this->hasOne(CartItem::class, 'product_id');
    }
    public function Products()
    {
        return $this->belongsToMany(Product::class, 'cart_items', 'cart_id', 'product_id', 'id', 'id');
    }
    public function scopeFilter(Builder $builder, $data)
    {
        $arr = array_merge([
            'category_id' => null,
            'discount' => null,
            'SortA' => null,
            'SortD' => null,
            'date' => null,
        ], $data);
        $builder->when($arr['category_id'], function ($builder, $value) {
            return $builder->where('category_id', $value);
        });
        $builder->when($arr['discount'], function ($builder, $value) {
            return $builder->where('discount', $value);
        });
        $builder->when($arr['SortA'], function ($builder, $value) {
            return $builder->orderBy($value, 'desc');
        });
        $builder->when($arr['SortD'], function ($builder, $value) {
            return $builder->orderBy($value, 'asc');
        });
        $builder->when($arr['date'], function ($builder, $value) {
            return $builder->orderBy('id', 'desc');
        });
    }
}
