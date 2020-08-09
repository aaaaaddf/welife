@extends('layouts.app')

@section('content')
  
    @if (Auth::check())
      
            @include('campposts.campposts')
        
    @else
         <link rel="stylesheet" href="/css/style.css">
       <header>
           
       </header>
            <div class="top-wrapper">
                <div class="container">
                  <h1>BE HAPPY THROUGH THE LIFE</h1>
                  <h1>人生は一度きり。</h1>
                   <p>WelifeはあなたのQOlをキャンプ用品のシェアを通じて向上させます</p>
                   <p class="last-p">さぁはじめよう。新たな冒険を。</p>
                </div>
                 {!! link_to_route('signup.get', '新規登録', [], ['class' => 'btn btn-outline-success']) !!}
                <span class="a">or</span>
               
                 {!! link_to_route('login', 'ログインする', [], ['class' => 'btn btn-outline-success']) !!}
            </div>
            
    @endif
@endsection

