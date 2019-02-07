"use strict";

;

(function ($) {
  $('select').each(function () {
    var $this = $(this),
        numberOfOptions = $(this).children('option').length,
        lineWrapper = $('.main-form__line');
    $this.addClass('select-hidden');
    $this.wrap('<div class="select"></div>');
    $this.after('<div class="select-styled"></div>');
    var $styledSelect = $this.next('div.select-styled');
    $styledSelect.text($this.children('option').eq(0).text());
    var $list = $('<ul />', {
      'class': 'select-options'
    }).insertAfter($styledSelect);

    for (var i = 0; i < numberOfOptions; i++) {
      $('<li />', {
        text: $this.children('option').eq(i).text(),
        rel: $this.children('option').eq(i).val()
      }).appendTo($list);
    }

    var $listItems = $list.children('li');

    function addStyle() {
      lineWrapper.addClass('main-form__line--ext');
    }

    function delStyle() {
      lineWrapper.removeClass('main-form__line--ext');
    }

    $styledSelect.click(function (e) {
      var indx = $(e.target).parents('.main-form__piece').index();
      var wrapper = $('.main-form__line');
      e.stopPropagation();

      if (indx === 0) {
        if (!wrapper.hasClass('main-form__line--ext')) {
          addStyle();
        } else {
          delStyle();
        }
      } else {
        delStyle();
      }

      $('div.select-styled.active').not(this).each(function () {
        $(this).removeClass('active').next('ul.select-options').hide();
      });
      $(this).toggleClass('active').next('ul.select-options').toggle();
    });
    $listItems.click(function (e) {
      delStyle();
      $this.children().removeAttr('selected');
      e.stopPropagation();
      var currentIndx = $(this).index();
      $styledSelect.text($(this).text()).removeClass('active');
      $this.children().eq(currentIndx).attr('selected', true).change();
      $this.val($(this).attr('rel'));
      $list.hide();
    });
    $(document).click(function () {
      delStyle();
      $styledSelect.removeClass('active');
      $list.hide();
    });
  });
  $('select').change(function (event) {
    var changedOpt = $(event.currentTarget).find('option:selected');

    switch (changedOpt.parent().prop('id')) {
      case 'country':
        getDependsOptions({
          'country': changedOpt.val(),
          'with-companies': true
        }, '/api/cities/', $('#city'));
        break;

      case 'category':
        getDependsOptions({
          'category': changedOpt.val(),
          'with-companies': true
        }, '/api/specialities/', $('#speciality'));
        break;

      case 'speciality':
        getDependsOptions({
          'speciality': changedOpt.val(),
          'with-companies': true
        }, '/api/types/', $('#type'));
        break;
    }
  });

  function getDependsOptions(query, url, dependSelect) {
    var params = $.param(query);
    $.ajax({
      url: url + '?' + params,
      cache: false,
      type: 'GET',
      headers: {
        "Content-Type": "json"
      },
      success: function success(data, textStatus, xhr) {
        cleanSelect(dependSelect);
        $.each(data, function (key, value) {
          insertNewOption(dependSelect, key, value);
        });
        var virtualSelect = dependSelect.parent();
        var numberOfOptions = dependSelect.children('option').length;
        var styledSelect = virtualSelect.find('.select-styled');
        var list = virtualSelect.find('.select-options');
        list.empty();

        for (var i = 0; i < numberOfOptions; i++) {
          $('<li />', {
            text: dependSelect.children('option').eq(i).text(),
            rel: dependSelect.children('option').eq(i).val()
          }).appendTo(list);
        }

        list.on('click', function (event) {
          var currentIndex = $(event.target).index();
          var select = $(this).parent().find('select');
          select.children().removeAttr('selected');
          select.children().eq(currentIndex).attr('selected', true).change();
          list.prev().text($(event.target).html());
          event.stopPropagation();
          $(this).hide();
        });
        styledSelect.text(dependSelect.children().eq(0).text());
        list.insertAfter(styledSelect);
      },
      error: function error(err) {
        cleanSelect(dependSelect);
      }
    });
  }

  function insertNewOption(select, key, val) {
    var newOption = $('<option value="' + key + '">' + val + '</option>');
    select.append(newOption);
  }

  function cleanSelect(select) {
    select.children().not(':first').remove().end();
  }
})(jQuery);
"use strict";

;

(function ($) {
  var search = $('#search'),
      wrapper = $('.main-form__line');
  search.on('focus', function () {
    if (window.innerWidth > 760) {
      var wrapperWidth = wrapper.innerWidth();
      search.addClass('in-focus');
      search.css({
        'width': wrapperWidth + 'px'
      });
    }
  });
  search.on('blur', function () {
    search.removeClass('in-focus');
    search.removeAttr('style');
  });
  $(window).resize(function () {
    var wrapperWidth = wrapper.innerWidth();

    if (search.hasClass('in-focus')) {
      search.css({
        'width': wrapperWidth + 'px'
      });
    }
  });
})(jQuery);
"use strict";

;

(function ($) {
  var loginForm = $('#js-login-form'),
      passForm = $('#js-pass-form');

  function isEmptyField(el) {
    if (el[0].value.length === 0) {
      el.addClass('inp-error');
    } else {
      el.removeClass('inp-error');
    }
  }

  function isFilled(el) {
    return el.value.length > 0;
  }

  function validate(form) {
    var inputs = $(form).find('input');
    var result = inputs.toArray().every(isFilled);

    if (result) {
      $(form).find('[type="submit"]').removeAttr('disabled');
    }
  }

  $('#js-login-form input').on('blur', function () {
    isEmptyField($(this));
    validate(loginForm);
  });
  $('#js-pass-form input').on('blur', function () {
    isEmptyField($(this));
    validate(passForm);
  });
})(jQuery);
"use strict";

;

(function ($) {
  /* === Header functions === */
  (function ($) {
    var btn = document.getElementById('js-mob-btn'),
        menu = document.querySelector('.header-inner'),
        pages = document.querySelector('.h-pages-wr__title'),
        burgerBtn = document.querySelector('.humburger');
    btn.addEventListener('click', function () {
      if (!btn.classList.contains('mob-btn--active')) {
        btn.classList.add('mob-btn--active');
        $(menu).slideDown();
      } else {
        btn.classList.remove('mob-btn--active');
        $(menu).slideUp(500, function () {
          $(this).removeAttr('style');
        });
      }
    });
    pages.addEventListener('click', function () {
      var title = this;

      if (!title.classList.contains('pages-show')) {
        title.classList.add('pages-show');
        $(title).next().slideDown();
      } else {
        title.classList.remove('pages-show');
        $(title).next().slideUp();
      }
    });
    burgerBtn.addEventListener('click', function () {
      var menu = document.querySelector('.h-main-pages');

      if (!menu.classList.contains('h-main-pages--open')) {
        menu.classList.add('h-main-pages--open');
      } else {
        menu.classList.remove('h-main-pages--open');
      }
    });
    document.addEventListener('click', function (event) {
      var menuWr = $('.h-btn-wr');
      var menu = document.querySelector('.h-main-pages');

      if (menuWr.is(event.target) || menuWr.has(event.target).length) {
        return false;
      }

      if (menu.classList.contains('h-main-pages--open')) {
        menu.classList.remove('h-main-pages--open');
      }
    });
  })($);
})(jQuery);
"use strict";

;

(function ($) {
  var langBtn = document.getElementById('js-lang'),
      langList = document.querySelector('.lang-list');

  function toggleLanguageBtn() {
    if (!langBtn.classList.contains('open-lang')) {
      langBtn.classList.add('open-lang');
      langList.classList.add('lang-list--open');
    } else {
      langBtn.classList.remove('open-lang');
      langList.classList.remove('lang-list--open');
    }
  }

  function closeLangMiss(event) {
    event.stopPropagation();
    var langWr = $('.h-lang');

    if (langWr.is(event.target) || langWr.has(event.target).length) {
      return false;
    }

    if (langBtn.classList.contains('open-lang')) {
      langBtn.classList.remove('open-lang');
      langList.classList.remove('lang-list--open');
    }
  }

  langBtn.addEventListener('click', toggleLanguageBtn);
  document.addEventListener('click', closeLangMiss);
})(jQuery);
"use strict";

;

(function ($) {
  var loginBtn = document.getElementById('js-login'),
      loginPopup = document.getElementById('js-login-popup'),
      regBtn = document.getElementById('js-registration'),
      regPopup = document.getElementById('js-reg-popup'),
      verifyPopup = document.getElementById('js-verify-popup'),
      isShouldVerifyEmail = document.getElementById('userShouldVerifyEmail'),
      verifyPopupCloseBtn = document.getElementById('verifyPopupCloseBtn'),
      jsLogout = document.getElementById('js-logout');
  var closeBtn = $('.popup-btn-cl');

  if (loginBtn) {
    loginBtn.addEventListener('click', function (event) {
      event.preventDefault();
      $(loginPopup).fadeIn();
    });
  }

  regBtn.addEventListener('click', function (event) {
    event.preventDefault();
    $(regPopup).fadeIn();
  });
  closeBtn.on('click', function () {
    var _this = $(this),
        wrapper = _this.parents('.popup-wr'),
        form = wrapper.find('form');

    wrapper.fadeOut(500, function () {
      $(this).removeAttr('style');
      form[0].reset();
      form.find('[type="submit"]').attr('disabled', true);
    });
  });

  if (isShouldVerifyEmail) {
    $(verifyPopup).fadeIn();
  }

  verifyPopupCloseBtn.addEventListener('click', function () {
    $(jsLogout).click();
  });
})(jQuery);
//# sourceMappingURL=all.js.map
