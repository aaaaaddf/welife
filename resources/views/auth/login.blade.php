@extends('layouts.app')

@section('content')

    <div class="text-center">
        <h1>Login</h1>
    </div>
    
    <div class="row">
        <div class="col-sm-6 offset-sm-3">
            
            {!! Form::open(['route'=>'login.post']) !!}
                <div class="form-group">
                    {!! Form::label('email','メール') !!}
                    {!! Form::email('email',old('email'),['class'=>'form-control']) !!}
                </div>
                
                <div class="form-group">
                    {!! Form::label('password','パスワード') !!}
                    {!! Form::password('password',['class'=>'form-control']) !!}
                </div>
                
                {!! Form::submit('Login',['class'=>'btn btn-primary btn-block']) !!}
            {!! Form::close() !!}
            
            <p class="mt-2">アカウントを作成する {!! link_to_route('signup.get','Sign up now!') !!}</p>
        </div>
    </div>
@endsection