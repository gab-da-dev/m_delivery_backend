<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create(['name' => 'create-users']);
        Permission::create(['name' => 'edit-users']);
        Permission::create(['name' => 'delete-users']);
        Permission::create(['name' => 'show-users']);

        Permission::create(['name' => 'create-clients']);
        Permission::create(['name' => 'edit-clients']);
        Permission::create(['name' => 'delete-clients']);
        Permission::create(['name' => 'show-clients']);

        Permission::create(['name' => 'create-orders']);
        Permission::create(['name' => 'edit-orders']);
        Permission::create(['name' => 'delete-orders']);
        Permission::create(['name' => 'show-orders']);

        Permission::create(['name' => 'create-products']);
        Permission::create(['name' => 'edit-products']);
        Permission::create(['name' => 'delete-products']);
        Permission::create(['name' => 'show-products']);

        Permission::create(['name' => 'create-promotions']);
        Permission::create(['name' => 'edit-promotions']);
        Permission::create(['name' => 'delete-promotions']);
        Permission::create(['name' => 'show-promotions']);

        Permission::create(['name' => 'create-product-types']);
        Permission::create(['name' => 'edit-product-types']);
        Permission::create(['name' => 'delete-product-types']);
        Permission::create(['name' => 'show-product-types']);

        Permission::create(['name' => 'create-deliveries']);
        Permission::create(['name' => 'edit-deliveries']);
        Permission::create(['name' => 'delete-deliveries']);
        Permission::create(['name' => 'show-deliveries']);

        Permission::create(['name' => 'create-stores']);
        Permission::create(['name' => 'edit-stores']);
        Permission::create(['name' => 'delete-stores']);
        Permission::create(['name' => 'show-stores']);

        Permission::create(['name' => 'show-dashboard']);

        $adminRole = Role::create(['name' => 'Admin']);
        $clientRole = Role::create(['name' => 'Client']);
        $driverRole = Role::create(['name' => 'Driver']);
        $userRole = Role::create(['name' => 'User']);

        $adminRole->givePermissionTo([
            'create-users',
            'edit-users',
            'delete-users',
            'show-users',
            'create-clients',
            'edit-clients',
            'delete-clients',
            'show-clients',
            'create-products',
            'edit-products',
            'delete-products',
            'show-products',
            'create-orders',
            'edit-orders',
            'delete-orders',
            'show-orders',
            'create-stores',
            'edit-stores',
            'delete-stores',
            'show-stores',
            'show-deliveries',
            'show-product-types',
            'show-dashboard',
        ]);

        $userRole->givePermissionTo([
            'create-orders',
            'edit-orders',
            // 'delete-orders',
        ]);

        $driverRole->givePermissionTo([
            'edit-deliveries',
            'show-deliveries',
        ]);
    }
}
