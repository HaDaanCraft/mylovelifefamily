$(document).ready(() => {


  // Animations

  $("h1").addClass("animated fadeIn");

  // Smooth Scrolling

  // Select all links with hashes
  $('a[href*="#"]')
  // Remove links that don't actually link to anything
  .not('[href="#"]')
  .not('[href="#0"]')
  .click(function(event) {
    // On-page links
    if (
      location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '')
      &&
      location.hostname == this.hostname
    ) {
      // Figure out element to scroll to
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
      // Does a scroll target exist?
      if (target.length) {
        // Only prevent default if animation is actually gonna happen
        event.preventDefault();
        $('html, body').animate({
          scrollTop: target.offset().top
        }, 1000, function() {
          // Callback after animation
          // Must change focus!
          var $target = $(target);
          $target.focus();
          if ($target.is(":focus")) { // Checking if the target was focused
            return false;
          } else {
            $target.attr('tabindex','-1'); // Adding tabindex for elements not focusable
            $target.focus(); // Set focus again
          };
        });
      }
    }
  });

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
          $('.headerWrapper h1').addClass('heads');
      } else {
          $('.nav').removeClass('sticky');
          $('.headerWrapper h1').removeClass('heads');
      }
  });
});
