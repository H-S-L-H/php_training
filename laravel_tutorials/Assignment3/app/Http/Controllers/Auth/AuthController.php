<?php
  
namespace App\Http\Controllers\Auth;
  
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Contracts\Services\AuthServiceInterface;
  
class AuthController extends Controller
{
    private $authService;

    public function __construct(AuthServiceInterface $authService)
    {
      $this->authService = $authService;
    }

    public function index()
    {
        return view('auth.login');
    }  
      
    public function registration()
    {
        return view('auth.registration');
    }
      
    public function postLogin(LoginRequest $request)
    {   
        $this->authService->loginUser($request);
        return view("dashboard");
    }


    public function postRegistration(RegisterRequest $request)
    {             
        $this->authService->registerUser($request);
        return redirect('login');
    }

    public function logout() {
        Session::flush();
        Auth::logout();
        return Redirect('login');
    }
}