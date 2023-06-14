<?php

declare(strict_types=1);

namespace App\Http\Livewire\Products;

use App\Models\Product;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class Table extends LivewireDatatable
{
    public $exportable = false;

    public $hideable = true;

    public $createBtn = false;

    public $link = '/admin/products/create';

    public $model = Product::class;

    public function columns()
    {
        return [

            Column::name('name')
                ->label('name')
                ->searchable(),

            Column::name('price')
                ->label('price')
                ->searchable()
            ,

            Column::callback(['id', 'name',], function ($id, $name) {
                return view('livewire.products.table-actions', ['id' => $id, 'name' => $name]);
            })->unsortable()->label('Action')


        ];
    }
}
