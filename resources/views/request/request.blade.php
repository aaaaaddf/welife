@extends('layouts.app')

@section('content')
@if(count($camppost_borrow_useres)>0)
    <h1>借りるリクエスト一覧</h1>
    @foreach( $camppost_borrow_useres as $camppost_borrow_user)
      
     
               <div class="border">
                <img class="mr-2 rounded" src="{{ Gravatar::get($camppost_borrow_user->camppost->user->email, ['size' => 50]) }}" alt="">
                {!! link_to_route('users.show',$camppost_borrow_user->camppost->user->name,['user'=>$camppost_borrow_user->camppost->user->id]) !!}
                
             <li class="media mb-3">
                
                <div class="media-body">
                    <div class="card" style="width:20rem;">
                        <div class="img">
                <img class="card-img-top" src={{$camppost_borrow_user->camppost->image}} alt="">
                        </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <span>場所:</span>
                        <span>{{ $camppost_borrow_user->camppost->prefecture->name }}</span>
                	</li>
                <li class="list-group-item">
                        <span>期間:</span>
                         <span>{{ $camppost_borrow_user->camppost->start_date }}~</span><span>{{ $camppost_borrow_user->camppost->end_date }}</span>
                </li>
                <li class="list-group-item">
                    <p>こだわり:</p>
                    <text>{{ $camppost_borrow_user->camppost->special }}</text>
                </li>
                <li class="list-group-item">
                    <span>アイテム:</span>
                    @foreach($camppost_borrow_user->camppost->item as $item)
                                          <span>{{ $item->name }}</span>
                                         @endforeach
                </li>
                </ul>
                
            @if(Auth::user()->id!=$camppost_borrow_user->camppost->user_id)
                  <p>どのくらい借りる？</p>
                  {!! Form::open(['route'=>['camppost_borrows.store','id' => $camppost_borrow_user->camppost->id],'method'=>'POST']) !!}
                    <div class="form-group">
                        {!! Form::label('start_date','開始日') !!}
                         {!! Form::date('start_date', now()->format('Y-m-d'), ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                         {!! Form::label('end_date',"最終日") !!}
                         {!! Form::date('end_date', now()->format('Y-m-d'), ['class' => 'form-control']) !!}
                    </div>
                    {!! Form::submit('借りる', ['class' => 'btn btn-secondary']) !!}
                {!! Form::close() !!}
            @endif    
            
            @if($camppost_borrow_user->camppost->user_id==Auth::user()->id)
                {!! Form::model($camppost_borrow_user->camppost,['route'=>['campposts.destroy',$camppost_borrow_user->camppost->id],'method'=>'delete']) !!}
                    {!! Form::submit('削除', ['class' => 'btn btn-danger']) !!}
                {!! Form::close() !!}
                {!! link_to_route('campposts.edit', '投稿を編集する', ['camppost' => $camppost_borrow_user->camppost->id], ['class' => 'btn btn-light']) !!}
            @endif
        </div>
      </div>
    </div>
    <p>この投稿に対して {!! link_to_route('users.show',$camppost_borrow_user->user->name,['user'=>$camppost_borrow_user->user->id]) !!}さんがリクエストをしています</p>
    <p>リクエスト時間:{{$camppost_borrow_user->created_at}}</p>
    @endforeach
    @else
        <h1>現在あなたの投稿に対してリクエストはありません</h1>
    @endif
@endsection