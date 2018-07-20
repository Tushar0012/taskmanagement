@extends('layouts.app')
@section('content')
<div class="container">
	<div class="content-wrapper auth register-bg-1">
		<div class="row justify-content-center">
			<div class="col-12 grid-margin">
				<div class="card">
					<div class="card-header">{{ __('Register') }}</div>
					<div class="card-body">						
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
											<input id="compname" type="text" class="form-control{{ $errors->has('compname') ? ' is-invalid' : '' }}" name="compname"  value="{{ old('compname') }}" autofocus>
											@if ($errors->has('compname'))
											<span class="invalid-feedback" role="alert">
											<strong>{{ $errors->first('compname') }}</strong>
											</span>
											@endif											
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group row">
										<label for="email" class="col-sm-3 col-form-label">{{ __('Company Email') }}</label>
										<div class="col-sm-9">
											<input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" >
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
									<div class="form-group row">
										<label for="mobile" class="col-sm-3 col-form-label">{{ __('Mobile') }}</label>
										<div class="col-sm-9">
											<input id="mobile" type="text" name="mobile" class="form-control{{ $errors->has('mobile') ? ' is-invalid' : '' }}" value="{{ old('mobile') }}" />
											@if ($errors->has('mobile'))
											<span class="invalid-feedback" role="alert">
											<strong>{{ $errors->first('mobile') }}</strong>
											</span>
											@endif
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group row">
										<label for="landline" class="col-sm-3 col-form-label">{{ __('Landline') }}</label>
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
										<label for="houseno" class="col-sm-3 col-form-label">{{ __('House No./Floor') }}</label>
										<div class="col-sm-9">
											<input id="houseno" type="text" name="houseno" class="form-control{{ $errors->has('houseno') ? ' is-invalid' : '' }}" value="{{ old('houseno') }}" />
											@if ($errors->has('houseno'))
											<span class="invalid-feedback" role="alert">
											<strong>{{ $errors->first('houseno') }}</strong>
											</span>
											@endif
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group row">
										<label for="street" class="col-sm-3 col-form-label">{{ __('Street Address') }}</label>
										<div class="col-sm-9">
											<input id="street" type="text" name="street" class="form-control{{ $errors->has('street') ? ' is-invalid' : '' }}"  value="{{ old('compname') }}" />
											@if ($errors->has('street'))
											<span class="invalid-feedback" role="alert">
											<strong>{{ $errors->first('street') }}</strong>
											</span>
											@endif
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group row">
										<label for="country" class="col-sm-3 col-form-label">{{ __('Country') }}</label>
										<div class="col-sm-9">
											<select id="country" name="country" class="form-control{{ $errors->has('country') ? ' is-invalid' : '' }}">
												<option value="">-- Select --</option>
												@if ($country->count())
													 @foreach($country as $con)
														 <option value="{{ $con->country_Id }}" {{ old('country') == $con->country_Id ? 'selected="selected"' : '' }}>{{ $con->country_name }}</option> 
													@endforeach
												@endif	
											</select>
											@if ($errors->has('country'))
											<span class="invalid-feedback" role="alert">
											<strong>{{ $errors->first('country') }}</strong>
											</span>
											@endif
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group row">
										<label for="state" class="col-sm-3 col-form-label">{{ __('State') }}</label>
										<div class="col-sm-9">
											<select id="state" name="state" class="form-control{{ $errors->has('state') ? ' is-invalid' : '' }}" value="{{ old('state') }}">
												<option value="1">Test</option>
											</select>
											@if ($errors->has('state'))
											<span class="invalid-feedback" role="alert">
											<strong>{{ $errors->first('state') }}</strong>
											</span>
											@endif
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group row">
										<label for="city" class="col-sm-3 col-form-label">{{ __('City') }}</label>
										<div class="col-sm-9">
											<select id="city" name="city" class="form-control{{ $errors->has('city') ? ' is-invalid' : '' }}" value="{{ old('city') }}">
												<option value="1">Test</option>
											</select>
											@if ($errors->has('city'))
											<span class="invalid-feedback" role="alert">
											<strong>{{ $errors->first('city') }}</strong>
											</span>
											@endif
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group row">
										<label for="pincode" class="col-sm-3 col-form-label">{{ __('Postcode') }}</label>
										<div class="col-sm-9">
											<input id="pincode" type="text" name="pincode" class="form-control{{ $errors->has('pincode') ? ' is-invalid' : '' }}" value="{{ old('pincode') }}"/>
											@if ($errors->has('pincode'))
											<span class="invalid-feedback" role="alert">
											<strong>{{ $errors->first('pincode') }}</strong>
											</span>
											@endif
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group row">
										<label for="industry" class="col-sm-3 col-form-label">{{ __('Industry Type') }}</label>
										<div class="col-sm-9">
											<select id="industry" name="industry" class="form-control{{ $errors->has('industry') ? ' is-invalid' : '' }}">
												<option value="">-- Select --</option>
												@if ($industry->count())
													 @foreach($industry as $ind)
														 <option value="{{ $ind->industryId }}" {{ old('industry') == $ind->industryId ? 'selected="selected"' : '' }}>{{ $ind->Industry_name }}</option> 
													@endforeach
												@endif
											</select>
											@if ($errors->has('industry'))
											<span class="invalid-feedback" role="alert">
											<strong>{{ $errors->first('industry') }}</strong>
											</span>
											@endif
										</div>
									</div>
								</div>
							</div>
							<p class="card-description"><b>Personal Info</b></p>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group row">
										<label for="fname" class="col-sm-3 col-form-label">{{ __('First Name') }}</label>
										<div class="col-sm-9">
											<input id="fname" type="text" class="form-control{{ $errors->has('fname') ? ' is-invalid' : '' }}" name="fname" value="{{ old('fname') }}"  autofocus>
											@if ($errors->has('fname'))
											<span class="invalid-feedback" role="alert">
											<strong>{{ $errors->first('fname') }}</strong>
											</span>
											@endif
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group row">
										<label for="lname" class="col-sm-3 col-form-label">{{ __('Last Name') }}</label>
										<div class="col-sm-9">
											<input id="lname" type="text"  name="lname" class="form-control{{ $errors->has('lname') ? ' is-invalid' : '' }}"  value="{{ old('lname') }}" />
											@if ($errors->has('lname'))
											<span class="invalid-feedback" role="alert">
											<strong>{{ $errors->first('lname') }}</strong>
											</span>
											@endif
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group row">
										<label for="designation" class="col-sm-3 col-form-label">{{ __('Designation') }}</label>
										<div class="col-sm-9">
											<input id="designation" type="text" name="designation" class="form-control{{ $errors->has('designation') ? ' is-invalid' : '' }}" value="{{ old('designation') }}" />
											@if ($errors->has('designation'))
											<span class="invalid-feedback" role="alert">
											<strong>{{ $errors->first('designation') }}</strong>
											</span>
											@endif
										</div>
									</div>
								</div>
							<!--	<div class="col-md-6">
									<div class="form-group row">
										<label for="username" class="col-sm-3 col-form-label">{{ __('Username') }}</label>
										<div class="col-sm-9">
											<input id="username" type="text" name="username" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" value="{{ old('username') }}" />
											@if ($errors->has('username'))
											<span class="invalid-feedback" role="alert">
											<strong>{{ $errors->first('username') }}</strong>
											</span>
											@endif
										</div>
									</div>
								</div>-->
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group row">
										<label for="password" class="col-sm-3 col-form-label">{{ __('Password') }}</label>
										<div class="col-sm-9">
											<input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" >
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
										<label for="password_confirmation" class="col-sm-3 col-form-label">{{ __('Confirm Password') }}</label>
										<div class="col-sm-9">
											<input id="password_confirmation" type="password" class="form-control{{ $errors->has('password_confirmation') ? ' is-invalid' : '' }}" value="{{ old('password_confirmation') }}" name="password_confirmation" >
											@if ($errors->has('password_confirmation'))
											<span class="invalid-feedback" role="alert">
											<strong>{{ $errors->first('password_confirmation') }}</strong>
											</span>
											@endif
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6"> 
									<button type="submit" class="btn btn-success mr-2">{{ __('Register') }}</button>
								</div>
							</div>
					</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
$(document).ready(function() {
	$('#country').on('change', function() {
		var countryID = $(this).val();
		if(countryID != "") {
			$.ajax({
				url: './loadState/'+encodeURI(countryID),
				type: "GET",
				dataType: "json",
				success:function(data) {
				$('#state').html('<option value="">-- Select --</option>');
				if(data.length != 0){
					$.each(data, function(key, value) {
						$('#state').append('<option value="'+ value.statesId +'">'+ value.states_name +'</option>');
						});
					}
				}				
			});
		}else{
			$('#state').html('<option value="">-- Select --</option>');
		}
   });
});
</script>
@endsection