jQuery(function($){
    var options={
        format: 'mm/dd/yyyy',
        todayHighlight: true,
        autoclose: true,
    };
    $("[name='appear_start']").datepicker(options);

    var uploadField = document.getElementById('image');
    uploadField.onchange = function() {
        if (this.files[0].size > 5242880) {
            alert("The image should be no more than 5MB");
            this.value = '';
        }
        ;
    }
})