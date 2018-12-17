$( document ).ready(function() {
    var typeSelect = $('select[name=type]');
    prependDefaultOption(typeSelect, true)
    typeSelect.change('change', function() {
        var selectValue = this.value;
        if(selectValue) {
            getPositions(selectValue);
        } else {
            cleanSelect(positionSelect);
        }
    });
    var positionSelect = $('select[name=position]');

    function prependDefaultOption(select, isDefault) {
        var newOption = $('<option value>Select type</option>');
        if (isDefault) {
            newOption.attr("selected","selected");
        }
        select.prepend(newOption);
    }

    function insertNewOption(select, key, val) {
        var newOption = $('<option value="'+key+'">'+val+'</option>');
        select.append(newOption);
    }

    function cleanSelect(select) {
        select.children().remove().end().append('<option value>Select position</option>');
    }

    function getPositions(type) {
        $.ajax({
            url: '/api/positions/' + type,
            cache: false,
            type: 'GET',
            headers: {
                "Content-Type":"json",
            },
            success: function (data, textStatus, xhr) {
                cleanSelect(positionSelect);
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
