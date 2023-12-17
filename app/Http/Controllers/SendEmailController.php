<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

use App\Mail\InvitationMail;
use App\Models\Invited;
use RealRashid\SweetAlert\Facades\Alert;

class SendEmailController extends Controller
{
  public static function invitationMail($id)
  {

    $invited = Invited::findOrFail($id);
    
    $data = [
      'name' => $invited->fullname,
      'title' => $invited->pretitle,
      'email' => $invited->email
    ];
    
    $to = $data['email'];

    $body = [
      'name' => $data['name'],
      'title' => $data['title']
    ];
   
    

   // Mail::to($to)->send(new InvitationMail($body));
    /*if (Mail::failures()) {
      Alert::error('Error','Problem While Sending Email, Please Try Again');
      return redirect()->back();
    } else {
      Alert::success('Success','Email Sent Successfully');
      return redirect()->back();
    }*/
    

    //return view('admin.emails.invitationMail', compact('data','body'));
  }

  public static function registerMail($id)
  {

    $invited = Invited::findOrFail($id);
    
    $data = [
      'name' => $invited->fullname,
      'title' => $invited->pretitle,
      'email' => $invited->email
    ];
    
    $to = $data['email'];

    $body = [
      'name' => $data['name'],
      'title' => $data['title']
    ];
   
    

   // Mail::to($to)->send(new RegisterMail($body));
    /*if (Mail::failures()) {
      Alert::error('Error','Problem While Sending Email, Please Try Again');
      return redirect()->back();
    } else {
      Alert::success('Success','Email Sent Successfully');
      return redirect()->back();
    }*/
    

    //return view('admin.emails.registerMail', compact('data','body'));
  }

}
