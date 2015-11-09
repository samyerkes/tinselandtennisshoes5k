<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\View;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Registration;
use Mail;
use App;

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
            'initials' => 'required',
            'emergency_fname' => 'required',
            'emergency_lname' => 'required',
            'emergency_telephone' => 'required',
        ]);

        $birthday = $request->dob;
        $birthyear = substr($birthday, 0, 4);
        $birthmonth = substr($birthday, 5, 2);
        $birthdate = substr($birthday, 8, 2);
        $years = \Carbon\Carbon::createFromDate($birthyear, $birthmonth, $birthdate)->age;

        if ($years < 13) {
            $amount = 1000; 
            $fee = 10.00;   
        } else {
            $amount = 1500;
            $fee = 15.00;   
        }

        $registration = new Registration;
        $registration->fname = $request->fname;
        $registration->lname = $request->lname;
        $registration->email = $request->email;
        $registration->telephone = $request->telephone;
        $registration->dob = $request->dob;
        $registration->street = $request->street;
        $registration->state = $request->state;
        $registration->zip = $request->zip;
        $registration->initials = $request->initials;
        $registration->registration_fee = $fee;
        $registration->emergency_fname = $request->emergency_fname;
        $registration->emergency_lname = $request->emergency_lname;
        $registration->emergency_relationship = $request->emergency_relationship;
        $registration->emergency_telephone = $request->emergency_telephone;
        $registration->save();
        
        if (App::environment('local')) {
            \Stripe\Stripe::setApiKey(env('STRIPE_TEST_KEY'));
        } else {
            \Stripe\Stripe::setApiKey(env('STRIPE_LIVE_KEY'));
        }

        // Get the credit card details submitted by the form
        $token = $_POST['stripeToken'];

        // Create the charge on Stripe's servers - this will charge the user's card
        try {
            $charge = \Stripe\Charge::create(array(
                "amount" => $amount, // amount in cents, again
                "currency" => "usd",
                "source" => $token,
                "description" => "Tinsel and Tennis Shoes 5K"
            ));
        } catch(\Stripe\Error\Card $e) {
            return "We're sorry your credit card has been declined.";
        }

        Mail::send('email.create', ['registration' => $registration], function ($m) use ($registration) {
            $m->from('tinselandtennisshoes@gmail.com', 'Tinsel and Tennis Shoes 5K');
            $m->to($registration->email, $registration->fname)->subject('You have successfully registered!');
        });

        $request->session()->flash('success', 'A confirmation email has been sent to you. We will see you in December!');

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
