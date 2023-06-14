<?php

declare(strict_types=1);

namespace App\Http\Livewire\Clients;

use App\Models\User;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class Table extends LivewireDatatable
{
    public $exportable = false;

    public $hideable = true;

    public $createBtn = false;

    public $link = '/admin/clients/create';

    // public $model = User::class;
    
    public function builder()
    {
        return User::role(['Client']);
    }

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

                Column::name('last_name')
                ->label('last name')
                ->truncate(30)
                ->searchable(),

                Column::name('email')
                ->label('email')
                ->truncate(30)
                ->searchable(),

        ];
    }

}
