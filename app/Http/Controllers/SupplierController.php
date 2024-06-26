<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Supplier;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function index(){
        $supplier = Supplier::paginate(5);
        return view('admin.supplier.index', ['supplier'=>$supplier]);
    }
    public function create(){
        return view('admin.supplier.create');
    }
    public function store(Request $request){
        $rule = [
            'supp_name' => 'required|max:50',
            'isActive' => 'required',
            'supp_location' => 'nullable',
            'hotline' => 'required|max:11',
            'email' => 'required|max:50',
            'supp_desc' => 'nullable',
        ];
        $message = [
            'supp_name.required' => 'Tối đa 50 ký tự',
            'isActive.required' => 'Vui lòng chọn trạng thái',
            'hotline' => ' Số điện thoại tối đa 11 ký tự',
            'email' => 'tối đa 50 ký tự'
        ];
        $request->validate($rule, $message);
        Supplier::create([
            'supp_name' => $request->supp_name,
            'isActive' => $request->isActive,
            'supp_location' => $request->supp_location,
            'hotline' => $request->hotline,
            'email' => $request->email,
            'supp_desc' => $request->supp_desc
        ]);
        
        return redirect('admin/supplier');
    }
    public function edit($id){
        $supplier = Supplier::find($id);
        return view('admin.supplier.edit', ['supplier'=>$supplier]);
    }
    public function update(Request $request, $id){
        $rule = [
            'supp_name' => 'required|max:50',
            'isActive' => 'required',
            'supp_location' => 'nullable',
            'hotline' => 'required|max:11',
            'email' => 'required|max:50',
            'supp_desc' => 'nullable',
        ];
        $message = [
            'supp_name.required' => 'Tối đa 50 ký tự',
            'isActive.required' => 'Vui lòng chọn trạng thái',
            'hotline' => ' Số điện thoại tối đa 11 ký tự',
            'email' => 'tối đa 50 ký tự'
        ];
        $request->validate($rule, $message);
        $supp = Supplier::findOrFail($id);
        $supp->update([
            'supp_name' => $request->supp_name,
            'isActive' => $request->isActive,
            'supp_location' => $request->supp_location,
            'hotline' => $request->hotline,
            'email' => $request->email,
            'supp_desc' => $request->supp_desc
        ]);
        
        return redirect('admin/supplier');
    }
    public function destroy($id){
        $supplier = Supplier::findOrFail($id);
        $supplier->delete();
        return redirect('admin/supplier');
    }
}
