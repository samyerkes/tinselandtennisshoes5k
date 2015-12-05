@extends('base')

@section('content')

<div class="row">
     {!! Form::open(array('action' => 'SettingsController@store')) !!}

        <div class="col-md-12">

            <h2>Settings</h2>
            <div class="form-group">
              {!! Form::label('name', 'Name'); !!}
              <input type="text" class="form-control" name="name" value="{{ Setting::get('name') }}" placeholder="{{ Setting::get('name') }}">
            </div>
            <div class="form-group">
              Registrations:
              <label>
                {!! Form::radio('registrations', 'true', true) !!} On
              </label>
                <label>
                  {!! Form::radio('registrations', 'false', false) !!} Off
                </label>
            </div>

        </div>
    </div>

    <div class="row">
        <div class="col-md-6 col-md-offset-3">

            {!! Form::submit('Save settings', array('class'=>'btn btn-success btn-lg btn-block')); !!}
            {!! Form::close() !!}

        </div>

</div>

@endsection
