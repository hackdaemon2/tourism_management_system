<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url('plugins/images/logo.png') ?>">
    <title><?php echo $title; ?></title>
    <style>
      /* Always set the map height explicitly to define the size of the div
      * element that contains the map. */
      #map {
        height: 100%;
    }
    /* Optional: Makes the sample page fill the window. */
    html, body {
        height: 100%;
        margin: 0;
        padding: 0;
    }
</style>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&libraries=places"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment-with-locales.js"></script>
<script src="http://cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/d004434a5ff76e7b97c8b07c01f34ca69e635d97/src/js/bootstrap-datetimepicker.js"></script>
<link href="http://cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/d004434a5ff76e7b97c8b07c01f34ca69e635d97/build/css/bootstrap-datetimepicker.css" rel="stylesheet">

<!-- Bootstrap Core CSS -->
<link href="<?php echo base_url('bootstrap/dist/css/bootstrap.min.css'); ?>" rel="stylesheet">
<!-- Menu CSS -->
<link href="<?php echo base_url('plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css'); ?>" rel="stylesheet">
<!-- chartist CSS -->
<link href="<?php echo base_url('plugins/bower_components/chartist-js/dist/chartist.min.css'); ?>" rel="stylesheet">
<link href="<?php echo base_url('plugins/bower_components/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.css'); ?>" rel="stylesheet">
<!-- Vector CSS -->
<link href="<?php echo base_url('plugins/bower_components/vectormap/jquery-jvectormap-2.0.2.css'); ?>" rel="stylesheet" />
<!-- animation CSS -->
<link href="<?php echo base_url('css/animate.css'); ?>" rel="stylesheet">
<!-- Custom CSS -->
<link href="<?php echo base_url('css/style.css'); ?>" rel="stylesheet">
<!-- color CSS -->
<link href="<?php echo base_url('css/colors/blue-dark.css'); ?>" id="theme" rel="stylesheet">
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
<style>
#map-canvas {
    width:700px;
    height: 600px;
    margin: 0px;
    padding: 10px;
    float: left;
    background: #FFF !important;
}
#target {
    width: 345px;
}
.map-box{
  background: #FFF !important;
  padding: 25px;
  height:600px;
}

#target {
  width: 345px;
}

.trip_loopn{margin-top: 10px; margin-bottom:10px;}

.title{
    margin-bottom:10px;
}
.title input,textarea{
    margin-top:10px;
}
.title h4{
    margin-top:10px;
}
.custom_footer {
    width:100%;
    display:inline-block;
    background:burlywood;
    color:#fff;
    text-align:center;
    font-size:20px;
}
</style>

<script>
    var map;
    var markers = [];


    var geocoder = new google.maps.Geocoder();

    function geocodePosition(pos,box_no) {
      geocoder.geocode({
        latLng: pos
    }, function(responses) {
        if (responses && responses.length > 0) {
            if(box_no == '1'){
                updateMarkerAddress1(responses[0].formatted_address);
            }
            else{
                updateMarkerAddress2(responses[0].formatted_address);
            }

        } else {
            if(box_no == '1'){
                updateMarkerAddress1('Cannot determine address at this location.');
            }
            else{
                updateMarkerAddress2('Cannot determine address at this location.');
            }
        }
    });
  }

  function updateMarkerPosition(latLng) {
    var str =  latLng.lat() +" "+ latLng.lng();
    $('#info').val(str);
}

function updateMarkerAddress1(str) {
  $('#address1').val(str);
}
function updateMarkerAddress2(str) {
  $('#address2').val(str);
}
// drag end
var mj;
var directionsDisplay;
var directionsService = new google.maps.DirectionsService();
var rendererOptions = {
  draggable: true
};

function initialize() {
    directionsDisplay = new google.maps.DirectionsRenderer(rendererOptions);
    var asaba = new google.maps.LatLng(6.2219387,6.6612933);
    var mapOptions = {
      zoom: 6,
      center: asaba
  }

  map = new google.maps.Map(document.getElementById('map-canvas'), {
    mapTypeId: google.maps.MapTypeId.ROADMAP,
    zoom: 6,
    center: asaba
});

// direction service code
directionsDisplay.setMap(map);
// search box defined here
var input1 = $('.pac-input')[0];
var input2 = $('.pac-input')[1];
  // map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);
  var searchBox1 = new google.maps.places.SearchBox((input1));
  var searchBox2 = new google.maps.places.SearchBox((input2));

 // search function start here
 google.maps.event.addListener(searchBox1, 'places_changed', function() {
  console.log("searchbox 1");
  var places = searchBox1.getPlaces();
  if (places.length == 0) {
      return;
  }
  for (var i = 0, marker; marker = markers[i]; i++) {
      marker.setMap(null);
  }
    // For each place, get the icon, place name, and location.
    var bounds = new google.maps.LatLngBounds();
    for (var i = 0, place; place = places[i]; i++) {
      // Create a marker for each place.
      marker = new google.maps.Marker({
        map: map,
        title: place.name,
        position: place.geometry.location,
        draggable: true
    });
      $(".latitude").val(place.geometry.location.lat());
      $(".longitude").val(place.geometry.location.lng());
      updateMarkerPosition(marker.getPosition());
      geocodePosition(marker.getPosition(),'1');

      google.maps.event.addListener(marker, 'dragend', function() {
        geocodePosition(marker.getPosition(),'1');
        $(".latitude").val(marker.getPosition().lat());
        $(".longitude").val(marker.getPosition().lat());
    });
      markers.push(marker);
      bounds.extend(place.geometry.location);
  }
  if($('#address2').val().length > 0 && $('#address2').val() != 'undefined')
  {
    console.log("searchbox 1 make route");
    setTimeout(function() {
        calcRoute();
    }, 500);
}
else{
    map.fitBounds(bounds);
    map.setZoom(9);
}
});


 google.maps.event.addListener(searchBox2, 'places_changed', function() {
    console.log("searchbox 2");
    var places1 = searchBox2.getPlaces();
    if (places1.length == 0) {
        return;
    }
    for (var i = 0, marker; marker = markers[i]; i++) {
        marker.setMap(null);
    }
  // For each place, get the icon, place name, and location.
  var bounds = new google.maps.LatLngBounds();
  for (var i = 0, place; place = places1[i]; i++) {
    // Create a marker for each place.
    marker = new google.maps.Marker({
      map: map,
      title: place.name,
      position: place.geometry.location,
      draggable: true
  });
    $(".latitude2").val(place.geometry.location.lat());
    $(".longitude2").val(place.geometry.location.lng());
    updateMarkerPosition(marker.getPosition());
    geocodePosition(marker.getPosition(),'2');

    google.maps.event.addListener(marker, 'dragend', function() {
      geocodePosition(marker.getPosition(),'2');
      $(".latitude2").val(marker.getPosition().lat());
      $(".longitude2").val(marker.getPosition().lat());
  });
    markers.push(marker);
    bounds.extend(place.geometry.location);
}
if($('#address1').val().length > 0 && $('#address1').val() != 'undefined')
{
    console.log("searchbox 2 make route");
    setTimeout(function() {
        calcRoute();
    }, 500);
}
else{
    map.fitBounds(bounds);
    map.setZoom(9);
}
});
//   google.maps.event.addListener(map, 'bounds_changed', function() {
//   var bounds = map.getBounds();
//   searchBox2.setBounds(bounds);
//   map.setZoom(10);
// });

}
//initial function close here


// calculate route function
function calcRoute() {
  var start = $('#address1').val();
  var end = $('#address2').val();

  var request = {
      origin: start,
      destination: end,
      optimizeWaypoints: true,
      travelMode: google.maps.TravelMode.DRIVING
  };
  directionsService.route(request, function(response, status) {
    if (status == google.maps.DirectionsStatus.OK) {
      directionsDisplay.setDirections(response);
      console.log("Done");
      var route = response.routes[0];
  }
});
}

//to compute total distance function
function computeTotalDistance(result) {
  var total = 0;
  var myroute = result.routes[0];
  for (var i = 0; i < myroute.legs.length; i++) {
    total += myroute.legs[i].distance.value;
}
total = total / 1000.0;
document.getElementById('total').innerHTML = total + ' km';
}


google.maps.event.addDomListener(window, 'load', initialize);
</script>
</head>


<body class="fix-header">
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
                    <li> <a href="<?php echo site_url('location'); ?>" class="waves-effect active"><i class="mdi mdi-av-timer fa-fw" data-icon="v"></i> <span class="hide-menu"> Search for a Location </span></a>
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
                    <h3><a href="<?php echo site_url('dashboard'); ?>">Dashboard</a></h3>
                </center>

                <div class="row">

                    <div class="col-md-4 start_route">
                        <!-- <div class="add_new_route"> <button class="btn btn-primary"> Add New Route </div> -->
                            <div class="trip_loop1">
                                <h4>Search Location: </h4>
                                <input class="controls form-control pac-input" type="text" placeholder="Search Box"><br />
                                <input id="address1" class="controls form-control" type="text" placeholder="Nearest address">
                                <input TYPE="hidden" name="latitude" class="latitude form-control" value="" />
                                <input TYPE="hidden" name="longitude" class="longitude form-control" value="" />
                                <input type="hidden" name="marker_status" class="form-control" id="info"/>
                            </div>
                        </div>
                        <div class="col-md-8">
                          <div id="map-canvas"></div>
                      </div>
                  </div>
              </div>
          </div>
          <!-- /#wrapper -->
          <!-- jQuery -->
          <script src="<?php echo base_url('plugins/bower_components/jquery/dist/jquery.min.js'); ?>"></script>
          <!-- Bootstrap Core JavaScript -->
          <script src="<?php echo base_url('bootstrap/dist/js/bootstrap.min.js'); ?>"></script>
          <!-- Menu Plugin JavaScript -->
          <script src="<?php echo base_url('plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js'); ?>"></script>
          <!--Counter js -->
          <script src="<?php echo base_url('plugins/bower_components/waypoints/lib/jquery.waypoints.js'
          );?>"></script>
          <script src="<?php echo base_url('plugins/bower_components/counterup/jquery.counterup.min.js');?>"></script>
          <!--slimscroll JavaScript -->
          <script src="<?php echo base_url('js/jquery.slimscroll.js');?>"></script>
          <!--Wave Effects -->
          <script src="<?php echo base_url('js/waves.js');?>"></script>
          <!-- Vector map JavaScript -->
          <script src="<?php echo base_url('plugins/bower_components/vectormap/jquery-jvectormap-2.0.2.min.js');?>"></script>
          <script src="<?php echo base_url('plugins/bower_components/vectormap/jquery-jvectormap-world-mill-en.js');?>"></script>
          <script src="<?php echo base_url('plugins/bower_components/vectormap/jquery-jvectormap-in-mill.js');?>"></script>
          <script src="<?php echo base_url('plugins/bower_components/vectormap/jquery-jvectormap-us-aea-en.js');?>"></script>
          <!-- chartist chart -->
          <script src="<?php echo base_url('plugins/bower_components/chartist-js/dist/chartist.min.js');?>"></script>
          <script src="<?php echo base_url('plugins/bower_components/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.min.js');?>"></script>
          <!-- sparkline chart JavaScript -->
          <script src="<?php echo base_url('plugins/bower_components/jquery-sparkline/jquery.sparkline.min.js');?>"></script>
          <script src="<?php echo base_url('plugins/bower_components/jquery-sparkline/jquery.charts-sparkline.js');?>"></script>
          <!-- Custom Theme JavaScript -->
          <script src="<?php echo base_url('js/custom.min.js');?>"></script>
          <script src="<?php echo base_url('js/dashboard3.');?>'"></script>
          <!--Style Switcher -->
          <script src="<?php echo base_url('plugins/bower_components/styleswitcher/jQuery.style.switcher.js');?>"></script>
          <script>
      // This example requires the Places library. Include the libraries=places
      // parameter when you first load the API. For example:
      // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">

      function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: -33.866, lng: 151.196},
          zoom: 15
      });

        var infowindow = new google.maps.InfoWindow();
        var service = new google.maps.places.PlacesService(map);

        service.getDetails({
          placeId: 'ChIJN1t_tDeuEmsRUsoyG83frY4'
      }, function(place, status) {
          if (status === google.maps.places.PlacesServiceStatus.OK) {
            var marker = new google.maps.Marker({
              map: map,
              position: place.geometry.location
          });
            google.maps.event.addListener(marker, 'click', function() {
              infowindow.setContent('<div><strong>' + place.name + '</strong><br>' +
                'Place ID: ' + place.place_id + '<br>' +
                place.formatted_address + '</div>');
              infowindow.open(map, this);
          });
        }
    });
    }
</script>
</body>
</html>