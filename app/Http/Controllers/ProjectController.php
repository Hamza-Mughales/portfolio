<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use App\project as Project;
use App\projectdesc as ProjectDesc;

class ProjectController extends Controller
{
    //
    public function __construct(Project $project, ProjectDesc $pdesc)
    {
        $this->project = $project;
        $this->pdesc = $pdesc;
    }


//********** SHOW PROJECTS FUNCTION *******/

    public function showProjects()
    {
        $projects = [];
        $projects['projects'] = $this->project->get_projects();
        return view('projects.project', $projects);
    }


/********** CREATE PROJECT FUNCTION ********/

    public function addProject(Request $request, Project $project)
    {
        $data = [];

        $data['name'] = $request->input('name');
        $data['short_desc'] = $request->input('short_desc');
        $data['description'] = $request->input('description');
        $data['url'] = $request->input('url');
        $data['order'] = $request->input('order');
        //$data['main_img'] = $request->file('main_img');
       


        if ($request->isMethod('post')) 
        {
            $this->validate(
                $request,
                [
                    'name' => 'required',
                    'main_img' => 'required|mimes:jpeg,jpg,png,bmp',
                    
                ]
            );

            $extension = $request->file('main_img')->extension();
            $img_name = $request->input('name') . time().rand(1,100) . "." .$extension;            
            $main_img = $request->file('main_img')->storeAs('main_img', $img_name ,'public');
            $data['main_img'] = $main_img;
         
            $project->insert($data);

            return Redirect('projects');
        }

        $data['edit'] = 0;
        return view('projects.projectform', $data);
    }


/********** EDIT PROJECT FUNCTION ********/

    public function editProject(Request $request, $project_id)
    {
        
        $project = $this->project->find($project_id);

        $data = [];            
        $data['project_id'] = $project->id;
        $data['name'] = $project->name;
        $data['short_desc'] = $project->short_desc;
        $data['description'] = $project->description;
        $data['url'] = $project->url;
        $data['order'] = $project->order;
        $data['main_img'] = $project->main_img;

        if ($request->isMethod('post')) 
        {
            $this->validate(
                $request,
                [
                    'name' => 'required',
                    'main_img' => 'mimes:jpeg,jpg,png,bmp',
                ]
            );

            
            $project_data = $this->project->find($project_id);
            
            $project_data->name = $request->input('name');
            $project_data->short_desc = $request->input('short_desc');
            $project_data->order = $request->input('order');
            $project_data->description = $request->input('description');
            $project_data->url = $request->input('url');
            
            if ($request->file('main_img')) {
                $extension = $request->file('main_img')->extension();
                $img_name = $project_data->name . time().rand(1,100) . "." .$extension;
                $img = $request->file('main_img')->storeAS('img', $img_name, 'public');
                $project_data->main_img = $img;
            }

            $process = $project_data->save();

            return redirect('projects');
        }

        $data['edit'] = 1;
        return view('projects.projectform', $data);
    }


    /********** DELETE PROJECT FUNCTION ********/

    public function deleteProject($project_id)
    {
        $deleted_project = $this->project->find($project_id)->delete();
        return Redirect('projects');
    }

    
    /*
    /
    /  The project details section 
    /
    /
    */


    
    /************* Show Project Details */
    
    public function project_details( $project_id)
    {
        $project = $this->project->find($project_id);
        $project_id = $project->id;
        $project_name = $project->name;
        $project_details = new ProjectDesc();

        $data = [];
        $data['project_id'] = $project_id;
        $data['project_name'] = $project_name;
        $data['project_details'] = $project_details->get_project_details($project_id);
        
        /*
        $data['id'] = $project->id;
        $data['project_id'] = $project->project_id;
        $data['title'] = $project->title;
        $data['desc'] = $project->desc;
        $data['project_imgs'] = $project->project_imgs;
        $data['order'] = $project->order;
        $data['show_details'] = ProjectDesc::all();
        */
        return view('projDetails.details',$data);
    }

    /************* Add Project Details */
    public function add_p_detail(Request $request,ProjectDesc $pdesc, $project_id)
    {
        $project = $this->project->find($project_id);
        $project_name = $project->name;

        $data = [];
            $data['id'] = $request->input('id');
            $data['project_id'] = $project->id; 
            $data['title'] = $request->input('title'); 
            $data['description'] = $request->input('description'); 
            $order = $request->input('order');
            $data['order'] = ($order=='') ? 1 : $order;
        
        if($request->isMethod('post'))
        {
            $this->validate($request, 
                            [
                                'title' => 'required',
                                'img' => 'required|mimes:jpeg,jpg,png,bmp' 
                            ]
                            );
            $path = $request->file('img')->storeAs('img',$request->input('title'), 'public');
            $data['img']=$path;
            $pdesc->insert($data);
            return redirect()->route('project_details', $project_id);
        }
        
        $data['edit'] = 0;
        $data['project_name'] = $project_name;
        
        return view('projDetails.pDForm',$data);
    }


    /************* edit project Details */
    public function edit_p_detail(Request $request, $id)
    {
       
        $project_desc = $this->pdesc->find($id);
      
        $data = [];
        $data['id'] = $project_desc->id;
        $data['project_id'] = $project_desc->project_id;
        $data['title'] = $project_desc->title;
        $data['description'] = $project_desc->description;
        $data['order'] = $project_desc->order;

        if($request->isMethod('post'))
        {
            $this->validate($request, 
                            [
                                'title' => 'required',
                                'img' => 'mimes:jpeg,jpg,png,bmp'
                            ]
                            );
                            
            $project_desc = $this->pdesc->find($id);
         
             $project_desc->id = $id; 
            $project_desc->title = $request->input('title'); 
            $project_desc->description = $request->input('description'); 
            if($_FILES):
            if ($request->file('img')) {
                $time=time();
                $file_name=$project_desc->title.'_'.$time.rand(1,100);
                $path = $request->file('img')->storeAS('img', $file_name, 'public');
                $project_desc->img = $path;   
                
            }
        endif;
            $project_desc->order = $request->input('order'); 
            $project_desc->save(); 

            return redirect()->route('project_details', $project_desc->project_id);
        }

        $data['edit'] = 1;
        return view('projDetails.pDForm',$data);

    }

    /********** DELETE PROJECT Detail ********/
    public function delete_p_detail($id)
    {
        $deleted_project_desc = $this->pdesc->find($id)->delete();
        return back();
    }

}