<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryFormRequest;
use App\Models\Category;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        return view ('admin.category.index');
    }

    public function create()
    {
        $parentCategory = Category::all();
        return view ('admin.category.create')
                    ->with('parentCategory' , $parentCategory);
    }

    public function store(CategoryFormRequest $request)
    {
        $validateData = $request->validated();

        $category = new Category;
        $category->categoryName = $validateData['categoryName'];
        $category->description = $validateData['description'];
        if($request->hasFile('image')){
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;

            $file->move('uploads/category/',$filename);
            $category->image = $filename;
        }
        $category->parentCategory = $validateData['parentCategory'];
        $category->displayOrder = $validateData['displayOrder'];
        $category->seoPageName = $validateData['seoPageName'];
        $category->metaTitle = $validateData['metaTitle'];
        $category->metaKeywords = $validateData['metaKeywords'];
        $category->metaDescription = $validateData['metaDescription'];
        $category->published = $request->published == true ? '1':'0';
        $category->isActive;
        $category->save();

        return redirect('admin/category/list')->with('create', 'Category has been created successfully!');
    }

    public function edit(Category $category)
    {
        return view('admin.category.edit', compact('category'));
    }

    public function update(CategoryFormRequest $request, $category)
    {
        $validateData = $request->validated();

        $category = Category::findOrFail($category);

        $category->categoryName = $validateData['categoryName'];
        $category->description = $validateData['description'];
        if($request->hasFile('image')){
            $path = 'uploads/category/'.$category->image;
            if(File::exists($path)) {
                File::delete($path);
            }

            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;

            $file->move('uploads/category/',$filename);
            $category->image = $filename;
        }
        $category->parentCategory = $validateData['parentCategory'];
        $category->displayOrder = $validateData['displayOrder'];
        $category->seoPageName = $validateData['seoPageName'];
        $category->metaTitle = $validateData['metaTitle'];
        $category->metaKeywords = $validateData['metaKeywords'];
        $category->metaDescription = $validateData['metaDescription'];
        $category->published = $request->published == true ? '1':'0';
        $category->update();

        return redirect('admin/category/list')->with('update', 'Category has been updated successfully!');
    }
}
