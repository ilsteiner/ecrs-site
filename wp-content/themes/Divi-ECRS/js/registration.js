function reactToChange(changing,changed) {
  jQuery(".c-name input").eq(changing).on("change paste keyup", function() {
    jQuery(".c-name input").eq(changed).val(jQuery(this).val());
  });

  //Make the changed field read only
  jQuery(".c-name input").eq(changed).prop("readonly",true);
  jQuery(".c-name input").eq(changed).addClass("readonly");
}

// Changes to first name field affect third name field
reactToChange(0,2);

// Changes to second name field affect fourth name field
reactToChange(1,3);