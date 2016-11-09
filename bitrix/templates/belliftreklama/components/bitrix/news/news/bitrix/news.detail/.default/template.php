<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?><?
$name = $arResult['NAME'];
$date = CIBlockFormatProperties::DateFormat($arParams['ACTIVE_DATE_FORMAT'], MakeTimeStamp($arResult["DATE_CREATE"],
    CSite::GetDateFormat()));

$width = 640;	// 640 это ширина колонки контента.
$ratio = $arResult['PREVIEW_PICTURE']['WIDTH'] / $arResult['PREVIEW_PICTURE']['HEIGHT'];
$height = $arResult['PREVIEW_PICTURE']['HEIGHT'] / $ratio;
//$width = 630;
//$height = 300;
$y = CFile::ResizeImageGet($arResult['PREVIEW_PICTURE']['ID'], array("width" => $width, "height" => $height), BX_RESIZE_IMAGE_PROPORTIONAL, true, array());
$image = $y['src'];
$alt = $arResult['PREVIEW_PICTURE']['ALT'];
$detail_text = $arResult['DETAIL_TEXT'];

$filesIds = $arResult['PROPERTIES']['FILES']['VALUE'];
$files = array();
$upload = COption::GetOptionString("main", "upload_dir", "upload");
foreach ($filesIds as $fid) {
    $db_file = CFile::GetByID($fid);
    $fileElement = $db_file->GetNext();
    $file_path = '/' . $upload . '/' . $fileElement['SUBDIR'] . '/' . $fileElement['FILE_NAME'];
    $filename = $fileElement['DESCRIPTION'] ? $fileElement['DESCRIPTION'] : $fileElement['ORIGINAL_NAME'];
    $filepath = explode('.', $fileElement['FILE_NAME'], 2);
    $fileext = $filepath[1];
    $filesize = number_format(round($fileElement['FILE_SIZE']/1024), 0, ",", " ").' Kb';
    $files[] = array(
        'path' => $file_path,
        'ext' => $fileext,
        'name' => $filename,
        'size' => $filesize
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
<script type="text/javascript" src="//yastatic.net/es5-shims/0.0.2/es5-shims.min.js" charset="utf-8"></script>
<script type="text/javascript" src="//yastatic.net/share2/share.js" charset="utf-8"></script>
<div style="margin-bottom:20px; line-height:24px;">
    <span style="font-size:14px; display:inline-block;">Поделиться новостью в соцсетях -</span>
    <div class="ya-share2" style="display:inline-block;vertical-align:middle;" data-services="vkontakte,facebook,odnoklassniki,moimir"></div>
</div>
<main class="article_details">
    <? if ($image): ?>
	<?/*<img src="<?= $image ?>" width="630" alt="<?= $alt ?>" height="300"/>*/?>
		<img src="<?= $image ?>" class="article_main_img" alt="<?= $alt ?>"/>
    <? endif; ?>
    <?= $detail_text ?>
    <? if ($files): ?>
        <section class="download_block">
            <h2>Файлы для скачивания</h2>
            <? foreach ($files as $file): ?>
                <div class="<?= $file['ext'] ?> document">
                    <a class="file_name" href="<?= $file['path'] ?>"><?= $file['name'] ?></a>
                    <span class="file_size"><?= $file['size'] ?></span>
                </div>
            <? endforeach; ?>
        </section>
    <? endif; ?>
</main>