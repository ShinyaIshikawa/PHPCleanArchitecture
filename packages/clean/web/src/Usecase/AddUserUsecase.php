<?php

namespace Clean\Web\Usecase;

use Clean\Web\Domain\Model\User;
use Clean\Web\Usecase\IUserRepository;
use Clean\Web\Usecase\UserCreateResponse;

class AddUserUsecase implements InputBoudary
{
    public function run(IUserRepository $repo, UserCreateRequest $req)
    {
        // ドメインオブジェクトの生成
        $user = new User($req->code, $req->password, $req->name, $req->email);
        //ユーザ名とメールアドレスが重複していないかチェックする
        $dupCode = $repo->findByCode($req->code);
        $dupPass = $repo->findByPassWord($req->password);
        //重複があれば、重複している項目のエラーメッセージを返却する
        $response = new UserCreateResponse();
        if ($user->isDuplicate($dupCode, $dupPass)) {
            // エラーメッセージをリターンする
            $response->status = "Error";
            $response->message = $user->error;
            return $response;
        }
        // 入力が成功している場合は、暗号化されたパスワードを発行し、ユーザを作成する
        $user->pulishHashPassword();
        if (!$repo->create($user)) {
            $response->status = "Error";
            $response->message = $repo->error;
            return $response;
        }
        $response->status = "Success";
        $response->message = "Congratulations!User registration has been succeeded.";
        return $response;
    }
}
