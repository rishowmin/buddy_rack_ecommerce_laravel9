<?php

namespace App\Http\Livewire\Admin\ProductAttribute;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\ProductAttribute;

class Index extends Component
{
    use WithPagination;
    public $attribute_id;
    public $search = '';
    public $byPublish = null;
    public $counter = 0;

    public function deleteAttribute($attribute_id)
    {
        $this -> attribute_id = $attribute_id;
    }

    public function destroyAttribute()
    {
        $attribute = ProductAttribute::find($this -> attribute_id);
        $attribute->isActive = '0';
        $attribute->update();
        session()->flash('delete','Product attribute has been deleted successfully!');
        $this->dispatchBrowserEvent('close-modal');
    }

    public function render()
    {
        $attributeList = ProductAttribute::where('attributeName', 'like', '%'.$this->search.'%')
                                ->when($this->byPublish, function($query){
                                    $query->where('published', $this->byPublish);
                                })
                                ->where('isActive', '=', '1')
                                ->orderBy('id','asc')
                                ->paginate(5);

        $countTotalRecords = ProductAttribute::where('isActive', '=', '1')->get();
        $countPublishedRecords = ProductAttribute::where('published', '=', '1')->where('isActive', '=', '1')->get();
        $countUnpublishedRecords = ProductAttribute::where('published', '=', '0')->where('isActive', '=', '1')->get();

        return view('livewire.admin.product-attribute.index',[
            'attributeList' => $attributeList,
            'countTotalRecords' => $countTotalRecords,
            'countPublishedRecords' => $countPublishedRecords,
            'countUnpublishedRecords' => $countUnpublishedRecords,
        ]);
    }
}
