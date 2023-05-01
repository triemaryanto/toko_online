<?php

namespace App\Http\Livewire\Admin;

use App\Models\Image;
use App\Models\Product as ModelsProduct;
use Livewire\Component;
use Livewire\WithFileUploads;

class Product extends Component
{
    use WithFileUploads;
    public $name, $price, $deskripsi, $images = [], $stock, $path, $idnya, $isEdit = false;
    protected $listeners = ['edit', 'hapus'];
    protected $rules = [
        'name' => 'required',
        'price' => 'required',
        'deskripsi' => 'required',
        'stock' => 'required',
        'images.*' => 'image|max:1024'
    ];
    public function edit($id)
    {
        $a = ModelsProduct::find($id);
        $this->name = $a->name;
        $this->price = $a->price;
        $this->deskripsi = $a->deskripsi;
        $this->stock = $a->stock;
        $this->path = $a->image;
        $this->isEdit = true;
    }
    public function update()
    {
    }
    public function batal()
    {
        $this->name = '';
        $this->price = '';
        $this->deskripsi = '';
        $this->stock = '';
        $this->images = [];
        $this->isEdit = false;
    }
    public function simpan()
    {
        if ($this->idnya) {
            $this->update();
        } else {
            $this->validate();
            $unique_id = time();
            $product['unique_id'] = $unique_id;
            $product['name'] = $this->name;
            $product['price'] = $this->price;
            $product['deskripsi'] = $this->deskripsi;
            $product['stock'] = $this->stock;
            foreach ($this->images as $key => $image) {
                $pimage['product_unique_id'] = $unique_id;
                $filename = $this->images[$key]->store('image');
                $pimage['image'] = $filename;
                Image::create($pimage);
            }
            ModelsProduct::create($product);
            $this->batal();
            $this->emit('refreshDatatable');
            session()->flash('success');
        }
    }

    public function render()
    {
        return view('livewire.admin.product');
    }
}
