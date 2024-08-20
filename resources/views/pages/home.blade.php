@extends('layout')
@section('page_title', 'Home')
@section('page-contents')


<section class="slider">
   <div class=" ">
		<div class="slide-inner">
        
        <div class="main_slider arrowsldier">
        
        	<div  class="main_sliderin">
        		<video width="480" height="270"  loop="true" autoplay  dir="" muted >
                    <source src="{{ asset('assets/video/healthcity1.mp4') }}" type="video/mp4">
                     Your browser does not support the video tag.
                </video>
        	</div>
            
            <!--<div  class="main_sliderin">
        		 <img src="images/slider1.jpg">
        	</div>-->
            
            <div  class="main_sliderin">
        		<video width="480" height="270"  loop="true" autoplay   muted >
                    <source src="{{ asset('assets/video/healthcity.mp4') }}" type="video/mp4">
                     Your browser does not support the video tag.
                </video>
        	</div>
        </div>
                
         <div class="slide-in">
	 
            <div class="slide-incon">
            	<!--<h1> Future of Healthcare</h1>  
                <p>Greatest Care, Advanced Techlonogy </p>
                <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br><br> <br> <br><br> <br>  
                <a href="#" class="button1"> Opening Soon  <i class="bi bi-arrow-right"></i> </a>-->
            </div>
            
    </div>
    
    	<!--<div class="arrowanima">
        	<a href="#"><i class="bi bi-arrow-down"></i></a>
        </div>-->
	</div>
	  
	</div>
    
</section>

<section class="section-51">
	<div class="container">
    	<div class="row">
         
        <div class="col-md-12">
           <ul>
           
        <li>
        <a href="#" data-bs-toggle="modal" data-bs-target="#bookappointment">
        	 
        	<div class="box-1">
            <div class="icon">
            	<i class="bi bi-calendar2-check"></i>
            </div>
        	<strong>Book an <br> Appointment</strong>
            </div>
        </a> 
        </li>
        <li>
        
         <a href="{{url('find-a-doctor')}}"> 
        	<div class="box-1">
            <div class="icon">
            <i class="bi bi-search"></i>

            </div>
        	<strong>Find <br> A Doctor</strong>
            </div>
        </a>
        </li>
        <li>
        <a href="{{url('patient_visit')}}"> 
        	<div class="box-1">
            <div class="icon">
            <i class="bi bi-file-earmark-text"></i>
            </div>
        	<strong>Patient &amp; <br> Visitor Guide  </strong>
            </div>
        </a> 
        </li>
        <li>
        <a href="{{url('contact')}}#"> 
        	<div class="box-1">
            <div class="icon">
            <i class="bi bi-person-rolodex"></i> 
            </div>
        	<strong>Contact <br> Us</strong>
            </div>
            </a>
        </li>
    </ul>
    	</div>
    	</div>
	</div>    		     
</section>
 
<!--<section class="about-sec">
 	<div class="">
    	<div class="">
        	<div class="col-md-12">
            <div class="section-5main">
                <div class="ab_slider arrowsldier">
            <img src="images/img/1.jpg" >
            <img src="images/img/2.jpg" >
            <img src="images/img/3.jpg" >
            <img src="images/img/4.jpg" >
            <img src="images/img/5.jpg" >
            <img src="images/img/6.jpg" >
            <img src="images/img/7.jpg" >
            <img src="images/img/8.jpg" >
            <img src="images/img/9.jpg" >
            <img src="images/img/10.jpg" >
            <img src="images/img/11.jpg" >
            <img src="images/img/12.jpg" >
            <img src="images/img/13.jpg" >
          
             	</div>
                 
            	 <div class="section-5">
	 
           <ul >
           
        <li>
        <a href="#">
        	 
        	<div class="box-1">
            <div class="icon">
            	<i class="bi bi-calendar2-check"></i>
            </div>
        	<strong>Book an   Appointment</strong>
            </div>
        </a> 
        </li>
        <li>
        
         <a href="#"> 
        	<div class="box-1">
            <div class="icon">
            <i class="bi bi-search"></i>

            </div>
        	<strong>Find   A Doctor</strong>
            </div>
        </a>
        </li>
        <li>
        <a href="#"> 
        	<div class="box-1">
            <div class="icon">
            <i class="bi bi-file-earmark-text"></i>
            </div>
        	<strong>Patient &   Visitor Guide  </strong>
            </div>
        </a> 
        </li>
        <li>
        <a href="#"> 
        	<div class="box-1">
            <div class="icon">
            <i class="bi bi-person-rolodex"></i> 
            </div>
        	<strong>Contact   Us</strong>
            </div>
            </a>
        </li>
    </ul>
    	  		     
</div> 

</div>
                
            </div>
        </div>
    </div>
 </section>--> 
<br /><br />
 <section class="specialities">
	<div class="container">
    	<div class="row">
        	<div class="col-md-7">
            	<h3>Our Specialities</h3>
              <p>  </p> 
                
               







                 <ul class="specialities-list">
                    	<li>
                        	<div class="icon">
                            	<img src="{{ asset('assets/images/s-i1.png') }}" alt="" >
                            </div>
                            <strong>Medical & Radiation Oncology</strong>
                       
                        </li>
                        <li>
                        	<div class="icon">
                            <img src="{{ asset('assets/images/s-i2.png') }}" alt="" >
                            </div>
                            <strong>Ear, Nose & Throat </strong>
                       
                        </li>
                        <li>
                        	<div class="icon">
                            <img src="{{ asset('assets/images/s-i3.png') }}" alt="" >
                            </div>
                            <strong> Neurology</strong>
                       
                        </li>
                        <li>
                        	<div class="icon">
                            <img src="{{ asset('assets/images/s-i4.png') }}" alt="" >
                            </div>
                            <strong>Neurosurgery</strong>
                       
                        </li>
                        <li>
                        	<div class="icon">
                            <img src="{{ asset('assets/images/s-i5.png') }}" alt="" >
                            </div>
                            <strong> Obstetrics & Gynaecology</strong>
                       
                        </li>
                        <li>
                        	<div class="icon">
                            <img src="{{ asset('assets/images/s-i6.png') }}" alt="" >
                            </div>
                            <strong> Orthopaedics</strong>
                       
                        </li>
                         
                       <li>
                        	<div class="icon">
                            <img src="{{ asset('assets/images/s-i7.png') }}" alt="" >
                            </div>
                            <strong>Urology </strong>
                       
                        </li>
                        <li>
                        	<div class="icon">
                            <img src="{{ asset('assets/images/s-i8.png') }}" alt="" >
                            </div>
                            <strong>Plastic & Cosmetic Surgery</strong>
                       
                        </li>
                       
                         

                    </ul>
                  
                <!--<ul class="nav nav-tabs" id="myTab" role="tablist">
                  <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="Specialities-tab" data-bs-toggle="tab" data-bs-target="#Specialities" type="button" role="tab" aria-controls="Specialities" aria-selected="true">Centre of Excellence </button>
                  </li>
                  <li class="nav-item" role="presentation">
                    <button class="nav-link" id="Procedures-tab" data-bs-toggle="tab" data-bs-target="#Procedures" type="button" role="tab" aria-controls="Procedures" aria-selected="false">Specialites</button>
                  </li>
                  
                </ul> 
                <div class="tab-content" id="myTabContent">
                  <div class="tab-pane fade show active" id="Specialities" role="tabpanel" aria-labelledby="Specialities-tab">
                  	
<div class="specialinner">
                	<h4>Centre of Excellence </h4>
                	<ul class="specialities-list">
                    	<li>
                        	<div class="icon">
                            	<img src="{{ asset('assets/images/s-i1.png') }}" alt="" >
                            </div>
                            <strong> Cancer Centre <br /> &nbsp;</strong>
                       
                        </li>
                        <li>
                        	<div class="icon">
                            <img src="{{ asset('assets/images/s-i2.png') }}" alt="" >
                            </div>
                            <strong> Heart & <br />Vascular</strong>
                       
                        </li>
                        <li>
                        	<div class="icon">
                            <img src="{{ asset('assets/images/s-i3.png') }}" alt="" >
                            </div>
                            <strong> Centre For Bone<br /> Marrow Transplant</strong>
                       
                        </li>
                        <li>
                        	<div class="icon">
                            <img src="{{ asset('assets/images/s-i4.png') }}" alt="" >
                            </div>
                            <strong> Centre For <br />Neurosciences</strong>
                       
                        </li>
                        <li>
                        	<div class="icon">
                            <img src="{{ asset('assets/images/s-i5.png') }}" alt="" >
                            </div>
                            <strong> Institute For Digestive & Liver Diseases</strong>
                       
                        </li>
                        <li>
                        	<div class="icon">
                            <img src="{{ asset('assets/images/s-i6.png') }}" alt="" >
                            </div>
                            <strong> Centre For Renal Sciences & Kidney Transplant</strong>
                       
                        </li>
                         
                       <li>
                        	<div class="icon">
                            <img src="{{ asset('assets/images/s-i8.png') }}" alt="" >
                            </div>
                            <strong> Centre For Chest & Respiratory Diseases</strong>
                       
                        </li>
                        <li>
                        	<div class="icon">
                            <img src="{{ asset('assets/images/s-i8.png') }}" alt="" >
                            </div>
                            <strong>Institute For Bone, Joint Replacement ,Orthopedics Spine & Sports Medicine</strong>
                       
                        </li>
                       <li>
                        	<div class="icon">
                            <img src="{{ asset('assets/images/s-i8.png') }}.png" alt="" >
                            </div>
                            <strong> Centre For Chest & Respiratory Diseases</strong>
                       
                        </li>
                        <li>
                        	<div class="icon">
                            <img src="{{ asset('assets/images/s-i5.png') }}" alt="" >
                            </div>
                            <strong> Institute For Digestive & Liver Diseases</strong>
                       
                        </li>
                        <li>
                        	<div class="icon">
                            <img src="{{ asset('assets/images/s-i6.png') }}" alt="" >
                            </div>
                            <strong> Centre For Renal Sciences & Kidney Transplant</strong>
                       
                        </li>

                    </ul>
                  </div>
                  </div>
                 <div class="tab-pane fade" id="Procedures" role="tabpanel" aria-labelledby="Procedures-tab">
                   <div class="specialinner"> 
                   <h4>Specialites</h4>
                    <ul class="specialities-list">
                    	<li>
                        	<div class="icon">
                            	<img src="images/s-i1.png" alt="" >
                            </div>
                            <strong> Cancer Centre</strong>
                       
                        </li>
                        <li>
                        	<div class="icon">
                            <img src="images/s-i2.png" alt="" >
                            </div>
                            <strong> Heart & <br />Vascular</strong>
                       
                        </li>
                        <li>
                        	<div class="icon">
                            <img src="images/s-i3.png" alt="" >
                            </div>
                            <strong> Centre For Bone<br /> Marrow Transplant</strong>
                       
                        </li>
                        <li>
                        	<div class="icon">
                            <img src="images/s-i4.png" alt="" >
                            </div>
                            <strong> Centre For <br />Neurosciences</strong>
                       
                        </li>
                        <li>
                        	<div class="icon">
                            <img src="images/s-i5.png" alt="" >
                            </div>
                            <strong> Institute For Digestive & Liver Diseases</strong>
                       
                        </li>
                        <li>
                        	<div class="icon">
                            <img src="images/s-i6.png" alt="" >
                            </div>
                            <strong> Centre For Renal Sciences & Kidney Transplant</strong>
                       
                        </li>
                        <li>
                        	<div class="icon">
                            <img src="images/s-i7.png" alt="" >
                            </div>
                            <strong>Institute For Bone, Joint Replacement ,Orthopedics Spine & Sports Medicine</strong>
                       
                        </li>
                       <li>
                        	<div class="icon">
                            <img src="images/s-i8.png" alt="" >
                            </div>
                            <strong> Centre For Chest & Respiratory Diseases</strong>
                       
                        </li>
                         
                         
                    </ul> 
                </div> 
                  </div> 
                 
                </div>-->
            </div>
            
            <div class="col-md-5">
            <div class="request-call">
	 
            	<div class="request-call-in">
                    <h4>Looking for an Expert</h4>
					<P>Sharda Care The Healthcity is home to some of the eminent doctors in the world</P>
                    <a href="#" class="button1">Find a Doctor  <i class="bi bi-search"></i></a>
                    
                    
                
    </div>
</div>
            </div>
        </div>
    </div>
</section>
<!--<section class="finddiseassesmain">
	<div class="container">
    	<div class="row ">
        	<div class="col-md-12">
            <div class="finddiseasses">
            	<div class="finddiseassesin">
            	<h4>Search diseases & conditiions </h4>
                
                <form>
                	<input type="text" placeholder="Search diseases & conditiions...">
                    <button class="button1">Search <i class="bi bi-search"></i></button>
                </form>
                
             	</div>
            <div class="finddiseassesin1">
				<h4>Find diseases & conditiions by first letter</h4>
                 
                 <ul>
                 	<li><a href="#">a</a></li>
                    <li><a href="#">b</a></li>
                    <li><a href="#">c</a></li>
                    <li><a href="#">d</a></li>
                    <li><a href="#">e</a></li>
                    <li><a href="#">f</a></li>
                    <li><a href="#">g</a></li>
                    <li><a href="#">h</a></li>
                    <li><a href="#">i</a></li>
                    <li><a href="#">j</a></li>
                    <li><a href="#">k</a></li>
                    <li><a href="#">l</a></li>
                    <li><a href="#">m</a></li>
                    <li><a href="#">n</a></li>
                    <li><a href="#">o</a></li>
                    <li><a href="#">p</a></li>
                    <li><a href="#">q</a></li>
                    <li><a href="#">r</a></li>
                    <li><a href="#">s</a></li> 
                    <li><a href="#">t</a></li>
                    <li><a href="#">u</a></li>
                    <li><a href="#">v</a></li>
                    <li><a href="#">w</a></li> 
                    <li><a href="#">x</a></li>
                    <li><a href="#">y</a></li>
                    <li><a href="#">z</a></li>
                    
                 </ul>           	
            </div>
            </div>
			</div>
        </div>
    </div> 	
</section>-->
 

 <!--<section class="letestnews">
<div class="container">
        	<div class="row">
            	<div class="col-md-12">
                	 
                    <h4>  Medical Packages </h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean facilisis enim sit amet placerat vestibulum.</p>
                </div>
                
            </div>
        	<div class="row"> 
            	<div class="col-md-12">
                
                	 <ul class="latestpost_slider arrowsldier1">
                     	<li>
                        	<div class="letestnews-box">
                            <div class="images">
                                <a href="#" tabindex="-1">
                                <img src="images/ssimg.png" >
                                </a>
                            </div>
                            <div class="contant">
                               

							   	<h3>State-of-the-art technology</h3>	 
                                <p>Diseases and Safety Measures post-Kerala Floods  Kerala Floods have finally started receding, sweeping away hundreds of precious lives and properties. The floods have rendered thousands of people hom....</p> 
                                <a href="#" class="button2">Read More <i class="bi bi-arrow-right"></i></a>
                               </div>
                            <div class="clearfix"></div>
                        </div>
                        
                        </li>
                        <li>
                        	<div class="letestnews-box">
                            <div class="images">
                                <a href="#" tabindex="-1">
                                <img src="images/ssimg.png" >
                                </a>
                            </div>
                            <div class="contant">
                                
							   	<h3>State-of-the-art technology</h3>	 
                                <p>Diseases and Safety Measures post-Kerala Floods  Kerala Floods have finally started receding, sweeping away hundreds of precious lives and properties. The floods have rendered thousands of people hom....</p> 
                                <a href="#" class="button2">Read More <i class="bi bi-arrow-right"></i></a>
                               </div>
                            <div class="clearfix"></div>
                        </div>
                        
                        </li>
                        <li>
                        	<div class="letestnews-box">
                            <div class="images">
                                <a href="#" tabindex="-1">
                                <img src="images/ssimg.png" >
                                </a>
                            </div>
                            <div class="contant">
                                
							   	<h3>State-of-the-art technology</h3>	 
                                <p>Diseases and Safety Measures post-Kerala Floods  Kerala Floods have finally started receding, sweeping away hundreds of precious lives and properties. The floods have rendered thousands of people hom....</p> 
                                <a href="#" class="button2">Read More <i class="bi bi-arrow-right"></i></a>
                               </div>
                            <div class="clearfix"></div>
                        </div>
                        
                        </li>
                        <li>
                        	<div class="letestnews-box">
                            <div class="images">
                                <a href="#" tabindex="-1">
                                <img src="images/ssimg.png" >
                                </a>
                            </div>
                            <div class="contant">
                                
							   	<h3>State-of-the-art technology</h3>	 
                                <p>Diseases and Safety Measures post-Kerala Floods  Kerala Floods have finally started receding, sweeping away hundreds of precious lives and properties. The floods have rendered thousands of people hom....</p> 
                                <a href="#" class="button2">Read More <i class="bi bi-arrow-right"></i></a>
                               </div>
                            <div class="clearfix"></div>
                        </div>
                        
                        </li>
                     </ul> 
                </div>
            </div>
        </div>
	
</section>--> 

<section class="about-sec1">
 	<div class="container">
    	<div class="row">
        	<div class="col-md-5 offset-1">
            
            <img src="{{ asset('assets/images/language-club1.png') }}" >
             </div>
            <div class="col-md-5">
            	<div class="content">
                 
                <br> 
                <h2>World-Class Care <br>for International Patients  </h2>
                	<p>Sharda Care - The Healthcity facilitates global access to healthcare, streamlining the process for patients from all corners of the world. Our dedicated services ensure seamless coordination and support throughout their healthcare journey. With multilingual assistance and tailored solutions, including visa arrangements, travel logistics, and accommodation, we prioritize the comfort and convenience of international patients.
 </p>
<a href="#" class="button2">Know More  <i class="bi bi-arrow-right"></i></a>
                </div>
                
            </div>
        </div>
        
        <div class="row">
        	<div class="col-md-10 offset-1">
            	<div class="logoicon">
                	<img src="{{ asset('assets/images/icon.png') }}">
                </div>
             </div>
        </div>
        <div class="row">
        	<div class="col-md-5 orderclass">
            
            <img src="{{ asset('assets/images/language-club.png') }}" >
             </div>
            <div class="col-md-5 offset-1 ">
            	<div class="content">
                 <br>   
                <br> 
                <h2>Preventing Health  <br>Check-Up Packages  </h2>
                	<p>Sharda Care - The Healthcity offers comprehensive preventive health check-up packages tailored to suit individual needs. These packages are designed to detect potential health issues at an early stage, promoting overall well-being and longevity. From basic screenings to advanced diagnostics, we provide a range of services to cater to diverse health requirements.
 </p>
<a href="#" class="button2">View Packages <i class="bi bi-arrow-right"></i></a>
                </div>
                
            </div>
        </div>
        <!--<div class="row">
        	<div class="col-md-10 offset-1">
            	<div class="logoicon">
                	<img src="images/icon.png">
                </div>
            </div>
        </div>-->
    </div>
 </section>
 
  
 <!--<section class="patientslide">
    	<div class="container">
        	<div class="row">
            	<div class="col-md-12">
                	 
                    <h4>Real Patients, Real Stories.</h4>
                </div>
            
            <div class="col-md-10 offset-1">
        	<div class="row patient_slider">
            	<div class="col-md-3">
                	 
                    
                    <div class="pimg" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    <img src="images/p1.jpg" > 
                    <div class="icon">
                      <div class="data">
                     <i class="bi bi-play-fill"></i> 
                    <strong>patient Name</strong>
                    <p>Lorem ipsum dolor sit amet</p>
                    </div>  
                    </div>  
                    </div>
                     <div class="pimg" data-bs-toggle="modal" data-bs-target="#exampleModal">
                     <img src="images/p3.jpg" >
                     <div class="icon">
                      <div class="data">
                     <i class="bi bi-play-fill"></i> 
                    <strong>patient Name</strong>
                    <p>Lorem ipsum dolor sit amet</p>
                    </div>  
                    </div>
                    </div>
                     </div>
                    <div class="col-md-3">
                    <div class="pimg pimg1" data-bs-toggle="modal" data-bs-target="#exampleModal"><img src="images/p2.jpg" > <div class="icon">
                      <div class="data">
                     <i class="bi bi-play-fill"></i> 
                    <strong>patient Name</strong>
                    <p>Lorem ipsum dolor sit amet</p>
                    </div>  
                    </div>  </div>
                     </div>
                    <div class="col-md-3">
                    <div class="pimg pimg1" data-bs-toggle="modal" data-bs-target="#exampleModal"><img src="images/p4.jpg" > <div class="icon">
                      <div class="data">
                     <i class="bi bi-play-fill"></i> 
                    <strong>patient Name</strong>
                    <p>Lorem ipsum dolor sit amet</p>
                    </div>  
                    </div>  </div>
                     </div>
                    <div class="col-md-3">
                   <div class="pimg" data-bs-toggle="modal" data-bs-target="#exampleModal"><img src="images/p1.jpg" > <div class="icon">
                      <div class="data">
                     <i class="bi bi-play-fill"></i> 
                    <strong>patient Name</strong>
                    <p>Lorem ipsum dolor sit amet</p>
                    </div>  
                    </div>  </div>
                     <div class="pimg" data-bs-toggle="modal" data-bs-target="#exampleModal"><img src="images/p3.jpg" > <div class="icon">
                      <div class="data">
                     <i class="bi bi-play-fill"></i> 
                    <strong>patient Name</strong>
                    <p>Lorem ipsum dolor sit amet</p>
                    </div>  
                    </div>  </div>
                     
                      
               
            </div>
        </div>
        </div>
        </div>
        <div class="row">
        <div class="logoicon1">
                	<img src="images/icon.png">
                </div>
                </div>
        </div>
    </section> 
 <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog  modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Real Patients 1</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" style="padding:0;">
       <iframe width="100%" height="420" src="https://www.youtube.com/embed/fxBXNwipvWY" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen=""></iframe>
      </div>
       
    </div>
  </div>
</div> -->
<section class="homeblogs" style="padding-top:50px;">
<div class="container">
        	<div class="row">
            	<div class="col-md-5">
                     <h4>   Health Blogs</h4>
                    
                </div>
                <div class="col-md-7">
                <div class="homeblogsin">
                	<a href="#" class="button2">View All <i class="bi bi-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        	 
                <ul class="blog_slider row"> 
                    <li class="col-md-3"><a href="#">
                        <img src="{{ asset('assets/images/b1.png') }}" >
                        <div class="box-1">
                        <strong> The Importance of Regular Exercise: Tips for Maintaining an Active Lifestyle </strong>
                        </div>
                    </a></li>
                    <li class="col-md-3"><a href="#">
                         <img src="{{ asset('assets/images/b2.png') }}" >
                        <div class="box-1">
                        <strong>Understanding Mental Health: Strategies for Managing Stress and Anxiety</strong>
                        </div>
                    </a></li>
                    <li class="col-md-3"><a href="#"> 
                    	<img src="{{ asset('assets/images/b3.png') }}" >
                        <div class="box-1">
                        <strong>Exploring the Benefits of a Balanced Diet: Nutrients Your Body Needs</strong>
                        </div>
                    </a></li>
                    <li class="col-md-3"><a href="#"> 
                    	<img src="{{ asset('assets/images/b4.png') }}" >
                        <div class="box-1">
                        <strong>Demystifying Common Myths About Vaccines and Immunization</strong>
                        </div>
                    </a></li>
                    <!--<li><a href="#"> 
                    	<img src="images/b5.png" >
                        <div class="box-1">
                        <strong>Empowering students to create solutions for tomorrow’s challenges</strong>
                        </div>
                        </a>
                    </li>-->
                </ul>
                	  
                 
        </div>
	
</section> 

<!--<section class="inter-tieup "> 
  <div class="container">
    <div class="row">
      <div class="col-sm-5">
        <h3>Awards  And Achievment</h3>
        <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam sollicitudin volutpat diam, eget sagittis Nullam sollicitudin volutpat  </p>
        </div>
         <div class="col-sm-12">
        <ul class="taiup_slider arrowsldier arrowsldier2">
          <li>
			<div class="tieup-list">
				 <div class="images">
				 <img src="images/how-to-promote-your-business-award.webp">
                </div>
                <div class="contant">
					
					<h3>Awards  And Achievment 1</h3>
					 
                </div>
                <div class="clearfix"></div>
			</div>
		  </li>
		  <li>
			<div class="tieup-list">
				 <div class="images">
				 <img src="images/how-to-promote-your-business-award.webp">             </div>
                <div class="contant">
					<h3>Awards  And Achievment 2</h3>
                 </div>
                <div class="clearfix"></div>
			</div>
		  </li>
		  <li>
			<div class="tieup-list">
				 <div class="images">
				  <img src="images/how-to-promote-your-business-award.webp">             </div>
                <div class="contant">
					
					<h3>Awards  And Achievment 3</h3>
                 </div>
                <div class="clearfix"></div>
			</div>
		  </li>
		  <li>
			<div class="tieup-list">
				 <div class="images">
				 <img src="images/how-to-promote-your-business-award.webp">            </div>
                <div class="contant">
					
					<h3>Awards  And Achievment 4</h3>
                 </div>
                <div class="clearfix"></div>
			</div>
		  </li>
		  <li>
			<div class="tieup-list">
				 <div class="images">
				 <img src="images/how-to-promote-your-business-award.webp">         </div>
                <div class="contant">
					
					<h3>Awards  And Achievment 5</h3>
				 
                </div> 
                <div class="clearfix"></div>
			</div>
		  </li>
		  <li>
			<div class="tieup-list">
				 <div class="images">
				 <img src="images/how-to-promote-your-business-award.webp">         </div>
                <div class="contant">
					
					<h3>Awards  And Achievment 6</h3> 
                </div>
                <div class="clearfix"></div>
			</div>
		  </li>
		  <li>
			<div class="tieup-list">
				 <div class="images">
				 <img src="images/how-to-promote-your-business-award.webp">  </div>
                <div class="contant">
					
					
					<h3>Awards  And Achievment 7</h3>
                 </div>
                <div class="clearfix"></div>
			</div>
		  
           
        </ul>
      </div>
    </div>
  </div>
</section>--> 

@endsection