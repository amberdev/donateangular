<?php $this->load->view('new_includes/header');?>

<!-- slider starts here -->

<div class="slider_section">
    <div class="flexslider">
        <ul class="slides">
            <li class="slideone">
                <div class="wrapper">
                <h1>SECOND HAND CLOTHES,<br>FIRST HAND LOVE.</h1>
                <p>Your old clothes can bring someone a new smile.</p>
                <a href="donate.html" class="button">Donate Now</a>
                </div>
            </li>
                <li class="slidetwo">
                <div class="wrapper">
                <h1>SECOND HAND CLOTHES,<br>FIRST HAND LOVE.</h1>
                <p>Your old clothes can bring someone a new smile.</p>
                <a href="donate.html" class="button">Donate Now</a>
                </div>  
            </li>
                <li class="slidethree">
                <div class="wrapper">
                <h1>SECOND HAND CLOTHES,<br>FIRST HAND LOVE.</h1>
                <p>Your old clothes can bring someone a new smile.</p>
                <a href="donate.html" class="button">Donate Now</a>
                </div>  
            </li>
        </ul>
    </div>
</div>   
<!-- slider ends here --> 
  
<div class="grey-bg-sec">
    <!-- donate box starts here -->
    <div class="donate-box wrapper" >
        <h2>Donate Kapda’s</h2>
        <p>Please fill the details below for more information.</p>
        <form name="basic_info" id="basic_info" action="" method="post">
     
        <input type="hidden" name="boxbe" ng-model="myboxbe" > 

        <div class="alert" ng-show="myboxbe">
            <span class="closebtn" ng-click="hide_box();">&times;</span> 
            <strong>Warning!</strong> {{msg}}
        </div>  
         
        <div id="alert" ng-show="myboxbe1">
            <span id="closebtn" ng-click="hide_box1();">&times;</span> 
            <strong>Message!</strong> {{msg}}
        </div>
            
        <div class="clear space30"></div>
        
        <div class="left-donate-box">

        <textarea name="donate_details_n"  ng-model="donate_details" id="donate_details_n"  placeholder="Enter details of your kapda’s*" ng-required="true"></textarea>

        <input type="text" name="address" ng-model="user.address" id="address" placeholder="Address*" class="name-input" >
        </div>
        
        <div class="right-donate-box">
            <input type="text" name="phone" id="phone" ng-model="user.phone"   placeholder="Phone Number*" class="name-input">
            <input type="text" name="email" id="email" ng-model="user.email"  placeholder="Email Address*" class="email-input" >
            <input type="text" name="city" id="city" ng-model="user.city" placeholder="City*" >
            <input type="text" name="country" id="country" ng-model="user.country" style="margin: 5px 0px 0px 0px;"  placeholder="Country*" > 
        </div>  
         
        <div class="clear space30"></div>
        <input type="button" ng-click="valid_send(user);" style="cursor: pointer;" name="" id="sub_btn" value="Donate Now" class="button donate-box-btn">
        </form>
        <div class="clear"></div>
    </div>    
    <!-- donate box ends here -->
        
    <!-- trending events starts here -->
    <div class="tending-events-sec wrapper">
            <h3>Trending Events</h3>
            
            <div class="event-col">
                <div class="event-img"><img src="<?php echo base_url();?>new_front/images/event-img-one.png" alt=""></div>
                <div class="event-content">
                    <h4>#Dummyheadingtitle</h4>
                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euis mod tincidunt ut laoreet dolore...</p>
                    <a href="#">View Event</a>
                </div>
            </div>
            <div class="event-col">
                <div class="event-img"><img src="<?php echo base_url();?>new_front/images/event-img-two.png" alt=""></div>
                <div class="event-content">
                    <h4>#Dummyheadingtitle</h4>
                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euis mod tincidunt ut laoreet dolore...</p>
                    <a href="#">View Event</a>
                </div>
            </div>  
            <div class="event-col last-event-col">
                <div class="event-img"><img src="<?php echo base_url();?>new_front/images/event-img-three.png" alt=""></div>
                <div class="event-content">
                    <h4>#Dummyheadingtitle</h4>
                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euis mod tincidunt ut laoreet dolore...</p>
                    <a href="#">View Event</a>
                </div>
            </div>
            
            <div class="clear space50"></div>
            <div class="space30"></div>
            
            <a href="#" class="button explore-events-btn">Explore Events</a>
            
            <div class="clear space50"></div>
            <div class="space30"></div>
            
    </div>    
        <!-- trending events ends here -->    
</div>        
    
<!-- about fold starts here -->
<div class="about-fold">
    <div class="wrapper">
        
        <div class="about-fold-left">
            <h5>Making Amazing<br>Things Happens</h5>
            <p>Find out what we are all about</p>
            <a href="about.html" class="button">Learn More</a>
        </div>
        <div class="about-fold-right">
            <img src="<?php echo base_url();?>new_front/images/donation-box.png" alt="">
        </div>
        
    </div>    
</div>    
<!-- about fold ends here -->    
    
<!-- how it works starts here -->
<div class="how-it-works wrapper">
    <h5>How it works</h5>
    
    <div class="how-it-works-col">
        <img src="<?php echo base_url();?>new_front/images/how-it-works-icon-one.png" alt="">
        <h6>Send your Details</h6>
        <p>Lorem ipsum dolor sit amet, consectet adipiscing elit, sed diam nonummy.</p>
    </div>
    <div class="how-it-works-col">
        <img src="<?php echo base_url();?>new_front/images/how-it-works-icon-two.png" alt="">
        <h6>We Pick Clothes</h6>
        <p>Lorem ipsum dolor sit amet, consectet adipiscing elit, sed diam nonummy.</p>
    </div>   
    <div class="how-it-works-col last-how-it-works-col">
        <img src="<?php echo base_url();?>new_front/images/how-it-works-icon-three.png" alt="">
        <h6>Donate to Needies</h6>
        <p>Lorem ipsum dolor sit amet, consectet adipiscing elit, sed diam nonummy.</p>
    </div>
    
    <div class="clear space50"></div>
    <div class="space50"></div>
    <div class="space30"></div>
    
</div>    
<!-- how it works ends here -->   
    
<?php $this->load->view('new_includes/footer');?>