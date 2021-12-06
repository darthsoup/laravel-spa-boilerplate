<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller as BaseController;

class AuthController extends BaseController
{
    protected ?string $guard = 'web';

    public function __construct()
    {
        if (!is_null($this->guard)) {
            \Auth::shouldUse($this->guard);
        }
    }
}
