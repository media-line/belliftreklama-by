<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>
<? if ($arResult["ITEMS"]): ?>
    <? $cities = array(); ?>
    <? foreach ($arResult["ITEMS"] as $k => $arItem): ?>
        <?
        $coords = $arItem['PROPERTIES']['MAP']['VALUE'];
        $cities[] = "{
                content: '{$arItem['NAME']}',
                center: [$coords],
                zoom: 12,
				IBLOCKID: '{$arItem['IBLOCK_ID']}', 
				ID: '{$arItem['ID']}'
            }";
		$currentCategory = null;
		
		if (isset($_GET['current'])) {
		    $currentCategory = $_GET['current'];
        }
        ?>
    <? endforeach; ?>
    <script type="text/javascript">
        //city list declaration
        var listBoxItems = [
            <?= implode(', ', $cities);?>
        ];
		<?php if ($currentCategory !== null) { ?>
		    currentCategory = <?php echo $currentCategory; ?>;
        <?php } else { ?>
		    currentCategory = null;
		<?php } ?>

    </script>
<? endif; ?>

