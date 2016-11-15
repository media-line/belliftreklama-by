<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>
<?
$link = $arResult['PROPERTIES']['LINK']['VALUE'];

$width = 258;
$height = 358;
$y = CFile::ResizeImageGet($arResult['PREVIEW_PICTURE']['ID'], array("width" => $width, "height" => $height), BX_RESIZE_IMAGE_EXACT, true, array());
$image = $y['src'];
$name = $arResult['PREVIEW_PICTURE']['DESCRIPTION'];

?>

<aside class="right_banner hidden-xs hidden-sm">
    <? if ($link): ?>
    <a href="<?= $link ?>">
        <? endif; ?>
        <img src="<?= $image ?>" width="258" height="358" alt="<?= $name ?>">
        <? if ($link): ?>
    </a>
<? endif; ?>
</aside>
