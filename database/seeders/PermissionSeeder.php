<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['name' => 'rice.index']);
        Permission::create(['name' => 'rice.create']);
        Permission::create(['name' => 'rice.edit']);
        Permission::create(['name' => 'rice.delete']);
        Permission::create(['name' => 'user.index']);
        Permission::create(['name' => 'user.create']);
        Permission::create(['name' => 'user.edit']);
        Permission::create(['name' => 'user.delete']);
        Permission::create(['name' => 'order.index']);
        Permission::create(['name' => 'order.create']);
        Permission::create(['name' => 'order.edit']);
        Permission::create(['name' => 'order.delete']);
        Permission::create(['name' => 'order.detail']);
        Permission::create(['name' => 'bumdes.create']);
        Permission::create(['name' => 'bumdes.edit']);
        Permission::create(['name' => 'bumdes.delete']);
        Permission::create(['name' => 'bumdes.detail']);
        Permission::create(['name' => 'bumdes.index']);

        // create roles and assign existing permissions
        $role1 = Role::create(['name' => 'customer']);
        $role1->givePermissionTo('order.index');
        $role1->givePermissionTo('order.create');
        $role1->givePermissionTo('order.edit');
        $role1->givePermissionTo('order.delete');
        $role1->givePermissionTo('order.detail');

        $role2 = Role::create(['name' => 'bumdes']);
        $role2->givePermissionTo('rice.index');
        $role2->givePermissionTo('rice.create');
        $role2->givePermissionTo('rice.edit');
        $role2->givePermissionTo('rice.delete');
        $role2->givePermissionTo('bumdes.index');
        $role2->givePermissionTo('bumdes.create');
        $role2->givePermissionTo('bumdes.edit');
        $role2->givePermissionTo('bumdes.delete');
        $role2->givePermissionTo('bumdes.detail');

        $role3 = Role::create(['name' => 'super admin']);
        // gets all permissions via Gate::before rule; see AuthServiceProvider

        // create demo users
        $userCustomer = \App\Models\User::factory()->create([
            'name' => 'Customer 1',
            'email' => 'customer1@bumdessicil.test',
            'no_hp' => '6285263216699',
        ]);
        $userCustomer->assignRole($role1);

        $userBumdes1 = \App\Models\User::factory()->create([
            'name' => 'Bumdes 1',
            'email' => 'bumdes1@bumdessicil.test',
            'no_hp' => '6285263216699',
        ]);
        $userBumdes1->assignRole($role2);

        $userBumdes2 = \App\Models\User::factory()->create([
            'name' => 'Bumdes 2',
            'email' => 'bumdes2@bumdessicil.test',
            'no_hp' => '6285263216699',
        ]);
        $userBumdes2->assignRole($role2);

        $userAdmin = \App\Models\User::factory()->create([
            'name' => 'Super Admin',
            'email' => 'superadmin@bumdessicil.test',
            'no_hp' => '6285263216699',
        ]);
        $userAdmin->assignRole($role3);
    }
}
