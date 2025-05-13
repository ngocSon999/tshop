<?php

namespace App\Http\Services\Impl;

interface ProductServiceInterface extends BaseServiceInterface
{
    public function findByCategory($id);
}
