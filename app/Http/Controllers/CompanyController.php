<?php

namespace App\Http\Controllers;

use App\Company;
use Illuminate\Http\Request;
use App\Http\Requests\CreateCompany;
use Illuminate\Support\Facades\Storage;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = Company::paginate(config('constants.default_pagination_count'));
        return View('company.index', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return View('company.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateCompany $request)
    {
        $someInput = $request->except('logo');

        if($request->logo){
            $someInput['logo'] = Storage::disk('local')->put('public', $request->logo); //hanadles file
        }

        Company::create($someInput); //saves to database
        
        return redirect('companies')->with('success', 'You have just created a company');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $company = Company::findOrFail($id);
        return view('Company.edit',compact('company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         $company = Company::find($id);
         $image = $request->logo;
        if($image){ //checks if image is sent in request 

           Storage::delete($company->logo); //deletes old logo
           $company->logo = Storage::disk('local')->put('public', $image); //stores new logo
        } 
        $company->name = $request->name;
        $company->email = $request->email;
        $company->website = $request->website;
        $company->update();

        return redirect('companies')->with('success', 'You have succefully updated a company');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $company = Company::findOrFail($id);
       Storage::delete($company->logo);
       $company->delete();

       return redirect('companies')->with('success', 'You have just deleted a company');
    }
}
