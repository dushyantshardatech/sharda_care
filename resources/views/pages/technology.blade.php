@extends('layout')
@section('page_title', 'Technology')
@section('page-contents')

<div class="slider-innerpage">
	<div class="container">
    	<div class="row">
        	<div class="col-md-12">
            	<h1>Technology</h1>
       		</div> 
        </div>
    </div>
</div>

<div class="technoly-sec">
	<div class="container">
    	<div class="row">
         
            @if(isset($technologys))
            @foreach($technologys as $technology)
               <div class="col-md-6">
                     <div class="techcont">
                        <div class="images">
                           <img src="{{asset('storage/images/technology/'.$technology->image)}}">	
                        </div>
                       
                        <div class="con">
                        <h4>{{ $technology->heading }}</h4>
                              {!! $technology->content !!}
                          
                        </div>
                     </div>
                  </div> 
            @endforeach
            @endif
            
            <!-- <div class="col-md-6">
            	 <div class="techcont">
                 	<div class="images">
                    	<img src="{{ asset('assets/images/tech1.jpeg') }}">	
                    </div>
                    <div class="con">
                    	<p>Sharda Care - Healthcity introduces Varian Truebeam LINAC, revolutionizing cancer care with pinpoint accuracy in radiation therapy for tailored treatment plans. </p>
                    </div>
                 </div>
       		</div>
            <div class="col-md-6">
            	 <div class="techcont">
                 	<div class="images">
                    	<img src="{{ asset('assets/images/tech1.jpeg') }}">	
                    </div>
                    <div class="con">
                    	<p>Sharda Care - Healthcity introduces Varian Truebeam LINAC, revolutionizing cancer care with pinpoint accuracy in radiation therapy for tailored treatment plans. </p>
                    </div>
                 </div>
       		</div>  -->
           
        </div>
    </div>
</div>

  
@endsection