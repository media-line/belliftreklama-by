<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>
<?
IncludeTemplateLangFile(__FILE__);

$path = parse_url($_SERVER['REQUEST_URI']);
$uri = explode('/', $path['path']);

$isHome = empty($uri[1]);
$isMap = ($uri[1] == 'map');
$isContacts = ($uri[1] == 'contacts');

?><!DOCTYPE html>
<html>
<head>
    <? $APPLICATION->ShowHead(); ?>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="yandex-verification" content="229900e2f1aae8ee" />
    <link href="<?= SITE_TEMPLATE_PATH ?>/favicon.png" rel="shortcut icon" type="image/x-icon"/>
	<title><? $APPLICATION->ShowTitle() ?></title>

    <link rel="stylesheet" href="<?= SITE_TEMPLATE_PATH ?>/css/reset.css">
    <link rel="stylesheet" href="<?= SITE_TEMPLATE_PATH ?>/css/style2.css">
    <link rel="stylesheet" href="<?= SITE_TEMPLATE_PATH ?>/css/selectric.css">
	<link rel="stylesheet" href="<?= SITE_TEMPLATE_PATH ?>/css/chosen.css">
    <? if ($isHome): ?>
        <link rel="stylesheet" href="<?= SITE_TEMPLATE_PATH ?>/css/slick.css">
    <? endif; ?>
    <link rel="stylesheet" href="<?= SITE_TEMPLATE_PATH ?>/css/jquery.fancybox.css">
    <link rel="stylesheet" href="<?= SITE_TEMPLATE_PATH ?>/styles_sk.css">

	<!--[if lt IE 9]>
    <script src=""<?= SITE_TEMPLATE_PATH ?>/js/ie.js" type="text/javascript"></script>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <script src="<?= SITE_TEMPLATE_PATH ?>/js/jquery-2.1.1.min.js"></script>
    <script src="<?= SITE_TEMPLATE_PATH ?>/js/jquery.selectric.js"></script>
	<script src="<?= SITE_TEMPLATE_PATH ?>/js/chosen.jquery.js"></script>
    <? if ($isMap): ?>
        <!--Groups of cities and points at that cities-->
        <script src="<?= SITE_TEMPLATE_PATH ?>/js/groups.js"></script>
        <!--Custom scrollbar-->
        <script src="<?= SITE_TEMPLATE_PATH ?>/js/jquery.mCustomScrollbar.concat.min.js" type="text/javascript"></script>
        <link href="<?= SITE_TEMPLATE_PATH ?>/css/jquery.mCustomScrollbar.css" media="all" rel="stylesheet" type="text/css"/>
    <? endif; ?>
    <? if ($isMap || $isContacts): ?>
        <script src="http://api-maps.yandex.ru/2.1/?load=package.standard,package.geoObjects&lang=ru-RU" type="text/javascript"></script>
    <? endif; ?>
    <? if ($isHome): ?>
        <script src="<?= SITE_TEMPLATE_PATH ?>/js/slick.min.js"></script>
    <? endif; ?>
    <script src="<?= SITE_TEMPLATE_PATH ?>/js/jquery.carouFredSel-6.2.1.js"></script>
    <script src="<?= SITE_TEMPLATE_PATH ?>/js/jquery.fancybox.js"></script>
    <script type="text/javascript" src="<?= SITE_TEMPLATE_PATH ?>/js/parallax.js"></script>
    <script src="<?= SITE_TEMPLATE_PATH ?>/js/scripts.js"></script>
    <script src="<?= SITE_TEMPLATE_PATH ?>/js/main.js"></script>
<!-- Yandex.Metrika counter -->
<script type="text/javascript">
    (function (d, w, c) {
        (w[c] = w[c] || []).push(function() {
            try {
                w.yaCounter35786035 = new Ya.Metrika({
                    id:35786035,
                    clickmap:true,
                    trackLinks:true,
                    accurateTrackBounce:true,
                    webvisor:true,
                    trackHash:true
                });
            } catch(e) { }
        });

        var n = d.getElementsByTagName("script")[0],
            s = d.createElement("script"),
            f = function () { n.parentNode.insertBefore(s, n); };
        s.type = "text/javascript";
        s.async = true;
        s.src = "https://mc.yandex.ru/metrika/watch.js";

        if (w.opera == "[object Opera]") {
            d.addEventListener("DOMContentLoaded", f, false);
        } else { f(); }
    })(document, window, "yandex_metrika_callbacks");
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/35786035" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->

    <!-- Bootstrap -->
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>
<div id="panel"><? $APPLICATION->ShowPanel(); ?></div>
<div class="header_wrapper <?=($isHome) ? 'white' : '';?>">
    <header>
        <a class="logo_link"
           href="<?php if (empty($uri[1])) echo '#'; else echo '/'; ?>" <?php if (empty($uri[1])) echo 'style="cursor: default;"'; ?>>
            
        </a>
		<?$APPLICATION->IncludeComponent("bitrix:menu", "top", array(
	"ROOT_MENU_TYPE" => "top",
	"MENU_CACHE_TYPE" => "N",
	"MENU_CACHE_TIME" => "36000000",
	"MENU_CACHE_USE_GROUPS" => "N",
	"MENU_CACHE_GET_VARS" => array(
	),
	"MAX_LEVEL" => "1",
	"CHILD_MENU_TYPE" => "",
	"USE_EXT" => "N",
	"DELAY" => "N",
	"ALLOW_MULTI_SELECT" => "N"
	),
	false
);?>
        <a class="contact_us hidden-xs hidden-sm" href="#contact_us_popup">Связаться с нами</a>
        <section class="feedback_form" id="contact_us_popup">
            <section class="block">
                <h2>Позвоните нам</h2>

                <p class="velcom"> <?= tplvar('velcom', true); ?></p>

                <p class="velcom"> <?= tplvar('mts', true); ?></p>

                <p class="city_phone"> <?= tplvar('city_phone', true); ?></p>
            </section>
            <h2>Напишите нам</h2>
            <!--no action, free for you!-->
            <?$APPLICATION->IncludeComponent("bitrix:form.result.new", "feedback_popup", array(
                    "WEB_FORM_ID" => "1",
                    "IGNORE_CUSTOM_TEMPLATE" => "N",
                    "USE_EXTENDED_ERRORS" => "N",
                    "SEF_MODE" => "Y",
                    "SEF_FOLDER" => "",
                    "CACHE_TYPE" => "N",
                    "CACHE_TIME" => "3600",
                    "LIST_URL" => "",
                    "EDIT_URL" => "",
                    "SUCCESS_URL" => "",
                    "CHAIN_ITEM_TEXT" => "",
                    "CHAIN_ITEM_LINK" => ""
                ),
                false
            );?>
        </section>

        <? if ($isHome): ?>
            <?$APPLICATION->IncludeComponent("bitrix:news.list", "slider", array(
	"IBLOCK_TYPE" => "media",
	"IBLOCK_ID" => "5",
	"NEWS_COUNT" => "30",
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
		0 => "BIG_NUMBER",
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
        <? endif; ?>
    </header>
    <? if ($isHome): ?>
    <div class="goto_block1 hidden-xs hidden-sm"></div>
    <? endif; ?>
</div>
<div class="container">
<div class="content_wrapper">