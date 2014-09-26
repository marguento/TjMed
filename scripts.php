	  <!-- JavaScripts -->
	  <script type="text/javascript" src="js/jquery-1.10.2.js"></script>                                                       
	  <script type="text/javascript" src="js/bootstrap.js"></script>  
	  <script type="text/javascript" src="js/jquery.easing.js"></script>  
	  <!--<script type="text/javascript" src="js/jquery.sticky.js"></script>-->
	  <script type="text/javascript" src="js/tinynav.min.js"></script>      
	  <script type="text/javascript" src="js/animate.js"></script>
	  <script type="text/javascript" src="js/jquery.fitvids.js"></script> 
	  <script type="text/javascript" src="js/jquery.isotope.min.js"></script>
	  <script type="text/javascript" src="js/jquery.parallax-1.1.3.js"></script>
	  <script type="text/javascript" src="js/jquery.magnific-popup.min.js"></script> 
	  <!--<script type="text/javascript" src="js/retina.js"></script>--> 
	  <script type="text/javascript" src="js/respond.min.js"></script> 
	  <script type="text/javascript" src="js/scale.fix.js"></script>
	  <script type="text/javascript" src="js/jquery.countdown.js"></script> 
	  <script type="text/javascript" src="js/jquery.flexslider-min.js"></script>
	  <script type="text/javascript" src="js/jquery.refineslide.js"></script>
	  <script type="text/javascript" src="js/greensock.js"></script>
	  <script type="text/javascript" src="js/layerslider.transitions.js"></script>
	  <script type="text/javascript" src="js/layerslider.kreaturamedia.jquery.js"></script>
	  <script type="text/javascript" src="js/jquery.themepunch.plugins.min.js"></script>
	  <script type="text/javascript" src="js/jquery.themepunch.revolution.min.js"></script>
	  <script type="text/javascript" src="js/masterslider.js"></script>  
	  <script type="text/javascript" src="js/functions.js"></script>
	  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
		<script src="js/jquery.bxslider.min.js"></script>
		<script src="js/modernizr.js"></script>
		<script src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>
		<script type="text/javascript" src="slick-master/slick/slick.min.js"></script>
	<script>
	$(document).ready(function(){
		var show_hide = true; //Para manejar los botones de especialidades medicas
	  $('.bxslider').bxSlider({
		auto: true,
		mode: 'fade',
		pause: 5000,
		slideWidth: 5000
	  });

    	var option = "<?php echo $option; ?>";

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
	console.log(id);
	var dataString = 'id='+ id;

	$.ajax
	({
		type: "POST",
		url: "getSpecialties.php",
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
		console.log(id);
		var dataString = 'id='+ id;

		$.ajax
		({
			type: "POST",
			url: "getSpecialties.php",
			data: dataString,
			cache: false,
			success: function(html)
			{
				$("#speciality").html(html);
			} 
		});
	});

	$('.carousel').carousel();
});
</script>