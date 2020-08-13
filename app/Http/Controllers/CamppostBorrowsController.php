<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\CamppostBorrow;

use Illuminate\Support\Facades\Auth;

class CamppostBorrowsController extends Controller
{
    public function store(Request $request,$id){
        
        $camppost = \App\Camppost::findOrFail($id);
         
        $today = date("Y-m-d");
        $nextmonth = date("Y-m-d", strtotime("1 month"));
        
         $query = \App\CamppostBorrow::query();
         $query->where('user_id',Auth::user()->id);
         $query->where('camppost_id',$camppost->id);
         
         $borrow_user=$query->get();
         $errorMessage=null;
         if($borrow_user->isNotEmpty()){
             $errorMessage="リクエスト済みです";
             return back()->with([
            'errorMessage'=>$errorMessage,
            ]);
         }else{
             $request->validate([
            'start_date'=>'required|date|after_or_equal:'.$today.'|before:'.$nextmonth,
            'end_date'=>'required|date|after_or_equal:' . $today . '|before:' . $nextmonth.'|after:start_date',
            ]);
            
             if($validation->fails()){
                return redirect()->back()->withErrors($validation->errors())->withInput();
            }
          
        $camppost_borrows = $request->user()->camppost_borrows()->create([
                'user_id'=>Auth::user()->id,
                'camppost_id'=>$id,
                'start_date'=>$request->start_date,
                'end_date'=>$request->end_date,
                'owner_id'=>$camppost->user_id,
                ]);
        
        return back()->with([
            'errorMessage'=>$errorMessage,
            ]);
         }
        
    }
    
    public function notification($owner_id){
        $camppost_borrow_useres= \App\CamppostBorrow::where('owner_id',$owner_id)
                                        ->orderBy('created_at','desc')
                                        ->get();
        
        return view('request.request')->with('camppost_borrow_useres',$camppost_borrow_useres);
        
    }
}
