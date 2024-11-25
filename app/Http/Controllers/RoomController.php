<?php

namespace App\Http\Controllers;

use App\Models\Hotels;
use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rooms = Room::all();
        $hotels = Hotels::all();
        return view("rooms.rooms" , compact("rooms" , "hotels"));
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
        Room::create([
            "room_num"=>$request->room_number,
            "status"=>1,
            "res_status"=>0,
            "book_price"=>$request->booking_price,
            "hotels_id"=>$request->hotel_id,
        ]);
        return redirect("/rooms");
    }

    /**
     * Display the specified resource.
     */
    public function show(Room $room)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function updateStatus($id )
    {
        $room = Room::find($id);
        $room->status = !$room->status;
        $room->save();
        return redirect("/rooms");
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Room $room)
    {

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Room $room)
    {
        //
    }
}
