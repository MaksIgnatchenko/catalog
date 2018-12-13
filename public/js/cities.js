$( document ).ready(function() {
    var countrySelect = $('select[name=country_id]');
    countrySelect.change('change', function() {
        getCities(this.value);

    });
    var citySelect = $('select[name=city_id]');

    function insertNewOption(select, key, val) {
        var newOption = $('<option value="'+key+'">'+val+'</option>');
        select.append(newOption);
    }

    function cleanSelect(select) {
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
    }

});

