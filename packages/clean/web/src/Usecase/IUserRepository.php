<?php

namespace Clean\Web\Usecase;

use Clean\Web\Domain\Model\User;

interface IUserRepository
{
    public function findByCode($code);
    public function findByPassWord($password);
    public function create(User $user);
    public function getError();
}
