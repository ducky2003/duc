<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Region;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $menu = Menu::where('id_menu','1')->orderby('id_menu','asc')->get();
        return view('home', ['menu' => $menu]);

        /*$region = Region::orderBy('id_region','asc')->get();
        return view('home', ['region' => $region]);*/
    }

    public function index2()
    {
        return view('admin.admin_home');
    }
}
