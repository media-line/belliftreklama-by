<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("keywords", "БелЛифтРеклама");
$APPLICATION->SetPageProperty("title", "Контакты | Заказ рекламы в лифтах");
$APPLICATION->SetPageProperty("description", "Контакты реклама в лифтах в Минске, заказать рекламу в лифтах сейчас! Разместить рекламу в Минске.");
$APPLICATION->SetTitle("Контакты | Заказ рекламы в лифтах");
?><div id="content">
	<div class="main">
	<!--This one font-size using only here, we either must add some class to the page or make this styling-->
		<h1 style="font-size:36px;">Контакты</h1>
		<?$APPLICATION->IncludeComponent("bitrix:breadcrumb", "breadcrumb_bellift", Array(
			"START_FROM" => "0",	// Номер пункта, начиная с которого будет построена навигационная цепочка
			"PATH" => "",	// Путь, для которого будет построена навигационная цепочка (по умолчанию, текущий путь)
			"SITE_ID" => "s1",	// Cайт (устанавливается в случае многосайтовой версии, когда DOCUMENT_ROOT у сайтов разный)
		),
			false
		);?>
	</div>
 <article class="contacts_block"> <section class="block">
	<h3>Адрес</h3>
	 <?
                $APPLICATION->IncludeFile(
                    SITE_DIR . "include/address.php",
                    Array(),
                    Array("MODE" => "html")
                );
                ?> <!--Why <br/>? Because the width is 240px but string is not so big--> </section> <section class="block">
	<h3>Телефоны</h3>
 <span class="velcom"> <?= tplvar('velcom', true); ?></span> <span class="velcom"> <?= tplvar('mts', true); ?></span> <span class="velcom"> <?= tplvar('velcom2', true);?></span> <span class="city_phone"><?= tplvar('city_phone', true); ?></span> </section> <section class="block">
	<h3>E-mail</h3>
 <a href="mailto:<?= tplvar('email'); ?>"><?= tplvar('email', true); ?></a> </section> <section class="block">
	<h3>Skype</h3>
	 <?= tplvar('skype', true); ?> </section> </article>
</div>
<div id="contacts_map">
	 <?$APPLICATION->IncludeComponent(
	"bitrix:map.yandex.view", 
	"contacts", 
	array(
		"INIT_MAP_TYPE" => "MAP",
		"MAP_DATA" => "a:4:{s:10:\"yandex_lat\";d:53.906849677986244;s:10:\"yandex_lon\";d:27.57505368494868;s:12:\"yandex_scale\";i:17;s:10:\"PLACEMARKS\";a:1:{i:0;a:3:{s:3:\"LON\";d:27.575603325480568;s:3:\"LAT\";d:53.9071585180901;s:4:\"TEXT\";s:31:\"Беллифтреклама.by\";}}}",
		"MAP_WIDTH" => "",
		"MAP_HEIGHT" => "",
		"CONTROLS" => array(
		),
		"OPTIONS" => array(
			0 => "ENABLE_DBLCLICK_ZOOM",
			1 => "ENABLE_DRAGGING",
		),
		"MAP_ID" => ""
	),
	false
);?>
</div>
<div id="content_feed">
 <section class="feedback_form">
	<h2>Форма обратной связи</h2>
	 <!--no action, free for you!--> <?$APPLICATION->IncludeComponent(
	"bitrix:form.result.new",
	"contacts",
	Array(
		"WEB_FORM_ID" => "1",
		"IGNORE_CUSTOM_TEMPLATE" => "N",
		"USE_EXTENDED_ERRORS" => "N",
		"SEF_MODE" => "Y",
		"SEF_FOLDER" => "/contacts/",
		"CACHE_TYPE" => "N",
		"CACHE_TIME" => "3600",
		"LIST_URL" => "",
		"EDIT_URL" => "",
		"SUCCESS_URL" => "",
		"CHAIN_ITEM_TEXT" => "",
		"CHAIN_ITEM_LINK" => "",
		"VARIABLE_ALIASES" => Array(
		)
	)
);?> </section>
</div><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>