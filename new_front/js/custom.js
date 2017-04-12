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
				if(successCallback.data.response.code=='999')
				{
					
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


    $scope.fb_login_fun=function()
    {

    	$http.post(base_url+'welcome/login', {user_data:"{'name':'abc'}",friends:"{'name':'abc'}"}).then(function(successCallback){ 
										console.log(successCallback);
									}); 

    	FB.init({ appId: '1467060270178993', xfbml: true, cookie: true, oauth: true });
					FB.login(function(response) 
					{
						
						if (response.authResponse)
						{

							FB.api('/me', {fields: 'picture,id,link,name,first_name,last_name,email,birthday,education,gender,hometown,location'},function(me_response){
								var response_frnds= new Array();
								FB.api('/me/friends',{
									fields: 'name,id,picture.width(100).height(100)'
								}, function(response_frnds) {
 
									console.log(response_frnds);

								$http.post(base_url+'welcome/login', {user_data:me_response,friends:response_frnds}).then(function(successCallback){ 
										console.log(successCallback);
									}); 
									 

									console.log(me_response);

								});
							});
							
							
							
						} 
						else 
						{
							
							// window.location = "http://donateyourkapda.com/welcome/home";
						}
		 			}, {scope: 'user_friends,read_stream,email, user_about_me, user_birthday, user_hometown, user_website,email, publish_actions,publish_pages,manage_pages'});
				
					console.log("last one");

    }


});