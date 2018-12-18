$( document ).ready(function() {
    var positionSelect = $('select[name=position]');
    var typeSelect = $('select[name=type]');
    if (typeSelect[0].value !== null) {
        // console.log(positionSelect[0].value);
        getPositions(typeSelect[0].value);
    }
    typeSelect.change('change', function() {
        console.log(positionSelect[0].value);
        var selectValue = this.value;
        if(selectValue) {
            getPositions(selectValue);
        } else {
            cleanSelect(positionSelect);
        }
    });

    function insertNewOption(select, key, val) {
        var newOption = $('<option value="'+key+'">'+val+'</option>');
        select.append(newOption);
    }

    function cleanSelect(select) {
        select.children().remove().end();
    }

    function getPositions(type) {
        // console.log(positionSelect[0].value);
        $.ajax({
            url: '/api/positions/' + type,
            cache: false,
            type: 'GET',
            headers: {
                "Content-Type":"json",
            },
            success: function (data, textStatus, xhr) {
                // cleanSelect(positionSelect);
                $.each(data, function(key, value){
                    insertNewOption(positionSelect, key, value);
                });
            },
            error :function(err) {
                cleanSelect(positionSelect);
            }
        })
    }
});
