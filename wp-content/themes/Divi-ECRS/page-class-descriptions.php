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
  					  echo '<div id="classTabs">';
  					  
  					  echo '<ul class="class-names resp-tabs-list vert-tab">';
  					  
  					  foreach ($classes as $class) {
  					    echo '<li class="class-name">' . $class->post_title . '</li>';
  					  }
  					  
  					  echo '</ul>';
  					  
  					  
  					  echo '<div class="class-descriptions resp-tabs-container vert-tab">';
  					  
  					  foreach ($classes as $class) {
  					    echo '<div class="class-description">' . $class->post_content . '</div>';
  					  }
  					  
  					  echo "</div>";
  					}
          }
					?>
					</div> <!-- .entry-content -->

				</article> <!-- .et_pb_post -->

			<?php endwhile; ?>

</div> <!-- #main-content -->

<script>
  jQuery('#classTabs').easyResponsiveTabs({
    type: 'default', //Types: default, vertical, accordion
    width: 'auto', //auto or any custom width
    fit: false,   // 100% fits in a container
    //closed: false, // Close the panels on start, the options 'accordion' and 'tabs' keep them closed in there respective view types
    //activate: function() {},  // Callback function, gets called if tab is switched
    tabidentify: 'tab_identifier_child', // The tab groups identifier *This should be a unique name for each tab group and should not be defined in any styling or css file.
    //activetab_bg: '#B5AC5F', // background color for active tabs in this group
    //inactive_bg: '#E0D78C', // background color for inactive tabs in this group
    //active_border_color: '#9C905C', // border color for active tabs heads in this group
    //active_content_border_color: '#9C905C' // border color for active tabs contect in this group so that it matches the tab head border
  });
</script>

<?php get_footer(); ?>