<?php

namespace App\Http\Services\Impl;

use Exception;

interface ContactServiceInterface extends BaseServiceInterface
{
    public function countUnread();

    /**
     * @throws Exception
     */
    public function updateStatus(array $data);

    public function sendMail(array $data, array $attachments = []);
}
