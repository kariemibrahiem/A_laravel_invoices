<?php

namespace App\Http\Controllers;

use App\Models\Hotels;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HotelsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $hotels_1 = Hotels::with(['rooms.tags'])
            ->get()
            ->map(function ($hotel) {
                $hotel->total_tags = $hotel->rooms->flatMap(function ($room) {
                    return $room->tags;
                })->count();
                return $hotel;
            });

        $hotels = Hotels::all();
        return view("hotels.hotels" , compact("hotels" , "hotels_1"));
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


        Hotels::create([
            "hotel_name"=>$request->hotel_name,
            "user_id"=>Auth::user()->id,
        ]);
        return redirect("/hotels");
    }

    /**
     * Display the specified resource.
     */
    public function show(Hotels $hotels)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Hotels $hotels)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Hotels $hotels)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Hotels $hotels)
    {
        //
    }
}
