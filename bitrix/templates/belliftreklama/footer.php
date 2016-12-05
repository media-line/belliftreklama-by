<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
IncludeTemplateLangFile(__FILE__);

$path = parse_url($_SERVER['REQUEST_URI']);
$uri = explode('/', $path['path']);

$isHome = empty($uri[1]);
$isMap = ($uri[1] == 'map');
?>
	<span id="up_button"></span>
</div>
</div>
<? if (!$isMap): ?>
<div class="footer_wrapper">
    <footer>
        <span class="copyright"><?= tplvar('copyright', true); ?></span>
        <div class="shareBar">
            <!-- AddToAny BEGIN -->
            <div class="a2a_kit a2a_kit_size_32 a2a_default_style">
                <noindex><a class="a2a_dd" href="https://www.addtoany.com/share_save"></a></noindex>
                <noindex><a class="a2a_button_vk"></a></noindex>
                <noindex><a class="a2a_button_facebook"></a></noindex>
            </div>
            <script type="text/javascript">
                var a2a_config = a2a_config || {};
                a2a_config.locale = "ru";
            </script>
            <script type="text/javascript" src="//static.addtoany.com/menu/page.js"></script>
            <!-- AddToAny END -->
        </div>
            <noindex><a rel="nofollow" href="http://jl.by">
                <div class="creator hidden-xs hidden-sm">
                    <div class="logo_bot"></div>
                    <span>Дизайн и разработка</span>
                </div>
            </a> </noindex>
            <noindex><a rel="nofollow" href="http://www.medialine.by/">
                <div class="creator">
                    <div class="logo_ml"></div>
                    <span>Продвижение и поддержка</span>
                </div>
            </a></noindex>
    </footer>
</div>

<? endif; ?>

<div class="calc_description" id="calc_description">
	<h2>Адреса</h2>
	<div id="calc_description_container"></div>
</div>

<!-- Yandex.Metrika counter -->
<script type="text/javascript">
(function (d, w, c) {
    (w[c] = w[c] || []).push(function() {
        try {
            w.yaCounter28773576 = new Ya.Metrika({id:28773576,
                    clickmap:true,
                    trackLinks:true,
                    accurateTrackBounce:true});
        } catch(e) { }
    });

    var n = d.getElementsByTagName("script")[0],
        s = d.createElement("script"),
        f = function () { n.parentNode.insertBefore(s, n); };
    s.type = "text/javascript";
    s.async = true;
    s.src = (d.location.protocol == "https:" ? "https:" : "http:") + "//mc.yandex.ru/metrika/watch.js";

    if (w.opera == "[object Opera]") {
        d.addEventListener("DOMContentLoaded", f, false);
    } else { f(); }
})(document, window, "yandex_metrika_callbacks");
</script>
<noscript><div><img src="//mc.yandex.ru/watch/28773576" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->

<!-- Yandex.Metrika counter --><script type="text/javascript"> (function (d, w, c) { (w[c] = w[c] || []).push(function() { try { w.yaCounter31520148 = new Ya.Metrika({ id:31520148, clickmap:true, trackLinks:true, accurateTrackBounce:true, webvisor:true }); } catch(e) { } }); var n = d.getElementsByTagName("script")[0], s = d.createElement("script"), f = function () { n.parentNode.insertBefore(s, n); }; s.type = "text/javascript"; s.async = true; s.src = "https://mc.yandex.ru/metrika/watch.js"; if (w.opera == "[object Opera]") { d.addEventListener("DOMContentLoaded", f, false); } else { f(); } })(document, window, "yandex_metrika_callbacks");</script><noscript><div><img src="https://mc.yandex.ru/watch/31520148" style="position:absolute; left:-9999px;" alt="" /></div></noscript><!-- /Yandex.Metrika counter -->

<!-- Yandex.Metrika informer -->
<a href="https://metrika.yandex.ru/stat/?id=19761760&amp;from=informer"
target="_blank" rel="nofollow"><img src="https://informer.yandex.ru/informer/19761760/3_1_FFFFFFFF_EFEFEFFF_0_pageviews"
style="width:88px; height:31px; border:0;" alt="Яндекс.Метрика" title="Яндекс.Метрика: данные за сегодня (просмотры, визиты и уникальные посетители)" onclick="try{Ya.Metrika.informer({i:this,id:19761760,lang:'ru'});return false}catch(e){}" /></a>
<!-- /Yandex.Metrika informer -->

<!-- Yandex.Metrika counter -->
<script type="text/javascript">
    (function (d, w, c) {
        (w[c] = w[c] || []).push(function() {
            try {
                w.yaCounter19761760 = new Ya.Metrika({
                    id:19761760,
                    clickmap:true,
                    trackLinks:true,
                    accurateTrackBounce:true,
                    webvisor:true
                });
            } catch(e) { }
        });

        var n = d.getElementsByTagName("script")[0],
            s = d.createElement("script"),
            f = function () { n.parentNode.insertBefore(s, n); };
        s.type = "text/javascript";
        s.async = true;
        s.src = "https://mc.yandex.ru/metrika/watch.js";

        if (w.opera == "[object Opera]") {
            d.addEventListener("DOMContentLoaded", f, false);
        } else { f(); }
    })(document, window, "yandex_metrika_callbacks");
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/19761760" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->

</body>
</html>