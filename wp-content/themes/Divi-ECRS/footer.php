<?php if ( 'on' == et_get_option( 'divi_back_to_top', 'false' ) ) : ?>

	<span class="et_pb_scroll_top et-pb-icon"></span>

<?php endif;

if ( ! is_page_template( 'page-template-blank.php' ) ) : ?>
		<!-- ADD MAILING LIST -->
		<?php if ( is_active_sidebar( 'mailing-list' ) ) : ?>
			<div id="mailing-list" class="widget-area">
				<?php dynamic_sidebar( 'mailing-list' ); ?>
			</div>
		<?php endif; ?>
		<footer id="main-footer">
			<?php get_sidebar( 'footer' ); ?>


			<?php
				if ( has_nav_menu( 'footer-menu' ) ) : ?>

				<div id="et-footer-nav">
					<div class="container">
						<?php
							wp_nav_menu( array(
								'theme_location' => 'footer-menu',
								'depth'          => '1',
								'menu_class'     => 'bottom-nav',
								'container'      => '',
								'fallback_cb'    => '',
							) );
						?>
					</div>
				</div> <!-- #et-footer-nav -->

				<?php endif; ?>

				<div id="footer-bottom">

					<div class="container clearfix">
						<?php
							if ( false !== et_get_option( 'show_footer_social_icons', true ) ) {
								get_template_part( 'includes/social_icons', 'footer' );
							}
						?>

						<p id="footer-info">Copyright © 2015 · ECRS · Site Designed by <a href="http://www.asbacreativestudio.com">ASBA Creative Studio</a></p>
					</div>	<!-- .container -->
				</div>
			</footer> <!-- #main-footer -->
		</div> <!-- #et-main-area -->

<?php endif; // ! is_page_template( 'page-template-blank.php' ) ?>

	</div> <!-- #page-container -->
	<?php wp_footer(); ?>
	<!-- <script src="//code.jquery.com/jquery-1.11.3.min.js"></script> -->
	<script>
		$( document ).ready(function() {
		    $('#fpw_widget-2').addClass('wow bounceInDown fadeInDown');
		    $('#fpw_widget-4').addClass('wow bounceInDown fadeInDown').attr('data-wow-delay', '.5s');
		    $('#fpw_widget-3').addClass('wow bounceInDown fadeInDown').attr('data-wow-delay', '1s');
		    $('.wow.fadeInRightBig.et_pb_image_1').attr('data-wow-delay', '.4s');
		    new WOW().init();
		    $( "#sign-in" ).click(function() {
			    if ($('#simplemodal-login-form').css('display') == 'none'){
			    	$('.login').addClass('active');
				}
				else {
					$('.login').removeClass('active');
				}
			});
			$('.simplemodal-close').click(function() {
				$('.login').removeClass('active');
			});
			jQuery(function ($) {
			   $('.simplemodal-overlay').click(function () {
			       $.modal.close();
			   });
			});
			 var $selects = $('select');

		$selects.on('change', function() {

		    // enable all options
		    $selects.find('option').prop('disabled', false);

		    // loop over each select, use its value to
		    // disable the options in the other selects
		    $selects.each(function() {
		       $selects.not(this)
             .find('option[value="' + this.value + '"]')
             .prop('disabled', true);
		    });

		});
		});
	</script>
	<script>
	jQuery(function($){
	    $('.et_pb_accordion .et_pb_toggle_open').addClass('et_pb_toggle_close').removeClass('et_pb_toggle_open');

	    $('.et_pb_accordion .et_pb_toggle').click(function() {
	      $this = $(this);
	      setTimeout(function(){
	         $this.closest('.et_pb_accordion').removeClass('et_pb_accordion_toggling');
	      },700);
	    });
	});
	</script>
	<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/wow.min.js"></script>
</body>
</html>