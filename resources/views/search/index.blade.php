@extends('layouts.app')

@section('content')
<h1 style="margin-bottom:30px;">検索する</h1>
    {!! Form::open(['action'=>'CamppostsController@search','files'=>true,'method'=>"get"]) !!}

<div class="form-group">
         <label style="font-weight:bold;">場所:</label>
          <select name="prefecture_id" class="form-control">
              <?php 
               foreach ($prefectures as $key => $prefecture){
                    echo '<option value ="'.$key.'"required>'.$prefecture.'</option>';
                }
                
              ?>
          </select>
    </div>

<div class="form-group">
        <label style="font-weight:bold;">開始日:</label>
        <input name="start_date" type="date" / class="form-control" required>
</div>

<div class="form-group">
        <label style="font-weight:bold;">最終日:</label>
        <input name="end_date" type="date" / class="form-control" required>
        <span class="help-block">{{ $errors->first('end_date') }}</span>
    </div>
    
<div class="form-group">
    <label style="font-weight:bold;">アイテム</label>
         
             <?php 
               foreach ($items as $key => $item){
                    echo '<input type="checkbox" name="items_id" value="'.$key.'">'.$item.'</option>';
                }
                
              ?>
</div>

{!! Form::submit('検索する', ['class' => 'btn btn-primary btn-block']) !!}
{!! Form::hidden('action', 'search') !!}
    {!! Form::close() !!}
    <h1>結果</h1>
   @if(isset($searched_campposts))
       <div class="border">
           @include('campposts.campposts2')
       </div>
    @else
        <h2>検索結果はありません</h2>
    @endif
@endsection