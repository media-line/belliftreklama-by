<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

$APPLICATION->SetPageProperty("title", $arResult["PROPERTIES"]["MAPNAME"]["VALUE"]);
$APPLICATION->SetPageProperty("description", $arResult["PROPERTIES"]["MAPDESC"]["VALUE"]["TEXT"]);
$APPLICATION->SetPageProperty("keywords", $arResult["PROPERTIES"]["MAPTAGS"]["VALUE"]);

/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
?>
<div class="news-detail">
	<?if($arParams["DISPLAY_PICTURE"]!="N" && is_array($arResult["DETAIL_PICTURE"])):?>
		<img
			class="detail_picture"
			border="0"
			src="<?=$arResult["DETAIL_PICTURE"]["SRC"]?>"
			width="<?=$arResult["DETAIL_PICTURE"]["WIDTH"]?>"
			height="<?=$arResult["DETAIL_PICTURE"]["HEIGHT"]?>"
			alt="<?=$arResult["DETAIL_PICTURE"]["ALT"]?>"
			title="<?=$arResult["DETAIL_PICTURE"]["TITLE"]?>"
			/>
	<?endif?>
	<?if($arParams["DISPLAY_DATE"]!="N" && $arResult["DISPLAY_ACTIVE_FROM"]):?>
		<span class="news-date-time"><?=$arResult["DISPLAY_ACTIVE_FROM"]?></span>
	<?endif;?>
	<?if($arParams["DISPLAY_NAME"]!="N" && $arResult["NAME"]):?>
		<h3><?=$arResult["NAME"]?></h3>
	<?endif;?>
	<?if($arParams["DISPLAY_PREVIEW_TEXT"]!="N" && $arResult["FIELDS"]["PREVIEW_TEXT"]):?>
		<p><?=$arResult["FIELDS"]["PREVIEW_TEXT"];unset($arResult["FIELDS"]["PREVIEW_TEXT"]);?></p>
	<?endif;?>
	<?php if($arResult["DETAIL_TEXT"]) { ?>
	    <div class="map_news_detail"><?echo $arResult["DETAIL_TEXT"];?></div>
	<?php } ?>
	<div style="clear:both"></div>
	<br />
	<?
	foreach($arResult["DISPLAY_PROPERTIES"] as $pid=>$arProperty):?>

		<?=$arProperty["NAME"]?>:&nbsp;
		<?if(is_array($arProperty["DISPLAY_VALUE"])):?>
			<?=implode("&nbsp;/&nbsp;", $arProperty["DISPLAY_VALUE"]);?>
		<?else:?>
			<?=$arProperty["DISPLAY_VALUE"];?>
		<?endif?>
		<br />
	<?endforeach;?>
	<?php if (isset($_GET['ELEMENT_ID'])) { ?>
    <script type="text/javascript">
        var objElementCat = <?php echo $_GET['ELEMENT_ID']; ?>;
    </script>	
	<?php } ?>
	<?php if (isset($_GET['current'])) { ?>
    <script type="text/javascript">
        var objCurrentCat = <?php echo $_GET['current']; ?>;
    </script>	
	<?php } ?>
	<?php if (isset($_GET['filterObj'])) { ?>
    <script type="text/javascript">
        var filterObj = <?php echo $_GET['filterObj']; ?>;
    </script>	
	<?php } ?>
</div>