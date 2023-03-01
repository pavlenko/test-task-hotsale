<?php

namespace PE\TestTaskHotsale;


use Symfony\Component\HttpFoundation\Request;

class Registration
{
    public const FIELD_FIRST_NAME      = 'first_name';
    public const FIELD_LAST_NAME       = 'last_name';
    public const FIELD_EMAIL           = 'email';
    public const FIELD_PASSWORD        = 'password';
    public const FIELD_REPEAT_PASSWORD = 'repeat_password';

    public const GLOBAL_ERROR_KEY = 'global';

    private const USERS = [
        [
            self::FIELD_FIRST_NAME => "Emerson",
            self::FIELD_LAST_NAME  => "Villarreal",
            self::FIELD_EMAIL      => "velit.justo@yahoo.org",
            "id"                   => "1"
        ],
        [
            self::FIELD_FIRST_NAME => "Roth",
            self::FIELD_LAST_NAME  => "Macdonald",
            self::FIELD_EMAIL      => "dui.fusce@aol.couk",
            "id"                   => "2"
        ],
        [
            self::FIELD_FIRST_NAME => "Brenden",
            self::FIELD_LAST_NAME  => "Cantu",
            self::FIELD_EMAIL      => "felis@protonmail.org",
            "id"                   => "3"
        ],
        [
            self::FIELD_FIRST_NAME => "William",
            self::FIELD_LAST_NAME  => "Rush",
            self::FIELD_EMAIL      => "urna.suscipit.nonummy@hotmail.com",
            "id"                   => "4"
        ],
        [
            self::FIELD_FIRST_NAME => "Gail",
            self::FIELD_LAST_NAME  => "Holder",
            self::FIELD_EMAIL      => "amet.consectetuer.adipiscing@protonmail.com",
            "id"                   => "5"
        ]
    ];

    public function handle(Request $request): array
    {
        if (!$request->isMethod(Request::METHOD_POST)) {
            return [];
        }

        $errors = [];
        if (empty($request->get(self::FIELD_FIRST_NAME))) {
            $errors[self::FIELD_FIRST_NAME] = 'First Name is required';
        }

        if (empty($request->get(self::FIELD_LAST_NAME))) {
            $errors[self::FIELD_LAST_NAME] = 'Last Name is required';
        }

        if (empty($request->get(self::FIELD_EMAIL))) {
            $errors[self::FIELD_EMAIL] = 'Email is required';
        } elseif (false === strpos($request->get(self::FIELD_EMAIL), '@')) {
            $errors[self::FIELD_EMAIL] = 'Email is invalid';
        }

        $password = $request->get(self::FIELD_PASSWORD);
        if (empty($password)) {
            $errors[self::FIELD_PASSWORD] = 'Password is required';
        }

        $password2 = $request->get(self::FIELD_REPEAT_PASSWORD);
        if (empty($password2)) {
            $errors[self::FIELD_REPEAT_PASSWORD] = 'Repeat Password is required';
        }

        if (!empty($password) && !empty($password2) && $password !== $password2) {
            $errors[self::FIELD_REPEAT_PASSWORD] = 'Passwords must be same';
        }

        if (empty($errors)) {
            foreach (self::USERS as $user) {
                if ($request->get(self::FIELD_EMAIL) === $user[self::FIELD_EMAIL]) {
                    $errors[self::GLOBAL_ERROR_KEY] = 'User with email ' . $request->get(self::FIELD_EMAIL) . ' already exists';
                    break;
                }
            }
        }


        //TODO log result

        return $errors;
    }
}