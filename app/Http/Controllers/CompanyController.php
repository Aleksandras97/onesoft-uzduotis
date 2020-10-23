<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = Company::all();

        return view('Companies.index', [
            'companies' => $companies
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Companies.create');
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
            'name' => 'required',
            'email' => 'required',
            'logo' => 'dimensions:min_width=100,min_height=100',
            'website' => 'required'

        ]);
        if ($request->logo)
        {
            //Gets image name with extension
            $filenameWithExtension = $request->file('logo')->getClientOriginalName();
            $filename = pathinfo($filenameWithExtension, PATHINFO_FILENAME);
            $extension = $request->file('logo')->getClientOriginalExtension();
            $filenameToStore = $filename . '_' . time() . '.' . $extension;
            //Saves image to storage folder
            $request->file('logo')->storeAs('public/logos', $filenameToStore);


            Company::create([
                'name' => $attributes['name'],
                'email' => $attributes['email'],
                'logo' => $filenameToStore,
                'website' => $attributes['website']

            ]);
        } else {
            Company::create([
                'name' => $attributes['name'],
                'email' => $attributes['email'],
                'website' => $attributes['website']

            ]);
        }




        return redirect('/companies');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        return view('Companies',[
            'company' => $company
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {

        return view('Companies.edit',[
            'company' => $company
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Company $company)
    {
        $attributes = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'logo' => 'dimensions:min_width=100,min_height=100',
            'website' => 'required'
        ]);

        if ($request->logo){
            //Gets image name with extension
            $filenameWithExtension = $request->file('logo')->getClientOriginalName();
            $filename = pathinfo($filenameWithExtension, PATHINFO_FILENAME);
            $extension = $request->file('logo')->getClientOriginalExtension();
            $filenameToStore = $filename . '_' . time() . '.' . $extension;
            //Saves image to storage folder
            $request->file('logo')->storeAs('public/logos', $filenameToStore);

            $company->update([
                'name' => $attributes['name'],
                'email' => $attributes['email'],
                'logo' => $filenameToStore,
                'website' => $attributes['website']

            ]);
        } else {
            $company->update([
                'name' => $attributes['name'],
                'email' => $attributes['email'],
                'website' => $attributes['website']

            ]);
        }
        return redirect('/companies');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        $company->delete();

        return back();
    }


}
