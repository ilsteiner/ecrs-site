<?php
//get event slug
global $wp;

$event_name = end(explode('/', home_url( $wp->request )));

//get event object
$event = null;

$query = new WP_Query(
        array(
            'name'   => $event_name,
            'post_type'   => 'event',
            'suppress_filters' => false
        ) );

$events = $query->get_posts();

$event = $events[0];

// Fix the title
if($event != null){
  add_filter( 'wp_title', 'event_title', 100 );
}
function event_title($title) {
    global $event;
    if(!$event) {
        $title = the_title();
    } else {
        $title = the_title(get_the_title($event).'&nbsp');
    }
    return $title;
}

get_header();

?>
<div id="main-content">

			<?php while ( have_posts() ) : the_post(); ?>
        <div class="extra-title">
          <h1 class="extra-title">
            <?php echo get_the_title($event) ?>
          </h1>
          <div class="sub-title">
            Class Descriptions
          </div>
        </div>
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

					<div class="entry-content">
					<?php
						the_content();
					?>
					
					<?php
          // Event with that name not found
          if ( is_null( $event ) ){
              echo '<div class="not-found">No event found with this name.</div>';
          }
          
          //Event found
          else {
  				  //Arguments to find classes

            $args = array(
              'meta_query' => array(array('key' => '_wpcf_belongs_event_id', 'value' => $event->ID)),
              'post_type'   => 'class', 
              'numberposts' => -1,
              'order' => 'ASC'
            );

            $classes = get_children( $args );

            /*$class_query = new WP_Query(
              array(
                'post-parent' => $event->ID,
                'post_type' => 'class',
                'orderby' => 'title',
                'order' => 'ASC',
                'posts_per_page' => -1
              ) );
  				    
  					$classes = $class_query->get_posts();*/
  					
  					//No classes found
  					if( is_null($classes) || count($classes) == 0 ) {
  					  echo '<div class="not-found">No classes found for this event.</div>';
  					}
  					
  					//Display found classes
  					else{
  					  echo '<div class="class-contents">';
  					  
  					    echo '<div class="class-names">';
  					      echo '<ul class="class-names">';
        					  foreach ($classes as $class) {
        					    echo '<li class="class-name class-name-' . $class->post_name . '" onclick="class_click(\'' . $class->post_name . '\')">'
        					            . $class->post_title .
        					         '</li>';
        					  }
  					      echo '</ul>';
  					    echo '</div>';
  					  
  					    // All the class descriptions
  					    echo '<div class="class-descriptions">';
      					  foreach ($classes as $class) {
      					   // Generate shortcodes
      					   $leader_shortcode = '[types field="class-leader" id="' . $class->ID . '" separator=", "][/types]';
      					   $age_shortcode = '[types field="class-age" id="' . $class->ID . '"][/types]';
      					   $info_shortcode = '[types field="class-info" id="' . $class->ID . '"][/types]';
      					   
      					         // Individual content wrapper
      					    echo '<div class="class-description" id="' . $class->post_name . '">'
      					           //Class name wrapper
      					         . '<h3>'
      					           . $class->post_title
      					         . '</h3>'
      					           //Leader wrapper
      					         . '<h5 class="class-leaders">'
      					         . do_shortcode($leader_shortcode)
      					         . '</h5>'
      					           //Copy wrapper
      					         . '<div class="class-copy">'
      					            . $class->post_content
      					         . '</div>'
      					           //Age wrapper
      					         . '<div class="class-age">'
      					            . do_shortcode($age_shortcode)
      					         . '</div>'
      					           //Info wrapper
      					         . '<div class="class-info">'
      					            . do_shortcode($info_shortcode)
      					         . '</div>'
      					       . '</div>';
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