jQuery(function($) {
	var hideFields = '[data-vc-shortcode-param-name="controls_size"], [data-vc-shortcode-param-name="css_animation"], [data-vc-shortcode-param-name="size"], [data-vc-shortcode-param-name="color"], [data-vc-shortcode-param-name="no_fill_content_area"], [data-vc-shortcode-param-name="no_fill"], [data-vc-shortcode-param-name="gap"], [data-vc-shortcode-param-name="autoplay"], [data-vc-shortcode-param-name="pagination_style"]';

	/* Add parameters to VC shortcodes */
	function anpsAddParam(shortcode, name, paramValue, paramText) {
		$('[data-vc-shortcode="' + shortcode + '"]').find('[data-vc-shortcode-param-name="' + name + '"] select').prepend('<option value="' + paramValue + '" class="' + paramValue + '">' + paramText + '</optioni>');
		
		var field = $( '[data-option="' + paramValue + '"]' ).find('[value="' + paramValue + '"]');
		if( field.length ) {
			field.attr('selected', 'selected');

			/* Hide color */
			$(hideFields).hide();
		}
	}

	/* $('[name="filter_source"]').find('.portfolio_category').val('category') */

	/* FAQ */
	anpsAddParam('vc_toggle', 'style', 'anps-style-1', 'Anpsthemes style');

	/* Tabs */
	anpsAddParam('vc_tta_tabs', 'style', 'anps-style-4', 'Anpsthemes minimal (small)');
	anpsAddParam('vc_tta_tabs', 'style', 'anps-style-3', 'Anpsthemes default (small)');
	anpsAddParam('vc_tta_tabs', 'style', 'anps-style-2', 'Anpsthemes minimal');
	anpsAddParam('vc_tta_tabs', 'style', 'anps-style-1', 'Anpsthemes default');

	/* Button */
	anpsAddParam('vc_btn', 'style', 'anps', 'Anps styles');

	/* Tour */
	anpsAddParam('vc_tta_tour', 'style', 'anps-style-1', 'Anpsthemes style');

	/* Accordion */
	anpsAddParam('vc_tta_accordion', 'style', 'anps-style-1', 'Anpsthemes style');

	/* Hide color */
	$('[data-vc-shortcode-param-name="style"] select').on('change', function() {
		if( $(this).val().toLowerCase().indexOf('anps') > -1 ) {
			$(hideFields).hide();
		} else {
			$(hideFields).show();
		}
	});

	var el = $('.anps-table-field-vals');
	/* Add cells */
	$('.anps-table-field-add-cells button').on('click', function() {
		var elRow = el.find('tr');
		var elChild;
		elRow.each(function(index) {
			if( index === 0 ) {
				elChild = $('<th><input type="text" placeholder="' + el.attr('data-heading-placeholder') + '" /></th>');
			} else {
				elChild = $('<td><input type="text" placeholder="' + el.attr('data-cell-placeholder') + '" /></td>');
			}
			elRow.eq(index).append(elChild);
		});
		$('.anps-table-field-remove-cells tr').append('<td><button>×</button></td>');
		changeEvent();
	});
	/* Add rows */
	$('.anps-table-field-add-rows button').on('click', function() {
		var numRows = el.find('tr').eq(0).children().length;
		var elChild = '';
		for(var i=0;i<numRows;i++) {
			elChild += '<td><input type="text" placeholder="' + el.attr('data-cell-placeholder') + '" /></td>';
		}
		elChild = $('<tr>' + elChild + '</tr>');
		el.append(elChild);
		$('.anps-table-field-remove-rows').append('<button>×</button>');
		changeEvent();
	});
	/* Input field change */
	function contentChange() {
		var tableStructure = "";

		/* Table head */
		var tabHead = el.find('tr').eq(0).find('th');

		tableStructure += '[table_head][table_row]';
		tabHead.each(function(index) {
			tableStructure += '[table_heading_cell]';
			tableStructure += tabHead.eq(index).children('input').val();
			tableStructure += '[/table_heading_cell]';
		});	
		tableStructure += '[/table_row][/table_head]';

		/* Table body */

		var tabBody = el.find('tr');

		tableStructure += '[table_body]';
		tabBody.each(function(index) {
			if(index > 0) {
				tableStructure += '[table_row]';

				var tabData = tabBody.eq(index).find('td');

				tabData.each(function(index) {
					tableStructure += '[table_cell]';
					tableStructure += tabData.eq(index).children('input').val();
					tableStructure += '[/table_cell]';
				});
				tableStructure += '[/table_row]';
			}
		});
		tableStructure += '[/table_body]';

		$('#anps_custom_prod').val(tableStructure);
	}
	/* Input change event handler */
	function changeEvent() {
		el.find('input[type="text"]').unbind('keyup');
		el.find('input[type="text"]').keyup(function() {
			contentChange();
		});
		$('.anps-table-field-remove-cells button').unbind('click');
		$('.anps-table-field-remove-cells button').click(function() {
			removeCells($(this));
		});
		$('.anps-table-field-remove-rows button').unbind('click');
		$('.anps-table-field-remove-rows button').click(function() {
			removeRows($(this));
		});
		contentChange();
	}
	changeEvent();
	/* Remove rows */
	$('.anps-table-field-remove-rows button').on('click', function() {
		removeRows($(this));
	});
	function removeRows(temp) {
		if( temp.index() > 0 ) {
			el.find('tr').eq(temp.index()).remove();
			temp.remove();
		}
		contentChange();
	}
	/* Remove cells */
	$('.anps-table-field-remove-cells button').on('click', function() {
		removeCells($(this));
	});
	function removeCells(temp) {
		if( el.find('th').length > 1 ) {
			el.find('tr').each(function(){
				$(this).find('td, th').eq(temp.parent().index()).remove();
			});
			temp.parent().remove();
		}
		contentChange();
	}
});