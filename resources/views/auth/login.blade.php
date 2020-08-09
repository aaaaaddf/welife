@extends('layouts.app')

@section('content')

    {!! Form::open(['route'=>'login.post']) !!}
<link rel="stylesheet" href="/css/login.css">
<div class="login-page">
  <div class="form">
    <form class="login-form">
      <input type="text" name="email" placeholder="Eメール"/>
      <input type="password" name="password" placeholder="パスワード"/>
      <button>ログイン</button>
      <p class="message">新規登録はこちら {!! link_to_route('signup.get', '新規登録', [], ['class' => 'nav-link']) !!}</p>
    </form>
  </div>
</div>
 {!! Form::close() !!}
@endsection

