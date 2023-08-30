<?php

namespace App\Repository;

interface BaseRepositoryInterface
{
    public function getListWithFilters(array $with = [], array $columns = ["*"]);
    public function paginatedListWithFilters(array $with = [], array $columns = ["*"], int $perPage = 0);
    public function findById(int $id, array $columns = ["*"], array $with = []);
    public function editById(int $id, array $data = []);
    public function deleteById(int $id);
}
