;(function($){
    const loginBtn = document.getElementById('js-login'),
        loginPopup = document.getElementById('js-login-popup'),
        regBtn = document.getElementById('js-registration'),
        regPopup = document.getElementById('js-reg-popup'),
        verifyPopup = document.getElementById('js-verify-popup'),
        isShouldVerifyEmail = document.getElementById('userShouldVerifyEmail'),
        verifyPopupCloseBtn = document.getElementById('verifyPopupCloseBtn'),
        jsLogout = document.getElementById('js-logout');


    let closeBtn = $('.popup-btn-cl');

    if (loginBtn) {
        loginBtn.addEventListener('click', function(event) {
            event.preventDefault();

            $(loginPopup).fadeIn();
        });
    }

    regBtn.addEventListener('click', function(event) {
        event.preventDefault();

        $(regPopup).fadeIn();
    });

    closeBtn.on('click', function() {
        const _this = $(this),
            wrapper = _this.parents('.popup-wr'),
            form = wrapper.find('form');

        wrapper.fadeOut(500, function() {
            $(this).removeAttr('style');
            form[0].reset();
            form.find('[type="submit"]').attr('disabled', true)
        });
    });

    if (isShouldVerifyEmail) {
        $(verifyPopup).fadeIn();
    }

    verifyPopupCloseBtn.addEventListener('click', function() {
        $(jsLogout).click();
    });
})(jQuery);
