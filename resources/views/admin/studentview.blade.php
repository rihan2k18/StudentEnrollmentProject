@extends('layout')

@php

	//department er value k naame convert kora hosse...

	function convert_department($value){

		$values = [

			1=>'CSE',
			2=>'BBA',
			3=>'EEE',
			4=>'ECE',
		];

		return $values[$value];
	}

@endphp
@section('content')

	

          <div class="row user-profile">
            <div class="col-lg-12 side-left">
              <div class="card mb-4">
                <div class="card-body avatar">
                  <h2 class="card-title">Info</h2>
                  <img src="{{ URL::to($student_description_profile->student_image) }}" alt="">
                  <p class="name">{{ $student_description_profile->student_name }}</p>
                  <p class="designation">-  {{ $student_description_profile->student_roll }}  -</p>
                  <a class="email" href="#">{{ $student_description_profile->student_email }}</a>
                  <a class="number" href="#">{{ $student_description_profile->student_phone }}</a>
                </div>
              </div>
              <div class="card mb-4">
                <div class="card-body overview">
                  <ul class="achivements">
                    <h2 style="color: maroon;font-family: cursive;font-weight: bolder;">Daffodil International University</h2>
                  </ul>
                  <div class="wrapper about-user">
                    <h2 class="card-title mt-4 mb-3">About</h2>
                    <p>All Information are given below....</p>
                  </div>
                  <div class="info-links">
                    <a class="website">
                      <i class="icon-globe icon">Father's Name: </i>
                      <span style="font-family: vernada; font-size: 14px;">{{ $student_description_profile->student_fathersname }}</span>
                    </a>
                    
                    <a class="website">
                      <i class="icon-globe icon">Mother's Name: </i>
                      <span style="font-family: vernada; font-size: 14px;">{{ $student_description_profile->student_mothersname }}</span>
                    </a>
                   
                    <a class="website">
                      <i class="icon-globe icon">Student's Adress: </i>
                      <span style="font-family: vernada; font-size: 14px;">{{ $student_description_profile->student_adress }}</span>
                    </a>

                    <a class="website">
                      <i class="icon-globe icon">Student's Department: </i>
                      <span style="font-family: vernada; font-size: 14px;">{{ convert_department($student_description_profile->student_department )}}</span>
                    </a>

                    <a class="website">
                      <i class="icon-globe icon">Student's AdmissionYear </i>
                      <span style="font-family: vernada; font-size: 14px;">{{ $student_description_profile->student_admissionyear }}</span>
                    </a>

                  
                  </div>
                </div>
              </div>
            </div>
    
          </div>
     



@endsection