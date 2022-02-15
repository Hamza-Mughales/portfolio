<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class skill extends Model
{
    //
    public function get_skills()
    {
        return DB::table('skills')->orderBy('order')->get();
    }
}
