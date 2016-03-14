	  <!-- JavaScripts -->
	  {{ HTML::script("js/jquery-1.10.2.js") }}                                                      
	  
	  <!-- {{ HTML::script("js/jquery.easing.js") }} -->
	  <!--{{ HTML::script("js/jquery.sticky.js") }}-->
	  {{ HTML::script("js/tinynav.min.js") }}      
	  {{ HTML::script("js/animate.js") }}
	  {{ HTML::script("js/jquery.fitvids.js") }}
	  {{ HTML::script("js/jquery.isotope.min.js") }}
	  {{ HTML::script("js/jquery.parallax-1.1.3.js") }}
	  {{ HTML::script("js/jquery.magnific-popup.min.js") }} 
	  <!--{{ HTML::script("js/retina.js") }} -->
	  {{ HTML::script("js/respond.min.js") }} 
	  {{ HTML::script("js/scale.fix.js") }}
	  {{ HTML::script("js/jquery.countdown.js") }} 
	  {{ HTML::script("js/jquery.flexslider-min.js") }}
	  {{ HTML::script("js/jquery.refineslide.js") }}
	  {{ HTML::script("js/greensock.js") }}
	  {{ HTML::script("js/layerslider.transitions.js") }}
	  {{ HTML::script("js/layerslider.kreaturamedia.jquery.js") }}
	  {{ HTML::script("js/jquery.themepunch.plugins.min.js") }}
	  {{ HTML::script("js/jquery.themepunch.revolution.min.js") }}
	  {{ HTML::script("js/masterslider.js") }}  
	  {{ HTML::script("js/functions.js") }}
	  {{ HTML::script("//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js") }}
	  {{ HTML::script("js/jquery.bxslider.min.js") }}
	  {{ HTML::script("js/modernizr.js") }}
	  {{ HTML::script("https://maps.googleapis.com/maps/api/js?v=3.exp") }}
	  {{ HTML::script("js/bootstrap.js") }}
	  {{ HTML::script('js/jasny-bootstrap.min.js') }}
	  
	<script>
	$(document).ready(function(){
		var show_hide = true; //Para manejar los botones de especialidades medicas
		$('.bxslider').bxSlider({
			auto: true,
			mode: 'fade',
			pause: 2000,
			slideWidth: 2000
		 });

		$(".popup").popover();
	
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

	});
</script>