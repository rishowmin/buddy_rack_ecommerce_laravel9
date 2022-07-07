<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';

    protected $fillable = [
        'categoryName',
        'description',
        'image',
        'parentCategory',
        'displayOrder',
        'seoPageName',
        'metaTitle',
        'metaKeywords',
        'metaDescription',
        'published',
        'isActive',
    ];

    public function products()
    {
        return $this->hasMany(Product::class, 'category_id', 'id');
    }
}