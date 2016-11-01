<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$element = $_GET['OBJECT_ID'];
$ar_result=CIBlockSection::GetList(Array("SORT"=>"ASC"), Array("IBLOCK_ID"=>"13", "ID"=>"$element"),false, Array("UF_0000")); 
if($res=$ar_result->GetNext()){
$title = $res["UF_0003"];
$APPLICATION->SetPageProperty("title", "$title");
}
$ar_result=CIBlockSection::GetList(Array("SORT"=>"ASC"), Array("IBLOCK_ID"=>"13", "ID"=>"$element"),false, Array("UF_0002")); 
if($res=$ar_result->GetNext()){
$keywords = $res["UF_0004"];
$APPLICATION->SetPageProperty("keywords", "$keywords");
}
$ar_result=CIBlockSection::GetList(Array("SORT"=>"ASC"), Array("IBLOCK_ID"=>"13", "ID"=>"$element"),false, Array("UF_0001")); 
if($res=$ar_result->GetNext()){
$desc = $res["UF_0005"];
$APPLICATION->SetPageProperty("description", "$desc");

echo $arResult['DESCRIPTION'];
}
?>

<div class="news-detail">
    <? echo $arResult['DESCRIPTION']; ?>
</div>