<?php

declare(strict_types=1);

namespace App\Http\Livewire\ProductCategory;

use App\Models\ProductCategory;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class Table extends LivewireDatatable
{
    public $exportable = false;

    public $hideable = true;

    public $createBtn = false;

    public $link = '/admin/product-category/create';

    public $model = ProductCategory::class;

    public function columns()
    {
        return [

            Column::name('name')
                ->label('name')
                ->searchable(),

            
            Column::callback(['id', 'name',], function ($id, $name) {
                return view('livewire.productCategory.table-actions', ['id' => $id, 'name' => $name]);
            })->unsortable()->label('Action')


        ];
    }
}
