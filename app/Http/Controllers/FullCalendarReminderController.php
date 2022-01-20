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
    public function index(Request $request)
    {

        if($request->ajax()) {
       
            $data = Reminder::whereDate('start', '>=', $request->start)
                      ->whereDate('end',   '<=', $request->end)
                      ->get(['id', 'reminder', 'start', 'end']);
 
            return response()->json($data);
       }
       
        return view('pages.admin.calendar.tax-calendar.bir-calendar');
        
       
    }
    public function ajax(Request $request){
        $month =$request->month;
        $year =$request->year;    
        $reminders = Reminder::whereMonth('start', $month)
        ->whereYear('start',$year)
        ->get();

        return response()->json($reminders);
        
    }
    // public function fetchDate(Request $request)
    // {
    //     if($request->ajax())
    //     {
    //     if($request->from_date != '' && $request->to_date != '')
    //     {
    //     $data = DB::table('reminders')
    //         ->whereBetween('start', array($request->from_date, $request->to_date))
    //         ->get();
    //     }
    //     else
    //     {
    //     $data = DB::table('reminders')->orderBy('start', 'desc')->get();
    //     }
    //     echo json_encode($data);
    //     }
    // }
    public function getTaxEvent(){
        
      
        $reminders = Reminder::select('reminder')->get();
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
            ->orderBy('deadline')
            ->get();
            
            return response()->json($deadlines);
                     
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
