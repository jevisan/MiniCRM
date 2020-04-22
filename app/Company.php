<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    /** Table for this model */
    protected $table = 'companies';

    /** Mass assignable attributes */
    protected $fillable = ['name', 'email', 'logo', 'website'];

    /**
     * The employees of this company
     */
    public function employees()
    {
        return $this->hasMany('App\Employee');
    }
}
