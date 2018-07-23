<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class companyRegistrationModel extends Model
{
   // insert value of company
   public function saveCompanyData($data){
	   // data insert into company table
		$comid = DB::table('company')->insertGetId(
			[
				'comp_name' => $data['compname'],
				'comp_email' => $data['email'],
				'comp_mobile' => $data['mobile'],
				'comp_landline' => $data['landline'],
				'house_no' => $data['houseno'],
				'address' => $data['street'],
				'comp_country_id' => $data['country'],
				'comp_state_id' => $data['state'],
				'comp_city_id' => $data['city'],
				'comp_pincode' => $data['pincode'],
				'industry_type' => $data['industry'],
				'comp_status' => 1,
				'created_by_id' => 0,
				'updated_by_id' => 0
			]
		);		
		return $comid;
   }
   
    // load country value in drop down
   public function loadCountryValue(){
	   // fetch value in drop down
	   $country = DB::table('countries')->select('country_id', 'country_name')
										->orderBy('country_name', 'asc')
										->get();
	   return $country;
   }
   
    // load industry value in drop down
   public function loadIndustryValue(){
	   // fetch value in drop down
	   $country = DB::table('industries')->select('industryId', 'Industry_name')
										->orderBy('Industry_name', 'asc')
										->get();
	   return $country;
   }
   
   // load state value on change
   public function loadCountryStateValue($conId){
	   // fetch value in drop down
     
	   $state = DB::table('states')->select('statesId', 'states_name', 'countryid')
										->where('countryid', '=', $conId)
										->orderBy('states_name', 'asc')
										->get();                   
	   return json_encode($state);
   }
   
    // load city value on change
   public function loadStateCityValue($stId){
	   // fetch value in drop down
	   $city = DB::table('cities')->select('city_id','city_name', 'state_id')
										->where('state_id', '=', $stId)
										->orderBy('city_name', 'asc')
										->get();
	   return json_encode($city);
   }
}
