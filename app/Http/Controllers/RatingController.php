<?php

namespace App\Http\Controllers;

use App\Rating;
use Illuminate\Http\Request;

class RatingController extends Controller
{
    public function index()
    {
        $rate=Rating::all();
        return $rate;
    }
    //storing data or POST
    public function store(Request $request)
    {
        $request->validate([
            "rate"=>"required|numeric",
        ]);
        // $rate=Rating::create($request->all());
        // $response=[
        //     "Rating"=>$rate
        // ];
        // return response($response,201);
        return Rating::create($request->all());
    }
    // Get using  Id
    public function show($id)
    {
        return Rating::find($id);
    }
    // Put
    public function update(Request $request, $id)

    {
        $request->validate([
            "rate"=>"required|numeric",
        ]);
        $rate=Rating::find($id);
        $rate->update($request->all());
        return $rate;
    }
    // delete
    public function destroy($id)
    {
        return Rating::destroy($id);
    }
}
