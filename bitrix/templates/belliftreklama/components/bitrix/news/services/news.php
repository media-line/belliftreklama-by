<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>
<?
$arFilter = Array("IBLOCK_ID" => 6, "ACTIVE" => "Y");
$res = CIBlockElement::GetList(array("SORT" => "ASC"), $arFilter, false, false, array());
if ($ob = $res->GetNextElement()) {
    $arFields = $ob->GetFields();
    $url = $arFields['DETAIL_PAGE_URL'];
    LocalRedirect($url);
}
?>