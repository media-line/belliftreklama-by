<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>
<? if ($arResult["SECTIONS"]): ?>
    <?
    $areas = array();
    $areasAll = array();
    $groups = array();
    ?>
    <? foreach ($arResult["SECTIONS"] as $k => $arSection): ?>
        <?
        $arFilter = Array("IBLOCK_ID" => $arParams['IBLOCK_ID'], "ACTIVE" => "Y", "SECTION_ID" => $arSection['ID']);
        $res = CIBlockElement::GetList(array(), $arFilter, false, false, array());
        while ($ob = $res->GetNextElement()) {
            $aProps = $ob->GetProperties();
            $aFields = $ob->GetFields();
            $coords = $aProps['MAP']['VALUE'];
            $areas[$arSection['NAME']][] = "{
                        center: [$coords],
                        name: \"{$aFields['NAME']}\"
                    }";
            $areasAll[] = "{
                        center: [$coords],
                        name: \"{$aFields['NAME']}\"
                    }";
        }
        ?>
    <? endforeach; ?>
    <?
    if ($areas) {
        $groups[] = '{
            name: "Все",
            items: [
                '.implode(', ', $areasAll).'
            ]
        }';
        foreach($areas as $name => $area){
            $groups[] = '{
                name: "'.$name.'",
                items: [
                    '.implode(', ', $area).'
                ]
            }';
        }
    }
    ?>
    <script type="text/javascript">
        //Группы городов, можно также клацать
        var cities = [
            <?= implode(', ', $groups);?>
        ];
    </script>
<? endif; ?>
