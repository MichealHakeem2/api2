<?php

namespace App\Http\Controllers;

use App\Levels;
use Illuminate\Http\Request;

class LevelsController extends Controller
{
    public function index()
    {
        $lvl=Levels::all();
        return $lvl;
    }
    //storing data or POST
    public function store(Request $request)
    {
        $request->validate([
            "title"=>"required|string|min:12|max:250",
        ]);
        // $lvl=Levels::create($request->all());
        // $response=[
        //     "Levels"=>$lvl
        // ];
        // return response($response,201);
        return Levels::create($request->all());
    }
    // Get using  Id
    public function show($id)
    {
        return Levels::find($id);
    }
    // Put
    public function update(Request $request, $id)

    {
        $request->validate([
            "title"=>"required|string|min:12|max:250",
        ]);
        $lvl=Levels::find($id);
        $lvl->update($request->all());
        return $lvl;
    }
    // delete
    public function destroy($id)
    {
        return Levels::destroy($id);
    }
}
