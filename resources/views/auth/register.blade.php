@extends('layouts.app')

@section('content')
        <link rel="stylesheet" href="/css/signup.css">
            {!! Form::open(['route' => 'signup.post']) !!}
                <div class="main-w3layouts wrapper">
		<h1>Signup</h1>
		<div class="main-agileinfo">
			<div class="agileits-top">
				<form action="#" method="post">
					<input class="text" type="text" name="name" placeholder="名前" required="">
					<input class="text email" type="email" name="email" placeholder="Eメール" required="">
					<input class="text" type="password" name="password" placeholder="パスワード" required="">
					<input class="text w3lpass" type="password" name="password_confirmation" placeholder="確認" required="">
					<div class="wthree-text">
						<label class="anim">
							<input type="checkbox" class="checkbox" required="">
							<span>規約に同意する</span>
						</label>
						<div class="clear"> </div>
					</div>
					<input type="submit" value="SIGNUP">
				</form>
				<p>アカウントをお持ちの方はこちら {!! link_to_route('login', 'ログイン', [], ['class' => 'nav-link']) !!}</p>
			</div>
		</div>
		<!-- copyright -->
		<div class="colorlibcopy-agile">
			<p>© 2018 Colorlib Signup Form. All rights reserved | Design by <a href="https://colorlib.com/" target="_blank">Colorlib</a></p>
		</div>
		<!-- //copyright -->
		<ul class="colorlib-bubbles">
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
		</ul>
	</div>
            {!! Form::close() !!}
@endsection