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
						<form method="POST" action="{{ route('register') }}" aria-label="{{ __('Location') }}">
							@csrf
							<p class="card-description"><b>Branch Info</b></p>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group row">
										<label for="country" class="col-sm-3 col-form-label">{{ __('Country') }}</label>
										<div class="col-sm-9">
											<select id="country" name="country" class="form-control{{ $errors->has('country') ? ' is-invalid' : '' }}">
												<option value="">-- Select --</option>
												@if ($country->count())
													 @foreach($country as $con)
														 <option value="{{ $con->country_id }}" {{ old('country') == $con->country_id ? 'selected="selected"' : '' }}>{{ $con->country_name }}</option> 
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
											<select id="state" name="state" class="form-control{{ $errors->has('state') ? ' is-invalid' : '' }}">
												<option value="">-- Select --</option>
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
											<select id="city" name="city" class="form-control{{ $errors->has('city') ? ' is-invalid' : '' }}">
												<option value="">-- Select --</option>
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
										<label for="branch" class="col-sm-3 col-form-label">{{ __('Location') }}</label>
										<div class="col-sm-9">
											<input id="branchnm" type="text" name="branchnm" class="form-control{{ $errors->has('branchnm') ? ' is-invalid' : '' }}" value="{{ old('branchnm') }}"/>
											@if ($errors->has('branchnm'))
											<span class="invalid-feedback" role="alert">
											<strong>{{ $errors->first('branchnm') }}</strong>
											</span>
											@endif
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6"> 
									<button type="submit" class="btn btn-success mr-2">{{ __('Add') }}</button>
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
	
	// on country change
	$('#country').on('change', function() {
		var countryID = $(this).val();
		$('#state').html('<option value="">-- Select --</option>');
		$('#city').html('<option value="">-- Select --</option>');
		if(countryID != "") {
			callLoadState(countryID);
		}else{
			$('#state').html('<option value="">-- Select --</option>');
		}
	});
	
	// on country change
	$('#state').on('change', function() {
		var stateID = $(this).val();
		if(stateID != "") {
			callLoadCity(stateID);
		}else{
			$('#city').html('<option value="">-- Select --</option>');
		}
	});
	
});

// call ajax for load state
function callLoadState(countryID){
  //alert("hello");
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
				$('#state').focus();
			}
		}				
	});
}

// call ajax for load city
function callLoadCity(stateID){
	$.ajax({
		url: './loadCity/'+encodeURI(stateID),
		type: "GET",
		dataType: "json",
		success:function(data) {
		$('#city').html('<option value="">-- Select --</option>');
			if(data.length != 0){
				$.each(data, function(key, value) {
					$('#city').append('<option value="'+ value.city_id +'">'+ value.city_name +'</option>');
				});
				$('#city').focus();
			}
		}				
	});
}
</script>
@endsection