$(document).ready(function() {
    var totalSlides = $('.designer-icon').length;
    var currentSlide = 0;
  
    // Function to change slide
    function changeSlide() {
      // Hide the current slide
      $('.designer-icon.active').fadeOut(200, function() {
        $(this).removeClass('active');
      });
  
      // Update the current slide number
      currentSlide = (currentSlide + 1) % totalSlides;
  
      // Show the new slide
      $('.designer-icon[data-slide="' + currentSlide + '"]').fadeIn(200).addClass('active');
    }
  
    // Show the first slide
    $('.designer-icon[data-slide="0"]').addClass('active');
  
    // Change slide every 3 seconds
    setInterval(changeSlide, 5000);
  });
  