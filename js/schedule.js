var rc = new (function(){
	var rcc = function() {return Math.round(Math.random() * 150) + 40;};
	this.getColor = function() { return 'rgb(' + rcc() + ', ' + rcc() + ',' + rcc() + ')';};
})();

for (event in classes) {
  
  var rcolor = rc.getColor();
	$('.'+ classes[event] +' div' ).each(function(){
    $(this).data({
      'event' : event,
      'color' : rcolor
    });
  })
  .css('background-color',rcolor)
  .hover(function(e){
    var event = $(this).data('event');
		tooltip.show(e, event);
		$('.'+classes[event] + ' div').addClass('onhover');
		
		var hour = $(this).parent().data('hour');
		$('.hour' + hour).addClass('onhover');
  }, function(e){
    $('.onhover').removeClass('onhover');
    tooltip.hide();
  }).click(function(){
		var href = classes[$(this).data('event')];
		window.location = "events.php#"+href;
	});
  
  $('<div class="legend-row"></div>').append(
    $('<div class="legend-color"></div>').css('background-color', rcolor)
  )
	.append(
    $('<div class="legend-label"></div>').css('color', rcolor).html(event)
  )
	.appendTo('.legend-container')
	.data({
		'event': event
	})
	.hover(function(e){
		var event = $(this).addClass('onhover').data('event');
		$('.' + classes[event] + ' div').addClass('onhover');
	},
	function(){
		$('.onhover').removeClass('onhover');
	})
	.click(function(){
		var href = classes[$(this).data('event')];
		window.location = "events.php#"+href;
	});
}
$(function(){
  var elem = $('.legend-container');
  if (elem.outerHeight() > window.innerHeight) {
    elem.css({
      'width' : elem.outerWidth()*2 + 'px'
    }).find('.legend-row').css({
      'width': '50%',
      'float': 'left'
    });
  }
});
var tooltip = new (function(){
	this.show = function(e, event){
		$('.event-tooltip').hide().css({
			'top' : e.pageY + 20 + 'px',
			'left' : e.pageX + 20 + 'px'
		}).html(event).stop().fadeIn(100);
	};
	
	this.hide = function() {
		$('.event-tooltip').stop().fadeOut();
	};
})();
