<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\skill as Skill;
use Illuminate\Support\Facades\Redirect;

class SkillsController extends Controller
{
    //
    public function __construct(Skill $skill)
    {
        $this->skill = $skill;
    }


//********** SHOW Skill FUNCTION *******/

    public function showSkills()
    {
        $skills = [];
        $skills['skills'] = $this->skill->get_skills();
        return view('skills.skills', $skills);
    }


/********** CREATE SKILL FUNCTION ********/

    public function addSkill(Request $request, Skill $skill)
    {
        $data = [];

        $data['name'] = $request->input('name');
        $data['percentage'] = $request->input('percentage');
        $data['order'] = $request->input('order');
        $data['type'] = $request->input('type');

        if ($request->isMethod('post')) 
        {
            $this->validate(
                $request,
                [
                    'name' => 'required',
                    'percentage' => 'required',
                ]
            );

            $skill->insert($data);

            return Redirect('skills');
        }

        $data['edit'] = 0;
        return view('skills.skillsform', $data);
    }


/********** EDIT SKILL FUNCTION ********/

    public function editSkill(Request $request, $skill_id)
    {
        
        $skill = $this->skill->find($skill_id);

        $data = [];            
        $data['skill_id'] = $skill->id;
        $data['name'] = $skill->name;
        $data['percentage'] = $skill->percentage;
        $data['order'] = $skill->order;
        $data['type'] = $skill->type;

        if ($request->isMethod('post')) 
        {
            $this->validate(
                $request,
                [
                    'name' => 'required',
                    'percentage' => 'required',
                ]
            );

            $skill_data = $this->skill->find($skill_id);
            
            $skill_data->name = $request->input('name');
            $skill_data->percentage = $request->input('percentage');
            $skill_data->order = $request->input('order');
            $skill_data->type = $request->input('type');

            $process = $skill_data->save();

            return redirect('skills');
        }

        $data['edit'] = 1;
        return view('skills.skillsform', $data);
    }


    /********** DELETE SKILL FUNCTION ********/

    public function deleteSkill($skill_id)
    {
        $deleted_skill = $this->skill->find($skill_id)->delete();
        return Redirect('skills');
    }
}
