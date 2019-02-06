;(function($){

    /* === Header functions === */
    (function($){
        const btn = document.getElementById('js-mob-btn'),
            menu = document.querySelector('.header-inner'),
            pages = document.querySelector('.h-pages-wr__title'),
            burgerBtn = document.querySelector('.humburger');

        btn.addEventListener('click', function(){
            if( !btn.classList.contains('mob-btn--active') ) {
                btn.classList.add('mob-btn--active');
                $(menu).slideDown();
            } else {
                btn.classList.remove('mob-btn--active');
                $(menu).slideUp(500, function(){
                    $(this).removeAttr('style');
                });
            }
        });

        pages.addEventListener('click', function(){
            const title = this;

            if( !title.classList.contains('pages-show') ) {
                title.classList.add('pages-show');
                $(title).next().slideDown();
            } else {
                title.classList.remove('pages-show');
                $(title).next().slideUp();
            }
        });

        burgerBtn.addEventListener('click', function(){
            const menu = document.querySelector('.h-main-pages');
            if( !menu.classList.contains('h-main-pages--open') ) {
                menu.classList.add('h-main-pages--open');
            } else {
                menu.classList.remove('h-main-pages--open');
            }
        });

        document.addEventListener('click', function(event){
            const menuWr = $('.h-btn-wr');
            const menu = document.querySelector('.h-main-pages');
            if( menuWr.is(event.target) || menuWr.has(event.target).length ) {
                return false;
            }
            if( menu.classList.contains('h-main-pages--open') ) {
                menu.classList.remove('h-main-pages--open');
            }
        });

    })($);

})(jQuery);