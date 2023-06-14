<?php

declare(strict_types=1);

namespace App\Http\Livewire\Deliveries;

use App\Models\Order;

use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\BooleanColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class Table extends LivewireDatatable
{
    public $exportable = false;

    public $hideable = true;

    public $createBtn = false;

    public $link = '/admin/orders/create';

    // TODO: fix orders that come through
    public function builder()
    {
        return Order::where('order_type', 'delivery')->where('status', 2)->where('delivery_status', '=', null)->orWhere('delivery_status', '<', 1);
    }

    public function columns(): array
    {
        return [

            Column::name('id')
                ->label('id')
                ->truncate(30)
                ->searchable(),

            Column::name('distance')
                ->label('Distance from store')
                ->view('livewire.deliveries.distance'),

            BooleanColumn::name('delivery_status')
                ->view('livewire.deliveries.table-actions-boolean'),

            Column::name('status')
                ->view('livewire.deliveries.table-actions-status'),

            Column::callback(['id'], function ($id) {
                return view('livewire.deliveries.table-actions', ['id' => $id]);
            })->unsortable()->label('Action'),

        ];
    }
}
