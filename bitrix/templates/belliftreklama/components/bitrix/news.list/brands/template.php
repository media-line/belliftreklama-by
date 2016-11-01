<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>
<? if ($arResult["ITEMS"]): ?>
    <!--I used carouFredSel,it's easy and pretty-->
    <section class="block5">
        <div class="prev_partner"></div>
        <div class="partners_wrapper">
        <? $upload = COption::GetOptionString("main", "upload_dir", "upload"); ?>
        <? foreach ($arResult["ITEMS"] as $k => $arItem): ?>
            <?
            $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
            $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
            $imageId = $arItem['PREVIEW_PICTURE']['ID'];
            $alt = $arItem['PREVIEW_PICTURE']['DESCRIPTION'];

            $db_file = CFile::GetByID($imageId);
            $file_info = '/'.$upload.'/'.$db_file->arResult[0]['SUBDIR'].'/'.$db_file->arResult[0]['FILE_NAME'];
            ?>
            <div class="partner_img_wrapper" id="<?= $this->GetEditAreaId($arItem['ID']); ?>">
                <img src="<?= $file_info ?>" alt="<?=$alt?>"/>
            </div>
        <? endforeach; ?>

        </div>
        <div class="next_partner"></div>
    </section>
<? endif; ?>
