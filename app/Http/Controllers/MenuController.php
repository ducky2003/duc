<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index(){
        $menu = Menu::paginate(5);
        return view('admin.menu.index', compact('menu'));
    }
    public function destroy($id){
        $menu = Menu::findOrFail($id);
        $menu -> delete();
        return redirect('admin/menu');
    }
    public function create(){
        
        return view('admin.menu.create');
    }
    public function store(Request $request){
        Menu::create([
            'menu_name' => $request->menu_name,
            'route' => $request->route,
            'isActive' => $request->isActive
        ]);
        return redirect('admin/menu');
        }
}
