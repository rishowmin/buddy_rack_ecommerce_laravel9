<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Manufacturer extends Model
{
    use HasFactory;

    protected $table = 'manufacturers';

    protected $fillable = [
        'manufacturerName',
        'description',
        'image',
        'officialWebsite',
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
        return $this->hasMany(Product::class, 'manufacturer_id', 'id');
    }
}
