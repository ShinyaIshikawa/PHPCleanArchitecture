<?php
namespace Clean\Web\Usecase;

class UserCreateRequest
{
    public $code;
    public $password;
    public $name;
    public $email;

    public function __construct($code,$password,$name,$email){
        $this->code = $code;
        $this->password = $password;
        $this->name = $name;
        $this->email = $email;
    }
}