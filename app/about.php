<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules\Exists;

class about extends Model
{
    //

    public function get_about()
    {
        return DB::table('abouts')->get()->last();
    }

    public function download_cv($file)
    {
        $file_path = asset('/storage'."/".$file);
                  
        if($file_path)
        {
            return Storage::download($file_path,'Hamza_cv');
        } 
        else 
        {
            return 'Sorry, there were none file until now!';
        }
    }
}
