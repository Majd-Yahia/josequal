<?php

namespace App\Models;

use App\Traits\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ContactMessage extends Model
{
    use HasFactory;
    use SoftDeletes;
    use Filterable;

    protected $fillable = [
        'name',
        'email',
        'subject',
        'message',
        'read_at',
    ];

    public function getFilters(): array
    {
        return [];
    }
}
