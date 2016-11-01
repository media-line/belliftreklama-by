var abcd = '';
if(objElementCat == undefined) var objElementCat;
$(document).ready(function(){
    /*if ($('select').length)
        $('select').selectric({
            arrowButtonMarkup:'',
            onChange: function() {
                calculator();
            }
        });*/
    /*styles for block2 in main page*/
    if ($('.block2').length) {
        $('.block2 .gallery_imb_block:eq(0)').addClass('big_one');
        $('.block2 .gallery_imb_block:eq(3)').css('margin','0 30px');
    }
    if ($('.block3').length) {
        jQuery('.pin')
            .each(function() {
                $('img', this).parallax({mouseport: $('.block3')},                    // Options
                    {xparallax: '33px', yparallax: '20px', xorigin: 0, yorigin: 0.5});
            });
    }
    if ($('.block4').length) {
        $('.auditory_choose').click(function () {
            $('.block4 div').removeClass('active');
            $(this).addClass('active');
            var number = $(this).children().attr('class').match(/\d+$/)[0];
            /*getting number from class*/
            $('.text' + number).addClass('active');
        });
    }
    if ($('.block5').length)
        $(".partners_wrapper").carouFredSel({
            items               : {visible: 5,minimum:5},
            auto:{play:false},
            circular: false,
            infinite: false,
            responsive	: false,
            prev        : {button: ".prev_partner",direction:"left",easing:"linear"},
            next        : {button: ".next_partner",direction:"right",easing:"linear"},
            scroll : {
                items           : 5,
                easing          : "linear",
                duration        : 1000,
                pauseOnHover    : true
            }
        });
    if ($('.project_gallery').length) {
        $('.gallery_imb_block',$('.project_gallery')).each(function(i){
            var remainder = (i + 1) % 4;
            if (remainder === 0)
                $(this).css('margin-right','0');
        });
    }

    //make some kind of table in document list
    if ($('.download_block').length) {
        $('.document',$('.download_block')).each(function(i){
            var clear = (i+1) % 3;

            if (clear===0)
                $(this).css('margin-right','0');
        });

    }
    //slider at main
    if ($('.slider').length) {
        $('.slider').slick({
            autoplay: true,
            autoplaySpeed: 5000,
            dots: true,
            arrows: false,
            draggable: false
        });
        $('.goto_block1').click(function () {
            $('html, body').animate({
                scrollTop: $(".block1").offset().top-38
            }, 1000);
        });
    }
    //validation contact form
    validate($("#contact_feedback"), $("#feedback_email"), $("#feedback_text"));

    // validate popup
    validate($("#contact_feedback_popup"), $("#contact_input_email"), $("#contact_input_textarea"));

    /*Yandex map at contact page*/
/*
    if ($('#contacts_map').length) {
        //ymaps.ready(init);

        $('.ymaps-2-1-17-ground-pane').append("<div class='overlay'></div>");

    }

    function init() {
        var myMap = new ymaps.Map('contacts_map', {
                center: [ 53.9065, 27.5740],
                zoom: 17,
                controls: []
            }),

        myPlacemark = new ymaps.Placemark(myMap.getCenter(), {
            hintContent: 'some_text'
        }, {
            // Опции.
            // Необходимо указать данный тип макета.
            iconLayout: 'default#image',
            // Своё изображение иконки метки.
            iconImageHref: '/bitrix/templates/belliftreklama/images/point_down.png',
            // Размеры метки.
            iconImageSize: [40, 46],
            // Смещение левого верхнего угла иконки относительно
            // её "ножки" (точки привязки).
            iconImageOffset: [-20, -43]
        });

        myMap.geoObjects.add(myPlacemark);
        $('.ymaps-2-1-17-inner-panes').append("<div class='overlay'></div>");
    }
*/

/*BEGIN BLOCK WITH YMAP*/

    //check if this contact page
    if ($('#global_map').length) {
        ymaps.ready(init_global);
        //create global placemarket collections
        var collection_marks = [];


    }
        
    function init_global() {
	 
        var myMap = new ymaps.Map('global_map', {
                center: [ 53.9065, 27.5740],
                zoom: 17,
                controls: []
            });


        /*ADD NEW PLACEMARKET COLLECTION*/

        menu = $('<ul class="menu"></ul>');

        //fill list with objects from groups.js
        for (var i = 0, l = cities.length; i < l; i++) {
            createMenuGroup1(cities[i],i);
        }

        function createMenuGroup1 (group,i) {
            //var menuItem = $('<li><a>' + group.name + '</a></li>'),
            // Коллекция для геообъектов группы.
                collection = new ymaps.GeoObjectCollection(null, {  }),
            // Контейнер для подменю.
                submenu = $('');
            //make first point active
/*            if (i==0)
                menuItem = $('<li><a class="active">' + group.name + '</a></li>');*/

            //fill array of marks
            collection_marks[i] = collection;
            // add collection to the map
            myMap.geoObjects.add(collection_marks[i]);

/*            // add submenu
            menuItem
                .append(submenu)
                //add li in submenu
                .appendTo(menu)
                //add event to this li
                .click(function () {
                    //clear array of makplaces
                    for (var j = 0, l = collection_marks.length; j < l; j++) {
                        myMap.geoObjects.remove(collection_marks[j]);
                    }
                    //change class of active li
                    $('.popup_menu_wrapper .menu li a').removeClass('active');
                    $(this).find('a').addClass('active');
                    //add placemarket's chosen group
                    myMap.geoObjects.add(collection_marks[i]);
            }); */                   

            //fill submenu
            for (var j = 0, m = group.items.length; j < m; j++) {
                createSubMenu(group.items[j], collection_marks[i], submenu);
            }
        }

        function createMenuGroup (group,i,u) {
            if(currentCategory == null) currentCategory = u;
            var menuItem = $('<li><a href="/map/detail.php?ELEMENT_ID='+objElementCat+'&current='+currentCategory+'&filterObj='+i+'&OBJECT_ID='+group.section+'">' + group.name + '</a></li>'),
            // Коллекция для геообъектов группы.
                collection = new ymaps.GeoObjectCollection(null, {  }),
            // Контейнер для подменю.
                submenu = $('');
            //make first point active
            if (i==0)
                menuItem = $('<li><a class="active">' + group.name + '</a></li>');

            //fill array of marks
            collection_marks[i] = collection;
            // add collection to the map
            myMap.geoObjects.add(collection_marks[i]);

            // add submenu
            menuItem
                .append(submenu)
                //add li in submenu
                .appendTo(menu)
                //add event to this li
                .click(function () {
                    //clear array of makplaces
                    //for (var j = 0, l = collection_marks.length; j < l; j++) {
                        //myMap.geoObjects.remove(collection_marks[j]);
                    //}
                    //change class of active li
                    //$('.popup_menu_wrapper .menu li a').removeClass('active');
                    //$(this).find('a').addClass('active');
                    //add placemarket's chosen group
                    //myMap.geoObjects.add(collection_marks[i]);
            });                    

            //fill submenu
            for (var j = 0, m = group.items.length; j < m; j++) {
                createSubMenu(group.items[j], collection_marks[i], submenu);
            }
        }

        function createSubMenu (item, collection, submenu) {
            //submenu li.
            var submenuItem = $('<li><a href="#">' + item.name + '</a></li>'),

            //create placemarket.
                placemark = new ymaps.Placemark(item.center, { balloonContent: item.name },{iconLayout: 'default#image',
                    iconImageHref: '/bitrix/templates/belliftreklama/images/point_down.png',
                    iconImageSize: [40, 46],
                    iconImageOffset: [-20, -43],
                    hideIconOnBalloonOpen:false,
                    //balloonCloseButton: false
                });
                placemark.events.add('click', function (e, d) {
                    for(var node in listBoxItems) {
                        if(listBoxItems[node].content.toLowerCase() == item.name.toLowerCase()) {
                            var callfunc = createCallback( node );
                            callfunc();
                        }
                    }
                });

            collection.add(placemark);
        }


        /*ADD NEW CUSTOM SELECT*/

        //create structure for city list
        var place = $("<button id='my-listbox-header'><span>Выберите город</span></button>");
        var city_list = $("<ul id='my-listbox' class='dropdown-menu'></ul>");
        var submenuItem=$('');

        //fill city list from declaration
        for (var i = 0, l = listBoxItems.length; i < l; i++) {
            /*submenuItem = $('<li><a>' + listBoxItems[i].content + '</a></li>');*/
			/*СЕО нужен переход на внутряк*/
			submenuItem = $('<li><a href="/map/detail.php?ELEMENT_ID='+listBoxItems[i].ID+'&current='+i+'">' + listBoxItems[i].content + '</a></li>');
            /*submenuItem.click(createCallback( i ));*/
            submenuItem.appendTo(city_list);
        }

        //open city list and change class for arrow
        place.click(function(){
            $('#my-listbox').toggle();
            $(this).toggleClass('open');
        });

        //shackle event with each menu li
        function createCallback( j ){
            return function(){
                //change text in list header
                if(objElementCat == undefined || objElementCat == null) objElementCat = listBoxItems[j]['ID'];
                $('#my-listbox-header span').text(listBoxItems[j].content);

                //clear menu
                menu.html("");

                //clear array of makplaces
                for (var i = 0, l = collection_marks.length; i < l; i++) {
                    myMap.geoObjects.remove(collection_marks[i]);
                }

                //fill points from groups.js
                for (var i = 0, l = groups.length; i < l; i++) {
                    createMenuGroup(groups[i],i,j);
                }
                //toggle active class
                $('#my-listbox li a').removeClass('active');
                $(this).find('a').addClass('active');

                //center map to the chose city
                myMap.setCenter(
                    listBoxItems[j].center,
                    listBoxItems[j].zoom
                );
            }
        }

        // add city_menu to html
        place.appendTo($('.popup_menu_wrapper'));
        city_list.appendTo($('.popup_menu_wrapper'));

        //add filter list to html
        menu.appendTo($('.popup_menu_wrapper'));

        // Делаем так, чтобы все точки были видны при прогрузке всей карты
        myMap.setBounds(myMap.geoObjects.getBounds());

        //initialize custom scrollbar for city list
        city_list.mCustomScrollbar({
            axis:"y",
            theme:"light",
            scrollInertia: 950,
            mouseWheel:{ scrollAmount: 140 }
        });
        $('.ymaps-2-1-17-inner-panes').append("<div class='overlay'></div>");
		
		if (currentCategory !== null) {
			myMap.setCenter(
				listBoxItems[currentCategory].center,
				listBoxItems[currentCategory].zoom
			);	
		    $('#my-listbox-header span').text(listBoxItems[currentCategory].content);		
            for (var j = 0, l = collection_marks.length; j < l; j++) {
                myMap.geoObjects.remove(collection_marks[j]);
            }					
            for (var i = 0, l = groups.length; i < l; i++) {
                createMenuGroup(groups[i],i);
            }
			if (filterObj) {
				for (var j = 0, l = collection_marks.length; j < l; j++) {
					myMap.geoObjects.remove(collection_marks[j]);
				}	
				myMap.geoObjects.add(collection_marks[filterObj]);			
			}
            $('.popup_menu_wrapper .menu li a').removeClass('active');
			$('.popup_menu_wrapper .menu li:eq('+filterObj+') a').addClass('active');	
	
		}	
		
		
    }
/*FINISH BLOCK WITH YMAP*/

    $('.fancybox').fancybox({
        padding:0,
        arrows:true,
        scrollOutside:true,
        scrolling:true,
        helpers: {
            title: { type: 'inside'}
        }
    });

    $('.fancyboxInMap > a').fancybox({});

/*    $('.fancybox').click(function(e) {
        var alt = $(this).find('img').attr('alt');
        console.log(alt);
        if(alt.length > 0) {
            $('.fancybox-inner').append("<p>"+alt+"</p>");
        }
    });
*/
    $("header .contact_us, .block6 .contact_us").fancybox({
        padding: 0,
        'hideOnContentClick': true
    });




    $("#calculator .contact_us").click(function(){
        /*if u r going to initialize popup when we click the button then get this text value and put in to the textarea*/
        var text="";
        $('#calculator select').each(function() {
            /*i'm getting text, if u need value change it to val()*/
            switch ($(this).attr('id')) {
                case 'city_select':
                    text+='Город: '+ $(this).find('option:selected').text().trim()+'\n';
                    break;
                case 'area_select':
                    text+='Объект: '+ $(this).find('option:selected').text().trim()+'\n';
                    break;
                case 'carrier_select':
                    text+='Тип носителя: '+ $(this).find('option:selected').text().trim()+'\n';
                    break;
                case 'day_select':
                    text+='Количество дней: '+ $(this).find('option:selected').text().trim()+'\n';
                    break;
                case 'format_select':
                    text+='Формат: '+ $(this).find('option:selected').text().trim()+'\n';
                    break;
                default:
                    text+='';
                    break;
            }
        });
        text+='\nВаш комментарий: ';
        $('#order_popup textarea').text(text).trim();
    });
    $("#calculator .contact_us").fancybox({
        padding: 0,
        'hideOnContentClick': true
    });
    //calculator();
});
/*calc script
* the same function for each select
* */
/*window.calculator = function(id, val) {
    var val=0;
    $('#calculator select').each(function(){
        switch ($(this).attr('id')){
            case 'city_select':
                switch (parseInt($(this).val())){
                    case 1:
                        val+=111;
                        break;
                    case 2:
                        val+=222;
                        break;
                    case 3:
                        val+=333;
                        break;
                    default:
                        val=0;
                        break;
                }
                break;
            case 'area_select':
                val+=  parseInt($(this).val());
                break;
            case 'carrier_select':
                val+=  parseInt($(this).val());
                break;
            case 'day_select':
                val+=  parseInt($(this).val());
                break;
            case 'format_select':
                val+=  parseInt($(this).val());
                break;
            default:
                val+=0;
                break;
        }
    });
   $('output').text(val+ " руб.");
}*/
window.validate = function($form, $email, $text)
{
    $form.submit(function(event){
        if ( $email.val().length<=0 && $text.val().length<=0)
        {
            $email.prev().css('color','#f2353c');
            $text.prev().css('color','#f2353c');
            $email.addClass('required');
            $text.addClass('required');
            $(this).find('.error').html("Неверно заполнены поля <span>Email</span> и <span>Текст сообщения</span>");
            event.preventDefault();
        }
        else if ($email.val().length<=0)
        {
            $email.addClass('required');
            $email.prev().css('color','#f2353c');
            $text.removeClass('required');
            $text.prev().css('color','#8c8c8c');
            $(this).find('.error').html('Неверно заполнено поле <span>Email</span>');
            event.preventDefault();
        }
        else if ($text.val().length<=0)
        {
            $email.removeClass('required');
            $email.prev().css('color','#8c8c8c');
            $text.addClass('required');
            $text.prev().css('color','#f2353c');
            $(this).find('.error').html('Неверно заполнено поле <span>Текст сообщения</span>');
            event.preventDefault();
        }
        else
            return;
    });
}

String.prototype.trim=function(){return this.replace(/^\s+|\s+$/g, '');};