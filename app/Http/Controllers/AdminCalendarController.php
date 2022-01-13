<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reminder;

class AdminCalendarController extends Controller
{
    public function index(){
        return view ('pages.admin.calendar.bir-deadline');
    }
    public function showDeadline(){
        return view ('pages.admin.calendar.deadline-list');
    }
    public function createDeadline(){
        return view ('pages.admin.calendar.add-deadline');
    }
    public function editDeadline(){
        return view ('pages.admin.calendar.edit-deadline');
    }
    public function bulanoDeadline(){
        return view ('pages.admin.calendar.bulano-calendar');
    }
   



}
