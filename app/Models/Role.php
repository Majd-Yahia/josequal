<?php

namespace App\Models;

use App\Filters\ValidRoles;
use App\Traits\Filterable;
use Spatie\Permission\Models\Role as ModelsRole;

class Role extends ModelsRole
{
    use Filterable;

    public function getFilters(): array
    {
        return [
            ValidRoles::class,
        ];
    }
}
