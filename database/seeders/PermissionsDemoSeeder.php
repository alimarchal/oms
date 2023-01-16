<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class PermissionsDemoSeeder extends Seeder
{
    /**
     * Create the initial roles and permissions.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['name' => 'Create']);
        Permission::create(['name' => 'Read']);
        Permission::create(['name' => 'Edit']);
        Permission::create(['name' => 'Delete']);
        Permission::create(['name' => 'Full Access']);

        // create roles and assign existing permissions
        $role1 = Role::create(['name' => 'Student']);
        $role1->givePermissionTo('Create');
        $role1->givePermissionTo('Read');
        $role1->givePermissionTo('Edit');

        $role2 = Role::create(['name' => 'Supervisor']);
        $role2->givePermissionTo('Create');
        $role2->givePermissionTo('Read');
        $role2->givePermissionTo('Edit');
        $role2->givePermissionTo('Delete');

        $role3 = Role::create(['name' => 'Evaluator']);
        $role3->givePermissionTo('Read');
        $role3->givePermissionTo('Edit');
        $role3->givePermissionTo('Create');
        $role3->givePermissionTo('Delete');


        $role6 = Role::create(['name' => 'In-charge']);
        $role6->givePermissionTo('Create');
        $role6->givePermissionTo('Read');
        $role6->givePermissionTo('Edit');
        $role6->givePermissionTo('Delete');


        $role5 = Role::create(['name' => 'Super-Admin']);
        $role5->givePermissionTo('Create');
        $role5->givePermissionTo('Read');
        $role5->givePermissionTo('Edit');
        $role5->givePermissionTo('Delete');
        $role5->givePermissionTo('Full Access');
        // gets all permissions via Gate::before rule; see AuthServiceProvider

        // create demo users
        $user = \App\Models\User::factory()->create([
            'name' => 'Ali Raza Marchal',
            'email' => 'kh.marchal@gmail.com',
            'type' => 'Student',
            'password' => Hash::make('123456789'),
        ]);
        $user->assignRole($role5);

    }
}
