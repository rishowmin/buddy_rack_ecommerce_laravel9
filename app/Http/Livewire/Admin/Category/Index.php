<?php

namespace App\Http\Livewire\Admin\Category;

use Illuminate\Support\Facades\File;
use Livewire\WithPagination;
use App\Models\Category;
use Livewire\Component;

class Index extends Component
{
    use WithPagination;
    public $category_id;
    public $search = '';
    public $byPublish = null;
    public $counter = 0;

    public function deleteCategory($category_id)
    {
        $this -> category_id = $category_id;
    }

    public function destroyCategory()
    {
        $category = Category::find($this -> category_id);
        // $path = 'uploads/category/'.$category->image;
        // if(File::exists($path)) {
        //     File::delete($path);
        // }
        $category->isActive = '0';
        $category->update();
        // $category->delete();
        session()->flash('delete','Category has been deleted successfully!');
        $this->dispatchBrowserEvent('close-modal');
    }

    public function render()
    {
        $categoryList = Category::where('categoryName', 'like', '%'.$this->search.'%')
                                ->when($this->byPublish, function($query){
                                    $query->where('published', $this->byPublish);
                                })
                                ->where('isActive', '=', '1')
                                ->orderBy('id','asc')
                                ->paginate(5);

        $countTotalRecords = Category::where('isActive', '=', '1')->get();
        $countPublishedRecords = Category::where('published', '=', '1')->where('isActive', '=', '1')->get();
        $countUnpublishedRecords = Category::where('published', '=', '0')->where('isActive', '=', '1')->get();


        return view('livewire.admin.category.index',[
            'categoryList' => $categoryList,
            'countTotalRecords' => $countTotalRecords,
            'countPublishedRecords' => $countPublishedRecords,
            'countUnpublishedRecords' => $countUnpublishedRecords,
        ]);
    }
}
