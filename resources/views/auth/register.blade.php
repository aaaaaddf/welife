@extends('layouts.app')

@section('content')

    <div class="text-center">
        <h1>Sign up</h1>
    </div>
    
    <div class="row">
        <div class="col-sm-6 offset-sm-3">
            <div class="form-group">
            {!! Form::open(['route'=>'signup.post']) !!}
                {!! Form::label('name','Name') !!}
                {!! Form::text('name',old('name'),['class'=>'form-control']) !!}
            </div>
            
            
        </div>
    </div>