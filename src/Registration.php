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

    public function handle(Request $request): array
    {
        return [];
    }
}