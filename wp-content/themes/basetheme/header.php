<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package thebase
 */

namespace TheBase;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>
<!doctype html>
<html <?php language_attributes(); ?> class="no-js" <?php thebase()->print_microdata( 'html' ); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link href="https://fonts.googleapis.com/css2?family=Jost:wght@300;400;500;600;700&display=swap" rel="stylesheet">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<meta name="forntEnd-Developer" content="Mamunur Rashid">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>One Super Master</title>
	<!-- favicon -->
	<link rel="icon" href="<?php bloginfo('template_url'); ?>/front-page-asset/images/icon.png" type="image/x-icon">
	<!-- bootstrap -->
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/front-page-asset/css/bootstrap.min.css" type="text/css" media="screen" />
	
	<!-- Plugin css -->
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/front-page-asset/css/plugin.css" type="text/css" media="screen" />
	<!-- stylesheet -->
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/front-page-asset/css/style.css" type="text/css" media="screen" />
	
	<!-- responsive -->
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/front-page-asset/css/responsive.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/front-page-asset/css/slick.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/front-page-asset/css/slick-theme.css" type="text/css" media="screen" />
	<script src="<?php bloginfo('template_url'); ?>/front-page-asset/js/slick.min.js"></script>
	<?php wp_head(); ?>
</head>
<style>
.transparent-header #masthead {
    position: relative  !important;
}
ul{
	margin:0 !important
}
#main-header .header-button{
	text-transform: uppercase;
    font-weight: 600;
    font-size: 18px;
    color: white;
    padding: 12px 35px;
    border-radius: 50px;
    box-shadow: inset 0px 0px 10px 7px #fea036;
    transition: all 0.3s ease-in;
    display: inline-block;
	background:transparent;
}
#main-header .header-button:hover{
	color: #fff;
    box-shadow: inset 0px 0px 10px 7px #00a2ff;
}
.site-main-header-wrap .site-header-row-container-inner>.site-container{
	padding:0 !important;
}
.mainmenu-area{
	width:100%;
	z-index: 3;
	background:#14096c;
}
#tb-scroll-up-reader, #tb-scroll-up{
	border-radius:30px;
}
.language-selector select{padding: 0 !important;}
h2{font-size:40px;}
body:not(.home).transparent-header #wrapper #masthead.site-header{
	background:transparent;
}
.mainmenu-area,.top-header {
  /* position: absolute; */
  top: 0px;
  left: 0px;
  width: 100%;
  height: 100%;
  background-image: linear-gradient(89deg, #100b72 0%, #1b53b4 100%);
  opacity: 0.9;
  z-index: 2;
  height:auto;
}
.site-main-header-inner-wrap {
    min-height: 60px !important;
}
body, p , a{
	font-family:"Battambang",  "Roboto", "Open Sans", sans-serif !important;
}
</style>

<body <?php body_class(); ?>>
<div class="float-social">
	<ul class="top-social-links">
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

<?php wp_body_open(); ?>
<?php
/**
 * TheBase before wrapper hook.
 */
do_action( 'thebase_before_wrapper' );
?>
<div id="wrapper" class="site">
	
<header class="header">
<!-- Top Header Area Start -->
<section class="top-header">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="content">
					<div class="left-content">
						<ul class="left-list">
							<li>
								<p>
									<i class="fas fa-headset"></i>	099 235 856
								</p>
							</li>
						</ul>
						
					</div>
					<div class="right-content">
						<ul class="right-list">
							
							
								<?php pll_the_languages( array( 'show_flags' => 1,'show_names' => 0 ) ); ?>
									<!-- <select name="language" class="language">
										<option value="1">EN</option>
										<option value="2">IN</option>
									</select> -->
								
							
							<li>
								<div class="notofication" data-toggle="modal" data-target="#usernotification">
									<i class="far fa-bell"></i>
								</div>
							</li>
							
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>


	<?php
	/**
	 * TheBase before header hook.
	 *
	 * @hooked thebase_do_skip_to_content_link - 2
	 */
	// do_action( 'thebase_before_header' );

	/**
	 * TheBase header hook.
	 *
	 * @hooked TheBase/header_markup - 10
	 */
?>
<div class="mainmenu-area">
	<div class="container">
		<div class="row">
			<div class="col-lg-12"> 
			<?php
				do_action( 'thebase_header' );

				do_action( 'thebase_after_header' );
				?>
			</div>
		</div>
	</div>
</div>

	<div id="inner-wrap" class="wrap hfeed tb-clear">
		<?php
		/**
		 * Hook for top of inner wrap.
		 */
		do_action( 'thebase_before_content' );
		?>
</header>