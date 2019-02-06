;(function($){
    const loginForm = $('#js-login-form'),
        passForm = $('#js-pass-form');

    function isEmptyField(el) {
        if( el[0].value.length === 0 ) {
            el.addClass('inp-error');
        } else {
            el.removeClass('inp-error');
        }
    }

    function isFilled(el){
        return el.value.length > 0;
    }

    function validate(form) {
        const inputs = $(form).find('input');
        let result = inputs.toArray().every(isFilled);
        if( result ) {
            $(form).find('[type="submit"]').removeAttr('disabled');
        }
    }

    $('#js-login-form input').on('blur', function(){
        isEmptyField($(this));
        validate(loginForm);
    });

    $('#js-pass-form input').on('blur', function(){
        isEmptyField($(this));
        validate(passForm);
    });
})(jQuery);