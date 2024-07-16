<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;
use Illuminate\Support\Facades\Hash;

class PermissionsDemoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        // Permission::create(['name' => 'create-articles']);
        // Permission::create(['name' => 'edit-articles']);
        // Permission::create(['name' => 'delete-articles']);
        // Permission::create(['name' => 'publish-articles']);
        // Permission::create(['name' => 'unpublish-articles']);

        // create roles and assign existing permissions
        // $role1 = Role::create(['name' => 'writer']);
        // $role1->givePermissionTo('create-articles');
        // $role1->givePermissionTo('edit-articles');
        // $role1->givePermissionTo('publish-articles');

        
        $role2 = Role::create(['name' => 'admin']);
        $role2->givePermissionTo(Permission::all());

        $role3 = Role::create(['name' => 'user']);
 

        // $user = \App\Models\User::factory()->create([
        //     'username' => 'writer',
        //     'name' => 'writer',
        //     'dob' => 18,
        //     'email' => 'writer@example.com',
        //     'password' => Hash::make('password')
        // ]);
        // $user->assignRole($role1);

        
        $user = \App\Models\User::factory()->create([
            'username' => 'admin',
            'name' => 'admin',
            
            'email' => 'admin@example.com',
            'password' => Hash::make('password')
        ]);
        $user->assignRole($role2);

        $user = \App\Models\User::factory()->create([
            'username' => 'user',
            'name' => 'user',
         
            'email' => 'user@example.com',
            'password' => Hash::make('password')
        ]);
        $user->assignRole($role3);
    }
}
