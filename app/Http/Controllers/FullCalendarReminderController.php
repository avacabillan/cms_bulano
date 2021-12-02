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
    //     if($request->ajax()) {
       
            // $calendar = Reminder::whereDate('start', '>=', $request->start)
            //           ->whereDate('end',   '<=', $request->end)
            //           ->get(['id', 'reminder', 'start', 'end']);
 
    //         return response()->json($calendar);
    //    }
        $reminders = Reminder::all();
        $reminder =[];
        
            foreach ($reminders as $row){
                $endDate = $row->end."24:00:00";
                $reminder[] = Calendar::event(
                    $row->reminder,
                    true,
                    new \DateTime($row->start),
                    new \DateTime($row->end),
                    $row->id,
                    [
                        'color'=>$row->color,
                    ]

                    );
            }
        $calendar = Calendar::addEvents($reminder);
        return view('pages.admin.calendar', compact('reminders','calendar'));
       
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

    // public function create(Request $request)
    // {  
    //     $insertReminder = [ 'reminder' => $request->reminder,
    //                    'start' => $request->start,
    //                    'end' => $request->end
    //                 ];
    //     $reminder = Reminder::insert($insertReminder);   
    //     return Response::json($reminder);
    // }

    // public function update(Request $request)
    // {   
    //     $where = array('id' => $request->id);
    //     $updateReminder = ['reminder' => $request->reminder,'start' => $request->start, 'end' => $request->end];
    //     $reminder  = Reminder::where($where)->update($updateReminder);
 
    //     return Response::json($reminder);
    // } 

    // public function destroy($id)
    // {
    //     $reminder = Reminder::find($id)->delete();
   
    //     return Response::json($reminder);
    // }    
     
}
