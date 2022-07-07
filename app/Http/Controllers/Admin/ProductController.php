<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Models\Manufacturer;
use Illuminate\Http\Request;
use App\Models\ProductAttribute;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductFormRequest;
use App\Models\Product;
use App\Models\ProductImage;

class ProductController extends Controller
{
    public function index()
    {
        return view ('admin.product.index');
    }

    public function create()
    {
        $categories = Category::all()->where('isActive','=', '1');
        $manufacturers = Manufacturer::all()->where('isActive','=', '1');
        $productSizes = ProductAttribute::all()->where('attributeType','=','Size')->where('isActive','=','1');
        $productColors = ProductAttribute::all()->where('attributeType','=','Color')->where('isActive','=','1');
        return view ('admin.product.create',
                    compact('categories', 'manufacturers', 'productSizes', 'productColors'));
    }

    public function store(ProductFormRequest $request)
    {
        $validateData = $request->validated();
        $category = Category::findOrFail($validateData['category_id']);

        $product = $category->products()->create([
            'productName' => $validateData['productName'],
            'shortDescription' => $validateData['shortDescription'],
            'fullDescription' => $validateData['fullDescription'],
            'sku' => $validateData['sku'],
            'category_id' => $validateData['category_id'],
            'manufacturer' => $validateData['manufacturer'],
            'trending' => $request->trending == true ? '1':'0',
            'markAsNew' => $request->markAsNew == true ? '1':'0',
            'productType' => $validateData['productType'],
            // 'productAttribute' => $validateData['productAttribute'],
            'displayOrder' => $validateData['displayOrder'],
            'price' => $validateData['price'],
            'oldPrice' => $validateData['oldPrice'],
            'productCost' => $validateData['productCost'],
            'inventoryMethod' => $validateData['inventoryMethod'],
            'stockQuantity' => $validateData['stockQuantity'],
            'warehouse' => $validateData['warehouse'],
            'minCartQuantity' => $validateData['minCartQuantity'],
            'maxCartQuantity' => $validateData['maxCartQuantity'],
            'seoPageName' => $validateData['seoPageName'],
            'metaTitle' => $validateData['metaTitle'],
            'metaKeywords' => $validateData['metaKeywords'],
            'metaDescription' => $validateData['metaDescription'],
            'published' => $request->published == true ? '1':'0',
            'isActive',
        ]);

        if($request->hasFile('image')){
            $i = 1;
            $uploadPath = 'uploads/product/';
            $imageNameFormat = $validateData['imageTitle'].'_PID'.$product->id.'_';

            foreach($request->file('image') as $imageFile){
                $extention = $imageFile->getClientOriginalExtension();
                $filename = $imageNameFormat.$i++.'.'.$extention;
                $imageFile->move($uploadPath, $filename);
                // $finalImagePathName = $uploadPath.$filename;

                $product->productImages()->create([
                    'product_id' => $product->id,
                    'image' => $filename,
                    'imageTitle' => $validateData['imageTitle'],
                    'imageAlt' => $validateData['imageAlt'],
                    // 'imageDisplayOrder' => $validateData['imageDisplayOrder'],
                ]);
            }
        }

        return redirect('admin/product/list')->with('create', 'Product has been created successfully!');

    }
}
