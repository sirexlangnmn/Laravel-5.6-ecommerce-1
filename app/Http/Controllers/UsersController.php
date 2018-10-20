<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("frontend_views.modules.login_register_page");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        if($request->isMethod('post')){
            $data = $request->All();

            // check if user already exist
            $emailCount = User::where('email',$data['email'])->count();
            if($emailCount > 0){
                return redirect()->back()->with('flash_message_error','Email already exist.');
            }

            // check if user already exist
            $nameCount = User::where('name',$data['name'])->count();
            if($nameCount > 0){
                return redirect()->back()->with('flash_message_error','Name already exist.');
            }

            $user = new User;
            $user->name     = $data['name'];
            $user->email    = $data['email'];
            $user->password = $data['password'];
            $user->save();

            return redirect()->back()->with('flash_message_success','Registered successfully.');
        }
    }

    public function checkEmail(Request $request){
        $data = $request->All();

        // check if user already exist
        $emailCount = User::where('email',$data['email'])->count();
        if($emailCount > 0){
            echo "false";
        }
        else{
            echo "true"; die;
        }
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
