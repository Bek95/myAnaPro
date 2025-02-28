<?php

namespace App\Services;

use App\Models\User;

class UserService
{
    public function create(array $data): bool
    {
        if (!empty($data['user_name']) && !empty($data['email']) && $data['password']) {
            $user = new User();
            $user->name = $data['user_name'];
            $user->email = $data['email'];
            $user->password = $data['password'];

            return $user->save();
        } else {
            return false;
        }
    }

}
