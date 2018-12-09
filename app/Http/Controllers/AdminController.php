<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

use Illuminate\Support\Facades\Redirect;

use Session;

session_start();




class AdminController extends Controller
{
	public function admin_dashboard(){

		return view('admin.dashboard');

	}
    
    //ekhane student login er kaaj kora holo...

    public function student_dashboard(){

        return view('student.dashboard');

    }
    
    






    //login dashboard option for admin....


    public function login_dashboard(Request $request){  //admin login koranor jonno ...

    	//return view('admin.dashboard');

    	$email = $request->admin_email;

    	$password = md5($request->admin_password);

    	$result = DB::table('admin_tbl')

    	->where('admin_email',$email)
    	->where('admin_password',$password)
    	->first();

    /*	echo "</pre>";
    	print_r($result);
	*/


    	if($result){

    		Session::put('admin_email', $result->admin_email);
    		Session::put('admin_id', $result->admin_id);
    		return Redirect::to('/admin_dashboard');
    		
    	}else{

    		Session::put('exception', 'Email or password invalid');
    		return Redirect::to('/backend');
    	}
    }


    //logout option for admin......

    public function logout()
    {
        Session::put('admin_name', null);
        Session::put('admin_id', null);

        return Redirect::to('/backend');
    }

    //student logout part are here

      public function student_logout()
    {
        Session::put('student_name', null);
        Session::put('student_id', null);

        return Redirect::to('/');
    }


    //view profile part are here ....

    public function viewprofile(){

        return view('admin.view');

    }
    

    //Setting part....that means udate password....

    public function setting(){

        return view('admin.setting');

    }

    //student settings are here.... 

     public function student_setting(){

        

        $student_id = Session::get('student_id');
     
        $student_description_view = DB::table('student_tbl')
                                  ->select('*')
                                  ->where('student_id',$student_id)
                                  ->first();
                


        $manage_description_student = view('student.student_setting')
                                    ->with('student_description_profile',$student_description_view);

        return view('student_layout')
               ->with('student_edit',$manage_description_student);
        

    

    }



    //student login portion are here...

     public function student_login_dashboard(Request $request){  //admin login koranor jonno ...

        //return view('admin.dashboard');

        $email = $request->student_email;

        $password = md5($request->student_password);

        $result = DB::table('student_tbl')

        ->where('student_email',$email)
        ->where('student_password',$password)
        ->first();

    /*  echo "</pre>";
        print_r($result);
    */


        if($result){

            Session::put('student_email', $result->student_email);
            Session::put('student_id', $result->student_id);
            return Redirect::to('/student_dashboard');
            
        }else{

            Session::put('exception', 'Email or password invalid');
            return Redirect::to('/');
        }
    
    }
    
}
