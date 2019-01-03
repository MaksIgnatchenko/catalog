<!-- IsNow Field -->
<div class="form-group">
    <p>
        {!! Form::checkbox('isNow', true, false, ['id' => 'isNow', 'class' => 'custom-checkbox']) !!}
        {{ Form::label('isNow', 'Now' . ': ') }}
    </p>
</div>

<!-- Change status date Field -->
<div class="form-group">
    <p>
        {{ Form::label('date_change_status', 'Date for change status: ') }}
        {!! Form::text('date_change_status', null, ['id' => 'dateField', 'class' => 'form-control']) !!}
    </p>
    @if ($errors->has('date_change_status'))
        <div class="text-red">{{ $errors->first('date_change_status') }}</div>
    @endif
</div>

<!-- Hidden Field Status -->
{!! Form::hidden('status', $newStatus) !!}


<!-- Submit Field -->
<div class="form-group text-right">
    {!! Form::submit('Save', ['class' => 'btn btn-success']) !!}
</div>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" />
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>

<script>
    var datePicker;
    var options={
        format: 'mm/dd/yyyy',
        todayHighlight: true,
        autoclose: true,
    };
    jQuery(function($){
        datePicker = $('#dateField').datepicker(options);
    });

    $('#isNow').click(function(){
        if(this.checked == true){
            $('#dateField').attr('disabled', 'disabled');
        } else {
            $('#dateField').removeAttr('disabled');
        }
    });
</script>