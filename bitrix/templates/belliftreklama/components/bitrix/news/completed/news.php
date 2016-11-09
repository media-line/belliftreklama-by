<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>
<div id="content">
    <aside class="left_aside">
        <?$APPLICATION->IncludeComponent("bitrix:menu", "left", array(
                "ROOT_MENU_TYPE" => "left",
                "MENU_CACHE_TYPE" => "N",
                "MENU_CACHE_TIME" => "36000000",
                "MENU_CACHE_USE_GROUPS" => "N",
                "MENU_CACHE_GET_VARS" => array(
                ),
                "MAX_LEVEL" => "1",
                "CHILD_MENU_TYPE" => "",
                "USE_EXT" => "Y",
                "DELAY" => "N",
                "ALLOW_MULTI_SELECT" => "N"
            ),
            false
        );?>
    </aside>
    <div class="main">
        <?$APPLICATION->IncludeComponent("bitrix:breadcrumb", "breadcrumb_bellift", Array(
            "START_FROM" => "0",	// Номер пункта, начиная с которого будет построена навигационная цепочка
            "PATH" => "",	// Путь, для которого будет построена навигационная цепочка (по умолчанию, текущий путь)
            "SITE_ID" => "s1",	// Cайт (устанавливается в случае многосайтовой версии, когда DOCUMENT_ROOT у сайтов разный)
        ),
            false
        );?>
        <h1>Реализованные проекты</h1>
        <?$APPLICATION->IncludeComponent(
            "bitrix:news.list",
            "",
            Array(
                "IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
                "IBLOCK_ID" => $arParams["IBLOCK_ID"],
                "NEWS_COUNT" => $arParams["NEWS_COUNT"],
                "SORT_BY1" => $arParams["SORT_BY1"],
                "SORT_ORDER1" => $arParams["SORT_ORDER1"],
                "SORT_BY2" => $arParams["SORT_BY2"],
                "SORT_ORDER2" => $arParams["SORT_ORDER2"],
                "FIELD_CODE" => $arParams["LIST_FIELD_CODE"],
                "PROPERTY_CODE" => $arParams["LIST_PROPERTY_CODE"],
                "DETAIL_URL" => $arResult["FOLDER"] . $arResult["URL_TEMPLATES"]["detail"],
                "SECTION_URL" => $arResult["FOLDER"] . $arResult["URL_TEMPLATES"]["section"],
                "IBLOCK_URL" => $arResult["FOLDER"] . $arResult["URL_TEMPLATES"]["news"],
                "DISPLAY_PANEL" => $arParams["DISPLAY_PANEL"],
                "SET_TITLE" => $arParams["SET_TITLE"],
                "SET_STATUS_404" => $arParams["SET_STATUS_404"],
                "INCLUDE_IBLOCK_INTO_CHAIN" => $arParams["INCLUDE_IBLOCK_INTO_CHAIN"],
                "CACHE_TYPE" => $arParams["CACHE_TYPE"],
                "CACHE_TIME" => $arParams["CACHE_TIME"],
                "CACHE_FILTER" => $arParams["CACHE_FILTER"],
                "CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
                "DISPLAY_TOP_PAGER" => $arParams["DISPLAY_TOP_PAGER"],
                "DISPLAY_BOTTOM_PAGER" => $arParams["DISPLAY_BOTTOM_PAGER"],
                "PAGER_TITLE" => $arParams["PAGER_TITLE"],
                "PAGER_TEMPLATE" => $arParams["PAGER_TEMPLATE"],
                "PAGER_SHOW_ALWAYS" => $arParams["PAGER_SHOW_ALWAYS"],
                "PAGER_DESC_NUMBERING" => $arParams["PAGER_DESC_NUMBERING"],
                "PAGER_DESC_NUMBERING_CACHE_TIME" => $arParams["PAGER_DESC_NUMBERING_CACHE_TIME"],
                "PAGER_SHOW_ALL" => $arParams["PAGER_SHOW_ALL"],
                "DISPLAY_DATE" => $arParams["DISPLAY_DATE"],
                "DISPLAY_NAME" => "Y",
                "DISPLAY_PICTURE" => $arParams["DISPLAY_PICTURE"],
                "DISPLAY_PREVIEW_TEXT" => $arParams["DISPLAY_PREVIEW_TEXT"],
                "PREVIEW_TRUNCATE_LEN" => $arParams["PREVIEW_TRUNCATE_LEN"],
                "ACTIVE_DATE_FORMAT" => $arParams["LIST_ACTIVE_DATE_FORMAT"],
                "USE_PERMISSIONS" => $arParams["USE_PERMISSIONS"],
                "GROUP_PERMISSIONS" => $arParams["GROUP_PERMISSIONS"],
                "FILTER_NAME" => $arParams["FILTER_NAME"],
                "HIDE_LINK_WHEN_NO_DETAIL" => $arParams["HIDE_LINK_WHEN_NO_DETAIL"],
                "CHECK_DATES" => $arParams["CHECK_DATES"],
            ),
            $component
        );?>
    </div>
</div>


