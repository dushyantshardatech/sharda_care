@extends('layout')
@section('page_title', 'Doctor Details')
@section('page-contents')

@if(isset($doctor_details))
@foreach($doctor_details as $doctor_detail)

<style>
 table {
    border: 0;
 }
 #checkname{
    margin: 20px 0 0 0;
    display: inline-block;
    padding: 10px 55px 10px 22px;
 }
 #checkname2{
    width: auto;
    float: left;
    padding: 5px 10px;
    margin: 15px 6px 0 0;
    color: #fff;
    border-radius: 5px;
}
.find-dc-list .contant .button1111:hover {
    background: #6c757d;
    color: #222;
}
</style> 
   
<div class="doc-detils">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="images">
                @if ($doctor_detail->DoctorProfilePic)
                        <img src="https://www.shardahospital.org/uploads/doctor/{{ $doctor_detail->DoctorProfilePic }}" alt="">
                @else
                    <img src="{{ asset('assets/images/doc.jpeg') }}" alt="" >
                @endif
                <button href="#" class="button1 button1111"  id="checkname" onclick="getValue(this.value)" data-bs-toggle="modal" data-bs-target="#bookappointment" value="{{ $doctor_detail->DoctorTitle }} {{ $doctor_detail->DoctorName }}">Book Appointment<span><i class="bi bi-arrow-right-short"></i></span></button >
                      <!-- <a href="#" class="button1" data-bs-toggle="modal" data-bs-target="#bookappointment">Book Appointment <span><i class="bi bi-arrow-right-short"></i></span></a> -->
                </div>
              
            </div>
            <div class="col-md-8">
                <div class="contant">
                    <h2> {{ $doctor_detail->DoctorTitle }} {{ $doctor_detail->DoctorName }}  </h2>
					<p style="text-align:justify;"> <span> {!! $doctor_detail->DoctorWorkExperience !!} </span></p>
                   
                   
                    <!-- <div class="ratingsec">
                        <i class="fa fa-star" aria-hidden="true"></i> 
                        <p>{{ $doctor_detail->rating }} <small>Patient Satisfaction Ratings </small> </p> 
                        <div class="clearfix"></div>
                    </div> -->
					 
                    </div>
                   

                   
                    
                    <div class="col-md-12">
               
                            <div class="information-contant-main">
                            <div class="information-contant" id="About">
                            <div class="heading-line">
                            <h4>About</h4>
                            </div>
                            {!! $doctor_detail->DoctorBriefProfile !!}	
                            
                            </div>
                            @if(isset($doctor_detail->DoctorWorkExperience))
                            <div class="information-contant" id="Experience">
                                    <div class="heading-line">
                                        <h4>Experience</h4>
                                    </div>
                                    <div class="listing-detail">
                                        <ul>
                                        {!! $doctor_detail->DoctorWorkExperience !!}
                                        </ul>
                                    </div>
                            </div>
                            @endif
                            <div class="information-contant" id="Languenge">
                            <div class="heading-line">
                            <h4>Languenge</h4>
                            </div>
                            <div class="listing-detail">
                            <ul>
                            	<li>{!! $doctor_detail->DoctorLanguage !!}</li>
                            </ul>
                            </div>
                            </div>
                            <div class="information-contant" id="Qualification">
                            <div class="heading-line">
                            <h4>Qualification</h4>
                            </div>
                            <div class="listing-detail">
                        
                                {!! $doctor_detail->DoctorQualification !!}
                           
                            </div>
                            </div>
                            <div class="information-contant" id="AwardsAchievements">
                            <div class="heading-line">
                            <h4>Awards &amp; Achievements</h4>
                            </div>
                            <div class="listing-detail">
                            <ul>
                            {!! $doctor_detail->DoctorAcheivements !!}
                            
                            </ul>
                            </div>
                            
                            </div>
                            <div class="information-contant" id="Memberships">
                            <div class="heading-line">
                            <h4>Memberships</h4>
                            </div>
                            <div class="listing-detail">
                            <ul>
                            {!! $doctor_detail->DoctorMemberships !!}
                            
                            </ul>
                            </div>
                            </div>
                            <div class="information-contant" id="WorkExperience">
                            <div class="heading-line">
                            <h4>Work Experience</h4>
                            </div>
                            <div class="listing-detail">
                            <ul>
                            {{ $doctor_detail->DoctorWorkExperienceDetail }}
                            </ul>
                            </div>
                            </div>
                            <div class="information-contant" id="ResearchPublications">
                            <div class="heading-line">
                            <h4>Research &amp; Publications</h4>
                            </div>
                            <div class="listing-detail">
                            <ul>
                            {!! $doctor_detail->DoctorResearchPublication !!}<span style="font-size:11.0pt"> </span>
                            
                            </ul>
                            </div>
                            </div>
                            <div class="information-contant" id="Specialization">
                            <div class="heading-line">
                            <h4>Specialization</h4>
                            </div>
                            <div class="listing-detail">
                            <ul>
                                {!! $doctor_detail->DoctorSpecialization !!}
                            
                            </ul>
                            </div>
                            </div>
                            </div>
                </div>
           
        </div>
		</div>
    </div>
</div>

<div class="retalted-doc doc-listpage">
  	<div class="container">
    	<div class="row">
        	 <div class="col-md-9">
        	<h2>Related Doctors</h2>
            </div>
            <div class="col-md-3">
                <div class="homeblogsin">
                	<a href="#" class="button2">Find More Doctors <i class="bi bi-search"></i></a>
                    </div>
                </div>
        </div>
    	<div class="row justify-content-center">
        @php
      
        $Department  = $doctor_detail->DoctorDepartment ?? ''; 
        $related_doctors = \DB::connection('mysql2')
                                ->table('sh_doctorprofile')
                                ->leftJoin('sh_departments', 'sh_doctorprofile.DoctorDepartment', '=', 'sh_departments.DepartmentID')
                                ->where('sh_departments.DepartmentID', 'LIKE', '%' . $Department  . '%')
                                ->limit(4)
                                ->get();
        @endphp

        @if($related_doctors->isEmpty())
            <p>No doctors found with the specified Department.</p>
        @else
        <div class="row">
            @foreach($related_doctors as $related_doctor)
                <div class="col-md-3">
                    <div class="find-dc-list">
                        <div class="images">
                           
                            @if ($related_doctor->DoctorProfilePic)
                                <img src="https://www.shardahospital.org/uploads/doctor/{{ $related_doctor->DoctorProfilePic }}" alt="">
                                @else
                                    <img src="{{ asset('assets/images/doc.jpeg') }}" alt="" >
                                @endif
                            <div class="contant">
                                <div class="contant-in">
                                    <h3>{{ $related_doctor->DoctorTitle }} {{ $related_doctor->DoctorName }}</h3>
                                    <p>{{ $related_doctor->DepartmentName  }}</p>
                                    <!-- <p>Internal Medicine</p> -->
                                    <button href="#" class="button1 button1111"  id="checkname2" onclick="getValue(this.value)" data-bs-toggle="modal" data-bs-target="#bookappointment" value="{{ $related_doctor->DoctorTitle }} {{ $related_doctor->DoctorName }}">Book Appointment</button >
                                    <!-- <a href="#" class="button1 button1111" data-bs-toggle="modal" data-bs-target="#bookappointment">Book Appointment</a> -->
                                    <a href="{{ url('doctor_details/' . $related_doctor->DoctorID) }}" class="button1 button111">View Profile</a>
                                </div>
                            </div>
                        </div>
                        <div class="contant2">
                            <div class="contant-in">
                                <h3>{{ $related_doctor->DoctorTitle }} {{ $related_doctor->DoctorName }}</h3>
                               <p>{{ $related_doctor->DepartmentName  }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
        </div>     
 </div> 
</div>
<script>
// Doctor's Name in Book Appointment  

function getValue(buttonValue){
    document.getElementById('doctorNameInput').value = buttonValue;
    
}
</script>    
@endforeach
@endif
@endsection