<?php

namespace App\Repository\Service;

use App\Models\Service;
use App\Repository\BaseRepository;

class ServiceRepository extends BaseRepository
{
    protected $model = Service::class;
    protected $perPage = 15;
}
