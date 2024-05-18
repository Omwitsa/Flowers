<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Category;
use App\Models\SubCategory;
use Livewire\WithFileUploads;

class EditSubCategory extends Component
{
    use WithFileUploads;
    public $subCategory;
    public $categories;
    public string $Name = '';
    public string $HeadSize = '';
    public string $Category = 'AAA ROSES';
    public $file;
    public $active;

    public function mount($id)
    {
        $this->categories = Category::all();
        $this->subCategory = SubCategory::find($id);
        $this->Name = $this->subCategory->Name;
        $this->HeadSize = $this->subCategory->HeadSize;
        $this->Category = $this->subCategory->Category;
        $this->picUrl = $this->subCategory->picUrl;
        $this->active = $this->subCategory->active === 1;
    }

    public function updateSubCategory()
    {
        $name = md5($this->file . microtime()).'.'.$this->file->extension();
        $this->file->storeAs('images', $name);

        $this->subCategory->Name = $this->Name;
        $this->subCategory->HeadSize = $this->HeadSize;
        $this->subCategory->Category = $this->Category;
        $this->subCategory->active = $this->active;
        $this->subCategory->picUrl = $name;
        $this->subCategory->save();

        toastr()->success('Sub-category updated successfully', 'Congrats', ['positionClass' => 'toast-top-center']);
        $this->redirect('/sub-categories', navigate: true);
    }
    public function render()
    {
        return view('livewire.edit-sub-category');
    }
}
