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
}
