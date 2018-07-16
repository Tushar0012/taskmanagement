@extends('layouts.app')
@section('content')
<div class="container">
<div class="content-wrapper auth register-bg-1">
  <div class="row justify-content-center">
    <div class="col-12 grid-margin">
        <div class="card">          
          <div class="card-body">
            <h4 class="card-title">{{ __('Register') }}</h4>
            <!--<div class="card-header">{{ __('Register') }}</div>-->
            @if(session()->has('message'))
            <div class="alert alert-success">
            {{ session()->get('message') }}
            </div>
            @endif
            <form method="POST" action="{{ route('register') }}" aria-label="{{ __('Register') }}">
                @csrf
              <p class="card-description"><b>Company info</b></p>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group row">
                    <label for="compname" class="col-sm-3 col-form-label">{{ __('Company Name') }}</label>
                    <div class="col-sm-9">
                      <input id="compname" type="text" class="form-control" name="compname" required autofocus>                                
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group row">
                    <label for="compemail" class="col-sm-3 col-form-label">{{ __('Company Email') }}</label>
                    <div class="col-sm-9">
                      <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
               <div class="col-md-6">
                   <!--<div class="form-group row">
                    <label for="gender" class="col-sm-3 col-form-label">{{ __('Gender') }}</label>
                    <div class="col-sm-9">
                      <select class="form-control">
                        <option>Male</option>
                        <option>Female</option>
                      </select>
                    </div>
                  </div>-->
                  <div class="form-group row">
                    <label for="compmobile" class="col-sm-3 col-form-label">{{ __('Mobile') }}</label>
                    <div class="col-sm-9">
                      <input id="mobile" type="text" name=mobile"" class="form-control" />
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group row">
                    <label for="complandline" class="col-sm-3 col-form-label">{{ __('Landline') }}</label>
                    <div class="col-sm-9">
                      <input id="landline" type="text" name="landline" class="form-control" />
                    </div>
                  </div>
                </div>
              </div>
              <p class="card-description"><b>Address</b></p>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group row">
                    <label for="comphouseno_floor" class="col-sm-3 col-form-label">{{ __('House No./Floor') }}</label>
                    <!--<div class="col-sm-9">
                      <select class="form-control">
                        <option>Category1</option>
                        <option>Category2</option>
                        <option>Category3</option>
                        <option>Category4</option>
                      </select>
                    </div>-->                    
                    <div class="col-sm-9">
                      <input id="houseno" type="text" name="houseno" class="form-control" />
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group row">
                    <label for="comp_street" class="col-sm-3 col-form-label">{{ __('Street Address') }}</label>
                    <div class="col-sm-9">
                      <input id="street" type="text" name="street" class="form-control" />
                    </div>
                    <!--<div class="col-sm-4">
                      <div class="form-radio">
                        <label class="form-check-label">
                          <input type="radio" class="form-check-input" name="membershipRadios" id="membershipRadios1" value="" checked> Free
                        </label>
                      </div>
                    </div>
                    <div class="col-sm-5">
                      <div class="form-radio">
                        <label class="form-check-label">
                          <input type="radio" class="form-check-input" name="membershipRadios" id="membershipRadios2" value="option2"> Professional
                        </label>
                      </div>
                    </div>-->
                  </div>
                </div>
              </div>
              
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group row">
                    <label for="comp_country" class="col-sm-3 col-form-label">{{ __('Country') }}</label>
                    <div class="col-sm-9">
                      <input id="country" type="text" name="country" class="form-control" />
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group row">
                    <label for="state" class="col-sm-3 col-form-label">{{ __('State') }}</label>
                    <div class="col-sm-9">
                      <input id="state" type="text" name="state" class="form-control" />
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group row">
                    <label for="comp_city" class="col-sm-3 col-form-label">{{ __('City') }}</label>
                    <div class="col-sm-9">
                      <input id="city" type="text" name="city" class="form-control" />
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group row">
                    <label for="postcode" class="col-sm-3 col-form-label">{{ __('Postcode') }}</label>
                    <div class="col-sm-9">
                      <input id="pincode" type="text" name="pincode" class="form-control" />
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group row">
                    <label for="comp_industry_type" class="col-sm-3 col-form-label">{{ __('Industry Type') }}</label>
                    <div class="col-sm-9">
                      <input id="industry" type="text" name="industry" class="form-control" />
                    </div>
                  </div>
                </div>               
<!--//-//-->
              </div>
              <p class="card-description"><b>Personal Info</b></p>
               <div class="row">
                <div class="col-md-6">
                  <div class="form-group row">
                    <label for="comp_fname" class="col-sm-3 col-form-label">{{ __('First Name') }}</label>
                    <div class="col-sm-9">
                      <!--<select class="form-control">
                        <option>America</option>
                        <option>India</option>
                        <option>Italy</option>
                        <option>Russia</option>
                        <option>Britain</option>
                      </select> -->
                      <input id="user_fname" type="text" class="form-control{{ $errors->has('user_fname') ? ' is-invalid' : '' }}" name="user_fname" value="{{ old('user_fname') }}" required autofocus>
                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('user_fname') }}</strong>
                                    </span>
                                @endif
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group row">
                    <label for="comp_lname" class="col-sm-3 col-form-label">{{ __('Last Name') }}</label>
                    <div class="col-sm-9">
                      <input id="lanme" type="text"  name="lanme" class="form-control" />
                    </div>
                  </div>
                </div> 
               </div>
               <div class="row">
                <div class="col-md-6">
                  <div class="form-group row">
                    <label for="comp_Designation" class="col-sm-3 col-form-label">{{ __('Designation') }}</label>
                    <div class="col-sm-9">
                      <input id="designation" type="text" name="designation" class="form-control" />
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group row">
                    <label for="comp_username" class="col-sm-3 col-form-label">{{ __('Username') }}</label>
                    <div class="col-sm-9">
                      <input id="username" type="text" name="username" class="form-control" />
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group row">
                    <label for="comp_password" class="col-sm-3 col-form-label">{{ __('Password') }}</label>
                    <div class="col-sm-9">
                      <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group row">
                    <label for="comp_confirm_password" class="col-sm-3 col-form-label">{{ __('Confirm Password') }}</label>
                    <div class="col-sm-9">
                      <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                    </div>
                  </div>
                </div>
                </div>
                <div class="row"> 
                  <div class="col-md-6">                
                      <label class="form-check-label"><input type="checkbox" class="form-check-input" checked> I agree to the terms</label> 
                  </div>                    
                </div>
                <div class="row">
                  <div class="col-md-6"> 
                    <button type="submit" class="btn btn-success mr-2">{{ __('Register') }}</button>
                    <button class="btn btn-light">Cancel</button>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
  </div>
</div>
</div>
@endsection