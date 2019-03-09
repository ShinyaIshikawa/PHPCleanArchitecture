<?php
namespace Clean\Web\Adapter\Controllers;

use App\Http\Controllers\Controller;
use Clean\Web\Adapter\Request\UserApiRequest;
use Clean\Web\Usecase\InputBoudary;
use Clean\Web\Usecase\IUserRepository;
use Clean\Web\Usecase\UserCreateRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Validator;

class UserController extends Controller
{
    /** @var  IUserRepository */
    private $userRepository;

    /** @var  InputBoundary */
    private $useCase;

    /**
     * コントローラインスタンスの生成
     *
     * @param  IUserRepository  $userRepository
     * @return void
     */
    public function __construct(IUserRepository $userRepository, InputBoudary $useCase)
    {
        $this->userRepository = $userRepository;
        $this->useCase = $useCase;
    }

    /**
     * @param UserApiRequest $httpRequest
     * @return JsonResponse
     */
    public function create(Request $httpRequest)
    {
        $userJson = json_decode($httpRequest->getContent(), true);
        $validator = $this->validateRequest($userJson);
        if (!$validator->passes()) {
            $error = $validator->errors()->all();
            return response()->json(['status' => "Error", 'message' => $error]);
        }
        $request = new UserCreateRequest(
            $userJson['code'], $userJson['password'],
            $userJson['name'], $userJson['email']
        );
        $response = $this->useCase->run($this->userRepository, $request);
        return response()->json(['status' => $response->status, 'message' => $response->message]);
    }

    /**
     * @param UserRequest $httpRequest
     * @return JsonResponse
     */
    public function view(UserRequest $httpRequest)
    {
        echo 'view success';
        return;
    }

    private function validateRequest($userJson)
    {
        $rules = [
            'code' => 'required|max:255',
            'password' => 'required|min:8|max:255er',
            'name' => 'required|max:255',
            'email' => 'required|max:255',
        ];
        return Validator::make($userJson, $rules);
    }
}
