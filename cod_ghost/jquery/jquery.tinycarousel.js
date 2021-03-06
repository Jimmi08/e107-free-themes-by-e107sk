/*
 * Tiny Carousel 1.8
 *
 * Copyright (c) 2010 Maarten Baijs
 *
 * Date: 10 / 11 / 2010
 * Library: jQuery
 * 
 */
(function($){
	$.fn.tinycarousel = function(options){
		var defaults = { 
			start: 1, // where should the carousel start?
			display: 1, // how many blocks do you want to move at 1 time?
			axis: 'x', // vertical or horizontal scroller? ( x || y ).
			controls: true, // show left and right navigation buttons.
			pager: false, // is there a page number navigation present?
			interval: false, // move to another block on intervals.
			intervaltime: 3000, // interval time in milliseconds.
			rewind: false, // If interval is true and rewind is true it will play in reverse if the last slide is reached.
			animation: true, // false is instant, true is animate.
			duration: 1000, // how fast must the animation move in ms?
			callback: null // function that executes after every move
		};
		var options = $.extend(defaults, options);  

		var oSlider = $(this);
		var oViewport = $('.viewport:first', oSlider);
		var oContent = $('.overview:first', oSlider);
		var oPages = oContent.children();
		var oBtnNext = $('.next:first', oSlider);
		var oBtnPrev = $('.prev:first', oSlider);
		var oPager = $('.pager:first', oSlider);
		var iPageSize, iSteps, iCurrent, oTimer, bPause, bForward = true, bAxis = options.axis == 'x';

		return this.each(function(){
			initialize();
		});
		function initialize(){
			iPageSize = bAxis ? $(oPages[0]).outerWidth(true) : $(oPages[0]).outerHeight(true);
			var iLeftover = Math.ceil(((bAxis ? oViewport.outerWidth() : oViewport.outerHeight()) / (iPageSize * options.display)) -1);
			iSteps = Math.max(1, Math.ceil(oPages.length / options.display) - iLeftover);
			iCurrent = Math.min(iSteps, Math.max(1, options.start)) -2;
			oContent.css(bAxis ? 'width' : 'height', (iPageSize * oPages.length));
			move(1);
			setEvents();
		}
		function setEvents(){
			if(options.controls && oBtnPrev.length > 0 && oBtnNext.length > 0){
				oBtnPrev.click(function(){move(-1); return false;});
				oBtnNext.click(function(){move( 1); return false;});
			}
			if(options.interval){
				oSlider.hover(function(){clearTimeout(oTimer); bPause = true},function(){bPause = false; setTimer();});
			}
			if(options.pager && oPager.length > 0){
				$('a',oPager).click(setPager);
			}
		}
		function setButtons(){
			if(options.pager){
				var oNumbers = $('.pagenum', oPager);
				oNumbers.removeClass('active');
				$(oNumbers[iCurrent]).addClass('active');
			}			
		}		
		function setPager(oEvent){
			if($(this).hasClass('pagenum')){
				iCurrent = parseInt(this.rel) -1;
				move(1);
			}
			return false;
		}
		function setTimer(){
			if(options.interval && !bPause){
				clearTimeout(oTimer);
				oTimer = setTimeout(function(){
					iCurrent = !options.rewind && (iCurrent +1 == iSteps) ? -1 : iCurrent;
					bForward = iCurrent +1 == iSteps ? false : iCurrent == 0 ? true : bForward;
					move((options.rewind ? (bForward ? 1 : -1) : 1));
				}, options.intervaltime);
			}
		}
		function move(iDirection){
			if(iCurrent + iDirection > -1 && iCurrent + iDirection < iSteps){
				iCurrent += iDirection;
				var oPosition = {};
				oPosition[bAxis ? 'left' : 'top'] = -(iCurrent * (iPageSize * options.display));	
				oContent.animate(oPosition,{
					queue: false,
					duration: options.animation ? options.duration : 0,
					complete: function(){
						if(typeof options.callback == 'function')
						options.callback.call(this, oPages[iCurrent], iCurrent);
					}
				});
				setButtons();
				setTimer();
			}
		}
	};
})(jQuery);