@extends('layouts.app')

@section('content')

    <h1>{{$camppost->user->name}}さんの投稿編集ページ</h1>
    
    <div class="row">
        <div class="col-6">
            {!! Form::model($camppost,['route'=>['campposts.update',$camppost->id],'method'=>'put','files'=>true]) !!}
            <div class="form-group">
            {!! Form::label('file', '画像投稿', ['class' => 'control-label']) !!}
           {!! Form::file('file') !!}
             {{ csrf_field() }}
            </div>
            
            <div class="form-group">
                <label style="font-weight:bold;">場所:</label>
             <select name="prefecture_id" class="form-control">
              <?php 
               foreach ($prefectures as $key => $prefecture){
                   if($camppost->prefecture_id==$key){
                        echo '<option value ="'.$key.'" selected>'.$prefecture.'</option>';
                   }else{
                        echo '<option value ="'.$key.'">'.$prefecture.'</option>';
                   }
                }
                
              ?>
          </select>
            </div>
            
            <div class="form-group">
                <?php
                    //dd($camppost->start_date);
                ?>
                <label style="font-weight:bold;">開始日:</label>
                <input name="start_date" type="date"  class="form-control" value={{ $camppost->start_date }} >
                
            </div>
            
            <div class="form-group">
                <label style="font-weight:bold;">最終日:</label>
                <input name="end_date" type="date"  class="form-control" value={{ $camppost->end_date }} >
            </div>
            
            <div class="form-group">
             @foreach($camppost->camppost_item as $item)
              {{ Form::select("items_id[]",$items,$item->items_id,[ 'class' => 'form-control' , 'multiple' => 'multiple']) }}
             @endforeach
         
             <?php 
               /* foreach ($items as $key => $item){
                  
                  dd($items);
                   foreach ($camppost->camppost_item->items_id as $item2){
                       
                         if($item2->items_id==$key){
                        echo '<input type="checkbox" name="items_id" value="'.$key.'"selected>'.$item.'</option>';
                   }else{
                    echo '<input type="checkbox" name="items_id" value="'.$key.'">'.$item.'</option>';
                }
                   }
                   
               }
                */
              ?>
              
            </div>
            
            <div class="form-group">
                <label>こだわり:</label>
              {!! Form::textarea('special',old('special'),['class'=>'form-control']) !!}
            </div>
            
            {!! Form::submit('更新する',['class' => 'btn btn-primary']) !!}
             {!! Form::close() !!}
        </div>
    </div>
    
@endsection