<?php
  $current_page = "events";
?>
<!DOCTYPE html>
<html>
<head>
  <title>Events | Felicity Buzz</title>
  <meta charset="utf-8">
  <link href='http://fonts.googleapis.com/css?family=Loto|Rock+Salt' rel='stylesheet' type='text/css'>
  
  <!-- Jquery | Include from Google 
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <!-- If jquery unavailable from Google, get a local copy -->
  <script>
  if (!window['jQuery']) {
	  document.write('<script src="js/jquery.min.js">\x3C/script>');
  }
  </script>
  <link rel="stylesheet" type="text/css" href="css/common.css">
  <link rel="stylesheet" type="text/css" href="css/events.css">
</head>
<body>
  <?php include_once('header.php'); ?>
  <div class="container">
    <h1 class="heading">Events</h1>
    <hr />
    
    <div class="row">
      <div class="sub-heading-wrapper">
        <h3 class="sub-heading">Threads</h3>
      </div>
      <div class="circle-container no-user-select">
        
        <div class="circle-wrapper">
          <div class="outer-circle">
            <div class="inner-circle">
              <div class="circle-content-wrapper"><div class="circle-content">Hackathon</div></div>
            </div>
          </div>
        </div>
        <div class="circle-wrapper">
          <div class="outer-circle">
            <div class="inner-circle">
              <div class="circle-content-wrapper"><div class="circle-content">Break In</div></div>
            </div>
          </div>
        </div>
        <div class="circle-wrapper">
          <div class="outer-circle">
            <div class="inner-circle">
              <div class="circle-content-wrapper"><div class="circle-content">Code Craft</div></div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <hr />
    <!-- ----------------------------------------------------------------------- -->
    <div class="row">
      <div class="sub-heading-wrapper">
        <h3 class="sub-heading">Threads</h3>
      </div>
      <div class="circle-container no-user-select">
        
        <div class="circle-wrapper">
          <div class="outer-circle">
            <div class="inner-circle">
              <div class="circle-content-wrapper"><div class="circle-content">Hackathon</div></div>
            </div>
          </div>
        </div>
        <div class="circle-wrapper">
          <div class="outer-circle">
            <div class="inner-circle">
              <div class="circle-content-wrapper"><div class="circle-content">Break In</div></div>
            </div>
          </div>
        </div>
        <div class="circle-wrapper">
          <div class="outer-circle">
            <div class="inner-circle">
              <div class="circle-content-wrapper"><div class="circle-content">Code Craft</div></div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <hr />
    <!-- ----------------------------------------------------------------------- -->
    
  </div>
  <div class="full-overlay"></div>
  <div class="overlay"></div>
  <script>
$(function(){
  //var max = Math.max.apply(undefined, $('.circle-content-wrapper').map(function(){ return $(this).outerWidth() }).get());
  $('.outer-circle').each(function(){
    var $content = $(this).find('.circle-content');
    var size = Math.max($content.outerWidth(), $content.outerHeight()) + 1;
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
  
  $(document).on('keydown', function(e){
    if ( ( e.key == "Esc" || e.key == "Escape" ) && $('.overlay').is(':visible') ) {
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
  });
});
  </script>
</body>
</html>