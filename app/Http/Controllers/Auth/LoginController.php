<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        
        $this->middleware('guest:admin')->except('adminLogut');
        $this->middleware('guest:editor')->except('logout');
    }

    public function logout() {
        
        Auth::guard('editor')->logout();
        return redirect('/publico/index');
      }

      public function adminLogut() {
        
        Auth::guard('admin')->logout();

        return redirect('/publico/index');
      }



      // admin login


      public function showAdminLoginForm()
    {
        return view('login.index', ['url' => 'admin']);
    }

    public function adminLogin(Request $request)
    {
        
        $this->validate($request, [
            'login'   => 'required',
            'password' => 'required'
        ]);

        
        if (Auth::guard('admin')->attempt(['login' => $request->login, 'password' => $request->password], $request->get('remember'))) {

            return redirect()->intended('/administracao');
        }
        return back()->withInput($request->only('login', 'remember'));
    }

    // editor


    public function showEditorLoginForm()
    {
        return view('login.index', ['url' => 'editor']);
    }

    public function editorLogin(Request $request)
    {
        $this->validate($request, [
            'login'   => 'required',
            'password' => 'required'
        ]);

        if (Auth::guard('editor')->attempt(['login' => $request->login, 'password' => $request->password], $request->get('remember'))) {

            return redirect()->intended('/edicao');
        }
        return back()->withInput($request->only('login', 'remember'));
    }
}
