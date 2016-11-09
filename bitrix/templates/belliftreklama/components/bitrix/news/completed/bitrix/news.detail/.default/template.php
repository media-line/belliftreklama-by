<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>
<?
$name = $arResult['NAME'];
$date = CIBlockFormatProperties::DateFormat($arParams['ACTIVE_DATE_FORMAT'], MakeTimeStamp($arResult["DATE_CREATE"],
    CSite::GetDateFormat()));
$width = 630;
$height = 300;
$y = CFile::ResizeImageGet($arResult['PREVIEW_PICTURE']['ID'], array("width" => $width, "height" => $height), BX_RESIZE_IMAGE_EXACT, true, array());
$image = $y['src'];
$alt = $arResult['PREVIEW_PICTURE']['ALT'];
$detail_text = $arResult['DETAIL_TEXT'];

$imagesIds = $arResult['PROPERTIES']['IMAGES']['VALUE'];
$images = array();
$width = 151;
$height = 151;
$upload = COption::GetOptionString("main", "upload_dir", "upload");
foreach ($imagesIds as $k => $imageId) {
    $y = CFile::ResizeImageGet($imageId, array("width" => $width, "height" => $height), BX_RESIZE_IMAGE_EXACT, true, array());
    $imagesAlt = $arResult['PROPERTIES']['IMAGES']['DESCRIPTION'][$k];

    $db_file = CFile::GetByID($imageId);
    $fileElement = $db_file->GetNext();
    $realpath = '/'.$upload.'/'.$fileElement['SUBDIR'].'/'.$fileElement['FILE_NAME'];

    $images[] = array(
        'realpath' => $realpath,
        'path' => $y['src'],
        'alt' => $imagesAlt
    );
}
?>
<?$APPLICATION->IncludeComponent("bitrix:breadcrumb", "breadcrumb_bellift", Array(
    "START_FROM" => "0",	// Номер пункта, начиная с которого будет построена навигационная цепочка
    "PATH" => "",	// Путь, для которого будет построена навигационная цепочка (по умолчанию, текущий путь)
    "SITE_ID" => "s1",	// Cайт (устанавливается в случае многосайтовой версии, когда DOCUMENT_ROOT у сайтов разный)
),
    false
);?>
<h1><?= $name ?></h1>
<article class="open_project">
    <? if ($image): ?>
        <img src="<?= $image ?>" width="630" alt="<?= $alt ?>" height="300"/>
    <? endif; ?>
    <?= $detail_text ?>
    <? if ($images): ?>
        <section class="project_gallery">
            <? foreach ($images as $image): ?>
                <div class="gallery_imb_block">
                    <a class="fancybox" href="<?= $image['realpath'] ?>" rel="group">
                        <img alt="<?= $image['alt'] ?>"
                             src="<?= $image['path'] ?>">
                    </a>
                </div>
            <? endforeach; ?>
        </section>
    <? endif; ?>
</article>
