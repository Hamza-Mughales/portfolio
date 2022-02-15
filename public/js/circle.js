$(function() {

    $(".c-progress").each(function() {
  
      var value = $(this).attr('data-value');
      var left = $(this).find('.c-progress-left .c-progress-bar');
      var right = $(this).find('.c-progress-right .c-progress-bar');
  
      if (value > 0) {
        if (value <= 50) {
          right.css('transform', 'rotate(' + percentageToDegrees(value) + 'deg)')
        } else {
          right.css('transform', 'rotate(180deg)')
          left.css('transform', 'rotate(' + percentageToDegrees(value - 50) + 'deg)')
        }
      }
  
    })
  
    function percentageToDegrees(percentage) {
  
      return percentage / 100 * 360
  
    }
  
  });
  