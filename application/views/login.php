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
          <a href="<?php echo site_url('register'); ?>" class="btn btn-danger p-l-20 p-r-20"> Sign Up Now</a>
      </div>
    </div>
  </div>
  <div class="new-login-box">
    <div class="white-box">
      <h3 class="box-title m-b-0">Sign In to the App</h3>
      <small>Enter your details below</small>
      <form class="form-horizontal new-lg-form" id="loginform" method="POST" action="<?php echo site_url('login'); ?>">
        <?php if (!empty($this->session->flashdata('error_message'))): ?>
          <div  class="row">
            <div class="col-md-12">
              <?php 
              echo $this->session->flashdata('error_message');
              $this->session->set_flashdata('error_message', '');
              ?>
            </div>
          </div>
        <?php endif; ?>
        <div class="form-group  m-t-20">
          <div class="col-xs-12">
            <label>Email</label>
            <input class="form-control" type="email" name="email" required placeholder="Email" autofocus required value="<?php echo set_value('email'); ?>" />
          </div>
        </div>
        <div class="form-group">
          <div class="col-xs-12">
           <label>Password</label>
           <input id="password" type="password" class="form-control" name="password" placeholder="Password" required value="<?php echo set_value('password'); ?>" />
         </div>
       </div>
       <div class="form-group text-center m-t-20">
        <div class="col-xs-12">
          <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Log In</button>
        </div>
      </div>
      <div class="form-group m-b-0">
        <div class="col-sm-12 text-center">
          <p>Don't have an account? <a href="<?php echo site_url('register'); ?>" class="text-primary m-l-5"><b>Sign Up</b></a></p>
        </div>
      </div>
    </form>
    <form class="form-horizontal" id="recoverform" action="<?php echo site_url('password/request'); ?>">
      <div class="form-group ">
        <div class="col-xs-12">
          <h3>Recover Password</h3>
          <p class="text-muted">Enter your Email and instructions will be sent to you! </p>
        </div>
      </div>
      <div class="form-group ">
        <div class="col-xs-12">
          <input class="form-control" type="text" required="" placeholder="Email">
        </div>
      </div>
      <div class="form-group text-center m-t-20">
        <div class="col-xs-12">
          <button class="btn btn-primary btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Reset</button>
        </div>
      </div>
    </form>
  </div>
</div>            
</section>