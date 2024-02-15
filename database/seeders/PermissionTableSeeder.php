<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            'dashboard-view',
            'front-view',

            'role-list',
            'role-create',
            'role-edit',
            'role-delete',

            'user-list',
            'user-create',
            'user-edit',
            'user-delete',

            'case-list',
            'case-create',
            'case-edit',
            'case-detail',
            'case-delete',

            'event-list',
            'event-create',
            'event-edit',
            'event-delete',

            'document-list',
            'document-create',
            'document-edit',
            'document-delete',

            'court-staff-list',
            'court-staff-create',
            'court-staff-edit',
            'court-staff-delete',

            'staff-role-list',
            'staff-role-create',
            'staff-role-edit',
            'staff-role-delete',

            'party-list',
            'party-create',
            'party-edit',
            'party-delete',

            'case-staff-assignment-list',
            'case-staff-assignment-create',
            'case-staff-assignment-edit',
            'case-staff-assignment-delete',
        ];
        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}
