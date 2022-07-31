<?php

namespace App\Http\Controllers;

use App\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $stud=Student::all();
        return $stud;
    }
    //storing data or POST
    public function store(Request $request)
    {
        $request->validate([
            "name"=>"required|string|unique:students,name",
            "phone"=>"required|string|min:10|max:22|unique:students,phone",
            "collage"=>"required|string|max:22",
            "image"=>"required|string|max:230",
            "email"=>"required|string|min:14|max:250|unique:students,email",
            "password"=>"required|string",
        ]);
        // $stud=Student::create($request->all());
        // $response=[
        //     "Student"=>$stud
        // ];
        // return response($response,201);
        return Student::create($request->all());
    }
    // Get using  Id
    public function show($id)
    {
        return Student::find($id);
    }
    // Put
    public function update(Request $request, $id)

    {
        $request->validate([
            "name"=>"required|string|unique:students,name",
            "phone"=>"required|string|min:10|max:22|unique:students,phone",
            "collage"=>"required|string|max:22",
            "image"=>"required|string|max:230",
            "email"=>"required|string|min:14|max:250|unique:students,email",
            "password"=>"required|string",
        ]);
        $stud=Student::find($id);
        $stud->update($request->all());
        return $stud;
    }
    // delete
    public function destroy($id)
    {
        return Student::destroy($id);
    }
}

