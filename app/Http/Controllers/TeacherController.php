<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use DB;
use Session;
session_start();

class TeacherController extends Controller
{
    
	//all teacher show kora hosse...

    public function allteacher(){

		$alteacher_info = DB::table('teachers_tbl')->get();

    	$manage_teacher = view('admin.allteacher')
    					  ->with('all_teacher_info',$alteacher_info);

    	return view('layout')->with('allteacher',$manage_teacher);
	}







	public function addteacher(){

		return view('admin.add_teacher');

	}

	//teacher add korar jonno....

	public function saveteacher(Request $request){

		$data = array(); //array akare every field dhora.....

		$data['teachers_name']           = $request->teachers_name;
		$data['teachers_phone']          = $request->teachers_phone;
		$data['teachers_adress']         = $request->teachers_adress;
		$data['teachers_department']     = $request->teachers_department;
	

		$image                           = $request->file('teachers_image');

		if($image){

			$image_name = str_random(20);

			$ext = strtolower($image->getClientOriginalExtension());

			$image_full_name = $image_name.'.'.$ext;

			$upload_path = 'image/';

			$image_url = $upload_path.$image_full_name;

			$success = $image->move($upload_path,$image_full_name);


			if($success){

				$data['teachers_image'] = $image_url;

				DB::table('teachers_tbl')->insert($data);
				Session::put('exception', 'teachers added successfully!!');
				return Redirect::to('/addteacher');
			}
		}

			$data['image']=$image_url;

				DB::table('teachers_tbl')->insert($data);
				Session::put('exception', 'teachers added successfully!!');
				return Redirect::to('/addteacher');


			DB::table('teachers_tbl')->insert($data);
			Session::put('exception', 'teachers added successfully!!');
			return Redirect::to('/addteacher');


	

	}



	//all teacher shows are here......

	 public function allstudent(){

    	$allstudent_info = DB::table('student_tbl')->get();

    	$manage_student = view('admin.allstudent')
    					  ->with('all_student_info',$allstudent_info);

    	return view('layout')->with('allstudent',$manage_student);


		

	}


}
