<?php

namespace App\Http\Livewire\Admin;

use App\Models\Image;
use Livewire\Component;
use Livewire\WithFileUploads;

class Images extends Component
{
    use WithFileUploads;
    public $path;
    public $images = [];

    public function render()
    {
        return view('livewire.admin.images');
    }
    public function removeMe($index)
    {
        array_splice($this->images, $index, 1);
    }
    public function simpan()
    {
        $this->validate([
            'images.*' => 'image|max:1024', // 1MB Max
        ]);

        foreach ($this->images as $key => $image) {
            $this->images[$key] = $image->store('images');
        }
        $product_id = 1;
        // dd($this->images);
        Image::create(['image' => $this->images]);

        session()->flash('message', 'Image successfully Uploaded.');
    }
}
