<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\ProductAttribute;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductAttributeFormRequest;

class ProductAttributeController extends Controller
{
    public function index()
    {
        return view ('admin.product-attribute.index');
    }

    public function create()
    {
        return view ('admin.product-attribute.create');
    }

    public function store(ProductAttributeFormRequest $request)
    {
        $validateData = $request->validated();

        $productAttribute = new ProductAttribute();
        $productAttribute->attributeName = $validateData['attributeName'];
        $productAttribute->description = $validateData['description'];
        $productAttribute->attributeType = $validateData['attributeType'];
        $productAttribute->displayOrder = $validateData['displayOrder'];
        $productAttribute->published = $request->published == true ? '1':'0';
        $productAttribute->isActive;
        $productAttribute->save();

        return redirect('admin/attribute/list')->with('create', 'Product attribute has been created successfully!');
    }

    public function edit(ProductAttribute $productAttribute)
    {
        return view('admin.product-attribute.edit', compact('productAttribute'));
    }

    public function update(ProductAttributeFormRequest $request, $productAttribute)
    {
        $validateData = $request->validated();

        $productAttribute = ProductAttribute::findOrFail($productAttribute);

        $productAttribute->attributeName = $validateData['attributeName'];
        $productAttribute->description = $validateData['description'];
        $productAttribute->attributeType = $validateData['attributeType'];
        $productAttribute->displayOrder = $validateData['displayOrder'];
        $productAttribute->published = $request->published == true ? '1':'0';
        $productAttribute->update();

        return redirect('admin/attribute/list')->with('update', 'Product attribute has been updated successfully!');
    }
}
