<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::insert($this->data());

        $role_name = "Administrator";
        $role = Role::create(['name' => $role_name, 'description' => $role_name]);
        $role->syncPermissions(Permission::pluck('id')->toArray());
    }

    public function loadRaw($permissions)
    {
        return [
            'actions' => $permissions,
            'display_name' => null,
            'category' => null,
            'guard_name' => 'web',
        ];
    }

    public function data()
    {
        $model = [
            'users' => $this->loadRaw(['index', 'create',  'edit', 'destroy']),
            'roles' => $this->loadRaw(['index', 'create',  'edit', 'destroy']),
            'services' => $this->loadRaw(['index', 'create',  'edit', 'destroy']),
            // 'contact-us' => $this->loadRaw([]),
            // 'pages' => $this->loadRaw([]),
            // 'settings' => $this->loadRaw([]),
        ];

        $data = [];
        foreach ($model as $key => $value) {
            foreach ($this->generateNames($value, $key) as $name) {
                $el             = explode('.', $name);
                $data[] = [
                    'name' => $name,
                    'display_name' => is_null($value['display_name']) ? ucfirst(trim($el[0])) . ' ' . ucfirst(trim($el[1])) : ucfirst(trim($value['display_name'])),
                    'category' => is_null($value['category']) ? trim($key) : trim($value['category']),
                    'guard_name' =>  is_null($value['guard_name']) ? "web" : $value['guard_name'],
                ];
            }
        }
        return $data;
    }

    public function generateNames($options, $model)
    {
        $actions = [];
        foreach ($options['actions'] as $value) {
            $actions[] = $model . '.' . $value;
        }
        return $actions;
    }
}
