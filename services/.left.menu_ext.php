<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

// [0] => Array
//         (
//             [0] => В мире
//             [1] => /news/v_mire/
//             [2] => Array
//                 (
//                     [0] => /news/v_mire/
//                 )

//             [3] => Array
//                 (
//                     [FROM_IBLOCK] => 1
//                     [IS_PARENT] =>
//                     [DEPTH_LEVEL] => 1
//                 )

//         )

$aMenuLinksExt = array();
$arFilter = Array("IBLOCK_ID" => 6, "ACTIVE" => "Y");
$res = CIBlockElement::GetList(array("SORT" => "ASC"), $arFilter, false, false, array());
while ($ob = $res->GetNextElement()) {
    $arFields = $ob->GetFields();

    $setUrl = array();
    $setUrl[] = trim($arFields['NAME']);
    $url = $arFields['DETAIL_PAGE_URL'];
    $setUrl[] = $url;
    $setUrl[] = array($url);
    $setUrl[] = array(
        "FROM_IBLOCK" => 1,
        "IS_PARENT" => "",
        "DEPTH_LEVEL" => 1,
    );
    $aMenuLinksExt[] = $setUrl;
}
// print_r($aMenuLinksExt);

if ($aMenuLinksExt) {
    $aMenuLinks = array_merge($aMenuLinksExt, $aMenuLinks);
}
