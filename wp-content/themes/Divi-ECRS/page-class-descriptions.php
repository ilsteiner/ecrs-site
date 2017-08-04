<?php

get_header();

?>
<div id="main-content">

			<?php while ( have_posts() ) : the_post(); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

					<div class="entry-content">
					<?php
						the_content();
					?>
					</div> <!-- .entry-content -->
					
					<?php
					// get parent event
				// 	$event_id = get_query_var( 'event' );
				  
				  //post query arguments
				  // $args = array(
				    // 'post-parent' => $event_id
				    // );
				    
				// 	$classes = get_posts($args);
					
				// 	foreach ($classes as $class) {
					 // echo $class->post_title;
				// 	}
					?>
					
					Testy

				</article> <!-- .et_pb_post -->

			<?php endwhile; ?>

</div> <!-- #main-content -->

<?php get_footer(); ?>