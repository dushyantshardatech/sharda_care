<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Security-Policy" content="frame-ancestors 'none'">
    <meta http-equiv="X-Content-Type-Options" content="nosniff">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Health Care - @yield('page_title')</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/images/icon.png') }}">
    <link href="{{ asset('assets/css/bootstrap5.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/bootstrap-reboot.min.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/css/health_city.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="https://www.google.com/recaptcha/enterprise.js?render=6LeFhyAqAAAAADOc_yi89EFmjAuAXjte1F_TJlYV"></script>

  </head>


  <body>
  @php
    $headerClass = (Request::is('/') ? 'headermain' : 'headermain headermaininner');
  @endphp
  <div class="{{ $headerClass }}" id="headermain">
  <section class="notification">
      <div class="imp-info-data">
          <div class="imp-action">
              <strong>
                  Get free Second opinion from India’s Leading specialists. <span class="rotate-arrow up"><i class="bi bi-arrow-up-circle-fill"></i></span>
              </strong>
          </div>
          <div class="imp-data">
              <div class="container">
              <div id="alert-container">
                  <div id="second-op-alert-message" class="alert alert-success d-none" role="alert" style="padding-top:5px; padding-bottom:5px; width:50%; text-align:center;">
                        Second Opinion successfully!
                  </div>
              </div>
              <form id="secondOpinion" enctype="multipart/form-data">
                  <div class="row">
                        <div class="col">
                            <input type="text" placeholder="Name" name="name" required/>
                        </div>
                        <div class="col">
                            <input type="text" placeholder="Phone no" name="phone" required/>
                        </div>

                        <div class="col">
                            <input type="date" name="time_to_call" required/> 
                        </div>
                        <div class="col">
                            <input type="file" placeholder="upload Report" name="image" required/>
                        </div>

                        <div class="col-md-2">
                            <button class="button2">Submit</button>
                        </div>
                      
                  </div>
                  </form>
              </div>
          </div>
      </div>
  </section>

    <section  id="header" class="header">
    
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3"> 
                  
           </div>
              
           <div class="col-md-12">
           <div class="logo">
                      <a href="{{ url('/')}}">
                          <img src="{{ asset('assets/images/logo-w.png') }}" class="logo-w">
                          <img src="{{ asset('assets/images/logo-b.png') }}" class="logo-b"> 
                      </a> 
                  </div>
        <nav class="nav">
                        <ul>
                            <li> <a href="#">Our Specialties <i class="bi bi-chevron-down"></i> </a>
                                <ul class="dropdowns"> 
                                    <li><a href="#">Oncology – Medical & Radiation Oncology</a></li>
                                    <li><a href="#">Ear, Nose & Throat </a></li>
                                    <li><a href="#">Neurology</a></li>
                                    <li><a href="#">Neurosurgery</a></li>
                                    <li><a href="#">Obstetrics & Gynaecology</a></li>
                                    <li><a href="#">Orthopaedics</a></li>
                                    <li><a href="#">Urology</a></li>
                                    <li><a href="#">Plastic & Cosmetic Surgery </a></li>
                                </ul>
                            </li>        
                                 
                            <li><a href="{{url('find-a-doctor')}}">Find A Doctor </a> </li>             
                            <li><a href="{{url('technology')}}">Technology  </a> </li> 
                            <li></li>
    
                            <li><a href="{{url('contact')}}">Contact Us</a> </li>
                            <li><a href="#" data-bs-toggle="modal" data-bs-target="#quickenquiry">Quick Enquiry  </a> </li> 
                            <li><a href="#">Career  </a> </li> 
                            <li><a href="#">International Patients</a> </li>     
                             
                         </ul>
                    </nav>
      </div>
             
        
            </div>
        </div>
    
    </section> 
</div>

    <!--<section id="header" class="header">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-2">
            <div class="logo">
              
            </div>
          </div>
          <div class="col-md-6">
            <nav class="nav">
              <ul>
                @foreach($layout_data['menu_list'] as $menus )
                <li>
                  <a href="{{ url($menus['main_menu']->manage_url) }}">
                    {{$menus['main_menu']->menu_name}}
                    @if($menus['sub_menu']->isNotEmpty())
                    <i class="bi bi-chevron-down"></i>
                    <ul class="dropdowns">
                      @foreach($menus['sub_menu'] as $submenu)
                      <li><a href="{{ url($submenu->submenu_url) }}">{{ $submenu->submenu_name }}</a></li>
                      @endforeach
                    </ul>
                    @endif
                  </a>
                </li>
                @endforeach
              </ul>
            </nav>
          </div>
          <div class="col-md-4">
            <div class="login-header">
              <a href="{{url('book-an-appointment')}}" class="bookappointment"><i class="bi bi-calendar-check"></i> Book appointment</a>
              <div class="contantde"> 
              
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>-->
    <div class="main-content">
      @section('page-contents')
      @show
    </div>
    <!-- Footer -->
    <section class="footer">
      <div class="container">
        <div class="row">
          @foreach($layout_data['menu_list'] as $menus )
          @if($menus['sub_menu']->isNotEmpty())
          <div class="col-md-3">
            <div class="footer-link footer-link2">
              <h5>{{$menus['main_menu']->menu_name}}</h5>
              <ul>
                @foreach($menus['sub_menu'] as $submenu)
                <li><a href="{{ url($submenu->submenu_url) }}">{{ $submenu->submenu_name }}</a></li>
                @endforeach
              </ul>
            </div>
          </div>
          @endif
          @endforeach
          <div class="col-md-3">
            <div class="footer-link ">
              <h5>Quick Links</h5>
              <ul>
                <li><a href="{{url('about')}}">About Us</a></li>
                <li><a href="3">Awards &amp; Accreditations</a></li>
                <li><a href="#">Our specialities</a></li>
                <li><a href="#">Centre of Excellence</a></li>
                <li><a href="{{url('contact')}}">Contact Us</a></li>
                <li><a href="#">Career</a></li>
                <li><a href="#">Blog</a></li>
                <li><a href="#">Media Coverage</a></li>
                <li><a href="{{url('find-a-doctor')}}">Find Doctor</a></li>
                <li><a href="#">Medical Packages</a></li>
                <li><a href="#">Health Library</a></li>
                <li><a href="#">Feedback</a></li>
                <li><a href="#">Career</a></li>
               </ul>
            </div>
          </div>
          <div class="col-md-3  ">
            <div class="footer-link">
              <h5>Address</h5>
              <p><i class="fa fa-map-marker" aria-hidden="true"></i> Plot No. 32-34, Knowledge Park III, Greater Noida,<br /> Uttar Pradesh - 201310</p>
              <p><a href="tel:8447333999"><i class="fa fa-phone" aria-hidden="true"></i>0120–36-99-999</a></p>
              <p><i class="fa fa-envelope-o" aria-hidden="true"></i> info@sharda.ac.in</p>
            </div>
            <div class="clearfix"></div>
            <div class="footer-social">
              {{--
              <ul>
                <li><a href="{{$layout_data['settings']->facebook_link}}" target="_blank"><i class="{{$layout_data['settings']->facebook_icon}}"></i></a></li>
                <li><a href="{{$layout_data['settings']->twitter_link}}" target="_blank"><i class="{{$layout_data['settings']->twitter_icon}}"></i></a></li>
                <li><a href="{{$layout_data['settings']->instagram_link}}" target="_blank"><i class="{{$layout_data['settings']->instagram_icon}}"></i></a></li>
                <li><a href="{{$layout_data['settings']->youtube_link}}" target="_blank"><i class="{{$layout_data['settings']->youtube_icon}}"></i></a></li>
                <li><a href="{{$layout_data['settings']->linkedin_link}}" target="_blank"><i class="{{$layout_data['settings']->linkedin_icon}}"></i></a></li>
              </ul> --}}
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="copyright">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <p>Copyright © {{date('Y')}} Sharda Care HealthCity  . All Rights Reserved</p>
          </div>
          <div class="col-md-6">
            <a href="#">Terms and Conditions</a>   
            <a href="#">Privacy Policy</a>
          </div>
        </div>
      </div>
    </section>
    <script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap5.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/slick.min.js') }} " language="javascript"></script>
    <script>
      $(document).ready((function(){$(".main_slider").slick({infinite:!0,slidesToShow:1,nav:!0,dots:!1,autoplay:!0,slidesToScroll:1}),
      $(".patient_slider").slick({infinite:!0,slidesToShow:5,nav:!1,dots:!1,autoplay:!0,slidesToScroll:1,responsive:[{breakpoint:1024,settings:{slidesToShow:5,slidesToScroll:1,infinite:!0,dots:!1}},
      {breakpoint:600,settings:{slidesToShow:3,slidesToScroll:1}},{breakpoint:480,settings:{slidesToShow:2,slidesToScroll:1}}]}),
      $(".latestpost_slider").slick({infinite:!0,slidesToShow:1,nav:!1,dots:!1,autoplay:!0,slidesToScroll:1,responsive:[{breakpoint:1024,settings:{slidesToShow:4,slidesToScroll:1,infinite:!0,dots:!1}},
      {breakpoint:600,settings:{slidesToShow:3,slidesToScroll:1}},
      {breakpoint:480,settings:{slidesToShow:2,slidesToScroll:1}}]}),
      $(".testi_slider").slick({infinite:!0,slidesToShow:4,nav:!1,dots:!1,autoplay:!0,slidesToScroll:1,responsive:[{breakpoint:1024,settings:{slidesToShow:4,slidesToScroll:1,infinite:!0,dots:!1}},
      {breakpoint:600,settings:{slidesToShow:3,slidesToScroll:1}},
      {breakpoint:480,settings:{slidesToShow:2,slidesToScroll:1}}]}),
      $(".programhighlightsslide").slick({infinite:!0,slidesToShow:4,nav:!1,dots:!1,autoplay:!0,slidesToScroll:1,responsive:[{breakpoint:1024,settings:{slidesToShow:4,slidesToScroll:1,infinite:!0,dots:!1}},
      {breakpoint:600,settings:{slidesToShow:3,slidesToScroll:1}},
      {breakpoint:480,settings:{slidesToShow:2,slidesToScroll:1}}]}),
      $(".taiup_slider").slick({infinite:!0,slidesToShow:4,nav:!1,dots:!1,autoplay:!0,slidesToScroll:1,responsive:[{breakpoint:1024,settings:{slidesToShow:4,slidesToScroll:1,infinite:!0,dots:!1}},
      {breakpoint:600,settings:{slidesToShow:3,slidesToScroll:1}},
      {breakpoint:480,settings:{slidesToShow:2,slidesToScroll:1}}]})}));
    </script>
    
    <script>
            $(document).ready(function() {
                $('.main_slider').slick({
                    infinite: true,
                    slidesToShow: 1,
                    nav: true,
                    dots: false,
                    autoplay: false,
                    slidesToScroll: 1, 
                });
				
				$('.ab_slider').slick({
                    infinite: true,
                    slidesToShow: 1,
                    nav: true,
                    dots: false,
                    autoplay: true,
                    slidesToScroll: 1, 
                });
				
                $('.patient_slider1').slick({
                    infinite: true,
                    slidesToShow: 5,
                    nav: false,
                    dots: false,
                    autoplay: true,
                    slidesToScroll: 1,
                    responsive: [{
         		        breakpoint: 1024,
         		        settings: {
                            slidesToShow: 5,
                            slidesToScroll: 1,
                            infinite: true,
                            dots: false
         		        }
         		    },
         		    {
         		        breakpoint: 600,
                        settings: {
                            slidesToShow: 3,
                            slidesToScroll: 1
                        }
         		    },
         		    {
         		        breakpoint: 480,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 1
                        }
         		    },
         	    ]
            });
            $('.latestpost_slider').slick({ 
             infinite: true,
             slidesToShow: 2,
             nav: false,
             dots: false,
             autoplay: true,
             slidesToScroll: 1,
         
             responsive: [{
                 breakpoint: 1024,
                 settings: {
                   slidesToShow: 2,
                   slidesToScroll: 1,
                   infinite: true,
                   dots: false
                 }
               },
               {
                 breakpoint: 600,
                 settings: {
                   slidesToShow: 3,
                   slidesToScroll: 1
                 }
               },
               {
                 breakpoint: 480,
                 settings: {
                   slidesToShow: 2,
                   slidesToScroll: 1
                 }
               },
             ]
           });
         $('.testi_slider').slick({
             infinite: true,
             slidesToShow: 4,
             nav: false,
             dots: false,
             autoplay: true,
             slidesToScroll: 1,
         
             responsive: [{
                 breakpoint: 1024,
                 settings: {
                   slidesToShow: 4,
                   slidesToScroll: 1,
                   infinite: true,
                   dots: false
                 }
               },
               {
                 breakpoint: 600,
                 settings: {
                   slidesToShow: 3,
                   slidesToScroll: 1
                 }
               },
               {
                 breakpoint: 480,
                 settings: {
                   slidesToShow: 2,
                   slidesToScroll: 1
                 }
               },
             ]
           });
         
         $('.programhighlightsslide').slick({
             infinite: true,
             slidesToShow: 4,
             nav: false,
             dots: false,
             autoplay: true,
             slidesToScroll: 1,
         
             responsive: [{
                 breakpoint: 1024,
                 settings: {
                   slidesToShow: 4,
                   slidesToScroll: 1,
                   infinite: true,
                   dots: false
                 }
               },
               {
                 breakpoint: 600,
                 settings: {
                   slidesToShow: 3,
                   slidesToScroll: 1
                 }
               },
               {
                 breakpoint: 480,
                 settings: {
                   slidesToShow: 2,
                   slidesToScroll: 1
                 }
               },
             ]
           });
         
         $('.taiup_slider').slick({
             infinite: true,
             slidesToShow: 5,
             nav: false,
             dots: false,
             autoplay: true,
             slidesToScroll: 1,
         
             responsive: [{
                 breakpoint: 1024,
                 settings: {
                   slidesToShow: 5,
                   slidesToScroll: 1,
                   infinite: true,
                   dots: false
                 }
               },
               {
                 breakpoint: 600,
                 settings: {
                   slidesToShow: 3,
                   slidesToScroll: 1
                 }
               },
               {
                 breakpoint: 480,
                 settings: {
                   slidesToShow: 2,
                   slidesToScroll: 1
                 }
               },
             ]
           });
         
         
         });
      </script>   

 <script>
// When the user scrolls the page, execute myFunction
window.onscroll = function() {myFunction()};

// Get the header
var header = document.getElementById("headermain");

// Get the offset position of the navbar
var sticky = header.offsetTop;

// Add the sticky class to the header when you reach its scroll position. Remove "sticky" when you leave the scroll position
function myFunction() {
  if (window.pageYOffset > sticky) {
    header.classList.add("sticky");
  } else {
    header.classList.remove("sticky");
  }
}
</script>

<script>
$("#header").hover(
  function () {
    $(this).addClass("colorchange");
  },
  function () {
    $(this).removeClass("colorchange");
  }
);
</script>

 <script>
	$(document).ready(function(){
		$("#sidebaropen").click(function(){
			$(".sidebaropen").toggleClass("open");
			$(".blackdiv").toggleClass("open");
			$(".color").toggleClass("change");
			$(".bi-grid-3x3-gap-fill").toggleClass("bi-x-lg");
		});
		
		 $("#sidebaropenleft").click(function(){
			 $(".sidebaropenleft").toggleClass("open"); 
			/*$(".blackdiv").toggleClass("open");*/
			$(".color").toggleClass("change");
			 
		}); 
		
		 /*$(".blackdiv").click(function(){
			 $(".blackdiv").toggleClass("open");
			 $(".sidebaropen").toggleClass("open");
			$(".bi-grid-3x3-gap-fill").toggleClass("bi-x-lg");
		}); */
		
		
		$("#menu-mobile").click(function(){
			$(".mobileopen").toggleClass("open");
			$(".blackdiv1").toggleClass("open");
			$(".color1").toggleClass("change1");
			$(".bi-list").toggleClass("bi-x-lg");
		});
		/*$("#morelink").click(function(){
			$(".morelink").toggleClass("more");
		});
		$("#coelink").click(function(){
			$(".coelink").toggleClass("more");
		});
		$("#speclink").click(function(){
			$(".speclink").toggleClass("more");
		});
		$("#closepopup").click(function () {
		$(".home-popup").css("display", "none");
		});
		timer = setTimeout(function () {
        $('.home-popup').addClass('d-none');
		}, 10000);*/
		
			
	});
</script>

<script>
    $(document).ready(function(){
  $(".imp-action").click(function(){
    $(".imp-info-data .rotate-arrow").toggleClass("up");
    $(".imp-data").slideToggle(200);
  });
});
    </script>
    
    <div class="sidebaropenleft">
      <span id="sidebaropenleft" class="color">
      	<strong>Emergency</strong>
      </span>
      <div class="sidebarformleft">
      		   <div class="sidebarform-inleft">
              <div class="contantde"> 
                    <i class="bi bi-telephone-fill"></i>
                    Emergency
                    <small>0120–36-99-999</small>
                </div>
<!--<div class="contantde"> 
                    <i class="bi bi-telephone-fill"></i>
                    Helpline
                    <small>000 000 0000</small>
                </div>-->
          
             <div class="clearfix"></div>
             </div>
              
      </div>
            
      
     </div>
     
  
  <div class="sidebaropen">
      <span id="sidebaropen" class="color">
      	<i class="bi bi-grid-3x3-gap-fill"></i>
      </span>
      <div class="sidebarform">
      		   <div class="sidebarform-in">
                    <a href="#"><div class="icon"><img src="{{ asset('assets/images/slide-1.png') }}"> </div> Blog</a>
                    <a href="#"><div class="icon"><img src="{{ asset('assets/images/slide-2.png') }}"></div> Media</a>
                    <a href="#"><div class="icon"><img src="{{ asset('assets/images/slide-3.png') }}"></div> My Reports</a>
                    <a href="#"><div class="icon"><img src="{{ asset('assets/images/slide-4.png') }}"></div> FeedBack</a>
                    <a href="#"><div class="icon"><img src="{{ asset('assets/images/slide-5.png') }}"></div> Career</a>
                    <a href="#"><div class="icon"><img src="{{ asset('assets/images/slide-5.png') }}"></div> Patient Services  </a>
                    <div class="clearfix"></div>
             </div>
      </div>      
     </div>
     <div class="blackdiv"></div>
    
    <div class="modal fade formpopup" id="bookappointment" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Book Appointment</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <div id="alert-container">
            <div id="alert-message" class="alert alert-success d-none" role="alert">
                  Book Appointment successfully!
            </div>
        </div>

       <form id="bookAppointmentForm">
        @csrf
       		<div class="bookforms">
                 <input type="text" placeholder="Name" name="name" required>
             
            </div>
            <div class="bookforms">
                 <input type="text" placeholder="Phone No" name="phone" required>
               
            </div>
            <div class="bookforms">
                 <input type="email" placeholder="Email Id" name="email" required>
                
            </div>
               <div class="bookforms">
                <!-- <select>
                	<option>Preferred Time To Call</option>
                </select> -->
                <input type="text" name="doctor_name" id="doctorNameInput" readonly>
            </div>
            
            <!-- <div class="bookforms">
                 <input type="text" placeholder="Capcha">
                 <div class="g-recaptcha" data-sitekey="6LeFhyAqAAAAADOc_yi89EFmjAuAXjte1F_TJlYV"></div>
            </div> -->
            
            <div class="bookforms">
                <button class="button1">Submit <span><i class="bi bi-arrow-right-short"></i></span></button>
            </div>
       
       </form>
      </div>
      
     <!-- <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>-->
    </div>
  </div>
</div>

<div class="modal fade formpopup" id="quickenquiry" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Quick Enquiry</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <div id="alert-container">
            <div id="salert-message" class="alert alert-success d-none" role="alert">
                 Enquiry submitted successfully!
            </div>
        </div>
       <form id="dataForm">
        
       		<div class="bookforms">
                 <input type="text" placeholder="Name" name="name" required>
                 @error('name')
                    <p style="color:red">{{ $message }}</p>
                  @enderror
            </div>
            <div class="bookforms">
                 <input type="text" placeholder="Phone No" name="phone" required>
                 @error('phone')
                    <p style="color:red">{{ $message }}</p>
                  @enderror
            </div>
            <div class="bookforms">
                 <input type="email" placeholder="Email Id" name="email" required>
                 @error('email')
                    <p style="color:red">{{ $message }}</p>
                  @enderror
            </div>
             <div class="bookforms">
                <input type="date" name="time_to_call" required>
            </div>
            
            <div class="bookforms">
                 <input type="text" placeholder="Capcha">
            </div>
            
            <div class="bookforms">
                <button class="button1" id="submit1">Submit <span><i class="bi bi-arrow-right-short"></i></span></button>
            </div>
       </form>
 
      </div>
     <!-- <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>-->
    </div>
  </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    $(document).ready(function() {
        $('#dataForm').on('submit', function(e) {
            e.preventDefault();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: '{{ route('quickenquiry') }}',
                type: 'POST',
                data: $(this).serialize(),
                dataType: 'json',  
                success: function(response) {
                  console.log('response',response);
                 
                    if (response.success) {
                      $('#salert-message').removeClass('d-none');
                        setTimeout(function() {
                          $('#salert-message').addClass('d-none');
                            $('#quickenquiry').modal('hide');
                            $('#dataForm')[0].reset();
                        }, 3000);
                    }
                },
                error: function(xhr) {
                        alert(xhr.responseJSON.message);

                }
            });
        });
    });



    //  Book Appointment

    $('#bookAppointmentForm').on('submit', function(e) {
            e.preventDefault();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: '{{ route('bookappointment') }}',
                type: 'POST',
                data: $(this).serialize(),
                dataType: 'json',  
                success: function(response) {
                  console.log('response',response);
                 
                    if (response.success) {
                      $('#alert-message').removeClass('d-none');
                        setTimeout(function() {
                          $('#alert-message').addClass('d-none');
                            $('#bookappointment').modal('hide');
                            $('#bookAppointmentForm')[0].reset();
                        }, 2000);
                    }
                },
                error: function(xhr) {
                        alert(xhr.responseJSON.message);

                }
            });
        });




        // Second Opinion Form
        
        $('#secondOpinion').on('submit', function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: '{{ route('secondOpinion') }}',
                type: 'POST',
                data: formData,
                processData: false, // Prevent jQuery from processing the data
                contentType: false, // Prevent jQuery from setting content type
                success: function(response) {
                  console.log('response',response);
                 
                    if (response.success) {
                      $('#second-op-alert-message').removeClass('d-none');
                        setTimeout(function() {
                          $('#second-op-alert-message').addClass('d-none');
                            $('#secondOpinion')[0].reset();
                        }, 4000);
                    }
                },
                error: function(xhr) {
                        alert(xhr.responseJSON.message);

                }
            });
        });

</script>
  </body>
</html>