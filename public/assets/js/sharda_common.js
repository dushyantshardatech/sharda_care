/***
 * Javascript For All Sharda Pages
 * 
 * This script is intended to provide all client side functionality 
 * required for Techgig Project
 * 
 * Author   : Arun George
 * Created  : 20 Aug, 2018
 */
Sharda_CommonFunction = new function () {
    var $instance = this;

    $instance.init = function () {

        $('[data-toggle="tooltip"]').tooltip();

        $("#apply-to-sharda .more-info").click(function () {
            //$("#apply-to-sharda .overlay").css("opacity", "1");
            $("#apply-to-sharda .overlay").show();
        });
        $("#apply-to-sharda .close-overlay").click(function () {
            //$("#apply-to-sharda .overlay").css("opacity", "0");
            $("#apply-to-sharda .overlay").hide();
        });

        $(window).on('scroll', function (e) {
            var left = $(this).scrollLeft();
            $('.scrolling-menu').css('left', -left);
        });
        $(".journal-main-menu").click(function () {
            $(this).toggleClass("active");
            $("#" + this.id + " .journal-sub-menu").toggle("500");
        });
		
		$("#notification .bell-icon").click(function () {
            $("#notification .content").toggleClass("active");
        });
		$("#notification .content header .close").click(function () {
            $("#notification .content").removeClass("active");
        });

     

    /*
     * Onclick step1 validate and check current status
     */
    $("#sendverificationotp").on("click", function (e) {
         var mobile = $("#mob").val();
alert(mobile); return false;
        if (typeof mobile == 'undefined') { mobile = ''; }
        
        var emailReg = /^[a-z0-9]+([-._][a-z0-9]+)*@([a-z0-9]+(-[a-z0-9]+)*\.)+[a-z]{2,4}$/;
         $("#mob").parent().removeClass('has-error');
         $("#user_otp").parent().removeClass('has-error');

        var error_flag = 'N';
       
        if (mobile == '') {
            $("#mob").parent().addClass("has-error");
            error_flag = 'Y';
        } else if (!mobile.match('[0-9]{10}')) {
            $("#mob").parent().addClass("has-error");
            error_flag = 'Y';
        }

        if (error_flag == 'N') {
            $('.submit_info').show();
            // Send OTP request to api to save the data
            $.ajax({
                url: $('body').attr('data-base-url') + 'home/sendVerificationSMS',
                method: 'post',
                data: {
                    name: name,
                    email: email,
                    mob: mobile,
                    country: country
                }
            }).done(function (response) {
                $('.submit_info').hide();
                $('#resend_otp').html('');
                $('#resend_otp').html('<span id="resend_otp">Resend OTP</span>');
                $("<p style='color:green;' id='msg_div'>OTP send successfully</p>").insertAfter("#submit_info");
                setTimeout(function () { $('#msg_div').slideUp("slow"); }, 4000);
                return false;

            });
        }
        return false;
    });

   
    /*
     * Onclick step2 validation
     */
    $(".step2").on("click", function (e) {

        var dob = $("#dateofbirth").val();
        var gender = $('input:radio[name=gender]:checked').val();
        var city = $("#city").val();
        var state = $("#state").val();
        var pincode = $("#pincode").val();
        var address = $("#address").val();
        var regis_id = $("#regis_id").val();

        if (typeof dob == 'undefined') { dob = ''; }
        if (typeof gender == 'undefined') { gender = ''; }
        if (typeof city == 'undefined') { city = ''; }
        if (typeof state == 'undefined') { state = ''; }
        if (typeof pincode == 'undefined') { pincode = ''; }
        if (typeof address == 'undefined') { address = ''; }

        $("#dateofbirth").parent().removeClass('has-error');
        $("#gender").parent().removeClass('has-error');
        $("#address").parent().removeClass('has-error');
        $("#city").parent().removeClass('has-error');
        $("#state").parent().removeClass('has-error');
        $("#pincode").parent().removeClass('has-error');

        var error_flag = 'N';
        if (dob == '') {
            $("#dateofbirth").parent().addClass("has-error");
            error_flag = 'Y';
        }
        if (gender == '') {
            $("#gender").parent().addClass("has-error");
            error_flag = 'Y';
        }
        if (address == '') {
            $("#address").parent().addClass("has-error");
            error_flag = 'Y';
        }
        if (city == '') {
            $("#city").parent().addClass("has-error");
            error_flag = 'Y';
        }
        if (state == '') {
            $("#state").parent().addClass("has-error");
            error_flag = 'Y';
        }
        if (pincode == '') {
            $("#pincode").parent().addClass("has-error");
            error_flag = 'Y';
        }
        if (error_flag == 'N') {
            $("#divdob_msg").remove();
            $("#divgender_msg").remove();
            $("#divaddress_msg").remove();
            $("#divcity_msg").remove();
            $("#divstate_msg").remove();
            $("#divpincode_msg").remove();

            // Send request to api to save the step1 data
            $.ajax({
                url: $('body').attr('data-base-url') + 'apply/applyStepTwo',
                method: 'post',
                data: {
                    regis_id: regis_id,
                    dob: dob,
                    gender: gender,
                    address: address,
                    city: city,
                    state: state,
                    pincode: pincode
                }
            }).done(function (response) {
                if (response > 0) {
                    $("#step2").hide();
                    $("#step3").show();
                    $("#applystep3").addClass('active');
                    return false;
                } else {
                    var obj = jQuery.parseJSON(response);
                    if (obj.dob) {
                        $("<span style='color:red;' id='divdob_msg'>" + obj.dob + "</span>").insertAfter("#dateofbirth");
                    }
                    if (obj.gender) {
                        $("<span style='color:red;' id='divgender_msg'>" + obj.gender + "</span>").insertAfter("#gender");
                    }
                    if (obj.address) {
                        $("<span style='color:red;' id='divaddress_msg'>" + obj.address + "</span>").insertAfter("#address");
                    }
                    if (obj.city) {
                        $("<span style='color:red;' id='divcity_msg'>" + obj.city + "</span>").insertAfter("#city");
                    }
                    if (obj.state) {
                        $("<span style='color:red;' id='divstate_msg'>" + obj.state + "</span>").insertAfter("#state");
                    }
                    if (obj.pincode) {
                        $("<span style='color:red;' id='divepincode_msg'>" + obj.pincode + "</span>").insertAfter("#pincode");
                    }
                }

                return false;
            });


        }
        return false;
    });

   
}
}

// Perform onclick event to populateCourse 
function populateCourse(discipline_value) {
    var programme_id = $('input:radio[name=programme_name]:checked').val();
    var discipline = $('input:radio[name=discipline]:checked').val();
    $.ajax({

        url: $('body').attr('data-base-url') + 'search/getDisciplineCourse',
        method: 'post',
        data: {
            id: $(this).attr('data-src'),
            programme_id: programme_id,
            discipline: discipline
        }
    }).done(function (response) {
        $('.search-discipline').html('');
        $('.search-discipline').html(discipline_value);
        $('#search_course').html('');
        $('#search_course').html(response);
        $("#course").addClass('active');
        $("#select-course-lnk").addClass('active');
        $("#discipline-lnk").removeClass('active');
        $("#discipline").removeClass('active');
        $("#discipline").addClass('selected');
        $("#programme").removeClass('active');
        $("#undergraduate-lnk").removeClass('active');
        return false;
    });
}