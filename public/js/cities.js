$( document ).ready(function() {
    var countrySelect = $('select[name=country_id]');
<<<<<<< HEAD
    countrySelect.change('change', function() {
        getCities(this.value);

    });
    var citySelect = $('select[name=city_id]');

=======
    prependDefaultOption(countrySelect, true);
    countrySelect.change('change', function() {
        var selectValue = this.value;
        if (selectValue !== "null") {
            getCities(selectValue);
        } else {
            cleanSelect(citySelect);
        }
    });
    var citySelect = $('select[name=city_id]');

    function prependDefaultOption(select, isDefault) {
        var newOption = $('<option value>All countries</option>');
        if (isDefault) {
            newOption.attr("selected","selected");
        }
        select.prepend(newOption);
    }

>>>>>>> e4014f61c9c122663b441a06abce780df31eab72
    function insertNewOption(select, key, val) {
        var newOption = $('<option value="'+key+'">'+val+'</option>');
        select.append(newOption);
    }

    function cleanSelect(select) {
<<<<<<< HEAD
        select.children().remove().end().append('<option value=null>All cities</option>');
    }

    function getCities(id) {
            $.ajax({
                url: '/api/cities/' + id,
                cache: false,
                type: 'GET',
                success: function (data, textStatus, xhr) {
                    cleanSelect(citySelect);
                    $.each(data, function(key, value){
                        insertNewOption(citySelect, key, value);
                    });
                },
                error :function(err) {
                }
            })
=======
        select.children().remove().end().append('<option value>All cities</option>').attr("selected","selected");
    }

    function getCities(id) {
        $.ajax({
            url: '/api/cities/' + id,
            cache: false,
            type: 'GET',
            headers: {
                "Content-Type":"json",
            },
            success: function (data, textStatus, xhr) {
                cleanSelect(citySelect);
                $.each(data, function(key, value){
                    insertNewOption(citySelect, key, value);
                });
            },
            error :function(err) {
                cleanSelect(citySelect);
            }
        })
>>>>>>> e4014f61c9c122663b441a06abce780df31eab72
    }

});

