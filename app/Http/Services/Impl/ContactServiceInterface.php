<?php

namespace App\Http\Services\Impl;

use Exception;

interface ContactServiceInterface extends BaseServiceInterface
{
    /**
     * @throws Exception
     */
    public function updateStatus(array $data);
}
