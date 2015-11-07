@extends('base')

@section('content')
    
    <div class="row">
         {!! Form::open(array('action' => 'RegistrationController@store', 'id'=>'registrationForm')) !!}

            <div class="col-md-6">

                <h2>Participant information</h2>
                
                <div class="form-group">
                    {!! Form::label('fname', 'First name'); !!}
                    {!! Form::text('fname', null, array('class' => 'form-control', 'placeholder'=>'First name')); !!}
                </div>

                <div class="form-group">
                    {!! Form::label('lname', 'Last name'); !!}
                    {!! Form::text('lname', null, array('class' => 'form-control', 'placeholder'=>'Last name')); !!}
                </div>

                <div class="form-group">
                    {!! Form::label('email', 'Email address'); !!}
                    {!! Form::text('email', null, array('class' => 'form-control', 'placeholder'=>'Email address')); !!}
                </div>

                <div class="form-group">
                    {!! Form::label('telephone', 'Telephone number'); !!}
                    {!! Form::text('telephone', null, array('class' => 'form-control', 'placeholder'=>'Telephone number')); !!}
                </div>

                <div class="form-group">
                    {!! Form::label('dob', 'Date of birth'); !!}
                    {!! Form::date('dob', null, array('class' => 'form-control', 'placeholder'=>'Date of birth')); !!}
                </div>

                <div class="form-group">
                    {!! Form::label('street', 'Street'); !!}
                    {!! Form::text('street', null, array('class' => 'form-control', 'placeholder'=>'Street')); !!}
                </div>

                <div class="form-group">
                    @include('partials.states')
                </div>

                <div class="form-group">
                    {!! Form::label('zip', 'Zip code'); !!}
                    {!! Form::number('zip', null, array('class' => 'form-control', 'placeholder'=>'Zip code')); !!}
                </div>

                <div class="form-group">
                    <p class="text-muted">By typing my initials below, I agree to the <a href="{{ route('register.index') }}">terms and conditions</a> of the Tinsel and Tennis Shoes 5K, and assume all responsibility of injury and risks.</p>
                    {!! Form::label('initials', 'Participant\'s initials') !!}
                    {!! Form::text('initials', null, array('class'=>'form-control', 'placeholder'=>'Initials')); !!}
                </div>

            </div>

            <div class="col-md-6">
                
                <h2>Emergency contact</h2>

                <div class="form-group">
                    {!! Form::label('emergency_fname', 'Emergency contact first name'); !!}
                    {!! Form::text('emergency_fname', null, array('class' => 'form-control', 'placeholder'=>'Emergency contact first name')); !!}
                </div>

                <div class="form-group">
                    {!! Form::label('emergency_lname', 'Emergency contact last name'); !!}
                    {!! Form::text('emergency_lname', null, array('class' => 'form-control', 'placeholder'=>'Emergency contact last name')); !!}
                </div>

                <div class="form-group">
                    {!! Form::label('emergency_relationship', 'Emergency contact relationship'); !!}
                    {!! Form::text('emergency_relationship', null, array('class' => 'form-control', 'placeholder'=>'Emergency contact relationship')); !!}
                </div>

                <div class="form-group">
                    {!! Form::label('emergency_telephone', 'Emergency contact telephone number'); !!}
                    {!! Form::text('emergency_telephone', null, array('class' => 'form-control', 'placeholder'=>'Emergency contact telephone number')); !!}
                </div>

                <h2>Billing information</h2>
                <p class="text-muted">Credit card payments are processed through the third party payment company <a href="https://stripe.com/">Stripe</a>. We do not store any credit card information on this website.</p>

                <p class="text-muted">Chidren 10 years and younger will be charged $10.00, adults will be charged $15.00 per registration which will go as a direct donation to <a href="http://changetheworldrva.org">Change the World RVA</a>.</p>

                <div class="form-group">
                    <label>Card Number</label>
                    <input type="text" size="20" data-stripe="number" class="form-control" placeholder="XXXX-XXXX-XXXX-XXXX" />
                </div>

                <div class="form-group">
                    <label>Card CVC</label>
                    <input type="text" size="4" data-stripe="cvc" class="form-control" placeholder="Security Code" />
                </div>
                
                <div class="form-group">
                    <label>Expiration Date</label>
                    <div class="row">
                        <div class="col-md-6 col-sm-6 col-xs-6">
                          <select class="form-control" data-stripe="exp-month">
                            <option value="01">Jan (01)</option>
                            <option value="02">Feb (02)</option>
                            <option value="03">Mar (03)</option>
                            <option value="04">Apr (04)</option>
                            <option value="05">May (05)</option>
                            <option value="06">June (06)</option>
                            <option value="07">July (07)</option>
                            <option value="08">Aug (08)</option>
                            <option value="09">Sep (09)</option>
                            <option value="10">Oct (10)</option>
                            <option value="11">Nov (11)</option>
                            <option value="12">Dec (12)</option>
                          </select>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-6">
                          <select class="form-control" data-stripe="exp-year">
                            <option value="15">2015</option>
                            <option value="16">2016</option>
                            <option value="17">2017</option>
                            <option value="18">2018</option>
                            <option value="19">2019</option>
                            <option value="20">2020</option>
                            <option value="21">2021</option>
                            <option value="22">2022</option>
                            <option value="23">2023</option>
                          </select>
                        </div>
                    </div>
                </div>
            </div>


            </div>
        </div>
        
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                
                {!! Form::submit('Submit registration', array('class'=>'btn btn-success btn-lg btn-block')); !!}
                {!! Form::close() !!}

            </div>
            
    </div>
@endsection

@section('scripttags')
    <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
    <script type="text/javascript">
        Stripe.setPublishableKey('pk_test_oW8uByGtFX6Q78lH1OYqmebS');
    </script>
    <script>
        jQuery(function($) {$('#registrationForm').submit(function(event) {var $form = $(this);
        // Disable the submit button to prevent repeated clicks
        $form.find('button').prop('disabled', true);
        Stripe.card.createToken($form, stripeResponseHandler);
        // Prevent the form from submitting with the default action
        return false;});});

        function stripeResponseHandler(status, response) {
            var $form = $('#registrationForm');
            if (response.error) {
                // Show the errors on the form
                var $navigation = $('nav');
                $navigation.after('<div class="alert alert-danger payment-errors"><div class="container">' + response.error.message + '</div></div>');
                $form.find('button').prop('disabled', false);
            } else {
                // response contains id and card, which contains additional card details
                var token = response.id;
                // Insert the token into the form so it gets submitted to the server
                $form.append($('<input type="hidden" name="stripeToken" />').val(token));
                // and submit
                $form.get(0).submit();
            }
        };
    </script>

@endsection