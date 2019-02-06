;(function($){
    const search = $('#search'),
        wrapper = $('.main-form__line');

    search.on('focus', function(){
        if( window.innerWidth > 760 ) {
            let wrapperWidth = wrapper.innerWidth();
            search.addClass('in-focus');
            search.css({'width': wrapperWidth + 'px'});
        }
    });
    search.on('blur', function() {
        search.removeClass('in-focus');
        search.removeAttr('style');
    });

    $(window).resize(function() {
        let wrapperWidth = wrapper.innerWidth();
        if(search.hasClass('in-focus')) {
            search.css({'width': wrapperWidth + 'px'});
        }
    });
})(jQuery);