<?php

namespace App\Http\Livewire\Admin\Manufacturer;

use Livewire\Component;
use App\Models\Manufacturer;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    public $manufacturer_id;
    public $search = '';
    public $byPublish = null;
    public $counter = 0;

    public function deleteManufacturer($manufacturer_id)
    {
        $this -> manufacturer_id = $manufacturer_id;
    }

    public function destroyManufacturer()
    {
        $manufacturer = Manufacturer::find($this -> manufacturer_id);
        // $path = 'uploads/manufacturer/'.$manufacturer->image;
        // if(File::exists($path)) {
        //     File::delete($path);
        // }
        $manufacturer->isActive = '0';
        $manufacturer->update();
        // $category->delete();
        session()->flash('delete','Manufacturer has been deleted successfully!');
        $this->dispatchBrowserEvent('close-modal');
    }

    public function render()
    {
        $manufacturerList = Manufacturer::where('manufacturerName', 'like', '%'.$this->search.'%')
                                ->when($this->byPublish, function($query){
                                    $query->where('published', $this->byPublish);
                                })
                                ->where('isActive', '=', '1')
                                ->orderBy('id','asc')
                                ->paginate(5);

        $countTotalRecords = Manufacturer::where('isActive', '=', '1')->get();
        $countPublishedRecords = Manufacturer::where('published', '=', '1')->where('isActive', '=', '1')->get();
        $countUnpublishedRecords = Manufacturer::where('published', '=', '0')->where('isActive', '=', '1')->get();

        return view('livewire.admin.manufacturer.index',[
            'manufacturerList' => $manufacturerList,
            'countTotalRecords' => $countTotalRecords,
            'countPublishedRecords' => $countPublishedRecords,
            'countUnpublishedRecords' => $countUnpublishedRecords,
        ]);
    }
}
