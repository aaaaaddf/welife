@extends('layouts.app')

@section('content')
    <div class="row">
        <aside class="col-sm-4">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{ $user->name }}</h3>
                </div>
                <div class="card-body">
                    {{-- ユーザのメールアドレスをもとにGravatarを取得して表示 --}}
                    <img class="rounded img-fluid" src="{{ Gravatar::get($user->email, ['size' => 500]) }}" alt="">
                </div>
            </div>
        </aside>
        <div class="col-sm-8">
          <ul class="nav nav-tabs nav-justified mb-3">
                
                <li class="nav-item">
                    <a href="{{ route('users.show', ['user' => $user->id]) }}" class="nav-link {{ Request::routeIs('users.show') ? 'active' : '' }}">
                        投稿一覧
                    </a>
                </li>
               
                @if(Auth::id()==$user->id)
               <a href="{{ route('campposts.form',['id'=>$user->id]) }}" class="nav-link {{ Request::routeIs('campposts.form') ? 'active' : '' }}">
                   投稿する
                   </a>
                @endif
            </ul>
           
               @include('campposts.campposts2')
        </div>
            
        </div>
    </div>
@endsection