<?php
namespace Clean\Web\Usecase;

interface OutputBoudary
{
    public function run(IUserRepository $repo,UserCreateRequest $req);
}
