<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
?>

<? //if ($arResult["isFormNote"] != "Y") { ?>
<?
$formH = $arResult["FORM_HEADER"];
$formH = str_replace('<form', '<form class="contact_feedback" name="contact_feedback" id="contact_feedback"', $formH);
?>
<?= $formH ?>

<? if ($_REQUEST['formresult'] == "addok" && $arResult["isFormErrors"] != "Y"): ?>
    <br/><p style="color: green;">Сообщение успешно отправлено!</p><br/>
    <script type="text/javascript">
        $(document).ready(function () {
            var scrtop = $('#contact_feedback').offset().top;
            $('html, body').animate({scrollTop: scrtop}, 'slow');
        });
    </script>
<? endif; ?>
<? if ($arResult["isFormErrors"] == "Y"): ?>
    <br>
    <?= $arResult["FORM_ERRORS_TEXT"]; ?>
    <script type="text/javascript">
        $(document).ready(function () {
            var scrtop = $('#contact_feedback').offset().top;
            $('html, body').animate({scrollTop: scrtop}, 'slow');
        });
    </script>
<? endif; ?>

<div class="left">
    <? foreach ($arResult["QUESTIONS"] as $FIELD_SID => $arQuestion): ?>
        <? if ($arQuestion['STRUCTURE'][0]['FIELD_TYPE'] == 'hidden'): ?>
            <?= $arQuestion["HTML_CODE"] ?>
        <?
        elseif ($arQuestion['STRUCTURE'][0]['FIELD_TYPE'] == 'textarea'):
            $textName = $arQuestion["CAPTION"];
            $textarea = $arQuestion["HTML_CODE"];
            $textarea = str_replace('<textarea', '<textarea id="feedback_text"', $textarea);
        else: ?>
            <div class="row">
                <label><?= $arQuestion["CAPTION"] ?> <? if ($arQuestion["REQUIRED"] == "Y"): ?><span class="required">*</span><? endif; ?></label>
                <?
                $input = $arQuestion["HTML_CODE"];
                switch($FIELD_SID){
                    case 'PHONE':
                        $input = str_replace('<input', '<input id="feedback_phone"', $input);
                        break;
                    case 'NAME':
                        $input = str_replace('<input', '<input id="feedback_name"', $input);
                        break;
                    case 'EMAIL':
                        $input = str_replace('<input', '<input id="feedback_email"', $input);
                        break;
                }
                echo $input;
                ?>
                <? if ($FIELD_SID == 'PHONE'): ?>
                    <span class="hint">Пример заполнения: +375 29 234-56-78</span>
                <? endif; ?>
            </div>
        <? endif; ?>
    <? endforeach; ?>
    <span class="grey_text"><span class="required">*</span>Поля обязательные к заполнению</span>
    <span class="error"></span>

    <?
    if ($arResult["isUseCaptcha"] == "Y") {
        ?>
        <span>Введите код</span>
        <input type="text" name="captcha_word" size="30" maxlength="50" value=""/>
        <span></span>
        <input type="hidden" name="captcha_sid"
               value="<?= htmlspecialcharsbx($arResult["CAPTCHACode"]); ?>"/>
        <div id="captchaimage">
            <img src="/bitrix/tools/captcha.php?captcha_sid=<?= htmlspecialcharsbx($arResult["CAPTCHACode"]); ?>"
                 width="148" height="48" alt=""> <? /*?>width="180" height="40"<?*/ ?>
        </div>
        <!--            <a class="refresh" href="--><?php //echo($_SERVER['PHP_SELF']); ?><!--"></a>-->
    <?
    } // isUseCaptcha
    ?>
</div>
<div class="right">
    <div class="row">
        <label for="feedback_text"><?= $textName ?><span class="required">*</span></label>
        <?= $textarea ?>
    </div>
    <button class="contact_us" <?= (intval($arResult["F_RIGHT"]) < 10 ? "disabled=\"disabled\"" : ""); ?>
            type="submit"
            name="web_form_submit">
        <?= htmlspecialcharsbx(strlen(trim($arResult["arForm"]["BUTTON"])) <= 0 ? GetMessage("FORM_ADD") : $arResult["arForm"]["BUTTON"]); ?>
    </button>
    <input type="hidden" name="web_form_submit"
           value="<?= htmlspecialcharsbx(strlen(trim($arResult["arForm"]["BUTTON"])) <= 0 ? GetMessage("FORM_ADD") : $arResult["arForm"]["BUTTON"]); ?>"/>
</div>
<?= $arResult["FORM_FOOTER"] ?>