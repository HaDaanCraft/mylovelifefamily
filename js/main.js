$(document).ready(() => {

  // Navigation Bar

  $(function(){
    $("#header").load("./files/header.php");
  });

  $(function(){
    $("#nav").load("./files/nav.php");
  });

  // Sticky nav bar

  var num = 0; //number of pixels before modifying styles

  $(window).bind('scroll', function () {
      if ($(window).scrollTop() > num) {
          $('.nav').addClass('sticky');
      } else {
          $('.nav').removeClass('sticky');
      }
  });
});
