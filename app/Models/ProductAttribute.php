<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductAttribute extends Model
{
    use HasFactory;

    protected $table = 'product_attributes';

    protected $fillable = [
        'attributeName',
        'description',
        'attributeType',
        'displayOrder',
        'published',
        'isActive',
    ];

    public function products()
    {
        return $this->hasMany(Product::class, 'attribute_id', 'id');
    }
}
