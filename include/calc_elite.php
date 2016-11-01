<?
$type = $arParams['TYPE'];
$iblock_id = 15;

$arFilter = array("IBLOCK_ID" => $iblock_id, "ACTIVE" => "Y"/*, "PROPERTY_TYPE" => $type*/);
$cnt = CIBlockElement::GetList(array(), $arFilter, array(), false, array('ID', 'NAME'));

if ($cnt > 0):
    ?>
    <section class="calc" id="calc">
        <h2>Рассчитайте стоимость услуги</h2>
        <?= $arParams['~PRICELIST'] ?>

        <div id="calculator" class="calculator_elite">
			<div class="row">
                <label for="area_select">Город</label>
                <select disabled="disabled" name="carrier">
                    <option value="">Минск</option>
                </select>
            </div>
            <div class="row">
                <label for="city_select">Район</label>
                <?
                $arFilter = array("IBLOCK_ID" => $iblock_id, "ACTIVE" => "Y"/*, "PROPERTY_TYPE" => $type*/);
                $citiesRes = CIBlockElement::GetList(array(), $arFilter, false, false, array());
                $citiesIds = array();
                while ($ob = $citiesRes->GetNextElement()) {
                    $arFields = $ob->GetFields();
                    $citiesIds[] = $arFields['IBLOCK_SECTION_ID'];
                }
                $citiesIds = array_unique($citiesIds);

                $arFilter = array("IBLOCK_ID" => $iblock_id, "ACTIVE" => "Y", "ID" => $citiesIds);
                $citiesRes = CIBlockSection::GetList(array(), $arFilter, false, false, array());
                ?>
                <select id="city_select" name="city">
                    <option value="">не выбран</option>
                    <? while ($ob = $citiesRes->GetNextElement()): ?>
                        <? $arFields = $ob->GetFields(); ?>
                        <option value="<?=$arFields['ID']?>"><?=$arFields['NAME']?></option>
                    <? endwhile; ?>
                </select>
                <input type="hidden" name="build" value="<?=$type?>" />
            </div>

            <div class="row">
                <label for="area_select">Объект</label>
                <select multiple="multiple" id="area_select" data-placeholder="не выбран" class="chosen-select" name="area" style="width:362px;">
                </select>
            </div>

            <div class="row little">
                <label for="day_select">Срок</label>
                <select id="day_select" name="day">
                    <option value="">не выбрано</option>
                </select>
            </div>

            <div class="row little">
                <label for="format_select">Формат</label>
                <select id="format_select" name="format">
                    <option value="">не выбран</option>
                </select>
            </div>

            <div class="calc_result">
                <div class="left">
                    <img src="<?= SITE_TEMPLATE_PATH ?>/images/ajax-loader.gif" alt="loading"/>
                    <output>&nbsp;</output>
                    <span class="grey_text">
                        Печать включена в стоимость
                    </span>
                </div>
                <a class="contact_us" href="#order_popup">Отправить заявку</a>
            </div>
        </div>


        <section class="feedback_form" id="order_popup">
            <h2>Отправьте заявку</h2>
            <?$APPLICATION->IncludeComponent("bitrix:form.result.new", "feedback_popup_calc", array(
                    "WEB_FORM_ID" => "1",
                    "IGNORE_CUSTOM_TEMPLATE" => "N",
                    "USE_EXTENDED_ERRORS" => "N",
                    "SEF_MODE" => "Y",
                    "SEF_FOLDER" => "",
                    "CACHE_TYPE" => "N",
                    "CACHE_TIME" => "3600",
                    "LIST_URL" => "",
                    "EDIT_URL" => "",
                    "SUCCESS_URL" => "",
                    "CHAIN_ITEM_TEXT" => "",
                    "CHAIN_ITEM_LINK" => ""
                ),
                false
            );?>
        </section>
    </section>
<? endif; ?>