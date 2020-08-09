<header class="mb-4">
    <nav class="navbar navbar-expand-sm navbar-light bg-lihgt" style="background:#CCFF33;">
        
        <a class="navbar-brand" href="/" style="font:bold;">We life</a>
        
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="nav-bar">
            <ul class="navbar-nav mr-auto"></ul>
                <ul class="navbar-nav">
                    @if(Auth::check())
                    
                    <li class="nav-item dropdown" style="font:bold;">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">{{ Auth::user()->name }}</a>
                        <ul class="dropdown-menu dropdown-menu-right">
                            {{-- ユーザ詳細ページへのリンク --}}
                            <li class="dropdown-item">{!! link_to_route('users.show','マイページ',['user'=>Auth::id()]) !!}</li>
                            <li class="dropdown-item">{!! link_to_route('campposts.index','投稿一覧',['user'=>Auth::id()]) !!}</li>
                            <li class="dropdown-item">{!! link_to_route('search','投稿検索') !!}</li>
                            <li class="dropdown-item">{!! link_to_route('notification','投稿リクエスト一覧',['owner_id'=>Auth::id()]) !!}</li>
                            <li class="dropdown-divider"></li>
                            {{-- ログアウトへのリンク --}}
                            <li class="dropdown-item">{!! link_to_route('logout.get', 'ログアウト') !!}</li>
                        </ul>
                    </li>
                    @else
                        <li class="nav-item">{!! link_to_route('signup.get','サインアップ',[],['class'=>'nav-link']) !!}</li>
                        <li class="nav-item">{!! link_to_route('login', 'ログイン', [], ['class' => 'nav-link']) !!}</li>
                    @endif
                </ul>
        </div>
    </nav>
</header>