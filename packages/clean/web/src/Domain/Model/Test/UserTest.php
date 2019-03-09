<?php

namespace Clean\Web\Domain\Model\TestTest;

use Clean\Web\Domain\Model\User;
use Tests\TestCase;

class UserTest extends TestCase
{
    /**
     * @test
     */
    public function testMakeHashPassWord()
    {
        $user = new User('100001', 'some_password', 'taro_yamada', 'taro_yamada+009@gmail.com');
        $hash = $user->pulishHashPassword();
        $this->assertFalse(password_verify($user->password, $hash));
    }

    /**
     * @test
     */
    public function testDuplicateCode()
    {
        $user = new User('100001', 'some_password', 'taro_yamada', 'taro_yamada+009@gmail.com');
        $dupcode = array(array('100001', 'suzuki_1025', 'suzuki_hanako', 'hanako_suzuki+008@hanako.com'));
        $dupMail = array();
        // コードが重複している場合はエラーとなる
        $this->assertTrue($user->isDuplicate($dupcode, $dupMail));
    }

    /**
     * @test
     */
    public function testDuplicateMail()
    {
        $user = new User('100001', 'some_password', 'taro_yamada', 'taro_yamada+009@gmail.com');
        $dupcode = array();
        $dupMail = array(array('900325', 'tanaka_0302', 'taro_yamada', 'taro_yamada+009@gmail.com'));
        // メールアドレスが重複している場合はエラーとなる
        $this->assertTrue($user->isDuplicate($dupcode, $dupMail));
    }

    /**
     * @test
     */
    public function testDuplicateNone()
    {
        $user = new User('100001', 'some_password', 'taro_yamada', 'taro_yamada+009@gmail.com');
        $dupcode = array();
        $dupMail = array();
        $this->assertFalse($user->isDuplicate($dupcode, $dupMail));
    }

}
