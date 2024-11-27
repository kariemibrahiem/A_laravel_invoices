<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Facilities;
use App\Models\Room;
use App\Models\Tags;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Booking::all();
        return view("booking.booking" , compact("books" ));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $rooms = Room::where("res_status" , 0 )->where("status" , 1)->get();
        $tags = Tags::all();
        $facilities = Facilities::all();
        return view("booking.create_book" , compact("rooms" , "tags" , "facilities"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $facility = Facilities::find($request->facility_id);
        $room = Room::find($request->room_id);
        Booking::create([
            "booking_name" => $request->booking_name,
            "booking_number"=> $request->booking_number,
            "guest_name" => $request->guest_name,
            "guest_number" => $request->guest_number,
            "check_in_date" => $request->check_in,
            "check_out_date" => $request->check_out,
            "facility_name"=> $facility->facility_name,
            "room_id" => $request->room_id,
            "total_price" => $request->total_price,
            "net_price" => $request->net_price,
            "status"=> 1,
            "user_id"=>Auth::user()->id,
            "hotel_id"=>$room->hotels_id
        ]);
        $room = Room::find($request->room_id);
        $room->res_status = 1;
        $room->save();
        return redirect("/booking");
    }

    /**
     * Display the specified resource.
     */
    public function show(Booking $booking)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Booking $booking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Booking $booking)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Booking $booking)
    {
        //
    }
}
