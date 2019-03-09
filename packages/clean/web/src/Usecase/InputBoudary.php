<?php
namespace Clean\Web\Usecase;

interface InputBoudary
{
    public function run(IUserRepository $repo,UserCreateRequest $req);
}
