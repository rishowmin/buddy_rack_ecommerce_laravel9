<?php

namespace App\Models;

use App\Models\ProductImage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = [
        'productName',
        'shortDescription',
        'fullDescription',
        'sku',
        'category_id',
        'manufacturer',
        'trending',
        'markAsNew',
        'productType',
        // 'productAttribute',
        'displayOrder',
        'price',
        'oldPrice',
        'productCost',
        'inventoryMethod',
        'stockQuantity',
        'warehouse',
        'minCartQuantity',
        'maxCartQuantity',
        'seoPageName',
        'metaTitle',
        'metaKeywords',
        'metaDescription',
        'published',
        'isActive',
    ];

    public function productImages()
    {
        return $this->hasMany(ProductImage::class, 'product_id', 'id');
    }
}
