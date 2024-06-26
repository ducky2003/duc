<?php

namespace App\Http\Controllers;
use App\Models\rate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class RateController extends Controller
{
    public function store(Request $request){
        if(Auth::check()){
            $request->validate([
                'rating' => 'required|integer|min:1|max:5',
                'id_pack' => 'required|integer'
            ]);
            $rate = new rate();
            $rate->rating = $request->rating;
            $rate->id_pack = $request->id_pack;
            $rate->save();
            return redirect()->back()->with('message', 'Thank you for your rating!');
        }
        
    }
}
