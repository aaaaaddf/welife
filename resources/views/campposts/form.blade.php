@extends('layouts.app')

@section('content')

 <h1 style="margin-bottom:30px;">投稿する</h1>
    {!! Form::open(['action'=>'CamppostsController@store','files'=>true,'method'=>"POST"]) !!}
    
     <div class="form-group @if(!empty($errors->first('file'))) has-error @endif">
            {!! Form::label('file', '画像投稿', ['class' => 'control-label']) !!}
            {!! Form::file('file',['multiple'=>'multiple']) !!}
             {{ csrf_field() }}
            <span class="help-block">{{$errors->first('file')}}</span>
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
        <input name="start_date" type="date" / class="form-control" value="{{ old('start_date',date('Y-m-d')) }}">
        <span class="help-block">{{ $errors->first('start_date') }}</span>
    </div>
    
  <div class="form-group @if(!empty($errors->first('end_date'))) has-error @endif">
        <label style="font-weight:bold;">最終日:</label>
        <input name="end_date" type="date" / class="form-control" value="{{ old('end_date',date('Y-m-d')) }}">
        <span class="help-block">{{ $errors->first('end_date') }}</span>
    </div>
    
    <div class="form-group @if(!empty($errors->first('items_id'))) has-error @endif">
        <label style="font-weight:bold;">貸し出す商品(複数選択可能)</label>
        
              {!! Form::select("items_id[]",$items,null,['class' => 'form-control','multiple' => 'multiple']) !!}
         <span class="help-block">{{ $errors->first('items_id') }}</span>
    </div>
    
  
      <div class="form-group @if(!empty($errors->first('special'))) has-error @endif">
         <label>こだわり:</label>
          {!! Form::textarea('special',old('special'),['class'=>'form-control']) !!}
          <span class="help-block">{{ $errors->first('special') }}</span>
      </div>
         
      {!! Form::submit('投稿する', ['class' => 'btn btn-primary btn-block']) !!}
        {!! Form::close() !!}
    
@endsection