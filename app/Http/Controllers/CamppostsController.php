<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Camppost;

class CamppostsController extends Controller
{
    public function store(Request $request){
        
        
       
        $inputs = $request->all();
        
        $rules =[
             'file' => 'required|max:10240|mimes:jpeg,gif,png',
            'start_date'=>"required",
            'end_date'=>'required',
            'special'=>'required',
            'prefecture_id'=>'required',
            'items_id'=>'required',
            ];
            
            $validation = \Validator::make($inputs,$rules);
             
            
            if($validation->fails()){
                return redirect()->back()->withErrors($validation->errors())->withInput();
            }
            
          
         
           $file = $request->file('file');
            $path = \Storage::disk('s3')->putFile('welife-user', $file, 'public');
            $url= \Storage::disk('s3')->url($path);
            $camppost = $request->user()->campposts()->create([
                'image'=>$url,
                'prefecture_id'=>$request->prefecture_id,
                'start_date'=>$request->start_date,
                'end_date'=>$request->end_date,
                "special"=>$request->special,
                ]);
                
            $camppost->item()->sync($request->items_id);
             $user = \Auth::user();
              
   
               return redirect("users/{$user->id}");
               
    }
    
    public function create(){
        $prefectures = \App\Prefecture::orderBy('id','asc')->get()->pluck('name', 'id');
        $prefectures = $prefectures -> prepend('都道府県','');
       
        $items = \App\Item::orderBy('id','asc')->get()->pluck('name','id');
         return view('campposts.form')->with(['prefectures' => $prefectures,'items'=>$items]);
    }
    
    public function index(){
        $data=[];
        if(\Auth::check()){
            $user = \Auth::user();
            
            $campposts = \App\Camppost::orderBy('created_at','desc')->paginate(10);
            
            $data=[
                'user'=>$user,
                'campposts'=>$campposts,
                
                ];
        }
        
        return view('welcome',$data);
    }
    
    
    
    public function destroy($id){
        
        $camppost = \App\Camppost::findOrFail($id);
        
        
        $camppost->delete();
      
        
        return back();
    }
    
    public function search(Request $request){
         $user = \Auth::user();
          $prefectures = \App\Prefecture::orderBy('id','asc')->get()->pluck('name', 'id');
        $prefectures = $prefectures -> prepend('都道府県','');
       
        $items = \App\Item::orderBy('id','asc')->get()->pluck('name','id');
       $campposts= collect([]);
        
        if ($request->input('action') === 'search') {
            // 検索された    
            $place=$request->input('prefecture_id');
            $start_date=$request->input('start_date');
            $end_date=$request->input('end_date');
            $searched_items=$request->input('items_id');
          
            $query = \App\Camppost::query();
           if(!empty($place))
            {
               //$places=$query->where('prefecture_id',$palce)->get();
              $query->where('prefecture_id',$place);
            }
            
            if(!empty($start_date)){
                //$start_dates=$query->where('start_date',$start_date)->get();
                 $query->where('start_date',$start_date);
            }
            
            if(!empty($end_date)){
                //$end_dates=$query->where('end_date',$end_date)->get();
                $query->where('end_date',$end_date);
            }
            
            if(!empty($searched_items)){
              $query->whereHas('camppost_item', function($query) use ($searched_items) {
                    $query->where('items_id', $searched_items);
                
                });
            }
                   
                
            $campposts=$query->paginate(10);
        } else {
            // 初期画面
            
        }
       
        return view('search.index',compact('campposts','prefectures','items','user'));
    }
    
    public function update(Request $request,$id){
    
       
        $camppost = \App\Camppost::findOrFail($id);
       if(isset($request->file)){
            $file = $request->file('file');
        
        $path = \Storage::disk('s3')->putFile('welife-user',$file,'public');
        $url= \Storage::disk('s3')->url($path);
        $camppost->image=$url;
       }
       
        $camppost->prefecture_id=$request->prefecture_id;
        $camppost->start_date=$request->start_date;
        $camppost->end_date=$request->end_date;
        $camppost->special=$request->special;
        $camppost->item()->sync($request->items_id);
        
        $camppost->save();
        return redirect('/');
    }
    
    public function edit($camppost){
        
        $prefectures = \App\Prefecture::orderBy('id','asc')->get()->pluck('name', 'id');
        $prefectures = $prefectures-> prepend('都道府県','');
       
        $items = \App\Item::orderBy('id','asc')->get()->pluck('name','id');
        
        $camppost=\App\Camppost::findOrFail($camppost);
        
      return view('campposts.edit',compact('prefectures','items','camppost'));
    }
    
    public function show($id){
        
    }
    
    
}
