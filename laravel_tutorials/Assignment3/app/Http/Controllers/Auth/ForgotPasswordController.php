<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\ResetPasswordFormRequest;
use App\Http\Requests\ForgetPasswordFormRequest;
use App\Contracts\Services\ForgetPasswordServiceInterface;

class ForgotPasswordController extends Controller
{
    private $forgetPasswordService;

    public function __construct(ForgetPasswordServiceInterface $forgetPasswordService)
    {
      $this->forgetPasswordService = $forgetPasswordService;
    }

    public function showForgetPasswordForm()
    {
        return view('auth.forgetPassword');
    }

    public function submitForgetPasswordForm(ForgetPasswordFormRequest $request)
    {
        $this->forgetPasswordService->saveForgetPassword($request);
        return back()->with('message', 'We have e-mailed your password reset link!');
    }

    public function showResetPasswordForm($token)
    {
        return view('auth.forgetPasswordLink', ['token' => $token]);
    }

    public function submitResetPasswordForm(ResetPasswordFormRequest $request)
    {
        $this->forgetPasswordService->saveResetPassword($request);
        return redirect('/login')->with('message', 'Your password has been changed!');
    }
}