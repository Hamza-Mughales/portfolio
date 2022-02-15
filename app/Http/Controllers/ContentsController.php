<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;

use App\menu as Nav;
use App\about as About;
use App\skill as Skills;
use App\project as Project;

class ContentsController extends Controller
{
    //
    public $skill;
    public function __construct()
    {
    
    
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS');
        
        $this->project= new Project();
        $this->about= new About();
    }
    public function index( Request $request){

        $navbar = Nav::all();
        $about =  $this->about->get_about();
        
        $skills = Skills::orderBy('order')->get();
        $projects = $this->project->get_projects();

        return view('home.index',
        [
            'navbar'    => $navbar,
            'about'     => $about,
            'skills'    => $skills,
            'projects'  => $projects
        ]);
    }
    
        
    // Send E-mail
   /* function sendEmail(Request $request)
    {
        // Make email validate
        $this->validate($request,[
        'name'          => 'required',
        'email'          => 'required|email',
        'message'          => 'required',
        ]);
        
        // bringing the reciever name and email
        $about =  $this->about->get_about();        
        $to_name = $about->name;
        $to_email = $about->email;
        
        // Store the mail values with an array
        $data = array(
            'name'      =>  $request->name,
            'email'      =>  $request->email,
            'message'      =>  $request->message
        );

        // Mail::send('sendemail', $data, function($message) use ($to_name, $to_email) {
          //  $message->to($to_email, $to_name)
         //           ->subject('Email From My Portfolio');
        //    $message->from('hm@hm.com','Artisans Web');
       // });
        
        Mail::to($to_email)->send(new SendMail($data));
        return back()->with('success','thanks for contacting me!');
    } */
    
    
    
    ///////////////////////// AJAX Mail /////////////
        
        public function sendEmail(Request $request)
        {
        
            // bringing the reciever name and email
            $about =  $this->about->get_about();        
            $toEmail = $about->email;;
            
            $name = $request->input('name');
            $email = $request->input('email');
            $message = $request->input('message');
            
            $mailHeaders = "From:".$email . "\r\n";
            
            if(mail($toEmail, $name, $message, $mailHeaders)) {
               echo '<div class="alert alert-success" role="alert">';
               echo "<p class='success m-0'>Thank you, your message has been sent successfully.</p>";
               echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close">';
               echo '<span aria-hidden="true">&times;</span>';
               echo '</div>';
            } else {
            echo "<p class='Error'>Sorry, problem in Sending Mail.</p>";
            }
        }
    
    
}
