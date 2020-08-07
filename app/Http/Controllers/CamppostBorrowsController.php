<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\CamppostBorrow;

use Illuminate\Support\Facades\Auth;

class CamppostBorrowsController extends Controller
{
    public function store(Request $request,$id){
        
        $camppost = \App\Camppost::findOrFail($id);
        
        $request->validate([
            'start_date'=>'required',
            'end_date'=>'required',
            ]);
          
        $camppost_borrows = $request->user()->camppost_borrows()->create([
                'user_id'=>Auth::user()->id,
                'camppost_id'=>$id,
                'start_date'=>$request->start_date,
                'end_date'=>$request->end_date,
                'owner_id'=>$camppost->user_id,
                ]);
        
        return back();
    }
    
    public function notification($owner_id){
        $camppost_borrow_useres= \App\CamppostBorrow::where('owner_id',$owner_id)
                                        ->orderBy('created_at','desc')
                                        ->get();
        
        return view('request.request')->with('camppost_borrow_useres',$camppost_borrow_useres);
        
    }
}
