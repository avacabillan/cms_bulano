<?php

namespace App\Http\Controllers;
use App\Models\Reminder;
use Illuminate\Http\Request;
use Redirect,Response;
use Calendar;

class FullCalendarReminderController extends Controller
{
    public function index()
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
        $calendar = Calendar::addEvents($events);
        return view('pages.admin.calendar.fullcalendar', compact('calendar'));
        
       
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
        return view ('pages.admin.calendar.add-deadline');
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
