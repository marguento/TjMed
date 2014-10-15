	  <!-- JavaScripts -->
	  <script type="text/javascript" src="app/js/jquery-1.10.2.js"></script>                                                       
	  <script type="text/javascript" src="app/js/bootstrap.js"></script>  
	  <script type="text/javascript" src="app/js/jquery.easing.js"></script>  
	  <!--<script type="text/javascript" src="js/jquery.sticky.js"></script>-->
	  <script type="text/javascript" src="app/js/tinynav.min.js"></script>      
	  <script type="text/javascript" src="app/js/animate.js"></script>
	  <script type="text/javascript" src="app/js/jquery.fitvids.js"></script> 
	  <script type="text/javascript" src="app/js/jquery.isotope.min.js"></script>
	  <script type="text/javascript" src="app/js/jquery.parallax-1.1.3.js"></script>
	  <script type="text/javascript" src="app/js/jquery.magnific-popup.min.js"></script> 
	  <script type="text/javascript" src="app/js/retina.js"></script> 
	  <script type="text/javascript" src="app/js/respond.min.js"></script> 
	  <script type="text/javascript" src="app/js/scale.fix.js"></script>
	  <script type="text/javascript" src="app/js/jquery.countdown.js"></script> 
	  <script type="text/javascript" src="app/js/jquery.flexslider-min.js"></script>
	  <script type="text/javascript" src="app/js/jquery.refineslide.js"></script>
	  <script type="text/javascript" src="app/js/greensock.js"></script>
	  <script type="text/javascript" src="app/js/layerslider.transitions.js"></script>
	  <script type="text/javascript" src="app/js/layerslider.kreaturamedia.jquery.js"></script>
	  <script type="text/javascript" src="app/js/jquery.themepunch.plugins.min.js"></script>
	  <script type="text/javascript" src="app/js/jquery.themepunch.revolution.min.js"></script>
	  <script type="text/javascript" src="app/js/masterslider.js"></script>  
	  <script type="text/javascript" src="app/js/functions.js"></script>
	  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
		<script src="app/js/jquery.bxslider.min.js"></script>
		<script src="app/js/modernizr.js"></script>
		<script src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>
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

	  	var option = "";

    	switch(option) {
    		case 'negocios': $('#negocios').addClass('selected'); break;
    		case 'perfil': $('#negocios').addClass('selected'); break;
    		case 'acerca': $('#acerca').addClass('selected'); break;
    		case 'categorias': $('#categorias').addClass('selected'); break;
    		case 'articulos': $('#articulos').addClass('selected'); break;
    		case 'servicios': $('#servicios').addClass('selected'); break;
    		case 'contacto': $('#contacto').addClass('selected'); break;
    		default: $('#inicio').addClass('selected'); break;
    	}

    	/** CATEGORIAS.PHP **/
    	$('.more_spc').hide();

    	/** TODO: Validar a ingles - espanol */
    	$('.more').click(function() {
    		if($(this).attr('value')=='Ver más') {
    			$(this).prop('value', 'Ver menos');
	    		var spc = $(this).attr('id').substring(4);
		        $('#cat_'+spc).show();
		        
	    	} else {
	    		$(this).prop('value', 'Ver más');
	    		var spc = $(this).attr('id').substring(4);
		        $('#cat_'+spc).hide();
		         $(document).scrollTop( $("#name_"+spc).offset().top );  
	    	}
        });

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