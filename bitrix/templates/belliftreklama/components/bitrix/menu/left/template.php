<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>
<? if (!empty($arResult)): ?>
    <nav class="left_menu">
        <ul>
        <?
        foreach ($arResult as $arItem):
            $selected = ($arItem['SELECTED']) ? 'class="active"' : '';
            ?>
            <? if ($arItem["PERMISSION"] > "D"): ?>
            <li><a <?=$selected?> href="<?= $arItem["LINK"] ?>"><?= $arItem["TEXT"] ?></a></li>
        <? endif ?>
        <? endforeach ?>
        </ul>
    </nav>
<? endif ?>