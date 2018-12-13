$( document ).ready(function() {
    var typeSelect = $('select[name=type]');
    typeSelect.change('change', function() {
        getPositions(this.value);

    });
    var positionSelect = $('select[name=position]');

    function insertNewOption(select, key, val) {
        var newOption = $('<option value="'+key+'">'+val+'</option>');
        select.append(newOption);
    }

    function cleanSelect(select) {
        select.children().remove().end().append('<option value=null>Select position</option>');
    }

    function getPositions(type) {
        $.ajax({
            url: '/api/positions/' + type,
            cache: false,
            type: 'GET',
            success: function (data, textStatus, xhr) {
                cleanSelect(positionSelect);
                $.each(data, function(key, value){
                    insertNewOption(positionSelect, key, value);
                });
            },
            error :function(err) {
            }
        })
    }

});