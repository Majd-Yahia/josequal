<?php
namespace App\Filters;

use Closure;

class ActiveFilter
{
    public function handle($query, Closure $next)
    {
        $query->where('active', 1);
        $next($query);
    }
}
