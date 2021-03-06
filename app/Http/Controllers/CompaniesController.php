<?php

namespace App\Http\Controllers;

use App\User;
use App\Company;
use App\Mail\NewCompany;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;

class CompaniesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Companies';
        $companies = Company::all();
        $data = [
            'title' => $title,
            'companies' => $companies
        ];

        return view('companies.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'New company';
        $data = [
            'title' => $title
        ];
        return view('companies.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $attributes = $request->validate([
            'name'      => ['required', 'string'],
            'email'     => ['nullable', 'email', 'unique:App\Company,email'],
            'website'   => ['nullable', 'url'],
            'logo'      => ['nullable',
                            'image',
                            'max:2048',                                 // max file size of 2048 KB
                            'mimetypes:image/jpeg,image/png',
                            'dimensions:min_width=100,min_height=100'], // min width and height: 100x100
        ]);

        // storing logo file logic
        if ($request->has('logo')) {
            $path = $request->file('logo')->store('companies_logos', 'public');
            $attributes['logo'] = $path;
        } else {
            $attributes['logo'] = null;
        }

        $company = Company::create($attributes);

        // send an email notifying new company created
        $admin = User::where('name', 'Admin')->get();
        Mail::to($admin)->send(new NewCompany($company));

        return redirect('/companies');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        $title = $company->name.' detail';

        $data = [
            'title' => $title,
            'company' => $company
        ];

        return view('companies.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        $title = 'Edit '.$company->name;
        $data = [
            'title'     => $title,
            'company'   => $company
        ];
        return view('companies.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Company $company)
    {
        $attributes = $request->validate([
            'name'      => ['required', 'string'],
            'email'     => ['nullable', 'email', 'unique:App\Company,email'],
            'website'   => ['nullable', 'url'],
            'logo'      => ['nullable',
                            'image',
                            'max:2048',                                 // max file size of 2048 KB
                            'mimetypes:image/jpeg,image/png',
                            'dimensions:min_width=100,min_height=100'], // min width and height: 100x100
        ]);

        // storing new logo file logic
        if ($request->has('logo')) {
            // delete prev logo
            $prev_logo = $company->logo;
            Storage::disk('public')->delete('storage/'.$prev_logo);
            // store new logo
            $path = $request->file('logo')->store('companies_logos', 'public');
            $attributes['logo'] = $path;
        }

        $company->update($attributes);

        return redirect('companies/'.$company->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        $company->delete();
        // delete logo logic
        $logo = $company->logo;
        Storage::disk('public')->delete('storage/'.$logo);
        return redirect('companies');
    }
}
