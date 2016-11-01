<?
define('STOP_STATISTICS', true);
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$GLOBALS['APPLICATION']->RestartBuffer();

header("Pragma: no-cache");
header("Cache-Control: no-store");
header("Content-Type: application/json");

$type      = $_REQUEST['type'];
$id        = $_REQUEST['id'];
$build     = $_REQUEST['build'];
$iblock_id = 17;
$answer    = "";

if (empty($id) /*|| empty($build)*/ || empty($type)) {
    echo json_encode(array("answer" => ""));
    die();
}

CModule::IncludeModule("iblock");
switch ($type) {
    case 'city':
        $arFilter = array("IBLOCK_ID" => $iblock_id, "ACTIVE" => "Y",
            /*"PROPERTY_TYPE" => $build,*/
            "SECTION_ID" => $id
        );
        $res = CIBlockElement::GetList(array(), $arFilter, array("NAME"), false, array());
        $areas = array();
        while ($ob = $res->GetNextElement()) {
            $arFields = $ob->GetFields();
            $areas[] = $arFields['NAME'];
        }

        //$option = '<option value="">не выбран</option>';
        $option = '';
        $answer .= $option;
        foreach ($areas as $area) {
            $option = '<option value="' . $area . '">' . $area . '</option>';
            $answer .= $option;
        }
        break;
    case 'area':
        $city = $_REQUEST['city'];
        $arFilter = array("IBLOCK_ID" => $iblock_id, "ACTIVE" => "Y",
            /*"PROPERTY_TYPE" => $build,*/
            "SECTION_ID" => $city,
            "NAME" => $id
        );
        $res = CIBlockElement::GetList(array(), $arFilter, array("PROPERTY_CARRIER"), false, array("PROPERTY_CARRIER"));
        $carriers = array();
        while ($ob = $res->GetNextElement()) {
            $arFields = $ob->GetFields();
            $carriers[$arFields['PROPERTY_CARRIER_ENUM_ID']] = $arFields['PROPERTY_CARRIER_VALUE'];
        }

        $option = '<option value="">не выбран</option>';
        $answer .= $option;
        foreach ($carriers as $key => $carrier) {
            $option = '<option value="' . $key . '">' . $carrier . '</option>';
            $answer .= $option;
        }
        break;
    case 'carrier':
        $city = $_REQUEST['city'];
        $area = $_REQUEST['area'];
        $arFilter = array("IBLOCK_ID" => $iblock_id, "ACTIVE" => "Y",
            /*"PROPERTY_TYPE" => $build,*/
            "SECTION_ID" => $city,
            "NAME" => $area,
            "PROPERTY_CARRIER" => $id,
        );
        $res = CIBlockElement::GetList(array(), $arFilter, array("PROPERTY_DAY"), false, array("PROPERTY_DAY"));
        $days = array();
        while ($ob = $res->GetNextElement()) {
            $arFields = $ob->GetFields();
            $days[] = $arFields['PROPERTY_DAY_VALUE'];
        }

        $option = '<option value="">не выбрано</option>';
        $answer .= $option;
        foreach ($days as $day) {
            $option = '<option value="' . $day . '">' . $day . '</option>';
            $answer .= $option;
        }
        break;
    case 'day':
        $city = $_REQUEST['city'];
        $area = $_REQUEST['area'];
        $carrier = $_REQUEST['carrier'];
        $arFilter = array("IBLOCK_ID" => $iblock_id, "ACTIVE" => "Y",
            /*"PROPERTY_TYPE" => $build,*/
            "SECTION_ID" => $city,
            "NAME" => $area,
            "PROPERTY_CARRIER" => $carrier,
            "PROPERTY_DAY" => $id
        );
        $res = CIBlockElement::GetList(array(), $arFilter, false, false,
            array("PROPERTY_PRICE", "PROPERTY_PRICE_TYPE"));
        $price = false;
        $sum = 0;
        while($ob = $res->GetNextElement()) {
            $arFields = $ob->GetFields();
            $price_type = $arFields['PROPERTY_PRICE_TYPE_VALUE'];
            $sum += $arFields['PROPERTY_PRICE_VALUE'];
        }

        $answer = $sum . " " . $price_type;
        break;
    case 'format':
        $city = $_REQUEST['city'];
        $area = $_REQUEST['area'];
        $carrier = $_REQUEST['carrier'];
        $day = $_REQUEST['day'];
        $arFilter = array("IBLOCK_ID" => $iblock_id, "ACTIVE" => "Y",
            /*"PROPERTY_TYPE" => $build,*/
            "SECTION_ID" => $city,
            "NAME" => $area,
            "PROPERTY_CARRIER" => $carrier,
            "PROPERTY_DAY" => $day,
            "PROPERTY_FORMAT" => $id
        );
        $res = CIBlockElement::GetList(array(), $arFilter, false, false,
            array("PROPERTY_PRICE", "PROPERTY_PRICE_TYPE"));
        $price = false;
        $sum = 0;
        while($ob = $res->GetNextElement()) {
            $arFields = $ob->GetFields();
            $price_type = $arFields['PROPERTY_PRICE_TYPE_VALUE'];
            $sum += $arFields['PROPERTY_PRICE_VALUE'];
        }

        $answer = $sum . ' ' . $price_type;
        break;
}

//$m = $APPLICATION->ConvertCharset("Адрес <b>$email</b> успешно подписан на рассылку сайта.", "utf-8", SITE_CHARSET);

echo json_encode(array("answer" => $answer));
?><?die();?>