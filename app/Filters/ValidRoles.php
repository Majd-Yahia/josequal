<?php

namespace App\Filters;

use Closure;

class ValidRoles
{
    public function handle($query, Closure $next)
    {
        $query->where('name', '!=', 'Super Admin');
        $next($query);
    }
}
