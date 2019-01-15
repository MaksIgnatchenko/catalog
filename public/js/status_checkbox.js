$( document ).ready(function() {
    var checkbox = $('#statusCheckbox');

    if (checkbox.attr('checked')) {
        checkbox.value = 'active';
        $('label[for='+  checkbox.attr('id')  +']').text('Active');
    } else {
        checkbox.value = 'block';
        $('label[for='+  checkbox.attr('id')  +']').text('Block');
    }

    checkbox.change('change', function() {
        if (this.checked) {
            $('label[for='+  this.id  +']').text('Active');
            this.value = 'active';
        } else {
            $('label[for='+  this.id  +']').text('Block');
            this.value = 'block';
        }
    });
});