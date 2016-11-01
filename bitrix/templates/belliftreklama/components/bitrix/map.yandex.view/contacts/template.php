<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die(); ?>
<? if ($arResult['POSITION']): ?>
    <script>
        jQuery(document).ready(function ($) {
            ymaps.ready(init);
            var myMap,
                myPlacemark;

            function init() {
                myMap = new ymaps.Map("contacts_map", {
                    center: [<?=$arResult['POSITION']['yandex_lat']?>, <?=$arResult['POSITION']['yandex_lon']?>],
                    zoom: <?=$arResult['POSITION']['yandex_scale']?>,
                    controls: []
                });
                myMap.behaviors.disable('scrollZoom');
                <? foreach($arResult['POSITION']['PLACEMARKS'] as $coord): ?>
                myPlacemark = new ymaps.Placemark([<?=$coord['LAT']?>, <?=$coord['LON']?>], {
                        hintContent: '<?=$coord['TEXT']?>'
                    },
                    {
                        iconLayout: 'default#image',
                        iconImageHref: '<?= SITE_TEMPLATE_PATH ?>/images/point_down.png',
                        iconImageSize: [40, 46],
                        iconImageOffset: [-20, -43]
                    });
                myMap.geoObjects.add(myPlacemark);
                <? endforeach; ?>
                if ($('.ymaps-2-1-17-inner-panes').length) {
                     $('.ymaps-2-1-17-inner-panes').append("<div class='overlay'></div>");
                }
                if ($('.ymaps-2-1-17-ground-pane').length) {
                 $('.ymaps-2-1-17-ground-pane').append("<div class='overlay'></div>");
                }
            }            
        });
    </script>
<? endif; ?>
