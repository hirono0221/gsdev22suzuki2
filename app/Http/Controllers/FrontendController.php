<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;
use App\Models\Time;
use App\Models\User;
use App\Models\Booking;
use App\Models\Prescription;
use App\Mail\AppointmentMail;

use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\CoachController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;

class FrontendController extends Controller
{
    
    public function index()
    {
        date_default_timezone_set('Asia/Tokyo');
        if(request('date')){ 
            $coaches = $this->findCoachesBasedOnDate(request('date'));
            return view('welcome',compact('coaches'));
        }
        $coaches = Appointment::where('date',date('Y-m-d'))->get();
    	return view('welcome',compact('coaches'));
    }
    
    public function show($coachId,$date)
    {
        $appointment = Appointment::where('user_id',$coachId)->where('date',$date)->first();
        $times = Time::where('appointment_id',$appointment->id)->where('status',0)->get();
        $user = User::where('id',$coachId)->first();
        $coach_id = $coachId;

        return view('appointment',compact('times','date','user','coach_id'));
    }
    
    
    public function findCoachesBasedOnDate($date)
    {
        $coaches = Appointment::where('date',$date)->get();
        return $coaches;

    }
    
    public function store(Request $request)
    {
        date_default_timezone_set('Asia/Tokyo');
        
        $request->validate(['time'=>'required']);
        $check=$this->checkBookingTimeInterval();
        if($check){
            return redirect()->back()->with('message','You have already booked an appointment.Please wait to make next appointment');
        }
   
        
        Booking::create([
            'user_id'=> auth()->user()->id,
            'coach_id'=> $request->coachId,
            'time'=> $request->time,
            'date'=> $request->date,
            'status'=>0
        ]);

        Time::where('appointment_id',$request->appointmentId)
            ->where('time',$request->time)
            ->update(['status'=>1]);
        //send email notification
        $coachName = User::where('id',$request->coachId)->first();
        $mailData = [
            'name'=>auth()->user()->name,
            'time'=>$request->time,
            'date'=>$request->date,
            'coachName' => $coachName->name

        ];
        try{
           \Mail::to(auth()->user()->email)->send(new AppointmentMail($mailData));

        }catch(\Exception $e){

        }

        return redirect()->back()->with('message','Your appointment was booked');


    }

    public function checkBookingTimeInterval()
    {
        return Booking::orderby('id','desc')
            ->where('user_id',auth()->user()->id)
            ->whereDate('created_at',date('Y-m-d'))
            ->exists();
    }

    public function myBookings()
    {
        $appointments = Booking::latest()->where('user_id',auth()->user()->id)->get();
        return view('booking.index',compact('appointments'));
    }

    public function coachToday(Request $request)
    {
        $coaches = Appointment::with('coach')->whereDate('date',date('Y-m-d'))->get();
        return $coaches;
    }

    public function findCoaches(Request $request)
    {
        $coaches = Appointment::with('coach')->whereDate('date',$request->date)->get();
        return $coaches;
    }
    
}
