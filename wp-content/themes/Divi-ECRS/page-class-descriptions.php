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
					
					<?php
					//get event slug
					$event_name = get_query_var( 'event_name' );
					
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
  					  echo '<div class="class-contents">';
  					  
  					    echo '<div class="class-names>';
  					      echo '<ul class="class-names">';
        					  foreach ($classes as $index=>$class) {
        					    echo '<li class="class-name" onclick="location.hash=\'desc-' . $index .'\'">'
        					            . $class->post_title .
        					         '</li>';
        					  }
  					      echo '</ul>';
  					    echo '</div>';
  					  
  					    echo '<div class="class-descriptions">';
      					  foreach ($classes as $index=>$class) {
      					    echo '<div class="class-description" id="desc-' . $index . '">' . $class->post_content . '</div>';
      					  }
      					echo '</div>';
      					 
  					  echo "</div>";
  					}
          }
					?>
					</div> <!-- .entry-content -->

				</article> <!-- .et_pb_post -->

			<?php endwhile; ?>

</div> <!-- #main-content -->

<?php get_footer(); ?>