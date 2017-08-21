jQuery(document).ready(function($) {
  doTheStuff();
});

function doTheStuff() {
  console.log("It fired!");
  
  var softCutoff = jQuery("div.c-calculation-date[data-field='SoftCutoff'] .c-content").text();
  
  //Insert ordinal
  addOrdinal(jQuery(".c-calculation-singleline:first-of-type .c-content"));
  addOrdinal(jQuery(".c-calculation-singleline:last-of-type .c-content"));
  
  // Add DOM elements
  jQuery(".c-calculation-singleline:first-of-type .c-content").append("<div class='counter'</div>");
  jQuery(".c-calculation-singleline:last-of-type .c-content").append("<div class='counter'</div>");
  
  var counter =
  countdown(
    function(ts) {
      console.log("Counter fired!");
      jQuery('.counter').html(ts.toHTML());
    },
    new Date(softCutoff),
    countdown.DAYS |
    countdown.HOURS |
    countdown.MINUTES |
    countdown.SECONDS,4);
}

function addOrdinal(element) {
  console.log("Add ordinal");
  var num = element.text().match(/[\d]+/);
  var ordinalNum = getOrdinal(num);
  element.text(element.text().replace(/[\d]+/,ordinalNum));
}

function getOrdinal(n) {
  console.log("Get ordinal");
    var s=["th","st","nd","rd"],
    v=n%100;
    return n+(s[(v-20)%10]||s[v]||s[0]);
}