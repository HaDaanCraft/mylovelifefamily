$(document).ready(() => {

  // Logged In Checking

  var loggedCookie = Cookies.get('loggedInUserType');
  if (loggedCookie == null && $(location).attr('pathname') != '/mylovelifefamily/login.php') {
    localStorage.link = $(location).attr('pathname');
    $(location).attr('href', 'login.php');
  } else if (loggedCookie != null && $(location).attr('pathname') == '/mylovelifefamily/login.php') {
    $(location).attr('href', localStorage.link);
  }


  // Navigation Bar

  $('#header').load('files/header.php');
  $('#nav').load('files/nav.php');
  $('#navResponsive').load('files/navresponsive.php');

  setTimeout(function () {


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

  // Responsive Nav
  $(".open").click(function(){
    $(this).css("display", "none");
    $(".navResponsive").css("width", "100%");
    $("#my_nanogallery").attr("id", "photo");
  });

  $(".close").click(function(){
    $(".navResponsive").css("width", "0");
    $(".open").css("display", "block");
    $("#photo").attr("id", "my_nanogallery");
  });

  // Sticky Nav Bar

  var num = 0; //number of pixels before modifying styles

  $(window).bind('scroll', function () {
      if ($(window).scrollTop() > num) {
          $('.nav').addClass('sticky');
          $('.headerWrapper h1').addClass('heads');
          $('.list').addClass('pageMargin');
          $('.calendar').addClass('pageMargin');
          $('.recipes').addClass('pageMargin');
          $('.menuw').addClass('pageMargin');
      } else {
          $('.nav').removeClass('sticky');
          $('.headerWrapper h1').removeClass('heads');
          $('.list').removeClass('pageMargin');
          $('.calendar').removeClass('pageMargin');
          $('.recipes').removeClass('pageMargin');
          $('.menuw').removeClass('pageMargin');
      }
  });


  // Photo Album
  
  $("#albumMenuNewAlbum").click(function() {
    var name = prompt("Naam voor het nieuwe album?");
    var url = window.location.href;
    var sendurl = url.replace("#", "µ")
    var regExp = new RegExp("(?<=my_nanogallery\/).*($)");
    if (regExp.test(url)) {
      album = regExp.exec(url)[0];
    } else {
      album = "";
    }
    $(location).attr('href', "photoalbum.php?nameNewFolder="+name+"&album="+album+"&lastPage="+sendurl);
  });

    $("#albumMenuUploadFoto").click(function () {
      var url = window.location.href;
      var sendurl = url.replace("#", "µ")
      var regExp = new RegExp("(?<=my_nanogallery\/).*($)");
      if (regExp.test(url)) {
        album = regExp.exec(url)[0];
      } else {
        album = "";
      }
      $(location).attr('href', "uploadfoto.php?album="+album+"&lastpage="+sendurl);
    });


  // End File
}, 1000);

});
