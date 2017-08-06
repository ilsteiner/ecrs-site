jQuery(document).ready(function() {
  if(window.location.hash) {
    //Get the fragment/hash
    var hash = window.location.hash.substring(1);
    activate_class_tab(hash);
  }
});

function activate_class_tab(index) {
  //Deactivate old tab
  jQuery(".class-name.active").removeClass("active");
  
  //Activate new tab
  jQuery(".class-name-" + index).addClass("active");
}

function class_click(index) {
  location.hash = "desc-" + index;
  window.scrollTo(0,0);
  
  activate_class_tab(index);
}