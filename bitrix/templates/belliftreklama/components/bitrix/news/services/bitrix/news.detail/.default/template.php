<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>
<?
$name = $arResult['NAME'];
$date = CIBlockFormatProperties::DateFormat($arParams['ACTIVE_DATE_FORMAT'], MakeTimeStamp($arResult["DATE_CREATE"],
    CSite::GetDateFormat()));

$type = $arResult['ID'];
$pricelist_val = $arResult['PROPERTIES']['PRICELIST']['VALUE'];
$db_file = CFile::GetByID($pricelist_val);
$upload = COption::GetOptionString("main", "upload_dir", "upload");
$fileElement = $db_file->GetNext();
$pricelist_href = '/'.$upload.'/'.$fileElement['SUBDIR'].'/'.$fileElement['FILE_NAME'];
$pricelist_name = $arResult['PROPERTIES']['PRICELIST']['DESCRIPTION'];
$pricelist = '<a class="doc_icon" href="'.$pricelist_href.'">'.$pricelist_name.'</a>';

$width = 630;
$height = 300;
$y = CFile::ResizeImageGet($arResult['PREVIEW_PICTURE']['ID'], array("width" => $width, "height" => $height), BX_RESIZE_IMAGE_EXACT, true, array());
$image = $y['src'];
$alt = $arResult['PREVIEW_PICTURE']['ALT'];
$detail_text = $arResult['DETAIL_TEXT'];
$preview_text = $arResult['PREVIEW_TEXT'];

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
<?
	ob_start(); ?>

	<? if ($type == 54): ?>
		<?$APPLICATION->IncludeComponent(
			"bitrix:main.include",
			".default",
			Array(
				"AREA_FILE_SHOW" => "file",
				"PATH" => "/include/calc_homes.php",
				"EDIT_TEMPLATE" => "",
				"TYPE" => $type,
				"PRICELIST" => $pricelist
			),
			false,
			array("HIDE_ICONS" => "Y")
		);?>
	<? endif; ?>
	
	<? if ($type == 55): ?>
		<?$APPLICATION->IncludeComponent(
			"bitrix:main.include",
			".default",
			Array(
				"AREA_FILE_SHOW" => "file",
				"PATH" => "/include/calc_elite.php",
				"EDIT_TEMPLATE" => "",
				"TYPE" => $type,
				"PRICELIST" => $pricelist
			),
			false,
			array("HIDE_ICONS" => "Y")
		);?>
	<? endif; ?>
	
	<? if ($type == 56): ?>
		<?$APPLICATION->IncludeComponent(
			"bitrix:main.include",
			".default",
			Array(
				"AREA_FILE_SHOW" => "file",
				"PATH" => "/include/calc_business.php",
				"EDIT_TEMPLATE" => "",
				"TYPE" => $type,
				"PRICELIST" => $pricelist
			),
			false,
			array("HIDE_ICONS" => "Y")
		);?>
	<? endif; ?>
	
	<? if ($type == 57): ?>
		<?$APPLICATION->IncludeComponent(
			"bitrix:main.include",
			".default",
			Array(
				"AREA_FILE_SHOW" => "file",
				"PATH" => "/include/calc_admin.php",
				"EDIT_TEMPLATE" => "",
				"TYPE" => $type,
				"PRICELIST" => $pricelist
			),
			false,
			array("HIDE_ICONS" => "Y")
		);?>
	<? endif; ?>

<?	$calculator = ob_get_contents();
	ob_end_clean();
?>
<?
	$preview_text = str_replace('#calculator#', $calculator, $preview_text);
?>

<h1><?= $name ?></h1>
<?$APPLICATION->IncludeComponent("bitrix:breadcrumb", "breadcrumb_bellift", Array(
    "START_FROM" => "0",	// Номер пункта, начиная с которого будет построена навигационная цепочка
    "PATH" => "",	// Путь, для которого будет построена навигационная цепочка (по умолчанию, текущий путь)
    "SITE_ID" => "s1",	// Cайт (устанавливается в случае многосайтовой версии, когда DOCUMENT_ROOT у сайтов разный)
),
    false
);?>
<main class="article_details">
    <? if ($image): ?>
        <img src="<?= $image ?>" width="630" alt="<?= $alt ?>" height="300"/>
    <? endif; ?>
    <?= $preview_text ?>
    <? if ($images): ?>
        <section class="project_gallery">
            <h2>Галерея работ</h2>
            <? foreach ($images as $image): ?>
                <div class="gallery_imb_block">
                    <a class="fancybox" href="<?= $image['realpath'] ?>" rel="group" title="<?= $image['alt'] ?>">
                        <img alt="<?= $image['alt'] ?>"
                             src="<?= $image['path'] ?>">
                    </a>
                </div>
            <? endforeach; ?>
        </section>
    <? endif; ?>
</main>
