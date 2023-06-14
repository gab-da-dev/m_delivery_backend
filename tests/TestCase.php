<?php

namespace Tests;

use Illuminate\Support\Facades\Artisan;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;
    use RefreshDatabase;
    use WithFaker;

    protected function setUp(): void
    {
        parent::setUp();

        $this->seedRoleAndPermission();
        $this->seedAdminUser();
        $this->seedProducts();
        $this->seedProductsIngredient();
        $this->seedProductCategory();
        $this->seedOrder();
        $this->seedStore();
        $this->seedFcmToken();
    }

    protected function seedProducts(): void
    {
        Artisan::call('db:seed', [
            '--class' => 'ProductSeeder',
        ]);
    }

    protected function seedProductsIngredient(): void
    {
        Artisan::call('db:seed', [
            '--class' => 'ProductIngredientSeeder',
        ]);
    }

    protected function seedProductCategory(): void
    {
        Artisan::call('db:seed', [
            '--class' => 'ProductCategorySeeder',
        ]);
    }

    protected function seedAdminUser(): void
    {
        Artisan::call('db:seed', [
            '--class' => 'AdminUserSeeder',
        ]);
    }

    protected function seedRoleAndPermission(): void
    {
        Artisan::call('db:seed', [
            '--class' => 'RoleAndPermissionSeeder',
        ]);
    }

    protected function seedOrder(): void
    {
        Artisan::call('db:seed', [
            '--class' => 'OrderSeeder',
        ]);
    }

    protected function seedStore(): void
    {
        Artisan::call('db:seed', [
            '--class' => 'StoreSeeder',
        ]);
    }

    protected function seedFcmToken(): void
    {
        Artisan::call('db:seed', [
            '--class' => 'FcmUserTokensSeeder',
        ]);
    }

}
