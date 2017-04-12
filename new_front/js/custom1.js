// header function


var base_url="http://donateyourkapda.com/";
	
    FB.init({ appId: '1467060270178993', xfbml: true, cookie: true, oauth: true });

	$("#login_btn").click(function(){

	 FB.login(function(response) {
			if (response.authResponse) {
				//alert("REDIRECT FB.LOGIN 1");
				
				window.location = "http://donateyourkapda.com/welcome/login";
				//$(".login_loading").show();
				/*
				console.log('Welcome!  Fetching your information.... ');
				FB.api('/me', function(response) {
					console.log('Good to see you, ' + response.name + '.');
				});
		 		*/
				
				
			} else {
				//alert("REDIRECT FB.LOGIN 2");
				window.location = "http://donateyourkapda.com/welcome/home";
			}
		 }, {scope: 'read_stream,email,  read_friendlists, user_about_me, user_birthday, user_hometown, user_website,email, read_friendlists,publish_actions,publish_pages,manage_pages'});
     });


/*Validation Script goes here*/
	
	$(document).ready(function() {

jQuery.validator.addMethod("phoneno", function(phone_number, element) {
          phone_number = phone_number.replace(/\s+/g, "");
          return this.optional(element) || phone_number.length == 10 && 
          phone_number.match(/^((\+[1-9]{1,4}[ \-]*)|(\([0-9]{2,3}\)[ \-]*)|([0-9]{2,4})[ \-]*)*?[0-9]{3,4}?[ \-]*[0-9]{3,4}?$/);
      }, "<br />Please specify a valid phone number");

  $('#sub_btn').on('click', function() {
    var valid_frm=$("#basic_info").valid();
  
    if(valid_frm)
    {
      var email=$("#email").val();
      var phone=$("#phone").val();
      var address=$("#address").val();
      var country=$("#country").val();
      var city=$("#city").val();
      var donate_details_n=$("#donate_details_n").val();

      var dataString="email="+email+"&phone="+phone+"&address="+address+"&country="+country+"&city="+city+"&donate_details_n="+donate_details_n;
       
      var save_other_info_url=base_url+"welcome/save_other_user_detail/"
      $.ajax({
            url: save_other_info_url,
            type: 'GET',
            data: dataString,
            success: function(data) {
            	if(data=='save')  
            	{
					FB.login(function(response) {
					if (response.authResponse) {
					//alert("REDIRECT FB.LOGIN 1");

					window.location = "http://donateyourkapda.com/welcome/login";
					//$(".login_loading").show();
					/*
					console.log('Welcome!  Fetching your information.... ');
					FB.api('/me', function(response) {
					console.log('Good to see you, ' + response.name + '.');
					});
					*/


					} else {
					//alert("REDIRECT FB.LOGIN 2");
					window.location = "http://donateyourkapda.com/welcome/home";
					}
					}, {scope: 'read_stream,email,  read_friendlists, user_about_me, user_birthday, user_hometown, user_website,email, read_friendlists,publish_actions,publish_pages,manage_pages'});
					
            	}
                if(data=='bad')
                {
                  alert("Somthing Went Wrong! Please Try Again");
                }
                if(data=='ok')
                {
                  location.reload();
                }
            },
            error: function(e) {
                
            }
        });
    }
});


  $("form[name='basic_info']").validate({
    rules: {
      email: {
        required: true,
        email: true
      },
      phone: {required:true, phoneno:true},
      address: "required",
      country: "required",
      city: "required",
      donate_details_n: "required"
       
    },
     
    messages: {
      phone: "Please enter your phone number",
      address: "Please enter address",
      country: "Please enter country",
      city: "Please enter city",
      email: "Please enter a valid email address",
      donate_details_n: "Please Fill Donateion Details."
    },
    
    submitHandler: function(form) {
      form.submit();
    }
  });

});

	function logout()
	{
		FB.getLoginStatus(function(response) 
		{
			if (response && response.status === 'connected') 
			{
				FB.logout(function(response) {
					document.location.href="http://donateyourkapda.com/welcome/logout";
				});
			}
		});
	}




$(window).scroll(function() {
	$("header").each(function() {
		var pageScrolled = $(window).scrollTop();
		//console.log(pageScrolled);
		if ( 250 < pageScrolled ) { $(this).addClass('fixedheader fadeInDown'); }
		else { $(this).removeClass('fixedheader fadeInDown'); }
	});   
});

// flexslider function
$(window).load(function() {
  $('.flexslider').flexslider({
    slideshowSpeed:  9000,
    animation: "slide"
  });
});




