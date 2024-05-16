<?php

namespace App\Http\Controllers;
use App\Models\Place;
use Illuminate\Support\Facades\DB;
use App\Models\Packet;
use Illuminate\Http\Request;

class PacketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }
    public function getplacename(){
        $packet = DB::select("
            SELECT 
                tour_packet.*,
                place.place_name
            FROM 
                tour_packet
            JOIN 
                place ON tour_packet.id_place = place.id_place
        ");
        return view('users.home', compact('packet'));
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
    public function show(Packet $packet)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Packet $packet)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Packet $packet)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Packet $packet)
    {
        //
    }
}
