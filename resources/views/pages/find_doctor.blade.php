@extends('layout')
@section('page_title', 'Doctor Profile')
@section('page-contents')
<style>
#checkname{
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
<div class="slider-innerpage">
	<div class="container">
    	<div class="row">
        	<div class="col-md-12">
            	<h1>Find a Doctor</h1>
           </div> 
            <div class="slider-form">    
             	<div class="row  justify-content-center">   
               
                       <div class="col-md-3">
						<select name="department" id="department">
                       
							<option value="">Search by Department</option>         
                            @foreach($doctorDepartments as $id => $name)
                                  <option value="{{ $id }}">{{ $name }}</option>
                            @endforeach					
                                                                         
						</select>
						</div>
                        <div class="col-md-3"> 
						<select name="gender" class="gender">
							<option value="">Search by Gender </option>
							<option value="All" selected="">All</option>
							<option value="M">Male</option>
							<option value="F">Female </option>
						</select>
                        </div>
                         <div class="col-md-3">
					   <input id="searchTxt" name="doctorName" type="search" placeholder="Search By Name">
                       </div>
					   <div class="clearfix"></div>
						
					</div>
                </div>    
            </div>
        </div>
    </div>
 

<div class="doc-listpage" >
	<div class="container">
    	<div class="row justify-content-center" id="doctorProfile">
         {{--
          @if(isset($data))
          @foreach($data as $doctor)
         
			<div class="col-md-3">
                <div class="find-dc-list">
                    <div class="images">
                   
                    @if ($doctor->DoctorProfilePic)
                         <img src="https://www.shardahospital.org/uploads/doctor/{{ $doctor->DoctorProfilePic }}" alt="">
                    @else
                         <img src="{{ asset('assets/images/doc.jpeg') }}" alt="" >
                    @endif
                  
                        <div class="contant ">
                            <div class="contant-in">
                                <h3>{{ $doctor->DoctorTitle }} {{ $doctor->DoctorName }}</h3>
                                <p> {{ $doctor->DepartmentName  }}</p>
                                <a href="#" class="button1 button1111" data-bs-toggle="modal" data-bs-target="#bookappointment" value="{{ $doctor->DoctorName }}">Book Appointment  </a>
                                <a href="{{ url('doctor_details/' . $doctor->DoctorID) }}" class="button1 button111">View Profile  </a>
                            </div>
                        </div>
                    </div>
                    <div class="contant2">
                        <div class="contant-in">
                            <h3> {{ $doctor->DoctorTitle }} {{ $doctor->DoctorName }}</h3>
                            <p>{{ $doctor->DepartmentName  }}</p>
                        </div>
                    </div>
                </div>
			</div>
          @endforeach
          @endif  
          --}} 
        </div>     
	</div>
</div> 

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
$(document).ready(function() {
    // Function to load doctors based on filter criteria
    function loadDoctors(filters = {}) {
        $.ajax({
            url: "{{ route('findDoctors') }}", // Adjust the route as necessary
            method: 'GET',
            data: filters,
            success: function(response) {
                $('#doctorProfile').empty();

                if (response.data.length > 0) {
                    $.each(response.data, function(index, doctor) {
                        var profilePic = doctor.DoctorProfilePic ? 
                            `https://www.shardahospital.org/uploads/doctor/${doctor.DoctorProfilePic}` : 
                            '{{ asset('assets/images/doc.jpeg') }}';

                        $('#doctorProfile').append(`
                            <div class="col-md-3">
                                <div class="find-dc-list">
                                    <div class="images">
                                        <img src="${profilePic}" alt="">
                                        <div class="contant">
                                            <div class="contant-in">
                                                <h3>${doctor.DoctorTitle} ${doctor.DoctorName}</h3>
                                                <p>${doctor.DepartmentName}</p>
                                                <button href="#" class="button1 button1111" id="checkname" onclick="getValue(this.value)" data-bs-toggle="modal" data-bs-target="#bookappointment" value="${doctor.DoctorTitle} ${doctor.DoctorName}">Book Appointment</button>
                                                <a href="{{ url('doctor_details/') }}/${doctor.DoctorID}" class="button1 button111">View Profile</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="contant2">
                                        <div class="contant-in">
                                            <h3>${doctor.DoctorTitle} ${doctor.DoctorName}</h3>
                                            <p style="display:block">${doctor.DepartmentName}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        `);
                    });
                } else {
                    $('#doctorProfile').html('<p>No doctors found.</p>');
                }
            },
            error: function(xhr, status, error) {
                alert('An error occurred: ' + error);
            }
        });
    }

    // Load all doctors on page load
    loadDoctors();

    // Gender filter change event
    $('.gender').change(function() {
        var gender = $(this).val();
        console.log('gender', gender);
        var department = $('#department').val(); // Get current department value
        loadDoctors({ gender: gender, department: department });
    });

    // Department filter change event
    $('#department').change(function() {
        var department = $(this).val();
        console.log('department', department);
        var gender = $('.gender').val(); // Get current gender value
        loadDoctors({ department: department, gender: gender });
    });
});




$('#searchTxt').keyup(function() {
 
     var doctorName = $(this).val();

     $.ajax({
            url: "{{ route('findDoctors') }}",
            method: 'GET',
            data: { doctorName: doctorName },
            success: function(response) {
                console.log('response',response)
                $('#doctorProfile').empty();
                
                if (response.data.length > 0) {
                    $.each(response.data, function(index, doctor) {

                        var profilePic = doctor.DoctorProfilePic ? 
                                                `https://www.shardahospital.org/uploads/doctor/${doctor.DoctorProfilePic}` : 
                                                '{{ asset('assets/images/doc.jpeg') }}';
                        $('#doctorProfile').append(`
                            <div class="col-md-3">
                                <div class="find-dc-list">
                                    <div class="images">
                                        <img src="${profilePic}" alt="">
                                        <div class="contant">
                                            <div class="contant-in">
                                                <h3>${doctor.DoctorTitle} ${doctor.DoctorName}</h3>
                                                <p>${doctor.DepartmentName}</p>
                                                <a href="#" class="button1 button1111"  id="checkname" onclick="getValue(this.value)" data-bs-toggle="modal" data-bs-target="#bookappointment" value="Dr. Aakarsh  Mahajan">Book Appointment</a>
                                                <a href="{{ url('doctor_details/') }}/${doctor.DoctorID}" class="button1 button111">View Profile</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="contant2">
                                        <div class="contant-in">
                                            <h3>${doctor.DoctorTitle} ${doctor.DoctorName}</h3>
                                            <p style="display:block">${doctor.DepartmentName}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        `);
                    });
                } else {
                    $('#doctorProfile').html('<p>No doctors found.</p>');
                }
            },
            error: function(xhr, status, error) {
                alert('An error occurred: ' + error);
            }
        });
     
});


// Doctor's Name in Book Appointment  

function getValue(buttonValue){
    document.getElementById('doctorNameInput').value = buttonValue;
    
}

</script>


@endsection





    