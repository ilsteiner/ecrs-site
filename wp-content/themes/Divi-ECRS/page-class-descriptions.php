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
					
					echo 'Slug: ' . $event_name;
					
					//get event object
					$event = null;
          
          if ( $events = eo_get_events( array(
              'name' => $event_name
          ) ) ) $event = $events[0];
          
          // Event with that name not found
          if ( is_null( $event ) ){
              echo '<div class="not-found">No event found with this name.</div>';
          }
          
          //Event found
          else {
            echo '<div>Event name: ' . get_the_title($event) . '</div>';
          
  				  //Arguments to find classes
  				  $args = array(
  				    'post-parent' => $event->ID,
  				    'post_type' => 'class'
  				    );
  				    
  					$classes = get_posts($args);
  					
  					//No classes found
  					if( is_null($classes) ) {
  					  echo '<div class="not-found">No classes found for this event.</div>';
  					}
  					
  					//Display found classes
  					else{
  					  echo '<ul class="classes">';
  					  
  					  $is_first = true;
  					  
  					  foreach ($classes as $class) {
  					    echo '<li class="class' . ($is_first === true ? ' active' : '' ) . '">' . $class->post_title . '</li>';
  					    $is_first = false;
  					  }
  					  
  					  echo '</ul>';
  					}
          }
					?>

				</article> <!-- .et_pb_post -->

			<?php endwhile; ?>

</div> <!-- #main-content -->

<?php get_footer(); ?>