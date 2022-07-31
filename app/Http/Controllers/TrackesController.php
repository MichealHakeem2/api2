<?php

namespace App\Http\Controllers;

use App\Trackes;
use Illuminate\Http\Request;

class TrackesController extends Controller
{
    public function index()
    {
        $trac=Trackes::all();
        return $trac;
    }
    //storing data or POST
    public function store(Request $request)
    {
        $request->validate([
            "title"=>"required|string|min:12|max:200",
            "description"=>"required|string|min:20|max:250",
        ]);
        // $trac=Trackes::create($request->all());
        // $response=[
        //     "Trackes"=>$trac
        // ];
        // return response($response,201);
        return Trackes::create($request->all());
    }
    // Get using  Id
    public function show($id)
    {
        return Trackes::find($id);
    }
    // Put
    public function update(Request $request, $id)

    {
        $request->validate([
            "title"=>"required|string|min:12|max:200",
            "description"=>"required|string|min:20|max:250",
        ]);
        $trac=Trackes::find($id);
        $trac->update($request->all());
        return $trac;
    }
    // delete
    public function destroy($id)
    {
        return Trackes::destroy($id);
    }
}
