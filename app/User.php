<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    'user_comp_id', 'user_salution', 'user_fname', 'user_lname', 'user_email', 'user_username', 'password', 'user_designation', 'user_address1', 'user_address2', 'user_mobile', 'user_landline', 'user_pincode', 'user_branch_id', 'user_department_id', 'user_role_id', 'user_can_view', 'user_can_add', 'user_can_edit', 'user_can_delete', 'user_has_access', 'activation_code', 'status', 'remember_token', 'user_created_by_id', 'user_updated_by_id', 'created_at', 'updated_at',
];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
