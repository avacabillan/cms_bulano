<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Deadline;

use App\Models\Reminder;
class AdminCalendarController extends Controller
{
    public function index()
    {
        if(request()->ajax()) 
        {

        $deadline = (!empty($_GET["deadline"])) ? ($_GET["deadline"]) : ('');
        $data = Deadline::whereDate('deadline', '>=', $deadline)->get(['id','title','deadline']);
        return Response::json($data);
        }
    
        return view ('test');
    }
    
   
    public function create(Request $request)
    {  
        $insertArr = [ 'title' => $request->title,
                       'deadline' => $request->start,
                       'taxform_id' => $request->taxform
                    ];
        $event = Deadline::insert($insertArr);   
        return Response::json($event);
    }

    public function update(Request $request)
    {   
        $where = array('id' => $request->id);
        $updateArr = ['title' => $request->title,
                      'deadline' => $request->start,
                      'taxform_id' => $request->taxform];
        $event  = Deadline::where($where)->update($updateArr);
 
        return Response::json($event);
    } 
 
    public function destroy(Request $request)
    {
        $event = Deadline::where('id',$request->id)->delete();
        return Response::json($event);
    } 
  


}
