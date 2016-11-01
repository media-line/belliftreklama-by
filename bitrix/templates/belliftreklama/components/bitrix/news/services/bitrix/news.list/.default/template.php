<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>
<? if ($arResult["ITEMS"]): ?>
    <section class="news_list">
        <? foreach ($arResult["ITEMS"] as $arItem): ?>
            <?
            $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
            $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));

            $name = $arItem['NAME'];
            $descr = $arItem['PREVIEW_TEXT'];
            $link = $arItem['DETAIL_PAGE_URL'];
            $imageId = $arItem['PREVIEW_PICTURE']['ID'];
            $alt = $arItem['PREVIEW_PICTURE']['ALT'];

            $y = CFile::ResizeImageGet($imageId, array("width" => 135, "height" => 135),
                BX_RESIZE_IMAGE_EXACT, true, array());
            $image = $y['src'];

            $date = CIBlockFormatProperties::DateFormat($arParams['ACTIVE_DATE_FORMAT'], MakeTimeStamp($arItem["DATE_CREATE"],
                CSite::GetDateFormat()));
            ?>
            <article class="news" id="<?= $this->GetEditAreaId($arItem['ID']); ?>">
                <time class="date"><?=$date?></time>
                <a href="<?= $link ?>"><h2><?= $name ?></h2></a>
                <?=$descr?>
            </article>
        <? endforeach; ?>
        <?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
            <?=$arResult["NAV_STRING"]?>
        <?endif;?>
    </section>
<? else: ?>
    <section class="news_list">
        <h3>К сожалению, по Вашему запросу новости не найдены.</h3>
    </section>
<? endif; ?>
