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