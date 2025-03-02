<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use App\Http\Requests\UserRequest;

class UserController extends Controller
{

    const PASSWORD_ERROR_MESSAGE = 'Les mots de passe ne correspondent pas.';

    public function index()
    {
        return view('users.index');
    }

    public function create(UserRequest $request, UserService $userService)
    {
        $dataValidated = $request->validated();

        if (!$this->arePasswordsMatching($request->password, $request->confirm_password)) {
            return redirect()->back()->withError(self::PASSWORD_ERROR_MESSAGE);
        }

        $res = $userService->create($dataValidated);

        if ($res) {
            return to_route('login')->with('success', 'Vous avez créé un compte, vous pouvez vous connecter');
        } else {
            return redirect()->back()->withError('tu ne pourras couper d\'url');
        }

    }

    private function arePasswordsMatching(string $password, string $confirmPassword): bool
    {
        return $password === $confirmPassword;
    }

}
