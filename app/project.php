<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class project extends Model
{
    //
    function get_projects()
    {
        return  DB::table('projects')
                ->orderBy('order')
                ->get();

    }
}
