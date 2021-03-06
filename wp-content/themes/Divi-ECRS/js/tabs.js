jQuery(document).ready(function() {
  
  if(window.location.hash.length > 0) {
    //Get the fragment/hash
    var hash = window.location.hash.substring(1);
    
    //For initial page load
    jQuery.when(activate_class_tab(hash)).done(function(){
      setTimeout(function(){
        window.scrollTo(0,0);
      }, 500);
    });
  }
  //No hash
  else {
    jQuery(".class-name:first-of-type").click();
  }
});

//For manual hash change event
jQuery( window ).bind('hashchange', function() {
  activate_class_tab(window.location.hash.substring(1));
});

function activate_class_tab(index) {
  index = jQuery.trim(index);
  
  window.scrollTo(0,0);
  
  //Deactivate old tab
  old_tab = jQuery(".class-name.active").addClass("viewed").removeClass("active").detach();
  
  //Move old tab to bottom of the list
  jQuery(old_tab).insertAfter(".class-name:last-of-type");
  
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