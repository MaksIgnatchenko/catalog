<!-- Social resource Field -->
<div class="form-group">
    <p>
        {{ Form::label('social_resource', 'Social resource: ') }}
        {!! Form::select('social_resource', $socialResources, ['class' => 'form-control']) !!}
    </p>
    @if ($errors->has('social_resource'))
        <div class="text-red">{{ $errors->first('social_resource') }}</div>
    @endif
</div>

<!-- URL Field -->
<div class="form-group">
    <p>
        {{ Form::label('url' , 'Url: ') }}
        {!! Form::text('url', $socialLink->url, ['class' => 'form-control', 'maxlength' => 1000]) !!}
    </p>
    @if ($errors->has('url'))
        <div class="text-red">{{ $errors->first('url') }}</div>
    @endif
</div>

<!-- ALT Field -->
<div class="form-group">
    <p>
        {{ Form::label('alt' , 'Social icon alt text: ') }}
        {!! Form::text('alt', $socialLink->alt, ['class' => 'form-control', 'maxlength' => 100]) !!}
    </p>
    @if ($errors->has('alt'))
        <div class="text-red">{{ $errors->first('alt') }}</div>
    @endif
</div>

<!-- Submit Field -->
<div class="form-group text-right">
    {!! Form::submit('Save', ['class' => 'btn btn-success']) !!}
</div>

{!! Form::hidden('current_resource', $socialLink->social_resource) !!}

<script>
    var currentResource = $('input[name=current_resource]').val();
    var select = $('#social_resource');
    var options = select.children();
    for (var i = 0; i < options.length; i++) {
        if (options[i].value === currentResource) {
            $(options[i]).attr('selected', 'selected');

        }
    }
</script>