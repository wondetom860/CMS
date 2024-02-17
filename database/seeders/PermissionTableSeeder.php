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
            'event-detail',
            'event-edit',
            'event-delete',

            'document-list',
            'document-create',
            'document-edit',
            'document-detail',
            'document-delete',

            'court-staff-list',
            'court-staff-create',
            'court-staff-edit',
            'court-staff-detail',
            'court-staff-delete',

            'staff-role-list',
            'staff-role-create',
            'staff-role-edit',
            'staff-role-detail',
            'staff-role-delete',

            'party-list',
            'party-create',
            'party-edit',
            'party-detail',
            'party-delete',

            'case-staff-assignment-list',
            'case-staff-assignment-create',
            'case-staff-assignment-edit',
            'case-staff-assignment-detail',
            'case-staff-assignment-delete',

            'profile-list',
            'profile-create',
            'profile-edit',
            'profile-detail',
            'profile-delete',
            
            'manage-basic-file',
            'manage-case-file',
            'manage-court-staff',
            'manage-rbac',

        ];
        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}
