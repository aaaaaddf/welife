@if(count($searched_campposts) > 0)
    <ul class="list-unstyled">
        @foreach($searched_campposts as $camppost)
            <div class="border">
             <li class="media mb-3">
                {{-- 投稿の所有者のメールアドレスをもとにGravatarを取得して表示 --}}
                <img class="mr-2 rounded" src="{{ Gravatar::get($camppost->user->email, ['size' => 50]) }}" alt="">
                <div class="media-body">
                    <div>
                       {!! link_to_route('users.show',$camppost->user->name,['user'=>$camppost->user->id]) !!}
                    </div>
                    <div>
                        <p>写真</p>
                       
                       <img src={{ $camppost->image }} alt="" width=250px height=250px></a>
                    </div>
                    <div>
                        <p>場所:</p>
                        <span>{{ $camppost->prefecture->name }}</span>
                    </div>
                    
                    <div>
                        <p>期間:</p>
                        <span>{{ $camppost->start_date }}~</span><span>{{ $camppost->end_date }}</span>
                    </div>
                    <div>
                        <p>こだわり</p>
                        <p>{{ $camppost->special }}</p>
                    </div>
                    <div>
                      <p>アイテム:</p>
                    @foreach($camppost->items as $item)
                      <span>{{ $item->name }}</span>
                     @endforeach
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
            @endif
            </li>
        </div>
         </div>
        @endforeach
       
    </ul>
    
    {{ $searched_campposts->links() }}
@endif



