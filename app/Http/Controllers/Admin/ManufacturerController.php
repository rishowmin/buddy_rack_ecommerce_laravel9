<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ManufacturerFormRequest;
use App\Models\Manufacturer;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;


class ManufacturerController extends Controller
{
    public function index()
    {
        return view ('admin.manufacturer.index');
    }

    public function create()
    {
        return view ('admin.manufacturer.create');
    }

    public function store(ManufacturerFormRequest $request)
    {
        $validateData = $request->validated();

        $manufacturer = new Manufacturer();
        $manufacturer->manufacturerName = $validateData['manufacturerName'];
        $manufacturer->description = $validateData['description'];
        if($request->hasFile('image')){
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;

            $file->move('uploads/manufacturer/',$filename);
            $manufacturer->image = $filename;
        }
        $manufacturer->officialWebsite = $validateData['officialWebsite'];
        $manufacturer->displayOrder = $validateData['displayOrder'];
        $manufacturer->seoPageName = $validateData['seoPageName'];
        $manufacturer->metaTitle = $validateData['metaTitle'];
        $manufacturer->metaKeywords = $validateData['metaKeywords'];
        $manufacturer->metaDescription = $validateData['metaDescription'];
        $manufacturer->published = $request->published == true ? '1':'0';
        $manufacturer->isActive;
        $manufacturer->save();

        return redirect('admin/manufacturer/list')->with('create', 'Manufacturer has been created successfully!');
    }

    public function edit(Manufacturer $manufacturer)
    {
        return view('admin.manufacturer.edit', compact('manufacturer'));
    }

    public function update(ManufacturerFormRequest $request, $manufacturer)
    {
        $validateData = $request->validated();

        $manufacturer = Manufacturer::findOrFail($manufacturer);

        $manufacturer->manufacturerName = $validateData['manufacturerName'];
        $manufacturer->description = $validateData['description'];
        if($request->hasFile('image')){
            $path = 'uploads/manufacturer/'.$manufacturer->image;
            if(File::exists($path)) {
                File::delete($path);
            }

            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;

            $file->move('uploads/manufacturer/',$filename);
            $manufacturer->image = $filename;
        }
        $manufacturer->officialWebsite = $validateData['officialWebsite'];
        $manufacturer->displayOrder = $validateData['displayOrder'];
        $manufacturer->seoPageName = $validateData['seoPageName'];
        $manufacturer->metaTitle = $validateData['metaTitle'];
        $manufacturer->metaKeywords = $validateData['metaKeywords'];
        $manufacturer->metaDescription = $validateData['metaDescription'];
        $manufacturer->published = $request->published == true ? '1':'0';
        $manufacturer->update();

        return redirect('admin/manufacturer/list')->with('update', 'Manufacturer has been updated successfully!');
    }
}
