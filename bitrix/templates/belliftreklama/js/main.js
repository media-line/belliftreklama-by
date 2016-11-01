$(document).ready(function () {
	
	//===UP SCROLL===
	$('#up_button').click(function() {
		$('html, body').animate(
		{ scrollTop: 0 }
		, 500);
	});
	$(window).scroll(function(){
		var scroll_height = $(window).height(); 
		var top = $(document).scrollTop(); 
		if (top < scroll_height) 
			$('#up_button').fadeOut(500) 
		else 
			$('#up_button').fadeIn(500); 
	});
	
	$(".show_calc_description").fancybox({
        padding: 0,
        'hideOnContentClick': true
    });
	
    validate($("#order_feedback_popup"), $("#order_input_email"), $("#order_input_textarea"));

    if ($('select').length) {
        $('select:not([multiple="multiple"])').selectric({
            arrowButtonMarkup: '',
            onChange: function () {

            }
        });
		$('select[multiple="multiple"]').chosen();

		// жилые дома
        if ($('.calculator_homes select').length) {
			var $calculator = $('.calculator_homes');
			var $city = $calculator.find('select#city_select');
			var $area = $calculator.find('select#area_select');
			var $carrier = $calculator.find('select#carrier_select');
			var $day = $calculator.find('select#day_select');
			var $format = $calculator.find('select#format_select');
			var $calc_result = $calculator.find('.calc_result');
			var $calc_result_span = $calc_result.find('span');
			var $loader = $calc_result.find('img');
			var $output = $calculator.find('output');
					
			$area.prop('disabled', true).trigger("chosen:updated");
			$carrier.prop('disabled', true);
			$day.prop('disabled', true);
			$format.prop('disabled', true);
			$calc_result_span.hide();
			$loader.hide();
			$output.hide();
					
            $('.calculator_homes select:not([multiple="multiple"])').selectric({
                arrowButtonMarkup: '',
                onChange: function(el){
					calculatorHomesSelectChange($(el))
				}
            });
			$('.calculator_homes select[multiple="multiple"]').chosen().change(function() {
				calculatorHomesSelectChange($(this));
			});
        }
		
		// элитные дома
        if ($('.calculator_elite select').length) {
			var $calculator = $('.calculator_elite');
			var $city = $calculator.find('select#city_select');
			var $area = $calculator.find('select#area_select');
			var $carrier = $calculator.find('select#carrier_select');
			var $day = $calculator.find('select#day_select');
			var $format = $calculator.find('select#format_select');
			var $calc_result = $calculator.find('.calc_result');
			var $calc_result_span = $calc_result.find('span');
			var $loader = $calc_result.find('img');
			var $output = $calculator.find('output');
					
			$area.prop('disabled', true).trigger("chosen:updated");
			$carrier.prop('disabled', true);
			$day.prop('disabled', true);
			$format.prop('disabled', true);
			$calc_result_span.hide();
			$loader.hide();
			$output.hide();
					
            $('.calculator_elite select:not([multiple="multiple"])').selectric({
                arrowButtonMarkup: '',
                onChange: function(el){
					calculatorEliteSelectChange($(el))
				}
            });
			$('.calculator_elite select[multiple="multiple"]').chosen().change(function() {
                var options = $(this).context.options;
                var index = options.selectedIndex;

                if(index > -1 && options[index].innerText !== undefined){
                    if(options[index].innerText.toLowerCase() == 'выбрать все') {
                        $('#area_select option').removeAttr("selected");
                        $('#area_select option:not(:contains(Выбрать все))').attr('selected', 'selected');
                        $(this).trigger('chosen:updated');
                    }
                }
                calculatorEliteSelectChange($(this));
			});
        }

        $('.calculator_elite li[data-option-array-index=0]').click(function(){
            $('#area_select option').attr('selected', 'selected');
            $('.calculator_elite select').trigger('chosen:updated');
        });
		
		// бизнес центры
        if ($('.calculator_business select').length) {
			var $calculator = $('.calculator_business');
			var $city = $calculator.find('select#city_select');
			var $area = $calculator.find('select#area_select');
			var $carrier = $calculator.find('select#carrier_select');
			var $day = $calculator.find('select#day_select');
			var $format = $calculator.find('select#format_select');
			var $calc_result = $calculator.find('.calc_result');
			var $calc_result_span = $calc_result.find('span');
			var $loader = $calc_result.find('img');
			var $output = $calculator.find('output');
					
			$area.prop('disabled', true).trigger("chosen:updated");
			$carrier.prop('disabled', true);
			$day.prop('disabled', true);
			$format.prop('disabled', true);
			$calc_result_span.hide();
			$loader.hide();
			$output.hide();
					
            $('.calculator_business select:not([multiple="multiple"])').selectric({
                arrowButtonMarkup: '',
                onChange: function(el){
					calculatorBusinessSelectChange($(el))
				}
            });
			$('.calculator_business select[multiple="multiple"]').chosen().change(function() {
				calculatorBusinessSelectChange($(this));
			});
        }
		
		// административные здания
        if ($('.calculator_admin select').length) {
			var $calculator = $('.calculator_admin');
			var $city = $calculator.find('select#city_select');
			var $area = $calculator.find('select#area_select');
			var $carrier = $calculator.find('select#carrier_select');
			var $day = $calculator.find('select#day_select');
			var $format = $calculator.find('select#format_select');
			var $calc_result = $calculator.find('.calc_result');
			var $calc_result_span = $calc_result.find('span');
			var $loader = $calc_result.find('img');
			var $output = $calculator.find('output');
					
			//$area.prop('disabled', true).trigger("chosen:updated");
			$carrier.prop('disabled', true);
			$day.prop('disabled', true);
			$format.prop('disabled', true);
			$calc_result_span.hide();
			$loader.hide();
			$output.hide();
					
            $('.calculator_admin select:not([multiple="multiple"])').selectric({
                arrowButtonMarkup: '',
                onChange: function(el){
					calculatorAdminSelectChange($(el))
				}
            });
			$('.calculator_admin select[multiple="multiple"]').chosen().change(function() {
				calculatorAdminSelectChange($(this));
			});
        }
    }

});

					
function calculatorHomesSelectChange(th){		
	var $calculator = $('.calculator_homes');
	var $calc_description = $('#calc_description_container');
	var $show_calc_description = $('.show_calc_description');
	var $city = $calculator.find('select#city_select');
	var $area = $calculator.find('select#area_select');
	var $carrier = $calculator.find('select#carrier_select');
	var $day = $calculator.find('select#day_select');
	var $format = $calculator.find('select#format_select');
	var $calc_result = $calculator.find('.calc_result');
	var $calc_result_span = $calc_result.find('span');
	var $loader = $calc_result.find('img');
	var $output = $calculator.find('output');
	
    var path = '/ajax/calculator_homes/'

    var $fieldRequest = th;
    var $fieldAnswer;
	
	var attr = th.attr('multiple');
	var selectId = "";
	if (typeof attr !== typeof undefined && attr !== false) {
		selectId = th.chosen().val();
	} else {
		selectId = th.val();
	}
	
    var type = $fieldRequest.attr('name');
    var build = $calculator.find('[name="build"]').val();
    var props = { };

    switch (th.attr('id')) {
        case 'city_select':
            $area.prop('disabled', true).trigger("chosen:updated");
            $carrier.prop('disabled', true);
            $day.prop('disabled', true);
            $format.prop('disabled', true);
            $fieldAnswer = $area;
            break;
        case 'area_select':
            $carrier.prop('disabled', true);
            $day.prop('disabled', true);
            $format.prop('disabled', true);
            $fieldAnswer = $carrier;
            props.city = $city.val();
            break;
        case 'carrier_select':
            $day.prop('disabled', true);
            $format.prop('disabled', true);
            $fieldAnswer = $day;
            props.city = $city.val();
            props.area = $area.val();
            break;
        case 'day_select':
            $format.prop('disabled', true);
            $fieldAnswer = $format;
            props.city = $city.val();
            props.area = $area.val();
            props.carrier = $carrier.val();
            break;
        case 'format_select':
            props.city = $city.val();
            props.area = $area.val();
            props.carrier = $carrier.val();
            props.day = $day.val();
            break;
    }
    $('.calculator_homes select:not([multiple="multiple"])').selectric('refresh');
	$('.calculator_homes select[multiple="multiple"]').trigger("chosen:updated");
    $output.html('');
    $output.hide();
    $calc_result_span.hide();
    $loader.show();

    props.type = type;
    props.id = selectId;
    props.build = build;

    $.get(
        path,
        props,
        function (data) {
            $loader.hide();
			switch ($fieldRequest.attr('id')) {
                case 'area_select':
                    console.log(path);
					$calc_description.html(data.area_description);
					$show_calc_description.hide();
					if (typeof data.area_description !== "undefined" && data.area_description != ""){
						$show_calc_description.show();
					}
					break;
				case 'city_select':
					$show_calc_description.hide();
					break;
            }
            switch ($fieldRequest.attr('id')) {
                case 'format_select':
                    $output.html(data.answer);
                    $output.show();
                    $calc_result_span.show();
                    break;
                default:
					var attr = $fieldAnswer.attr('multiple');
                    if (data.answer != "") {
						if (typeof attr !== typeof undefined && attr !== false) {
							$fieldAnswer.prop('disabled', false).trigger("chosen:updated");
						} else {
							$fieldAnswer.prop('disabled', false);
						}                                        
                    }
                    $fieldAnswer.html(data.answer);
                    $('.calculator_homes select:not([multiple="multiple"])').selectric('refresh');
					$('.calculator_homes select[multiple="multiple"]').trigger("chosen:updated");
                    break;
            }
        }
    );
}

function calculatorEliteSelectChange(th){		
	var $calculator = $('.calculator_elite');
	var $city = $calculator.find('select#city_select');
	var $area = $calculator.find('select#area_select');
	/*var $carrier = $calculator.find('select#carrier_select');*/
	var $day = $calculator.find('select#day_select');
	var $format = $calculator.find('select#format_select');
	var $calc_result = $calculator.find('.calc_result');
	var $calc_result_span = $calc_result.find('span');
	var $loader = $calc_result.find('img');
	var $output = $calculator.find('output');
	
    var path = '/ajax/calculator_elite/'

    var $fieldRequest = th;
    var $fieldAnswer;
	
	var attr = th.attr('multiple');
	var selectId = "";
	if (typeof attr !== typeof undefined && attr !== false) {
		selectId = th.chosen().val();
	} else {
		selectId = th.val();
	}
	
    var type = $fieldRequest.attr('name');
    var build = $calculator.find('[name="build"]').val();
    var props = { };

    switch (th.attr('id')) {
        case 'city_select':
            $area.prop('disabled', true).trigger("chosen:updated");
            /*$carrier.prop('disabled', true);*/
            $day.prop('disabled', true);
            $format.prop('disabled', true);
            $fieldAnswer = $area;
            break;
        case 'area_select':
            /*$carrier.prop('disabled', true);*/
            $day.prop('disabled', true);
            $format.prop('disabled', true);
            $fieldAnswer = $day;
            props.city = $city.val();
            break;
        /*case 'carrier_select':
            $day.prop('disabled', true);
            $format.prop('disabled', true);
            $fieldAnswer = $day;
            props.city = $city.val();
            props.area = $area.val();
            break;*/
        case 'day_select':
            $format.prop('disabled', true);
            $fieldAnswer = $format;
            props.city = $city.val();
            props.area = $area.val();
            /*props.carrier = $carrier.val();*/
            break;
        case 'format_select':
            props.city = $city.val();
            props.area = $area.val();
            /*props.carrier = $carrier.val();*/
            props.day = $day.val();
            break;
    }
    $('.calculator_elite select:not([multiple="multiple"])').selectric('refresh');
	$('.calculator_elite select[multiple="multiple"]').trigger("chosen:updated");
    $output.html('');
    $output.hide();
    $calc_result_span.hide();
    $loader.show();

    props.type = type;
    props.id = selectId;
    props.build = build;

    $.get(
        path,
        props,
        function (data) {
            $loader.hide();
            switch ($fieldRequest.attr('id')) {
                case 'format_select':
                    $output.html(data.answer);
                    $output.show();
                    $calc_result_span.show();
                    break;
                default:
					var attr = $fieldAnswer.attr('multiple');
                    if (data.answer != "") {
						if (typeof attr !== typeof undefined && attr !== false) {
							$fieldAnswer.prop('disabled', false).trigger("chosen:updated");
						} else {
							$fieldAnswer.prop('disabled', false);
						}                                        
                    }
                    $fieldAnswer.html(data.answer);
                    $('.calculator_elite select:not([multiple="multiple"])').selectric('refresh');
					$('.calculator_elite select[multiple="multiple"]').trigger("chosen:updated");
                    break;
            }
        }
    );
}

function calculatorBusinessSelectChange(th){		
	var $calculator = $('.calculator_business');
	var $city = $calculator.find('select#city_select');
	var $area = $calculator.find('select#area_select');
	var $carrier = $calculator.find('select#carrier_select');
	var $day = $calculator.find('select#day_select');
	//var $format = $calculator.find('select#format_select');
	var $calc_result = $calculator.find('.calc_result');
	var $calc_result_span = $calc_result.find('span');
	var $loader = $calc_result.find('img');
	var $output = $calculator.find('output');
	
    var path = '/ajax/calculator_business/'

    var $fieldRequest = th;
    var $fieldAnswer;
	
	var attr = th.attr('multiple');
	var selectId = "";
	if (typeof attr !== typeof undefined && attr !== false) {
		selectId = th.chosen().val();
	} else {
		selectId = th.val();
	}
	
    var type = $fieldRequest.attr('name');
    var build = $calculator.find('[name="build"]').val();
    var props = { };

    switch (th.attr('id')) {
        case 'city_select':
            $carrier.prop('disabled', true);
            $area.prop('disabled', true).trigger("chosen:updated");
            $day.prop('disabled', true);
            //$format.prop('disabled', true);
            $fieldAnswer = $carrier;
            break;
		case 'carrier_select':
			$area.prop('disabled', true).trigger("chosen:updated");
            $day.prop('disabled', true);
            //$format.prop('disabled', true);
            $fieldAnswer = $area;
            props.city = $city.val();
            break;
        case 'area_select':
            $day.prop('disabled', true);
            //$format.prop('disabled', true);
            $fieldAnswer = $day;
            props.city = $city.val();
			props.carrier = $carrier.val();
            break;
        case 'day_select':
            //$format.prop('disabled', true);
            //$fieldAnswer = $format;
            props.city = $city.val();
            props.carrier = $carrier.val();
            props.area = $area.val();
            break;
        /*case 'format_select':
            props.city = $city.val();
            props.area = $area.val();
            props.carrier = $carrier.val();
            props.day = $day.val();
            break;*/
    }
    $('.calculator_business select:not([multiple="multiple"])').selectric('refresh');
	$('.calculator_business select[multiple="multiple"]').trigger("chosen:updated");
    $output.html('');
    $output.hide();
    $calc_result_span.hide();
    $loader.show();

    props.type = type;
    props.id = selectId;
    props.build = build;

    $.get(
        path,
        props,
        function (data) {
            $loader.hide();
            switch ($fieldRequest.attr('id')) {
                case 'day_select':
                    $output.html(data.answer);
                    $output.show();
                    $calc_result_span.show();
                    break;
                default:
					var attr = $fieldAnswer.attr('multiple');
                    if (data.answer != "") {
						if (typeof attr !== typeof undefined && attr !== false) {
							$fieldAnswer.prop('disabled', false).trigger("chosen:updated");
						} else {
							$fieldAnswer.prop('disabled', false);
						}                                        
                    }
                    $fieldAnswer.html(data.answer);
                    $('.calculator_business select:not([multiple="multiple"])').selectric('refresh');
					$('.calculator_business select[multiple="multiple"]').trigger("chosen:updated");
                    break;
            }
        }
    );
}

function calculatorAdminSelectChange(th){		
	var $calculator = $('.calculator_admin');
	//var $city = $calculator.find('select#city_select');
	var $area = $calculator.find('select#area_select');
	var $carrier = $calculator.find('select#carrier_select');
	var $day = $calculator.find('select#day_select');
	//var $format = $calculator.find('select#format_select');
	var $calc_result = $calculator.find('.calc_result');
	var $calc_result_span = $calc_result.find('span');
	var $loader = $calc_result.find('img');
	var $output = $calculator.find('output');
	
    var path = '/ajax/calculator_admin/'

    var $fieldRequest = th;
    var $fieldAnswer;
	
	var attr = th.attr('multiple');
	var selectId = "";
	if (typeof attr !== typeof undefined && attr !== false) {
		selectId = th.chosen().val();
	} else {
		selectId = th.val();
	}
	
    var type = $fieldRequest.attr('name');
    var build = $calculator.find('[name="build"]').val();
    var props = { };

    switch (th.attr('id')) {
        /*case 'city_select':
            $area.prop('disabled', true).trigger("chosen:updated");
            $carrier.prop('disabled', true);
            $day.prop('disabled', true);
            $format.prop('disabled', true);
            $fieldAnswer = $area;
            break;*/
        case 'area_select':
            $carrier.prop('disabled', true);
            $day.prop('disabled', true);
            //$format.prop('disabled', true);
            $fieldAnswer = $carrier;
            //props.city = $city.val();
            break;
        case 'carrier_select':
            $day.prop('disabled', true);
            //$format.prop('disabled', true);
            $fieldAnswer = $day;
            //props.city = $city.val();
            props.area = $area.val();
            break;
        case 'day_select':
            //$format.prop('disabled', true);
            //$fieldAnswer = $format;
            props.area = $area.val();
            props.carrier = $carrier.val();
            break;
        /*case 'format_select':
            //props.city = $city.val();
            props.area = $area.val();
            props.carrier = $carrier.val();
            props.day = $day.val();
            break;*/
    }
    $('.calculator_admin select:not([multiple="multiple"])').selectric('refresh');
	$('.calculator_admin select[multiple="multiple"]').trigger("chosen:updated");
    $output.html('');
    $output.hide();
    $calc_result_span.hide();
    $loader.show();

    props.type = type;
    props.id = selectId;
    props.build = build;

    $.get(
        path,
        props,
        function (data) {
            $loader.hide();
            switch ($fieldRequest.attr('id')) {
                case 'day_select':
                    $output.html(data.answer);
                    $output.show();
                    $calc_result_span.show();
                    break;
                default:
					var attr = $fieldAnswer.attr('multiple');
                    if (data.answer != "") {
						if (typeof attr !== typeof undefined && attr !== false) {
							$fieldAnswer.prop('disabled', false).trigger("chosen:updated");
						} else {
							$fieldAnswer.prop('disabled', false);
						}                                        
                    }
                    $fieldAnswer.html(data.answer);
                    $('.calculator_admin select:not([multiple="multiple"])').selectric('refresh');
					$('.calculator_admin select[multiple="multiple"]').trigger("chosen:updated");
                    break;
            }
        }
    );
}