<?php /* Template Name: Front Page English*/ ?>
<?php get_header(); ?>
<body>
	<!-- preloader area start -->
	<div class="preloader hide" id="preloader">
		<div class="loader loader-1">
			<div class="loader-outter"></div>
			<div class="loader-inner"></div>
		</div>
	</div>
	<!-- preloader area end -->
	<!-- Header Area Start  -->
	
	<!-- Header Area End  -->

	<!-- Hero Area Start -->
	<div class="hero-area">
		<!-- <img class="shape-coin parallax5" src="<?php bloginfo('template_url'); ?>/front-page-asset/images/h2-shape.png" alt="" style="transform: matrix(1, 0, 0, 1, -19.175, -8.125);">  -->
	
		<!-- <img class="shape parallax5" src="<?php bloginfo('template_url'); ?>/front-page-asset/images/h2-shape.png" alt="" style="transform: matrix(1, 0, 0, 1, -19.175, -8.125);"> -->
		<div class="">
			
				
					
						<div class="banner">
						<?php 
							$args = array(
								'post_type'=> 'slider-home-page',
								'order'    => 'ASC'
							);              

							$the_query = new WP_Query( $args );
							if($the_query->have_posts() ) : 
								while ( $the_query->have_posts() ) : 
								$the_query->the_post(); 
								// content goes here
								//the_title();
								?><div class="hero-area-item"><a href="<?php the_permalink(); ?>"><?php
									the_post_thumbnail();
								?></a></div>
								<?php
								endwhile; 
								wp_reset_postdata(); 
							else: 
							endif;
						?>
						<!-- <div class="hero-area-item"><img class="shape" src="<?php bloginfo('template_url'); ?>/front-page-asset/images/banner01.jpg" alt=""></div>
						<div class="hero-area-item"><img class="shape" src="<?php bloginfo('template_url'); ?>/front-page-asset/images/banner02.jpg" alt=""></div>
						<div class="hero-area-item"><img class="shape" src="<?php bloginfo('template_url'); ?>/front-page-asset/images/banner03.jpg" alt=""></div> -->
						</div>
					
				
			
		</div>
	</div>
	<!-- Hero Area End -->

	<!-- Counter Area Start -->
	<section class="counter-section">
		<div class="container">
			<div class="row">
				<div class="col-lg-4 col-md-6">
					<div class="counter-box">
						<div class="myborder"></div>
						<div class="image">
							<img src="<?php bloginfo('template_url'); ?>/front-page-asset/images/1.png" alt="">
						</div>
						<div class="content">				
							<h4> <?php echo the_field('daily_prized'); ?></h4>
							<h6>ដាក់តិច</h6>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-6">
					<div class="counter-box">
						<div class="myborder"></div>
						<div class="image">
							<img src="<?php bloginfo('template_url'); ?>/front-page-asset/images/2.png" alt="">
						</div>
						<div class="content">
							<h4>10k</h4>
							<h6>ឈ្នះច្រើន</h6>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-6">
					<div class="counter-box">
						<div class="image">
							<img src="<?php bloginfo('template_url'); ?>/front-page-asset/images/3.png" alt="">
						</div>
						<div class="content">
							<h4>24/7</h4>
							<h6>ទូទាត់រហ័ស</h6>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Counter Area End -->
	<!-- join us area start -->
	<section class="join_us">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="container">
						<div class="row justify-content-end">
							<div class="col-xl-5">	
								<img class="l-image" src="<?php bloginfo('template_url'); ?>/front-page-asset/images/joinus_left_img.jpg" alt="">
							</div>
							<div class="col-xl-7">
								<div class="section-heading content-left">
									<h5 class="subtitle">
										<!-- Every day lots of wins -->
										ឈ្នះៗរាល់ថ្ងៃ
									</h5>
									<h2 class="title ">
										ស្វាគមន៍មកកាន់ <br/ >supermasterone
									</h2>
									<h6 class="text">
										<!-- Get started in less than 5 min - no credit card required.Gain 
			early access to Jugaro and experience crypto like never before. -->
			ចាប់ផ្តើមក្នុងរយៈពេលតិចជាង 5 នាទី - មិនចាំបាច់មានកាតឥណទានទេ។ ទទួលបានការចូលប្រើដំបូងទៅកាន់ SUPERMASTERONE និងបទពិសោធន៍ដែលមិនធ្លាប់មានពីមុនមក។
									</h6>
									<!-- <a href="https://pixner.net/jugaro/jugaro/index.html#" class="mybtn1">Join US</a> -->
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- join us area  end -->
	<section id="feature-game-section">
        <div class="overlay pt-120 pb-120">
            <div class="container-fruid wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
                <div class="container">
                    <div class="row justify-content-between">
                        <div class="col-lg-6 col-md-9 col-sm-8">
                            <div class="section-header">
                                <!-- <h2 class="title">FEATURED GAMES</h2>
                                <p>To meet today's challenges &amp; earn</p> -->
								<h2 class="title">ហ្គេម</h2>
                                <p>លេងល្បែងដើម្បីឈ្នះរង្វាន់</p>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-4 d-flex align-items-center justify-content-center justify-content-sm-end">
                            <div class="right-area">
								<a href="" class="mybtn1">បង្ហាញទាំងអស់</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="feature-game-carousel">
				<?php 
							$args = array(
								'post_type'=> 'feature-games',
								'order'    => 'ASC'
							);              

							$the_query = new WP_Query( $args );
							if($the_query->have_posts() ) : 
								while ( $the_query->have_posts() ) : 
								$the_query->the_post(); ?>
								<div class="single-item"><a href="<?php the_permalink(); ?>">
									<?php 
									//the_title();
									the_post_thumbnail();?>
								</a></div>
								<?php endwhile; 
								wp_reset_postdata(); 
							else: 
							endif;
						?>
					
            	</div>
			</div>
        </div>
    </section>
	<!--Payment Method-->
	<section id="payment-method-section">
        <div class="ani-div">
            <img class="obj-1" src="<?php bloginfo('template_url'); ?>/front-page-asset/images/star.png" alt="image">
            <img class="obj-2" src="<?php bloginfo('template_url'); ?>/front-page-asset/images/star.png" alt="image">
            <img class="obj-3" src="<?php bloginfo('template_url'); ?>/front-page-asset/images/star-2.png" alt="image">
        </div>
        <div class="overlay pt-120">
            <div class="container wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
                <div class="row justify-content-between">
                    <div class="col-lg-6 col-md-6">
                        <div class="section-header">
                            <!-- <h2 class="title">PAYMENT METHOD</h2> -->
							<h2 class="title">វិធីសាស្រ្តបង់ប្រាក់</h2>
                            <!-- <p>Each time you reach a new level you'll get a reward</p> -->
							<p>រាល់ពេលដែលអ្នកឈានដល់កម្រិតថ្មី អ្នកនឹងទទួលបានរង្វាន់</p>
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-5 d-flex align-items-center justify-content-end justify-cen">
                    	<ul class="row">
							<li><img class="" src="<?php bloginfo('template_url'); ?>/front-page-asset/images/aba.png" alt="image"></li>
							<li><img class="" src="<?php bloginfo('template_url'); ?>/front-page-asset/images/aclda.png" alt="image"></li>
							<li><img class="" src="<?php bloginfo('template_url'); ?>/front-page-asset/images/wing.png" alt="image"></li>
							<li><img class="" src="<?php bloginfo('template_url'); ?>/front-page-asset/images/amk.png" alt="image"></li>
						</ul>
                    </div>
                </div>
               
            </div>
        </div>
    </section>
	<!--payment Method-->
	

<?php get_footer(); ?>