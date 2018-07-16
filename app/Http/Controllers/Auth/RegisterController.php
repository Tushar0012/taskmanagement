<?php

namespace App\Http\Controllers\Auth;

use App\Notifications\UserRegisteredSuccessfully;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;


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
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    /* protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    } */

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    /* protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    } */
    
     /**
     * Register new account.
     *
     * @param Request $request
     * @return User
     */
    
    protected function register(Request $request)
    {
        /** @var User $user */
        dd($request);
        $validatedData = $request->validate([
            'user_fname'     => 'required|string|max:255',
            'user_username'     => 'required|string|max:255',
            'user_email'    => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
        try {
            $validatedData['user_comp_id']          = 1;
            $validatedData['user_salution']         = 'Mr';
            $validatedData['user_lname']            = 'Dubey';
            $validatedData['password']              = bcrypt(array_get($validatedData, 'password'));
            $validatedData['user_designation']      = 'Software Engineeer';
            $validatedData['user_address1']         = '953/2, Nehru Road, Arjun Nagar, Kotla Mubarakpur, South Extension Part-1, New Delhi';
            $validatedData['user_address2']         = 'B205, Ground Floor, Duggal Colony, Khanpur, New Delhi';
            $validatedData['user_mobile']           = '9910124312';
            $validatedData['user_landline']         = '+9111-123456';
            $validatedData['user_pincode']          = '110003';
            $validatedData['user_branch_id']        = 1;
            $validatedData['user_department_id']    = 1;
            $validatedData['user_role_id']          = 1;
            $validatedData['user_can_view']         = 'yes';
            $validatedData['user_can_add']          = 'yes';
            $validatedData['user_can_edit']         = 'yes';
            $validatedData['user_can_delete']       = 'yes';
            $validatedData['user_has_access']       = 'yes';
            $validatedData['activation_code']       = str_random(30).time();
            $validatedData['status']                = 1;
            $validatedData['remember_token']        = '123456';
            $validatedData['user_created_by_id']    = 1;
            $validatedData['user_updated_by_id']    = 1;
            $validatedData['created_at']            = date('Y-m-d H:i:s');
            $validatedData['updated_at']            = date('Y-m-d H:i:s');
            //dd($validatedData);  
            $user                                   = app(User::class)->create($validatedData);
        } catch (\Exception $exception) {
            logger()->error($exception);
            return redirect()->back()->with('message', 'Unable to create new user.');
        }
        $user->notify(new UserRegisteredSuccessfully($user));
        return redirect()->back()->with('message', 'Successfully created a new account. Please check your email and activate your account.');
    }
    /**
     * Activate the user with given activation code.
     * @param string $activationCode
     * @return string
     */
    public function activateUser(string $activationCode)
    {
        try {
            $user = app(User::class)->where('activation_code', $activationCode)->first();
            if (!$user) {
                return "The code does not exist for any user in our system.";
            }
            $user->status          = 1;
            $user->activation_code = null;
            $user->save();
            auth()->login($user);
        } catch (\Exception $exception) {
            logger()->error($exception);
            return "Whoops! something went wrong.";
        }
        return redirect()->to('/home');
    }
}
