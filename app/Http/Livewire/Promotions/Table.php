<?php

declare(strict_types=1);

namespace App\Http\Livewire\Promotions;

use App\Models\Order;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class Table extends LivewireDatatable
{
    public $exportable = false;

    public $hideable = true;

    public $createBtn = false;

    public $link = '/admin/promotions/create';
    
    public function builder()
    {
        return Order::where('order_type', 'delivery')->where('status', 2);
    }

    public function columns(): array
    {
        return [

            Column::name('id')
                ->label('id')
                ->truncate(30)
                ->searchable(),

                Column::name('duration')
                ->label('Duration')
                ->searchable(),
                
            Column::name('status')
                ->view('livewire.deliveries.table-actions-status'),

            Column::callback(['id'], function ($id) {
                return view('livewire.deliveries.table-actions', ['id' => $id]);
            })->unsortable()->label('Action'),
 
        ];
    }

}
