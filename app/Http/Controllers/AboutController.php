<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\about as About;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\UploadedFile;

class AboutController extends Controller
{
    //
    public function __construct(About $about)
    {
        $this->about = $about;
    }


    /*********** SHOW About FUNCTION *******/

    public function showAbout()
    {
        $About = [];
        $About['about'] = About::all();
        return view('about.about', $About);
    }


    /********** CREATE About FUNCTION ********/

    public function addAbout(Request $request, About $about)
    {
        $data = [];

        $data['name'] = $request->input('name');
        $data['phone'] = $request->input('phone');
        $data['email'] = $request->input('email');
        $data['title'] = $request->input('title');
        $data['description'] = $request->input('description');

        if ($request->isMethod('post')) 
        {
            $this->validate(
                $request,
                [
                    'name' => 'required',
                    'email' => 'required',
                    'description' => 'required',
                    'img' => 'mimes:jpeg,jpg,png,bmp'
                ]
            );

            

            if ( $request->file('img')):
                        $extension = $request->file('img')->extension();
                $img_name ="myimg" . '_' . time() . rand(1, 100);
                $path = $request->file('img')->storeAs('img', $img_name.".".$extension, 'public');
                $data['img'] = $path;
            endif;

            if ( $request->fiel('cv'))
            {
                $extension = $request->file('cv')->extension();
                $file_name = 'Hamza_cv'.time().rand(1,100).".".$extension;
                $cv = $request->file('cv')->storeAs('cv', $file_name,'public');
                $data['cv'] = $cv;
            }            

            $about->insert($data);

            return Redirect('about');
        }

        $data['edit'] = 0;
        return view('about.aboutform', $data);
    }
   

    /********** EDIT ABOUT FUNCTION ********/

    public function editAbout(Request $request, $about_id)
    {

        $about = $this->about->find($about_id);

        $data = [];
        $data['about_id'] = $about->id;
        $data['name'] = $about->name;
        $data['phone'] = $about->phone;
        $data['email'] = $about->email;
        $data['title'] = $about->title;
        $data['description'] = $about->description;
        
        if ($request->isMethod('post')) {
            $this->validate(
                $request,
                [
                    'name' => 'required',
                    'email' => 'required',
                    'description' => 'required',
                    'img' => 'mimes:jpeg,jpg,png,bmp'
                ]
            );

            $about_data = $this->about->find($about_id);

            $about_data->name = $request->input('name');
            $about_data->phone = $request->input('phone');
            $about_data->email = $request->input('email');
            $about_data->title = $request->input('title');
            $about_data->description = $request->input('description');

                if ($request->file('img')) {
                  $extension = $request->file('img')->extension();
                    $img_name ="myimg". '_' . time() . rand(1, 100);
                    $path = $request->file('img')->storeAs('img', $img_name.".".$extension , 'public');
                    $about_data->img = $path;
                }
                if ( $request->file('cv'))
                {
                    $extension = $request->file('cv')->extension();
                    $file_name = 'Hamza_cv'.time().rand(1,100).".".$extension;
                    $cv = $request->file('cv')->storeAs('cv', $file_name,'public');
                    $about_data->cv = $cv;
                } 

        

            $process = $about_data->save();

            return redirect('about');
        }

        $data['edit'] = 1;
        return view('about.aboutform', $data);
    }


    /********** DELETE About FUNCTION ********/

    public function deleteAbout($about_id)
    {
        $deleted_about = $this->about->find($about_id)->delete();
        return Redirect('about');
    }
}
