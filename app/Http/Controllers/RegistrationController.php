<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\View;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Registration;

class RegistrationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('register.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('register.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'fname' => 'required',
            'lname' => 'required',
            'telephone' => 'required',
            'dob' => 'required',
            'emergency_fname' => 'required',
            'emergency_lname' => 'required',
            'emergency_telephone' => 'required',
        ]);

        $registration = new Registration;
        $registration->fname = $request->fname;
        $registration->lname = $request->lname;
        $registration->email = $request->email;
        $registration->telephone = $request->telephone;
        $registration->dob = $request->dob;
        $registration->street = $request->street;
        $registration->state = $request->state;
        $registration->zip = $request->zip;
        $registration->emergency_fname = $request->emergency_fname;
        $registration->emergency_lname = $request->emergency_lname;
        $registration->emergency_relationship = $request->emergency_relationship;
        $registration->emergency_telephone = $request->emergency_telephone;
        $registration->save();

        $request->session()->flash('success', 'We will see you in December!');

        return view('facts');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
