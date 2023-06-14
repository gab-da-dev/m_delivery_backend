<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Order;
use App\Models\Store;
use App\Models\Product;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Collection;

class Index extends Component
{

    public function mount()
    {
        $this->store = Store::find(1);
        


    }

    public function render()
    {
        return view('index')->extends('layouts.home')->section('content')->layoutData([
            'logo' => $this->store['logo'] ?? '',
            'header_logo' => $this->store['header_image'] ?? '',
        ]);
    }
}
