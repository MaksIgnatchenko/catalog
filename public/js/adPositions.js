$( document ).ready(function() {
    var typeSelect = $('select[name=type]');
<<<<<<< HEAD
    typeSelect.change('change', function() {
        getPositions(this.value);

    });
    var positionSelect = $('select[name=position]');

=======
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

>>>>>>> e4014f61c9c122663b441a06abce780df31eab72
    function insertNewOption(select, key, val) {
        var newOption = $('<option value="'+key+'">'+val+'</option>');
        select.append(newOption);
    }

    function cleanSelect(select) {
<<<<<<< HEAD
        select.children().remove().end().append('<option value=null>Select position</option>');
=======
        select.children().remove().end().append('<option value>Select position</option>');
>>>>>>> e4014f61c9c122663b441a06abce780df31eab72
    }

    function getPositions(type) {
        $.ajax({
            url: '/api/positions/' + type,
            cache: false,
            type: 'GET',
<<<<<<< HEAD
=======
            headers: {
                "Content-Type":"json",
            },
>>>>>>> e4014f61c9c122663b441a06abce780df31eab72
            success: function (data, textStatus, xhr) {
                cleanSelect(positionSelect);
                $.each(data, function(key, value){
                    insertNewOption(positionSelect, key, value);
                });
            },
            error :function(err) {
<<<<<<< HEAD
=======
                cleanSelect(positionSelect);
>>>>>>> e4014f61c9c122663b441a06abce780df31eab72
            }
        })
    }

<<<<<<< HEAD
});
=======
});
>>>>>>> e4014f61c9c122663b441a06abce780df31eab72
