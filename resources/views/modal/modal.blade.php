<link rel="stylesheet" href="/css/campposts.scss">
<div class="top">
@if (count($errors) > 0)
    <p>もう一度投稿してください</p>
@endif
<?php
     $user = \App\User::findOrFail(Auth::user()->id);
?>

<div class="top-profile">
 <img class="mr-2 rounded" src="{{ Gravatar::get($user->email, ['size' => 50]) }}" alt="">
 {!! link_to_route('users.show',$user->name,['user'=>$user->id]) !!}
<button class="btn btn-primary" data-toggle="modal" data-target="#modal-example">
      投稿する
  </button>
</div>
  <!-- 2.モーダルの配置 -->
  <div class="modal" id="modal-example" tabindex="-1">
    <div class="modal-dialog">
 
      <!-- 3.モーダルのコンテンツ -->
      <div class="modal-content">
             @if (count($errors) > 0)
                <ul class="alert alert-danger" role="alert">
                    @foreach ($errors->all() as $error)
                        <li class="ml-4">{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
        <!-- 4.モーダルのヘッダ -->
        <div class="modal-header">
          
          <h4 class="modal-title" id="modal-label">投稿する</h4>
        </div>
        <!-- 5.モーダルのボディ -->
        <div class="modal-body">
          {!! Form::open(['action'=>'CamppostsController@store','files'=>true,'method'=>"POST"]) !!}
    
                 <div class="form-group @if(!empty($errors->first('file'))) has-error @endif">
                        {!! Form::label('file', '画像投稿', ['class' => 'control-label']) !!}
                        {!! Form::file('file',['multiple'=>'multiple']) !!}
                         {{ csrf_field() }}
                        <p class="help-block">{{$errors->first('file')}}</span>
                  </div>
                  
                  
                 <div class="form-group @if(!empty($errors->first('prefecture_id'))) has-error @endif">
                     <label style="font-weight:bold;">場所:</label>
                      <select name="prefecture_id" class="form-control">
                          <?php 
                           foreach ($prefectures as $key => $prefecture){
                                echo '<option value ="'.$key.'">'.$prefecture.'</option>';
                            }
                            
                          ?>
                      </select>
                      <span class="help-block">{{ $errors->first('prefecture_id') }}</span>
                </div>
    
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
                
                <div class="form-group @if(!empty($errors->first('items_id'))) has-error @endif">
                    <label style="font-weight:bold;">貸し出す商品(複数選択可能)</label>
                   
                    {{ Form::select("items_id[]",$items,null,[ 'class' => 'form-control' , 'multiple' => 'multiple']) }}
                        
                    
                         <?php 
                        //   foreach ($items as $key => $item){
                        //         echo '<input type="checkbox" name="items_id" value="'.$key.'">'.$item.'</option>';
                        //     }
                            
                          ?>
                     <span class="help-block">{{ $errors->first('items_id') }}</span>
                </div>
    
  
                  <div class="form-group @if(!empty($errors->first('special'))) has-error @endif">
                     <label>こだわり:</label>
                      {!! Form::textarea('special',old('special'),['class'=>'form-control']) !!}
                      <span class="help-block">{{ $errors->first('special') }}</span>
                  </div>
                     
                  {!! Form::submit('投稿する', ['class' => 'btn btn-primary btn-block']) !!}
                    {!! Form::close() !!}
        </div>
 
        <!-- 6.モーダルのフッタ -->
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">閉じる</button>
        </div>
      </div>
    </div>
  </div>
 </div>