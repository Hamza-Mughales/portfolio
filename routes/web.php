<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


/************* MAIN SITE ********/
Route::get('/', 'ContentsController@index');
Route::get('/home', 'ContentsController@index');

/******  Send email route   *****/
Route::post('/sendemail/send','ContentsController@sendEmail')->name('sendmail');


Route::get('/register', function ()
{
    redirect('login');
});

/************* Show Project Details ********/

Route::get('/show/{porject_id}', 'ShowPController@show_details')->name('show_detil');

/************** All The Routes in Auth ******/
Route::middleware('auth')->group( function(){

/************* Dashboard Rout ********/
Route::get('/admin', 'AdminController@dashboard')->name('admin');

/********** Navbar Routes ********/
Route::get('/navbar', 'MenuController@showNav')->name('navbar');
Route::get('/navbar/add', 'MenuController@newNav')->name('add_nav');
Route::post('/navbar/add', 'MenuController@newNav')->name('create_nav');
Route::get('/navbar/edit/{nav_id}', 'MenuController@editNav')->name('edit_nav');
Route::post('/navbar/edit/{nav_id}', 'MenuController@editNav')->name('update_nav');
Route::get('/navbar/delete/{nav_id}', 'MenuController@deleteNav')->name('delete_nav');


/********** About Routes ********/
Route::get('/about', 'AboutController@showAbout')->name('about');
Route::get('/about/add', 'AboutController@addAbout')->name('add_about');
Route::post('/about/add', 'AboutController@addAbout')->name('create_about');
Route::get('/about/edit/{about_id}', 'AboutController@editAbout')->name('edit_about');
Route::post('/about/edit/{about_id}', 'AboutController@editAbout')->name('update_about');
Route::get('/about/delete/{about_id}', 'AboutController@deleteAbout')->name('delete_about');


/********** SKILLS Routes ********/
Route::get('/skills', 'SkillsController@showSkills')->name('skills');
Route::get('/skill/add', 'SkillsController@addSkill')->name('add_skill');
Route::post('/skill/add', 'SkillsController@addSkill')->name('create_skill');
Route::get('/skill/edit/{skill_id}', 'SkillsController@editSkill')->name('edit_skill');
Route::post('/skill/edit/{skill_id}', 'SkillsController@editSkill')->name('update_skill');
Route::get('/skill/delete/{skill_id}', 'SkillsController@deleteSkill')->name('delete_skill');


/********** PROJECTS Routes ********/
Route::get('/projects', 'ProjectController@showProjects')->name('projects');
Route::get('/project/add', 'ProjectController@addproject')->name('add_project');
Route::post('/project/add', 'ProjectController@addproject')->name('create_project');
Route::get('/project/edit/{project_id}', 'ProjectController@editproject')->name('edit_project');
Route::post('/project/edit/{project_id}', 'ProjectController@editproject')->name('update_project');
Route::get('/project/delete/{project_id}', 'ProjectController@deleteproject')->name('delete_project');

/*
Route::get('/project/test', function(){
    echo asset('storage/main_img/ojH1RMP5o74NrYGkM7rIBGxlJYA4erh5fXAkleWs.jpeg');
    $exists = Storage::disk('local')->exists('main_img/ojH1RMP5o74NrYGkM7rIBGxlJYA4erh5fXAkleWs.jpeg');
    var_dump($exists);
    //return Storage::download('main_img/ojH1RMP5o74NrYGkM7rIBGxlJYA4erh5fXAkleWs.jpeg');
});

/************* Project Details ********/

Route::get('/project/details/{project_id}', 'ProjectController@project_details')->name('project_details');
Route::get('/projectd/add/{project_id}', 'ProjectController@add_p_detail')->name('add_proj_details');
Route::post('/projectd/add/{project_id}', 'ProjectController@add_p_detail')->name('create_proj_details');
Route::get('/projectd/edit/{p_desc_id}', 'ProjectController@edit_p_detail')->name('edit_proj_details');
Route::post('/projectd/edit/{p_desc_id}', 'ProjectController@edit_p_detail')->name('update_proj_details');
Route::get('/projectd/delete/{p_desc_id}', 'ProjectController@delete_p_detail')->name('delete_proj_details');



});

Auth::routes();

// generate incryptted password
/* Route::get('/generate/password', function(){
    return bcrypt('123456');
}); */


