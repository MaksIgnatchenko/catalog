<!-- Purpose Field -->
<div class="form-group">
    <p>
        {{ Form::label('purpose', 'Purpose: ') }}
        {!! Form::select('purpose', $dto->getPurposesList(), ['class' => 'form-control', 'maxlength' => 300], ['placeholder' => 'Select purpose']) !!}
    </p>
    @if ($errors->has('purpose'))
        <div class="text-red">{{ $errors->first('purpose') }}</div>
    @endif
</div>

<!-- Message Field -->
<div class="form-group">
    <p>
        {{ Form::label('message', 'Message: ') }}
        {!! Form::textarea('message', null, ['class' => 'form-control', 'maxlength' => 10000]) !!}
    </p>
    @if ($errors->has('message'))
        <div class="text-red">{{ $errors->first('message') }}</div>
    @endif
</div>

<!-- File Field -->
<div class="form-group">
    <p>
        {{ Form::label('file', 'Attach file: ') }}
    </p>
    {!! Form::file('file', null, ['class' => 'form-control']) !!}
    @if ($errors->has('file'))
        <div class="text-red">{{ $errors->first('file') }}</div>
    @endif
</div>

<!-- Submit Field -->
<div class="form-group text-right">
    {!! Form::submit('Save', ['class' => 'btn btn-success']) !!}
</div>

<script>
    jQuery(function($){
        var maxFileSize = {{ config('app_config.file_max_size') }} * 1024;
        $('#file').change(function() {
            if ($(this)[0].files[0].size > maxFileSize) {
                alert("The image should be no more than " + maxFileSize / (1024 * 1024) + " MB");
                $(this).val(null);
            }
        })
    });
</script>