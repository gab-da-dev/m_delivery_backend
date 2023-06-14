<?php

declare(strict_types=1);

namespace App\Http\Livewire\UserTypes;

use App\Models\User;
use App\Models\UserType;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class Table extends LivewireDatatable
{
    public $exportable = false;

    public $hideable = true;

    public $createBtn = false;

    public $link = '/admin/user-types/create';

    public $model = UserType::class;

    public function columns(): array
    {
        return [

            Column::name('id')
                ->label('id')
                ->truncate(30)
                ->searchable(),

            Column::name('name')
                ->label('name')
                ->truncate(30)
                ->searchable(),

            Column::callback(['id'], function ($id) {
                return view('livewire.user-types.table-actions', ['id' => $id]);
            })->unsortable()->label('Action'),

        ];
    }
}
