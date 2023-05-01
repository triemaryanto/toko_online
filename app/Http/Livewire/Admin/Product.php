<?php

namespace App\Http\Livewire\Admin;

use App\Models\Image;
use App\Models\Product as ModelsProduct;
use Livewire\Component;
use Livewire\WithFileUploads;

class Product extends Component
{
    use WithFileUploads;
    public $name, $price, $deskripsi, $images = [], $stock, $path, $idnya, $isEdit = false, $productImages, $uniquenya;
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
        $this->idnya = $a->id;
        $this->uniquenya = $a->unique_id;
        $this->name = $a->name;
        $this->price = $a->price;
        $this->deskripsi = $a->deskripsi;
        $this->stock = $a->stock;
        $this->productImages = Image::where('product_unique_id', $a->unique_id)->get();
        $this->isEdit = true;
    }
    public function update()
    {
        Product::find($this->idnya)
            ->update([
                'name' => $this->name,
                'price' => $this->price,
                'deskirpsi' => $this->deskripsi,
                'stock' => $this->stock,
            ]);
        $this->batal();
        $this->emit('refreshDatatable');
        session()->flash('success');
    }

    public function delete()
    {
        Product::find($this->idnya)->delete();
        Image::where('product_unique_id', $this->uniquenya)->delete();
        $this->batal();
        $this->emit('refreshDatatable');
        session()->flash('success');
    }
    public function deleteImage($id)
    {
        Image::where('id', $id)->delete();
        session()->flash('deleteImage', 'Terhapus');
    }
    public function batal()
    {
        $this->idnya = '';
        $this->uniquenya = '';
        $this->name = '';
        $this->price = '';
        $this->deskripsi = '';
        $this->stock = '';
        $this->images = [];
        $this->productImages = [];
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
