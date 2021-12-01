<?php

namespace App\Http\Controllers;
use App\Reminder;
use Illuminate\Http\Request;
use Redirect,Response;

class FullCalendarReminderController extends Controller
{
    public function index(Request $request)
    {
        if($request->ajax()) {
       
            $data = Reminder::whereDate('start', '>=', $request->start)
                      ->whereDate('end',   '<=', $request->end)
                      ->get(['id', 'reminder', 'start', 'end']);
 
            return response()->json($data);
       }
 
       return view('pages.admin.calendar');
    }

    public function ajax(Request $request)
    {
 
        switch ($request->type) {
           case 'add':
              $reminder = Reminder::create([
                  'title' => $request->title,
                  'start' => $request->start,
                  'end' => $request->end,
              ]);
 
              return response()->json($reminder);
             break;
  
           case 'update':
              $reminder = Reminder::find($request->id)->update([
                  'title' => $request->title,
                  'start' => $request->start,
                  'end' => $request->end,
              ]);
 
              return response()->json($reminder);
             break;
  
           case 'delete':
              $reminder = Reminder::find($request->id)->delete();
  
              return response()->json($reminder);
             break;
             
           default:
             # code...
             break;
        }
    }

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
