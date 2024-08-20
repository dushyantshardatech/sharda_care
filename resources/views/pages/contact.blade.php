@extends('layout')
@section('page_title', 'Contact Us')
@section('page-contents')
<div class="slider-innerpage">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Contact Us</h1>
            </div>
        </div>
    </div>
</div>
<section class="contacts">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="contact-detail contact-detail-add">
                    <h4>Contact Details</h4>
                    <p>Want to get in touch? Please reach out to the following contact details</p>

                    <ul>
                        <li><i class="bi bi-globe" aria-hidden="true"></i> Plot No. 32-34, Knowledge Park III,Greater Noida, Uttar Pradesh 201310</li>
                        <li><i class="bi bi-envelope" aria-hidden="true"></i> info@sharda.ac.in</li>
                        <li><i class="bi bi-phone" aria-hidden="true"></i> +0120–36-99-999</li>
                    </ul>
                </div>
            </div>
            <div class="col-md-7">
            @if(session('message'))
                <h6 class="alert alert-success" style="width: 50%; text-align: center;">
                    {{ session('message') }}
                </h6>
            @endif
            <div id="alert-container">
                <div id="alert-message" class="alert alert-success d-none" role="alert">
                        Thanks For Contacting Us!
                </div>
            </div>
              <form id="contactForm">
                @csrf
                <div class="contact-form">
                    <h4>Get in Touch</h4>
                    <p>Please submit your query in the following form.</p>
                    <div class="row justify-content-center">
                        <div class="col-md-6">
                            <input type="text" name="first_name" id="first_name" placeholder="First Name" required/>
                            @error('first_name')
                                <p style="color:red">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <input type="text" name="last_name" id="last_name" placeholder="Last Name" required/>
                            @error('last_name')
                            <p style="color:red">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-md-6">
                            <input type="text" name="phone" id="name" placeholder="Contact Number "  required/>
                            @error('phone')
                            <p style="color:red">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <input type="email" name="email" id="name" placeholder="Email ID" required/>
                            @error('email')
                            <p style="color:red">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-md-4">
                            
                            <select name="country_id" id="country" required>
                                <option value=""> -- Select Country --</option>
                                @foreach($contact as $key => $con)
                                <option value="{{ $key }}">{{ $con }}</option>
                                @endforeach
                            </select>
                            
                            @error('country')
                            <p style="color:red">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <select name="state_id" id="state" required>
                                
                            </select>
                        </div>
                        <div class="col-md-4">
                            <select name="city_id" id="city" required>
                                
                            </select>
                            
                        </div>
                        
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-md-12">
                            <textarea name="message" id="message" placeholder="Your Enquiry" required></textarea>
                            @error('message')
                            <p style="color:red">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="row justify-content-center">
                        <div class="col-md-12">
                            <button id="submit" value="Submit" name="submit" onclick="return validateregistrationform()" class="button1">Submit <i class="bi bi-arrow-right"></i></button>
                        </div>
                    </div>
                </div>
              </form>
            </div>
        </div>
    </div>
</section>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#country').on('change', function () {
                var idCountry = this.value;
                console.log('idCountry',idCountry);
                $("#state").html('');
                $.ajax({
                    url: "{{route('fetchState')}}",
                    type: "POST",
                    data: {
                        country_id: idCountry,
                        _token: '{{ csrf_token() }}'
                    },
                    // dataType: 'json',
                    success: function (result) {
                        console.log('result',result);
                        $('#state').html('<option value="">Select State</option>');
                        $.each(result.states, function (key, value) {
                            $("#state").append('<option value="' + value
                                .id + '">' + value.name + '</option>');
                        });
                        $('#city').html('<option value="">Select City</option>');
                    }
                });
            });
            $('#state').on('change', function () {
                var idState = this.value;
                $("#city").html('');
                $.ajax({
                    url: "{{route('fetchCity')}}",
                    type: "POST",
                    data: {
                        state_id: idState,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function (res) {
                        console.log('res',res);
                        $('#city').html('<option value="">Select City</option>');
                        $.each(res.cities, function (key, value) {
                            $("#city").append('<option value="' + value
                                .id + '">' + value.name + '</option>');
                        });
                    }
                });
            });
        });




        // Contact Form 

        $('#contactForm').on('submit', function(e) {
            e.preventDefault();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: '{{ route('store_contact')}}',
                type: 'POST',
                data: $(this).serialize(),
                dataType: 'json',  
                success: function(response) {
                  console.log('response',response);
                 
                    if (response.success) {
                      $('#alert-message').removeClass('d-none');
                        setTimeout(function() {
                          $('#alert-message').addClass('d-none');
                            $('#contactForm')[0].reset();
                        }, 3000);
                    }
                },
                error: function(xhr) {
                        alert(xhr.responseJSON.message);

                }
            });
        });

    </script>

@endsection