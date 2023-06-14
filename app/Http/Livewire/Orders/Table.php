<?php

declare(strict_types=1);

namespace App\Http\Livewire\Orders;

use App\Models\Order;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class Table extends LivewireDatatable
{
    public $exportable = false;

    public $hideable = true;

    public $createBtn = false;

    public $link = '/admin/orders/create';

    public $model = Order::class;

    public function columns(): array
    {
        return [

            Column::name('id')
                ->label('id')
                ->truncate(30)
                ->searchable(),

            Column::name('status')
            ->view('livewire.orders.table-actions-status'),

            Column::name('created_at')
            ->label('Created At')
            ->searchable()
        ,
            Column::callback(['id'], function ($id) {
                return view('livewire.orders.table-actions', ['id' => $id]);
            })->unsortable()->label('Action'),

        ];
    }

    public function rowClasses($row, $loop)
    {
        // dd($row->{'status'} === '1');
        if($row->{'status'} === '0'){
            return 'divide-x divide-gray-100 bg-gray-300';
        }
        // return 'divide-x divide-gray-100 text-sm text-gray-900 ' . ($this->rowIsSelected($row) ? 'bg-yellow-100' : ($row->{'status'} === 'Ferrari' ? 'bg-red-500' : ($loop->even ? 'bg-gray-100' : 'bg-gray-50')));
    }
}
