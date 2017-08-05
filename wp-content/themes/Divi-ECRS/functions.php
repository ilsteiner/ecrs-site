<?php

add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );

}


function sign_in_widget() {
	register_sidebar( array(
		'name'          => 'Sign In & Social',
		'id'            => 'sign-in'
	) );
}
add_action( 'widgets_init', 'sign_in_widget' );

function mailing_list_widget() {
	register_sidebar( array(
		'name'          => 'Mailing List',
		'id'            => 'mailing-list'
	) );
}
add_action( 'widgets_init', 'mailing_list_widget' );

function callouts_widget() {
	register_sidebar( array(
		'name'          => 'Callouts',
		'id'            => 'callout-container'
	) );
}
add_action( 'widgets_init', 'callouts_widget' );

function fpw_change_read_more( $read_more_text ) {
	$read_more_text = __( 'Learn More', 'your-text-domain' );
	return $read_more_text;
}
add_filter( 'fpw_read_more_text', 'fpw_change_read_more' );
add_filter( 'fpw_read_more_ellipsis', '__return_null' );

function events_widget() {
	register_sidebar( array(
		'name'          => 'Events',
		'id'            => 'events-widget'
	) );
}
add_action( 'widgets_init', 'events_widget' );

add_filter('wp_nav_menu_items', 'add_login_logout_link', 10, 2);
function add_login_logout_link($items, $args) {
	ob_start();
    wp_loginout('index.php');
    $loginoutlink = ob_get_contents();
    ob_end_clean();
    $items .= '<li class="loginout">'. $loginoutlink .'</li>';
    return $items;
}


/*Redirect to home page after logout*/
add_action('wp_logout','go_home');
function go_home(){
  wp_redirect( home_url() );
  exit();
}

add_action( 'wp_head', 'add_ga_script' );

function add_ga_script()
{
echo "<script type='text/javascript'>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-42351781-1', 'auto');
  ga('send', 'pageview');
</script>";
}

// Rewrite rule for class list page
add_action('init', function() {
    add_rewrite_rule( '^class-descriptions/([A-Za-z-]+)/?',
                      'index.php?pagename=class-descriptions&event_name=$matches[1]',
                      'top' );
}, 10, 0);

add_action('init', function() {
    add_rewrite_tag( '%event_name%', '([^&]+)' );
}, 10, 0);

//Enqueue tabs plugin
function register_tabs_stuff() {
  if ( is_page( 'class-descriptions' ) ) {
    wp_enqueue_style( 'tabs-styles', get_stylesheet_directory_uri() . '/plugins/Easy-Responsive-Tabs-to-Accordion/css/easy-responsive-tabs.css' );
    wp_enqueue_script( 'tabs-script', get_stylesheet_directory_uri() . '/plugins/Easy-Responsive-Tabs-to-Accordion/js/easyResponsiveTabs.js' );
    
  }
}
add_action( 'wp_enqueue_scripts', 'register_tabs_stuff' );
?>
