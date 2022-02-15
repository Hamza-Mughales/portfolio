<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\menu as Navbar;
use Illuminate\Support\Facades\Redirect;

class MenuController extends Controller
{
    //
    public function __construct(Navbar $navbar)
    {
        $this->navbar = $navbar;
    }


//********** SHOW NAV FUNCTION *******/

    public function showNav(Request $request)
    {
        $Navbar = [];
        $Navbar['navs'] = Navbar::all();
        
        // set a session
        $request->session()->put('name', 'hamza saeed' );

        return view('menu.menu', $Navbar);
    }


//********** CREATE NAV FUNCTION *******/

    public function newNav(Request $request, Navbar $navbar)
    {
        $data = [];

        $data['name'] = $request->input('name');
        $data['url'] = $request->input('url');
        $data['order'] = $request->input('order');
        $data['parent'] = $request->input('parent');

        if ($request->isMethod('post')) 
        {
            $this->validate(
                $request,
                [
                    'name' => 'required',
                    'url' => 'required'
                ]
            );

            $navbar->insert($data);

            return Redirect('navbar');
        }

        $data['edit'] = 0;
        return view('menu.menuform', $data);
    }


//********** EDIT NAV FUNCTION *******/

    public function editNav(Request $request, $nav_id)
    {
        
        $nav = $this->navbar->find($nav_id);

        $data = [];            
        $data['nav_id'] = $nav->id;
        $data['name'] = $nav->name;
        $data['url'] = $nav->url;
        $data['order'] = $nav->order;
        $data['parent'] = $nav->parent;

        if ($request->isMethod('post')) 
        {
            $this->validate(
                $request,
                [
                    'name' => 'required',
                    'url'  => 'required'
                ]
            );

            $navbar_data = $this->navbar->find($nav_id);
            
            $navbar_data->name = $request->input('name');
            $navbar_data->url = $request->input('url');
            $navbar_data->order = $request->input('order');
            $navbar_data->parent = $request->input('parent');

            $process = $navbar_data->save();

            return redirect('navbar');
        }

        $data['edit'] = 1;
        return view('menu.menuform', $data);
    }


    //********** DELETE NAV FUNCTION *******/

    public function deleteNav($nav_id)
    {
        $deleted_nav = $this->navbar->find($nav_id)->delete();
        return Redirect('navbar');
    }
}
