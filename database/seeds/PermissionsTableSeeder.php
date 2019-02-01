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
        $permissions[] = [
            'name' => 'index_messages',
            'display_name' => 'Show list of messages',
            'description' => 'Permission for show list of messages',
        ];
        $permissions[] = [
            'name' => 'create_messages',
            'display_name' => 'Send messages',
            'description' => 'Permission for send messages',
        ];
        $permissions[] = [
            'name' => 'read_messages',
            'display_name' => 'Read messages',
            'description' => 'Permission for read any message',
        ];
        $permissions[] = [
            'name' => 'delete_messages',
            'display_name' => 'Delete messages',
            'description' => 'Permission for delete any message',
        ];
        DB::table('permissions')->insert($permissions);
    }
}
