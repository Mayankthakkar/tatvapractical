<?php
  
namespace App\Http\Controllers;
   
use App\Models\EventModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use App\Http\helper;

use DateTime;
use DatePeriod;
use DateInterval;
  
class EventController extends Controller
{
    
    public function index()
    {
        $events = EventModel::get();
        foreach($events as $event){
            $event->encryptedId = Crypt::encryptString($event->id);
            $event->dates = date('d-m-Y',strtotime($event->startdate)) .' to '.  date('d-m-Y',strtotime($event->enddate));
            if($event->recurrence_type == 1){
                $type = 'Every';
            }
            if($event->recurrence_type == 2){
                $type = 'Every Other';
            }
            if($event->recurrence_type == 3){
                $type = 'Every third';
            }
            if($event->recurrence_type == 4){
                $type = 'Every forth';
            }

            if($event->recurrence_time == 1){
                $time = 'Day';
            }
            if($event->recurrence_time == 7){
                $time = 'Week';
            }
            if($event->recurrence_time == 31){
                $time = 'Month';
            }
            if($event->recurrence_time == 366){
                $time = 'Year';
            }
            $event->recurrence = $type .' ' . $time;
        }
        return view('Events.index',compact('events'));
    }
     
    
    public function create()
    {
        return view('Events.create');
    }
    
   
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'fromdate' => 'required',
            'todate' => 'required',
            'type' => 'required',
            'time' => 'required',
        ]);
    
        EventModel::insert([
            'title' => $request->title,
            'startdate' => date('Y-m-d', strtotime($request->fromdate)),
            'enddate' => date('Y-m-d', strtotime($request->todate)),
            'recurrence_type' => $request->type,
            'recurrence_time' => $request->time,
        ]);
     
        return redirect()->route('event')
                        ->with('success','Event created successfully.');
    }
     
   
    public function view($id)
    {
        $id = Crypt::decryptString($id);
        $data = EventModel::whereId($id)->first();
       
        $startdate = $data->startdate;
        $enddate = $data->enddate;
        $type = $data->recurrence_type;
        $time = $data->recurrence_time;

        $interval = $type*$time;
        $dates = getAllDates($startdate,$enddate,$interval);
       // dd($dates);
        $data->dates = $dates;
        
        return view('Events.view',compact('data'));
    } 
     
    public function edit($id)
    {
        $id = Crypt::decryptString($id);
        $data = EventModel::whereId($id)->first();
        $data->startdate = date('d-m-Y',strtotime($data->startdate));
        $data->enddate = date('d-m-Y',strtotime($data->enddate));
        return view('Events.edit',compact('data'));
    }
    
   
    public function update(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'fromdate' => 'required',
            'todate' => 'required',
            'type' => 'required',
            'time' => 'required',
        ]);
        
        EventModel::where('id',$request->id)->update([
            'title' => $request->title,
            'startdate' => date('Y-m-d', strtotime($request->fromdate)),
            'enddate' => date('Y-m-d', strtotime($request->todate)),
            'recurrence_type' => $request->type,
            'recurrence_time' => $request->time,
        ]);

        return redirect()->route('event')
                        ->with('success','Event updated successfully.');
    }
    
    
    public function destroy($id)
    {
        $id = Crypt::decryptString($id);
        EventModel::whereId($id)->delete();
       
        return redirect()->route('event')
                        ->with('success','Event deleted successfully');
    }
}