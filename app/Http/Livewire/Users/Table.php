<?php

declare(strict_types=1);

namespace App\Http\Livewire\Users;

use App\Models\User;

use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class Table extends LivewireDatatable
{
    public $exportable = false;

    public $hideable = true;

    public $createBtn = false;

    public $link = '/admin/users/create';

    public $model = User::class;

    // public function builder()
    // {
    //     return User::where('user_type', '=', null);
    // }

    public function columns(): array
    {
        return [

            Column::name('id')
                ->label('id')
                ->truncate(30)
                ->searchable(),

            Column::name('first_name')
                ->label('first name')
                ->truncate(30)
                ->searchable(),

            Column::callback(['id'], function ($id) {
                return view('livewire.users.table-actions', ['id' => $id]);
            })->unsortable()->label('Action'),

        ];
    }
}
