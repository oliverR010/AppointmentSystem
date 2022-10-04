<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Calendar;
use App\Models\appointments;
use App\Models\User;

use Illuminate\Support\Facades\Auth;

class AppointmentsController extends Controller
{
    public function appointment()
    {
        if(Auth::User()->account_type=='admin'){
            return view('services');
            }else{
              return redirect()->route('appointment');
            }
      
    }
 
    public function insert(Request $request){
      $appointment = new appointments();
      // $current_id = Auth::User()->id();
        if(Auth::User()->id){
          $current_id = Auth::User()->id;
        }
       $appointment ->user_id = $current_id;
       $appointment ->appointment_service = $request ->input ('appointmentservice');
       $appointment ->appointment_person = $request ->input ('appointmentperson');
       $appointment ->appointment_vaccine_type = $request ->input ('appointmentvaccinetype');
       $appointment ->appointment_date = $request ->input ('appointmentdate');

       $appointment->save();
       if(Auth::User()->account_type=='admin'){
        return view('services');
        }else{
          return redirect()->route('calendar');
        }
    
       



    }
}