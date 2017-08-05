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
					//get event slug
					$event_name = get_query_var( 'event_name' );
					
					//get event object
					$event = null;

          if ( $events = get_posts( array(
              'name' => $event_name,
              'post_type' => 'event',
              'suppress_filters' => 'false',
              'post_status' => 'publish',
              'posts_per_page' => 1
          ) ) ) $event = $events[0];
          
          // Event with that name not found
          if ( ! is_null( $event ) ){
              echo "Event not found";
          }
          
          else {
            echo '<div>Event name: ' . get_the_title($event) . '</div>';
          }
				  
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