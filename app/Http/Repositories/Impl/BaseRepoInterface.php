<?php

namespace App\Http\Repositories\Impl;

use Illuminate\Database\Eloquent\Model;

interface BaseRepoInterface
{
    public function create(array $data): Model;
    public function update(array $data, int $id);
    public function delete(int $id);
    public function findById(int $id);
    public function findAll();
}
