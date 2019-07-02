<!-- Preloader -->
<div class="preloader">
  <div class="cssload-speeding-wheel"></div>
</div>
<section id="wrapper" class="new-login-register">
  <div class="lg-info-panel">
    <div class="inner-panel" style="background-image: <?php echo base_url('plugins/images/wallpaper.jpg'); ?>">
      <a href="javascript:void(0)" class="p-20 di"><img src="<?php echo base_url('plugins/images/logo.png') ?>" width="90px" height="90px"></a>
      <div class="lg-content">
        <h2>DELTA STATE TOURISM BOARD GEOGRAPHICAL INFORMATION RETRIEVAL SYSTEM</h2>
        <p class="text-muted">with this App you can get information about locations to thousands of cities, towns, etc. in Delta State and many more... </p>
        <a href="<?php echo site_url('login'); ?>" class="btn btn-default p-l-20 p-r-20"> Sign In Now</a>
    </div>
</div>
</div>
<div class="new-login-box">
    <div class="white-box">
        <h3 class="box-title m-b-0">Sign Up to Use the App</h3>
        <small>Enter your details below</small>
        <form class="form-horizontal new-lg-form" method="post" id="loginform" action="<?php echo site_url('register'); ?>">
            <div class="form-group ">
                <div class="col-xs-12">
                    <input class="form-control" type="text" required="" placeholder="First Name" name="first_name" value="<?php echo set_value('first_name') ?>"> 
                   
                </div>
            </div>
            <div class="form-group ">
                <div class="col-xs-12">
                    <input class="form-control" type="text" required="" placeholder="Last Name" name="last_name" value="<?php echo set_value('last_name') ?>"> 
                </div>
            </div>
            <div class="form-group ">
               <div class="col-xs-12">
                   <input class="form-control" type="email" required="" placeholder="Email" name="email" value="<?php echo set_value('email') ?>">
            </div>
        </div>
        <div class="form-group ">
            <div class="col-xs-12">
                <input class="form-control" type="password" required="" placeholder="Password" name="password" value="<?php echo set_value('password') ?>"> 
            </div>
        </div>
        <div class="form-group">
            <div class="col-xs-12">
                <input class="form-control" id="password-confirmed" type="password" required="" placeholder="Confirm Password" name="cpassword"> </div>
            </div>
            <div class="form-group text-center m-t-20">
                <div class="col-xs-12">
                    <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Sign Up</button>
                </div>
            </div>
            <div class="form-group m-b-0">
                <div class="col-sm-12 text-center">
                    <p>Already have an account? <a href="<?php echo site_url('login') ?>" class="text-danger m-l-5"><b>Sign In</b></a></p>
                </div>
            </div>
        </form>
    </div>
</div>            
</section>