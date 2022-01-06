<?php

namespace App\Http\Controllers;
use App\Models\Reminder;
use App\Models\TaxForm;
use Illuminate\Http\Request;
use Redirect,Response;
use Calendar;

class FullCalendarReminderController extends Controller
{
    public function index()
    {
    
        $events = [];
        // $dates = Reminder::select('id', 'start')
        // ->get()
        // ->groupBy(function($date) {
        //     //return Carbon::parse($date->created_at)->format('Y'); // grouping by years
        //     return Carbon::parse($date->start)->format('m'); // grouping by months
        // });
        $month ='';
        $dates = Reminder::whereMonth('start', date('m'))
        ->whereYear('start', date('Y'))
        ->get(['reminder']);
        $data = Reminder::all();
        
        if($data->count())
        {
            foreach ($data as $key => $value) 
            {
                $events[] = Calendar::event(
                    $value->reminder,
                    true,
                    new \DateTime($value->start),
                    new \DateTime($value->end.'+1 day'),
                    // new \Color($value->color),
                    null,
                    // Add color
                
                );
            }
        }
        $calendar = Calendar::addEvents($events);
        return view('pages.admin.calendar.fullcalendar', compact('calendar', 'data',$data,'dates',$dates));
        
       
    }
    public function ajax(Request $request){
        $month =$request->month;
        $year =$request->year;
        $dates = Reminder::whereMonth('start', date($month))
        ->whereYear('start', date($year))
        ->get(['reminder']);
        $data = Reminder::all();
        
        dd($dates);

        return view('pages.admin.calendar.fullcalendar', compact('data',$data,'dates',$dates));
        
       
        
    }

    // public function ajax(Request $request)
    // {
 
    //     switch ($request->type) {
    //        case 'add':
    //           $reminder = Reminder::create([
    //               'title' => $request->title,
    //               'start' => $request->start,
    //               'end' => $request->end,
    //           ]);
 
    //           return response()->json($reminder);
    //          break;
  
    //        case 'update':
    //           $reminder = Reminder::find($request->id)->update([
    //               'title' => $request->title,
    //               'start' => $request->start,
    //               'end' => $request->end,
    //           ]);
 
    //           return response()->json($reminder);
    //          break;
  
    //        case 'delete':
    //           $reminder = Reminder::find($request->id)->delete();
  
    //           return response()->json($reminder);
    //          break;
             
    //        default:
    //          # code...
    //          break;
    //     }
    // }

    public function storeEvent(Request $request)
     {  
  
            $reminder= new Reminder();
            $reminder->reminder=$request->title;
            $reminder->color=$request->color;
            $reminder->start=$request->startdate;
            $reminder->end=$request->enddate;
            $reminder->save();
            return redirect('fullcalendar')->with('success', 'Reminder has been added');
  }

    // public function update(Request $request)
    // {   
    //     $where = array('id' => $request->id);
    //     $updateReminder = ['reminder' => $request->reminder,'start' => $request->start, 'end' => $request->end];
    //     $reminder  = Reminder::where($where)->update($updateReminder);
 
    //     return Response::json($reminder);
    // } 

    public function deleteEvent($id)
    {
        $reminder = Reminder::find($id)->delete();
         return redirect()->back()->with('success', 'Reminder has been deleted');
        
    }    
    public function createEvent(){
        $taxForms = TaxForm::all();
        return view ('pages.admin.calendar.add-deadline')->with('taxForms',  $taxForms);
    }
    public function viewEvent(){
        $reminders = Reminder::all();
        return view ('pages.admin.calendar.reminder-list')->with('reminders', $reminders);
    }
    public function editEvent($id){
        $reminder = Reminder::find($id);
        return view ('pages.admin.calendar.edit-reminder')->with('reminder', $reminder);
    }
    public function updateEvent(Request $request, $id){
        $reminder = Reminder::find($id);
        $reminder->reminder =$request->reminder;
        $reminder->color =$request->color;
        $reminder->start =$request->start_date;
        $reminder->end =$request->end_date;
        $reminder->update();
        return redirect()->route('view-reminders')->with('success', 'Reminder has been updated');
    }
    
}
