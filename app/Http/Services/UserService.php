<?php

namespace App\Http\Services;
use App\Http\Repositories\Impl\UserRepoInterface;
use App\Http\Services\Impl\UserServiceInterface;

class UserService extends BaseService implements UserServiceInterface
{
    public function repository(): string
    {
        return UserRepoInterface::class;
    }
}
