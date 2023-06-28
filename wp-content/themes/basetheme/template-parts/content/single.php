<?php
/**
 * The main single item template file.
 *
 * @package thebase
 */

namespace TheBase;

/**
* Hook for Hero Section
*/
do_action( 'thebase_hero_header' );
?>
<div id="primary" class="content-area">
	<div class="content-container site-container">
		<main id="main" class="site-main" >
			<?php
			/**
			 * Hook for anything before main content
			 */
			do_action( 'thebase_before_main_content' );
			?>
			<div class="content-wrap">
				<?php
				if ( is_404() ) {
					do_action( 'thebase_404_content' );
				} elseif ( have_posts() ) {
					while ( have_posts() ) {
						the_post();
						/**
						 * Hook in content single entry template.
						 */
						do_action( 'thebase_single_content' );
					}
				} else {
					get_template_part( 'template-parts/content/error' );
				}
				?>
			</div>
			<?php			
			/**
			 * Hook for anything after main content
			 */
			do_action( 'thebase_after_main_content' );
			?>
		</main><!-- #main -->
		<?php
		get_sidebar();
		?>
	</div>
</div><!-- #primary -->
