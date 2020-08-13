<?php
   $action = Route::currentRouteAction();
?>
@if('App\Http\Controllers\CamppostsController@index'==$action)
    @include('modal.modal')
@endif
@if(count($campposts) > 0)
    
           
                <div class="container">
                <div  class="row justify-content-md-center">
            @foreach($campposts as $camppost)
             
            <div class="col-sm-7" style="max-width:600px;padding-bottom:10px;">
        
            <div class="profile">
                <img class="mr-2 rounded" src="{{ Gravatar::get($camppost->user->email, ['size' => 50]) }}" alt="">
                {!! link_to_route('users.show',$camppost->user->name,['user'=>$camppost->user->id]) !!}
                </div>          
                
                <div class="media-body ">
                    <div class="card" style="">
                        <div class="img">
                <img class="card-img-top " src={{$camppost->image}} alt="">
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
             <?php
                $borrow_user=null;
                $query = \App\CamppostBorrow::query();
                 $query->where('user_id',Auth::user()->id);
                 $query->where('camppost_id',$camppost->id);
                 $borrow_user=$query->first();
               
            ?>
              @if(isset($borrow_user))
                <div class="alert alert-warning alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <strong>既にリクエスト済みです</strong>
                </div>
            @elseif($user->id!=$camppost->user_id)
                    <p>どのくらい借りる？</p>
                    {!! Form::open(['route'=>['camppost_borrows.store','id' => $camppost->id],'method'=>'POST']) !!}
                     <div class="form-group @if(!empty($errors->first('start_date'))) has-error @endif">
                        <label style="font-weight:bold;">開始日:</label>
                        <input name="start_date" type="date" / class="form-control">
                        <span class="help-block">{{ $errors->first('start_date') }}</span>
                    </div>
                    
                  <div class="form-group @if(!empty($errors->first('end_date'))) has-error @endif">
                        <label style="font-weight:bold;">最終日:</label>
                        <input name="end_date" type="date" / class="form-control">
                        <span class="help-block">{{ $errors->first('end_date') }}</span>
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
            </div>
           
                </div>
                
            
          
        @endforeach
        
        </div>
        </div>
    
    {{ $campposts->links() }}
@endif



