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

        // create roles and assign existing permissions
        $role1 = Role::create(['name' => 'customer']);
        $role1->givePermissionTo('rice.index');

        $role2 = Role::create(['name' => 'bumdes']);
        $role2->givePermissionTo('rice.index');
        $role2->givePermissionTo('rice.create');
        $role2->givePermissionTo('rice.edit');
        $role2->givePermissionTo('rice.delete');

        $role3 = Role::create(['name' => 'super admin']);
        // gets all permissions via Gate::before rule; see AuthServiceProvider

        // create demo users
        $user = \App\Models\User::factory()->create([
            'name' => 'User demo for customer role',
            'email' => 'customer@bumdessicil.test',
        ]);
        $user->assignRole($role1);

        $user = \App\Models\User::factory()->create([
            'name' => 'User demo for bumdes admin role',
            'email' => 'bumdes@bumdessicil.test',
        ]);
        $user->assignRole($role2);

        $user = \App\Models\User::factory()->create([
            'name' => 'Super Admin',
            'email' => 'superadmin@bumdessicil.test',
        ]);
        $user->assignRole($role3);
    }
}
