jQuery(function($){
    var options={
        format: 'mm/dd/yyyy',
        todayHighlight: true,
        autoclose: true,
    };
    $("[name='appear_start']").datepicker(options);
})