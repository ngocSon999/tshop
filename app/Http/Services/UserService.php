<?php

namespace App\Http\Services;
use App\Http\Repositories\UserRepository;
use App\Http\Services\Impl\UserServiceInterface;

class UserService extends BaseService implements UserServiceInterface
{
    public function repository(): string
    {
        return UserRepository::class;
    }
}
