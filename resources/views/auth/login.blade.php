@extends('layouts.app')

@section('content')

    {!! Form::open(['route'=>'login.post']) !!}
<link rel="stylesheet" href="/css/login.css">
<div class="login-page">
  <div class="form">
    <form class="login-form">
      <input type="text" name="email" placeholder="email"/>
      <input type="password" name="password" placeholder="password"/>
      <button>login</button>
      <p class="message">Not registered? {!! link_to_route('signup.get', 'Signup', [], ['class' => 'nav-link']) !!}</p>
    </form>
  </div>
</div>
 {!! Form::close() !!}
@endsection

