function msieversion() {
    var ua = window.navigator.userAgent
    var msie = ua.indexOf ( "MSIE " )

    if ( msie > 0 )      // If Internet Explorer, return version number
       return parseInt (ua.substring (msie+5, ua.indexOf (".", msie )))
    else                 // If another browser, return 0
       return 0

}

window.onload = function() {
    ieversion = msieversion();
    if ( ieversion < 9 && ieversion >= 3){
        var newDiv = document.createElement('div');
        newDiv.className = 'bws_reload';
        newDiv.innerHTML = '<div class="cwrp"><h1>Ваш браузер устарел.</h1><p>Сайт не может корректно работать с браузерами не поддерживающими общепринятые Web-стандарты.</p><p>Также, обращаем ваше внимание на то, что большое количество уязвимостей вашего браузера может грозить безопасности вашего компьютера.</p><p>Обновите браузер на один из предложеных ниже и вы получите доступ к последним технологиям, возможно даже увидите на регулярно посещаемых вами сайтах нечто новое и интересное, что немогло ранее быть показано или работать.</p><ul><li class="firefox"><h2>Mozilla Firefox</h2><div>Хороший красочный функциональный браузер на все случаи жизни. Можно легко настроить его под свои представления о программном обеспечении. Имеет огромное количество дополнений, которые можно легко скачать с официального сайта.<ul class="file"><li style="padding-left: 0px;"><noindex><a rel="nofollow" href="http://www.mozilla.org/firefox/">Mozilla Firefox</a></noindex></li></ul></div></li><li class="chrome"><h2>Google Chrome</h2><div>Браузер от монстров web-индустрии Google. Наверное самый минималистичный по внешнему виду. Если вам нужен просто браузер без проблем, однозначно это он.<ul class="file"><li style="padding-left: 0px;"><noindex><a rel="nofollow" href="http://www.google.com/chrome/">Google Chrome</a></noindex></li></ul></div></li><li class="opera"><h2>Opera</h2><div>Не самый популярный браузер, но многие специалисты считают его самым безопасным и самым быстрым. Этот браузер отличный выбор для тех у кого медленный интернет.<ul class="file"><li style="padding-left: 0px;"><noindex><a rel="nofollow" href="http://www.opera.com/">Opera</a></noindex></li></ul></div></li><li class="ie"><h2>Internet Explorer</h2><div>Консервативный браузер от разработчиков операционной системы Windows. Очень медленно развивается но текущая версия однозначно лучше чем предидущая.<ul class="file"><li style="padding-left: 0px;"><noindex><a rel="nofollow" href="http://www.microsoft.com/rus/windows/internet-explorer/">Internet Explorer</a></noindex></li></ul></div></li></ul></div>';
        document.body.appendChild(newDiv);
    }
}
