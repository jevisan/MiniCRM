<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    /** Table for this model */
    protected $table = 'employees';

    /** Mass assignable attributes */
    protected $fillable = ['first_name', 'last_name', 'email', 'phone', 'company_id'];

    /**
     * The company this employee belongs to
     */
    public function company()
    {
        return $this->belongsTo('App\Company');
    }
}
