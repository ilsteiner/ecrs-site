function reactToChange(selector,changing,changed) {
  jQuery(selector).eq(changing).on("change paste keyup", function() {
    jQuery(selector).eq(changed).val(jQuery(this).val()).change();
  });

  //Make the changed field read only
  jQuery(selector).eq(changed).prop("readonly",true);
  jQuery(selector).eq(changed).addClass("readonly");
}

jQuery(document).ready(function(jQuery) {
	// Changes to first name field affect third name field
	//reactToChange(".c-name input",0,2);

	// Changes to second name field affect fourth name field
	//reactToChange(".c-name input",1,3);

	//Changes to first email field affect second email field
	//reactToChange(".c-email input",0,1); 
});