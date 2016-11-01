<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("description", "Новости компании БелЛифтРеклама");
$APPLICATION->SetPageProperty("keywords", "БелЛифтРеклама");
$APPLICATION->SetPageProperty("title", "Новости | БелЛифтРеклама");
$APPLICATION->SetTitle("Горящее предложение!");
?>
<?$APPLICATION->IncludeComponent("bitrix:news", "news", array(
	"IBLOCK_TYPE" => "news",
	"IBLOCK_ID" => "1",
	"NEWS_COUNT" => "10",
	"USE_SEARCH" => "N",
	"USE_RSS" => "N",
	"USE_RATING" => "N",
	"USE_CATEGORIES" => "N",
	"USE_REVIEW" => "N",
	"USE_FILTER" => "N",
	"SORT_BY1" => "ACTIVE_FROM",
	"SORT_ORDER1" => "DESC",
	"SORT_BY2" => "TIMESTAMP_X",
	"SORT_ORDER2" => "DESC",
	"CHECK_DATES" => "Y",
	"SEF_MODE" => "Y",
	"SEF_FOLDER" => "/news/",
	"AJAX_MODE" => "N",
	"AJAX_OPTION_JUMP" => "N",
	"AJAX_OPTION_STYLE" => "N",
	"AJAX_OPTION_HISTORY" => "N",
	"CACHE_TYPE" => "N",
	"CACHE_TIME" => "36000000",
	"CACHE_FILTER" => "N",
	"CACHE_GROUPS" => "Y",
	"SET_STATUS_404" => "N",
	"SET_TITLE" => "Y",
	"INCLUDE_IBLOCK_INTO_CHAIN" => "Y",
	"ADD_SECTIONS_CHAIN" => "Y",
	"ADD_ELEMENT_CHAIN" => "N",
	"USE_PERMISSIONS" => "N",
	"PREVIEW_TRUNCATE_LEN" => "",
	"LIST_ACTIVE_DATE_FORMAT" => "j F Y",
	"LIST_FIELD_CODE" => array(
		0 => "ID",
		1 => "CODE",
		2 => "XML_ID",
		3 => "NAME",
		4 => "PREVIEW_TEXT",
		5 => "PREVIEW_PICTURE",
		6 => "DETAIL_TEXT",
		7 => "DETAIL_PICTURE",
		8 => "DATE_ACTIVE_FROM",
		9 => "ACTIVE_FROM",
		10 => "DATE_CREATE",
		11 => "TIMESTAMP_X",
		12 => "",
	),
	"LIST_PROPERTY_CODE" => array(
		0 => "",
		1 => "",
	),
	"HIDE_LINK_WHEN_NO_DETAIL" => "N",
	"DISPLAY_NAME" => "N",
	"META_KEYWORDS" => "-",
	"META_DESCRIPTION" => "-",
	"BROWSER_TITLE" => "-",
	"DETAIL_ACTIVE_DATE_FORMAT" => "j F Y",
	"DETAIL_FIELD_CODE" => array(
		0 => "CODE",
		1 => "XML_ID",
		2 => "NAME",
		3 => "PREVIEW_TEXT",
		4 => "PREVIEW_PICTURE",
		5 => "DETAIL_TEXT",
		6 => "DETAIL_PICTURE",
		7 => "DATE_ACTIVE_FROM",
		8 => "ACTIVE_FROM",
		9 => "DATE_CREATE",
		10 => "TIMESTAMP_X",
		11 => "",
	),
	"DETAIL_PROPERTY_CODE" => array(
		0 => "",
		1 => "FILES",
		2 => "",
	),
	"DETAIL_DISPLAY_TOP_PAGER" => "N",
	"DETAIL_DISPLAY_BOTTOM_PAGER" => "N",
	"DETAIL_PAGER_TITLE" => "Страница",
	"DETAIL_PAGER_TEMPLATE" => "",
	"DETAIL_PAGER_SHOW_ALL" => "N",
	"PAGER_TEMPLATE" => "news",
	"DISPLAY_TOP_PAGER" => "N",
	"DISPLAY_BOTTOM_PAGER" => "Y",
	"PAGER_TITLE" => "Новости",
	"PAGER_SHOW_ALWAYS" => "N",
	"PAGER_DESC_NUMBERING" => "N",
	"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
	"PAGER_SHOW_ALL" => "N",
	"DISPLAY_DATE" => "Y",
	"DISPLAY_PICTURE" => "Y",
	"DISPLAY_PREVIEW_TEXT" => "Y",
	"USE_SHARE" => "N",
	"AJAX_OPTION_ADDITIONAL" => "",
	"SEF_URL_TEMPLATES" => array(
		"news" => "",
		"section" => "",
		"detail" => "#ELEMENT_CODE#/",
	)
	),
	false
);?>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>