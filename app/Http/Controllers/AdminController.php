<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use App\Admin;
use Laravel\Sanctum\HasApiTokens;

class AdminController extends Controller
{
    public function index()
    {
        $admin=Admin::all();
        return $admin;
    }
    //storing data or POST
    public function store(Request $request)
    {
        $request->validate([
            "name"=>"required|string|unique:admin,name",
            "phone"=>"required|string|min:10|max:22|unique:admin,phone",
            "image"=>"required|string|max:230",
            "email"=>"required|string|min:14|max:250|unique:admin,email",
            "password"=>"required|string",
            "role"=>"required|numeric",
        ]);
        // $admin=Admin::create($request->all());
        // $response=[
        //     "Admin"=>$admin
        // ];
        // return response($response,201);
         $admin=Admin::create([
            "name"=>$request['name'],
            "phone"=>$request['phone'],
            "image"=>$request['image'],
            "email"=>$request['email'],
            "role"=>$request['role'],
            "password"=>bcrypt($request['password']),
        ]);
        $token=$admin->createToken("userToken")->plainTextToken;
        $response=[
            "admin"=>$admin,
            "admin Token"=>$token
        ];
        return response($response,202);

    }
    // Get using  Id
    public function show($id)
    {
        return Admin::find($id);
    }
    // Put
    public function update(Request $request, $id)

    {
        $request->validate([
            "name"=>"required|string|unique:admin,name",
            "phone"=>"required|string|min:10|max:22|unique:admin,phone",
            "image"=>"required|string|max:230",
            "email"=>"required|string|min:14|max:250|unique:admin,email",
            "password"=>"required|string",
            "role"=>"required|numeric",
        ]);
        $admin=Admin::find($id);
        $admin->update($request->all());
        return $admin;
    }
    public function loginAdmin(Request $request){
        $fileds=$request->validate([
            "email"=>"required|string",
            "password"=>"required|string",
        ]);
        $admin=admin::where("email",$fileds['email'])->first();
        if(!$admin || !$fileds['password']){
            return response([
                "message"=>"incorrect Password|Eamil"
            ],401);
        }
        $token=$admin->createToken("userToken")->plainTextToken;
        $response=[
            "admin"=>$admin,
            "admin Token"=>$token
        ];
        return response($response,201);
    }
    // delete
    public function destroy(Request $request)
    {
        $request->admin()->tokens()->delete();
        return response()->json(['done' => true]);
    }
}

