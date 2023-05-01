<?php

namespace App\Http\Livewire\Admin;

use App\Models\Image;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Product;
use Illuminate\Database\Eloquent\Builder;

class ProductTable extends DataTableComponent
{
    public $no;
    protected $model = Product::class;


    public function configure(): void
    {
        $this->setPrimaryKey('id');
        $this->setDefaultSort('id', 'desc');
        $this->setPaginationStatus(true);
    }
    public function mount()
    {
        $this->no;
    }
    public function columns(): array
    {
        return [
            Column::make("#", "id")->format(fn () => ++$this->no +  ($this->page - 1) * $this->perPage),
            Column::make("Name", "name")
                ->sortable()->searchable(),
            Column::make("Price", "price")
                ->sortable(),
            Column::make('Gambar', 'unique_id')
                ->view('component.action-view'),
            Column::make("Deskripsi", "deskripsi")
                ->sortable(),
            Column::make('Action', 'id')
                ->view('component.table-action')
        ];
    }
}
