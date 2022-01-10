<?php

namespace App\Http\Controllers;
use App\Models\Reminder;
use App\Models\TaxForm;
use Illuminate\Http\Request;
use Redirect,Response;
use Calendar;
use DB;
use Carbon\Carbon;

class FullCalendarReminderController extends Controller
{
    public function index(Request $request)
    {
    
      
        
        $events = [];
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
        // dd($data);
        $calendar = Calendar::addEvents($events);
        return view('pages.admin.calendar.fullcalendar', compact('calendar', 'data',$data));
        
       
    }
    public function ajax(Request $request){
        // dd($request);
        $month =$request->month;
        $year =$request->year;
        $dates = Reminder::whereMonth('start', $month +1)
        ->whereYear('start',$year)
        ->get();
        // $dates = DB::select('select * from reminders where saart = ?', [1]);
        
        dd($dates);

        return view('pages.admin.calendar.fullcalendar') ->with('dates',$dates);
        
       
        
    }

    

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
    public function tax(){
        return view('pages.admin.calendar.tax-calendar');
    }
    public function getTaxEvent(){
        $reminders = Reminder::select('reminder', 'start')->get();
        return response()->json($reminders);
    }
    public function createTaxEvent(Request $request)
     {  
  
            $reminder= new Reminder();
            $reminder->reminder=$request->title;
            $reminder->color=$request->color;
            $reminder->start=$request->startdate;
            $reminder->end=$request->enddate;
            $reminder->save();
            
  }
}
