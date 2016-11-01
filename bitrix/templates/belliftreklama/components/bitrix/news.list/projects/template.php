<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>
<? if ($arResult["ITEMS"]): ?>
    <section class="block2">
        <!--Gallery realized just like fancyboxes with rel group, so u can just download /images and give them group names-->
        <? $upload = COption::GetOptionString("main", "upload_dir", "upload"); ?>
        <? foreach ($arResult["ITEMS"] as $k => $arItem): ?>
            <?
            $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
            $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
            $imageId = $arItem['PREVIEW_PICTURE']['ID'];

            $width = 300;
            $height = 300;
            if ($k == 0){
                $width = 630;
            }
            $y = CFile::ResizeImageGet($imageId, array("width" => $width, "height" => $height), BX_RESIZE_IMAGE_EXACT, true, array() );
            $image = $y['src'];
            $alt = $arItem['PREVIEW_PICTURE']['DESCRIPTION'];

            $db_file = CFile::GetByID($imageId);
            $file_info = '/'.$upload.'/'.$db_file->arResult[0]['SUBDIR'].'/'.$db_file->arResult[0]['FILE_NAME'];

            ?>
            <div class="gallery_imb_block" id="<?= $this->GetEditAreaId($arItem['ID']); ?>">
                <a class="fancybox" rel="block2_gal" href="<?= $file_info ?>">
                    <img src="<?= $image ?>" width="<?=$width?>" height="<?=$height?>" alt="<?=$alt?>"/>
                </a>
            </div>
        <? endforeach; ?>

        <!--Cuz I don't know how u'll realize your gallery I'll just put one more pic in the link -->
        <div class="gallery_imb_block">
            <a href="/services/completed/">
                <img src="<?= SITE_TEMPLATE_PATH ?>/images/pic_link.png" width="300" height="300" alt="normal_one"/>
            </a>
        </div>
    </section>
<? endif; ?>
