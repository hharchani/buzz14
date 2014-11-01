$(function(){
  //var max = Math.max.apply(undefined, $('.circle-content-wrapper').map(function(){ return $(this).outerWidth() }).get());
  $('.outer-circle').each(function(){
    var $content = $(this).find('.circle-content');
    var size = Math.max($content.outerWidth(), $content.outerHeight()) + 15;
    $(this).css({
      'height' : size + 'px',
      'width' : size + 'px'
    });
  }).click(function(){
    location.hash = '#'+this.id.substr(0, this.id.length-3);
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
      $overlay = $('.overlay');
      $overlay.animate({
        'top' : (winH - size)/2 + 'px',
        'left': (winW - size)/2 + 'px',
        'height': size + 'px',
        'width' : size + 'px'
      });
      $overlay.find('.overlay-title').html($this.find('.circle-content').html());
      $overlay.find('.overlay-des').html($this.find('.circle-des').html());
      $overlay.find('.overlay-time').html($this.find('.circle-time').html());
      if ($this.find('.circle-venue').html())
        $overlay.find('.overlay-venue').html("Venue: "+$this.find('.circle-venue').html());
      $overlay.find('.overlay-link').html($this.find('.circle-link').html());
    }, 200);
  });

  var close = function(){
    location.hash = '#jugaad';
    var $circle = $( $('.overlay').data('circle') );
    var offset = $circle.offset();
    var h = $circle.height();
    var w = $circle.width();
    var scrollTop = $(document).scrollTop();
    $('.full-overlay').fadeOut();
    $overlay = $('.overlay');
    $overlay.animate({
      'height': '0',
      'width' : '0',
      'top' : (offset.top - scrollTop  + h/2) + 'px',
      'left': (offset.left + w/2) + 'px',
    }, 200, function(){
      $( $(this).hide().data('circle') ).find('.inner-circle').css('transform', 'rotateX(0deg)');
    });
    $overlay.find('.overlay-title').html('');
    $overlay.find('.overlay-des').html('');
    $overlay.find('.overlay-time').html('');
    $overlay.find('.overlay-venue').html('');
    $overlay.find('.overlay-link').html('');
  }
  $(document).on('keydown', function(e){
    if ( ( e.which == 27 || e.key == "Esc" || e.key == "Escape" ) && $('.overlay').is(':visible') ) {
      close();
    }
  });
  $('.full-overlay').click(close);
});

$(document).ready(function() {
  if (location.hash) {
    $circ = $(location.hash+'-id');
    if ($circ.length) {
      $('html, body').animate({'scrollTop': $circ.offset().top - (($(window).height()/2)-100)}, {
        complete: function() {
          $circ.click();
        }
      });
    }
  }
});
