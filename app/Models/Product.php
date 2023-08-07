<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'category_id',
        'title',
        'description',
        'image',
        'price',
        'quantity',
        'discount_price',
        'status',
    ];

    public function category(){
        return $this->belongsTo(Category::class);
    }
}
