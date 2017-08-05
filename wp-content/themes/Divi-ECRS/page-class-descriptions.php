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
        					    echo '<li class="class-name"><a href="#class-' . $index . '">' . $class->post_title . '</a></li>';
        					  }
  					      echo '</ul>';
  					    echo '</div>';
  					  
  					    echo '<div class="class-descriptions">';
      					  foreach ($classes as $index=>$class) {
      					    echo '<div class="class-description" id="class-' . $index . '>' . $class->post_content . '</div>';
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

<div class="contents">
<div class="left">
  <ul>
  <li>
    <a href="#tab-1">Tab One</a>
  </li>
  <li>
    <a href="#tab-2">Tab Two</a>
  </li>
    <li>
    <a href="#tab-3">Tab Three</a>
  </li>
    <li>
    <a href="#tab-4">Tab Four</a>
  </li>
    <li>
    <a href="#tab-5">Tab Five</a>
  </li>
</ul>
</div>
<div class="right">
  <div id="tab-1" class="tab">
  Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse aliquam turpis eu dui posuere, in interdum metus efficitur. Integer sit amet turpis id quam molestie posuere in eget felis. Integer aliquet sit amet neque commodo dignissim. Nulla gravida, ante vel suscipit pulvinar, diam urna laoreet ex, at imperdiet mauris massa at ipsum. Pellentesque enim urna, luctus sed tempus ut, pellentesque eu justo. Ut sem nulla, placerat at molestie sit amet, pulvinar eget tellus. Nullam eu gravida eros, non condimentum turpis. Duis interdum et eros sit amet congue. Integer sed viverra leo. Mauris condimentum, dui vel porttitor convallis, magna turpis vulputate tellus, sed fermentum elit libero et elit.
  </div>

  <div id="tab-2" class="tab">
    Integer finibus, lacus id congue aliquet, dui nibh vestibulum mauris, blandit condimentum nisl massa sed arcu. Pellentesque posuere enim a ex molestie, id finibus metus maximus. Morbi pharetra tincidunt ante, tincidunt ultricies nibh dictum eget. In semper leo nunc, eget convallis purus bibendum non. Curabitur dictum finibus blandit. Pellentesque quis nisi condimentum, ultrices augue ac, interdum leo. Proin at ornare sapien. Fusce arcu quam, blandit vel tortor non, vehicula porta ante. Etiam auctor lacus vitae nulla bibendum, at sollicitudin neque tincidunt. Nulla facilisi. Phasellus ipsum purus, mattis eu elit id, tristique sagittis libero.
  </div>
  
  <div id="tab-3" class="tab">
  Sed massa turpis, dapibus sed volutpat at, dapibus congue mauris. Sed ut porta nisl. Suspendisse congue, sapien nec ullamcorper pellentesque, nibh nibh ultrices elit, ut ultricies nunc libero at nunc. Donec vitae felis ipsum. Aenean eleifend, enim eu egestas ullamcorper, dui neque consectetur enim, quis tempus ex sapien sed nisi. Praesent id tellus et nisl ornare blandit eu eu urna. Vivamus malesuada, metus in vulputate malesuada, turpis nunc hendrerit ante, eget tincidunt felis nulla a tortor. Duis dictum ex tellus, sodales auctor orci varius nec. Maecenas congue sodales hendrerit. Proin eu dolor mauris.
  </div>

  <div id="tab-4" class="tab">
    Fusce ultricies lacus justo, eu semper nunc pharetra eget. Quisque fermentum lacus feugiat augue ullamcorper, sit amet commodo ante pulvinar. Vivamus pretium leo tellus, ut pharetra augue luctus ac. Curabitur faucibus ante velit, id hendrerit tellus posuere eget. Aliquam placerat nisi ac varius semper. Proin vel mi vitae dui commodo condimentum eu vel dolor. Suspendisse volutpat dui enim, ut rhoncus ante cursus nec. Nullam efficitur maximus enim non dapibus. Etiam fermentum purus vel augue gravida, a egestas urna maximus.
  </div>
  
  <div id="tab-5" class="tab">
    Duis dictum quam in risus elementum, quis malesuada nisl feugiat. Quisque et orci porttitor, tincidunt risus eu, vestibulum massa. Quisque sit amet efficitur justo. Nam eu lectus vitae metus rhoncus efficitur. Donec ut nulla at justo iaculis dapibus. Curabitur urna libero, euismod ut hendrerit in, congue a nulla. Sed quis facilisis ipsum.
  </div>
</div>
</div>