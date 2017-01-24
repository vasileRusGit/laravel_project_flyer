$(document).ready(function() {
  //navbar active states
  $.each($('.nav.navbar-nav').find('li'), function() {
              $(this).toggleClass('active',
                  $(this).find('a').attr('href') == window.location.pathname);
          });
});