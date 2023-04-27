<?php

namespace App\Http\Livewire\Admin;

use App\Models\Product as ModelsProduct;
use Livewire\Component;
use Livewire\WithFileUploads;

class Product extends Component
{
    use WithFileUploads;
    public $name, $price, $deskripsi, $image, $stock, $path, $idnya, $isEdit = false;
    protected $listeners = ['edit', 'hapus'];
    protected $rules = [
        'name' => 'required',
        'price' => 'required',
        'deskripsi' => 'required',
        'stock' => 'required',
        'image.*' => 'image|max:1024'
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
        $this->image = '';
        $this->isEdit = false;
    }
    public function simpan()
    {
        if ($this->idnya) {
            $this->update();
        } else {
            $this->validate();
            $filename = $this->image->store('image');
            ModelsProduct::create([
                'name' => $this->name,
                'price' => $this->price,
                'deskripsi' => $this->deskripsi,
                'stock' => $this->stock,
                'image' => $filename,
            ]);
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
