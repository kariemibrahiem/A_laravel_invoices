<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Tags;
use Illuminate\Http\Request;

class TagsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tags = Tags::all();
        $rooms = Room::all();
        return view("tag&facility/tags" , compact("tags" , "rooms"));
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
        Tags::create([
            "tag_name"=>$request->tag_name,
            "room_id"=>$request->room_id
        ]);
        return redirect("/tags");
    }

    /**
     * Display the specified resource.
     */
    public function show(Tags $tags)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tags $tags)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tags $tags)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id )
    {

        Tags::destroy($id);
        return redirect("/tags");
    }
}
