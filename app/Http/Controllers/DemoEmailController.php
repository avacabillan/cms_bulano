<?php

namespace App\Http\Controllers;


use App\Mail\DemoEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

use Symfony\Component\HttpFoundation\Response;

class DemoEmailController extends Controller
{
    public function sendEmail() {
       
   
        $mailData = [
            'title' => 'Demo Email',
            'body' => 'this is test'
        ];
  
        Mail::to('ajlemluna@gmail.com')->send(new DemoEmail($mailData));
   
       return 'Email Sent';
    }

}
