<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Redirect;

use DB;

use Session;

session_start();

class AllstudentsController extends Controller


{
	//all student k show koranor jonno....


    public function allstudent(){

    	$allstudent_info = DB::table('student_tbl')->get();

    	$manage_student = view('admin.allstudent')
    					  ->with('all_student_info',$allstudent_info);

    	return view('layout')->with('allstudent',$manage_student);


		//return view('admin.allstudent');

	}




	//Delete Student korar kaaj.....

	 public function studentdelete($student_id){


	 	DB::table('student_tbl')
	 		->where('student_id',$student_id)
	 		->delete();

	 	return Redirect::to('/allstudent');
    	

	}


	

	//Student View korar jonno........


	public function viewstudent($student_id){

		//return view('/admin.studentview');

		$student_description_view = DB::table('student_tbl')
								  ->select('*')
								  ->where('student_id',$student_id)
								  ->first();

				/*echo "</pre>";
				print_r($student_description_view);
				echo "</pre>";*/

		$manage_description_student = view('admin.studentview')
									->with('student_description_profile',$student_description_view);

		return view('layout')
			   ->with('studentview',$manage_description_student);


	}




	//Student edit korar jonnno.....

	 public function studentedit($student_id){


	 
		$student_description_view = DB::table('student_tbl')
								  ->select('*')
								  ->where('student_id',$student_id)
								  ->first();
				


		$manage_description_student = view('admin.student_edit')
									->with('student_description_profile',$student_description_view);

		return view('layout')
			   ->with('student_edit',$manage_description_student);
    	

	}


	//edit a view korar por update korar jonno......

	public function studentupdate(Request $request, $student_id){

		$data = array();

		$data['student_name']          = $request->student_name;
		$data['student_roll']          = $request->student_roll;
		$data['student_fathersname']   = $request->student_fathersname;
		$data['student_mothersname']   = $request->student_mothersname;
		$data['student_email']         = $request->student_email;
		$data['student_phone']         = $request->student_phone;
		$data['student_adress']        = $request->student_adress;
		$data['student_password']      = $request->student_password;
		$data['student_admissionyear'] = $request->student_admissionyear;


		DB::table('student_tbl')
			->where('student_id',$student_id)
			->update($data);

		Session::put('exception', 'Student information updated successfully!!');
		return Redirect::to('/allstudent');
		
	}

	//student nije taar profile update korbe....


	public function student_own_update(Request $request){

		$student_id = Session::get('student_id');
		$data = array();

	
		$data['student_phone']         = $request->student_phone;
		$data['student_adress']        = $request->student_adress;
		$data['student_password']      = $request->student_password;
		


		DB::table('student_tbl')
			->where('student_id',$student_id)
			->update($data);

		Session::put('exception', 'Student information updated successfully!!');
		return Redirect::to('/student_setting');
		
	}



}
