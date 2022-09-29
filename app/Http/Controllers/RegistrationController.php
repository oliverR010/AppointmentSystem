<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Vaccine;
class RegistrationController extends Controller
{
    function registration(){
         $data = User::all();

        if(Auth::User()->account_type=='admin'){
            return view ('registration',compact('data'));
            }else{
                return redirect()->route('calendar');
    }
    }

    function approve_registration(Request $request){

        $approve_id = $request ->input ('approve_id');
        $approve = User::find($approve_id);
        $approve ->status = "approved";
        $approve->update();
      
        if(Auth::User()->account_type=='admin'){
            return redirect()->back()->with('success', 'Registration Approved');
          }else{
            return redirect()->route('login');
          }
    
    }

    function reject_registration(Request $request){

        $reject_id = $request ->input ('reject_id');
        $reject = User::find($reject_id);
        $reject ->status = "rejected";
        $reject->update();
        if(Auth::User()->account_type=='admin'){
            return redirect()->back()->with('danger', 'Registration Rejected');
          }else{
            return redirect()->route('login');
          }
    
    }

    function delete_registration(Request $request){
        $del_reg_id = $request ->input ('del_id');
        $del_reg = User::find($del_reg_id);
        $del_reg->delete();
        if(Auth::User()->account_type=='admin'){
            return redirect()->back()->with('danger', 'Successfully Deleted');
          }else{
            return redirect()->route('login');
          }
     
    
    }

        
    
   
}
