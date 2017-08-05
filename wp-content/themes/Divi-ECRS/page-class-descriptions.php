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
					$event_name = get_query_var( 'event_name' );
					
					echo '<div>Event name: ' . $event_name . '</div>';
				  
				  //post query arguments
				  $args = array(
				    'post-parent' => $event_name
				    );
				    
					$classes = get_posts($args);
					
					foreach ($classes as $class) {
					  echo $class->post_title;
					}
					?>
					
					Testy

				</article> <!-- .et_pb_post -->

			<?php endwhile; ?>

</div> <!-- #main-content -->

<?php get_footer(); ?>