<?php

namespace App\Http\Controllers;

use App\Courses;
use Illuminate\Http\Request;

class CoursesController extends Controller
{
    public function index()
    {
        $cour=Courses::all();
        return $cour;
    }
    //storing data or POST
    public function store(Request $request)
    {
        $request->validate([
            "name"=>"required|string|min:5|max:200",
            "link"=>"required|string|min:10|max:250",
            "image"=>"required|string|min:10|max:122",
        ]);
        // $cour=Courses::create($request->all());
        // $response=[
        //     "Courses"=>$cour
        // ];
        // return response($response,201);
        return Courses::create($request->all());
    }
    // Get using  Id
    public function show($id)
    {
        return Courses::find($id);
    }
    // Put
    public function update(Request $request, $id)

    {
        $request->validate([
            "name"=>"required|string|min:5|max:200",
            "link"=>"required|string|min:10|max:250",
            "image"=>"required|string|min:10|max:122",
        ]);
        $cour=Courses::find($id);
        $cour->update($request->all());
        return $cour;
    }
    // delete
    public function destroy($id)
    {
        return Courses::destroy($id);
    }
}
