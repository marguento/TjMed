	  <!-- JavaScripts -->
	  {{ HTML::script("../app/js/jquery-1.10.2.js") }}                                                      
	  
	  {{ HTML::script("../app/js/jquery.easing.js") }}
	  <!--{{ HTML::script("js/jquery.sticky.js") }}-->
	  {{ HTML::script("../app/js/tinynav.min.js") }}      
	  {{ HTML::script("../app/js/animate.js") }}
	  {{ HTML::script("../app/js/jquery.fitvids.js") }}
	  {{ HTML::script("../app/js/jquery.isotope.min.js") }}
	  {{ HTML::script("../app/js/jquery.parallax-1.1.3.js") }}
	  {{ HTML::script("../app/js/jquery.magnific-popup.min.js") }} 
	  <!--{{ HTML::script("../app/js/retina.js") }} -->
	  {{ HTML::script("../app/js/respond.min.js") }} 
	  {{ HTML::script("../app/js/scale.fix.js") }}
	  {{ HTML::script("../app/js/jquery.countdown.js") }} 
	  {{ HTML::script("../app/js/jquery.flexslider-min.js") }}
	  {{ HTML::script("../app/js/jquery.refineslide.js") }}
	  {{ HTML::script("../app/js/greensock.js") }}
	  {{ HTML::script("../app/js/layerslider.transitions.js") }}
	  {{ HTML::script("../app/js/layerslider.kreaturamedia.jquery.js") }}
	  {{ HTML::script("../app/js/jquery.themepunch.plugins.min.js") }}
	  {{ HTML::script("../app/js/jquery.themepunch.revolution.min.js") }}
	  {{ HTML::script("../app/js/masterslider.js") }}  
	  {{ HTML::script("../app/js/functions.js") }}
	  {{ HTML::script("//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js") }}
	  {{ HTML::script("../app/js/jquery.bxslider.min.js") }}
	  {{ HTML::script("../app/js/modernizr.js") }}
	  {{ HTML::script("https://maps.googleapis.com/maps/api/js?v=3.exp") }}
	  {{ HTML::script("../app/js/bootstrap.js") }}
	  {{ HTML::script('../app/js/jasny-bootstrap.min.js') }}
	  {{ HTML::script('../app/js/jquery.twbsPagination.min.js') }}
	  
	<script>
	$(document).ready(function(){
		var show_hide = true; //Para manejar los botones de especialidades medicas
		$('.bxslider').bxSlider({
			auto: true,
			mode: 'fade',
			pause: 5000,
			slideWidth: 5000
		 });

		$('.normal_login').hide();
		$('#normal_button').click(function() {
			$('.normal_login').show();
			$('.login_buttons').hide();
		});

		$(".popup").popover();

        var geocoder;
		var map;
		function initialize() {
		  geocoder = new google.maps.Geocoder();
		  var mapOptions = {
		    zoom: 8
		  }
		  map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
		  codeAddress();
		}

		function codeAddress() {
		  var address = document.getElementById('address').value;
		  geocoder.geocode( { 'address': address}, function(results, status) {
		    if (status == google.maps.GeocoderStatus.OK) {
		      map.setCenter(results[0].geometry.location);
		      var marker = new google.maps.Marker({
		          map: map,
		          position: results[0].geometry.location
		      });
		    } else {
		      alert('Geocode was not successful for the following reason: ' + status);
		    }
		  });
		}
			google.maps.event.addDomListener(window, 'load', initialize);

			var id = $('#category').val();
			var dataString = 'id='+ id;

			$.ajax
			({
				type: "POST",
				url: "getSpecialties",
				data: dataString,
				cache: false,
				success: function(html)
				{
					$("#speciality").html(html);
				} 
			});

			$("#category").change(function()
			{
				var id = $(this).val();
				var dataString = 'id='+ id;

				$.ajax
				({
					type: "POST",
					url: "getSpecialties",
					data: dataString,
					cache: false,
					success: function(html)
					{
						$("#speciality").html(html);
					} 
				});
			});

			//$('.carousel').carousel();
	});
</script>