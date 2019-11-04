/* Copyright (c) 2009 Domenico Gigante (http://scripts.reloadlab.net)
 * 
 * Dual licensed under:
 * 
 * 1) MIT (http://www.opensource.org/licenses/mit-license.php)
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 * 
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 * 
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 * 
 * 2) GPL (http://www.opensource.org/licenses/gpl-license.php) licenses.
 * CustomScroller is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 * 
 * CustomScroller is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 * 
 * You should have received a copy of the GNU General Public License
 * along with CustomScroller.  If not, see <http://www.gnu.org/licenses/>.
 * 
 * Thanks to: http://fromvega.com/scripts for drag effect.
 * Thanks for the community that is helping the improvement
 * of this little piece of code.
 *
 * Version: 1.2
 * Date: 15th Oct, 2009
 * 
 * Requires: jQuery 1.3.2+, jquery.mousewheel.js 3.0.2+, jquery.wresize.js 1.1+
 */

(function ($) {
	
	// COLLECTION OF OBJECT ELEMENTS
	var _that = {};
	var _divs = {};
	
	// ON FOCUS
	var _isOnFocus;
	
	// SELECTABLE
	var _isSelectable;
	var _selectDirection;
	
	// INTERVAL
	var _intervalid;
	
	// MAIN PLUGIN (SCROLLER SET)
	$.fn.customScroller = function (options) {
		
		// DEFAULT SETTINGS
		options = $.extend({
			width: null,
			height: null,
			horizontal: 1,
			vertical: 1,
			speed: 4
		}, options);
		
		// INIT SCROLLBARS
		if (this.length > 0) {
			
			var _lastDate;
			
			this.each(function (index, domElement) {
				
				// IF NO ID IS DEFINED ASSIGN A UNIQUE ONE
				if (undefined === this.id || !this.id.length) this.id = "customScroller_" + _curDate;
				
				var _curDate = new Date().getTime();
				
				// ID UNIQUE
				var _uniqueID = (_lastDate === _curDate)? "ID_" + (_curDate + 1000): "ID_" + _curDate;
				
				// THIS REFERRER
				if (!_that[this.id]) _that[this.id] = this;
				_that[this.id]._uniqueID = _uniqueID;
				
				// OBJECT DIVS ARRAY
				_divs[_uniqueID] = {};
				
				// GET DIV WIDTH
				if (!options.width) {
					if ($(this).css('width') !== 'auto') {
						_divs[_uniqueID].width = ($(this).css('width').indexOf('%') > 0)? '100%': parseInt($(this).css('width'), 10) + 'px';
					} else {
						// PROBLEM IF NO WIDTH IS SET
						return false;
					}
				} else {
					_divs[_uniqueID].width = ((options.width + '').indexOf('%') > 0 || (options.width + '').indexOf('px') > 0)? options.width: parseInt(options.width, 10) + 'px';
					$(this).css('width', _divs[_uniqueID].width);
				}
				
				// GET DIV HEIGHT
				if (!options.height) {
					if ($(this).css('height') !== 'auto') {
						_divs[_uniqueID].height = ($(this).css('height').indexOf('%') > 0)? '100%': parseInt($(this).css('height'), 10) + 'px';
					} else {
						// PROBLEM IF NO HEIGHT IS SET
						return false;
					}
				} else {
					_divs[_uniqueID].height = ((options.height + '').indexOf('%') > 0 || (options.height + '').indexOf('px') > 0)? options.height: parseInt(options.height, 10) + 'px';
					$(this).css('height', _divs[_uniqueID].height);
				}
				
				// SET THIS OVERFLOW HIDDEN
				$(this).css("overflow", "hidden");
				
				// SET THIS POSITION RELATIVE (FOR IE)
				$(this).css("position", "relative");
				
				// SET SPEED SCROLL (PX/20 MILLISECONDI)
				_divs[_uniqueID].speed = (!$(this).attr('speed'))? options.speed: parseInt($(this).attr('speed'), 10);
				if (isNaN(_divs[_uniqueID].speed)) {
					_divs[_uniqueID].speed = options.speed;
				}
				
				// NO VERTICAL SCROLL
				_divs[_uniqueID].vertical = (!$(this).attr('vertical'))? options.vertical: parseInt($(this).attr('vertical'), 10);
				if (isNaN(_divs[_uniqueID].vertical)) {
					_divs[_uniqueID].vertical = options.vertical;
				}

				// NO HORIZONTAL SCROLL
				_divs[_uniqueID].horizontal = (!$(this).attr('horizontal'))? options.horizontal: parseInt($(this).attr('horizontal'), 10);
				if (isNaN(_divs[_uniqueID].horizontal)) {
					_divs[_uniqueID].horizontal = options.horizontal;
				}
				

				///////////////////////
				// TEMPLATE ///////////
				///////////////////////
				
				// HTML CONTAINER TEMPLATE
				var _containerHTML = '<div class="customScrollerContainer" id="customScrollerContainer_' + _uniqueID + '">';
				_containerHTML += '<div class="customScrollerContent" id="customScrollerContent_' + _uniqueID + '">';
				_containerHTML += $(this).html();
				_containerHTML += '</div></div>';
				$(this).html(_containerHTML);
				
				// CONTAINER AND CONTENT REFERRER
				_divs[_uniqueID].objContainer = $("#customScrollerContainer_" + _uniqueID);
				_divs[_uniqueID].objContent = $("#customScrollerContent_" + _uniqueID);
				
				// SET CONTAINER CSS PROPERTY
				_divs[_uniqueID].objContainer.css({
												  position: 'relative',
												  float: 'left',
												  width: '100%',
												  height: '100%',
												  overflow: 'hidden',
												  margin: '0px',
												  border: '0px',
												  padding: '0px'
												  });
				// SET CONTENT CSS PROPERTY
				_divs[_uniqueID].objContent.css({
												  position: 'absolute',
												  top: '0px',
												  left: '0px',
												  margin: '0px',
												  border: '0px',
												  padding: '10px'
												  });
				
				// HTML VERTICAL SCROLLER TEMPLATE
				var _vscrollerHTML = '<div id="divVScrollerBar_' + _uniqueID + '" class="divVScrollerBar">';
				_vscrollerHTML += '<span id="divVScrollerBar_up_' + _uniqueID + '" class="divVScrollerBarUp"><span></span></span>';
				_vscrollerHTML += '<span id="divVScrollerBar_trace_' + _uniqueID + '" class="divVScrollerBarTrace">';
				_vscrollerHTML += '<span id="divVScrollerBar_cursor_' + _uniqueID + '" class="divVScrollerBarCursor"><span></span></span>';
				_vscrollerHTML += '</span>';
				_vscrollerHTML += '<span id="divVScrollerBar_down_' + _uniqueID + '" class="divVScrollerBarDown"><span></span></span>';
				_vscrollerHTML += '</div>';
				
				// PREPEND VERTICAL SCROLLER
				$(this).prepend(_vscrollerHTML);
				
				// VERTICAL SCROLLER OBJECTS REFERRER
				_divs[_uniqueID].objVScroller = $("#divVScrollerBar_" + _uniqueID);
				_divs[_uniqueID].objUp = $("#divVScrollerBar_up_" + _uniqueID);
				_divs[_uniqueID].objDown = $("#divVScrollerBar_down_" + _uniqueID);
				_divs[_uniqueID].objVTrace = $("#divVScrollerBar_trace_" + _uniqueID);
				_divs[_uniqueID].objVCursor = $("#divVScrollerBar_cursor_" + _uniqueID);
					
				// SET VERTICAL SCROLLER CSS PROPERTY
				_divs[_uniqueID].objVScroller.css({
												  float: 'right',
												  overflow: 'hidden',
												  padding: '0px'
												  });
				_divs[_uniqueID].objUp.css({
												  display: 'block',
												  width: '100%',
												  overflow: 'hidden'
												  });
				_divs[_uniqueID].objDown.css({
												  display: 'block',
												  width: '100%',
												  overflow: 'hidden'
												  });
				_divs[_uniqueID].objVTrace.css({
												  display: 'block',
												  position: 'relative',
												  width: '100%',
												  overflow: 'hidden',
												  margin: '0px',
												  border: '0px',
												  padding: '0px'
												  });
				_divs[_uniqueID].objVCursor.css({
												  display: 'block',
												  position: 'absolute',
												  width: '100%',
												  overflow: 'hidden',
												  top: '0px',
												  left: '0px',
												  margin: '0px',
												  border: '0px',
												  padding: '0px'
												  });
				
				// HTML HORIZONTAL SCROLLER TEMPLATE
				var _oscrollerHTML = '<div id="divOScrollerBar_' + _uniqueID + '" class="divOScrollerBar">';
				_oscrollerHTML += '<span id="divOScrollerBar_left_' + _uniqueID + '" class="divOScrollerBarLeft"><span></span></span>';
				_oscrollerHTML += '<span id="divOScrollerBar_trace_' + _uniqueID + '" class="divOScrollerBarTrace">';
				_oscrollerHTML += '<span id="divOScrollerBar_cursor_' + _uniqueID + '" class="divOScrollerBarCursor"><span></span></span>';
				_oscrollerHTML += '</span>';
				_oscrollerHTML += '<span id="divOScrollerBar_right_' + _uniqueID + '" class="divOScrollerBarRight"><span></span></span>';
				_oscrollerHTML += '<div style="clear: both;"></div></div>';
				
				// APPEND HORIZONTAL SCROLLER
				$(this).append(_oscrollerHTML);
					
				// HORIZONTAL SCROLLER OBJECTS REFERRER
				_divs[_uniqueID].objOScroller = $("#divOScrollerBar_" + _uniqueID);
				_divs[_uniqueID].objLeft = $("#divOScrollerBar_left_" + _uniqueID);
				_divs[_uniqueID].objRight = $("#divOScrollerBar_right_" + _uniqueID);
				_divs[_uniqueID].objOTrace = $("#divOScrollerBar_trace_" + _uniqueID);
				_divs[_uniqueID].objOCursor = $("#divOScrollerBar_cursor_" + _uniqueID);
				
				// SET HORIZONTAL SCROLLER CSS PROPERTY
				_divs[_uniqueID].objOScroller.css({
												  float: 'left',
												  overflow: 'hidden',
												  padding: '0px'
												  });
				_divs[_uniqueID].objLeft.css({
												  float: 'left',
												  display: 'block',
												  height: '100%',
												  margin: '0px',
												  overflow: 'hidden'
												  });
				_divs[_uniqueID].objRight.css({
												  float: 'left',
												  display: 'block',
												  height: '100%',
												  margin: '0px',
												  overflow: 'hidden'
												  });
				_divs[_uniqueID].objOTrace.css({
												  float: 'left',
												  display: 'block',
												  position: 'relative',
												  height: '100%',
												  overflow: 'hidden',
												  margin: '0px',
												  border: '0px',
												  padding: '0px'
												  });
				_divs[_uniqueID].objOCursor.css({
												  display: 'block',
												  position: 'absolute',
												  height: '100%',
												  overflow: 'hidden',
												  top: '0px',
												  left: '0px',
												  margin: '0px',
												  border: '0px',
												  padding: '0px'
												  });
				
				// END OF SCROLLER
				$(this).append('<div style="clear: both;"></div>');
				
				// FUNCTION TO INIT AND CHANGE SCROLLER
				$.fn.setScroller = function () {
				
					if (this.length > 0) {
						
						this.each(function (index, domElement) {
							
							if (_that[this.id]._uniqueID && _that[this.id]._uniqueID.length > 0) {
								
								var id = _that[this.id]._uniqueID;
								
								if (_divs[id]) {
										
									// SET INIT STATUS VERTICAL AND HORIZONTAL
									_divs[id]._vscroll = false;
									_divs[id]._oscroll = false;
									
									_divs[id].objOScroller.hide();
									_divs[id].objVScroller.hide();
									
									_divs[id].objContainer.css({
															   width: '100%',
															   height: '100%'
															   });
									
									// IE BUG FIX (TEXT NO FILL CONTENT BOX WITH IMAGE)
									if ($.browser.msie) {
										_divs[id].objContent.css({
																   width: 'auto'
																   });
									}
									
									// IF CONTENT HEIGHT > CONTAINER HEIGHT, THEN...
									if (_divs[id].vertical === 1 && _divs[id]._vscroll === false && _divs[id].objContainer.height() > 0 && _divs[id].objContent.outerHeight(true) > _divs[id].objContainer.height()) {
										
										// SET VERTICAL SCROLLER EXIST
										_divs[id]._vscroll = true;
										
										// SHOW VERTICAL SCROLLER
										_divs[id].objVScroller.show();
									
										// SET CONTAINER WIDTH
										_divs[id].objContainer.css('width', (_divs[id].objContainer.width() - _divs[id].objVScroller.outerWidth(true) - 1) + 'px');
										
										// GET CONTAINER AND CONTENT HEIGHT
										_divs[id].containerHeight = _divs[id].objContainer.height();
										_divs[id].contentHeight = _divs[id].objContent.outerHeight(true);
										
										// SET SCROLLER HEIGHT
										_divs[id].objVScroller.css('height', _divs[id].containerHeight + 'px');
										
										// ESTIMATE TRACE HEIGHT
										_divs[id].traceHeight = _divs[id].containerHeight - _divs[id].objUp.outerHeight(true) - _divs[id].objDown.outerHeight(true);
										
										// SET TRACE HEIGHT
										_divs[id].objVTrace.css('height', _divs[id].traceHeight + 'px');
										
										// ESTIMATE CURSOR HEIGHT
										_divs[id].cursorHeight = Math.ceil((_divs[id].traceHeight * _divs[id].containerHeight) / _divs[id].contentHeight);
										
										// SET CURSOR HEIGHT
										_divs[id].objVCursor.css('height', _divs[id].cursorHeight + 'px');
										
										// DIFFERENCE BETWEEN TRACE HEIGHT AND CURSOR HEIGHT
										_divs[id].traceVVoid = _divs[id].traceHeight - _divs[id].cursorHeight;
										
										// ACTUAL TRACE POSITION TOP
										_divs[id].posVTrace = _divs[id].objVTrace.offset().top;
										
										// SET CURSOR TOP POSITION
										var cursorY = (0 - parseInt(_divs[id].objContent.css('top'), 10)) * _divs[id].traceVVoid / (_divs[id].contentHeight - _divs[id].containerHeight);
										_divs[id].objVCursor.css('top', cursorY + 'px');
									}
									
									// IF CONTENT WIDTH > CONTAINER WIDTH, THEN...
									if (_divs[id].horizontal === 1 && _divs[id]._oscroll === false && _divs[id].objContainer.width() > 0 && _divs[id].objContent.outerWidth(true) > _divs[id].objContainer.width()) {
					
										// SET HORIZONTAL SCROLLER EXIST
										_divs[id]._oscroll = true;
										
										// SHOW HORIZONTAL SCROLLER
										_divs[id].objOScroller.show();
						
										// SET CONTAINER HEIGHT
										_divs[id].objContainer.css('height', (_divs[id].objContainer.height() - _divs[id].objOScroller.outerHeight(true)) + 'px');
										
										// GET CONTAINER AND CONTENT WIDTH
										_divs[id].containerWidth = _divs[id].objContainer.width();
										_divs[id].contentWidth = _divs[id].objContent.outerWidth(true);
							
										// SET SCROLLER WIDTH
										_divs[id].objOScroller.css('width', _divs[id].containerWidth + 'px');
										
										// ESTIMATE TRACE WIDTH
										_divs[id].traceWidth = _divs[id].containerWidth - _divs[id].objLeft.outerWidth(true) - _divs[id].objRight.outerWidth(true);
										
										// SET TRACE WIDTH
										_divs[id].objOTrace.css('width', _divs[id].traceWidth + 'px');
										
										// ESTIMATE CURSOR WIDTH
										_divs[id].cursorWidth = Math.ceil((_divs[id].traceWidth * _divs[id].containerWidth) / _divs[id].contentWidth);
										
										// SET CURSOR WIDTH
										_divs[id].objOCursor.css('width', _divs[id].cursorWidth + 'px');
										
										// DIFFERENCE BETWEEN TRACE WIDTH AND CURSOR WIDTH
										_divs[id].traceOVoid = _divs[id].traceWidth - _divs[id].cursorWidth;
										
										// ACTUAL TRACE POSITION LEFT
										_divs[id].posOTrace = _divs[id].objOTrace.offset().left;
										
										// SET CURSOR LEFT POSITION
										var cursorX = (0 - parseInt(_divs[id].objContent.css('left'), 10)) * _divs[id].traceOVoid / (_divs[id].contentWidth - _divs[id].containerWidth);
										_divs[id].objOCursor.css('left', cursorX + 'px');
										
										// IF VERTICAL SCROLLER EXIST, THEN...
										if (_divs[id].vertical === 1 && _divs[id]._vscroll === true) {
											
											// GET CONTAINER AND CONTENT HEIGHT
											_divs[id].containerHeight = _divs[id].objContainer.height();
											_divs[id].contentHeight = _divs[id].objContent.outerHeight(true);
										
											// SET SCROLLER HEIGHT
											_divs[id].objVScroller.css('height', _divs[id].containerHeight + 'px');
											
											// ESTIMATE TRACE HEIGHT
											_divs[id].traceHeight = _divs[id].containerHeight - _divs[id].objUp.outerHeight(true) - _divs[id].objDown.outerHeight(true);
											
											// SET TRACE HEIGHT
											_divs[id].objVTrace.css('height', _divs[id].traceHeight + 'px');
											
											// ESTIMATE CURSOR HEIGHT
											_divs[id].cursorHeight = Math.ceil((_divs[id].traceHeight * _divs[id].containerHeight) / _divs[id].contentHeight);
											
											// SET CURSOR HEIGHT
											_divs[id].objVCursor.css('height', _divs[id].cursorHeight + 'px');
											
											// DIFFERENCE BETWEEN TRACE HEIGHT AND CURSOR HEIGHT
											_divs[id].traceVVoid = _divs[id].traceHeight - _divs[id].cursorHeight;
											
											// ACTUAL TRACE POSITION TOP
											_divs[id].posVTrace = _divs[id].objVTrace.offset().top;
											
											// SET CURSOR TOP POSITION
											var cursorY = (0 - parseInt(_divs[id].objContent.css('top'), 10)) * _divs[id].traceVVoid / (_divs[id].contentHeight - _divs[id].containerHeight);
											_divs[id].objVCursor.css('top', cursorY + 'px');
								
										}
										
									}
									
									// IE BUG FIX (TEXT NO FILL CONTENT BOX WITH IMAGE)
									if ($.browser.msie) {
										_divs[id].objContent.css({
																   width: _divs[id].objContent.width() + 'px'
																   });
									}
									
									// IF NO SCROLLER, THEN..
									if (_divs[id]._vscroll === false) {
										_divs[id].objContent.css('top', '0px');
									}
									if (_divs[id]._oscroll === false) {
										_divs[id].objContent.css('left', '0px');
									}
									
									// GET CONTAINER OFFSET
									_divs[id].containerOffset = _divs[id].objContainer.offset();
									
									// GET CONTAINER AND CONTENT HEIGHT
									_divs[id].containerHeight = _divs[id].objContainer.height();
									_divs[id].contentHeight = _divs[id].objContent.outerHeight();
									
									// GET CONTAINER AND CONTENT WIDTH
									_divs[id].containerWidth = _divs[id].objContainer.width();
									_divs[id].contentWidth = _divs[id].objContent.outerWidth(true);
								
								}
							
							}
						
						});
					
					}
				
				};
				
				// INIT SET SCROLLER
				$(this).setScroller();
				
				
				/////////////////////
				// EVENTS ///////////
				/////////////////////
				
				// ONMOUSEDOWN SET FOCUS ON ELEMENT
				$(this).bind('mousedown', function (e) {
					e.stopPropagation();
					_isOnFocus = _uniqueID;
				});
					
				// ONMOUSEDOWN SET SELECTABLE ON ELEMENT
				_divs[_uniqueID].objContainer.bind('mousedown', function (e) {
					_isSelectable = _uniqueID;
					_selectDirection = null;
				});
				
				// ONMOUSEMOVE SELECT CONTENT
				_divs[_uniqueID].objContainer.bind('mousemove', function (e) {
	
					if (!_isSelectable) return;
						
					var containerOffset = _divs[_isSelectable].containerOffset;
					var containerHeight = _divs[_isSelectable].containerHeight;
					var containerWidth = _divs[_isSelectable].containerWidth;
						
					_stopMove();
						
					if (_divs[_isSelectable]._vscroll === true && e.pageY > containerOffset.top && e.pageY < containerOffset.top + 10) {
						_selectDirection = 'up';
						_startMoveUp(_divs[_isSelectable], 1);
					} else if (_divs[_isSelectable]._oscroll === true && e.pageX > containerOffset.left && e.pageX < containerOffset.left + 10) {
						_selectDirection = 'left';
						_startMoveLeft(_divs[_isSelectable], 1);
					} else if (_divs[_isSelectable]._vscroll === true && e.pageY > (containerOffset.top + containerHeight - 10) && e.pageY < (containerOffset.top + containerHeight)) {
						_selectDirection = 'down';
						_startMoveDown(_divs[_isSelectable], -1);
					} else if (_divs[_isSelectable]._oscroll === true && e.pageX > (containerOffset.left + containerWidth - 10) && e.pageX < (containerOffset.left + containerWidth)) {
						_selectDirection = 'right';
						_startMoveRight(_divs[_isSelectable], -1);
					}
				});
				
				// ONMOUSEUP UNSET SELECTABLE ON ELEMENT
				_divs[_uniqueID].objContainer.bind('mouseup', function (e) {
					_stopMove();
					_isSelectable = null;
					_selectDirection = null;
				});
				
				if ($().mousewheel) {
					// ONMOUSEWHEEL VERTICAL
					_divs[_uniqueID].objContainer.bind('mousewheel', function (e, delta) {
						(delta > 0)?_moveUp(_divs[_uniqueID], delta):_moveDown(_divs[_uniqueID], delta);
						
						return false;
					});
					
					// ONMOUSEWHEEL HORIZONTAL
					if (_divs[_uniqueID]._vscroll === false) {
						_divs[_uniqueID].objContainer.bind('mousewheel', function (e, delta) {
							(delta > 0)?_moveLeft(_divs[_uniqueID], delta):_moveRight(_divs[_uniqueID], delta);
							
							return false;
						});
					}
				}
				
				// VERTICAL SCROLLER EVENTS
				_divs[_uniqueID].objVTrace.bind("mousedown", function (e) {
					var spanY = (e.pageY - _divs[_uniqueID].posVTrace);
					if (spanY > (_divs[_uniqueID].cursorHeight + parseInt(_divs[_uniqueID].objVCursor.css('top'), 10))) {
						_moveDown(_divs[_uniqueID], -3);
					} else if (spanY < parseInt(_divs[_uniqueID].objVCursor.css('top'), 10)) {
						_moveUp(_divs[_uniqueID], 3);
					}
					
					return false;
				});
					
				_divs[_uniqueID].objUp.bind("mouseover", function (e) {
					$('span', this).addClass('hover');
					_startMoveUp(_divs[_uniqueID]);
					
					return false;
				});
					
				_divs[_uniqueID].objDown.bind("mouseover", function (e) {
					$('span', this).addClass('hover');
					_startMoveDown(_divs[_uniqueID]);
					
					return false;
				});
					
				_divs[_uniqueID].objUp.bind("mouseout", function (e) {
					$('span', this).removeClass('hover');
					_stopMove();
					
					return false;
				});
					
				_divs[_uniqueID].objDown.bind("mouseout", function (e) {
					$('span', this).removeClass('hover');
					_stopMove();
					
					return false;
				});
					
				_divs[_uniqueID].objVCursor.bind("mouseover", function (e) {
					$('span', this).addClass('hover');
					
					return false;
				});

				_divs[_uniqueID].objVCursor.bind("mouseout", function (e) {
					$('span', this).removeClass('hover');
					
					return false;
				});

				// SET VERTICAL CURSOR DRAGGABLE
				$(_divs[_uniqueID].objVCursor).dragCursor(_uniqueID, 'bottom');
				
				$(_divs[_uniqueID].objVCursor).ondrag(function (e, element) { 
					var cursorY = parseInt(_divs[_uniqueID].objVCursor.css('top'), 10);
					var contentY = 0 - (cursorY * (_divs[_uniqueID].contentHeight - _divs[_uniqueID].containerHeight) / _divs[_uniqueID].traceVVoid);
					_divs[_uniqueID].objContent.css('top', contentY + "px");
					
					return false;
				});
				
				// HORIZONTAL SCROLLER EVENTS
				_divs[_uniqueID].objOTrace.bind("mousedown", function (e) {
					var spanX = (e.pageX - _divs[_uniqueID].posOTrace);
					if (spanX > (_divs[_uniqueID].cursorWidth + parseInt(_divs[_uniqueID].objOCursor.css('left'), 10))) {
						_moveRight(_divs[_uniqueID], -3);
					} else if (spanX < parseInt(_divs[_uniqueID].objOCursor.css('left'), 10)) {
						_moveLeft(_divs[_uniqueID], 3);
					}
					
					return false;
				});
					
				_divs[_uniqueID].objLeft.bind("mouseover", function (e) {
					$('span', this).addClass('hover');
					_startMoveLeft(_divs[_uniqueID]);
					
					return false;
				});
					
				_divs[_uniqueID].objRight.bind("mouseover", function (e) {
					$('span', this).addClass('hover');
					_startMoveRight(_divs[_uniqueID]);
					
					return false;
				});
					
				_divs[_uniqueID].objLeft.bind("mouseout", function (e) {
					$('span', this).removeClass('hover');
					_stopMove();
					
					return false;
				});
					
				_divs[_uniqueID].objRight.bind("mouseout", function (e) {
					$('span', this).removeClass('hover');
					_stopMove();
					
					return false;
				});
					
				_divs[_uniqueID].objOCursor.bind("mouseover", function (e) {
					$('span', this).addClass('hover');
					
					return false;
				});

				_divs[_uniqueID].objOCursor.bind("mouseout", function (e) {
					$('span', this).removeClass('hover');
					
					return false;
				});

				// SET HORIZONTAL CURSOR DRAGGABLE
				$(_divs[_uniqueID].objOCursor).dragCursor(_uniqueID, 'right');
				
				$(_divs[_uniqueID].objOCursor).ondrag(function (e, element) { 
					var cursorX = parseInt(_divs[_uniqueID].objOCursor.css('left'), 10);
					var contentX = 0 - (cursorX * (_divs[_uniqueID].contentWidth - _divs[_uniqueID].containerWidth) / _divs[_uniqueID].traceOVoid);
					_divs[_uniqueID].objContent.css('left', contentX + "px");
					
					return false;
				});
				
				_lastDate = _curDate;
			});
			
			$.anchorFix();
			
		}
	};

	// ADD ANCHORS SUPPORT
	$.anchorFix = function () {
		$('a').each(function (index, domElement) {
			$(this).bind('click', function (e) {
				var getHref = $(this).attr('href');
				if (getHref && getHref.indexOf('#') !== -1) {
					var anchors = getHref.replace(window.location.href, '');
					anchors = anchors.substring(anchors.indexOf('#'));
				}
				var targets = $(this).attr('target');
				if (anchors && targets && _that[targets]) {
					if (anchors.length > 0 && _that[targets]._uniqueID.length > 0 && anchors.charAt(0) === '#') {
						var topAnchor = $('a[name=' + anchors.substring(1) + ']').parent().offset().top;
						var topContainer = _divs[_that[targets]._uniqueID].objContainer.offset().top;
						var topContent = parseInt(_divs[_that[targets]._uniqueID].objContent.css('top'), 10);
										
						var offScroll = topContent + ( ( 0 - parseInt(topAnchor - topContainer, 10) ) ); 
										
						var maxScroll = ((0 - _divs[_that[targets]._uniqueID].contentHeight) + _divs[_that[targets]._uniqueID].containerHeight);
										
						if (offScroll < maxScroll) {
							offScroll = maxScroll;
						}
										
						_divs[_that[targets]._uniqueID].objContent.css('top', offScroll + 'px');
								
						// set cursor top position
						var cursorY = (0 - parseInt(offScroll, 10)) * _divs[_that[targets]._uniqueID].traceVVoid / (_divs[_that[targets]._uniqueID].contentHeight - _divs[_that[targets]._uniqueID].containerHeight);
						_divs[_that[targets]._uniqueID].objVCursor.css('top', cursorY + 'px'); // imposta scrol cursore
			
						return false;
					}
				}
			});
		});
	};
	
	// All move function
	var _startMoveDown = function (objCopy, wheelDelta) {
		_intervalid = window.setInterval(function () { _moveDown(objCopy, wheelDelta); }, 20);
	};
		
	var _startMoveUp = function (objCopy, wheelDelta) {
		_intervalid = window.setInterval(function () { _moveUp(objCopy, wheelDelta); }, 20);
	};
		
	var _startMoveRight = function (objCopy, wheelDelta) {
		_intervalid = window.setInterval(function () { _moveRight(objCopy, wheelDelta); }, 20);
	};
		
	var _startMoveLeft = function (objCopy, wheelDelta) {
		_intervalid = window.setInterval(function () { _moveLeft(objCopy, wheelDelta); }, 20);
	};
		
	var _stopMove = function () {
		if (_intervalid) window.clearInterval(_intervalid);
	};
		
	var _moveDown = function (objCopy, wheelDelta) {
		var increment;
		if (wheelDelta) increment = (0 - parseInt(wheelDelta * 5, 10));
		else increment = 1;
		var scrolling = parseInt(objCopy.objContent.css('top'), 10);
		var maxScroll = ((0 - objCopy.contentHeight) + objCopy.containerHeight);
		if (scrolling >= maxScroll) {
			var delTop = scrolling - parseInt(objCopy.speed * increment, 10);
			if (delTop < maxScroll) delTop = maxScroll;
			objCopy.objContent.css('top', delTop + 'px');
			var addTop = parseInt((((0 - delTop) * objCopy.traceVVoid) / (objCopy.contentHeight - objCopy.containerHeight)), 10);
			objCopy.objVCursor.css('top', addTop + 'px');
		}
	};
		
	var _moveUp = function (objCopy, wheelDelta) {
		var increment;
		if (wheelDelta) increment = parseInt(wheelDelta * 5, 10);
		else increment = 1;
		var scrolling = parseInt(objCopy.objContent.css('top'), 10);
		if (scrolling <= 0) {
			var addTop = scrolling + parseInt(objCopy.speed * increment, 10);
			if (addTop > 0) addTop = 0;
			objCopy.objContent.css('top', addTop + 'px');
			var delTop = parseInt((((0 - addTop) * objCopy.traceVVoid) / (objCopy.contentHeight - objCopy.containerHeight)), 10);
			objCopy.objVCursor.css('top', delTop + 'px');
		}
	};
	
	var _moveRight = function (objCopy, wheelDelta) {
		var increment;
		if (wheelDelta) increment = (0 - parseInt(wheelDelta * 5, 10));
		else increment = 1;
		var scrolling = parseInt(objCopy.objContent.css('left'), 10);
		var maxScroll = ((0 - objCopy.contentWidth) + objCopy.containerWidth);
		if (scrolling >= maxScroll) {
			var delRight = scrolling - parseInt(objCopy.speed * increment, 10);
			if (delRight < maxScroll) delRight = maxScroll;
			objCopy.objContent.css('left', delRight + 'px');
			var addLeft = parseInt((((0 - delRight) * objCopy.traceOVoid) / (objCopy.contentWidth - objCopy.containerWidth)), 10);
			objCopy.objOCursor.css('left', addLeft + 'px');
		}
	};
		
	var _moveLeft = function (objCopy, wheelDelta) {
		var increment;
		if (wheelDelta) increment = parseInt(wheelDelta * 5, 10);
		else increment = 1;
		var scrolling = parseInt(objCopy.objContent.css('left'), 10);
		if (scrolling <= 0) {
			var addLeft = scrolling + parseInt(objCopy.speed * increment, 10);
			if (addLeft > 0) addLeft = 0;
			objCopy.objContent.css('left', addLeft + 'px');
			var delRight = parseInt((((0 - addLeft) * objCopy.traceOVoid) / (objCopy.contentWidth - objCopy.containerWidth)), 10);
			objCopy.objOCursor.css('left', delRight + 'px');
		}
	};
	
	// DRAG PLUGIN (CURSORS DRAGGABLE)
	$.fn.dragCursor = function (id, which) {
		
		// SOME PRIVATE VARS
		var _isMouseDown = false;
		var _currentElement = null;
		var _dragCallbacks = {};
		var _lastMouseX;
		var _lastMouseY;
		var _lastElemTop;
		var _lastElemLeft;
		
		if (_divs[id]) {
			
			// DEFAUL SETTINGS
			options = {
				maxTop: 0,
				maxRight: 0,
				maxBottom: 0,
				maxLeft: 0
			};
					
			// REGISTER THE FUNCTION TO BE CALLED WHILE AN ELEMENT IS BEING DRAGGED
			$.fn.ondrag = function (callback) {
				if (this.length > 0) {
					return this.each(function () {
						_dragCallbacks[this.id] = callback;
					});
				}
			};
			
			if (this.length > 0) {
				this.each(function (index, domElement) {
					
					// WHEN AN ELEMENT RECEIVES A MOUSE PRESS
					$(this).bind("mousedown", function (e) {
											
						if (which === 'bottom') {
							options.maxTop = 0;
							options.maxRight = 0;
							options.maxBottom = _divs[id].traceVVoid;
							options.maxLeft = 0;
						}
						if (which === 'right') {
							options.maxTop = 0;
							options.maxRight = _divs[id].traceOVoid;
							options.maxBottom = 0;
							options.maxLeft = 0;
						}
						
						// UPDATE TRACK VARIABLES
						_isMouseDown = true;
						
						_currentElement = this;
						
						// RETRIEVE POSITIONING PROPERTIES
						var offset = $(this).offset();
						var parentOffSet = $(this).offsetParent();
						var additionalOffSet = {};
						if (parentOffSet.length > 0) {
							additionalOffSet.top = parentOffSet.offset().top;
							additionalOffSet.left = parentOffSet.offset().left;
						}
						
						// GLOBAL POSITION RECORDS
						_lastMouseX = e.pageX;
						_lastMouseY = e.pageY;
						
						_lastElemTop = offset.top - additionalOffSet.top;
						_lastElemLeft = offset.left - additionalOffSet.left;
						
						// UPDATE THE POSITION
						updatePosition(e);
						
						return false;
					});
				});
			}
			
			// UPDATES THE POSITION OF THE CURRENT ELEMENT BEING DRAGGED
			var updatePosition = function (e) {
				var spanX = (e.pageX - _lastMouseX);
				var spanY = (e.pageY - _lastMouseY);
				
				var Y = _lastElemTop + spanY;
				var X = _lastElemLeft + spanX;
				
				if (options.maxTop !== null && Y < options.maxTop) Y = options.maxTop;
				if (options.maxLeft !== null && X < options.maxLeft) X = options.maxLeft;
				if (options.maxBottom !== null && Y > options.maxBottom) Y = options.maxBottom;
				if (options.maxRight !== null && X > options.maxRight) X = options.maxRight;
						
				$(_currentElement).css("top", Y + 'px');
				$(_currentElement).css("left", X + 'px');
			};
			
			// WHEN THE MOUSE IS MOVED WHILE THE MOUSE BUTTON IS PRESSED
			$(document).bind("mousemove", function (e) {
				if (_isMouseDown === true) {
					
					// UPDATE THE POSITION
					updatePosition(e);
					
					// CALL ONDRAG FUNCTION
					if (typeof _dragCallbacks[_currentElement.id] === 'function') {
						_dragCallbacks[_currentElement.id](e, _currentElement);
					}
					
					return false;
				}
			});
			
			// WHEN THE MOUSE BUTTON IS RELEASED
			$(document).bind("mouseup", function (e) {
					
				_isMouseDown = false;
					
				return false;
			});
		
		}
	};
	
	// AJAX PLUGIN (LOADING CONTENT INTO ELEMENT AND SET SCROLLER)
	$.fn.ajaxScroller = function (url, data, options) {
		
		// DEFAUL SETTINGS
		options = $.extend({

		}, options);
		
		if (this.length > 0) {
			this.each(function (index, domElement) {
				$(this).html("Loading...");
				
				$(this).load(url, data, function (responseText, textStatus, XMLHttpRequest) {
					if (textStatus === "success") {
						$(this).customScroller(options);
					} else {
						alert('Error');
					}
				});
			});
		}
	};
	
	// ONREADY DOCUMENT EVENTS
	$(document).ready(function () { 
		
		// ONMOUSEDOWN RESET FOCUS
		$(document).bind('mousedown', function (e) {
			_isOnFocus = null;
		});
	
		// MOVE ON KEY PRESS
		$(document).bind("keydown keypress", function (e) {
			
			if (!_isOnFocus) return;
	
			switch(e.which) {
				case 38: // UP
					_moveUp(_divs[_isOnFocus], 1);	
				break;
							
				case 40: // DOWN
					_moveDown(_divs[_isOnFocus], -1);
				break;
							
				case 37: // LEFT
					_moveLeft(_divs[_isOnFocus], 1);
				break;
							
				case 39: // RIGHT
					_moveRight(_divs[_isOnFocus], -1);
				break;
				
				case 33: // UP
					_moveUp(_divs[_isOnFocus], 3);	
				break;
							
				case 34: // DOWN
					_moveDown(_divs[_isOnFocus], -3);
				break;
							
				case 36: // LEFT
					_moveLeft(_divs[_isOnFocus], 3);
				break;
							
				case 35: // RIGHT
					_moveRight(_divs[_isOnFocus], -3);
				break;
				
				default:
					return true;
				break;
			}
			return false;
		});
				
		// RESIZE FRAME ON RESIZE WINDOW
		if ($().wresize) {
			$(window).wresize(function () {
				
				if (_intervalid) clearTimeout(_intervalid); 
				
				_intervalid = setTimeout(function () {
					
					$.each(_that, function (key, value) {
						
						if (typeof value !== 'function') {
							
							$(value).setScroller();
						
						}
						
					});
				
				}, 100); 
				
				return false;
			});
		}
	});
})(jQuery);

