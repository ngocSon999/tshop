<?php

namespace App\Http\Services\Impl;

use Exception;

interface ContactServiceInterface extends BaseServiceInterface
{
    /**
     * @throws Exception
     */
    public function updateStatus(array $data);

    public function sendMail(array $data, array $attachments = []);
}
