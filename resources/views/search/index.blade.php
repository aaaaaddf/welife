@extends('layouts.app')

@section('content')
<h1 style="margin-bottom:30px;">検索する</h1>
    {!! Form::open(['action'=>'CamppostsController@search','files'=>true,'method'=>"get"]) !!}

<div class="form-group">
         <label style="font-weight:bold;">場所:</label>
          <select name="prefecture_id" class="form-control">
              <?php 
               foreach ($prefectures as $key => $prefecture){
                    echo '<option value ="'.$key.'">'.$prefecture.'</option>';
                }
                
              ?>
          </select>
    </div>

<div class="form-group">
        <label style="font-weight:bold;">開始日:</label>
        <input name="start_date" type="date" / class="form-control">
</div>

<div class="form-group">
        <label style="font-weight:bold;">最終日:</label>
        <input name="end_date" type="date" / class="form-control">
        <span class="help-block">{{ $errors->first('end_date') }}</span>
    </div>
    
<div class="form-group">
    <label style="font-weight:bold;">アイテム:</label>
    <?php
     //dd($items);
    ?>
    {!! Form::select("items_id[]",$items,null,['class' => 'form-control','multiple' => 'multiple']) !!}
</div>

{!! Form::submit('検索する', ['class' => 'btn btn-primary btn-block']) !!}
{!! Form::hidden('action', 'search') !!}
    {!! Form::close() !!}
    <?php
  // dd($campposts);
    ?>
    <h1>結果</h1>
   @if(!($campposts->isEmpty()))
       <div class="border">
           @include('campposts.campposts')
       </div>
    @else
        <h2>検索結果はありません</h2>
    @endif
@endsection