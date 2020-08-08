<link rel="stylesheet" href="/css/campposts.scss">
@if(count($campposts) > 0)
    
            <ul class="list-unstyled">
                <div class="container">
                <div  class="row">
            @foreach($campposts as $camppost)
              
                     <div class="col-md-6">
        
            <div class="profile">
                <img class="mr-2 rounded" src="{{ Gravatar::get($camppost->user->email, ['size' => 50]) }}" alt="">
                {!! link_to_route('users.show',$camppost->user->name,['user'=>$camppost->user->id]) !!}
                </div>          
             <li class="media mb-3">
                
                <div class="media-body">
                    <div class="card" style="width:20rem;">
                        <div class="img">
                <img class="card-img-top" src={{$camppost->image}} alt="">
                        </div>
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
                    @foreach($camppost->item as $item)
                                          <span>{{ $item->name }}</span>
                                         @endforeach
                </li>
                </ul>
            
                @if($user->id!=$camppost->user_id)
                    <p>どのくらい借りる？</p>
                    {!! Form::open(['route'=>['camppost_borrows.store','id' => $camppost->id],'method'=>'POST']) !!}
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
              @if(session()->has('errorMessage'))
                <div class="alert alert-warning alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <strong>既にリクエスト済みです</strong>
                </div>
            @endif
            @if($camppost->user_id==Auth::user()->id)
                {!! Form::model($camppost,['route'=>['campposts.destroy',$camppost->id],'method'=>'delete']) !!}
                    {!! Form::submit('削除', ['class' => 'btn btn-danger']) !!}
                {!! Form::close() !!}
                {!! link_to_route('campposts.edit', '投稿を編集する', ['camppost' => $camppost->id], ['class' => 'btn btn-light']) !!}
            @endif
                </div>
            </div>
            </li>
                </div>
                
            
          
        @endforeach
        
        </ul>
        </div>
        </div>
    
    {{ $campposts->links() }}
@endif



