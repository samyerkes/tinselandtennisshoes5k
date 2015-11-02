@extends('base')

@section('content')
    
    <div class="row">
         {!! Form::open(array('action' => 'RegistrationController@store')) !!}
            
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

            </div>
        </div>
        
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                
                {!! Form::submit('Submit', array('class'=>'btn btn-success btn-lg btn-block')); !!}
                {!! Form::close() !!}

            </div>
            
    </div>
@endsection