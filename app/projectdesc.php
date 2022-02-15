<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class projectdesc extends Model
{
    // 

    public function get_project_details($project_id)
    {
        $project_details = DB::table('projectdescs')
                                    ->where('project_id', $project_id)
                                    ->orderBy('order')
                                    ->get();

        return $project_details;
    }
}
