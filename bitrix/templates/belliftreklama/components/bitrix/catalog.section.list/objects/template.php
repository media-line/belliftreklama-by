<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>
<? if ($arResult["SECTIONS"]): ?>
    <?
    $areas = array();
    $areasAll = array();
    $groups = array();
    ?>
    <? foreach ($arResult["SECTIONS"] as $k => $arSection): ?>
        <?
		$db_list = CIBlockSection::GetList(array(), array("IBLOCK_ID"=>$arParams['IBLOCK_ID'], "ACTIVE"=>"Y", 'CODE'=>$arSection['CODE']), true, array("UF_*"));
		$uf_type = $db_list->GetNext();
		$uf_type = $uf_type['UF_TYPE'];
		$resType = CIBlockElement::GetList(Array(), array("IBLOCK_ID"=>6, "ACTIVE"=>"Y", "ID"=>$uf_type), false, Array("nPageSize"=>1), array());
		$arFieldsTypeUrl = '';
		if($obType = $resType->GetNextElement())
		{
		  $arFieldsType = $obType->GetFields();
		  $arFieldsTypeUrl = $arFieldsType['DETAIL_PAGE_URL'];
		}
	
        $arFilter = Array("IBLOCK_ID" => $arParams['IBLOCK_ID'], "ACTIVE" => "Y", "SECTION_ID" => $arSection['ID']);
        $res = CIBlockElement::GetList(array(), $arFilter, false, false, array());
        while ($ob = $res->GetNextElement()) {
            $aProps = $ob->GetProperties();
            $aFields = $ob->GetFields();
			$formats = array();

            $pStr = '';
            if(!empty($aProps['PHOTO']['VALUE'])) :
                $pStr = '<div class="fancyboxInMap">';
                $i = 0;
                foreach($aProps['PHOTO']['VALUE'] as $pID) :
                    $pSrc = CFile::GetPath($pID);
                    if($i) :
                        $pStr .= '<a href="'.$pSrc.'" style="display:none" rel="group'.$aFields['ID'].'"></a>';
                    else :
                        $pStr .= '<a href="'.$pSrc.'" rel="group'.$aFields['ID'].'">Фото объекта</a>';
                    endif;
                    $i++;
                endforeach;
                $pStr .= '</div>';
            endif;

            foreach($aProps['FORMAT']['VALUE'] as $k => $format){
				$formats[] = "<b>{$format}</b> {$aProps['PRICE']['VALUE'][$k]}"; 
			}
			$day = $aProps['DAY']['VALUE'];

			$title = "<h3>{$aFields['NAME']}</h3><p>".implode("<br />", $formats)."</p><span>{$day}</span><a href='{$arFieldsTypeUrl}#calc'>Рассчитать</a><div class=\"inner_text\" style='clear:both'>".$pStr."</div>";
            $title = addcslashes($title, '"');
            $coords = $aProps['MAP']['VALUE'];
			$sectionsID[$arSection['NAME']] = $arSection['ID'];
            $areas[$arSection['NAME']][] = "{
                        center: [$coords],
                        name: \"{$title}\",
                    }";
            $areasAll[] = "{
                        center: [$coords],
                        name: \"{$title}\"
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
                ],
				section: '.$sectionsID[$name].'
            }';
        }
    } ?>
    <script type="text/javascript">
        //Группы городов, можно также клацать
        var groups = [
            <?= implode(', ', $groups);?>
        ];
    </script>
<? endif; ?>
