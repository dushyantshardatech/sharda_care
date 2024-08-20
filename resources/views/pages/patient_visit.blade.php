@extends('layout')
@section('page_title', 'Patient Visit')
@section('page-contents')

<div class="slider-innerpage">
	<div class="container">
    	<div class="row">
        	<div class="col-md-12">
            	<h1>Patient & Visitor Guide</h1>
       		</div> 
        </div>
    </div>
</div>

<section class="news-detail">
 	<div class="container">
	<div class="row justify-content-center">
    <div class="col-md-8">
    			<div class="content-statick">
                
                	<div class="content-statick">
                
                	 <h4>Personal Belongings & Valuables</h4>
<p>You are encouraged to bring only essential items to the hospital. You are requested to take care of belongings while you are here, the hospital is not responsible for lost or stolen items. For international patients, a cash deposit facility is available at central cashier for excess money, for safe keep.</p>

<h4>Flowers & Outside Eatables</h4>
<p>Flowers and outside eatables are not allowed in the hospital.</p>

<h4>Children</h4>
<p>Children below 12 years of age are not encouraged as visitor in the hospital without special permission.</p>

<p><h4>Attendant & Visitor Pass</h4>
Only one attendant is allowed to stay with patient in the rooms, one attendant and one visitor pass shall be issued at the time of admission for ward admission. For patients in Critical Care Departments, such as ICU, only one attendant pass shall be provided. </p>

<h4>No Smoking</h4>
<p>Hospital falls under no-smoking zone, hence smoking is strictly prohibited in the premises of Sharda Care -Healthcity.</p>

                     
                </div> 
                    
                </div>
                 
            
			</div>
            
    	<div class="col-md-3">
    			<ul class="side-link">
                	<li class="active"><a href="{{url('patient_visit')}}">Patient & Visitor Guide</a></li>
					<li><a href="#">Privacy Policy</a></li>
                	<li><a href="#">Terms &amp; Conditions</a></li>
                </ul> 
                 
				 
            
			</div>
            
   		</div>
	</div>
</section>

@endsection