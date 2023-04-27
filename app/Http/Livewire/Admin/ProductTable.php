<?php

namespace App\Http\Livewire\Admin;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Product;

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
            Column::make("Stock", "stock")
                ->sortable(),
            Column::make("Deskripsi", "deskripsi")
                ->sortable(),
            Column::make('Image', 'image')->format(
                function ($value, $row, Column $column) {
                    if ($row->image == 0) {
                        return 'none';
                    } else {
                        return '<img src="' . route("helper.show-picture", ["path" => $row->image]) . '" width="100px>"';
                    }
                }
            )->html(),
            Column::make('Action', 'id')
                ->view('component.table-action')
        ];
    }
}
