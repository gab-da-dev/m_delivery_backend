<?php

declare(strict_types=1);

namespace App\Http\Livewire\Client\Orders;

use App\Models\Order;

use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class Table extends LivewireDatatable
{
    public $exportable = false;

    public $hideable = false;

    public $createBtn = false;

    public $link = '/admin/orders/create';

    public function builder()
    {
        return Order::where('status', '=', 2)->where('user_id', auth()->user()->id);
    }

    public $model = Order::class;

    public function columns(): array
    {
        return [

            Column::name('id')
                ->label('id')
                ->truncate(30)
                ->searchable(),

                Column::name('status')
                ->label('status')
                ->searchable()
            ,
            Column::callback(['id'], function ($id) {
                return view('livewire.orders.table-actions', ['id' => $id]);
            })->unsortable()->label('Action'),

        ];
    }
}
