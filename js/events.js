$(function(){
  //var max = Math.max.apply(undefined, $('.circle-content-wrapper').map(function(){ return $(this).outerWidth() }).get());
  $('.outer-circle').each(function(){
    var $content = $(this).find('.circle-content');
    var size = Math.max($content.outerWidth(), $content.outerHeight()) + 10;
    $(this).css({
      'height' : size + 'px',
      'width' : size + 'px'
    });
  }).click(function(){
    var $this = $(this).find('.inner-circle').css('transform', 'rotateX(90deg)');
    var offset = $this.offset();
    var h = $this.height();
    var w = $this.width();
    var scrollTop = $(document).scrollTop();
    $('.overlay').css({
      'top' : (offset.top - scrollTop  + h/2) + 'px',
      'left': (offset.left + w/2) + 'px',
    }).show().data('circle', this);
    $('.full-overlay').fadeIn(100);
    setTimeout(function(){
      var winH = $(window).height();
      var winW = $(window).width();
      var size = Math.min(winH, winW);
      $('.overlay').animate({
        'top' : (winH - size)/2 + 'px',
        'left': (winW - size)/2 + 'px',
        'height': size + 'px',
        'width' : size + 'px'
      });
    }, 200);
  });

  var close = function(){
    var $circle = $( $('.overlay').data('circle') );
    var offset = $circle.offset();
    var h = $circle.height();
    var w = $circle.width();
    var scrollTop = $(document).scrollTop();
    $('.full-overlay').fadeOut();
    $('.overlay').animate({
      'height': '0',
      'width' : '0',
      'top' : (offset.top - scrollTop  + h/2) + 'px',
      'left': (offset.left + w/2) + 'px',
    }, 200, function(){
      $( $(this).hide().data('circle') ).find('.inner-circle').css('transform', 'rotateX(0deg)');
    });
  }
  $(document).on('keydown', function(e){
    if ( ( e.which == 27 || e.key == "Esc" || e.key == "Escape" ) && $('.overlay').is(':visible') ) {
      close();
    }
  });
  $('.full-overlay').click(close);
});
