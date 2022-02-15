<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\project as Project;
use App\projectdesc as ShowProject;
use SebastianBergmann\CodeCoverage\Report\Xml\Project as SebastianBergmannProject;

class ShowPController extends Controller
{
    //
    public function __construct(ShowProject $show_project, Project $project)
    {
        $this->project = $project;
        $this->show_project = $show_project;
    }

    public function show_details($project_id)
    {
        $project = $this->project->find($project_id);

        $project_details = $this->show_project->get_project_details($project_id);

        $data = [];
        $data['project_name'] = $project->name;
        $data['main_img'] = $project->main_img;
        $data['p_description'] = $project->description;
        $data['p_url'] = $project->url;
        $data['project_details'] = $project_details;
        
        return view('projDetails.show', $data);
    }
}
