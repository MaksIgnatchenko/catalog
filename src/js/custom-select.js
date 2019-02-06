;(function($){
    $('select').each(function(){
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

        $styledSelect.click(function(e) {
            var indx = $(e.target).parents('.main-form__piece').index();
            var wrapper = $('.main-form__line');
            e.stopPropagation();
            if( indx === 0 ) {
                if( !wrapper.hasClass('main-form__line--ext') ) {
                    addStyle();
                } else {
                    delStyle();
                }
            } else {
                delStyle();
            }
            $('div.select-styled.active').not(this).each(function(){
                $(this).removeClass('active').next('ul.select-options').hide();
            });
            $(this).toggleClass('active').next('ul.select-options').toggle();
        });

        $listItems.click(function(e) {
            delStyle();
            $this.children().removeAttr('selected');
            e.stopPropagation();
            var currentIndx = $(this).index();
            $styledSelect.text($(this).text()).removeClass('active');
            $this.children().eq(currentIndx).attr('selected', true).change();
            $this.val($(this).attr('rel'));
            $list.hide();
        });

        $(document).click(function() {
            delStyle();
            $styledSelect.removeClass('active');
            $list.hide();
        });
    });

    $('select').change(function(event) {
        const changedOpt = $(event.currentTarget).find('option:selected');

        switch(changedOpt.parent().prop('id')) {
            case 'country' :
                getDependsOptions(
                    {'country' : changedOpt.val(), 'with-companies' : true},
                    '/api/cities/',
                    $('#city')
                    );
                break;
            case 'category' :
                getDependsOptions(
                    {'category' : changedOpt.val(), 'with-companies' : true},
                    '/api/specialities/',
                    $('#speciality')
                );
                break;
            case 'speciality' :
                getDependsOptions(
                    {'speciality' : changedOpt.val(), 'with-companies' : true},
                    '/api/types/',
                    $('#type')
                );
                break;
        }
    })

    function getDependsOptions(query, url, dependSelect) {
        var params = $.param(query);
        $.ajax({
            url: url + '?' + params,
            cache: false,
            type: 'GET',
            headers: {
                "Content-Type":"json",
            },
            success: function (data, textStatus, xhr) {
                cleanSelect(dependSelect);
                $.each(data, function(key, value){
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

                list.on('click', function(event) {
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
            error :function(err) {
                cleanSelect(dependSelect);
            }
        })
    }

    function insertNewOption(select, key, val) {
        var newOption = $('<option value="'+key+'">'+val+'</option>')
        select.append(newOption);
    }

    function cleanSelect(select) {
        select.children().not(':first').remove().end();
    }

})(jQuery);