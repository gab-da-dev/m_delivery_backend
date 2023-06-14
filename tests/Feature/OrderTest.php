<?php

declare(strict_types=1);

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Livewire\Livewire;
use App\Models\Product;
use App\Http\Livewire\Home;
use App\Http\Livewire\Orders\Create;
use App\Models\Order;
use App\Models\Store;
use Illuminate\Foundation\Testing\RefreshDatabase;

class OrderTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
    }

    public function testCreateOrder()
    {
        $user = User::find(1);
        
        Livewire::actingAs($user)
            ->test(Create::class)
            ->call('submit')
            ->assertHasNoErrors();

    }

}
