<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package thebase
 */

namespace TheBase;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Hook for bottom of inner wrap.
 */
do_action( 'thebase_after_content' );
?>
	</div><!-- #inner-wrap -->
	<?php
	// do_action( 'thebase_before_footer' );
	/**
	 * TheBase footer hook.
	 *
	 * @hooked TheBase/footer_markup - 10
	 */
	// do_action( 'thebase_footer' );
?>
<!-- Footer Area Start -->
<footer class="footer" id="footer">
		
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div id="banner-section">
						<div class="bottom-item">
							<div class="row">
								<div class="col-lg-6 col-md-6">
									<div class="single-item d-flex">
										<div class="left-area align-items-center">
											<img src="<?php bloginfo('template_url'); ?>/front-page-asset/images/App-Store.png" alt="image">
										</div>
										<div class="right-area">
											<h4>iOS</h4>
											<p>Download mobile game on your iPhone.</p>
										</div>
									</div>
								</div>
								<div class="col-lg-6 col-md-6">
									<div class="single-item d-flex">
										<div class="left-area align-items-center">
											<img src="<?php bloginfo('template_url'); ?>/front-page-asset/images/Play-Store.png" alt="image">
										</div>
										<div class="right-area">
											<h4>Android</h4>
											<p>Download mobile game on your Phone.</p>
										</div>
									</div>
								</div>
								<!-- <div class="col-lg-4 col-md-6">
									<div class="single-item d-flex">
										<div class="left-area align-items-center">
											<img src="<?php bloginfo('template_url'); ?>/front-page-asset/images/banner-bottom-3.png" alt="image">
										</div>
										<div class="right-area">
											<h4>EARN</h4>
											<p>Your Wombucks or prize money from challenges.</p>
										</div>
									</div>
								</div> -->
							</div>
						</div>
					</div>
					<div class="container">
						<div class="row justify-content-between">
							<div class="col-lg-3 col-md-3 col-sm-3 footer-logo">
								<a href="#"><img src="<?php bloginfo('template_url'); ?>/front-page-asset/images/one_logo.png" alt=""></a>
							</div>
							<div class="col-lg-5 col-md-5 col-sm-5 footer-menu">
								<ul>
									<li>
										<a href="">
											About
										</a>
									</li>
									<li>
										<a href="">
											Contact
										</a>
									</li>
								</ul>
							</div>
							<div class="col-lg-4 col-md-4 col-sm-4 social-links">
								<ul>
									<li>
										<a href="https://www.facebook.com/supermasteroneofficial?mibextid=LQQJ4d">
											<i class="fab fa-facebook-f"></i>
										</a>
									</li>
									<li>
										<a href="https://t.me/superserviceofficial">
											<i class="fab fa-telegram"></i>
										</a>
									</li>
									<li>
										<a href="">
											<i class="fab fa-line"></i>
										</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
					
				</div>
			</div>
		</div>
		<div class="copy-bg">
			<div class="container">
				<div class="row">
					<div class="col-lg-12 copy-text">
							<p>Copyright © 2023s.All Rights One Super Master</p>
					</div>
				</div>
			</div>
		</div>
	</footer> 
	<!-- Footer Area End -->

	<!-- Back to Top Start -->
	<!-- <div class="bottomtotop" style="display: none;">
		<i class="fas fa-chevron-right"></i>
	</div> -->
	<!-- Back to Top End -->


	

	<!-- User Notification Modal Start-->
	<div class="modal fade" id="usernotification" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h4>Notification</h4>
					<div class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">×</span>
					</div>
				</div>
				<div class="modal-body">
					<div class="single-notification">
						<div class="img">
							<img src="<?php bloginfo('template_url'); ?>/front-page-asset/images/n1.png" alt="">
						</div>
						<div class="content">
							<div class="top-area">
								<h4>Update Announcement</h4>
								<p>2021-03-07  -  23:50:21 </p>
							</div>
							<div class="middle-area">
								<h6>Dear player:</h6>
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus dictum dictum congue. Duis fringilla malesuada lobortis. In ultricies venenatis magna ut mollis. Nam sit amet arcu lobortis, porta nisl non, egestas felis. Nulla et finibus massa. Ut varius tristique elit et gravida.</p>
							</div>
							<div class="bottom-area">
								<p>Jugaro.Game Team</p>
								<span>April 30 2021</span>
							</div>
						</div>
					</div>
					
					
					
				</div>
			</div>
		</div>
	</div>
	<!-- User Notification Modal End-->
	
	

	<!-- jquery -->
	<script src="<?php bloginfo('template_url'); ?>/front-page-asset/js/jquery.js"></script>
	<!-- popper -->
	<script src="<?php bloginfo('template_url'); ?>/front-page-asset/js/popper.min.js"></script>
	<!-- bootstrap -->
	<script src="<?php bloginfo('template_url'); ?>/front-page-asset/js/bootstrap.min.js"></script>
	<!-- plugin js-->
	<script src="<?php bloginfo('template_url'); ?>/front-page-asset/js/plugin.js"></script>

	<!-- MpusemoverParallax JS-->
	<script src="<?php bloginfo('template_url'); ?>/front-page-asset/js/TweenMax.js"></script>
	<script src="<?php bloginfo('template_url'); ?>/front-page-asset/js/mousemoveparallax.js"></script>
	<!-- main -->
	<script src="<?php bloginfo('template_url'); ?>/front-page-asset/js/main.js"></script>

	<script>
		$(document).ready(function () {
			// $(document).scroll(function () {
			// 	var scroll = $(this).scrollTop();
			// 	var topDist = $(".shape").position();
			// 	if (scroll > topDist.top) {
			// 		$(".site-header-row-container-inner").css("padding","0 10px");
			// 	}else{
			// 		$(".site-header-row-container-inner").css("padding","0 0");
			// 	}
			// });
			
			//$('.hero-area .hero-area-item').fadeIn(2000, function () {});
			// setTimeout(() => {
				
			// 	$('.hero-area .hero-area-item').css("display","block");
			// }, 200);
			setTimeout(function(){
					$('.hero-area').attr("style","display: block");
					$('.banner').slick({
					autoplay: true,
					nextArrow: '<div class="arrow-right"><i class="fas fa-chevron-right"></i></div>',
					prevArrow: '<div class="arrow-left"><i class="fa fa-chevron-left"></i></div>',

				});
			}, 100);
		
			setTimeout(function(){
					$('#feature-game-section').attr("style","display: block");
					$('.feature-game-carousel').slick({
						slidesToShow: 4,
						slidesToScroll: 1,
						autoplay: true,
						responsive: [
						{
						breakpoint: 991,
						settings: {
							slidesToShow: 3,
							slidesToScroll: 3,
							infinite: true,
							dots: true
						}
						},
						{
						breakpoint: 600,
						settings: {
							slidesToShow: 2,
							slidesToScroll: 2
						}
						}]
						});
					}, 200);
		
			
			
		});
		
	</script>
<?php
	// do_action( 'thebase_after_footer' );
	?>
</div><!-- #wrapper -->
<?php do_action( 'thebase_after_wrapper' ); ?>

	
	
<?php wp_footer(); ?>
</body>
</html>
