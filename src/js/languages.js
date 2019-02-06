;(function($){
    const langBtn = document.getElementById('js-lang'),
        langList = document.querySelector('.lang-list');

    function toggleLanguageBtn() {
        if(!langBtn.classList.contains('open-lang')){
            langBtn.classList.add('open-lang');
            langList.classList.add('lang-list--open');
        } else {
            langBtn.classList.remove('open-lang');
            langList.classList.remove('lang-list--open');
        }
    }

    function closeLangMiss(event) {
        event.stopPropagation();
        const langWr = $('.h-lang');
        if( langWr.is(event.target) || langWr.has(event.target).length ) {
            return false;
        }
        if(langBtn.classList.contains('open-lang')){
            langBtn.classList.remove('open-lang');
            langList.classList.remove('lang-list--open');
        }
    }

    langBtn.addEventListener('click', toggleLanguageBtn);
    document.addEventListener('click', closeLangMiss);
})(jQuery);