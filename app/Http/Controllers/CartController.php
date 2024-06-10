<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use App\Models\PreOrder;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function getOrderCount()
    {
        if (Auth::check()) {
            return PreOrder::where('user_id', Auth::id())->count();
        }
        return 0;
    }
    public function showCart()
    {
        if (Auth::check()) {
            $orders = PreOrder::with('tour')->where('user_id', Auth::id())->get();
            return view('cart', ['orders' => $orders]);
        } else {
            return redirect()->route('login')->with('error', 'Vui lòng đăng nhập để xem giỏ hàng');
        }
    }
    public function cancel($id)
    {
        $order = PreOrder::findOrFail($id);
        $order->delete();

        return redirect()->back()->with('success', 'Đơn đặt trước đã được hủy thành công.');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cart $cart)
    {
        //
    }
}
