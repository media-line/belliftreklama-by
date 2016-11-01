<?
$type = $arParams['TYPE'];
$iblock_id = 17;

$arFilter = array("IBLOCK_ID" => $iblock_id, "ACTIVE" => "Y"/*, "PROPERTY_TYPE" => $type*/);
$cnt = CIBlockElement::GetList(array(), $arFilter, array(), false, array('ID', 'NAME'));

if ($cnt > 0):
    ?>
    <section class="calc" id="calc">
        <h2>Рассчитайте стоимость услуги</h2>
        <?= $arParams['~PRICELIST'] ?>

        <div id="calculator" class="calculator_admin">
            <div class="row">
                <label for="area_select">Объект</label>
				<?
                $arFilter = array("IBLOCK_ID" => $iblock_id, "ACTIVE" => "Y"/*, "PROPERTY_TYPE" => $type*/);
                $citiesRes = CIBlockElement::GetList(array(), $arFilter, array("NAME"), false, array());
                ?>
                <select multiple="multiple" id="area_select" data-placeholder="не выбран" class="chosen-select" name="area" style="width:362px;">
                    <? while ($ob = $citiesRes->GetNextElement()): ?>
                        <? $arFields = $ob->GetFields(); ?>
                        <option value="<?=$arFields['NAME']?>"><?=$arFields['NAME']?></option>
                    <? endwhile; ?>
                </select>
            </div>
            <div class="row">
                <label for="carrier_select">Тип носителя</label>
                <select id="carrier_select" name="carrier">
                    <option value="">не выбран</option>
                </select>
            </div>

            <div class="row little">
                <label for="day_select">Срок</label>
                <select id="day_select" name="day">
                    <option value="">не выбрано</option>
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