<!-- ============================================================== -->
<!-- Preloader -->
<!-- ============================================================== -->
<div class="preloader">
    <svg class="circular" viewBox="25 25 50 50">
        <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" />
    </svg>
</div>
<!-- ============================================================== -->
<!-- Wrapper -->
<!-- ============================================================== -->
<div id="wrapper">
    <!-- ============================================================== -->
    <!-- Topbar header - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <nav class="navbar navbar-default navbar-static-top m-b-0">
        <div class="navbar-header">
            <div class="top-left-part">
                <center> <h2 style="color:white; font-weight: bold;">DSTB GIRS</h2></center>   
            </div>
            <ul class="nav navbar-top-links navbar-right pull-right">
                <li class="dropdown">
                    <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#">
                        <b class="hidden-xs"><span class="glyphicon glyphicon-user"></span> <?php echo $this->session->userdata('fullname'); ?></b>
                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu dropdown-user animated flipInY">
                        <li>
                            <div class="dw-user-box">
                                <div class="u-text">
                                    <h4><?php echo $this->session->userdata('fullname'); ?></h4>
                                    <p class="text-muted"><?php echo $this->session->userdata('email'); ?></p>
                                </div>
                            </div>
                        </li>
                        <li role="separator" class="divider"></li>
                        <li><a href="<?php echo site_url('logout'); ?>"><span class="glyphicon glyphicon-off"></span> Logout</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav slimscrollsidebar">
            <div class="sidebar-head">
                <h3><img src="<?php echo base_url('plugins/images/logo.png'); ?>" width="30px" heigth="30px" /> <span class="hide-menu">GIRS System</span></h3>
            </div>    
            <ul class="nav" id="side-menu">
                <li class="user-pro">
                    <a href="#" class="waves-effect"><span class="hide-menu"> <?php echo $this->session->userdata('fullname'); ?> <span class="glyphicon glyphicon-user"></span></span>
                    </a>
                    <ul class="nav nav-second-level collapse" aria-expanded="false" style="height: 0px;">
                        <li><a href="<?php echo site_url('logout'); ?>"><span class="glyphicon glyphicon-user"></span> <span class="hide-menu">Logout</span></a></li>
                    </ul>
                </li>
                <li> <a href="<?php echo site_url('dashboard'); ?>" class="waves-effect active"><i class="mdi mdi-av-timer fa-fw" data-icon="v"></i> <span class="hide-menu"> Dashboard <span class="glyphicon glyphicon-home"></span></span></a>
                </li>
                <li> <a href="<?php echo base_url('map.html');?>" class="waves-effect active"><i class="mdi mdi-av-timer fa-fw" data-icon="v"></i> <span class="hide-menu"> Search for a Location</span></a>
                </li>
            </ul>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Left Sidebar -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Page Content -->
    <!-- ============================================================== -->
    <div id="page-wrapper"> 
        <div class="container-fluid">
            <center>
                <br />
                <br />
                <h1 style="font-weight: bold;">DELTA STATE TOURISM BOARD, ASABA</h1>
                <h3><a href="<?php echo base_url('map.html'); ?>">Search for a Location</a></h3>
            </center>

            <div class="vtabs">
                <ul class="nav tabs-vertical">
                    <li class="tab active">
                        <a data-toggle="tab" href="#home3" aria-expanded="true"> <span class="visible-xs"><span class="glyphicon glyphicon-home"></span></span> <span class="hidden-xs">Find Information</span> </a>
                    </li>
                    <li class="tab">
                        <a data-toggle="tab" href="#profile3" aria-expanded="false"> <span class="visible-xs"><span class="glyphicon glyphicon-user"></span></span> <span class="hidden-xs">Get Directions</span> </a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div id="home3" class="tab-pane active">
                        <div class="col-md-4 text-justify">

                            <h3>Tourism Development in Delta State.</h3>
                            <p>
                                <img src="<?php echo base_url('plugins/images/elias.png'); ?>" width="100%" />
                                <br />
                                <br />
                                Delta State, the “Big Heart” is one of the thirty–six (36) states that make up Nigeria. It has 25 local Tourism in Delta  State
                            government areas with Asaba as the capital and Warri as major commercial city, Sapele, Agbor, Ughelli, Abraka, wale, Oleh, Ozoro, Koko, Oghara, and Burutu are other major towns.</p>


                            <p>To promote tourism in the state, the state government established the Delta State Tourism Board and the Ministry of culture and Tourism. The board has a compendium of tourism resources in the state in the form of rochure, bulletin, posters and post cards. There is also a website to that effect. The goal of the Government of Delta tate is to mobilize and encourage private sector participation in the development of tourism. The function of overnment is to create an enabling environment for private initiative to flourish. It is expected that this would generate mployment and improve the general well being of the people.
                            </p>
                      
                        </div>
                        <div class="col-md-8 pull-right">
                            <div class="row">
                              <div class="col-md-12">
                             <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.327187948717!2d6.702666614901781!3d6.2205152954970355!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1043f25f3c36c9d7%3A0xcd8a775334c96b72!2sDelta+State+Tourism+Board!5e0!3m2!1sen!2sng!4v1531383363559" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe> 
                              </div>

                          </div> 
                      </div>

                  </div>
                  <div id="profile3" class="tab-pane">
                    <div class="col-md-4 text-justify">
                        <h3>Tourism Resources in the State.</h3>
                        <p>
                            <img src="<?php echo base_url('plugins/images/asaba.png'); ?>" width="100%" />
                            <br />
                            <br />
                            In Delta State there are numerous tourism resources located in different parts of the state. These resources are rouped under the following headings according to Delta State Ministry of Culture and Tourism (2003):
                            <ul>

                             <li>Slave trade relic, Aboh Ndokwa East Local Government Area (L.G.A).</li>
                             <li>Mongo Park Building/Asaba Museum Oshimili South L.G.A.</li>
                             <li>Bible site at Araya Isoko South L.G.A.</li>
                             <li>Nwoko Villa, Idumuje Ugboko Aniocha North L.G.A.</li>
                             <li>Obi palace, Idumuje Ugboko Aniocha North L.G.A.</li>
                             <li>Nana living History (National Monument) Koko Warri-North L.G.A.</li>
                             <li>Expatriates grave yard, Asaba Oshimili South L.G.A.</li>
                             <li>Adane-Okpe, Orerokpe Okpe L.G.A.</li>
                             <li>Ozomona – Manor House, Onicha-Olona Aniocha North L.G.A.</li>
                         </ul>

                     </p> 

                     <br />
                     <br />
                     <br />
                     <br />
                     <br />
                     <br />
                 </div>
                 <div class="col-md-8 pull-right">
                      <div class="row">
                              <div class="col-md-12">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.327187948717!2d6.702666614901781!3d6.2205152954970355!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1043f25f3c36c9d7%3A0xcd8a775334c96b72!2sDelta+State+Tourism+Board!5e0!3m2!1sen!2sng!4v1531383363559" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
                </div>
            </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /#page-wrapper -->
