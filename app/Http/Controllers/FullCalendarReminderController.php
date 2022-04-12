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
         $reminders = Reminder::select('reminder','start', 'end')->get();
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
           $reminder->start_dates=$request->startdate;
           $reminder->end_dates=$request->enddate;
           $reminder->save();
           return redirect()->route('display-calendar')->with('success', 'Reminder has been added');
    }

    public function editEvent($id){
        $reminder = Reminder::find($id);
        return view ('pages.admin.calendar.tax-calendar.edit-reminder')->with('reminder', $reminder);
    }
    public function updateEvent(Request $request, $id){
        $reminder = Reminder::find($id);
        $reminder->reminder =$request->reminder;
        $reminder->start_dates =$request->start_date;
        $reminder->end_dates =$request->end_date;
        $reminder->update();
        Alert::success('Success', 'Deadline has been updated');
        return redirect()->route('display-bir-deadlines');
    }
    public function deleteEvent($id)
    {
        $reminder = Reminder::find($id)->delete();
         return redirect()->back()->with('success', 'Reminder has been deleted');
        
    }    
    public function fetchDate(Request $request)
    {
        $fromDates = date("Y-m-d", strtotime($request->fromDate));
        $toDates = date("Y-m-d", strtotime($request->toDate));
        // $fetch = DB::table('reminders')->select()
        // ->where("start", '=', $fromDates)
        // ->where("end", '=', $toDates)
        // ->get();  
        
        
        $fetch = DB::table('tax_archived_forms')
                ->whereBetween('deleted_at', [$fromDates, $toDates])->get();
                // dd($fetch);
                  return response()->json($data, 200, $headers);
        // dd($fetch);
    }
   
   







    //-------------------------------------------
                //BULANO INTERNAL DEADLINE
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
        public function indexDeadline(){
            $deadlines = Deadline::all();
            $taxForms = Taxform::all();
            return view ('pages.admin.calendar.deadline-calendar.bulano-calendar',compact('deadlines', $deadlines, 'taxForms', $taxForms));
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
                '*' => 'The :attribute field is required.',
            ]);
            $deadline =new Deadline();
            $deadline ->title = $request->title;
            $deadline ->start_date = $request->start_date;
            $deadline ->end_date = $request->end_date;
            $deadline ->taxform_id =$request ->taxform;
            $deadline ->save();
            Alert::success('Success', 'Reminder Successfuly Added!');
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
             $deadline = Deadline::find($id)->delete();
            return redirect()->back()->with('success', 'Deadline has been deleted');
            
        }
        public function queryData(){
            $clients = DB::table('bulano_deadline')
                ->join('client_taxes', 'bulano_deadline.taxform_id', '=', 'client_taxes.tax_form_id')
                 ->join('clients', 'client_taxes.client_id', '=', 'clients.id')
                //  ->where( 'bulano_deadline.taxform_id', '=', 1)
                ->orderBy('bulano_deadline.taxform_id')
                ->select ('clients.name')
                ->get();
                //dd($clients);
                // return view('pages.admin.calendar.tax-calendar.bir-calendar')->with('clients', $clients);
            
        }
     


}
