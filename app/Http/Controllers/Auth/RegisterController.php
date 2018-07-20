<?php

namespace App\Http\Controllers\Auth;

use App\Notifications\UserRegisteredSuccessfully;
use App\User;
use App\companyRegistrationModel;
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
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'compname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:company,comp_email',
            'mobile' => 'required|numeric|min:10',
            'houseno' => 'required|string',
            'street' => 'required|string',
            'country' => 'required',
            'state' => 'required',
            'city' => 'required',
            'pincode' => 'required|numeric|min:6',
            'industry' => 'required',
            'fname' => 'required|string',
            'lname' => 'required|string',
            'designation' => 'required|string',
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required|string|min:6',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data){
		
		// call model function		
		$com = new companyRegistrationModel();
		$comid =  $com->saveCompanyData($data);
		
        return User::create([
            'user_comp_id' => $comid,
            'user_fname' => $data['fname'],
            'user_lname' => $data['lname'],
            'email' => $data['email'],
            'user_designation' => $data['designation'],
            'password' => Hash::make($data['password']),
            'con_password' => Hash::make($data['password_confirmation']),
            'status' => 1,
            'user_created_by_id' => 0,
            'user_updated_by_id' => 0
        ]);
    }
    
     /**
     * load country state.
     *
     * @param Request $request
     * @return User
     */
	  protected function loadStateValue($countryID){
		  
		$com = new companyRegistrationModel();		
		$conId = urldecode($countryID);
		$state =  $com->loadCountryStateValue($conId);
		return $state;
    }
	
	/**
     * load country state.
     *
     * @param Request $request
     * @return User
     */
	  protected function loadCityValue($stateID){
		  
		$com = new companyRegistrationModel();		
		$stId = urldecode($stateID);
		$city =  $com->loadStateCityValue($stId);
		return $city;
    }
}
