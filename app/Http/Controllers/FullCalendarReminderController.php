<?php

namespace App\Http\Controllers;
use App\Models\Reminder;
use App\Models\TaxForm;
use App\Models\Deadline;
use Illuminate\Http\Request;
use Redirect,Response;
use Calendar;
use DB;
use Carbon\Carbon;

class FullCalendarReminderController extends Controller
{
    //BIR FULLCALENDAR
    public function index()
    {

        $events = [];
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
        // dd($data);
        $calendar = Calendar::addEvents($events);
        return view('pages.admin.calendar.tax-calendar.bir-calendar', compact('calendar', 'data',$data,'dates',$dates));
        
       
    }
    public function ajax(Request $request){
        $month =$request->month;
        $year =$request->year;
        $reminders = Reminder::whereMonth('start', $month)
        ->whereYear('start',$year)
        ->get();
       
        // return view('pages.admin.calendar.fullcalendar',compact('reminders', $reminders));
        //  return response()->json($reminders);
        return response()->json($reminders);
        
    }
    public function getTaxEvent(){
        
      
            $reminders = Reminder::select('reminder', 'start')->get();
            return response()->json($reminders);
  
    }
    public function createEvent(){
        $taxForms = TaxForm::all();
        return view ('pages.admin.calendar.tax-calendar.add-reminder')->with('taxForms',  $taxForms);
    }

    public function storeEvent(Request $request)
    {  
 
           $reminder= new Reminder();
           $reminder->reminder=$request->title;
           $reminder->start=$request->startdate;
           $reminder->end=$request->enddate;
           $reminder->save();
           return redirect('fullcalendar')->with('success', 'Reminder has been added');
    }
    public function deleteEvent($id)
    {
        $reminder = Reminder::find($id)->delete();
         return redirect()->back()->with('success', 'Reminder has been deleted');
        
    }    
   
    public function viewEvent(){
        $reminders = Reminder::all();
        return view ('pages.admin.calendar.tax-calendar.reminder-list')->with('reminders', $reminders);
    }
    public function editEvent($id){
        $reminder = Reminder::find($id);
        return view ('pages.admin.calendar.tax-calendar.edit-reminder')->with('reminder', $reminder);
    }
    public function updateEvent(Request $request, $id){
        $reminder = Reminder::find($id);
        $reminder->reminder =$request->reminder;
        $reminder->start =$request->start_date;
        $reminder->end =$request->end_date;
        $reminder->update();
        return redirect()->route('view-reminders')->with('success', 'Reminder has been updated');
    }
    

    
//     public function createTaxEvent(Request $request)
//      {  
  
//             $reminder= new Reminder();
//             $reminder->reminder=$request->title;
//             $reminder->color=$request->color;
//             $reminder->start=$request->startdate;
//             $reminder->end=$request->enddate;
//             $reminder->save();
            
//   }






    //-------------------------------------------
                //BULANO INTERNAL DEADLINE
        public function indexDeadline(){
            
            return view ('pages.admin.calendar.deadline-calendar.bulano-calendar');
        }
        
        public function deadlineAjax(Request $request){
            $month =$request->month;
            $year =$request->year;
            $deadlines = Deadline::whereMonth('deadline', $month)
            ->whereYear('deadline',$year)
            ->get();
            
            return response()->json($deadlines);
                     
            // return view ('pages.admin.calendar.deadline-calendar.bulano-calendar',compact('deadlines', $deadlines));
        }
        public function listDeadline(){
            $deadlines = Deadline::all();
            return view ('pages.admin.calendar.deadline-calendar.deadline-list')->with('deadlines', $deadlines);
        }
        public function createDeadline(){
            $taxforms = Taxform::all();
            return view ('pages.admin.calendar.deadline-calendar.add-deadline')->with('taxforms', $taxforms);
        }
        public function storeDeadline(Request $request){
            $deadline =new Deadline();
            $deadline ->title = $request->title;
            $deadline ->deadline = $request->deadline;
            $deadline ->taxform_id =$request ->taxform;
            $deadline ->save();
            return redirect()->route('display-calendar')->with('success', 'Deadline has been added');
            // return view ('pages.admin.calendar.add-deadline');
        }
        public function editDeadline($id){
            $deadline = Deadline::find($id);
            $forms = TaxForm::all();
            return view ('pages.admin.calendar.deadline-calendar.edit-deadline',compact('deadline', $deadline, 'forms',$forms));
        }
        public function updateDeadline(Request $request, $id){
            $deadline = Deadline::find($id);
            $deadline->title =$request->title;
            $deadline->deadline =$request->deadline;
            $deadline->taxform_id =$request->taxform;
            $deadline->update();
            return redirect()->route('list-deadline')->with('success', 'Deadline has been updated');
            // return view ('pages.admin.calendar.edit-deadline');
        }
        public function deleteDeadline($id){
             $deadline = Deadline::find($id)->delete();
            return redirect()->back()->with('success', 'Deadline has been deleted');
            
        }
        


}
