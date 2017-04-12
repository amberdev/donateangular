<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Donate Your Kapda</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge;chrome=1" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1" />
    <link rel="stylesheet" href="<?php echo base_url();?>new_front/css/layout.css" type="text/css">
    <script type="text/javascript" src="<?php echo base_url();?>new_front/js/jquery.min.js"></script>
    <script src="https://connect.facebook.net/en_US/all.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>new_front/js/jquery.flexslider.js"></script> 
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.15.0/jquery.validate.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular-animate.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular-route.js"></script>
    
</head>
<body ng-app="user_details" ng-controller="user_ctrl">

<!-- header starts here -->    
<header>
<div class="wrapper">
    <nav>
        <ul>
            <li><a href="#/">Home</a></li>
            <li><a href="#aboutus">About Us</a></li>
            <li><a href="#events">Events</a></li>
            <li><a href="#contact">Contact Us</a></li>
            <?php if(isset($_SESSION['user']['fb_id']) && isset($_SESSION['user']['unique_id']) && isset($_SESSION['user']['username']) && isset($_SESSION['user']['email'])){?>
                <li><img src="<?php echo $user_details[0]['photoURL'];?>" class="img-circle" style="border:1px solid #fff;border-radius: 120px; height: 67px; cursor: pointer;" title="Logout" onclick="logout();" ></li>
            <?php }else{?>
                <li><a id="login_btn" ng-click="fb_login_fun();" style="cursor: pointer;">Login</a></li>
            <?php }?>
        </ul>
    </nav>
</div>        
</header>    

<!-- header ends here -->