<?php

namespace Clean\Web\Domain\Model;

class User
{
    public $code;
    public $name;
    public $email;
    public $password;
    public $hashPassword;
    public $error;

    public function __construct($code, $password, $name, $email)
    {
        $this->code = $code;
        $this->password = $password;
        $this->name = $name;
        $this->email = $email;
    }

    public function isDuplicate($dupCodes, $dupEmails)
    {
        if (!empty($dupCodes)) {
            $this->error = "Sorry.Code has already been registered.";
            return true;
        }

        if (!empty($dupEmails)) {
            $this->error = "Sorry. email has already been registered.";
            return true;
        }
        return false;
    }

    public function pulishHashPassword()
    {
        $this->hashPassword = password_hash($this->password, PASSWORD_DEFAULT);
    }

}
