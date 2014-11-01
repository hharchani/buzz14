var rc = new (function(){
	var rcc = function() {return Math.round(Math.random() * 150) + 40;};
	this.getColor = function() { return 'rgb(' + rcc() + ', ' + rcc() + ',' + rcc() + ')';};
})();
$(function(){
	var legends = new Array();
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
		
		legends.push(
			$('<div class="legend-row"></div>').append(
				$('<div class="legend-color"></div>').css('background-color', rcolor)
			)
			.append(
				$('<div class="legend-label"></div>').css('color', rcolor).html(event)
			)
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
			})
		);
	}
	legends.sort(function(a, b){
		return (b.data('event').localeCompare(a.data('event')));
	});
	while (legends.length) {
		legends.pop().appendTo('.legend-container');
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
