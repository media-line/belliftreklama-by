<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

if (!$arResult["NavShowAlways"]) {
    if ($arResult["NavRecordCount"] == 0 || ($arResult["NavPageCount"] == 1 && $arResult["NavShowAll"] == false))
        return;
}

//echo "<pre>"; print_r($arResult);echo "</pre>";

$strNavQueryString = ($arResult["NavQueryString"] != "" ? $arResult["NavQueryString"] . "&amp;" : "");
$strNavQueryStringFull = ($arResult["NavQueryString"] != "" ? "?" . $arResult["NavQueryString"] : "");
?>

<ul class="paging">

    <? if ($arResult["bDescPageNumbering"] === true): ?>
        <? if ($arResult["NavPageNomer"] < $arResult["NavPageCount"]): ?>
            <? if ($arResult["bSavePage"]): ?>
                <li><a class="prev"
                       href="<?= $arResult["sUrlPath"] ?>?<?= $strNavQueryString ?>PAGEN_<?= $arResult["NavNum"] ?>=<?= ($arResult["NavPageNomer"] + 1) ?>"><?= GetMessage("nav_prev") ?></a>
                </li>
            <? else: ?>
                <? if ($arResult["NavPageCount"] == ($arResult["NavPageNomer"] + 1)): ?>
                    <li><a class="prev"
                           href="<?= $arResult["sUrlPath"] ?><?= $strNavQueryStringFull ?>"><?= GetMessage("nav_prev") ?></a>
                    </li>
                <? else: ?>
                    <li><a class="prev"
                           href="<?= $arResult["sUrlPath"] ?>?<?= $strNavQueryString ?>PAGEN_<?= $arResult["NavNum"] ?>=<?= ($arResult["NavPageNomer"] + 1) ?>"><?= GetMessage("nav_prev") ?></a>
                    </li>
                <?endif ?>
            <?endif ?>
        <?
        else: /*?>
		 <a class="page-direction page-prev" href="javascript:void(0);"><?=GetMessage("nav_prev")?></a>
	<?*/ endif?>

            <? while ($arResult["nStartPage"] >= $arResult["nEndPage"]): ?>
                <? $NavRecordGroupPrint = $arResult["NavPageCount"] - $arResult["nStartPage"] + 1; ?>

                <? if ($arResult["nStartPage"] == $arResult["NavPageNomer"]): ?>
                    <li><a class="active" href="javascript:void(0);"><?= $NavRecordGroupPrint ?></a></li>
                <? elseif ($arResult["nStartPage"] == $arResult["NavPageCount"] && $arResult["bSavePage"] == false): ?>
                    <li>
                        <a href="<?= $arResult["sUrlPath"] ?><?= $strNavQueryStringFull ?>"><?= $NavRecordGroupPrint ?></a>
                    </li>
                <?
                else: ?>
                    <li>
                        <a href="<?= $arResult["sUrlPath"] ?>?<?= $strNavQueryString ?>PAGEN_<?= $arResult["NavNum"] ?>=<?= $arResult["nStartPage"] ?>"><?= $NavRecordGroupPrint ?></a>
                    </li>
                <?endif ?>

                <? $arResult["nStartPage"]-- ?>
            <? endwhile ?>


        <? if ($arResult["NavPageNomer"] > 1): ?>
            <li><a class="next"
                   href="<?= $arResult["sUrlPath"] ?>?<?= $strNavQueryString ?>PAGEN_<?= $arResult["NavNum"] ?>=<?= ($arResult["NavPageNomer"] - 1) ?>"><?= GetMessage("nav_next") ?></a>
            </li>
        <?
        else: /*?>
		 <a class="page-direction page-next" href="javascript:void(0);"><?=GetMessage("nav_next")?></a>
	<? */ endif?>

    <? else: ?>


        <? if ($arResult["NavPageNomer"] > 1): ?>

            <? if ($arResult["bSavePage"]): ?>
                <li><a class="prev"
                       href="<?= $arResult["sUrlPath"] ?>?<?= $strNavQueryString ?>PAGEN_<?= $arResult["NavNum"] ?>=<?= ($arResult["NavPageNomer"] - 1) ?>"><?= GetMessage("nav_prev") ?></a>
                </li><? else: ?>
                <? if ($arResult["NavPageNomer"] > 2): ?>
                    <li><a class="prev"
                           href="<?= $arResult["sUrlPath"] ?>?<?= $strNavQueryString ?>PAGEN_<?= $arResult["NavNum"] ?>=<?= ($arResult["NavPageNomer"] - 1) ?>"><?= GetMessage("nav_prev") ?></a>
                    </li><? else: ?>
                    <li><a class="prev"
                           href="<?= $arResult["sUrlPath"] ?><?= $strNavQueryStringFull ?>"><?= GetMessage("nav_prev") ?></a>
                    </li><?endif ?>
            <?endif ?>

        <?
        else: /*?>
		 <a class="page-direction page-prev" href="javascript:void(0);"><?=GetMessage("nav_prev")?></a>
	<?*/ endif?>

            <? while ($arResult["nStartPage"] <= $arResult["nEndPage"]): ?>

                <? if ($arResult["nStartPage"] == $arResult["NavPageNomer"]): ?>
                    <li><a class="active" href="javascript:void(0);"><?= $arResult["nStartPage"] ?></a></li>
                <? elseif ($arResult["nStartPage"] == 1 && $arResult["bSavePage"] == false): ?>
                    <li>
                        <a href="<?= $arResult["sUrlPath"] ?><?= $strNavQueryStringFull ?>"><?= $arResult["nStartPage"] ?></a>
                    </li>
                <?
                else: ?>
                    <li>
                        <a href="<?= $arResult["sUrlPath"] ?>?<?= $strNavQueryString ?>PAGEN_<?= $arResult["NavNum"] ?>=<?= $arResult["nStartPage"] ?>"><?= $arResult["nStartPage"] ?></a>
                    </li>
                <?endif ?>
                <? $arResult["nStartPage"]++ ?>
            <? endwhile ?>

        <? if ($arResult["NavPageNomer"] < $arResult["NavPageCount"]): ?>
            <li><a class="next"
                   href="<?= $arResult["sUrlPath"] ?>?<?= $strNavQueryString ?>PAGEN_<?= $arResult["NavNum"] ?>=<?= ($arResult["NavPageNomer"] + 1) ?>"><?= GetMessage("nav_next") ?></a>
            </li>
        <?
        else: /*?>
		<a class="page-direction page-next" href="javascript:void(0);"><?=GetMessage("nav_next")?></a>
	<?*/ endif?>

    <?endif ?>

</ul>