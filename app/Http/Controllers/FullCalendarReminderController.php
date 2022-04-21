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
use RealRashid\SweetAlert\Facades\Alert;

class FullCalendarReminderController extends Controller
{
    //BIR FULLCALENDAR
    public function index()
    {
      
        return view('pages.admin.calendar.tax-calendar.bir-calendar');
    
    }
    public function getTaxEvent(Request $request){

        // $deadline = Reminder::select('r','start_date', 'end_date')->get();
          $reminders = Reminder::all();
         // dd($reminders);
         return response()->json($reminders);
          
   
     }  

    public function createEvent(){
        $taxForms = TaxForm::all();
        return view ('pages.admin.calendar.tax-calendar.add-reminder')->with('taxForms',  $taxForms);
    }

    public function storeEvent(Request $request)
    {  
        $request->validate([
            '*' => 'required',
        ]);
           $reminder= new Reminder();
           $reminder->reminder=$request->reminder;
           $reminder->start_time=$request->startdate;
           $reminder->end_time=$request->enddate;
           $reminder->save();
           Alert::success('Success', 'BIR Deadline Successfuly Added!');
           return redirect()->route('display-calendar');
    }

    public function editEvent($id){
        $reminder = Reminder::find($id);
        return view ('pages.admin.calendar.deadline-calendar.edit-reminder')->with('reminder', $reminder);
    }
    public function updateEvent(Request $request, $id){
        $reminder = Reminder::find($id);
        $reminder->reminder =$request->reminder;
        $reminder->start_time =$request->start_date;
        $reminder->end_time =$request->end_date;
        $reminder->update();
        Alert::success('Success', 'Deadline has been updated');
        return redirect()->route('display-bir-deadlines');
    }
    public function deleteEvent($id)
    {
        $reminder = Reminder::find($id);
        $reminder->delete();
        Alert::success('Success', 'BIR Deadline Successfuly Deleted!');
            return redirect()->back();
        
    }    

    //-------------------------------------------
                //BULANO INTERNAL DEADLINE
        public function indexDeadline(){
            $deadlines = Deadline::all();
            $taxForms = Taxform::all();
        
            return view ('pages.admin.calendar.deadline-calendar.bulano-calendar',compact('deadlines', $deadlines, 'taxForms', $taxForms));
            
        }
        public function listInternalDeadline(){
            $internals = Deadline::all();
            $birs = Reminder::all();
            return view ('pages.admin.calendar.deadline-calendar.internal-list-deadlines',
                    compact('internals', $internals, 'birs', $birs));
        } 
        public function listBIRDeadline(){
            $internals = Deadline::all();
            $birs = Reminder::all();
            return view ('pages.admin.calendar.deadline-calendar.bir-list-deadline',
                    compact('internals', $internals, 'birs', $birs));
        }       
       
        
        public function getReminder(Request $request){
            $deadline = Deadline::select('title','start_date', 'end_date')->get();
            // $reminders = Reminder::select('reminder','start', 'end')->get();
           
            return response()->json($deadline);
            
        }
        
        public function createDeadline(){
            $taxForms = Taxform::all();
            return view ('pages.admin.calendar.deadline-calendar.add-deadline',compact('taxForms', $taxForms));
        }
        public function storeDeadline(Request $request){
            $request->validate([
                '*' => 'required',
            ]);
            $deadline =new Deadline();
            $deadline ->title = $request->title;
            $deadline ->start_date = $request->start_date;
            $deadline ->end_date = $request->end_date;
            $deadline ->taxform_id =$request ->taxform;
            $deadline ->save();
            Alert::success('Success', 'Internal Deadline Successfuly Added!');
            return redirect()->route('display-calendar');
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
            $deadline ->start_date = $request->start_date;
            $deadline ->end_date = $request->end_date;
            $deadline->taxform_id =$request->taxform;
            $deadline->update();
            Alert::success('Success', 'Deadline has been updated');
            return redirect()->route('display-internal-deadlines')  ;
            // return view ('pages.admin.calendar.edit-deadline');
        }
        public function deleteDeadline($id){
             $deadline = Deadline::find($id);
             $deadline->delete();
             Alert::success('Success', 'Internal Deadline Successfuly Deleted!');
            return redirect()->back();
            
        }




        // ASSOC VIEW ON CALENDAR
        public function assocgetReminder(Request $request){
            $deadline = Deadline::select('title','start_date', 'end_date')->get();
           
            return response()->json($deadline);
            
        }
        public function assocgetTaxEvent(Request $request){

          
            $reminders = Reminder::all();
             return response()->json($reminders);
              
       
         }  
        public function assoclistInternalDeadline(){
            $internals = Deadline::all();
            $birs = Reminder::all();
            return view ('pages.associate.calendar.deadline-calendar.internal-list-deadlines',
                    compact('internals', $internals, 'birs', $birs));
        } 
        public function assoclistBIRDeadline(){
            $internals = Deadline::all();
            $birs = Reminder::all();
            return view ('pages.associate.calendar.deadline-calendar.bir-list-deadline',
                    compact('internals', $internals, 'birs', $birs));
        }       
       
         public function associndexDeadline(){
            $deadlines = Deadline::all();
            $taxForms = Taxform::all();
        
            return view ('pages.associate.calendar.deadline-calendar.bulano-calendar',compact('deadlines', $deadlines, 'taxForms', $taxForms));
            
        }
       


}
