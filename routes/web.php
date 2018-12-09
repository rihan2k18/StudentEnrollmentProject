<?php


// Login Page Routes .....
Route::get('/', function () {
    return view('Student_Login');
});

Route::get('/backend', function () {
    return view('admin.admin_login');
});



//Logout Page Routes
Route::get('/logout','AdminController@logout');



//admin login route....
Route::post('/adminlogin','AdminController@login_dashboard');
Route::get('/admin_dashboard','AdminController@admin_dashboard');

//student login route...

Route::post('/studentlogin','AdminController@student_login_dashboard');
Route::get('/student_dashboard','AdminController@student_dashboard');









//AddStudent Route
Route::get('/addstudent','Addstudent@addstudent');
Route::post('/save_student','Addstudent@savestudent');

//DeleteStudent Route
Route::get('/student_delete/{student_id}','AllstudentsController@studentdelete');


//view one student info route...
Route::get('/studentview/{student_id}','AllstudentsController@viewstudent');



//see all students route....
Route::get('/allstudent','AllStudentsController@allstudent');



 //student edit route....
 Route::get('/student_edit/{student_id}','AllstudentsController@studentedit');
 Route::post('/update_student/{student_id}','AllstudentsController@studentupdate');














//tutionfees route.....
Route::get('/tutionfee','TutionController@tution');


//departmentwise route...
Route::get('/cse','CSEController@cse');
Route::get('/bba','BBAController@bba');
Route::get('/ece','ECEController@ece');
Route::get('/eee','EEEController@eee');
Route::get('/mba','MBAController@mba');




//teacher route option.....
Route::get('/allteacher','TeacherController@allteacher');

//add teacher route....
Route::get('/addteacher','TeacherController@addteacher');
Route::post('/save_teacher','TeacherController@saveteacher');




//View Profile r Settings er Route...
Route::get('/viewprofile','AdminController@viewprofile');
Route::get('/setting','AdminController@setting');



//student's functionality route.....

Route::get('/student_profile','Addstudent@studentprofile');

//student logout option....

Route::get('/student_logout','AdminController@student_logout');

//student setting route.....

Route::get('/student_setting','AdminController@student_setting');

//student own profile update.......

 Route::post('/student_own_update','AllstudentsController@student_own_update');
