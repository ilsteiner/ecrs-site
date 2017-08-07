jQuery(document).ready(function() {
  
  if(window.location.hash) {
    //Get the fragment/hash
    var hash = window.location.hash.substring(1);
    
    //For initial page load
    activate_class_tab(hash);
    
    //For manual hash change event
    $( window ).hashchange(function() {
      activate_class_tab(hash)
    });
  }
});

function activate_class_tab(index) {
  index = jQuery.trim(index);
  
  window.scrollTo(0,0);
  
  //Register events for after the old tab animations
  jQuery(".class-name.active").on("webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend",
    function(e){
      //Deactivate the old tab
      var old_tab = jQuery(this).addClass("viewed").removeClass("active").css({'opacity':'1', 'transform':'none', 'transition':'none'}).detach();
      
      //Move old tab to bottom of the list
      jQuery(old_tab).insertAfter(".class-name:last-of-type");
      jQuery(this).off(e);
  });
  
  jQuery(".class-name.active").css({
  	'transition': 'all .3s ease',
  	'transform': 'translate(0px, 400px)',
  	'opacity': '0'
  });
  
  //Cut selected tab
  var new_tab = jQuery(".class-name-" + index).detach();
  
  //Paste selected tab at top of the list
  jQuery(new_tab).insertBefore(".class-name:first-of-type");
  
  //Activate new tab
  new_tab.addClass("active").removeClass("viewed");
}

function class_click(index) {
  index = jQuery.trim(index);
  
  location.hash = index;
  
  activate_class_tab(index);
}