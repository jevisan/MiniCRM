<?php

use Illuminate\Support\Facades\Route;

/*
 *--------------------------------------------------------------------------
 * Web Routes
 *--------------------------------------------------------------------------
 */

// All auth routes except register
Auth::routes(['register' => false]);


Route::group(['middleware' => ['auth']], function() {

    /**
     * DASHBOARD/HOME
     */
    Route::get('/', function () {
        return view('dashboard');
    });

    /*---------------------------------------------------------------------
     * COMPANIES resource routes
     *---------------------------------------------------------------------
     *  GET /companies (index)
     *  GET /companies/1 (show)
     *  GET /companies/create (create)
     *  POST /companies (store)
     *  GET /companies/1/edit (edit)
     *  PATCH /companies/1 (update)
     *  DELETE /companies/1 (destroy)
     */
    Route::resource('companies', 'CompaniesController');

    /*---------------------------------------------------------------------
     * EMPLOYEES resource routes
     *---------------------------------------------------------------------
     *  GET /employees (index)
     *  GET /employees/1 (show)
     *  GET /employees/create (create)
     *  POST /employees (store)
     *  GET /employees/1/edit (edit)
     *  PATCH /employees/1 (update)
     *  DELETE /employees/1 (destroy)
     */
    Route::resource('employees', 'EmployeesController');
});
