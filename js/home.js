$(function(){
  $('.felicity, .buzz').hide();
  setTimeout(function(){
    $('.felicity, .buzz').fadeIn(1500, function(){
      $('.theme div').css('transform', 'none');
    });
  }, 500);
});