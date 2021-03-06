<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("description", "Размещение рекламы в городах Беларуси");
$APPLICATION->SetPageProperty("keywords", "БелЛифтРеклама");
$APPLICATION->SetPageProperty("title", "Карта покрытия | БелЛифтРеклама");
$APPLICATION->SetTitle("Карта покрытия | БелЛифтРеклама");
?>
<?$APPLICATION->IncludeComponent("bitrix:news.list", "cities", array(
	"IBLOCK_TYPE" => "map",
	"IBLOCK_ID" => "12",
	"NEWS_COUNT" => "",
	"SORT_BY1" => "SORT",
	"SORT_ORDER1" => "ASC",
	"SORT_BY2" => "TIMESTAMP_X",
	"SORT_ORDER2" => "ASC",
	"FILTER_NAME" => "",
	"FIELD_CODE" => array(
		0 => "DATE_CREATE",
		1 => "",
	),
	"PROPERTY_CODE" => array(
		0 => "MAP",
		1 => "",
	),
	"CHECK_DATES" => "Y",
	"DETAIL_URL" => "",
	"AJAX_MODE" => "N",
	"AJAX_OPTION_JUMP" => "N",
	"AJAX_OPTION_STYLE" => "N",
	"AJAX_OPTION_HISTORY" => "N",
	"CACHE_TYPE" => "N",
	"CACHE_TIME" => "36000000",
	"CACHE_FILTER" => "N",
	"CACHE_GROUPS" => "Y",
	"PREVIEW_TRUNCATE_LEN" => "",
	"ACTIVE_DATE_FORMAT" => "x",
	"SET_STATUS_404" => "N",
	"SET_TITLE" => "N",
	"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
	"ADD_SECTIONS_CHAIN" => "N",
	"HIDE_LINK_WHEN_NO_DETAIL" => "N",
	"PARENT_SECTION" => "",
	"PARENT_SECTION_CODE" => "",
	"INCLUDE_SUBSECTIONS" => "Y",
	"PAGER_TEMPLATE" => ".default",
	"DISPLAY_TOP_PAGER" => "N",
	"DISPLAY_BOTTOM_PAGER" => "N",
	"PAGER_TITLE" => "Новости",
	"PAGER_SHOW_ALWAYS" => "N",
	"PAGER_DESC_NUMBERING" => "N",
	"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
	"PAGER_SHOW_ALL" => "N",
	"DISPLAY_DATE" => "N",
	"DISPLAY_NAME" => "N",
	"DISPLAY_PICTURE" => "N",
	"DISPLAY_PREVIEW_TEXT" => "N",
	"AJAX_OPTION_ADDITIONAL" => ""
	),
	false
);?>
<?$APPLICATION->IncludeComponent("bitrix:catalog.section.list", "area", Array(
        "IBLOCK_TYPE" => "map",	// Тип инфоблока
        "IBLOCK_ID" => "12",	// Инфоблок
        "SECTION_ID" => "",	// ID раздела
        "SECTION_CODE" => "",	// Код раздела
        "COUNT_ELEMENTS" => "N",	// Показывать количество элементов в разделе
        "TOP_DEPTH" => "1",	// Максимальная отображаемая глубина разделов
        "SECTION_FIELDS" => array(	// Поля разделов
            0 => "",
            1 => "",
        ),
        "SECTION_USER_FIELDS" => array(	// Свойства разделов
            0 => "",
            1 => "",
        ),
        "SECTION_URL" => "",	// URL, ведущий на страницу с содержимым раздела
        "CACHE_TYPE" => "N",	// Тип кеширования
        "CACHE_TIME" => "36000000",	// Время кеширования (сек.)
        "CACHE_GROUPS" => "Y",	// Учитывать права доступа
        "ADD_SECTIONS_CHAIN" => "N",	// Включать раздел в цепочку навигации
        "VIEW_MODE" => "LINE",	// Вид списка подразделов
        "SHOW_PARENT_NAME" => "Y",	// Показывать название раздела
    ),
    false
);?>
<?$APPLICATION->IncludeComponent("bitrix:catalog.section.list", "objects", array(
	"IBLOCK_TYPE" => "map",
	"IBLOCK_ID" => "13",
	"SECTION_ID" => "",
	"SECTION_CODE" => "",
	"COUNT_ELEMENTS" => "N",
	"TOP_DEPTH" => "1",
	"SECTION_FIELDS" => array(
		0 => "",
		1 => "",
	),
	"SECTION_USER_FIELDS" => array(
		0 => "",
		1 => "",
	),
	"SECTION_URL" => "",
	"CACHE_TYPE" => "N",
	"CACHE_TIME" => "36000000",
	"CACHE_GROUPS" => "Y",
	"ADD_SECTIONS_CHAIN" => "N",
	"VIEW_MODE" => "LINE",
	"SHOW_PARENT_NAME" => "Y"
	),
	false
);?>
        <div id="global_map"></div>
        <div class="popup_menu_wrapper"></div>


<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>