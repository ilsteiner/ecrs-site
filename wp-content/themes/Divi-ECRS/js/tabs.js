jQuery(document).ready(function() {
  if(window.location.hash) {
    //Get the fragment/hash
    var hash = window.location.hash.substring(1);
    activate_class_tab(hash);
  }
});

function activate_class_tab(index) {
  index = jQuery.trim(index);
  
  //Deactivate old tab
  jQuery(".class-name.active").removeClass("active");
  
  //Cut selected tab
  var new_tab = jQuery(".class-name-" + index).detach();
  
  //Paste selected tab at top of the list
  jQuery(new_tab).insertBefore(".class-name:first-of-type");
  
  //Activate new tab
  new_tab.addClass("active");
}

function class_click(index) {
  index = jQuery.trim(index);
  
  location.hash = index;
  window.scrollTo(0,0);
  
  activate_class_tab(index);
}