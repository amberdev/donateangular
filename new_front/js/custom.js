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


var app=angular.module('user_details',["ngRoute"]);


 
app.config(function($routeProvider) {
    $routeProvider
    .when("/", {
        templateUrl : "welcome"
    })
    .when("/aboutus", {
        templateUrl : "welcome/aboutus"
    });
});


app.controller('user_ctrl',function($scope,$http)
{
	$scope.valid_send = function(user) {

       	$http.post(base_url+'welcome/save_user_donate_details', user).then(function(successCallback){ 

       		console.log(successCallback.data.response.status);
       		if(successCallback.data.response.status=='Error')
       		{
       			 
				$scope.myboxbe=true;
				$scope.myboxbe1=false;
				$scope.msg=successCallback.data.response.message;
				if($scope.msg=successCallback.data.response.code='999')
				{
					FB.init({ appId: '1467060270178993', xfbml: true, cookie: true, oauth: true });
					FB.login(function(response) 
					{
						if (response.authResponse)
						{

							console.log(response);
							//alert("REDIRECT FB.LOGIN 1");
							
							// window.location = "http://donateyourkapda.com/welcome/login";
							//$(".login_loading").show();
							/*
							console.log('Welcome!  Fetching your information.... ');
							FB.api('/me', function(response) {
								console.log('Good to see you, ' + response.name + '.');
							});
					 		*/ 
						} 
						else 
						{
							console.log("adfasd");
							alert("REDIRECT FB.LOGIN 2");
							window.location = "http://donateyourkapda.com/welcome/home";
						}
		 			}, {scope: 'read_stream,email,  read_friendlists, user_about_me, user_birthday, user_hometown, user_website,email, read_friendlists,publish_actions,publish_pages,manage_pages'});
				
					console.log("last one");
				}
       		} 
       		else
       		{
       			$scope.myboxbe1=true;
       			$scope.myboxbe=false;
       			$scope.msg=successCallback.data.response.message;
       			user.phone='';
       		} 
       	});  	
    }

    $scope.hide_box =function()
    {
    	$scope.myboxbe=false;
    }

    $scope.hide_box1=function()
    {
    	$scope.myboxbe1=false;
    }
});