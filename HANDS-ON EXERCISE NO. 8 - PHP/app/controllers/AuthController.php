<?php

declare(strict_types=1);

class AuthController extends Controller
{
    public function register(): void
    {
        $message = isPost() ? 'Registration sample submitted successfully.' : null;
        $this->render('auth/register', ['message' => $message]);
    }

    public function login(): void
    {
        $message = isPost() ? 'Login sample submitted successfully.' : null;
        $this->render('auth/login', ['message' => $message]);
    }

    public function forgotPassword(): void
    {
        $message = isPost() ? 'Password reset request sample submitted successfully.' : null;
        $this->render('auth/forgot', ['message' => $message]);
    }
}
