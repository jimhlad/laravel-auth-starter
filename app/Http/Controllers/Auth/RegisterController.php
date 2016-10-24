<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Services\RegisterService;
use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Exceptions\UserCouldNotBeRegisteredException;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Our registration service
     *
     * @var RegisterService
     */
    protected $registerService;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(RegisterService $registerService)
    {
        $this->middleware('guest');
        $this->registerService = $registerService;
    }

    /**
     * Override the typical register function on the RegistersUsers trait
     *
     * @param  App\Http\Requests\RegisterRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function register(RegisterRequest $request)
    {
        event(new Registered($user = $this->create($request->all())));
        $this->guard()->login($user);
        return redirect($this->redirectPath());
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        try {
            return $this->registerService->signup([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => bcrypt($data['password']),
            ]);
        }
        catch(UserCouldNotBeRegisteredException $e) {
            abort(500);
        }
    }
}
