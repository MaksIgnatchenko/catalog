<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $entities = [
            'supervisors',
            'companies',
            'adblocks',
            'categories',
            'roles',
            'static_content',
        ];
        $permissions = [];
        foreach ($entities as $entity) {
            $permissions[] = [
                'name' => 'index_' . $entity,
                'display_name' => 'Show list of ' . str_replace('_', ' ', $entity),
                'description' => 'Permission for show list of ' . $entity,
            ];

            $permissions[] = [
                'name' => 'create_' . $entity,
                'display_name' => 'Create ' . str_replace('_', ' ', $entity),
                'description' => 'Permission for create ' . $entity,
            ];

            $permissions[] = [
                'name' => 'read_' . $entity,
                'display_name' => 'Show details of ' . str_replace('_', ' ', $entity),
                'description' => 'Permission for show details of ' . $entity,
            ];

            $permissions[] = [
                'name' => 'edit_' . $entity,
                'display_name' => 'Edit ' . str_replace('_', ' ', $entity),
                'description' => 'Permission for edit ' . $entity,
            ];

            $permissions[] = [
                'name' => 'delete_' . $entity,
                'display_name' => 'Delete ' . str_replace('_', ' ', $entity),
                'description' => 'Permission for delete ' . $entity,
            ];
        }
        DB::table('permissions')->insert($permissions);
    }
}
