<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>
<? if ($arResult["ITEMS"]): ?>
<section class="slider_wrapper col-md-12 hidden-xs hidden-sm">
    <div class="slider">
        <? foreach ($arResult["ITEMS"] as $arItem): ?>
            <?
            $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
            $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
            $descr = $arItem['PREVIEW_TEXT'];
            $bigNumber = $arItem['PROPERTIES']['BIG_NUMBER']['VALUE'];
            ?>
            <div class="slide" id="<?= $this->GetEditAreaId($arItem['ID']); ?>">
                <? if ($bigNumber): ?>
                <span class="big_number"><?=$bigNumber?></span>
                <? endif; ?>
                <?=$descr?>
            </div>
        <? endforeach; ?>
    </div>
</section>
<? endif; ?>
