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
	  <script type="text/javascript" src="js/retina.js"></script> 
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
	<script>
	$(document).ready(function(){
	  $('.bxslider').bxSlider({
		auto: true,
		mode: 'fade',
		pause: 5000,
		slideWidth: 5000
	  });

    	var option = "<?php echo $option; ?>";

    	switch(option) {
    		case 'negocios': $('#negocios').addClass('selected'); break;
    		case 'acerca': $('#acerca').addClass('selected'); break;
    		case 'categorias': $('#categorias').addClass('selected'); break;
    		case 'articulos': $('#articulos').addClass('selected'); break;
    		case 'servicios': $('#servicios').addClass('selected'); break;
    		case 'contacto': $('#contacto').addClass('selected'); break;
    		default: $('#inicio').addClass('selected'); break;
    	}
	});
	</script>