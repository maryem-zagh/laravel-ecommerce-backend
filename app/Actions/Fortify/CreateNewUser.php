<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique(User::class),
            ],
            'password' => $this->passwordRules(),
        ])->validate();

        return User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
            'location'=>$input['location'],
            'DateOfBirth'=>$input['DateOfBirth'],
            'profesion'=>$input['profesion'],
            'adress'=>$input['adress'],
            'code'=>$input['code'],
            'number'=>$input['number'],
<<<<<<< HEAD
            'api_token' => Str::random(60),
=======
            // 'api_token' => Str::random(60),
>>>>>>> b95e4d992aa5a7d447ba5d73dc2a43c62686a515
        ]);
    }
}
