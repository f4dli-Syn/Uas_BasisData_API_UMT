<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        $permissions = [
            'view orders',
            'create orders',
            'edit orders',
            'update orders',

            // 'view roles',
            // 'create roles',
            // 'edit roles',
            // 'update roles',

            // 'view payments',
            // 'create payments',
            // 'edit payments',


            // 'view locations',
            // 'create locations',
            // 'edit locations',
            // 'update locations',

            // 'view products',
            // 'create products',
            // 'edit products',
            // 'update products',

            // 'view vehicles',
            // 'create vehicles',

            // 'view reviews',
            // 'create reviews',

            // 'view settings',
            // 'edit settings',
        ];

        foreach ($permissions as $permission) {
            Permission::create([
                'name' => $permission
            ]);
        }

        $customerRole = Role::create([
            'name' => 'customer'
        ]);

        $customerRole->givePermissionTo([
            'view orders',
            'create orders',
            'edit orders',
            'update orders',
            // 'view roles',
            // 'create roles',
            // 'edit roles',
            // 'update roles',
            // 'view payments',
            // 'create payments',
            // 'edit payments',
            // 'view locations',
            // 'create locations',
            // 'edit locations',
            // 'update locations',

            // 'view products',
            // 'create products',
            // 'edit products',
            // 'update products',

            // 'view vehicles',

            // 'view reviews',
            // 'create reviews',

            // 'view settings',
            // 'edit settings',
        ]);

        $driverRole = Role::create([
            'name' => 'driver'
        ]);

        $driverRole->givePermissionTo([
            'view orders',
            // 'view roles',
            // 'view payments',
            // 'view locations',
            // 'create locations',
            // 'edit locations',
            // 'update locations',

            // 'view products',

            // 'view vehicles',
            // 'create vehicles',

            // 'view reviews',

            // 'view settings',
            // 'edit settings',
        ]);
    }
}
