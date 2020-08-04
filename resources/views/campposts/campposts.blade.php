<link rel="stylesheet" href="/css/campposts.css">
@if(count($campposts) > 0)
    <ul class="list-unstyled">
        @foreach($campposts as $camppost)
           <div class="flex">
             <li class="media mb-3">
                {{-- 投稿の所有者のメールアドレスをもとにGravatarを取得して表示 --}}
                <img class="mr-2 rounded" src="{{ Gravatar::get($camppost->user->email, ['size' => 50]) }}" alt="">
                <div class="media-body">
                    <div>
                       {!! link_to_route('users.show',$camppost->user->name,['user'=>$camppost->user->id]) !!}
                    </div>
                    <div class="card" style="width:20rem;">
                <img class="card-img-top" src={{$camppost->image}} alt="">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <span>場所:</span>
                        <span>{{ $camppost->prefecture->name }}</span>
                	</li>
                <li class="list-group-item">
                        <span>期間:</span>
                         <span>{{ $camppost->start_date }}~</span><span>{{ $camppost->end_date }}</span>
                </li>
                <li class="list-group-item">
                    <p>こだわり:</p>
                    <text>{{ $camppost->special }}</text>
                </li>
                <li class="list-group-item">
                    <span>アイテム:</span>
                    @foreach($camppost->items as $item)
                                          <span>{{ $item->name }}</span>
                                         @endforeach
                </li>
                </ul>
                </div>
                 
            @if($user->id!=$camppost->user_id)
                  <p>どのくらい借りる？</p>
                  {!! Form::open(['route'=>'camppost_borrows.store']) !!}
                    <div class="form-group">
                        {!! Form::label('start_date','開始日',['class'=>'form-control']) !!}
                         {!! Form::date('start_date', now()->format('Y-m-d'), ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                         {!! Form::label('end_date',"最終日",['class'=>'form-control']) !!}
                         {!! Form::date('end_date', now()->format('Y-m-d'), ['class' => 'form-control']) !!}
                    </div>
                    {!! Form::submit('借りる', ['class' => 'btn btn-secondary']) !!}
                {!! Form::close() !!}
            @endif    
            
            @if($camppost->user_id==Auth::user()->id)
                {!! Form::model($camppost,['route'=>['campposts.destroy',$camppost->id],'method'=>'delete']) !!}
                    {!! Form::submit('削除', ['class' => 'btn btn-danger']) !!}
                {!! Form::close() !!}
                {!! link_to_route('campposts.edit', '投稿を編集する', ['camppost' => $camppost->id], ['class' => 'btn btn-light']) !!}
            @endif
                </div>
                
            </li>
           </div>
        @endforeach
        
    </ul>
    
    {{ $campposts->links() }}
@endif



