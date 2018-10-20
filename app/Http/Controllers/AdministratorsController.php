<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;  // to check hash password
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\User;
use Session;

/*
|--------------------------------------------------------------------------
| Note
|--------------------------------------------------------------------------
| 1. This Admin fall under User Table
|
| 2. flash_message_error working only in redirect.
| 
| 3. Go to app\Http\Middleware\RedrectIfAuthenticated.php and config the file
|    Include your route inside Route::group to avoid bypassing the url.
|    And add this on top "use Illuminate\Support\Facades\Auth;"
|
*/


class AdministratorsController extends Controller
{
    public function login(Request $request)
    {
        if($request->isMethod('post'))
        {
            $data = $request->input();
            if(Auth::attempt(['email' => $data['email'],'password' => $data['password'],'admin' => ['1']]))
            {
                /*Session::put('adminSession', $data['email']);*/
                return redirect('/admin/dashboard'); 
            }
            else
            {
                return redirect('/admin/admin-login-page')->with('flash_message_error', 'Invalid Email or Password');
            }
        
        }
        else
        {
            return view('auth.admin_login_page');
        }
    }

    
    public function dashboard(){
        return view('backend_views.modules.dashboard_page');
    }


    public function settings(){
        return view('backend_views.modules.settings_page');
    }


    /*I guess it is not need*/
    public function checkPassword(Request $request){
        $data = $request->all();
        //echo "<pre>"; print_r($data); die;
        $current_password = $data['current_pwd'];
        $check_password = User::where(['admin'=>'1'])->first();
            if (Hash::check($current_password, $check_password->password)) {
                //echo '{"valid":true}';die;
                echo "true"; die;
            } else {
                //echo '{"valid":false}';die;
                echo "false"; die;
            }

    }


    public function updatePassword(Request $request)
    {   
        if ($request->isMethod('post'))
        {
            $data = $request->all();
            $check_password = User::where([ 'email'=>Auth::user()->email ])->first();
            $current_password = $data['current_pwd'];

            if(Hash::check($current_password, $check_password->password))
            {
                $password = bcrypt($data['new_pwd']);
                User::where('admin','1')->update( ['password'=>$password] ); 
                return redirect('/admin/settings')->with('flash_message_success', 'Password update successfully');
            }
            else
            {
                return redirect('/admin/settings')->with('flash_message_error', 'Incorrect current password');
            }
        } 
    }


    public function logout(){
        Session::flush();
        return redirect('/admin/admin-login-page')->with('flash_message_error', 'Logged out Successfully');
    }
    
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
