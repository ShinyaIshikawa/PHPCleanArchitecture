<?php

namespace Clean\Web\Adapter\Repositories;

use Clean\Web\Domain\Model\User;
use Clean\Web\Usecase\IUserRepository;
use Clean\Web\Adapter\Models\UserEloquent;

class UserRepository implements IUserRepository
{
    private $error;

    public function findByCode($code)
    {
        return UserEloquent::where('code', $code)->first();
    }

    public function findByPassWord($password)
    {
        return UserEloquent::where('password', $password)->first();
    }

    public function create(User $user)
    {
        try{
            $uElq = new UserEloquent;
            $uElq->code = $user->code;
            $uElq->password = $user->hashPassword;
            $uElq->name = $user->name;
            $uElq->email = $user->email;
            if(!$uElq->save()){
                $this->error = "create user error.";
                return false;
            }
        }catch(Exception $e){
            $this->error = $e->getMessage();
            return false;
        }
        return true;
    }

    public function getError()
    {
        return $this->error;
    }

}
