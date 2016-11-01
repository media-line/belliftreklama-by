<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
/*$APPLICATION->SetPageProperty("description", "Размещение рекламы в городах Беларуси");
$APPLICATION->SetPageProperty("keywords", "БелЛифтРеклама");
$APPLICATION->SetPageProperty("title", "Карта покрытия | БелЛифтРеклама");
$APPLICATION->SetTitle("Карта покрытия | БелЛифтРеклама");*/
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


<div id="content" class="news_detail">
	<?$APPLICATION->IncludeComponent("bitrix:news.detail","map",Array(
			"DISPLAY_DATE" => "N",
			"DISPLAY_NAME" => "N",
			"DISPLAY_PICTURE" => "N",
			"DISPLAY_PREVIEW_TEXT" => "Y",
			"USE_SHARE" => "N",
			"SHARE_HIDE" => "N",
			"SHARE_TEMPLATE" => "",
			"SHARE_HANDLERS" => array("delicious"),
			"SHARE_SHORTEN_URL_LOGIN" => "",
			"SHARE_SHORTEN_URL_KEY" => "",
			"AJAX_MODE" => "N",
			"IBLOCK_TYPE" => "map",
			"IBLOCK_ID" => "12",
			"ELEMENT_ID" => $_REQUEST["ELEMENT_ID"],
			"ELEMENT_CODE" => "",
			"CHECK_DATES" => "Y",
			"FIELD_CODE" => Array("ID"),
			"PROPERTY_CODE" => Array("DESCRIPTION"),
			"IBLOCK_URL" => "map/detail.php?ELEMENT_ID=#ELEMENT_ID#\"",
			"DETAIL_URL" => "",
			"SET_TITLE" => "Y",
			"SET_CANONICAL_URL" => "Y",
			"SET_BROWSER_TITLE" => "Y",
			"BROWSER_TITLE" => "-",
			"SET_META_KEYWORDS" => "Y",
			"META_KEYWORDS" => "-",
			"SET_META_DESCRIPTION" => "Y",
			"META_DESCRIPTION" => "-",
			"SET_STATUS_404" => "Y",
			"SET_LAST_MODIFIED" => "Y",
			"INCLUDE_IBLOCK_INTO_CHAIN" => "Y",
			"ADD_SECTIONS_CHAIN" => "Y",
			"ADD_ELEMENT_CHAIN" => "N",
			"ACTIVE_DATE_FORMAT" => "d.m.Y",
			"USE_PERMISSIONS" => "N",
			"GROUP_PERMISSIONS" => Array("1"),
			"CACHE_TYPE" => "N",
			"CACHE_TIME" => "3600",
			"CACHE_GROUPS" => "Y",
			"DISPLAY_TOP_PAGER" => "Y",
			"DISPLAY_BOTTOM_PAGER" => "Y",
			"PAGER_TITLE" => "Страница",
			"PAGER_TEMPLATE" => "",
			"PAGER_SHOW_ALL" => "Y",
			"PAGER_BASE_LINK_ENABLE" => "Y",
			"SET_STATUS_404" => "Y",
			"SHOW_404" => "Y",
			"MESSAGE_404" => "",
			"PAGER_BASE_LINK" => "",
			"PAGER_PARAMS_NAME" => "arrPager",
			"AJAX_OPTION_JUMP" => "N",
			"AJAX_OPTION_STYLE" => "N",
			"AJAX_OPTION_HISTORY" => "N"
		)
	);?>
	
	
<?$APPLICATION->IncludeComponent(
    "bitrix:catalog.section",
    "object",
    Array(
        "TEMPLATE_THEME" => "blue",
        "PRODUCT_DISPLAY_MODE" => "N",
        "ADD_PICT_PROP" => "MORE_PHOTO",
        "LABEL_PROP" => "NEW_BOOK",
        "OFFER_ADD_PICT_PROP" => "FILE",
        "OFFER_TREE_PROPS" => array("-"),
        "PRODUCT_SUBSCRIPTION" => "N",
        "SHOW_DISCOUNT_PERCENT" => "N",
        "SHOW_OLD_PRICE" => "N",
        "SHOW_CLOSE_POPUP" => "Y",
        "MESS_BTN_BUY" => "Купить",
        "MESS_BTN_ADD_TO_BASKET" => "В корзину",
        "MESS_BTN_SUBSCRIBE" => "Подписаться",
        "MESS_BTN_DETAIL" => "Подробнее",
        "MESS_NOT_AVAILABLE" => "Нет в наличии",
        "AJAX_MODE" => "Y",
        "SEF_MODE" => "N",
        "IBLOCK_TYPE" => "map",
        "IBLOCK_ID" => "13",
        "SECTION_ID" => $_REQUEST["OBJECT_ID"],
        "SECTION_CODE" => "",
        "SECTION_USER_FIELDS" => array(),
        "ELEMENT_SORT_FIELD" => "sort",
        "ELEMENT_SORT_ORDER" => "asc",
        "ELEMENT_SORT_FIELD2" => "name",
        "ELEMENT_SORT_ORDER2" => "asc",
        "FILTER_NAME" => "arrFilter",
        "INCLUDE_SUBSECTIONS" => "Y",
        "SHOW_ALL_WO_SECTION" => "Y",
        "SECTION_URL" => "",
        "DETAIL_URL" => "",
        "BASKET_URL" => "/personal/basket.php",
        "ACTION_VARIABLE" => "action",
        "PRODUCT_ID_VARIABLE" => "id",
        "PRODUCT_QUANTITY_VARIABLE" => "quantity",
        "ADD_PROPERTIES_TO_BASKET" => "Y",
        "PRODUCT_PROPS_VARIABLE" => "prop",
        "PARTIAL_PRODUCT_PROPERTIES" => "N",
        "SECTION_ID_VARIABLE" => "OBJECT_ID",
        "ADD_SECTIONS_CHAIN" => "Y",
        "DISPLAY_COMPARE" => "N",
        "SET_TITLE" => "Y",
        "SET_BROWSER_TITLE" => "Y",
        "BROWSER_TITLE" => "-",
        "SET_META_KEYWORDS" => "Y",
        "META_KEYWORDS" => "",
        "SET_META_DESCRIPTION" => "Y",
        "META_DESCRIPTION" => "",
        "SET_LAST_MODIFIED" => "Y",
        "USE_MAIN_ELEMENT_SECTION" => "Y",
        "SET_STATUS_404" => "N",
        "PAGE_ELEMENT_COUNT" => "30",
        "LINE_ELEMENT_COUNT" => "3",
        "PROPERTY_CODE" => array(),
        "OFFERS_FIELD_CODE" => array(),
        "OFFERS_PROPERTY_CODE" => array(),
        "OFFERS_SORT_FIELD" => "sort",
        "OFFERS_SORT_ORDER" => "asc",
        "OFFERS_SORT_FIELD2" => "active_from",
        "OFFERS_SORT_ORDER2" => "desc",
        "OFFERS_LIMIT" => "5",
        "BACKGROUND_IMAGE" => "-",
        "PRICE_CODE" => array(),
        "USE_PRICE_COUNT" => "Y",
        "SHOW_PRICE_COUNT" => "1",
        "PRICE_VAT_INCLUDE" => "Y",
        "PRODUCT_PROPERTIES" => array(),
        "USE_PRODUCT_QUANTITY" => "Y",
        "CACHE_TYPE" => "N",
        "CACHE_TIME" => "36000000",
        "CACHE_FILTER" => "Y",
        "CACHE_GROUPS" => "Y",
        "DISPLAY_TOP_PAGER" => "N",
        "DISPLAY_BOTTOM_PAGER" => "Y",
        "PAGER_TITLE" => "Товары",
        "PAGER_SHOW_ALWAYS" => "Y",
        "PAGER_TEMPLATE" => "",
        "PAGER_DESC_NUMBERING" => "Y",
        "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
        "PAGER_SHOW_ALL" => "Y",
        "HIDE_NOT_AVAILABLE" => "Y",
        "OFFERS_CART_PROPERTIES" => array(),
        "AJAX_OPTION_JUMP" => "N",
        "AJAX_OPTION_STYLE" => "Y",
        "AJAX_OPTION_HISTORY" => "N",
        "CONVERT_CURRENCY" => "Y",
        "CURRENCY_ID" => "RUB",
        "ADD_TO_BASKET_ACTION" => "ADD",
        "PAGER_BASE_LINK_ENABLE" => "Y",
        "SET_STATUS_404" => "Y",
        "SHOW_404" => "Y",
        "MESSAGE_404" => "",
        "PAGER_BASE_LINK" => "",
        "PAGER_PARAMS_NAME" => "arrPager"
    )
);?>	
</div>	


		
		
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>