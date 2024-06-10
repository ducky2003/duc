<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\PreOrder;
use Illuminate\Http\Request;

class PreOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $order = PreOrder::with('user')->paginate(8);
        return view ('admin.order.index', compact('order'));
    }
    public function placeOrder(Request $request)
    {
        PreOrder::create([
            'date_order' => now(),
            'note' => $request->input('note'),
            'user_id' => $request->input('id'),
            'id_pack' => $request->input('id_pack')
        ]);
    

        return redirect()->route('users.home')->with('success', 'Đặt hàng thành công!');
    }
    public function cancel($id)
    {
        $order = PreOrder::findOrFail($id);
        $order->delete();

        return redirect()->back()->with('success', 'Đơn đặt trước đã được hủy thành công.');
    }
    public function getOrderCount()
    {
        if (Auth::check()) {
            return PreOrder::where('user_id', Auth::id())->count();
        }
        return 0;
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(PreOrder $preOrder)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $order = PreOrder::findOrFail($id);
        return view('admin.order.edit', compact(['order']));
    }
    public function update(Request $request, $id){
        $rule = [
            'state' => 'required',
        ];
        $message = [
            'state' => 'Trạng thái không được bỏ trống'
        ];
        $request->validate($rule, $message);
        $order = PreOrder::findOrFail($id);
        
        $order->update([
            'state' => $request->state,
            
        ]);
        return redirect('admin/order');
    }
    /**
     * Update the specified resource in storage.
     */

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PreOrder $preOrder)
    {
        //
    }
}
